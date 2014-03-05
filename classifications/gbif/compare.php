<?php

// Export GBIF classification from MySQL to CouchDB

require_once (dirname(dirname(dirname(__FILE__))) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/lib/lcs.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/lib/taxon_name_parser.php');

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
				if (isset($v->epitheton))
				{
					$o->specificEpithet = $v->epitheton;
				}
			
				if (isset($v->authorship))
				{
					$o->author = $v->authorship;
				}
			}
		}
			
	}
}





//--------------------------------------------------------------------------------------------------
// get species names for genus
function get_species ($genus)
{
	global $gbif_db;
	global $config;
	
	$species = array();

	$sql = 'SELECT * FROM taxon WHERE genus = ' . $gbif_db->qstr($genus) . ' AND specificEpithet <> "" ORDER BY specificEpithet';
	
	$result = $gbif_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	while (!$result->EOF) 
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
		
		$species[] = $concept;
		
		$result->MoveNext();	
	}
	
	//print_r($species);
	
	return $species;
}

//--------------------------------------------------------------------------------------------------
function get_genera($family)
{
	global $gbif_db;
	global $config;
	
	$genera = array();

	$sql = 'SELECT DISTINCT canonicalName FROM taxon WHERE family = ' . $gbif_db->qstr($family) . ' AND taxonRank="genus" AND taxonomicStatus="accepted"';
	
	$result = $gbif_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	while (!$result->EOF) 
	{
		$genera[] =  $result->fields['canonicalName'];
		
		$result->MoveNext();	
	}

	return $genera;
}


/*
$one = get_species('Raorchestes');
$two = get_species('Philautus');

$one = get_species('Chaerephon');
$two = get_species('Tadarida');


$species = array_merge($one,$two);
*/

$family = 'Molossidae Gervais, 1856';

$genera = get_genera($family);
print_r($genera);

$species = array();
foreach ($genera as $genus)
{
	$species = array_merge($species, get_species($genus));
}

foreach ($species as $species_1)
{
	
	foreach ($species as $species_2) 
	{
		// compare names
		$d = compare($species_1->specificEpithet, $species_2->specificEpithet);
		if ($d == 100)
		{
			echo '●';
		}
		else 
		{
			echo ' ';
		}
	}
	echo ' ' . $species_1->canonicalName;
	
	
	echo "\n";
}
	




?>