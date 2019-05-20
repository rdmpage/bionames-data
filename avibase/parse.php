<?php

// Extract references from avibase

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(dirname(__FILE__)) . '/lib/taxon_name_parser.php');


	

function process($m, &$obj)
{
	$obj->parsed = true;
	foreach ($m as $k => $v)
	{
		if (!is_numeric($k))
		{
			$obj->{$k} = trim($v);
		}
	}
	
	if (isset($obj->name))
	{	
		$pp = new Parser();	
		$r = $pp->parse($obj->name);
		
		if (isset($r->scientificName))
		{
			if ($r->scientificName->parsed)
			{
				$obj->basionym = $r->scientificName->canonical;
			}
		}
	}
	
	// fix parsing errors
	// fix
	
	if (isset($obj->journal))
	{
	
		if (preg_match('/(?<journal>.*), [N|n]o.\s+(?<volume>\d+)/', $obj->journal, $mm))
		{
			$obj->journal = $mm['journal'];
			$obj->volume = $mm['volume'];
		}	

		if (preg_match('/(?<journal>.*)[,|.]\s+\((?<series>\d+)\)/', $obj->journal, $mm))
		{
			$obj->journal = $mm['journal'];
			$obj->series = $mm['series'];
		}	

		if (preg_match('/(?<journal>.*)[,|.]\s+ser\.\s+(?<series>\d+)/', $obj->journal, $mm))
		{
			$obj->journal = $mm['journal'];
			$obj->series = $mm['series'];
		}	
	
		$obj->journal = str_replace('Ley den', 'Leyden', $obj->journal);
	}	

}

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root', '', 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$sql = 'SELECT * FROM avibase WHERE `type` like "%1961%"';

$sql = 'SELECT * FROM avibase WHERE `type` like "%Ibis%" LIMIT 100';

//$sql = 'SELECT * FROM avibase WHERE species LIKE "Amazilia fimbriata%"';
$sql = 'SELECT * FROM avibase WHERE species LIKE "Collocalia %"';
$sql = 'SELECT * FROM avibase WHERE species LIKE "Copsychus %"';

//$sql = 'SELECT * FROM avibase WHERE `type` like "%Am. Mus. Novit.%"';
//$sql = 'SELECT * FROM avibase WHERE `type` like "%Bull. Brit. Orn. Club%"';

$sql = 'SELECT * FROM avibase WHERE `type` like "%Proc. U. S. Nat. Mus.%"';
$sql = 'SELECT * FROM avibase WHERE `type` like "%Bull. Brit. Orn. CI.%"';

$sql = 'SELECT * FROM avibase WHERE `type` like "%Bull. Brit. Ornith. Club%"';

$sql = 'SELECT * FROM avibase WHERE `type` like "%Auk,%"';

$sql = 'SELECT * FROM avibase WHERE `type` like "%Ann. and Mag. Nat. Hist.%"';
//$sql = 'SELECT * FROM avibase WHERE `type` like "%Journ. f. Orn.%"';

$sql = 'SELECT * FROM avibase WHERE `type` like "%Proc. Biol. Soc. Washington%"';
$sql = 'SELECT * FROM avibase WHERE `type` like "%Ibis%"';

$journal = 'Notes Leyden Mus.';
$journal = 'Mitt. Zool. Mus. Berlin';
$journal = 'Novit. Zool.';
$journal = 'Proc. Zool. Soc. Lon- don';
$journal = 'Journ. Ornith.';
$journal = 'Bull. Brit. Orn. CL';
$journal = 'Nov. Zool.';
$journal = 'Proc. Linn. Soc. New South Wales';
$journal = 'Proc. Biol. Soc. Wash.';
$journal = 'Bull. Am. Mus. Nat. Hist.';
$journal = 'Journ. f . Orn.';
$journal = 'Proc. Zool. Soc. London';
$journal = 'Ann. Natal Mus.';
$journal = 'Ann. Transvaal Mus.';
$journal = 'Proc. Biol. Soc. Washing- ton';
$journal = 'Emu';

$journal = 'Ann. Mus. Civ. Genova';
$journal = 'Journ. Washington Acad. Sci.';

$journal = 'Proc. Acad. Nat. Sci. Phila.';

$journal = 'Trans. San Diego Soc. Nat. Hist.';

$journal = 'Journ. Fed. Malay States Mus.';
$journal = 'Bull Brit. Orn. CI.';
$journal = 'Bull. Brit. Ornith. Club';
$journal = 'Treubia';
$journal = 'Ornith. Mon';
$journal = 'Madras Journ';
$journal = 'Journ. Ornith.';
$journal = 'Ann. Transvaal Mus.';
$journal = 'Ann. Carnegie Mus.';
$journal = 'Bull. Amer. Mus. Nat. Hist.';
$journal = 'Stray Feath';

