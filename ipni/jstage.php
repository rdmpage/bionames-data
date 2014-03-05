<?php

require_once('../config.inc.php');

// j-stage OpenURL

//--------------------------------------------------------------------------------------------------
function find_jstage(&$reference)
{
	global $config;
	
	$found = false;
	$have_issn = false;
	
	
	$url = 'http://japanlinkcenter.org/openurl'
	 . '?rft.jtitle=' . rawurlencode($reference->journal->name)
	 . '&rft.volume=' . $reference->journal->volume
	 . '&rft.spage=' . $reference->journal->pages;
	 
	 
	 if (isset($reference->journal->identifier))
	 {
	 	$url .= '&rft.issn=' . $reference->journal->identifier[0]->id;
	 	$have_issn = true;
	 }
	
	echo "-- $url\n";
	
	$ch = curl_init(); 
	curl_setopt ($ch, CURLOPT_URL, $url); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
	//curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,	1); 
	curl_setopt ($ch, CURLOPT_HEADER,		  1);  

	curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	
	
	if ($config['proxy_name'] != '')
	{
		curl_setopt ($ch, CURLOPT_PROXY, $config['proxy_name'] . ':' . $config['proxy_port']);
	}
	
			
	$curl_result = curl_exec ($ch); 
	
	//echo $curl_result;
	
	if (curl_errno ($ch) != 0 )
	{
		echo "CURL error: ", curl_errno ($ch), " ", curl_error($ch);
	}
	else
	{
		$info = curl_getinfo($ch);
		
		//print_r($info);
		
		 
		$header = substr($curl_result, 0, $info['header_size']);
		//echo $header;
		
		
		$http_code = $info['http_code'];
		
		if ($http_code == 302)
		{
			$found = 'true';
			
			$link = new stdclass;
			$link->url = $info['redirect_url'];
			$link->anchor = 'LINK';
			$reference->link[] = $link;
			
			$pdf = new stdclass;
			$pdf->url = str_replace('_article', '_pdf', $info['redirect_url']);
			$pdf->anchor = 'PDF';
			$reference->link[] = $pdf;
		}
	}
	
	return $found;
}

if (0)
{
	
	$reference = new stdclass;
	
	$reference->journal = new stdclass;
	$reference->journal->name = 'Shokubutsugaku Zasshi';
	$reference->journal->volume = 69;
	$reference->journal->pages = 59;
	
	find_jstage($reference);
	
	print_r($reference);
}

?>