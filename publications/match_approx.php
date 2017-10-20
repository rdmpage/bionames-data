<?php

// match using "remote" microcitation title resolver

//error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$issn = '0084-5604';
$year = 1999;

$sql = 'SELECT DISTINCT `sici`, `title`, issn, year FROM `names` WHERE`issn`="' . $issn . '" and `year` = '. $year . ' LIMIT 1';
$sql = 'SELECT  sici, `title` FROM `names` WHERE `issn`="0084-5604"  and year=1999 limit 5;';

$sql = 'select * from names where sici="2ae02afbf80837b8df70f5dd7fb5dbca"';

$issn = '0749-6737';
$issn = '1306-3022';
$issn = '0065-1710';
$issn = '1028-3420';

$sql = "select * from names where issn='" . $issn . "' and pdf is null";

//$sql .= ' AND doi IS NULL LIMIT 100';


$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$sici = $result->fields['sici'];
	
	$parameters['atitle'] = $result->fields['title'];
	$parameters['issn'] = $issn;
//	$parameters['year'] = $year;
	$url = 'http://localhost/~rpage/microcitation/www/api_openurl.php?' . http_build_query($parameters);
			
	$json = get($url);
	
	echo "-- $url\n";
	
	//echo $json;
		
	
	$obj = json_decode($json);
	
	//print_r($obj);
	
	//echo '-- ' . $obj->sql . "\n";
	
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
			
			/*
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
			*/
		}
	}
	else
	{
		echo "-- no match\n";
	}
	
	
	$result->MoveNext();
}

?>