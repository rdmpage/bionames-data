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
		default:
			break;
	}
	
	$url = 'http://eol.org/api/search_by_provider/1.0/' . $id . '.json?hierarchy_id=' . $hierarchy_id;
	
	$json = get($url);
	
	//echo $url . "\n";
	
	if ($json != '')
	{	
		$obj = json_decode($json);
		
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