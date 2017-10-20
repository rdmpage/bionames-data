<?php

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/crossref.php');

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


function match($reference)
{
	global $db;
	
	if (isset($reference->journal->identifier))
	{
		foreach ($reference->journal->identifier as $identifier)
		{
			switch ($identifier->type)
			{
				case 'issn':
					$issn = $identifier->id;
					$volume = $reference->journal->volume;
					$spage = $reference->journal->pages;					
	
					if (0)
					{
						// DANGER WILL ROBINSON -- FAILS IF JSTOR DATA INCOMPLETE (I.E. MISSING ARTICLE CAUSES LOWER BOUND TO BE ANOTHER ARTICLE)
						// lower bound (e.g., JSTOR sourced metadata)
						$sql = 'select * from crossref where issn="' . $issn . '" and volume=' . $volume . ' and spage <= ' . $spage . ' and spage <> 0 order by cast(spage as signed) desc limit 1';
					}
					else
					{
						// between (better test, has to live inside page range) may fail if pagination overlaps				
						$sql = 'select * from crossref where issn="' . $issn . '" and volume=' . $volume . ' and (' . $spage .  ' between spage and epage) LIMIT 1';
					}

					//echo $sql . "\n";
					
					
					$result = $db->Execute($sql);
					if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
					if ($result->NumRows() == 1)
					{
						echo 'UPDATE names SET doi="' . $result->fields['doi'] . '" WHERE Id="' . $reference->id . '";' . "\n";
					}	
					break;
					
				default:
					break;
			}
		}
	}
}	

function match_cinii($reference)
{
	global $db;
	
	if (isset($reference->journal->identifier))
	{
		foreach ($reference->journal->identifier as $identifier)
		{
			switch ($identifier->type)
			{
				case 'issn':
					$issn = $identifier->id;
					$volume = $reference->journal->volume;
					$spage = $reference->journal->pages;					
	
					$sql = 'select * from cinii where issn="' . $issn . '" and volume=' . $volume . ' and (' . $spage .  ' between spage and epage) LIMIT 1';
					
					$result = $db->Execute($sql);
					if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
					if ($result->NumRows() == 1)
					{
//						echo 'UPDATE names SET url="' . $result->fields['url'] . '" WHERE Id="' . $reference->id . '";' . "\n";
						echo 'UPDATE names SET cinii="' . $result->fields['naid'] . '" WHERE Id="' . $reference->id . '";' . "\n";
					}	
					break;
					
				default:
					break;
			}
		}
	}
}	

function match_jstor($reference)
{
	global $db;
	
	if (isset($reference->journal->identifier))
	{
		foreach ($reference->journal->identifier as $identifier)
		{
			switch ($identifier->type)
			{
				case 'issn':
					$issn = $identifier->id;
					$volume = $reference->journal->volume;
					$spage = $reference->journal->pages;	
					
					if (0)
					{
						// DANGER WILL ROBINSON -- FAILS IF JSTOR DATA INCOMPLETE (I.E. MISSING ARTICLE CAUSES LOWER BOUND TO BE ANOTHER ARTICLE)
						// lower bound (e.g., JSTOR sourced metadata)
						$sql = 'select * from jstor where issn="' . $issn . '" and volume=' . $volume . ' and spage <= ' . $spage . ' and spage <> 0 order by cast(spage as signed) desc limit 1';
					}
					else
					{
						// between (better test, has to live inside page range) may fail if pagination overlaps				
						$sql = 'select * from jstor where issn="' . $issn . '" and volume=' . $volume . ' and (' . $spage .  ' between spage and epage) LIMIT 1';
					}
					
					$result = $db->Execute($sql);
					if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
					if ($result->NumRows() == 1)
					{
						echo 'UPDATE names SET jstor="' . $result->fields['id'] . '" WHERE Id="' . $reference->id . '";' . "\n";
					}	
					break;
					
				default:
					break;
			}
		}
	}
}	

