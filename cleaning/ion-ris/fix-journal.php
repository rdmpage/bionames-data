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

$journal = 'Acta Coleopterologica (Munich)';

$sql = 'SELECT * from names WHERE journal LIKE "' . $journal . '%"';



$sql = "select distinct title, journal, sici from `names-5507237` where journal LIKE '%] Atalanta (Marktleuthen)'";


echo "-- $sql\n";



$result = $db->Execute('SET max_heap_table_size = 1024 * 1024 * 1024');
$result = $db->Execute('SET tmp_table_size = 1024 * 1024 * 1024');

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);


while (!$result->EOF) 
{	
	$title_string = $result->fields['title'];
	$journal_string = $result->fields['journal'];
	$sici =  $result->fields['sici'];
	
	echo "-- $journal_string\n";
	
	// Acta Coleopterologica (Munich), 20(2)
	if (preg_match('/(?<journal>.*), (?<volume>\d+)\((?<issue>\d+)\)/', $journal_string, $m))
	{
		// print_r($m);
		
		// echo 'UPDATE names SET journal="' . $m['journal'] . '", volume="' . $m['volume'] . '", issue="' . $m['issue'] . '" WHERE sici="' . $sici . '";' . "\n";
	}
	
	if (preg_match('/(?<title>.*)\] Atalanta \(Marktleuthen\)/', $journal_string, $m))
	{
		// print_r($m);
		
		echo 'UPDATE names SET journal="Atalanta (Marktleuthen)", issn="0171-0079", title="' . $title_string . $m['title'] . ']" WHERE sici="' . $sici . '";' . "\n";
	}
	

	
	$result->MoveNext();
}



?>