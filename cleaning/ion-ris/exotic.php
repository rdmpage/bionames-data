<?php

require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
// From http://snipplr.com/view/6314/roman-numerals/
// Expand subtractive notation in Roman numerals.
function roman_expand($roman)
{
	$roman = str_replace("CM", "DCCCC", $roman);
	$roman = str_replace("CD", "CCCC", $roman);
	$roman = str_replace("XC", "LXXXX", $roman);
	$roman = str_replace("XL", "XXXX", $roman);
	$roman = str_replace("IX", "VIIII", $roman);
	$roman = str_replace("IV", "IIII", $roman);
	
	$roman = str_replace("IC", "LXXXXVIIII", $roman);
	
	
	return $roman;
}
    
//--------------------------------------------------------------------------------------------------
// From http://snipplr.com/view/6314/roman-numerals/
// Convert Roman number into Arabic
function arabic($roman)
{
	$result = 0;
	
	$roman = strtoupper($roman);

	// Remove subtractive notation.
	$roman = roman_expand($roman);

	// Calculate for each numeral.
	$result += substr_count($roman, 'M') * 1000;
	$result += substr_count($roman, 'D') * 500;
	$result += substr_count($roman, 'C') * 100;
	$result += substr_count($roman, 'L') * 50;
	$result += substr_count($roman, 'X') * 10;
	$result += substr_count($roman, 'V') * 5;
	$result += substr_count($roman, 'I');
	return $result;
} 


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;



$sql = 'SELECT * FROM names WHERE `group` = "Gelechiidae" AND publication like "Exotic%"';

$sql = 'SELECT * FROM names WHERE publication like "Exotic Micro%"';

$result = $db->Execute('SET max_heap_table_size = 1024 * 1024 * 1024');
$result = $db->Execute('SET tmp_table_size = 1024 * 1024 * 1024');

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);


$debug_journals = true;
$debug_journals = false;

$failed = array();

while (!$result->EOF) 
{	
	$obj = new stdclass;
	
	$obj->id = $result->fields['id'];
	$obj->sici = $result->fields['sici'];
	$obj->publication = $result->fields['publication'];
	$obj->publication = str_replace("\n", "", $obj->publication);
	$obj->publicationParsed = 'N';	
	

	if ($debug_journals)
	{	
		echo "-- " . $obj->publication . "\n";
	}
	echo "\n-- " . $obj->publication . "\n";
		
	
	$matched = false;
	
	// p

	if (!$matched)
	{
		if (preg_match('/^(?<journal>Exotic Micro[\s|-]?le[-]?pidoptera.*)[,|\.]?(\s+(?<volume>\d+)(\((?<issue>[^\)]+)\))?)?\s+(?<year>[0-9]{4}):\s*pp.\s+(?<spage>\d+)-(?<epage>\d+)\.(\s+(?<microreference>\d+)\b)/Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/^(?<journal>Exotic Micro[\s|-]?le[-]?pidoptera.*)[,|\.]?(\s+(?<volume>\d+)(\((?<issue>[^\)]+)\))?)?\s+(?<year>[0-9]{4}):\s*pp.\s+(?<spage>\d+)-(?<epage>\d+)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	

	// ()
	if (!$matched)
	{
		if (preg_match('/^(?<journal>Exotic Micro[\s|-]?le[-]?pidoptera.*)[,|\.]?\s+(?<volume>\d+)(\((?<issue>[^\)]+)\))?\s+(?<year>[0-9]{4}):\s*\((?<spage>\d+)-(?<epage>\d+)\)\.(\s+(?<microreference>\d+)\b)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<journal>Exotic Micro[\s|-]?le[-]?pidoptera.*)[,|\.]?\s+(?<volume>\d+)(\((?<issue>[^\)]+)\))?\s+(?<year>[0-9]{4}):\s*\((?<spage>\d+)-(?<epage>\d+)\)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// just get something
	if (!$matched)
	{
		if (preg_match('/^(?<journal>Exotic Micro[\s|-]?le[-]?pidoptera.*)[,|\.]?\s+/Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
		
	if (!$matched)
	{
		$failed[] = $obj->publication;
	}	
	
	if ($matched)
	{
		if ($obj->publicationParsed == 'N')
		{
			$obj->publicationParsed = (($matched && ($m['title'] || $m['journal'])) ? 'Y' : 'N');
		}
		
		foreach ($m as $k => $v)
		{
			if (!is_numeric($k))
			{
				$obj->${k} = $v;
			}
		}
		
		
		// SQL
		$sql = "UPDATE names SET";
		$sql = "UPDATE names SET title=NULL,";
		$count = 0;		
		
		
		$pos = strpos($obj->publication, 'Chapter pagination');
		if ($pos === false)
		{
			$obj->isPartOf = 'N';
		}
		else
		{
			$obj->isPartOf = 'Y';
		}
		
		foreach ($obj as $k => $v)
		{
			switch ($k)
			{
				case 'id':
				case 'sici':
					break;
					
				case 'publisher':
				case 'publoc':
					break;
					
				case 'pages':
					break;
					
				default:
					if ($v != '')
					{
						if ($count != 0)
						{
							$sql .= ",";
						}
						$sql .= " " . $k . "='" .  addcslashes($v, "'") . "'";
						$count++;
					}
					break;
			}
		}
		
		if (!isset($obj->microreference))
		{
			$sql .= ', microreference=NULL';
		}
		
		
		$sql .= " WHERE sici='" . $obj->sici . "';";
		
		if ($debug_journals)
		{		
			// for debugging journal info
			echo $obj->journal . "\n";
		}
		else
		{
			echo $sql . "\n";
		}
		
		
		
	}
	
	//print_r($obj);	
	
	$result->MoveNext();
}


print_r($failed);



?>