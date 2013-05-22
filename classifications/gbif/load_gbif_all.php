<?php


require_once (dirname(__FILE__) . '/gbif.php');

// Read tree file of GBIF ids and load those taxa into CouchDB

$filename = 'gbif_nodes.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

$docs = new stdclass;
$docs->docs = array();

while (!feof($file_handle)) 
{
	$parts = explode("\t", fgets($file_handle));
	
	get_concept($parts[0], $doc);
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