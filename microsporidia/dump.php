<?php

// Add clusters (names + publication links)

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

$db = NewADOConnection('mysql');
$db->Connect("localhost", 
'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$filename = 'names.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$name =trim(fgets($file_handle));
	
	$sql = 'select * from microsporidia inner join names on microsporidia.NAME_OF_FUNGUS = names.nameComplete WHERE microsporidia.NAME_OF_FUNGUS=' . $db->qstr($name) . ' AND names.publication IS NOT NULL';


	echo "-- " . $name . "\n";

	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$keys = array('title', 'journal', 'volume', 'issue', 'spage', 'epage', 'issn', 'isbn', 'doi', 'pmid', 'handle', 'biostor', 'oclc', 'pdf');
		
		foreach ($keys as $k)
		{	
			if ($result->fields[$k] != '')
			{
				echo "UPDATE microsporidia SET bionames_" . $k . " = " . $db->qstr($result->fields[$k]) . " WHERE RECORD_NUMBER=" . $result->fields['RECORD_NUMBER'] . ";" . "\n";
			}
		}	
	}
	
}

?>

