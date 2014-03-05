<?php

// Look up citations

require_once('../lib.php');

//--------------------------------------------------------------------------------------------------
function lookup($reference)
{	
	global $config;
	
	$ch = curl_init(); 
	
	$url = 'http://bionames.org/bionames-api/api_lookup.php';
	
	curl_setopt ($ch, CURLOPT_URL, $url); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 

	// Set HTTP headers
	$headers = array();
	$headers[] = 'Content-type: application/json'; // we are sending JSON
	
	// Override Expect: 100-continue header (may cause problems with HTTP proxies
	// http://the-stickman.com/web-development/php-and-curl-disabling-100-continue-header/
	$headers[] = 'Expect:'; 
	curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
	
	if ($config['proxy_name'] != '')
	{
		curl_setopt($ch, CURLOPT_PROXY, $config['proxy_name'] . ':' . $config['proxy_port']);
	}

	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($reference));
	
	$response = curl_exec($ch);
	
	//echo $response;
	
	$obj = json_decode($response);

	return $obj;	
}



//--------------------------------------------------------------------------------------------------
$filename = 'examples/ansorgei.json';
//$filename = 'key.json';
//$filename = 'mops.json';

$filename = 'Vampyressa.json';
//$filename = '27.json';
//$filename = 'zookeys.285.4892.json';
//$filename = 'zookeys.183.3073.json';
//$filename = 'B36.json';

//$filename = 'zookeys.99.723.json';

$filename = 'Kerivoula.json';

$filename = 'examples/bats.json';
$filename = 'homonymy.json';


$json = file_get_contents($filename);

$references = json_decode($json);

$citations = array();

//print_r($references);


if (1)
{
	foreach ($references as $reference)
	{
		//print_r($reference);
		
		//$reference = lookup($reference);
		
		
		
		$citations[] = $reference;
	}
}

echo json_encode($citations);

?>
