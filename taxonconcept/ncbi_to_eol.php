<?php

// Get EOL ids for a set of NCBI ids

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


require_once (dirname(__FILE__) . '/eol.php');

$filename = 'ncbi_mapped_ids.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$tax_id = trim(fgets($file_handle));
	
	$eol_id = concept_to_eol($tax_id, 'ncbi');
	
	if ($eol_id != 0)
	{
		echo $eol_id . "\n";
	}

}


?>