<?php

// Update GBIF to add location data

require_once (dirname(dirname(dirname(__FILE__))) . '/couchsimple.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/lib.php');


// Read a file with a list of GBIF ids and load those taxa into CouchDB

$filename = '';
if ($argc < 2)
{
	echo "Usage: load_gbif.php <id file>\n";
	exit(1);
}
else
{
	$filename = $argv[1];
}

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");


while (!feof($file_handle)) 
{
	$id = trim(fgets($file_handle));

	
	$url = 'http://bionames.org/bionames-api/id/gbif/' . $id;
	
	$json = get($url);
	
	echo $url;
	
	if ($json != '')
	{
		$obj = json_decode($json);
		
		print_r($obj);
		
		if (!isset($obj->geometry))
		{
			// Get data
			
			$url = 'http://data.gbif.org/ws/rest/density/list?taxonconceptkey=' . $id;
			
			$xml = get($url);
			
			//echo $url . "\n";
			
			$js = '';
			
			if ($xml != '')
			{
				//echo $xml;
				
				//echo "\n";
			
				// Convert GBIF XML to Javascript for Google Maps
				$xp = new XsltProcessor();
				$xsl = new DomDocument;
				$xsl->load('gbif2geojson.xsl');
				$xp->importStylesheet($xsl);
				
				$dom = new DOMDocument;
				$dom->loadXML($xml);
				$xpath = new DOMXPath($dom);
			
				$js = $xp->transformToXML($dom);
				
				$obj->geometry = json_decode($js);
			
				// Update
				$couch->add_update_or_delete_document($obj, $obj->_id);		
			}
		}
	}
}	
?>