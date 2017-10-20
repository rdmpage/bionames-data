<?php

// Add thumbnail to reference with JSTOR


require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/publication_utils.php');
require_once(dirname(__FILE__) . '/publications_core.php');


$ids=array(4064542,4064543,4064544);

$ids=array(4064542);


//http://bionames.org/api/id/jstor/4064975

foreach ($ids as $id)
{
	
	// Get reference from CouchDB
	$url = 'http://bionames.org/api/id/jstor/' . $id;
	
	$json = get($url);
	
	if ($json == '')
	{
		echo "JSTOR $id not found\n";
	}
	else
	{
		$reference = json_decode($json);
		
		get_doi_thumbnail($reference, '10.2307/' . $id);

		print_r($reference);
		
		if (isset($reference->thumbnail))
		{					
			$resp = $couch->send("PUT", "/" . $config['couchdb_options']['database'] . "/" . urlencode($reference->_id), json_encode($reference));
			var_dump($resp);
		}
	}
}


?>