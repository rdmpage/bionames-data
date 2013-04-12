<?php

// Load publications for list of names

require_once(dirname(__FILE__) . '/publications_core.php');

//--------------------------------------------------------------------------------------------------
function load_from_name($name)
{
	global $db;
	global $couch;
	
	$sicis = array();
	
	$sql = "SELECT DISTINCT sici FROM names WHERE nameComplete = " . $db->qstr($name) . " AND publication IS NOT NULL";
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	while (!$result->EOF) 
	{
		$sicis[] = $result->fields['sici'];
	
		$result->MoveNext();
	
	}	
	
	foreach ($sicis as $sici)
	{
		get_reference (get_sici_sql($sici));
	}
	
}

//--------------------------------------------------------------------------------------------------
$filename = '';
if ($argc < 2)
{
	echo "Usage: load_publications_names.php <names file>\n";
	exit(1);
}
else
{
	$filename = $argv[1];
}

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$name = trim(fgets($file_handle));
	
	load_from_name($name);
}

?>