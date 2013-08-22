<?php

require_once (dirname(__FILE__) . '/cluster.php');

$filename = '5102577.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$id = trim(fgets($file_handle));
	add_cluster($id);
}

?>