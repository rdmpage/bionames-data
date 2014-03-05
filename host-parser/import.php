<?php

// import into MySQL for cleaning

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root', '', 'embl_host');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;



$filename = 'hosts.json';
$json = file_get_contents($filename);
$obj = json_decode($json);

foreach ($obj->rows as $row) 
{
	$string = $row->key;
	
	$sql = "REPLACE INTO hosts(host) VALUES('" . addcslashes($string, "'") . "');";
	echo $sql . "\n";
	
	
}

echo "\n";


?>