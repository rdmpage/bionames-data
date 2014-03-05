<?php

require_once('../lib.php');

//--------------------------------------------------------------------------------------------------



$issn = '0024-4074';
$issn = '0107-055X';
$issn = '0002-9122';
$issn = '0026-6493';
$issn = '0737-8211';
$issn = '0003-0031';
$issn = '0006-8071';
$issn = '0040-9618';
$issn = '0374-6313';
$issn = '0006-8152';
$issn = '0368-2927';
$issn = '0081-024X';
$issn = '1055-3177';

$issn = '1945-9459';
$issn = '1945-9432';

$issn = '0006-5196'; // Blumea
$issn = '0313-4245'; // Brunonia

$issn = '1030-1887';

$issn = '0006-808X';
$issn = '0044-5983';
$issn = '0375-121X';


$count = 0;
$page = 1;
$done = false;
while (!$done)
{
	$url = 'http://search.crossref.org/dois?q=' . $issn . '&header=true' . '&page=' . $page;
//	$url = 'http://search.crossref.org/dois?q=' . urlencode('Transactions of the Linnean Society of London Botany') . '&header=true' . '&page=' . $page;

	$json = get($url);

	$obj = json_decode($json);

	
	$count += $obj->itemsPerPage;
	$page++;
	
	$done = ($count >= $obj->totalResults);
	//$done = ($count >= 100); 
	
	foreach ($obj->items as $item)
	{
		// decode
		$query = explode('&', html_entity_decode($item->coins));
		$params = array();
		foreach( $query as $param )
		{
		  list($key, $value) = explode('=', $param);
		  
		  $key = preg_replace('/^\?/', '', urldecode($key));
		  $params[$key][] = trim(urldecode($value));
		}
		
		//if ($debug)
		{
			//print_r($params);
	
	
			$keys = array();
			$values = array();
			
			$keys[] = 'doi';
			$values[] = "'" . addcslashes(preg_replace('/info:doi\/(http:\/\/dx.doi.org\/)?/', '', $params['rft_id'][0]), "'") . "'";
	
			$keys[] = 'title';
			$values[] = "'" . addcslashes($params['rft.atitle'][0], "'") . "'";
			
			$keys[] = 'journal';
			$values[] = "'" . addcslashes($params['rft.jtitle'][0], "'") . "'";
	
			$keys[] = 'issn';
			$values[] = "'" . addcslashes($issn, "'") . "'";
	
			
			switch ($issn)
			{
				case '0081-024X':
					$keys[] = 'volume';
					$values[] = "'" . addcslashes($params['rft.issue'][0], "'") . "'";
					break;
				
				default:
					$keys[] = 'volume';
					$values[] = "'" . addcslashes($params['rft.volume'][0], "'") . "'";
					break;
			}
	
			$keys[] = 'spage';
			$values[] = "'" . addcslashes($params['rft.spage'][0], "'") . "'";
	
			$keys[] = 'epage';
			$values[] = "'" . addcslashes($params['rft.epage'][0], "'") . "'";
			

			$keys[] = 'year';
			$values[] = "'" . $item->year . "'";
			
			
			if (isset($params['rft.au']))
			{
				$keys[] = 'authors';
				$authors = array();
				foreach ($params['rft.au'] as $au)
				{
					$authors[] = $au;
				}
				$values[] = "'" . addcslashes(join(";", $authors), "'") . "'";
			}
					
			
			$sql = 'REPLACE INTO crossref(' . join(',', $keys) . ') VALUES (' . join(',', $values) . ');';
			
			echo $sql . "\n";
			
			//exit();
			
		}
	
		/*
		// This is what we got from user
		$context_object = new stdclass;
		parse_openurl($params, $context_object);
		*/
		
		
		// export
	}
	
}

