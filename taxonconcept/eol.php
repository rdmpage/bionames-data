<?php

require_once (dirname(dirname(__FILE__)) . '/lib.php');

function gbif_to_eol($gbif_id)
{
	$eol_page_id = 0;
	
	$hierarchy_id = 800;
	
	$url = 'http://eol.org/api/search_by_provider/1.0/' . $gbif_id . '.json?hierarchy_id=' . $hierarchy_id;
	
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