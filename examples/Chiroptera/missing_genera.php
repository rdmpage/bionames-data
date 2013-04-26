<?php

require_once ('../../config.inc.php');
require_once ('../../adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$filename = 'missing_bat_genera.txt';

$file_handle = fopen($filename, "r");

$genera = array();

while (!feof($file_handle)) 
{
	$genera[] = trim(fgets($file_handle));
}

foreach ($genera as $genus)
{
	//$sql = 'SELECT DISTINCT cluster_id FROM names WHERE genusPart=' . $db->qstr($genus);
	$sql = 'SELECT nameComplete FROM names WHERE genusPart=' . $db->qstr($genus) . ' AND sici IS NOT NULL';
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

	while (!$result->EOF) 
	{	
//		echo $result->fields['cluster_id'] . "\n";
		echo $result->fields['nameComplete'] . "\n";

		$result->MoveNext();
	}
}

?>