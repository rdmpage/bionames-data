<?php

require_once(dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(__FILE__) . '/gnrd.php');
require_once (dirname(__FILE__) . '/ubio_findit.php');

//--------------------------------------------------------------------------------------------------
// Return a list of unique name strings from uBio response
function get_unique_names_ubio($response)
{
	$names = array();
	foreach ($response as $k => $v)
	{
		if (isset($v['canonical']))
		{
   			$names[] = $v['canonical'];
   		}
   	}
   	$names = array_unique($names);
   	return $names;
}



//--------------------------------------------------------------------------------------------------
function eol_search($string)
{
	$hit = null;

	$eol_id = 0;
	
	$url = 'http://eol.org/api/search/1.0.json?q='
		. urlencode($string) . '&page=1&exact=false&filter_by_taxon_concept_id=&filter_by_hierarchy_entry_id=&filter_by_string=&cache_ttl=';
		
	//echo $url . "\n";
		
	$json = get($url);
	
	$obj = json_decode($json);
	
	//print_r($obj);
	
	if (count($obj->results) > 0)
	{
		$content = $obj->results[0]->content;
		
		$hits = explode(";", $obj->results[0]->content);
		
		// clean
		for ($i = 0; $i < count($hits); $i++)
		{
			$hits[$i] = strtolower(trim($hits[$i]));
		}
		//print_r($hits);
		
		$query = strtolower($string);
		for ($i = 0; $i < count($hits); $i++)
		{
			if ($hits[$i] == $query)
			{
				$eol_id = $obj->results[0]->id;
				
				$hit = new stdclass;
				$hit->eol_id = $obj->results[0]->id;
				$hit->title = $obj->results[0]->title;

			}
		}	
		
		
	}
	
	return $hit;
}


//--------------------------------------------------------------------------------------------------
function parse_name($string)
{
	$p = new stdclass;
	
	$matched = false;
	
	/*
	if (!$matched)
	{
		if (preg_match('/^(?<part1>.*)\s+\((?<part2>.*)\)$/Uu', $string, $m))
		{
			$p->names = array();
			$p->ids =  array();
			$p->names[] = $m['part1'];
			$p->names[] = $m['part2'];
			
			$matched = true;
		}
	}
	*/
	
	/*
	if (!$matched)
	{
		if (preg_match('/^(?<part1>.*);\s+(?<part2>voucher.*)$/Uu', $string, $m))
		{
			$p->names = array();
			$p->codes = array();
			$p->ids =  array();
			$p->names[] = $m['part1'];
			$p->codes[] = $m['part2'];
			
			$matched = true;
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<part1>.*)\s+\((?<part2>[A-Z]{2}.*)\)$/Uu', $string, $m))
		{
			$p->names = array();
			$p->codes = array();
			$p->ids =  array();
			$p->names[] = $m['part1'];
			$p->codes[] = $m['part2'];
			
			$matched = true;
		}
	}
	*/
	
	if (!$matched)
	{
		// OK, simple rules don't work, let's get serious and use external tools
		
		if (0)
		{
			$response = get_names_from_text($string);
			// Unique names
			$namestrings = get_unique_names($response);
		}
		else
		{
			// uBio
			$response = ubio_findit($string);
			// Unique names
			$namestrings = get_unique_names_ubio($response);
		}		
		
		if (count($namestrings) > 0)
		{
			$matched = true;
			
			$p->names = array();
			$p->ids =  array();
			
			foreach ($namestrings as $name)
			{
				$p->names[] = $name;
			}
		
		}
		
		
	}
	
	if (!$matched)
	{
		if (preg_match('/^(?<part1>.*)\s+(?<part2>[A-Z]{2}.*)$/Uu', $string, $m))
		{
			$p->names = array();
			$p->codes = array();
			$p->ids =  array();
			$p->names[] = $m['part1'];
			$p->codes[] = $m['part2'];
			
			$matched = true;
		}
	}
	

	if (!$matched)
	{
		$p->names = array();
		$p->ids =  array();
		
		$p->names[] = $string;
	}	
	
	return $p;
}

//--------------------------------------------------------------------------------------------------









