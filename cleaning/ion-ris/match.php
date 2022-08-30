<?php

// Microcitation matching 

require_once (dirname(dirname(dirname(__FILE__))) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

//----------------------------------------------------------------------------------------
function get($url)
{
	$obj = new stdclass;

	$opts = array(
	  CURLOPT_URL =>$url,
	  CURLOPT_FOLLOWLOCATION => TRUE,
	  CURLOPT_RETURNTRANSFER => TRUE
	);
	
	$ch = curl_init();
	curl_setopt_array($ch, $opts);
	$data = curl_exec($ch);
	$info = curl_getinfo($ch); 
	curl_close($ch);
	
	if ($data != '')
	{
		$obj = json_decode($data);
		
	}
	
	return $obj;
			
}	


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$sql="select * from names where issn='0003-0023' AND doi IS NULL";


$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$reference = new stdclass;

	$reference->id = $result->fields['sici'];	
	$reference->journal = $result->fields['journal'];
	$reference->issn = $result->fields['issn'];
	$reference->volume = $result->fields['volume'];
	$reference->spage = $result->fields['spage'];

	
	$parameters = array();
	
	if (isset($reference->issn))
	{
		$parameters['issn'] = $reference->issn;
	}
	if (isset($reference->volume))
	{
		$parameters['volume'] = $reference->volume;
	}
	if (isset($reference->spage))
	{
		$parameters['page'] = $reference->spage;
	}
	
	//print_r($parameters);
	
	
	
	$url = 'http://localhost/~rpage/microcitation/www/index.php?' . http_build_query($parameters);
		
	$obj = get($url);
	
	//print_r($x);
	
	if (isset($obj->found) && $obj->found)
	{
		//echo $obj->doi . "\n";
		
		if (count($obj->results) == 1)
		{
			// DOI
			if (isset($obj->results[0]->doi))
			{
				echo 'UPDATE names SET doi="' . $obj->results[0]->doi . '" WHERE sici="' . $reference->id . '";' . "\n";
			}
		}
	}
	

		
	
	$result->MoveNext();
}



?>