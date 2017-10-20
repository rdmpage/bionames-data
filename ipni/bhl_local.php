<?php

// look in local BHL

// assumes we know item for a given reference

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');


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
// Convert Arabic numerals into Roman numerals.
function roman($arabic)
{
	$ones = Array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX");
	$tens = Array("", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC");
	$hundreds = Array("", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM");
	$thousands = Array("", "M", "MM", "MMM", "MMMM");

	if ($arabic > 4999)
	{
		// For large numbers (five thousand and above), a bar is placed above a base numeral to indicate multiplication by 1000.
		// Since it is not possible to illustrate this in plain ASCII, this function will refuse to convert numbers above 4999.
		die("Cannot represent numbers larger than 4999 in plain ASCII.");
	}
	elseif ($arabic == 0)
	{
		// About 725, Bede or one of his colleagues used the letter N, the initial of nullae,
		// in a table of epacts, all written in Roman numerals, to indicate zero.
		return "N";
	}
	else
	{
		// Handle fractions that will round up to 1.
		if (round(fmod($arabic, 1) * 12) == 12)
		{
			$arabic = round($arabic);
		}

		// With special cases out of the way, we can proceed.
		// NOTE: modulous operator (%) only supports integers, so fmod() had to be used instead to support floating point.
		$roman = $thousands[($arabic - fmod($arabic, 1000)) / 1000];
		$arabic = fmod($arabic, 1000);
		$roman .= $hundreds[($arabic - fmod($arabic, 100)) / 100];
		$arabic = fmod($arabic, 100);
		$roman .= $tens[($arabic - fmod($arabic, 10)) / 10];
		$arabic = fmod($arabic, 10);
		$roman .= $ones[($arabic - fmod($arabic, 1)) / 1];
		$arabic = fmod($arabic, 1);


		return $roman;
	}
}


//--------------------------------------------------------------------------------------------------
function find(&$reference)
{
	global $db;
	
	if ($reference->double)
	{
		$page = $reference->journal->pages;
		if ($reference->journal->pages % 2 == 0)
		{
			$page--;
		}
		$sql = "SELECT * FROM bhl_page WHERE ItemID=" . $reference->ItemID . "  AND PageNumber=\"" . $page . "\"";
	}
	else
	{
		$sql = "SELECT * FROM bhl_page WHERE ItemID=" . $reference->ItemID . "  AND ((PageNumber=\"" . $reference->journal->pages . "\") OR (PageNumber=\"[" . $reference->journal->pages . ']"))';
	}
	
	echo "-- $sql\n";
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$reference->PageID = $result->fields['PageID'];
	}
	
	//print_r($reference);
}
	
	
//--------------------------------------------------------------------------------------------------
function find_item($TitleID, $volume, $issue='', $year = '')
{
	global $db;
	
	$ItemID = 0;
	
	$pattern = '';
	
	switch ($TitleID)
	{
		case 314:
			$pattern = "v.$volume %";
			break;
			
		case 454:
			if ($issue != '')
			{
				$pattern = "v.$volume,pt.$issue%";
			}
			else
			{
				$pattern = "v.$volume";
			}
			break;		

		case 15061:
			$pattern = "v.%$volume %";
			break;
			
		
		case 889:
			// v. 17, pt. 1 (1909)
			$pattern = "v. $volume,%";
			//$pattern = "v. $volume %";
			
			if ($year != '')
			{
				// v. 22, pt. 1 (1905)
				$pattern = "v. $volume, %(" . $year . ")";
				
			}
			
			break;

		case 8113:
		case 895:
		case 101603:
			$pattern = "v.$volume (%";
			break;

		case 259:
			$pattern = "v.$volume(%";
			//$pattern = "v.$volume (%";
			break;

		case 68683:
			$pattern = "v.$volume(%";
			break;
			
		case 12266:
			$pattern = "Bd.$volume (%";
			break;

		case 44786:
			$pattern = "v.$volume (%";
			break;
			
		case 61808:
			// v.21:no.1 (2014)
			$pattern = "v.$volume:no%";
			break;
			
		default:
			$pattern = "$volume";
			break;
	}
	
	$sql = 'SELECT * FROM bhl_item WHERE TitleID=' . $TitleID . '  AND VolumeInfo LIKE "' . $pattern . '"';
	echo "-- $sql\n";
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	//print_r($result);
	
	if ($result->NumRows() == 1)
	{
		$ItemID = $result->fields['ItemID'];
	}
	
	return $ItemID;
}


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$sql = 'SELECT * FROM ipni.names WHERE Publication="Fl. Yunnan." AND Collation LIKE "3%"';


$TitleID = 8113;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Sida" AND Collation LIKE "11(%"';
$sql = 'SELECT * FROM ipni.names WHERE Publication="Sida" AND Collation <> ""';


$TitleID = 314;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Notul. Syst. (Paris)" AND Collation LIKE "14:%"';
//$sql = 'SELECT * FROM ipni.names WHERE Publication="Notul. Syst. (Paris)" AND Collation <> ""';


//$sql = 'SELECT * FROM ipni.names WHERE Id="99377-1"';

$TitleID = 68683;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Bot. Jahrb. Syst." AND Collation LIKE "33%" and bhl IS NULL';


// Fl. Yunnan. BHL as "yun nan zhi wu zhi")

/*
$Titles=array(
53005,  // 4
53006, // 1
53009, // 6
53024,
53031, // 7
53032,// 80
53034,// 4
53035, // 5
53043, // 11
53044, // 10
53047, // 13
53048, // 14
53049, // 18
53050, // 16
53051, // 17
53053, // 21
53055,
53056, // 20
53062, // 15
53064,
83589
);
*/

$TitleID = 53006; //1
$TitleID = 53005; // 4
$TitleID = 53007; // 2

$TitleID = 53024; // 9
$TitleID = 53009;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Fl. Yunnan." AND Collation LIKE "6:%" and bhl IS NULL';


/*
// Wrightia
$TitleID = 895; // Wrightia
$sql = 'SELECT * FROM ipni.names WHERE Publication="Wrightia" AND Collation LIKE "5:%" and bhl IS NULL';
$sql = 'SELECT * FROM ipni.names WHERE Publication="Wrightia" AND  bhl IS NULL';
*/

//$sql = 'SELECT * FROM ipni.names WHERE Id="830469-1"';

// Leafl. Philipp. Bot.
$TitleID = 259;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Leafl. Philipp. Bot." AND Collation LIKE "vii.%" AND  bhl IS NULL';

$TitleID = 68683;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Bot. Jahrb. Syst." AND Collation LIKE "lvi.%" and bhl IS NULL';

$TitleID =  15061;
$sql = 'SELECT * FROM names WHERE Publication="Sendtnera"';

$TitleID =  101603;
$sql = 'SELECT * FROM names WHERE Publication="Moscosoa"';

$TitleID =  889;
$sql = 'SELECT * FROM names WHERE Publication="N. Amer. Fl." AND bhl IS NULL';

$sql = 'SELECT * FROM names WHERE Publication="N. Amer. Fl." AND Collation LIKE "22:%" AND bhl IS NULL';

// Pflanzenr. (Engler)
$TitleID = 250;
$Collation = 'Zingib.%';
$Collation = 'IV. 46%';
$sql = 'SELECT * FROM names WHERE Publication="Pflanzenr. (Engler)" AND Collation LIKE "' . $Collation . '" AND bhl IS NULL';

// Flora Aegyptiaco-Arabica :sive descriptiones plantarum :quas per ægytum inferiorem et arabiam felicem detexit, illustravit Petrus Forskäl. Post mortem auctoris edidit Carsten Niebuhr.
$TitleID = 41;
$sql = 'SELECT * FROM names WHERE Publication="Fl. Aegypt.-Arab." AND bhl IS NULL';

// Traité général des conifères
$TitleID = 17188;
$sql = 'SELECT * FROM names WHERE Publication="Traite Gen. Conif." AND bhl IS NULL';

//  
$TitleID = 454;
$sql = 'SELECT * FROM names WHERE Publication="Fl. Bras. (Martius)" AND Collation LIKE "1(2)%" AND bhl IS NULL';


$TitleID = 12266;
$sql = 'SELECT * FROM names WHERE Publication="Nova Acta Acad. Caes. Leop.-Carol. German. Nat. Cur."';

// Leafl. Philipp. Bot.
$TitleID = 259;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Leafl. Philipp. Bot." AND Collation <> "" AND  bhl IS NULL';

$TitleID = 44786;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Bull. New York Bot. Gard." AND Collation <> "" AND  bhl IS NULL';


$TitleID = 61808;
$sql = 'SELECT * FROM ipni.names WHERE issn="1815-8242" AND Collation <> "" AND  bhl IS NULL';


//$sql = 'SELECT * FROM names WHERE Id="585674-1"';

//echo $sql . "\n";

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

//print_r($result);

while (!$result->EOF) 
{	
	$reference = new stdclass;
	$reference->double = false;
	
	if ($TitleID == 454);
	{
		$reference->double = true;
	}
	$reference->double = false;
	
	$reference->id = $result->fields['Id'];
	
	$reference->journal = new stdclass;
	$reference->journal->name = $result->fields['Publication'];
	
	if ($result->fields['issn'] != '')
	{
		$identifier = new stdclass;
		$identifier->type = 'issn';
		$identifier->id = $result->fields['issn'];
		$reference->journal->identifier[] = $identifier;
	}
	
	$reference->year = $result->fields['Publication_year_full'];
	if (preg_match('/^(?<year>[0-9]{4})(.*)/', $reference->year, $m))
	{
		$reference->year = $m['year'];
	}
	
	echo "-- " .  $result->fields['Id'] . " " . $result->fields['Publication'] . " " . $result->fields['Collation'] . " " . $result->fields['Publication_year_full'] . "\n";

	
	$matched = false;
	
	// v. 1831 (1913).
	
	// 11, pt. 2: 621
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+),\s+pt.\s+(?<issue>\d+):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue 	= $m['issue'];
			$reference->journal->pages 	= $m['pages'];
			
			//print_r($reference);
			
			//exit();
		}
	}
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+)\((?<issue>\d+)\):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue 	= $m['issue'];
			$reference->journal->pages 	= $m['pages'];
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<pages>\d+)[,|;| ]/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			$reference->journal->pages 	= $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	
	//echo "|" . $result->fields['Collation'] . "|\n";
	// 40
	if (!$matched)
	{
		if (preg_match('/^(?<pages>\d+)\.?(\s+\(?[0-9]{4}\)?\.?)?$/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			$reference->journal->pages 	= $m['pages'];
			
			//print_r($reference);
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^p\.\s+(?<pages>[ixvcl]+)[\.|,]\s+/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			$reference->journal->pages 	= strtoupper($m['pages']);
			
			//print_r($reference);
		}
	}	
	
	
	// Zingib. 206
	if (!$matched)
	{
		if (preg_match('/(?<volume>[A-Z]+)[a-z]+\.\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages 	= $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// IV. 46(Heft 20): 223
	if (!$matched)
	{
		if (preg_match('/(?<volume>[IVCX]+\.\s+\d+)(\([H|h]eft \d+\))?:(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages 	= $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	// xxii. 56 (1905)
	if (!$matched)
	{
		if (preg_match('/(?<volume>[ixv]+)\.\s+(?<pages>\d+)\s+\((?<year>[0-9]{4})\)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages 	= $m['pages'];
			$reference->year 			= $m['year'];
			
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
	
	// 32A: 84
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+[A-Z]):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	//print_r($reference);
	
	
	if ($matched)
	{
		// Map publication to ItemID here... 
		
		if (isset($reference->journal->volume))
		{
			if (!is_numeric($reference->journal->volume))
			{
				$reference->journal->volume = arabic($reference->journal->volume);
			}
				
			//print_r($reference);
		
			//$ItemID = find_item($TitleID, $reference->journal->volume);
			
			if (isset($reference->journal->issue))
			{
				if (isset($reference->year))
				{
					$ItemID = find_item($TitleID, $reference->journal->volume, $reference->journal->issue, $reference->year);
				}
				else
				{
					$ItemID = find_item($TitleID, $reference->journal->volume, $reference->journal->issue);
				}				
			}
			else
			{
				if (isset($reference->year))
				{
					$ItemID = find_item($TitleID, $reference->journal->volume, '', $reference->year);
				}
				else
				{
					$ItemID = find_item($TitleID, $reference->journal->volume);
				}
			}
		}
		
		// set
		// v22 193-292
		//$ItemID = 15437; // 15436;
		//$ItemID = 122;
		//$ItemID = 56395;
		
		if ($TitleID == 250)
		{
			switch ($Collation)
			{
				case 'Zingib.%':
				case 'IV. 46%':
					$ItemID = 56528;
					break;
					
				default:
					$ItemID = 0;
					break;
			}
		}
		
		if ($TitleID == 41)
		{
			$ItemID = 122;
		}
		
		
		//echo "-- ItemID=$ItemID \n";
		
		if ($ItemID != 0)
		{
			$reference->ItemID = $ItemID;		
			//print_r($reference);
			find($reference);
			//print_r($reference);
			
			if (isset($reference->PageID))
			{
				echo 'UPDATE names SET bhl=' . $reference->PageID . ' WHERE Id="' . $reference->id . '";' . "\n";
			}
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