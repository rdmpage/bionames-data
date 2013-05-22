<?php

// Bulk load

require_once (dirname(__FILE__) . '/ncbi.php');

// Read a file with a list of NCBI tax_ids and load those taxa into CouchDB

$filename = 'ncbi_taxids.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

$docs = new stdclass;
$docs->docs = array();

while (!feof($file_handle)) 
{
	$id = trim(fgets($file_handle));
	
	get_concept($id, $docs);
}

if (count($docs->docs ) != 0)
{
	echo "CouchDB...\n";
	$resp = $couch->send("POST", "/" . $config['couchdb_options']['database'] . '/_bulk_docs', json_encode($docs));
	
	//echo json_encode($docs);
	
	echo $resp;
	//exit();

	$docs->docs  = array();
}
	
?>