$journal = 'Journ. As. Soc. Bengal';
$journal = 'Abh. Ber. K. Zool. Mus.';
$journal = 'Ned. Tijdschr. Dierk.';
$journal = 'Nov. Zoo';
$journal = 'Journ. Linn. Soc. London';
$journal = 'Compt. Rend. Acad. Sci. Paris';
$journal = 'U. S. Expl. Exped';
$journal = 'Dobuts';
$journal = 'Gen. Bds';
$journal = 'Verh. Orn. Ges. Bayern';
$journal = 'Atti R.';
$journal = 'Journ.';
$journal = 'Trans.';
$journal = 'Bull.';
$journal = 'Syst. Nat.';
$journal = 'Mus. P';
//$journal = 'Ann. Zool.';
$journal = 'Cat. B';
$journal = 'Math';
$journal = 'Ann.';
$journal = 'Proc.';
$journal = 'Proc.';
$journal = 'Nederl. Tijdschr. Dierk.';
$journal = 'Proc. Zool. Soc. London';
$journal = 'Bull. Raffles Mus.';
$journal = 'Str. Feath';
$journal = 'Vogels Ned';
$journal = 'List Birds Mam';
$journal = 'Bds. Mamm. Steere';
$journal = 'Synop. Acc';
$journal = 'Syn. List Acc';
$journal = 'Notes Ley den Mus';
$journal = 'Postilla, Peabody';
$journal = 'Condor';
$journal = 'Univ. Calif';
$journal = 'Rev. Zool.';
$journal = 'Archiv. ';
$journal = 'Oiseau';
$journal = 'Ornith. ';
$journal = 'Bull. Brit. Orn';
$journal = 'Orn. M';
$journal = 'Occ.';
$journal = 'Cleveland';
$journal = 'Bull. Mus';
$journal = 'Cat. Col';
$journal = 'Orn. Bras';
$journal = 'Results ';




$sql = 'SELECT * FROM avibase WHERE `type` like "%' . $journal . '%"';


//$author = 'Zimmer';
//$sql = 'SELECT * FROM avibase WHERE `author` like "%' . $author . '%" and journal is NULL';


//$sql = 'SELECT * FROM avibase WHERE species LIKE "Bradypterus %"';



$sql = 'SELECT * FROM avibase WHERE peters_line=301154';

//

$sql .= ' AND journal IS NULL';

//$sql .= ' LIMIT 100';

//$sql = "select * from avibase where type REGEXP '^[A-Z][a-z]+ [a-z]+ [A-Z][a-z]+, [0-9]{4}' and journal is null;";
//$sql = "select * from avibase where type REGEXP '^[A-Z][a-z]+ [a-z]+ [a-z]+ [A-Z][a-z]+, [0-9]{4}' and journal is null;";

//$sql = "select * from avibase where journal is null and basionym is not null;";



