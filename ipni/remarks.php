<?php

$filename = 'ipni-remarks.txt';

$file_handle = fopen($filename, "r");


while (!feof($file_handle)) 
{
	$parts = explode("\t", trim(fgets($file_handle)));
	$doi = $parts[0];
	$id = $parts[1];
	
	$pos = strpos($doi, ' ');
	if ($pos === false)
	{
	}
	else
	{
		$doi = substr($doi, 0, $pos);
	}
	
	echo "UPDATE names SET doi='" . $doi . "' WHERE Id='" . $id . "';" . "\n";
}

?>
