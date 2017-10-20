<?php

// match using "remote" microcitation resolver

//error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;




$sql = 'SELECT DISTINCT `sici`, `title` FROM `names` WHERE`issn`="0035-6883" and `year` > 1995 AND doi is NULL';

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$sici = $result->fields['sici'];
	
	$parameters['title'] = $result->fields['title'];
	$url = 'http://localhost/~rpage/microcitation/www/index.php?' . http_build_query($parameters);
			
	$json = get($url);
	
	echo "-- $url\n";
		
	
	$obj = json_decode($json);
	
	//print_r($obj);
	
	echo '-- ' . $obj->sql . "\n";
	
	if ($obj->found)
	{
		if (count($obj->results) == 1)
		{
			// DOI
			if (isset($obj->results[0]->doi))
			{
				echo 'UPDATE names SET doi="' . $obj->results[0]->doi . '" WHERE sici="' . $sici . '";' . "\n";
			}
			
			// PDF
			if (isset($obj->results[0]->pdf))
			{
				echo 'UPDATE names SET pdf="' . $obj->results[0]->pdf . '" WHERE sici="' . $sici . '";' . "\n";
			}				
			
			// URL
			if (isset($obj->results[0]->url))
			{
				$use_url = true;
				
				if (isset($obj->results[0]->jstor)) { $use_url = false; }
				
				if ($use_url)
				{
					echo 'UPDATE names SET url="' . $obj->results[0]->url . '" WHERE sici="' . $sici . '";' . "\n";
				}
			}
		}
	}
	else
	{
		echo "-- no match\n";
	}
	
	
	$result->MoveNext();
}

?>