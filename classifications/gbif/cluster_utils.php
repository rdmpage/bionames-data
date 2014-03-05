<?php

// Clusters of GBIF taxa in families

require_once (dirname(dirname(dirname(__FILE__))) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/lib/lcs.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/lib/taxon_name_parser.php');


require_once (dirname(__FILE__) . '/cluster_map.php');



//--------------------------------------------------------------------------------------------------
$gbif_db = NewADOConnection('mysql');
$gbif_db->Connect("localhost", 
	'root', '', 'gbif-backbone');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

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
function p(&$o)
{
	$taxon_parser = new Parser();
	$parsed = $taxon_parser->parse($o->scientificName);

	if ($parsed->scientificName->parsed)
	{
		$o->canonicalName = $parsed->scientificName->canonical;
		
		foreach ($parsed->scientificName->details as $details)
		{
			if (isset($details->species))
			{
				if (isset($details->species->epitheton))
				{
					$o->specificEpithet = $details->species->epitheton;
				}
				if (isset($details->species->authorship))
				{
					$o->author = $details->species->authorship;
				}
			
			}
			if (isset($details->infraspecies))
			{
				if (isset($details->infraspecies->epitheton))
				{
					$o->infraSpecificEpithet = $details->infraspecies->epitheton;
				}
				if (isset($details->infraspecies->authorship))
				{
					$o->author = $details->infraspecies->authorship;
				}
			
			}
			
			
			//print_r($details);
			/*
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
			*/
		}
			
	}
}

//--------------------------------------------------------------------------------------------------
// get species/subspecies names for genus
function get_species ($genus, $family = '')
{
	global $gbif_db;
	global $config;
	
	$species = array();

	$sql = 'SELECT * FROM taxon WHERE genus = ' . $gbif_db->qstr($genus) . ' AND specificEpithet <> ""';
	
	if ($family != '')
	{
		$sql .= ' AND family=' . $gbif_db->qstr($family);
	}
	
	$sql .= ' AND taxonomicStatus="accepted" ORDER BY specificEpithet';
	
	$result = $gbif_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	while (!$result->EOF) 
	{
		$concept = new stdclass;
		$concept->_id = 'gbif/' . $result->fields['taxonID'];
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

//--------------------------------------------------------------------------------------------------
function get_families_by_class($class)
{
	global $gbif_db;
	global $config;
	
	$families = array();

	$sql = 'SELECT DISTINCT family FROM taxon WHERE `class` = ' . $gbif_db->qstr($class) . ' AND taxonomicStatus="accepted" AND family <> ""';
	
	$result = $gbif_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	while (!$result->EOF) 
	{
		$families[] =  $result->fields['family'];
		
		$result->MoveNext();	
	}

	return $families;
}

//--------------------------------------------------------------------------------------------------
function get_families_by_order($order)
{
	global $gbif_db;
	global $config;
	
	$families = array();

	$sql = 'SELECT DISTINCT family FROM taxon WHERE `order` = ' . $gbif_db->qstr($order) . ' AND taxonomicStatus="accepted" AND family <> "" ORDER BY family';
	
	//echo $sql;
	
	$result = $gbif_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	while (!$result->EOF) 
	{
		$families[] =  $result->fields['family'];
		
		$result->MoveNext();	
	}

	return $families;
}

//--------------------------------------------------------------------------------------------------
function clean_author($author)
{
	// parentheses, commas
	$author = preg_replace('/[\(|\)|,]/', '', $author);
	
	// Initials
	$author = preg_replace('/([A-Z]\.\s*)+/', '', $author);
	
	$author = trim($author);
	
	return $author;

}


//--------------------------------------------------------------------------------------------------
function get_clusters($family)
{
	$clusters = array();

	$genera = get_genera($family);
	
	$add_authority = true;
	
	$count = 0;
	foreach ($genera as $genus)
	{
		$species = get_species($genus, $family);
		
		$combinations = array();
		
		foreach ($species as $s)
		{
			
			$name = $s->specificEpithet;
			
			// do we have a subspecies?
			if (isset($s->infraSpecificEpithet))
			{
				// emit species + subspecies
				$string = $name;
				$string .= ' ' . $s->infraSpecificEpithet;
				
				if (isset($s->author) && $add_authority)
				{
					$author = $s->author;
					$author = clean_author($author);
					$string .= ' ' . $author;
				}
				$combinations[] = $string;
				
				// emit just subspecies
				$string = $s->infraSpecificEpithet;
				
				if (isset($s->author) && $add_authority)
				{
					$author = $s->author;
					$author = clean_author($author);
					$string .= ' ' . $author;
				}
				
				$combinations[] = $string;
			}
			else
			{
				// just species
				$string = $name;		
			
				if (isset($s->author) && $add_authority)
				{
					$author = $s->author;
					$author = clean_author($author);
					$string .= ' ' . $author;
				}
				$combinations[] = $string;
			}
			
			//print_r($s);
	
		}
		//echo "Combinations $genus\n";
		$combinations = array_unique($combinations);
		
		if (count($combinations) > 0)
		{
			$clusters[$genus] = array();
			
			foreach ($combinations as $s)
			{
				$clusters[$genus][] = $s;
			}
		}
	}
	
	//print_r($clusters);
	
	return $clusters;
	
}




?>