<?php

require_once('../lib.php');

$filename = "sicis.txt";

$count = 1;

$file_handle = fopen($filename, "r");
while (!feof($file_handle)) 
{
	$sici = trim(fgets($file_handle));


	$url = 'http://bionames.org/api/id/' . $sici;

	$json = get($url);

	$obj = json_decode($json);

	//print_r($obj);

	$terms = array();

	if (isset($obj->journal))
	{
		if (isset($obj->journal->name))
		{
			$terms[] = 'journal="' . addcslashes($obj->journal->name, '"') . '"';
		}
		else
		{
			$terms[] = "journal=NULL";
		}
	
		if (isset($obj->journal->volume))
		{
			$terms[] = 'volume="' . addcslashes($obj->journal->volume, '"') . '"';
		}
		else
		{
			$terms[] = "volume=NULL";
		}
	
		if (isset($obj->journal->issue))
		{
			$terms[] = 'issue="' . addcslashes($obj->journal->issue, '"') . '"';
		}
		else
		{
			$terms[] = "issue=NULL";
		}
			
	}
	else
	{
		$terms[] = "journal=NULL";
		$terms[] = "volume=NULL";
		$terms[] = "issue=NULL";

	}


	//print_r($terms);

	echo 'UPDATE names SET ' . join(',', $terms) . ' WHERE sici="' . $sici . '";' . "\n";
	
	// Give server a break every 10 items
	if (($count++ % 100) == 0)
	{
		$rand = rand(1000000, 3000000);
		echo "\n-- ...sleeping for " . round(($rand / 1000000),2) . ' seconds' . "\n\n";
		usleep($rand);
	}
	

}

?>