function match_bioguid($reference)
{
	global $db;
	
	//print_r($reference);
	
	if (isset($reference->journal->identifier))
	{
		foreach ($reference->journal->identifier as $identifier)
		{
			switch ($identifier->type)
			{
				case 'issn':
					$issn = $identifier->id;
					$volume = $reference->journal->volume;
					$spage = $reference->journal->pages;					
	
					//$sql = 'select * from article_cache where issn="' . $issn . '" and volume=' . $volume . ' and spage <= ' . $spage . ' and spage <> 0 order by cast(spage as signed) desc limit 1';
					
					$sql = 'select * from article_cache where issn="' . $issn . '" and volume=' . $volume . ' and (' . $spage .  ' between spage and epage)';
					
					// echo $sql . "\n";
					
					$result = $db->Execute($sql);
					if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
					if ($result->NumRows() == 1)
					{
						if ($result->fields['doi'] != '')
						{
							echo 'UPDATE names SET doi="' . $result->fields['doi'] . '" WHERE Id="' . $reference->id . '";' . "\n";
						}
						if ($result->fields['url'] != '')
						{
							if (preg_match('/www.jstor.org\/(?<id>\d+)/', $result->fields['url'], $m))
							{
								echo 'UPDATE names SET jstor="' . $m['id'] . '" WHERE Id="' . $reference->id . '";' . "\n";
							}
						}
					}	
					break;
					
				default:
					break;
			}
		}
	}
}	

function match_ingenta($reference)
{
	global $db;
	
	//print_r($reference);
	
	if (isset($reference->journal->identifier))
	{
		foreach ($reference->journal->identifier as $identifier)
		{
			switch ($identifier->type)
			{
				case 'issn':
					$issn = $identifier->id;
					$volume = $reference->journal->volume;
					$spage = $reference->journal->pages;					
	
					//$sql = 'select * from article_cache where issn="' . $issn . '" and volume=' . $volume . ' and spage <= ' . $spage . ' and spage <> 0 order by cast(spage as signed) desc limit 1';
					
					$sql = 'select * from ingenta where issn="' . $issn . '" and volume=' . $volume . ' and (' . $spage .  ' between spage and epage)';
					
					// echo $sql . "\n";
					
					$result = $db->Execute($sql);
					if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
					if ($result->NumRows() == 1)
					{
						if ($result->fields['url'] != '')
						{
							echo 'UPDATE names SET url="' . $result->fields['url'] . '" WHERE Id="' . $reference->id . '";' . "\n";
						}
					}	
					break;
					
				default:
					break;
			}
		}
	}
}	

function match_dspace($reference)
{
	global $db;
	
	//print_r($reference);
	
	if (isset($reference->journal->identifier))
	{
		foreach ($reference->journal->identifier as $identifier)
		{
			switch ($identifier->type)
			{
				case 'issn':
					$issn = $identifier->id;
					$volume = $reference->journal->volume;
					$spage = $reference->journal->pages;					
	
					//$sql = 'select * from article_cache where issn="' . $issn . '" and volume=' . $volume . ' and spage <= ' . $spage . ' and spage <> 0 order by cast(spage as signed) desc limit 1';
					
					$sql = 'select * from dspace where issn="' . $issn . '" and volume=' . $volume . ' and (' . $spage .  ' between spage and epage)';
					
					// echo $sql . "\n";
					
					$result = $db->Execute($sql);
					if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
					if ($result->NumRows() == 1)
					{
						if ($result->fields['handle'] != '')
						{
							echo 'UPDATE names SET handle="' . $result->fields['handle'] . '" WHERE Id="' . $reference->id . '";' . "\n";
						}
					}	
					break;
					
				default:
					break;
			}
		}
	}
}	


//--------------------------------------------------------------------------------------------------
function match_biostor($reference)
{
	global $db;
	
	//print_r($reference);
	
	$reference_id = 0;
	$spage = 0;
	
	if (isset($reference->journal->identifier))
	{
		foreach ($reference->journal->identifier as $identifier)
		{
			switch ($identifier->type)
			{
				case 'issn':
					$issn = $identifier->id;
					$volume = $reference->journal->volume;
					$spage = $reference->journal->pages;					
					
					$sql = 'select * from rdmp_reference where issn="' . $issn . '" and volume=' . $volume . ' and (' . $spage .  ' between spage and epage)';
					
					// echo $sql . "\n";
					
					$result = $db->Execute($sql);
					if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
					if ($result->NumRows() == 1)
					{
						if ($result->fields['doi'] != '')
						{
							echo 'UPDATE names SET doi="' . $result->fields['doi'] . '" WHERE Id="' . $reference->id . '";' . "\n";
						}
						echo 'UPDATE names SET biostor="' . $result->fields['reference_id'] . '" WHERE Id="' . $reference->id . '";' . "\n";
						
						$reference_id =  $result->fields['reference_id'];
						$spage =  $result->fields['spage'];
					}	
					break;
					
				default:
					break;
			}
		}
	}
	
	if ($reference_id != 0)
	{
		// do simple search for PageID that matches IPNI page
		
		$page_order = $reference->journal->pages - $spage;
		
		$sql = 'select * from rdmp_reference_page_joiner where reference_id=' . $reference_id 
		. ' and page_order=' . $page_order . ' LIMIT 1';
		
		$result = $db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
		if ($result->NumRows() == 1)
		{
			echo 'UPDATE names SET bhl="' . $result->fields['PageID'] . '" WHERE Id="' . $reference->id . '";' . "\n";
		}	
		
		
	}
}	


