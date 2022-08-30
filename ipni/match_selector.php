<?php

// martch using "remote" microcitation resolver

error_reporting(E_ALL ^ E_DEPRECATED);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

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
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db->EXECUTE("set names 'utf8'"); 


$sql = 'SELECT * FROM ipni.names WHERE issn="0077-1813" and pdf is NOT NULL';

$sql = 'select * from names where Id="77190755-1"';

//$sql = 'SELECT * FROM ipni.names WHERE issn="0495-3843" and wikidata is NOT NULL';

//$sql = 'SELECT * FROM ipni.names where wikidata is NOT NULL';

$page = 1000;
$offset = 0;

$done = false;

$debug = false;
//$debug = true;

while (!$done)
{

	$sql = 'SELECT * FROM ipni.names where wikidata is NOT NULL';
	
	$sql = 'SELECT * FROM ipni.names where jstor is NOT NULL and selector IS NULL';
	
	//$sql = 'select * from names where Id="60476772-2"';

	$sql .= ' LIMIT ' . $page . ' OFFSET ' . $offset;

	//----------------------------------------------------------------------------------------
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

	while (!$result->EOF) 
	{	
		$reference = new stdclass;
	
		$reference->id = $result->fields['Id'];
	
		// guids
	
		if ($result->fields['pdf'] != '')
		{
			$reference->pdf = $result->fields['pdf'];
		}
		if ($result->fields['doi'] != '')
		{
			$reference->doi = $result->fields['doi'];
		}
		if ($result->fields['biostor'] != '')
		{
			$reference->biostor= $result->fields['biostor'];
		}
		if ($result->fields['wikidata'] != '')
		{
			$reference->wikidata= $result->fields['wikidata'];
		}
		if ($result->fields['jstor'] != '')
		{
			$reference->jstor= $result->fields['jstor'];
		}
	
	
		// authors
		$reference->authors = $result->fields['Publishing_author'];
		$reference->authors = preg_replace('/([A-Z]\.)/', '', $reference->authors);
		$reference->authors = preg_replace('/\.$/', '', $reference->authors);
		$reference->authors = preg_replace('/(.*) ex /', '', $reference->authors);
	
		if (preg_match('/ & /', $reference->authors))
		{
			$parts = preg_split('/ & /', $reference->authors);
			$reference->authors = $parts[0];
		}
	
		$reference->journal = new stdclass;
		$reference->journal->name = $result->fields['Publication'];
	
		// Clean
		if ($reference->journal->name == 'Kew Bull.')
		{
			$reference->journal->name = 'Kew Bulletin';
		}
		if ($reference->journal->name == 'Syst. Bot.')
		{
			$reference->journal->name = 'Systematic Botany';
		}
		if ($reference->journal->name == 'Bull. Misc. Inform. Kew')
		{
			$reference->journal->name = 'Bulletin of Miscellaneous Information (Royal Gardens, Kew)';
		}	
			
		$identifier = new stdclass;
		$identifier->type = 'issn';
		$identifier->id = $result->fields['issn'];
	
		// hack, put other ISSN here (e.g., if we are using eISSN not print ISSN)
		//$identifier->id = '1853-8460';
	
		if ($identifier->id == '0253-2700')
		{
			$identifier->id = '2096-2703';
		}
	
		$reference->journal->identifier[] = $identifier;
	
	
		$reference->year = $result->fields['Publication_year_full'];
	
		echo "-- " .  $result->fields['Id'] . " " . $result->fields['Publication'] . " " . $result->fields['Collation'] . " " . $result->fields['Publication_year_full'] . "\n";

	
		$matched = false;
	
		//$collation = utf8_decode($result->fields['Collation']);
		$collation = $result->fields['Collation'];

	
	
		if ($reference->journal->name == 'Rodriguésia')
		{
			if (preg_match('/^no\.\s+(?<issue>\d+):\s+(?<pages>\d+)/i', $collation, $m))
			{
				$matched = true;
			
				//print_r($m);
				$reference->journal->issue = $m['issue'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
	
		if ($reference->journal->name == 'Bulletin of Miscellaneous Information (Royal Gardens, Kew)')
		{
			if (preg_match('/^(?<pages>\d+)?\s+\((?<year>[0-9]{4})\)$/i', $collation, $m))
			{
				$matched = true;
			
				//print_r($m);
				$reference->journal->volume = $m['year'];
				$reference->year = $m['year'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
		if ($reference->journal->name == 'Kew Bulletin')
		{
			// 1953. 550 (1954)
			if (preg_match('/^(?<year>[0-9]{4})\.\s+(?<pages>\d+)?\s+\([0-9]{4}\)$/i', $collation, $m))
			{
				$matched = true;
			
				//print_r($m);
				$reference->year = $m['year'];
				$reference->journal->pages = $m['pages'];
			}
		}	
	
		// Ceiba
		// xi. No. 1, 69
		if (!$matched)
		{
			if (preg_match('/(?<volume>[ixvl]+)\.\s+No\.\s+(?<issue>\d+),\s+(?<pages>\d+)\s+\((?<year>[0-9]{4})\)/i', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);

				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->issue = $m['issue'];
		
				$reference->journal->pages = $m['pages'];
		
				$reference->year = $m['year'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}	
	
		// i. 83.(1950).
		if (!$matched)
		{
			if (preg_match('/(?<volume>[ixvl]+)\.\s+(?<pages>\d+)\.\s*\((?<year>[0-9]{4})\)/i', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);

				$reference->journal->volume = arabic($m['volume']);
		
				$reference->journal->pages = $m['pages'];
		
				$reference->year = $m['year'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}	
	
	
		//  v. I. (1888) 108
		if (!$matched)
		{
			if (preg_match('/v\.\s+(?<volume>[IVX]+)\.\s+\((?<year>[0-9]{4})\)\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);

				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
		
				$reference->year = $m['year'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}	
	
	
		// No. 29. 43 (1965)
		if (!$matched)
		{
			if (preg_match('/No\.\s+(?<volume>\d+)[\.|,]\s*(?<pages>\d+)\.?\s*\((?<year>[0-9]{4})\)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
				$reference->year = $m['year'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}	
	
	
		// cxiv. (Mitt. Bot. Mus. Univ. Zurich, ccxlii.) 60
		if (!$matched)
		{
			if (preg_match('/(?<volume>[cixlv]+)\.\s+\(.*\)\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}	
	
	
		// v. (1894) 50; Vasey, III. N. Am. Grass. i. I. (1890)t. 50
		if (!$matched)
		{
			if (preg_match('/(?<volume>[ixlv]+)\.\s+\((?<year>[0-9]{4})\)\s+(?<pages>\d+)[.|;]/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
				$reference->year = $m['year'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}
	
	
		// xxi. No. 1, 48 (1958)
		// xxi. No. I, 53 (1958).
		if (!$matched)
		{
			if (preg_match('/(?<volume>[ixlv]+)\.\s+No\.\s*(?<issue>[\d+|I]),\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->issue = $m['issue'];
				if ($reference->journal->issue == 'I')
				{
					$reference->journal->issue = 1;
				}
				$reference->journal->pages = $m['pages'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}
	
	
	
	
		// 10, no. 20: 43
		if (!$matched)
		{
			if (preg_match('/^(?<volume>\d+),\s+no.\s+(?<issue>\d+):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = $m['issue'];
				$reference->journal->pages = $m['pages'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}
	
		// 23-24: 243
		if (!$matched)
		{
			if (preg_match('/^(?<volume>\d+-\d+):\s+[\[]?(?<pages>\d+)[\]]?/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->volume = str_replace('-', '/', $reference->journal->volume);
			
				$reference->journal->pages = $m['pages'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}
	
	
	
		// ser. 3, 19(111): 197 1867 [Mar 1867]
		if (!$matched)
		{
			if (preg_match('/^ser\.\s+(?<series>\d+),\s+(?<volume>\d+)(\((?<issue>\d+)\))?:\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->series = $m['series'];
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}
	
		// Ser. 12, x. 44 (1957)
		if (!$matched)
		{
			if (preg_match('/^Ser\.\s+(?<series>\d+),\s+(?<volume>[ixlv]+)\.\s+(?<pages>\d+)\s+\([0-9]{4}\)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->series = $m['series'];
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}
	
	
		// Ser. III, iv. (1859) 361
		if (!$matched)
		{
			if (preg_match('/^Ser\.\s+(?<series>[IVX]+),\s+(?<volume>[ixlv]+)\.\s+\([0-9]{4}\)\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->series = arabic($m['series']);
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
			
				$reference->authors = $result->fields['Publishing_author'];
		
				//print_r($reference);
			
				//exit();
			}
		}
	
		// 1940, xxi 390
		// 1940. xxi. 323.
		if (!$matched)
		{
			if (preg_match('/^(?<year>[0-9]{4})[\.|,]\s+(?<volume>[ixlv]+)[\.]?\s+(?<pages>\d+)[\.]?/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// xxxii, 335
		if (!$matched)
		{
			if (preg_match('/^(?<volume>[ixlv]+),\s+(?<pages>\d+)$/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// xxov. 234 (1943)
		if (!$matched)
		{
			if (preg_match('/^(?<volume>[ixlv]+)\.\s+(?<pages>\d+)\s+/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// iii. 448, 450 (1939)
		if (!$matched)
		{
			if (preg_match('/^(?<volume>[ixlv]+)\.\s+(?<pages>\d+),/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// v. 540 (1941)
		if (!$matched)
		{
			if (preg_match('/^(?<volume>[ixlv]+)\.\s+(?<pages>\d+)\s*\(/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// 36E(1): 33
		if (!$matched)
		{
			if (preg_match('/^(?<volume>\d+[A-Z]?)\((?<issue>\d+)\):\s*(?<pages>\d+)$/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
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
			if (preg_match('/^(?<volume>\d+):\s*(?<pages>\d+)$/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// 12: [514], fig. 1-3
		if (!$matched)
		{
			if (preg_match('/^(?<volume>\d+):\s*\[(?<pages>\d+)\]/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// 30, pt. 1: 279
		if (!$matched)
		{
			if (preg_match('/^(?<volume>\d+),\s+pt.\s+(?<issue>\d+):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = $m['issue'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// xxxvii. 108
		if (!$matched)
		{
			if (preg_match('/^(?<volume>[ixlv]+)\.\s+(?<pages>\d+)\.$/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// 1938, vii. 29
		if (!$matched)
		{
			if (preg_match('/^(?<year>[0-9]{4}),\s+(?<volume>[ixlv]+)\.\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// 47;65
		if (!$matched)
		{
			if (preg_match('/^(?<volume>\d+);(?<pages>\d+)$/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// 61 (1958)
		if (!$matched)
		{
			if (preg_match('/^(?<year>[0-9]{4}),\s+(?<pages>\d+)\s+\([0-9]{4}\)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->year = $m['year'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// 61 (1958)
		if (!$matched)
		{
			if (preg_match('/^([0-9]{4},\s+)?(?<pages>\d+)\s+\((?<year>[0-9]{4})\)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->year = $m['year'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		if (!$matched)
		{
			if (preg_match('/^(?<volume>\d+)B:\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// No. 51 (Monogr. Burmanniac.) 126(1938)
		// No. 95 (Rec. Trav. Bot. Neerl. xli. Jul. 1948) 439 (Juu. 1948)
		if (!$matched)
		{
			if (preg_match('/^No.\s+(?<volume>\d+) \((.*)\)\s+(?<pages>\d+)\s*\(/i', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// No. 52, p. 50 (1939)
		if (!$matched)
		{
			if (preg_match('/^No.\s+(?<volume>\d+),\s+p.\s+(?<pages>\d+)[\s+|\.]/i', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// no. 107: 131
		if (!$matched)
		{
			if (preg_match('/^No.\s+(?<volume>\d+)[,|:]\s+(?<pages>\d+)$/i', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// No. 107, 57, 129 (1951)
		if (!$matched)
		{
			if (preg_match('/^No.\s+(?<volume>\d+)[,|:]\s+(?<pages>\d+)(, | &)/i', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// 14 (1/2) suppl.:
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+)\s*\((?<issue>\d+\/\d+)\)\s+suppl.:\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = 'supl.' . str_replace('/','-', $m['issue']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// 14 (1/2; suppl.): 195
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+)\((?<issue>\d+\/\d+),\s+suppl.\):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = 'supl.' . str_replace('/','-', $m['issue']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// 14(1–2, Suppl.): 209
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+)\((?<issue>\d+–\d+),\s+Suppl.\):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
		
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = 'supl.' . str_replace('–','-', $m['issue']);
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// 1(Suppl.)
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+)\((?<issue>\d+)\)Supl.:\s+(?<pages>\d+)\s+/', $result->fields['Collation'], $m))
			{
				$matched = true;
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = $m['issue'] . ' supl.1';
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
		// 1(2)Supl.: 196 (1988)
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+)\((?<issue>\d+)\)Supl.:\s+(?<pages>\d+)\s+/', $result->fields['Collation'], $m))
			{
				$matched = true;
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = $m['issue'] . ' supl.1';
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// 98B(Suppl.) 169 (1996)
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+)B\(Suppl.\):?\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				$matched = true;
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// 6:14 (-15;
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+):(?<pages>\d+)\s+\([-]?\d+/', $result->fields['Collation'], $m))
			{
				$matched = true;
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// Kew Bulletin post 2013
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+)\((?<issue>.*)\)-(?<article>\d+):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
			{
				$matched = true;
		
				//print_r($m);
		
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = $m['issue'];
				$reference->journal->article_number = $m['article'];
				$reference->journal->pages = $m['pages'];
		
				//print_r($reference);
			}
		}
	
	
		// 66(1) : 45
		if (!$matched)
		{
			echo "-- $collation --\n";
			if (preg_match('/(?<volume>\d+)\((?<issue>\d+)\)\s+:\s+(?<pages>\d+)/u', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = $m['issue'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	

		// xxv. (1889) 36.
		if (!$matched)
		{
			if (preg_match('/^(?<volume>[ivxlc]+)\.?\s+\((?<year>[0-9]{4})\)\s+(?<pages>\d+)\.?$/i', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
			}
		}

		// lvi. 353 (1948)
		if (!$matched)
		{
			if (preg_match('/^(?<volume>[ivxlc]+)\.?\s+(?<pages>\d+),?\s+\((?<year>[0-9]{4})\)\.?$/i', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
				echo "-- " . $m['volume'] . "\n";
			
				$v = $m['volume'];
				if ($v == 'Ivi')
				{
					$v = 'lvi';
				}
				if ($v == 'Ivii')
				{
					$v = 'lvii';
				}
			
				$reference->journal->volume = arabic($v);
			
			
				$reference->journal->pages = $m['pages'];
			}
		}
	
		if (!$matched)
		{
			if (preg_match('/^(?<volume>[ivxlc]+)\.?\s+(?<pages>\d+)$/i', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
				//echo "-- " . $m['volume'] . "\n";
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
			}
		}

	
		if (!$matched)
		{
			if (preg_match('/^no.\s+(?<issue>.*):\s+(?<pages>\d+)\b/Uu', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
				$reference->journal->issue = $m['issue'];
			
			
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
		// 9: 40 (1974).
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+):\s+(?<pages>\d+)\s*\((?<year>[0-9]{4})\)/Uu', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->year = $m['year'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
				//exit();
			}
		}	
	
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+)\s*(\((?<issue>.*)\))?:\s+(?<pages>\d+)\b/Uu', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = $m['issue'];
			
				$reference->journal->issue = str_replace('–','-', $m['issue']);
			
			
			
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
				//exit();
			}
		}
	
	
		if (!$matched)
		{
			if (preg_match('/(?<volume>\d+)(\((?<issue>.*)\))\s+(?<pages>\d+)\b/Uu', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = $m['issue'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
		/*
		if (!$matched)
		{
			if (preg_match('/(?<volume>[ivxlc]+)\.?\s+(?<pages>\d+)/i', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
		*/
	
		if (!$matched)
		{
			if (preg_match('/(?<volume>[0-9]{4}),?\s+(?<pages>\d+)/i', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
				if (1)
				{
					$reference->journal->volume = $m['volume'];
				}
				else
				{
					$reference->year = $m['volume'];
				}
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
		if (!$matched)
		{
			if (preg_match('/\((?<volume>[0-9]{4})\)?\s+(?<pages>\d+)/i', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}	
	
	
		if (!$matched)
		{
			if (preg_match('/^(?<volume>\d+)\.?(\s+p.)?\s+(?<pages>\d+)\.?\s+(?<year>[0-9]{4})\.?$/i', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
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
			if (preg_match('/^(?<year>[0-9]{4}),\s+(?<volume>[ivxlc]+),\s+(?<pages>\d+)\.?$/i', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = arabic($m['volume']);
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
		// 10, 57 (1964).
		if (!$matched)
		{
			if (preg_match('/^(?<volume>\d+),\s+(?<pages>\d+)\s+\((?<year>[0-9]{4})\)\.?$/i', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
		// 56(M?m. 3d): 391 1909
		if (!$matched)
		{
			//echo 'x';
			echo "-- $collation\n";
			if (preg_match('/^(?<volume>\d+)\(Mém.*\):\s+(?<pages>\d+)/ui', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
		// 55(3):188
		if (!$matched)
		{
			echo "-- $collation\n";
			if (preg_match('/(?<volume>\d+)\((?<issue>.*)\):\s*(?<pages>\d+)\b/Uu', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->issue = $m['issue'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
		// ii. Nos. 5-8, 348
		if (!$matched)
		{
			echo "-- $collation\n";
			if (preg_match('/(?<volume>[i]+)\.\s+No[a|s]?\.\s+(?<issue>.*)[,|\.]\s+(?<pages>\d+)\b/Uu', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->volume = arabic($reference->journal->volume);
				$reference->journal->issue = $m['issue'];
				$reference->journal->issue = str_replace('-', '/', $reference->journal->issue);
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
		// Anno 11. No. 8, 25 (1937).
		if (!$matched)
		{
			echo "-- $collation\n";
			if (preg_match('/Anno\s+(?<volume>\d+)\.\s+No.\s+(?<issue>\d+),\s+(?<pages>\d+)\s+/Uu', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
	
	
		// No. 6, 18 (1969)
		if (!$matched)
		{
			echo "-- $collation\n";
			if (preg_match('/No.\s+(?<volume>\d+),\s+(?<pages>\d+)\s+/Uu', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
	
		// 18; 21 (1975).
		if (!$matched)
		{
			echo "-- $collation\n";
			if (preg_match('/(?<volume>\d+);\s+(?<pages>\d+)\s+/Uu', $collation, $m))
			{
				echo "-- Matched " . __LINE__ . "\n";
				$matched = true;
			
				//print_r($m);
			
			
			
				$reference->journal->volume = $m['volume'];
				$reference->journal->pages = $m['pages'];
			
				//print_r($reference);
			}
		}
	
	
	
	
	
		// hack s
		//$reference->journal->volume = 7;
		//$reference->journal->volume =  30;
	
	
		// We've parsed a reference
		if ($matched)
		{
			// print_r($reference);
		
			// what do we use as a GUID?
		
			$guid = '';
		
			/*
			if ($guid == '')
			{
				if (isset($reference->wikidata))
				{
					$guid = $reference->wikidata;
				
					echo "-- $guid\n";
				}
			}
			*/
		
		
			if ($guid == '')
			{
				if (isset($reference->doi))
				{
					$guid = $reference->doi;
				}
			}
		
			if ($guid == '')
			{
				if (isset($reference->pdf))
				{
					$guid = $reference->pdf;
				}
			}

			if ($guid == '')
			{
				if (isset($reference->jstor))
				{
					$guid = 'http://www.jstor.org/stable/' . $reference->jstor;
				}
			}

		
			// echo "guid=$guid\n";
		
			if ($guid != '')
			{
				$url = 'http://localhost/~rpage/microcitation/www/citeproc-api.php?guid=' . urlencode($guid);
			
				// echo $url . "\n";
			
				$json = get($url);
			
				//echo $json;
			
				$obj = json_decode($json);
			
				if (isset($obj->page))
				{
					$spage = $obj->page;
					$epage = null;
				
					$parts = explode('-', $obj->page);
				
					if (count($parts) == 2)
					{
						$spage = $parts[0];
						$epage = $parts[1];
					}
				
					if ($epage)
					{
						// both pages
						if (
							is_numeric($spage)
							&& is_numeric($epage)
							&& is_numeric($reference->journal->pages)
						)
						{
							if (
								($reference->journal->pages >= $spage)
								&& ($reference->journal->pages <= $epage)
							)
							{
								$selector = $reference->journal->pages - $spage + 1;
				
								// echo "selector=$selector\n";
				
								echo 'UPDATE names SET selector="' . $selector . '" WHERE id="' . $reference->id . '";' . "\n";
							}
						}
					}
					else
					{
						// just spage
						if (
							is_numeric($spage)
							&& is_numeric($reference->journal->pages)
						)
						{
							if (
								$reference->journal->pages == $spage
							)
							{
								$selector = $reference->journal->pages - $spage + 1;
				
								// echo "selector=$selector\n";
				
								echo 'UPDATE names SET selector="' . $selector . '" WHERE id="' . $reference->id . '";' . "\n";
							}
						}
			
		
					}
				
				
				
				
				
				}
			}
				
			/*
			$url = 'http://localhost/~rpage/microcitation/www/index.php?' . http_build_query($parameters);
		
			//echo $url ."\n";
			
			$json = get($url);
		
			//echo $json;
		
			//exit();
			//echo $json;
	
			$obj = json_decode($json);
	
			//print_r($obj);
		
			*/
		}
		else
		{
			echo "-- no match\n";
		}
	
	
		$result->MoveNext();
	}

		if ($result->NumRows() < $page)
		{
			$done = true;
		}
		else
		{
			$offset += $page;
		
			// If we want to bale out and check it worked
			//if ($offset > 1000) { $done = true; }
		}
}

?>