<?php

require_once (dirname(dirname(__FILE__)). '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/reference.php');

//--------------------------------------------------------------------------------------------------
function have_identifier($namespace, $identifier)
{
	global $config;
	global $couch;
	
	$id = null;
	
	if (is_numeric($identifier))
	{
		$couch_id = $identifier;
	}
	else
	{
		$couch_id = urlencode('"' . $identifier . '"');
	}

	$url = '_design/identifier/_view/' . $namespace . '?key=' . $couch_id;
	
	//echo $url . "\n";
	
	$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/" . $url);

	$response_obj = json_decode($resp);
	
	//print_r($response_obj);
	
	if (isset($response_obj->error))
	{
	}
	else
	{
		if (count($response_obj->rows) == 0)
		{
		}
		else
		{	
			print_r($response_obj->rows);
			$id = $response_obj->rows[0]->id;
		}
	}
	
	return $id;
}



//--------------------------------------------------------------------------------------------------
// Do we have this reference already?
function have_reference_already($reference)
{
	global $config;
	global $couch;
	
	$id = null;
	
	$identifiers = array();
	
	if (isset($reference->identifier))
	{
		foreach ($reference->identifier as $identifier)
		{
			$identifiers[$identifier->type] = $identifier->id;
		}
	}
	
	//print_r($identifiers);
	
	if (count($identifiers) > 0)
	{
		// Order of identifiers is order of preference
		$keys = array('doi', 'biostor', 'handle', 'jstor', 'cinii', 'pmid', 'pmc');
		foreach ($keys as $k)
		{
			if (isset($identifiers[$k]))
			{
				$id = have_identifier($k, $identifiers[$k]);
			}
			if ($id) break;
		}
	}
	
	if ($id == null)
	{
		// try links
		$links = array();
		if (isset($reference->link))
		{
			foreach ($reference->link as $link)
			{
				$links[$link->anchor] = $link->url;
			}
		}
		
		//print_r($links);
	}
	
	if ($id)
	{
		echo "Found $id\n";
	}
	
	return $id;

}

?>