//--------------------------------------------------------------------------------------------------
function match_ris($reference)
{
	global $db;
	
	//print_r($reference);
	
	if (isset($reference->journal->identifier))
	{
		foreach ($reference->journal->identifier as $identifier)
		{
			switch ($identifier->type)
			{
				case 'issn':
					$issn = $identifier->id;
					$volume = $reference->journal->volume;
					
					$issue = null;
					if (isset($reference->journal->issue))
					{
						$issue = $reference->journal->issue;
					}
					$spage = $reference->journal->pages;					
	
					//$sql = 'select * from article_cache where issn="' . $issn . '" and volume=' . $volume . ' and spage <= ' . $spage . ' and spage <> 0 order by cast(spage as signed) desc limit 1';
					
					if ($issue)
					{
						$sql = 'select * from ris where issn="' . $issn . '" and volume=' . $volume . ' and issue=' . $issue . ' and (' . $spage .  ' between spage and epage)';
					}
					else
					{
						$sql = 'select * from ris where issn="' . $issn . '" and volume=' . $volume . ' and (' . $spage .  ' between spage and epage)';
					}
					
					 echo $sql . "\n";
					
					$result = $db->Execute($sql);
					if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
					if ($result->NumRows() == 1)
					{
						if ($result->fields['url'] != '')
						{
							echo 'UPDATE names SET url="' . $result->fields['url'] . '" WHERE Id="' . $reference->id . '";' . "\n";
						}
						if ($result->fields['url'] != '')
						{
							echo 'UPDATE names SET pdf="' . $result->fields['pdf'] . '" WHERE Id="' . $reference->id . '";' . "\n";
						}
						if ($result->fields['doi'] != '')
						{
							echo 'UPDATE names SET doi="' . $result->fields['doi'] . '" WHERE Id="' . $reference->id . '";' . "\n";
						}
					}	
					break;
					
				default:
					break;
			}
		}
	}
}	





$journal = 'Edinburgh J. Bot.';
$journal = 'Brittonia';
$journal = 'Kew Bull.';
//$journal = 'Novon';
//$journal = 'Syst. Bot.';
$journal = 'Bull. Misc. Inform. Kew';
$journal = 'Bot. J. Linn. Soc.';
$journal = 'Nordic J. Bot.';
$journal = 'Amer. J. Bot.';
$journal = 'Ann. Missouri Bot. Gard.';
$journal = 'Syst. Bot. Monogr.';
$journal = 'Amer. Midl. Naturalist';
$journal = 'Bot. Gaz.';
$journal = 'Bull. Torrey Bot. Club';
$journal = 'Bull. Jard. Bot. État Bruxelles';


$sql = 'SELECT * FROM ipni.names WHERE Publication=' . $db->qstr($journal) . ' AND doi IS NULL';
//$sql = 'SELECT * FROM ipni.names WHERE Publication=' . $db->qstr($journal) . ' AND jstor IS NULL';

$sql = 'SELECT * FROM ipni.names WHERE issn="0006-8152" and Publication_year_full like "200%"';

$sql = 'SELECT * FROM ipni.names WHERE issn="0081-024X"';
//$sql .= ' LIMIT 10';

$sql = 'select * from names where Id="60445424-2"';

