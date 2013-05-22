<?php

require_once (dirname(dirname(__FILE__)) . '/lib.php');

function concept_to_eol($id, $namespace = 'gbif')
{
	$eol_page_id = 0;
	
	switch ($namespace)
	{
		case 'ncbi':
			$hierarchy_id = 1172;
			break;
			
		case 'gbif':
			$hierarchy_id = 800;
			break;
			
		default:
			break;
	}
	
	$url = 'http://eol.org/api/search_by_provider/1.0/' . $id . '.json?hierarchy_id=' . $hierarchy_id;
	
	$url .= '&cache_ttl=';
	
	$json = get($url);
	
	//echo $url . "\n";
	
	//echo "json=$json\n";
	
	if ($json != '')
	{	
		$obj = json_decode($json);
		
		//print_r($obj);
		
		if (count($obj))
		{		
			if (isset($obj[0]->eol_page_id))
			{
				$eol_page_id = $obj[0]->eol_page_id;
			}
		}
	}

	return $eol_page_id;
}


?>