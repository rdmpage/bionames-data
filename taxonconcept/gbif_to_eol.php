<?php

// Get EOL ids for a set of NCBI ids

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


require_once (dirname(__FILE__) . '/eol.php');

$filename = 'gbif_mapping.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

$skip = true;

while (!feof($file_handle)) 
{
	$gbif_id = trim(fgets($file_handle));
	
	if ($gbif_id == 5937226) { $skip = false; };
	
	if (!$skip)
	{
		
		$eol_id = concept_to_eol($gbif_id, 'gbif');
		
		if ($eol_id != 0)
		{
			echo "-- $eol_id\n";
			
			echo 'UPDATE names_to_concept SET gbif_eol_id=' . $eol_id . ' WHERE gbif_id=' . $gbif_id . ';' . "\n";
			
		}
	}
}


?>