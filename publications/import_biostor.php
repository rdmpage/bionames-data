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

// The American species of snapping shrimps of the genus Synalpheus
$ids=array(535);

// The lizards of the “Chevert” expedition
$ids=array(14765);

// Note sur quelques Mammiferes du Tibet oriental
$ids=array(128003);

// The Soricidae of Taiwan
$ids=array(127590);

// Description de quelques reptiles nouveaux découverts a Madagascar en 1870
$ids=array(128008);

// Sur une espèce nouvelle du genre Deckenia (Hilgendorf) recueilli par M. Alluaud aux Seychelles, Indian Ocean
$ids=array(128021);

// Descriptions de quelques arachnides nouveaux de la section des cribellatés
$ids=array(70821);

// Arachnida in Scientific Results of Explorations by the U.S. Fish Commission Steamer 'Albatross'
$ids=array(128036);

// New reptiles and batrachians collected by Dr. Hugh M. Smith in Siam
$ids=array(65629);

// Descriptions of New Species of Coleoptera, from California
$ids=array(128048);

// The second and third known specimens of the African molossid bat, Tadarida lobata
$ids=array(128096);

// Variation in the African bat, Tadarida lobata, with notes on habitat and habits (Chiroptera, Molossidae)
$ids=array(128097);

// Systematics of the genus Eumops (Chiroptera, Molossidae)
$ids=array(128098);

// The Entozoa of the Hippopotamus
$ids=array(107578);

// Voyage du Dr. Louis Vaillant dans lAsie centrale (Mission Pelliot). Reptiles et batraciens
$ids=array(128191);

// Metaprotella sandalensis, n. sp
$ids=array(128332);

// List of the Crustacea dredged on the coast of Labrador by the expedition under the direction of W. A. Stearns, in 1882
$ids=array(127726);

// A Multivariate Study of the Family Molossidae (Mammalia, Chiroptera): Morphology, Ecology, Evolution
$ids=array(65873);

// Studies of South American Psammocharidae Part I
$ids=array(97864);

// Gryllidae de la Nouvelle-Calédonie et des Iles Loyality
$ids=array(129465);

// LXV.—A synopsis of the siluroid fishes of the genus Liocassis,with descriptions of new species
$ids=array(52071);

// Notes on the Rodent Genus Heterocephalus
$ids=array(108329);

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