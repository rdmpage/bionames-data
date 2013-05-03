<?php

// Map between ION and GBIF
require_once (dirname(__FILE__) . '/citation.php');
require_once (dirname(__FILE__) . '/map.php');


//--------------------------------------------------------------------------------------------------
function get_gbif_concept($id)
{
	$gbif_db = NewADOConnection('mysql');
	$gbif_db->Connect("localhost", 'root', '', 'gbif');
	

	$sql = 'SELECT * FROM taxon WHERE id = ' . $id . ' LIMIT 1';
	
	$result = $gbif_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	
	if ($result->NumRows() == 1)
	{
		$concept = new stdclass;
		$concept->_id = 'gbif/' . $id;
		$concept->type = "taxonConcept";
		
		$concept->source = 'http://ecat-dev.gbif.org/checklist/1';
		
		// accepted name 
		$concept->nameString = utf8_encode($result->fields['scientificName']);
		
		$concept->acceptedName = new stdclass;
		
		$concept->acceptedName->nameAccordingTo = utf8_encode($result->fields['nameAccordingTo']);
		$concept->acceptedName->sourceIdentifier = $result->fields['id'];
		$concept->acceptedName->scientificName = utf8_encode($result->fields['scientificName']);
		$concept->acceptedName->taxonRank = $result->fields['taxonRank'];
		
		p($concept->acceptedName);
		
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
		$sql = 'SELECT * FROM taxon WHERE parentNameUsageID = ' . $concept->acceptedName->sourceIdentifier;
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
		$sql = 'SELECT * FROM `taxon` WHERE acceptedNameUsageID = ' . $concept->acceptedName->sourceIdentifier;
		
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
		$sql = 'SELECT * FROM `reference` WHERE id = ' . $concept->acceptedName->sourceIdentifier;
		
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
		
		//$couch->add_update_or_delete_document($concept,  $concept->_id);
		
	}
}


//--------------------------------------------------------------------------------------------------
// Get names in GBIF
function get_gbif_names($name)
{
	$gbif_db = NewADOConnection('mysql');
	$gbif_db->Connect("localhost", 'root', '', 'gbif');
	
	$concepts = array();

	$sql = 'SELECT * FROM taxon WHERE canonicalName = ' . $gbif_db->qstr($name) . ' AND kingdom="Animalia"';
	
	echo $sql . "\n";
	
	$result = $gbif_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql . ' ' . $gbif_db->ErrorMsg());

	while (!$result->EOF) 
	{
		$concept = new stdclass;
		$concept->id = 'gbif' . $result->fields['id'];
		
		if ($result->fields['acceptedNameUsageID'] != null)
		{
			$concept->acceptedNameUsageID = $result->fields['acceptedNameUsageID'];
		}
		
		$concept->id = 'gbif' . $result->fields['id'];
		
		$concept->nameAccordingTo = utf8_encode($result->fields['nameAccordingTo']);
		$concept->sourceIdentifier = $result->fields['id'];
		$concept->scientificName = utf8_encode($result->fields['scientificName']);
		$concept->taxonRank = $result->fields['taxonRank'];
		
		p($concept);
		
		$concepts[] = $concept;
		
		$result->MoveNext();
	}
	
	//print_r($concepts);
	
	//exit();
	
	return $concepts;
}

/*

$namestring = 'Rhacophorus';

//$namestring = 'Bufo'; // problematic match

//$namestring = 'Pinnotheres';
//$namestring = 'Agathis';
//$namestring = 'Anolis';

$namestring = 'Rhacophorus arboreus'; // simple

//$namestring = 'Chiromantis';

//$namestring = 'Aerodramus';

//$namestring='Collocalia gigas';

$namestring = 'Praomys misonnei';

$namestring = 'Eleutherodactylus ridens';


map($namestring, 'gbif');

*/

/*
$id = 2225762; // Helice (crab)
$id = 2425583; // Pristimantis ridens (frog)
$id = 2432120; // Microgale fotsifotsy
get_gbif_concept($id);
*/

?>