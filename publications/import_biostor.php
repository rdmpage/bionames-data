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

// West Indian Tertiary decapod crustaceans
$ids=array(129483);

// New genera and species
$ids=array(129488);

// Über einige Formen der Gattung Colohus
$ids=array(129491);

// Description de Mammifères nouveaux d'Afrique et de Madagascar
$ids=array(129491);

$ids=array(129494,102399);

// Trematodes of Canadian vertebrates
//$ids=array(102806);

// 5. Säugethiere
// Mehrere neue Spalax-Arten
$ids=array(129496, 129497);

// Vertebrates from Madagascar (4) Mammalia
$ids=array(129498);

// XXXVII.—On African bats and shrews
$ids=array(66064);

// fix 
$ids=array(129491,129491,129494,102399,129496, 129497,129488,129483,108329,52071,129465,97864);

// XLIX.—Three new species of Nyctinomus
$ids=array(87154);


$ids=array(129516);

$ids=array(4842, 74869);

$ids=array(129523);

$ids=array(127721);

$ids=array(87377);

$ids=array(82857);

$ids=array(4330,125890,125902);

$ids=array(87535,59343,1291,126599,127693,126600,79749,66157);


$ids=array(127679,58767,239,60008,113271);

$ids=array(129532,129533);

$ids=array(127656);

$ids=array(129545);

$ids=array(129970);

$ids=array(129983);

$ids=array(121698);

$ids=array(129999);

$ids=array(130000);

$ids=array(1908,100192,4943,1686);

$ids=array(129502,127783,87256,86824,87016,87462,129501,86824,87487,131696,131697,86317);

$ids=array(131729);

$ids=array(131746);

// to do
$ids=array(118307, 131907);

$ids=array(132042, 132044,476);

$ids=array(80825,80788,100659,127576);

$ids = array(132055,132056,132057);

$ids = array(79907);

$ids=array(132203,132204);

$ids=array(132207);

$ids=array(65226,132748,132749,79568);

$ids=array(52001,132764,56151,132765);

$ids=array(105183,105184,105181);

$ids=array(132790);

$ids=array(133107);

$ids=array(11263);

$ids=array(104780,133184,11264,133185,133186,133187,133188,133189,133190,133191,133193);

$ids=array(133194,104917,133195);

$ids=array(2018,49787);

$ids=array(80477,80595,80524,80597);

$ids=array(117838);
$ids=array(133698);

$ids=array(133703);

$ids=array(102350);

$ids=array(71363);

$ids=array(49090);

$ids=array(133715);

$ids=array(133737);

$ids=array(134554);

$ids=array(134559,134560,134561);

$ids=array(102369);

$ids=array(109875);

$ids=array(134850);

$ids=array(113963,69328,52124,14548);

$ids=array(112605);


// to do...
foreach ($ids as $id)
{
	
	$json = get('http://biostor.org/reference/' . $id . '.bibjson');
	
	echo $json;
	
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
				
				
				$reference->citation_string = reference_to_citation_string($reference);
				
				// thumbnail
				$url = 'http://biostor.org/reference/' . $id . '.json';
				$json = get($url);
				
				if ($json != '')
				{				
					$obj = json_decode($json);
					$reference->thumbnail = $obj->thumbnails[0];		
				}
				
				biostor_enhance($reference, $id);
				
				print_r($reference);
				
				//if (!have_reference_already($reference))
				{				
					$couch->add_update_or_delete_document($reference,  $reference->_id);
				}
			}
		}		
	}
}

?>