<?php

// Load publications individually

require_once(dirname(__FILE__) . '/publication_utils.php');
require_once(dirname(__FILE__) . '/publications_core.php');

$filename = 'doi_md5.txt';
//$filename = 'biostor_md5.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

$docs = null;

while (!feof($file_handle)) 
{
	$sici = trim(fgets($file_handle));
	
	get_reference (get_sici_sql($sici), $docs, true);
}


?>