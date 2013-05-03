<?php


// major problem is we match each name in cluster, but different names may have different matches,
// see e.g. Anisogaster

// Map between ION and concept databases
require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

require_once (dirname(dirname(__FILE__)) . '/lib/taxon_name_parser.php');
require_once (dirname(dirname(__FILE__)) . '/lib/fingerprint.php');
require_once (dirname(dirname(__FILE__)) . '/lib/lcs.php');

// Clusters
require_once (dirname(dirname(__FILE__)) . '/clusters/cluster.php');


require_once (dirname(__FILE__) . '/eol.php');
require_once (dirname(__FILE__) . '/gbif.php');
require_once (dirname(__FILE__) . '/ncbi.php');

$config['matching_program'] = '/Users/rpage/Development/maximum-weighted-bipartite-matching/matching';

//--------------------------------------------------------------------------------------------------
function compare ($str1, $str2)
{
	$n1 = strlen($str1);
	$n2 = strlen($str2);
	
	//echo "\n$str1\n$str2\n";
	
	/*
	
	$str = '';
	$l = LongestCommonSubstring($str1, $str2, $str);
	
	echo "$l\n";
	*/
	
	$lc = new LongestCommonSequence	($str1, $str2);
	$l = $lc->diff();
	
	$l = round(100 * (1-$l));
	
	//echo "$l\n";
	
	return $l;
}

/*
//--------------------------------------------------------------------------------------------------
function p(&$o)
{
	$taxon_parser = new Parser();
	$parsed = $taxon_parser->parse($o->scientificName);

	if ($parsed->scientificName->parsed)
	{
		$o->canonicalName = $parsed->scientificName->canonical;
		
		foreach ($parsed->scientificName->details as $details)
		{
			foreach ($details as $k => $v)
			{
				if (isset($v->authorship))
				{
					$o->author = $v->authorship;
				}
			}
		}
			
	}
}
*/

//--------------------------------------------------------------------------------------------------
// Get name clusters from ION
function get_ion_names($name)
{
	$ion_db = NewADOConnection('mysql');
	$ion_db->Connect("localhost", 'root', '', 'ion');
	
	$clusters = array();
	
	// Handle subgenera by having a query that can find them as well
	// For example GBIF has Myotis pruinosus Yoshiyuki, 1971 and ION has Myotis (Leuconoe) pruinosus
	if (0)
	{
		if (preg_match('/^(?<genus>\w+)\s+(?<rest>.*)$/', $name, $m))
		{
			$sql = 'SELECT DISTINCT cluster_id FROM names WHERE nameComplete LIKE ' . $ion_db->qstr($m['genus'] . ' %' . $m['rest']);	
		}
		else
		{
			$sql = 'SELECT DISTINCT cluster_id FROM names WHERE nameComplete = ' . $ion_db->qstr($name);
		}
	}
	else
	{
		$sql = 'SELECT DISTINCT cluster_id FROM names WHERE nameComplete = ' . $ion_db->qstr($name);
	}
	
	echo $sql . "\n";
	
	$result = $ion_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql . ' ' . $ion_db->ErrorMsg());

	while (!$result->EOF) 
	{
		$cluster = get_cluster($result->fields['cluster_id']);
		if ($cluster)
		{
			$clusters[] = $cluster;
		}
		$result->MoveNext();
	}
	
	//print_r($clusters);
	//exit();
	
	return $clusters;
}

//--------------------------------------------------------------------------------------------------
function store_mapping($sql_commands)
{
	$db = NewADOConnection('mysql');
	$db->Connect("localhost", 'root', '', 'ion');
	
	//print_r($sql_commands);
	
	foreach ($sql_commands as $sql)
	{
		$result = $db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql . ' ' . $db->ErrorMsg());
	}
}

