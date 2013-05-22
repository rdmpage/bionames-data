<?php

// load all clusters

require_once (dirname(__FILE__) . '/cluster.php');


$filename = 'cluster_ids.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

$docs = new stdclass;
$docs->docs = array();

$bulk_size = 1000;

while (!feof($file_handle)) 
{
	$cluster_id =trim(fgets($file_handle));
	
	
	$cluster = get_cluster($cluster_id);
	
	if ($cluster)
	{
		//print_r($cluster);
	
		$docs->docs [] = $cluster;
		//echo ".";
		
		if (count($docs->docs ) == $bulk_size)
		{
			echo "CouchDB...\n";
			$resp = $couch->send("POST", "/" . $config['couchdb_options']['database'] . '/_bulk_docs', json_encode($docs));
			
			//echo json_encode($docs);
			
			//echo $resp;
			echo "\nUploaded...\n";
			//exit();
		
			$docs->docs  = array();
		}
	
	
	}
	
	
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