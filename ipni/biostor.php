<?php

// look up in BioStor

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db->EXECUTE("set names 'utf8'"); 

$journal = 'Edinburgh J. Bot.';
$journal = 'Kew Bull.';
$journal = 'Syst. Bot.';
$journal ='Feddes Repert.';

$journal ='J. Arnold Arbor.';
$journal ='Novon';
$journal = 'J. Wash. Acad. Sci.';

$journal = 'Arnaldoa';

//$journal ='Novon';

$journal = 'Rhodora';

$sql = 'SELECT * FROM ipni.names WHERE Publication=' . $db->qstr($journal) . ' AND biostor IS NULL';

//$sql .= ' AND Collation LIKE "101%"';

//$sql .= ' LIMIT 100';

//$sql .= ' AND Publication_year_full ="1965"';

//$sql = 'SELECT * FROM names WHERE Id="1020601-1"';
//$sql = 'SELECT * FROM names WHERE Id="17572540-1"';

//$sql = 'SELECT * FROM names WHERE Genus="Jaltomata"';

$sql = 'SELECT * FROM names WHERE Publication="Sendtnera"';
$sql = 'SELECT * FROM names WHERE Publication="Moscosoa"';
$sql = 'SELECT * FROM names WHERE Publication="Moscosoa" and biostor is null';

$sql = 'SELECT * FROM names WHERE Genus="Lessingianthus" and Publication="Proc. Biol. Soc. Washington"';


$sql = 'SELECT * FROM names WHERE Publication="Gard. Bull. Singapore" and Collation <>"" and biostor is null';

$sql = 'SELECT * FROM names WHERE Publication="Phytologia" and Collation <>"" and biostor is null';
$sql = 'SELECT * FROM names WHERE Publication="Contr. Univ. Michigan Herb." and Collation <>"" and biostor is null';
$sql = 'SELECT * FROM names WHERE Publication="Phytoneuron" and Collation <>"" and biostor is null';

$sql = 'SELECT * FROM names WHERE issn="0016-5301" and Collation <>"" and biostor is null';

$sql = 'SELECT * FROM names WHERE Publication="Proc. Biol. Soc. Washington" and Collation <>"" and biostor is null';

// Gard. Bull. Singapore 
$sql = 'SELECT * FROM names WHERE Publication="Gard. Bull. Singapore" and Collation <>"" and biostor is null';

$sql = 'SELECT * FROM names WHERE Publication="Gard. Bull. Singapore" and Collation <>"" and biostor is null and Publication_year_full like "201%"';

//$sql = 'SELECT * FROM names WHERE issn="1815-8242" and Collation <>"" and biostor is null';

// Muelleria 
$sql = 'SELECT * FROM names WHERE issn="0077-1813" and Collation <>"" and biostor is null and Publication_year_full like "200%"';

$sql = 'SELECT * FROM names WHERE issn="0077-1813" and Collation LIKE "12%" and biostor is null';




//$sql = 'SELECT * FROM names WHERE Id="17343590-1"';
//$sql = 'SELECT * FROM names WHERE Id="901452-1"';

$use_year = true;
$use_year = false;

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$reference = new stdclass;
	
	$reference->id = $result->fields['Id'];
	
	$reference->journal = new stdclass;
	$reference->journal->name = $result->fields['Publication'];
	
	// Clean
	if ($reference->journal->name == 'Kew Bull.')
	{
		$reference->journal->name = 'Kew Bulletin';
	}
	
	if ($result->fields['issn'] != '')
	{
		$identifier = new stdclass;
		$identifier->type = 'issn';
		$identifier->id = $result->fields['issn'];
		$reference->journal->identifier[] = $identifier;
	}
	
	$reference->year = $result->fields['Publication_year_full'];
	
	//$reference->year = preg_replace('/\s+\[.*\]$/', '', $reference->year);
	
	if (preg_match('/[0-9]{4}\s+\[(?<year>[0-9]{4})\s+publ/', $reference->year, $m))
	{
		$reference->year = $m['year'];
	}
	
	echo "-- " .  $result->fields['Id'] . " " . $result->fields['Publication'] . " " . $result->fields['Collation'] . " " . $result->fields['Publication_year_full'] . "\n";

	
	$matched = false;
	
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+)\.\s+(?<pages>\d+)\./', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	// Phytoneuron
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[0-9]{4}-\d+):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	// No. 7, 43 (1942)
	if (!$matched)
	{
		if (preg_match('/No.\s+(?<volume>\d+)(,|\.|,.)\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// No. 4 (Stud. Trop. Am. Pl. I.) 26
	if (!$matched)
	{
		if (preg_match('/No.\s+(?<volume>\d+)\s+\(S.*\)\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\((?<issue>.*)\):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}

	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+):\s+(?<pages>\d+)[,]?/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\s+(?<pages>\d+)$/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// 1936, xvii. 48
	if (!$matched)
	{
		if (preg_match('/[0-9]{4},\s+(?<volume>[ivxlc]+)\.\s+(?<pages>\d+)\.?$/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// xliii. 74 1962
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ivxlc]+)\.\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	if ($matched)
	{
		// lookup in BioStor
		$found = false;
		
		$url = 'http://direct.biostor.org/micro.php?';
		
		$url .= 'journal=' . urlencode($reference->journal->name);
		$url .= '&volume=' . $reference->journal->volume;
		$url .= '&page=' . $reference->journal->pages;
		
		if ($use_year)
		{
			$url .= '&year=' . $reference->year;
		}
		
		echo "-- $url\n";
		
		$json = get($url);
		
		//echo $json;
		
		$obj = json_decode($json);
		
		
		if ($obj->count == 1)
		{
			$found = true;
			$id = $reference->id;
			$reference = $obj->results[0];
			$reference->id = $id;
		}
		
		//print_r($reference);
		
		if ($found)
		{
			
			$updates = array();
						
			foreach ($reference->identifier as $identifier)
			{
				switch ($identifier->type)
				{
					/*
					// we want BHL to be the actual page, this BHL is the first page
					case 'bhl':
						$updates[] = 'bhl=' . $identifier->id;
						break;
					*/

					case 'biostor':
						$updates[] = 'biostor=' . $identifier->id;
						break;
						
					case 'doi':
						$updates[] = 'doi="' . $identifier->id . '"';
						break;
						
					default:
						break;
				}
			}
			if (isset($reference->journal->identifier))
			{
				foreach ($reference->journal->identifier as $identifier)
				{
					switch ($identifier->type)
					{
						case 'issn':
							$updates[] = 'issn="' . $identifier->id . '"';
							break;
							
						default:
							break;
					}
				}
			}
			
			echo 'UPDATE names SET ' . join(",", $updates) . ' WHERE Id="' . $reference->id . '";' . "\n";
		}
	}
	else
	{
		echo "-- not matched\n";
		//exit();
	}
	
	
	$result->MoveNext();
}

?>