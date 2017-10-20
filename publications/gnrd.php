<?php

// Global Names Recognition and Discovery API functions
// see http://gnrd.globalnames.org/api

//--------------------------------------------------------------------------------------------------
// Call GNRD serviuce to extract names from content at end of URL
function get_names_from_url($url, $detect_language = false)
{
	$response = null;
	
	if (!$detect_language)
	{
		$url .= '&detect_language=false';
	}
	
	$json = get($url);
	
	$response = json_decode($json);
	
	// Takes a while to process, keep polling into we don't get HTTP 303
	if ($response->status = 303)
	{
	   $status = $response->status;
	   $url = $response->token_url;
	
	   while ($status == 303)
	   {
		   $json = get($url);
		   $response = json_decode($json);
		   $status = $response->status;
		   echo '.';
		   sleep(1);
	   }
	
		//print_r($response);
	
		// If HTTP 200 then success
		if ($status == 200)
		{
			// success
		}
	
	
	}
	
	return $response;
}


//--------------------------------------------------------------------------------------------------
// Call GNRD serviuce to extract names from text (send text using POST)
function get_names_from_text($text, $detect_language = false)
{
	global $config;
	
	$response = null;
	
	$url = 'http://gnrd.globalnames.org/name_finder.json';
	//$url = 'http://128.128.175.111/name_finder.json';

	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,	1);	

	// Set HTTP headers
	$headers = array();
	
	// Override Expect: 100-continue header (may cause problems with HTTP proxies
	// http://the-stickman.com/web-development/php-and-curl-disabling-100-continue-header/
	$headers[] = 'Expect:'; 
	curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
	
	// HTTP proxy
	if ($config['proxy_name'] != '')
	{
		curl_setopt ($ch, CURLOPT_PROXY, $config['proxy_name'] . ':' .$config['proxy_port']);
	}
			
	// POST
	curl_setopt($ch, CURLOPT_POST, TRUE);
	
	$post_data = array(
		'text' => $text,
		'detect_language' => $detect_language
		);
		
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

	$json = curl_exec ($ch);
	
	$response = json_decode($json);
	
	// Takes a while to process, keep polling until we don't get HTTP 303
	
	$pings = 0;
	$max_pings = 10; // give up if GNRD is slow to respond
	
	if ($response->status = 303)
	{
	   $status = $response->status;
	   $url = $response->token_url;
	
	   while (($status == 303) && ($pings < $max_pings))
	   {
		   $json = get($url);
		   $response = json_decode($json);
		   $status = $response->status;
		   echo '.';
		   sleep(1);
		   
		   $pings++;
	   }
	
		//print_r($response);
	
		// If HTTP 200 then success
		if ($status == 200)
		{
			// success
		}
	
	
	}
	
	return $response;
}


//--------------------------------------------------------------------------------------------------
// Return a list of unique name strings from GNRD response
function get_unique_names($response)
{
	$names = array();
  	if (isset($response->names))
   	{
   		$names = array();
   		foreach ($response->names as $name)
   		{
   			$namestring = $name->scientificName;

   			// fix names with hyphens 
   			$namestring = preg_replace('/-\s+/', '', $namestring);
   			
   			$names[] = $namestring;
   		}
   	}
   	$names = array_unique($names);
   	return $names;
}

?>