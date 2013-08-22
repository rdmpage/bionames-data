<?php

/* Cluster ION names 
 
 need list of unique name strings

*/
require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

require_once (dirname(__FILE__) . '/lcs.php');
require_once (dirname(__FILE__) . '/components.php');
require_once (dirname(__FILE__) . '/fingerprint.php');


//--------------------------------------------------------------------------------------------------
// Find components based on string similarity
function find_clusters($strings, $threshold = 0.8)
{
	$n = count($strings);
	
	//print_r($strings);
	
	$map = array();
	$inverse_map = array();
	
	$count = 0;
	foreach ($strings as $k => $v)
	{
		$map[$k] = $count;
		$inverse_map[$count] = $k;
		
		$count++;
	}

	// Create adjacency matrix and fill with 0's
	$X = array();
	for ($i = 0; $i < $n; $i++)
	{
		$X[$i] = array();
		
		for ($j = 0; $j < $n; $j++)
		{ 
			$X[$i][$j] = 0;
		}
	}
	
	$nodes = '';
	$edges = '';
	
	// Compare names using approximate string matching
	$i = 0;
	foreach ($strings as $k1 => $v1)
	{
		$nodes .= $k1 . " [label=\"" . $v1 . "\"];\n";
		
		if ($i < $n-1)
		{
			$j = 0;
			foreach ($strings as $k2 => $v2)
			{
				if (($j > $i) && ($j < $n))
				{
					if (($v1 == '') || ($v2 == ''))
					{
						// skip blank names
					}
					else
					{				
						// Find longest common subsequence for this pair of cleaned names
						$lcs = new LongestCommonSequence($v1, $v2);	
						$d = $lcs->score();
	
						// Filter by longest common substring (to ensure we have a "meaningful" 
						// match), that is, so that we avoid subsequences that have little continuity					
						$str = '';
						$lcstr = LongestCommonSubstring($v1, $v2, $str);
						if ($lcstr >= 4)
						{
							// Ignore matches just on date, we want more than that
							if (is_numeric(trim($str)))
							{
							}
							else
							{
								// If longest common subsequence is > $threshold of the length of both strings
								// we accept it.
								if (($d / strlen($v1) >= $threshold) || ($d / strlen($v2) >= $threshold))
								{
									$X[$map[$k1]][$map[$k2]] = 1;
									$X[$map[$k2]][$map[$k1]] = 1;	
									//$edges .=  $i . " -- " . $j . " [label=\"" . $lcstr . "\"];\n";
									$edges .=  $inverse_map[$i] . " -- " . $inverse_map[$j] . " [label=\"" . $lcstr . "\"];\n";
							
								}
							}
						}
						else
						{
							// If just a short match is it the start if the string (e.g., an abbreviation)
							$abbreviation = false;
							if (strlen($v1) == $d)
							{
								if (strpos($v2, $v1, 0) === false)
								{
								}
								else
								{
									$abbreviation = true;
								}
							}
							else
							{
								if (strpos($v1, $v2, 0) === false)
								{
								}
								else
								{
									$abbreviation = true;
								}						
							}
							
							// Handle contractions e.g. "Blgr." and "Boulenger 1904"
							if (!$abbreviation)
							{
								$c1 = $v1;
								$c1 = preg_replace('/[a|e|i|o|u]+/', '', $c1);
								
								$c2 = $v2;
								$c2 = preg_replace('/[a|e|i|o|u]+/', '', $c2);
								
								// clean dates
								if (
									preg_match('/([0-9]{4})\)?$/', $c1)
									|| preg_match('/([0-9]{4})\)?$/', $c2)
									)
								{
									$c1 = preg_replace('/([0-9]{4})\)?$/', '', $c1);
									$c1 = preg_replace('/^\(/', '', $c1);

									$c2 = preg_replace('/([0-9]{4})\)?$/', '', $c2);
									$c2 = preg_replace('/^\(/', '', $c2);
		
								}
								
								$lcs_stripped = new LongestCommonSequence($c1, $c2);	
								$d = $lcs_stripped->score();
								
								if (
									(strlen($c1) == $d)
									|| (strlen($c2) == $d)
									)
								{
									$abbreviation = true;
								}
								
								//echo "$c1 $c2 $d\n";
							}
							
							
							// Accept abbreviation
							if ($abbreviation)
							{
								$X[$map[$k1]][$map[$k2]] = 1;
								$X[$map[$k2]][$map[$k1]] = 1;	
	//							$edges .=  $i . " -- " . $j . " [label=\"" . $lcstr . "\"];\n";						
								$edges .=  $inverse_map[$i] . " -- " . $inverse_map[$j] . " [label=\"" . $lcstr . "\"];\n";
							}
						}
					}
				}
				$j++;
			}
			$i++;
		}
	}
	
	if (1)
	{
		$graph = "graph G {\n" . $nodes . $edges . "}\n";
		
		//echo $graph;
		
		$keys = array_keys($strings);
		$filename = $keys[0];
		
		file_put_contents('tmp/' . $filename . '.dot', $graph);
	}
	
	// Get components of adjacency matrix
	$c = get_components($X);
	
	// Ensure nodes are labelled with ids
	foreach ($c as $component => $nodes)
	{
		foreach ($nodes as $k => $v)
		{
			$c[$component][$k] = $inverse_map[$v];
		}
	}	

	
	if (0)
	{
		print_r($c);
	}
	
	return $c;
}


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


