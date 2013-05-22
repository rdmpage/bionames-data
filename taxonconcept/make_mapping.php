<?php

// Load a list of names and make mapping
require_once(dirname(__FILE__) . '/map.php');


$filename = '';
if ($argc < 2)
{
	echo "Usage: make_mapping.php <names file>\n";
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
	
	//map($name, 'gbif', true);
	map($name, 'ncbi', false);
}

?>