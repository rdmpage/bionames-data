<?php

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/crossref.php');
require_once (dirname(__FILE__) . '/jstage.php');

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
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;



$journal = 'Edinburgh J. Bot.';
$journal = 'Kew Bull.';
$journal = 'Syst. Bot.';
$journal = 'Feddes Repert.';
$journal = 'Novon';
$journal = 'Phytokeys';

$journal = 'Amer. Midl. Naturalist';  // JSTOR?

$journal = 'Bot. J. Linn. Soc.';
$journal = 'Australian Systematic Botany';

//$journal = 'Pl. Ecol. Evol.';
//$journal = 'Pl. Syst. Evol.';

$journal = 'New Zealand J. Bot.';
$journal = 'Nordic J. Bot.';
//$journal = 'Amer. Midl. Naturalist';

$journal = 'Bull. Torrey Bot. Club';
$journal = 'Blumea';
$journal = 'Brunonia';
$journal = 'Austral. Syst. Bot.';
$journal = 'Telopea';
$journal = 'Acta Bot. Neerl.';
$journal = 'Acta Bot. Gallica';

$sql = 'SELECT * FROM ipni.names WHERE Publication=' . $db->qstr($journal) . ' AND doi IS NULL AND Collation <>""';

//$sql = 'SELECT * FROM ipni.names WHERE Publication=' . $db->qstr($journal) . ' AND doi IS NULL AND Publication_year_full like "2007%"';

//$sql .= ' LIMIT 10';

//$sql .= ' AND Collation like "3%"';

//$sql .= ' AND Publication_year_full ="1965"';

//$sql = 'SELECT * FROM names WHERE Id="487356-1"';

//$sql = 'select * from names where issn="0040-9618" and Collation like "1906, xxxiii%"';

$sql = 'select * from names where Publication="Bot. Mag. (Tokyo)"';

//$sql .= " LIMIT 100";

//$sql = 'select * from names where Publication="Kew Bull." and `Publication_year_full`=2006';




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
	if ($reference->journal->name == 'Pl. Ecol. Evol.')
	{
		$reference->journal->name = 'Plant Ecology and Evolution';
	}
	if ($reference->journal->name == 'Pl. Syst. Evol.')
	{
		$reference->journal->name = 'Plant Systematics and Evolution';
	}
	if ($reference->journal->name == 'Bot. J. Linn. Soc.')
	{
		$reference->journal->name = 'Botanical Journal of the Linnean Society';
	}
	if ($reference->journal->name == 'Bull. Torrey Bot. Club')
	{
		$reference->journal->name = 'Bulletin of the Torrey Botanical Club';
	}
	if ($reference->journal->name == 'Repert. Spec. Nov. Regni Veg.')
	{
		$reference->journal->name = 'Repertorium novarum specierum regni vegetabilis';
	}


	// jstage
	if ($reference->journal->name == 'Bot. Mag. (Tokyo)')
	{
		$reference->journal->name = 'Shokubutsugaku Zasshi';
	}

	
	if ($result->fields['issn'] != '')
	{
		$identifier = new stdclass;
		$identifier->type = 'issn';
		$identifier->id = $result->fields['issn'];
		$reference->journal->identifier[] = $identifier;
	}
	
	$reference->year = $result->fields['Publication_year_full'];
	
	echo "-- " .  $result->fields['Id'] . " " . $result->fields['Publication'] . " " . $result->fields['Collation'] . " " . $result->fields['Publication_year_full'] . "\n";

	
	$matched = false;
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
	
	// 1920, vi, 205.
	if (!$matched)
	{
		if (preg_match('/^(?<year>[0-9]{4}),\s+(?<volume>[ivxlc]+)[,|.]\s+(?<pages>\d+)\.?$/i', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ivxlc]+)\.?\s+\((?<year>[0-9]{4})\)\s+(?<pages>\d+)\.?$/i', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>[ivxlc]+)\.?\s+(?<pages>\d+)/i', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	
	//$missing = array(94,95,65,96,97,99,100,63,64,66,67);
	
	
	
	
	if ($matched) // && !in_array($reference->journal->volume, $missing))
	{
	
		//print_r($reference);
	
		$steps = -50;
		$found = false;
		while (!$found and $steps < 0 && $reference->journal->pages > 0)
		{
		
			//$found = find_doi($reference);
			$found = find_jstage($reference);
			
			if (!$found)
			{
				$reference->journal->pages--;
				$steps++;
				
				echo "-- " . $reference->journal->pages . "\n";
			}
		}
		
		if ($found)
		{
			// print_r($reference);
			
			$updates = array();
					
			if (isset($reference->identifier))
			{
				foreach ($reference->identifier as $identifier)
				{
					switch ($identifier->type)
					{
						case 'doi':
							$updates[] = 'doi="' . $identifier->id . '"';
							break;
							
						default:
							break;
					}
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
			
			if (isset($reference->link))
			{
				foreach ($reference->link as $link)
				{
					switch ($link->anchor)
					{
						case 'LINK':
							$updates[] = 'url="' . $link->url . '"';
							break;

						case 'PDF':
							$updates[] = 'pdf="' . $link->url . '"';
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