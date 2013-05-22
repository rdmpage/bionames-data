<?php

// load all EOL concepts using list of EOL ids

// Export mapping between names and concepts
error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

$filename = 'eol_ids.txt';
$filename = 'ncbi2eol-part1.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$eol_id =trim(fgets($file_handle));
	
	$url = 'http://eol.org/api/pages/1.0/' . $eol_id . '.json?details=1&amp;common_names=1&amp;images=10';
	
	$json = get($url);
	if ($json)
	{
		$obj = json_decode($json);
		
		$obj->_id = 'eol/' . $eol_id;
		$obj->type = 'taxonConcept';
	
		echo "CouchDB...\n";
		$couch->add_update_or_delete_document($obj, $obj->_id);
	}

}


?>