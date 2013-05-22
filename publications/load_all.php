<?php

// Load publications for list of names

require_once(dirname(__FILE__) . '/publications_core.php');

$filename = 'all_md5.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

$docs = new stdclass;
$docs->docs = array();

while (!feof($file_handle)) 
{
	$sici = trim(fgets($file_handle));
	
	get_reference (get_sici_sql($sici), $docs, false);
}

if (count($docs->docs ) != 100)
{
	echo "CouchDB...\n";
	$resp = $couch->send("POST", "/" . $config['couchdb_options']['database'] . '/_bulk_docs', json_encode($docs));
	
	//echo json_encode($docs);
	
	echo $resp;
	//exit();

	$docs->docs  = array();
}


?>