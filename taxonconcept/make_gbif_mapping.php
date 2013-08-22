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


$skip = false;

while (!feof($file_handle)) 
{
	$name = trim(fgets($file_handle));
	
	if (preg_match('/^#/', $name))
	{
		// skip
	}
	else
	{
		
		if ($name == 'Nemichthys gaussiana')
		{
			$skip = false;
		}
		
		if (!$skip)
		{
			map($name, 'gbif', false);
		}
	}
}

?>