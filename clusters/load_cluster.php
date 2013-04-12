<?php

// Load a list of names and add clusters with these names
require_once (dirname(__FILE__) . '/cluster.php');

$filename = '';
if ($argc < 2)
{
	echo "Usage: load clusters.php <names file>\n";
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
	
	add_cluster_from_name($name);
}

?>