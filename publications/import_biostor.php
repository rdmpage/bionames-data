<?php

// Import a BioStor references and add to CouchDB
require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/reference.php');
require_once (dirname(__FILE__) . '/biostor.php');

require_once (dirname(__FILE__) . '/publication_utils.php');

$ids = array(100163);

$ids = array(79223);

$ids = array(79013,79223,65542,65937);

$ids = array(65896,65879,81423);

$ids=array(105416);

// Pararhabditis
$ids=array(126305,114583);

$ids=array(105416,105402,125890,59343,107177);

$ids=array(126315);

$ids=array(110878);
$ids=array(111225);
$ids=array(84533);
$ids=array(126535);

// Flea example 
$ids=array(57833,57923,125980,102744,125895,102623,126544);

// Atlantoxerus getulus
$ids=array(86430,58918,107280,107205,59343,81139);

// Xerus getulus
$ids=array(91428,91510,108413,108335,83078,107923,13630,58918,77893,59343);

$ids=array(91510,
83078,
59343
);

// The Acridoidea (Orthoptera) of Madagascar I. Acrididae (except Acridinae)
$ids=array(246);

//$ids=array(65873);

$ids = array(80970);

$ids=array(54668,14790,54677,99677,127560,60044,127575,127574,99512,107049,106157,105730,125900,127561,105962,61688,58301,105714,58630,14789,98326,14787,106156,97776,99962,98307,14781,97871,4435,844,97482,832,97490,101826,106132);

$ids=array(114818,14769,100838,123,51755,108947);

$ids=array(107030);

$ids=array(65541);
$ids=array(127656);
$ids=array(102751);
$ids=array(65873);
$ids=array(1291);
$ids=array(65875);
$ids=array(106260);
$ids=array(50072,120824);
$ids=array(110907);
$ids=array(53142);

// Notulae Ichthyologiae Orientalis V. A. synopsis of the oriental cyprinid genus Sikukia VI. 
// Status of the Kampuchea cyprinid Albulichthy krempfi
// http://zoobank.org/References/0C7FC4A1-B8A9-4804-811C-AA7BB06A4000
$ids=array(); 

$ids=array(127780);

// On the genus Chalinolobus, with descriptions of new or little-known species
$ids=array(127781);

// Description of a Species of Orang, from the north-eastern province of British East India, lately the kingdom of Assam
$ids=array(127799);

// Elenco dei Cefalopodi della «Vettor Pisani»
$ids=array(127801);

// The genus Selenops (Araneae) in South Africa
$ids=array(127984);

// to do...
foreach ($ids as $id)
{
	
	$json = get('http://biostor.org/reference/' . $id . '.bibjson');
	
	if ($json != '')
	{
		$reference = json_decode($json);
		
		if ($reference)
		{
			// ignore stuff not linked to BHL
			$go = true;
			
			if ($reference->link)
			{
				foreach ($reference->link as $link)
				{
					if ($link->url == 'http://www.biodiversitylibrary.org/page/0')
					{
						$go = false;
					}
				}
			}
			
			if ($go)
			{			
				$reference->_id = 'biostor/' . $id;	
				
				$biostor = new stdclass;
				$biostor->time = time();
				$biostor->url = 'http://biostor.org/reference/' . $id . '.bibjson';
				$reference->provenance['biostor'] = $biostor;
				
				
				$reference->citation = reference_to_citation_string($reference);
				
				// thumbnail
				$url = 'http://biostor.org/reference/' . $id . '.json';
				$json = get($url);
				
				if ($json != '')
				{				
					$obj = json_decode($json);
					$reference->thumbnail = $obj->thumbnails[0];		
				}
				
				biostor_enhance($reference, $id);
				
				//print_r($reference);
				
				have_reference_already($reference);
				
				$couch->add_update_or_delete_document($reference,  $reference->_id);
			}
		}		
	}
}

?>