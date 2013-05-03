<?php

// Export NCBI classification from MySQL to CouchDB

require_once (dirname(dirname(dirname(__FILE__))) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/couchsimple.php');

require_once (dirname(dirname(dirname(__FILE__))) . '/lib.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/lib/taxon_name_parser.php');

//--------------------------------------------------------------------------------------------------
$ncbi_db = NewADOConnection('mysql');
$ncbi_db->Connect("localhost", 
	'root', '', 'ion');

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
	global $ncbi_db;
	global $couch;

	$sql = 'SELECT * FROM ncbi_names INNER JOIN ncbi_nodes USING(tax_id) WHERE tax_id = ' . $id . ' AND name_class = "scientific name" LIMIT 1';
	
	$result = $ncbi_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	
	if ($result->NumRows() == 1)
	{
		$concept = new stdclass;
		$concept->_id = 'ncbi/' . $id;
		$concept->type = "taxonConcept";
		
		$concept->source 			= 'http://www.ncbi.nlm.nih.gov/taxonomy';
		$concept->nameAccordingTo 	= 'NCBI';
		$concept->sourceIdentifier 	= $result->fields['tax_id'];
		$concept->scientificName 	= $result->fields['name_txt'];
		$concept->taxonRank 		= $result->fields['rank'];
		
		p($concept);
		
		$concept->parent_id  = $result->fields['parent_tax_id'];
		$concept->children = array();
	
		// fill in details
		// parent, we want full path back to root (may want to collapse "hidden" nodes?)
		$concept->ancestors = array();
		$parent_id = $concept->parent_id;
		while ($parent_id != 1)
		{
			$sql = 'SELECT * FROM ncbi_nodes INNER JOIN ncbi_names USING(tax_id) WHERE tax_id = ' . $parent_id;
			$sql .= ' AND name_class="scientific name" LIMIT 1';
		
			$result = $ncbi_db->Execute($sql);
			if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
			if ($result->NumRows() == 1)
			{
				$ancestor = new stdclass;
				$ancestor->sourceIdentifier = $result->fields['tax_id'];
				$ancestor->scientificName 	= $result->fields['name_txt'];
				$ancestor->taxonRank 		= $result->fields['rank'];
				
				p($ancestor);
				
				// ncbi-specific
				$ancestor->hidden 			= ($result->fields['GenBank_hidden_flag'] != 0); // true if hidden, false if visible
				
				$parent_id = $result->fields['parent_tax_id'];
				array_unshift($concept->ancestors, $ancestor);
			}
		}
	
		// children
		$sql = 'SELECT * FROM ncbi_nodes INNER JOIN ncbi_names USING(tax_id) WHERE parent_tax_id = ' . $concept->sourceIdentifier;
		$sql .= ' AND name_class="scientific name"';
		$sql .= ' ORDER BY name_txt';
		
		$result = $ncbi_db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
		while (!$result->EOF) 
		{
			$child = new stdclass;
			
			$child->scientificName = $result->fields['name_txt'];
			$child->taxonRank = $result->fields['rank'];
			
			p($child);
			
			$child->sourceIdentifier = $result->fields['tax_id'];
	
			$concept->children[] = $child;
			$result->MoveNext();	
		}
		
		
		if (count($concept->children) == 0)
		{
			unset ($concept->children);
		}
		
		// synonyms
		
		/* GenBank name classes
			acronym
			anamorph
			authority
			blast name
			common name
			equivalent name
			genbank acronym
			genbank anamorph
			genbank common name
			genbank synonym
			in-part
			includes
			misnomer
			misspelling
			scientific name
			synonym
			teleomorph
			unpublished name		
		*/
		
		$sql = 'SELECT * FROM ncbi_names WHERE tax_id = ' . $id 
			. ' AND name_class in ("acronym", "anamorph", "authority", "equivalent name", "genbank acronym", "genbank anamorph", "genbank synonym", "misnomer", "misspelling", "in-part", "includes", "synonym", "teleomorph", "unpublished name")';
		
		$result = $ncbi_db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
		while (!$result->EOF) 
		{
			$synonym = new stdclass;
			$synonym->scientificName 	= $result->fields['name_txt'];
			$synonym->taxonRank 		= $concept->taxonRank;
			$synonym->nameAccordingTo 	= 'NCBI';
			
			p($synonym);
			
			$synonym->sourceIdentifier = $result->fields['tax_id'];
			
			// type of name (GenBank specific, could use http://rs.tdwg.org/ontology/voc/TaxonConcept#TaxonRelationshipTerm)
			$synonym->name_class = $result->fields['name_class'];			
			
			$concept->synonyms[] = $synonym;
			$result->MoveNext();	
		}
		
	
		/*
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
		*/
		
		print_r($concept);
		
		//echo json_encode($concept);
		
		$couch->add_update_or_delete_document($concept,  $concept->_id);
		
	}
}

/*

$id = 680141; // Anodonthyla theoi
//$id = 161856;
//$id = 289207;
$id = 161857;
$id = 8363;
$id = 680141;
$id = 260821;
$id = 187009;
get_concept($id);
exit();



$filename = 'frog.txt';
$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	//$id = trim(fgets($file_handle));

	$parts = explode(" ", trim(fgets($file_handle)));
	
	get_concept($parts[0]);
}


*/


?>