$sql = 'SELECT * FROM ipni.names WHERE issn="0031-9430" and biostor is null';
$sql = 'SELECT * FROM ipni.names WHERE issn="1945-9432" and doi is null';
$sql = 'SELECT * FROM ipni.names WHERE issn="0040-9618" and doi is null';
$sql = 'SELECT * FROM ipni.names WHERE issn="0006-5196" and doi is null';
$sql = 'SELECT * FROM ipni.names WHERE issn="0313-4245" and doi is null AND Collation <> ""';

//$sql = 'SELECT * FROM ipni.names WHERE Publication="Acta Phytotax. Geobot." AND Collation <> ""';

//echo $sql;

$sql = 'SELECT * FROM ipni.names WHERE issn="0040-9618" AND Collation <> ""';
$sql = 'SELECT * FROM ipni.names WHERE issn="0044-5983" AND Collation <> ""';
$sql = 'SELECT * FROM ipni.names WHERE issn="0375-121X" AND doi IS NULL AND Collation <> ""';

$sql = 'SELECT * FROM ipni.names WHERE issn="0040-0262" AND doi IS NULL AND Collation <> ""';


//$sql = 'SELECT * FROM ipni.names WHERE genus="Coursetia"';



//$sql .= ' LIMIT 100';


//$sql = 'select * from names where Genus="Grosvenoria"';

// 0006-808X
$sql = 'SELECT * FROM names WHERE Id="760954-1"';


//$sql = 'select * from names where issn="0040-9618" and Collation like "1906, xxxiii%"';

//$sql = 'select * from names where Publication = "Taxon" and doi is NULL';


//$sql = 'SELECT * FROM ipni.names WHERE issn="1945-9459" and doi is NULL';

$sql = 'select * from names where issn="1253-8078" ';
$sql = 'select * from names where issn="1179-3155" and doi is NULL and Publication_year_full > 2012';

$sql = 'select * from names where issn="1055-3177" and doi is NULL and Publication_year_full > 2012';



$sql = 'select * from names where Publication = "Willdenowia" and doi is NULL and Publication_year_full > 2012';


$sql = 'select * from names where issn="1439-6092" and doi is NULL';
$sql = 'select * from names where issn="0006-8241" and doi is NULL';



//echo $sql . "\n";


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
	$reference->journal->identifier[] = $identifier;
	
	
	$reference->year = $result->fields['Publication_year_full'];
	
	echo "-- " .  $result->fields['Id'] . " " . $result->fields['Publication'] . " " . $result->fields['Collation'] . " " . $result->fields['Publication_year_full'] . "\n";

	
	$matched = false;
	
	if ($reference->journal->name == 'Bulletin of Miscellaneous Information (Royal Gardens, Kew)')
	{
		if (preg_match('/^(?<pages>\d+)?\s+\((?<year>[0-9]{4})\)$/i', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['year'];
			$reference->year = $m['year'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}

	// xxv. (1889) 36.
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
		if (preg_match('/(?<volume>\d+)(\((?<issue>.*)\))?:\s+(?<pages>\d+)\b/Uu', $result->fields['Collation'], $m))
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
		if (preg_match('/(?<volume>\d+)(\((?<issue>.*)\))\s+(?<pages>\d+)\b/Uu', $result->fields['Collation'], $m))
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
		if (preg_match('/(?<volume>[ivxlc]+)\.?\s+(?<pages>\d+)/i', $result->fields['Collation'], $m))
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
		if (preg_match('/(?<volume>[0-9]{4}),?\s+(?<pages>\d+)/i', $result->fields['Collation'], $m))
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
		if (preg_match('/\((?<volume>[0-9]{4})\)?\s+(?<pages>\d+)/i', $result->fields['Collation'], $m))
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
		if (preg_match('/^(?<volume>\d+)\.?(\s+p.)?\s+(?<pages>\d+)\.?\s+(?<year>[0-9]{4})\.?$/i', $result->fields['Collation'], $m))
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
		if (preg_match('/^(?<year>[0-9]{4}),\s+(?<volume>[ivxlc]+),\s+(?<pages>\d+)\.?$/i', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	
	
	
	if ($matched)
	{
		print_r($reference);
		//exit();
		match($reference);
		
		//match_jstor($reference);
		//match_bioguid($reference);
		//match_biostor($reference);
		
		
		//match_cinii($reference);
		
		//match_ingenta($reference);
		//match_dspace($reference);
		
		//match_ris($reference);
	}
	else
	{
		echo "-- no match\n";
	}
	
	
	$result->MoveNext();
}

?>