//--------------------------------------------------------------------------------------------------
function map($namestring, $source = 'gbif', $eol_lookup = true, $threshold = 50, $store = true)
{
	global $config;
		
	$dot_filename = '';
	
	// Get sets of names from ION and concept database
//	$clusters = get_ion_names($namestring);
	
	$concepts = array();
	
	$accepted_ids = array(); // handle GBIF synonyms
	
	switch ($source)
	{
		case 'ncbi':
			$concepts = get_ncbi_names($namestring);
			if (count($concepts) != 0)
			{
				if (isset($concepts[0]->canonicalName))
				{
					$clusters = get_ion_names($concepts[0]->canonicalName);
				}
			}
			break;
	
		case 'gbif':
		default;
			$clusters = get_ion_names($namestring);
			$concepts = get_gbif_names($namestring);
			foreach ($concepts as $c)
			{
				if (isset($c->acceptedNameUsageID))
				{
					$accepted_ids[$c->sourceIdentifier] = $c->acceptedNameUsageID;
				}
				else
				{
					$accepted_ids[$c->sourceIdentifier] = $c->sourceIdentifier;
				}
			}
			break;
	}
	
	if ((count($concepts) == 0) || (count($clusters) == 0))
	{
		echo "-- No names and/or concepts\n";
		return;
	}	
	
	$id_map = array();
	$label_map = array();
	$json = '';
	$matching = null;

	
	// OK, how many concepts and clusters do we have?
	
	// If one concept and one cluster make direct match
	if ((count($concepts) == 1) && (count($clusters) == 1))
	{
		echo "-- Direct match\n";
		
		$id_map[0] 		= $concepts[0]->id;
		$label_map[0] 	= $concepts[0]->canonicalName;
		
		foreach ($clusters as $cluster)
		{
			$id_map[1]		= str_replace('cluster/', '', $cluster->_id);
			$label_map[1] 	= $cluster->nameComplete;
		}
		
		$json = '{"matching":[[0,1]]}';
		$match = json_decode($json);
		
	}
	else
	{
		// More than name and/or concept, compute matching	
		$source = array();
		$target = array();
		$edges = array();
		
		foreach ($concepts as $concept)
		{		
			if (isset($concept->author))
			{
				$str2 = trim($concept->canonicalName . ' ' . $concept->author);
			}
			else
			{
				$str2 = $concept->canonicalName;
			}
			
			$node = new stdclass;
			$node->id = $concept->id;
			$node->label = $str2;
			
			$source[$node->id] = $node;
			
			// Clusters are targets
			foreach ($clusters as $cluster)
			{
				$max_d = 0;
				
				$cluster_id = str_replace('cluster/', '', $cluster->_id);
				
				if (!isset($target[$cluster_id]))
				{
					$node = new stdclass;
					$node->id = $cluster_id;
					$node->label = '';		
					$target[$cluster_id] = $node;
				}
				
				if (isset($cluster->taxonAuthor))
				{
					$str1 = trim($cluster->nameComplete . ' ' . $cluster->taxonAuthor);
				}
				else
				{
					$str1 = $cluster->nameComplete;
				}
				
				
				$v1 = finger_print($str1);
				$v2 = finger_print($str2);
								
				$s = compare($v1, $v2);
			
				$edge = new stdclass;
				
				$edge->weight = $s;
				$edge->source_id = $concept->id;
				$edge->target_id = $cluster_id;
				$edge->source = $str2;
				$edge->target = $str1;
				
				$target[$cluster_id]->label = $str1;
				
				$edges[] = $edge;
				
			}
		}
		
		//print_r($source);
		//print_r($target);
		
		//exit();
				
		// GML graph for matching	
		$gml = "graph [
		comment \"Matching\"
		directed 1\n";
		
		$count = 0;
		$node_map = array();
		
		// Source nodes listed first
		foreach ($source as $node)
		{
			$node_map[$node->id] = $count;
			$id_map[$count] = $node->id;
			$label_map[$count] = $node->label;
			
			$gml .= "node [ id " . $count . " label \"" . addcslashes(str_replace(' & ', ' ',$node->label), '"') . "\" ]\n";
			$count++;
		}
	
		// Target nodes listed second
		foreach ($target as $node)
		{
			$node_map[$node->id] = $count;
			$id_map[$count] = $node->id;
			$label_map[$count] = $node->label;
			
			$gml .= "node [ id " . $count . " label \"" . addcslashes(str_replace(' & ', ' ',$node->label), '"') . "\" ]\n";
			$count++;
		}
	
		foreach ($edges as $edge)
		{
			if ($edge->weight > $threshold)
			{
				$gml .= "edge [ source " . $node_map[$edge->source_id] . " target " . $node_map[$edge->target_id] . " label \"" . $edge->weight . "\" ]\n";
			}
			else
			{
				$gml .= "edge [ source " . $node_map[$edge->source_id] . " target " . $node_map[$edge->target_id] . " label \"0\" ]\n";
			}
			
		}
		
		$gml .= "]\n";
			
		//echo $gml;
		
		$gml_filename = dirname(__FILE__) . '/tmp/' . str_replace(' ', '_', $namestring) . '.gml';	
		file_put_contents($gml_filename, $gml);
		
		// Compute matching
		//$command = '/Users/rpage/Development/matching/matching ' . $gml_filename;
		$command = $config['matching_program'] . ' ' . $gml_filename;
		$output = array();
		exec ($command, $output);
		
		$json = join("", $output);
		
		
		$match = json_decode($json);
		
		
		// Debugging output dot format graph
		if (0)
		{
			$dot = '';
			
			$dot .= "graph G {\n";
			
			foreach ($edges as $edge)
			{
				$dot .= '"' . $edge->source . '" -- "' . $edge->target . '"' . ' [label="' . $edge->weight . '"]' . ";\n";
			}
			
			$dot .= "}\n";
			
			$dot_filename =  dirname(__FILE__) . '/tmp/' . str_replace(' ', '_', $namestring) . '.dot';	
			file_put_contents($dot_filename, $dot);
		}
		
		if (1)
		{
			$dot = '';
			
			$dot .= "graph G {\n";
			
			$count = 0;
			foreach ($source as $node)
			{
				$dot .= '"' . $count++ . '" [label="' . addcslashes(str_replace(' & ', ' ',$node->label), '"') . '"]' . ';' . "\n";
			}
			foreach ($target as $node)
			{
				$dot .= '"' . $count++ . '" [label="' . addcslashes(str_replace(' & ', ' ',$node->label), '"') . '"]' . ';' . "\n";
			}
			
			echo "--\n";
			print_r($matching);
			echo "--\n";
			
			foreach ($edges as $edge)
			{
				// is edge in matching?
				$in_matching = false;
				foreach ($match->matching as $e)
				{
					if (($e[0] == $node_map[$edge->source_id]) && ($e[1] == $node_map[$edge->target_id]))
					{
						$in_matching = true;
					}
				}				
			
			
				$dot .= '"' . $node_map[$edge->source_id] . '" -- "' . $node_map[$edge->target_id] . '"';
				if ($in_matching)
				{
					$dot .= ' [label="' . $edge->weight . '"]' . ";\n";
				}
				else
				{
					$dot .= ' [style="dashed", label="' . $edge->weight . '"]' . ";\n";
				}
			}
			
			$dot .= "}\n";
			
			$dot_filename =  dirname(__FILE__) . '/tmp/' . str_replace(' ', '_', $namestring) . '.dot';	
			file_put_contents($dot_filename, $dot);
			
			//echo $dot;
		}
			
		
		
	}
	
	
	
	//print_r($match);
	
	// Output matching
	echo "-- Match with id\n";
	foreach ($match->matching as $m)
	{
		echo "-- " . $id_map[$m[0]] . ' -> ' . $id_map[$m[1]] . "\n";	
	}
	echo "-- Match with labels\n";
	foreach ($match->matching as $m)
	{
		echo "-- " . $label_map[$m[0]] . ' -> ' . $label_map[$m[1]] . "\n";
	}

	// Output as SQL
	echo "-- Match '$namestring' SQL\n";
	
	$sql = array();
		
	foreach ($match->matching as $m)
	{
		// GBIF
		if (preg_match('/^gbif(?<id>\d+)$/', $id_map[$m[0]], $v))
		{
			// Delete any previous GBIF map
			$sql[] = 'DELETE FROM names_to_concept WHERE namestring="' . addcslashes($namestring, '"') . '" AND gbif_id <> 0;';
		
			$keys = array();
			$values=array();
			
			$keys[] 	= 'cluster_id';
			$values[] 	= $id_map[$m[1]];
			
			$keys[] 	= 'namestring';
			$values[] 	= '"' . addcslashes($namestring, '"') . '"';

			$keys[] 	= 'name';
			$values[] 	= '"' . addcslashes($label_map[$m[1]], '"') . '"';
					
			// Link to accepted GBIF id
			$keys[] 	= 'gbif_id';
			//$values[] 	= $v['id'];
			$values[] 	= $accepted_ids[$v['id']];
			
			$keys[] 	= 'gbif_name';
			$values[] 	= '"' . addcslashes($label_map[$m[0]], '"') . '"';

			if ($dot_filename != '')
			{
				$keys[] 	= 'gbif_graph';
				$graph = file_get_contents($dot_filename);
				$graph = str_replace("\n", "", $graph);
				$graph = addcslashes($graph, '"');
				$values[] 	= '"' . $graph . '"';
			}
					
			$sql[] .= "INSERT INTO names_to_concept(" . join(",", $keys) . ") VALUES (" . join(",", $values) . ");";
		}
		
		// NCBI
		if (preg_match('/^ncbi(?<id>\d+)$/', $id_map[$m[0]], $v))
		{
			// Delete any previous NCBI map
			$sql[] = 'DELETE FROM names_to_concept WHERE namestring="' . addcslashes($namestring, '"') . '" AND ncbi_id = ' . $v['id'] . ';';

			$keys = array();
			$values=array();
			
			$keys[] 	= 'cluster_id';
			$values[] 	= $id_map[$m[1]];
			
			$keys[] 	= 'namestring';
			$values[] 	= '"' . addcslashes($namestring, '"') . '"';

			$keys[] 	= 'name';
			$values[] 	= '"' . addcslashes($label_map[$m[1]], '"') . '"';
					
			// Link to NCBI tax_id
			$keys[] 	= 'ncbi_id';
			$values[] 	= $v['id'];
			
			$keys[] 	= 'ncbi_name';
			$values[] 	= '"' . addcslashes($label_map[$m[0]], '"') . '"';

			if ($dot_filename != '')
			{
				$keys[] 	= 'ncbi_graph';
				$graph = file_get_contents($dot_filename);
				$graph = str_replace("\n", "", $graph);
				$graph = addcslashes($graph, '"');
				$values[] 	= '"' . $graph . '"';
			}
					
			$sql[] .= "INSERT INTO names_to_concept(" . join(",", $keys) . ") VALUES (" . join(",", $values) . ");";
			
			print_r($sql);
		}
		
	}
	
	
	// Map to EOL using concept identifier
	if ($eol_lookup)
	{
		echo "-- EOL\n";
		foreach ($match->matching as $m)
		{
			// GBIF
			if (preg_match('/^gbif(?<id>\d+)$/', $id_map[$m[0]], $values))
			{
				$eol_page_id = gbif_to_eol ('gbif');
				
				//echo $values['id'] . ' ' . $eol_page_id . "\n";
				//exit();
				
				if ($eol_page_id != 0)
				{
					$sql[] .= "UPDATE names_to_concept SET gbif_eol_id=" . $eol_page_id . " WHERE gbif_id=" . $values['id']  . ";";									
				}
			}
			
			// NCBI
			if (preg_match('/^ncbi(?<id>\d+)$/', $id_map[$m[0]], $values))
			{
				$eol_page_id = concept_to_eol($values['id'], 'ncbi');
				
				echo $values['id'] . ' ' . $eol_page_id . "\n";
				//exit();
				
				if ($eol_page_id != 0)
				{
					$sql[] .= "UPDATE names_to_concept SET ncbi_eol_id=" . $eol_page_id . " WHERE ncbi_id=" . $values['id'] 
						. " AND ncbi_name=" .  '"' . addcslashes($label_map[$m[0]], '"') . '"' . ";";									
				}
			
			}
			
			
		}
	}
	
	store_mapping($sql);
	
}	


?>