$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	

	$accepted_name = $result->fields['species_subspecies'];

	$str = $result->fields['type'];
	
	//echo $str . "\n";
	
	$str = str_replace('- ', '', $str);
	
	$str = preg_replace('/p\.\s+(\d+)[A-Z]/', "p. $1 $2", $str);
	
	//echo $accepted_name . "\n";
	
	$matched = false;
	
	$obj = new stdclass;
	$obj->parsed = false;
	$obj->str = $str;
	$obj->accepted_name = $accepted_name;
	
	
	
	//print_r($r);
	
	$m = array();
	
	if (!$matched)
	{
		if (preg_match('/^(?<name>.*),\s+(?<journal>Bull.*\.),\s+(?<volume>\d+), (?<year>[0-9]{4}), p.\s+(?<page>\d+)\b/', $str, $m))
		{
			print_r($m);
			//exit();
			
			process ($m, $obj);
			$matched = true;
		}
	}		
	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<name>.*),\s+(?<journal>.*),\s+(?<volume>\d+),\s+pt.\s+(?<issue>\d+), (?<year>[0-9]{4}), p.\s+(?<page>\d+)\b/', $str, $m))
		{
			//print_r($m);
			//exit();
			
			process ($m, $obj);
			$matched = true;
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<name>.*),\s+(?<year>[0-9]{4}),\s+(?<journal>.*[a-z]),\s+p.\s+(?<page>\d+)\b/', $str, $m))
		{
			//print_r($m);
			//exit();
			
			process ($m, $obj);
			$matched = true;
		}
	}		
	
		
	if (!$matched)
	{
		if (preg_match('/^(?<name>.*),\s+(?<journal>.*\.),\s+(?<volume>\d+),\s+(?<year>[0-9]{4}),\s+no\.\s+(?<issue>\d+),\s+p.\s+(?<page>\d+)\b/', $str, $m))
		{
			//print_r($m);
			//exit();
			
			process ($m, $obj);
			$matched = true;
		}
	}		
		
		
	if (!$matched)
	{
		if (preg_match('/^(?<name>.*),\s+(?<journal>.*),\s+(?<volume>\d+)\s*\((?<issue>\d+)\)\s*,\s+p.\s+(?<page>\d+)\b/', $str, $m))
		{
			//print_r($m);
			//exit();
			
			process ($m, $obj);
			$matched = true;
		}
	}		

	
	// journal, volume, year, p. page
	if (!$matched)
	{
		if (preg_match('/^(?<name>.*),\s+(?<journal>.*),\s+(?<volume>\d+),\s+(?<year>[0-9]{4}),\s+p. (?<page>\d+)\b/Uu', $str, $m))
		{
			//print_r($m);
			
			process ($m, $obj);
			$matched = true;
		}
	}
	
	// journal, volume=year, p. page
	if (!$matched)
	{
		if (preg_match('/^(?<name>.*),\s+(?<journal>.*),\s+(?<year>[0-9]{4}),\s+p. (?<page>\d+)\b/Uu', $str, $m))
		{
			//print_r($m);
			
			process ($m, $obj);
			$matched = true;
		}
	}
	
	
	// Amer. Mus. Novit., no. 1072, p. 1Mt.
	if (!$matched)
	{
		if (preg_match('/^(?<name>.*(?<year>[0-9]{4})),\s+(?<journal>.*),\s+[N|n]o.\s+(?<volume>\d+),\s+p.\s+(?<page>\d+)[A-Z]/', $str, $m))
		{
			//print_r($m);
			
			process ($m, $obj);
			$matched = true;
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<name>.*\s+(?<year>[0-9]{4}))(\s+\((\d+\s+)?\w+\))?,\s*(?<journal>.*),(\s+[N|n]o.)?\s+(?<volume>\d+)[a-z]?,(\s+p[p]?\.)?\s+(?<page>\d+)\b/Uu', $str, $m))
		{
			//print_r($m);
			
			process ($m, $obj);
			$matched = true;
		}
	}		

	if (!$matched)
	{
		if (preg_match('/^(?<name>.*(?<year>[0-9]{4})),\s+(?<journal>.*),\s+p.\s+(?<page>\d+)[A-Za-z]/', $str, $m))
		{
			//print_r($m);
			
			process ($m, $obj);
			$matched = true;
		}
	}		

	if (!$matched)
	{
		if (preg_match('/^(?<name>.*(?<year>[0-9]{4})),\s+(?<journal>.*)\s*\((?<volume>[0-9]{4})\),\s+p.\s+(?<page>\d+)\b/', $str, $m))
		{
			//print_r($m);
			
			process ($m, $obj);
			$matched = true;
		}
	}		

	if (!$matched)
	{
		if (preg_match('/^(?<name>.*(?<year>[0-9]{4})),\s+(?<journal>.*),\s+p.\s+(?<page>\d+)\b/', $str, $m))
		{
			//print_r($m);
			
			process ($m, $obj);
			$matched = true;
		}
	}		

	// just grab name 
	if (!$matched)
	{
		if (preg_match('/^(?<name>[A-Z][a-z]+ [a-z]+(\s+[a-z]+)? [A-Z][a-z]+, (?<year>[0-9]{4}))/', $str, $m))
		{
			//print_r($m);
			
			process ($m, $obj);
			$matched = true;
		}
	}		
	
	
	
	
	//print_r($obj);
	
	echo "-- " . $obj->str . "\n";
	
	if ($obj->parsed)
	{
		if (isset($obj->journal) && strlen($obj->journal) > 40)
		{
			if (isset($obj->journal)) { unset($obj->journal); }
			if (isset($obj->volume)) { unset($obj->volume); }
			if (isset($obj->page)) { unset($obj->page); }
		}
		
		
		{
	
			$pairs = array();
		
			$sql = 'UPDATE avibase SET ';
		
			foreach ($obj as $k => $v)
			{
				switch ($k)
				{
					case 'basionym':
					case 'journal':
					case 'series':
					case 'volume':
					case 'issue':
					case 'page':
					case 'year':
						$pairs[] =  $k . '=' . '"' . addcslashes($v, '"') . '"';
						break;
					default:
						break;
				}
			}
			$sql .= join(',', $pairs);
		
			$sql .= ' WHERE species_subspecies = "' . $obj->accepted_name . '";';
		
			echo $sql . "\n";
		}		
	}
	else
	{
		echo "-- NOT PARSED\n";
	}
	
	$result->MoveNext();
}

?>