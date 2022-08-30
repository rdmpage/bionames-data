<?php

// Match pages within a BioStor reference to BHL pages

error_reporting(E_ALL ^ E_DEPRECATED);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

//--------------------------------------------------------------------------------------------------

function collation_to_locators($result)
{
	$reference = new stdclass;
	
	$reference->id = $result->fields['Id'];
	
	$reference->journal = $result->fields['Publication'];
	
	// Clean
	if ($reference->journal == 'Kew Bull.')
	{
		$reference->journal = 'Kew Bulletin';
	}
	
	
	$reference->year = $result->fields['Publication_year_full'];
	
	$reference->biostor = $result->fields['biostor'];
	
	
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
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// 4e ser., 8, 1986, section B, Adansonia no. 4: 420
	// 4 ser., 10, section B, Adansonia no. 1: 51 (-52), fig
	if (!$matched)
	{
		if (preg_match('/^\d+[e]?\s+ser.,?\s+(?<volume>\d+)[,|\.](.*)\d+:\s+(?<pages>\d+)/u', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}	
	
	
	// Sér. 4, 12(2): 206
	if (!$matched)
	{
		if (preg_match('/^Sér. \d+,\s+(?<volume>\d+)\((.*)\):\s+(?<pages>\d+)/u', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
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
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
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
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
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
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\((?<issue>.*)\):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->issue = $m['issue'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}

	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+):\s+(?<pages>\d+)[,]?/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\s+(?<pages>\d+)$/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
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
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
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
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}

	return $reference;
}

//----------------------------------------------------------------------------------------


$cache = array();


$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db->EXECUTE("set names 'utf8'"); 

$sql = 'SELECT * FROM names WHERE biostor IS NOT NULL';

$sql .= ' AND issn="0240-8937"';

//$sql .= ' AND genus="Malleastrum"';

//$sql .= ' AND biostor=247133';



//LIMIT 10';



$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$reference = collation_to_locators($result);
	
	if ($matched)
	{
		//print_r($reference);
		
		if (!isset($cache[$reference->biostor]))
		{
			$url = 'http://direct.biostor.org/reference/' . $reference->biostor . '.bibjson';		
			$json = get($url);		
			$obj = json_decode($json);
			
			$cache[$reference->biostor] = $obj;
		
		}
		
		$obj = $cache[$reference->biostor];
		
		//print_r($obj->bhl_pages);
		
		// match
		
		$PageID = 0;
		
		foreach ($obj->bhl_pages as $k => $v)
		{
			if (is_numeric($k))
			{
			
			}
			else
			{
				if (preg_match('/Page\s+\[?(?<page>\d+)\]?/', $k, $m))
				{
					if ($m['page'] == $reference->pages)
					{
						$PageID = $v;
					}
				}
			}
		}
		
		echo "-- PageID=$PageID\n";
		
		if ($PageID != 0)
		{
			echo 'UPDATE names SET bhl=' . $PageID . ' WHERE Id="' . $reference->id . '";' . "\n";
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