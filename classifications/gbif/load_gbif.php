<?php

require_once (dirname(__FILE__) . '/gbif.php');

// Read a file with a list of GBIF ids and load those taxa into CouchDB

$filename = '';
if ($argc < 2)
{
	echo "Usage: load_gbif.php <id file>\n";
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
	$id = trim(fgets($file_handle));
	
	get_concept($id);
}
	
?>