$strings = array(
/*
'Tetrao urogallus',
//'Tetrao urogallus (western capercaillie)',
'western capercaillie',
'Rattus tiomanicus (Malaysian field rat)',
'Rattus tiomanicus',
'Malaysian field rat',
'Pan paniscus','bonobo'
*/
/*
'Papio hamadryas ursinus',
'Papio hamadryas',
'Hamadryas baboon',
'Papio anubis',
'Olive baboon'*/

/*
'Rattus tiomanicus (Malaysian field rat)',
'Macaca fuscata (Monkey)',
'Macaca fuscata fuscata (Shodoshima)',
'Lemur catta (ring-tailed lemur)',
*/

/*
'Zosterops griseotinctus (Louisiade white-eye)',
'Zonotrichia albicollis (FMNH S05-063)',
'Zeus faber (John dory)',
'Zenaida macroura M379',
'Zeiraphera canadensis (spruce budmoth)',
'zebra dove',
*/

/*
'Zalophus californianus (California sea lion)',
'woodland caribou (Rangifer tarandus caribou)',
'wild sunflower (Tithonia diversifolia)',
'white bream (Blicca bjoerkna)',
'wheat (Triticum sp.)',
*/

/*
'Wattled starling (Creatophora cinerea)',
'water buffalo',
'Vulpes vulpes (red fox)',
'Vulpes vulpes (common fox)',
*/

/*
'Venerupis philippinarum (clam)',
'Varecia variegata (black-and-white ruffed lemur)',
'Ursus maritimus (polar bear)',
'Urocissa erythrorhyncha (Red-billed Blue Magpie)',
'Umbra limi (mud minow)',
'Tursiops truncatus (Bottlenosed dolphin)',
'turkey (Meleagris gallopavo)',
'turquoise tanager',
'Trygonorrhina fasciata (Southern fiddler)'
*/

/*
'Thraupis palmarum (MBM JK06-079)',
'Thomasomys oreas FMNH 175243',
'Theobroma cacao (cocoa)',
'Tetragonula carbonaria (synonym: Trigonacarbonaria)',
'Tangara schrankii schrankii (Eastern green and goldtanager)',
'Tangara dowii (MBM JK06-268)',
'Tamias striatus; voucher LSUMZ 36349'

*/

/*
'Taeniura lymma (Bluespotted ribbontail stingray)',
'Taeniura lymma (Bluespotted ribbontail ray)',
'Symposiachrus trivirgatus (spectacled monarch)',
'sweet potato (Ipomoea batatas L.)',
'Surinam crested oropendula (Psarocolius decumanusdecumanus)',
'Sphyrna tiburo (Bonnethead shark)'

*/

/*
'Sphyrna tiburo (Bonnethead shark)',

'Achatina fulica (giant African snail)',

'acorn gall on Quercus pyrenaica',
'Adenium obesum (Forssk.) Roem. & Schult.(desertrose)',
'Aedes esoensis with blood-meal of Cervus nipponyesoensis',
'Aedes vexans ATCC 30268',
'Agromyza sp.',
'Agropyron smithii; western wheatgrass',


'Tamias striatus; voucher LSUMZ 36349',
'Tursiops truncatus (Bottlenosed dolphin)',*/

/*'Zygodontomys brevicauda',
'Zygodontomys brevicauda (wild rodent)',
'Zygodontomys brevicauda; voucher FHV-4030',*/

//'Zygodontomys cherriei',
//'Zonotrichia capensis MSB:Bird:31391; tissue voucher:NK162845',

'Trigonaspis synaspis gall on Quercus faginea',
'tiger puffer (Takifugu rubripes)',
'Thomasomys oreas FMNH 175243',
'Surinam crested oropendula (Psarocolius decumanus decumanus)'




);

foreach ($strings as $string)
{
	$p = parse_name($string);
	$p->titles = array();
	
	$p->raw_string = $string;
	
	//print_r($p);
	
	$p->markup = $p->raw_string;
	
	
	$n = count($p->names);
	for ($i = 0; $i < $n; $i++)
	{
		$hit = eol_search($p->names[$i]);
		if ($hit)
		{
			$p->ids[$i] = $hit->eol_id;
			$p->titles[$i] = $hit->title;
		}
		
		$tag_open = '<name';
		
		if (isset($p->ids[$i]))
		{
			$tag_open .= ' id="' . $p->ids[$i] . '"';
		}
		$tag_open .= '>';
		
		$tag_close = '</name>';
		
		$p->markup = preg_replace('/(' . $p->names[$i] . ')/', $tag_open . '$1' . $tag_close, $p->markup);
		
	}
	
	print_r($p);
	
}


?>