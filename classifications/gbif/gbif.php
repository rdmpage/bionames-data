<?php

// Export GBIF classification from MySQL to CouchDB

require_once (dirname(dirname(dirname(__FILE__))) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/couchsimple.php');

require_once (dirname(dirname(dirname(__FILE__))) . '/lib.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/lib/taxon_name_parser.php');

require_once (dirname(__FILE__) . '/citation.php');

//--------------------------------------------------------------------------------------------------
$gbif_db = NewADOConnection('mysql');
$gbif_db->Connect("localhost", 
	'root', '', 'gbif');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

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


//--------------------------------------------------------------------------------------------------
function get_concept($id)
{
	global $gbif_db;
	global $couch;

	$sql = 'SELECT * FROM taxon WHERE id = ' . $id . ' LIMIT 1';
	
	$result = $gbif_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	
	if ($result->NumRows() == 1)
	{
		$concept = new stdclass;
		$concept->_id = 'gbif/' . $id;
		$concept->type = "taxonConcept";
		
		$concept->source = 'http://ecat-dev.gbif.org/checklist/1';
		$concept->nameAccordingTo = utf8_encode($result->fields['nameAccordingTo']);
		$concept->sourceIdentifier = $result->fields['id'];
		$concept->scientificName = utf8_encode($result->fields['scientificName']);
		$concept->taxonRank = $result->fields['taxonRank'];
		
		p($concept);
		
		$concept->parent_id  = $result->fields['parentNameUsageID'];
		$concept->children = array();
	
		// fill in details
	
		// parent, we want full path back to root
		$concept->ancestors = array();
		$parent_id = $concept->parent_id;
		while ($parent_id)
		{
			$sql = 'SELECT * FROM taxon WHERE id = ' . $parent_id . ' LIMIT 1';
		
			$result = $gbif_db->Execute($sql);
			if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
			if ($result->NumRows() == 1)
			{
				$ancestor = new stdclass;
				$ancestor->sourceIdentifier = $result->fields['id'];
				$ancestor->scientificName = utf8_encode($result->fields['scientificName']);
				$ancestor->taxonRank = $result->fields['taxonRank'];
				
				p($ancestor);
				
				$parent_id = $result->fields['parentNameUsageID'];
				array_unshift($concept->ancestors, $ancestor);
			}
		}
	
	
	
		// children
		$sql = 'SELECT * FROM taxon WHERE parentNameUsageID = ' . $concept->sourceIdentifier;
		$sql .= ' ORDER BY canonicalName';
		
		$result = $gbif_db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
		while (!$result->EOF) 
		{
			$child = new stdclass;
			
			$child->scientificName = utf8_encode($result->fields['scientificName']);
			$child->taxonRank = $result->fields['taxonRank'];
			
			p($child);
			
			$child->sourceIdentifier = $result->fields['id'];
	
			$concept->children[] = $child;
			$result->MoveNext();	
		}
		
		if (count($concept->children) == 0)
		{
			unset ($concept->children);
		}
	
		// synonyms
		$sql = 'SELECT * FROM `taxon` WHERE acceptedNameUsageID = ' . $concept->sourceIdentifier;
		
		$result = $gbif_db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
		while (!$result->EOF) 
		{
			$synonym = new stdclass;
			$synonym->scientificName = utf8_encode($result->fields['scientificName']);
			$synonym->taxonRank = $result->fields['taxonRank'];
			$synonym->nameAccordingTo = utf8_encode($result->fields['nameAccordingTo']);
			
			p($synonym);
			
			$synonym->sourceIdentifier = $result->fields['id'];
			
			$concept->synonyms[] = $synonym;
			$result->MoveNext();	
		}
	
	
		// references
		$sql = 'SELECT * FROM `reference` WHERE id = ' . $concept->sourceIdentifier;
		
		$result = $gbif_db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
		while (!$result->EOF) 
		{
			//$reference = new stdclass;
			
			//$reference->bibliographicCitation = utf8_encode($result->fields['bibliographicCitation']);
			
			//$reference = parse_citation(utf8_encode($result->fields['bibliographicCitation']));
	//		$reference = parse_citation($result->fields['bibliographicCitation']);
	
			$bibliographicCitation = mb_convert_encoding($result->fields['bibliographicCitation'], 'UTF-8', 'ASCII');
			$reference = parse_citation($bibliographicCitation);
			//echo $bibliographicCitation . '<br/>';
			
	
			$concept->references[] = $reference;
			$result->MoveNext();	
		}
	
		
		// map	
		if (0)
		{
			$url = 'http://data.gbif.org/ws/rest/density/list?taxonconceptkey=' . $concept->sourceIdentifier;	
			$xml = get($url);
			
			$js = '';
		
			if ($xml != '')
			{
				$concept->points = array();
	
				// Convert GBIF XML to Javascript for Google Maps
				$xp = new XsltProcessor();
				$xsl = new DomDocument;
				$xsl->load(dirname(__FILE__) . '/gbif2json.xsl');
				$xp->importStylesheet($xsl);
				
				$dom = new DOMDocument;
				$dom->loadXML($xml);
				$xpath = new DOMXPath($dom);
			
				$js = $xp->transformToXML($dom);
				
				$map = json_decode($js);
				
				foreach ($map->cells as $cell)
				{
					$pt = array();
					if (0)
					{
						$pt[0] = $cell->minLatitude;
						$pt[1] = $cell->minLongitude;
					}
					else
					{
						$pt[] = $cell->minLongitude;
						$pt[] = $cell->minLatitude;
					}
					$concept->points[] =  $pt;				
				}
			}
		}
		
		print_r($concept);
		
		//echo json_encode($concept);
		
		$couch->add_update_or_delete_document($concept,  $concept->_id);
		
	}
}

/*

if (0)
{
	
	$id = 2428884; // Ptychadenidae Dubois, 1987
	$id = 2428896;
	$id = 2428904;
	
	$id = 3267604;
	$id = 5815619;
	
	$id = 2425583;
	
	get_concept($id);
}
else
{
	$filename = 'frogs.txt';
	$filename = 'worms_id.txt';
	$filename = 'Eleutherodactylus.txt';
	$file_handle = fopen($filename, "r");
	
	while (!feof($file_handle)) 
	{
		$id = trim(fgets($file_handle));
		
		get_concept($id);
	}
}	

*/

?>