// Get names


$name = 'Acanthobothrium';
//$name = 'Pinnotheres';
//$name = 'Raymondia';
//$name = 'Sundamys';

//$name = 'Mastigodryas';
//$name = 'Diplura';
//$name = 'Eudryas';
//$name = 'Parathisanotia';

//$name = 'Anisoptera';

//$name = 'Dendrobates';
//$name = 'Haywardina';

//$name = 'Acerella';

//$name = 'Rhacophorus';

//$name = 'Chiromantis';

//$name = 'Abarenicola pacifica';

//$name = 'Praomys';

//$name = 'Hyperiidae';
//$name = 'Abacetus';

//$name = 'Rhacophorus achantharrhena';


$filename = 'namestring.txt';
//$filename = 'n.txt';
//$filename = 'b.txt';
//$filename = 'g.txt';

$filename = 'tests/Cynopterus brachyotis.txt';

$filename = 'names4964979.txt';


$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$name = trim(fgets($file_handle));
	if ($name != '')
	{
		echo "-- $name\n";

		$strings = array();
		
		$names = array();
		
		$sql = 'SELECT * FROM names WHERE nameComplete = ' . $db->qstr($name); // . ' AND taxonAuthor IS NOT NULL AND taxonAuthor <>""';
		
		$sql .= ' ORDER BY id DESC';
		
		$result = $db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
		while (!$result->EOF) 
		{	
			$strings[$result->fields['id']] = finger_print($result->fields['taxonAuthor']);
			
			$name = new stdclass;
			$name->id = $result->fields['id'];
			$name->nameComplete = $result->fields['nameComplete'];
			if ($result->fields['taxonAuthor'] != '')
			{
				$name->taxonAuthor = $result->fields['taxonAuthor'];
			}
			if ($result->fields['year'] != '')
			{
				$name->year = $result->fields['year'];
			}
			if ($result->fields['sici'] != '')
			{
				$name->publishedIn = $result->fields['sici'];
			}
			$names[$name->id] = $name;
			
			$result->MoveNext();
		}
		
		//print_r($names);
		
		$n = $result->NumRows();
			
		
		// Cluster
		$components = find_clusters($strings);
		
		//print_r($components);
		
		// If we have two clusters, one with no author name, merge clusters
		if (count($components) == 2)
		{
			$keys = array_keys($components);
		
			$i = -1;
			$j = -1;
			if (
				(count($components[$keys[0]]) == 1) 
				&& !isset($names[$components[$keys[0]][0]]->taxonAuthor)
			)
			{
				$i = $keys[0];
				$j = $keys[1];
			}
			else
			{
				if (
					(count($components[$keys[1]]) == 1) 
					&& !isset($names[$components[$keys[1]][0]]->taxonAuthor)
				)
				{
					$i = $keys[1];
					$j = $keys[0];
				}
			}
			
			/*
			echo "i=$i j=$j\n";
			echo count($components[0]) . "\n";
			echo count($components[$keys[1]]) . "\n";
			*/
			
			if ($i != -1)
			{
				// we have a component with 1 name and no author
				// merge with other component if it is named
				if (isset($names[$components[$j][0]]->taxonAuthor))
				{
					$components[$j][] = $components[$i][0];
					unset($components[$i]);
				}
			}
			
		}
		
		//print_r($components);
		
		foreach ($components as $c)
		{
			sort($c);
			//print_r($c);
			
			foreach ($c as $id)
			{
				echo 'UPDATE names SET cluster_id=' . $c[0] . ' WHERE id=' . $id . ';' . "\n";
			}		
		}
	}
}

/*
$clusters = array();
foreach ($components as $c)
{	
	$length = 0;
	$cluster = new stdclass;
	$cluster->id = 0;
	$cluster->members = $c;
	foreach ($c as $id)
	{
		if ($cluster->id == 0)
		{
			$cluster->id = $id;
		}
		if (isset($names[$id]->year))
		{
			$cluster->years[] = $names[$id]->year;
		}
		if (isset($names[$id]->taxonAuthor))
		{
			$author = $names[$id]->taxonAuthor;
			$author  = preg_replace('/([0-9]{4})\)?$/', '', $author);
			$cluster->author[$id] = $author;
			
			if (strlen($author) > $length)
			{
				$length = strlen($author);
				$cluster->id = $id;
			}
		}
	}
	// Sort years to get oldest first
	if (isset($cluster->years))
	{
		sort($cluster->years);
	}
	
	$clusters[] = $cluster;
}

print_r($clusters);
*/

?>