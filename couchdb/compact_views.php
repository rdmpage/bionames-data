<?php

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');

$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/_all_docs?startkey=\"_design\"&endkey=\"_design0\"");
var_dump($resp);

$resp_obj = json_decode($resp);

foreach ($resp_obj->rows as $row)
{
}

$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/_all_docs?startkey=\"_design\"&endkey=\"_design0\"");
var_dump($resp);

$resp_obj = json_decode($resp);

//print_r($resp_obj);

// Compact views
if (1)
{
	foreach ($resp_obj->rows as $row)
	{
		$view = str_replace('_design/', '', $row->id);
		
		echo $view . "\n";
	
		//$view = 'bhl';
		//$view = 'ion';
		
		switch ($view)
		{
			// now ready
			/*
			case 'oclc':
			case 'cleaning':
				$resp = $couch->send("POST", "/" . $config['couchdb_options']['database'] . "/_compact/" . $view);
				var_dump($resp);
				break;
			*/
				
			default:
				$resp = $couch->send("POST", "/" . $config['couchdb_options']['database'] . "/_compact/" . $view);
				var_dump($resp);
				break;
		}
	}
}


// compact database
$resp = $couch->send("POST", "/" . $config['couchdb_options']['database'] . "/_compact");
var_dump($resp);



?>
