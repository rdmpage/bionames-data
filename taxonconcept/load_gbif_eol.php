<?php

// Export mapping between GBIF and EOL (requires file with GBIF\tEOL )

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(dirname(__FILE__)) . '/clusters/cluster.php');

//--------------------------------------------------------------------------------------------------
function load_mapping($filename)
{
	global $config;
	global $couch;
	
	$file = @fopen($filename, "r") or die("couldn't open $filename");
	
	$file_handle = fopen($filename, "r");
	
	while (!feof($file_handle)) 
	{
		$line = trim(fgets($file_handle));
		$parts = explode("\t", $line);
		
		$gbif_id 	= $parts[0];
		$eol_id 	= $parts[1];

		// Fetch existing GBIF concept from CouchDB
		$url = 'http://bionames.org/bionames-api/id/gbif/' . $gbif_id;
		
		$json = get($url);
		
		//echo $url . "\n";
		
		//echo $json
		
		if ($json != '')
		{
			$taxonconcept = json_decode($json);
			
			if (!isset($taxonconcept->identifier))
			{				
				$taxonconcept->identifier = new stdclass;
			}
			
			$taxonconcept->identifier->eol[] = $eol_id;
			$taxonconcept->identifier->eol = array_unique($taxonconcept->identifier->eol);
			
			// update
			$couch->add_update_or_delete_document($taxonconcept,  $taxonconcept->_id);
		}
	}
}

// Read a file with a list of GBIF ids and load the mapping into CouchDB
$filename = '';
if ($argc < 2)
{
	echo "Usage: load_mapping.php <id file>\n";
	exit(1);
}
else
{
	$filename = $argv[1];
}

load_mapping($filename);



?>
