<?php

// Get extinct flag for names from WorMS

require_once (dirname(dirname(__FILE__)) . '/config.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


require_once (dirname(dirname(__FILE__)) . '/config.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

//----------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


// selection
$sql = 'SELECT * from names WHERE nameComplete LIKE "Planulina%" AND names.extinct IS NULL';

echo $sql . "\n";


$sql_string = '';

$count = 1;

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$cluster_id = $result->fields['cluster_id'];
	$name = $result->fields['nameComplete'];
	
	echo $name;
	
	$url = 'http://www.marinespecies.org/rest/AphiaRecordsByName/' . str_replace(' ', '%20', $name) . '?marine_only=false&offset=1';
	
	//echo $url . "\n";
	
	$json = get($url, '', 'application/json');
	
	if ($json != '')
	{
		$obj = json_decode($json);
		
		if (isset($obj))
		{
		
			//print_r($obj);
		
			$isExtinct = false;
			
			foreach ($obj as $item)
			{
				if ($item->isExtinct)
				{
					$isExtinct = true;
				}
			}
			
			if ($isExtinct)
			{
				echo " extinct";
				$sql_string .= 'UPDATE names SET extinct="Y", extinct_source="worms" WHERE `cluster_id`="' . $cluster_id  . '";' . "\n";

			}
		}
			
		
	}
		
	echo "\n";
	
	if (($count++ % 10) == 0)
	{
		$rand = rand(100000, 1000000);
		echo '...sleeping for ' . round(($rand / 1000000),2) . ' seconds' . "\n";
		usleep($rand);
	}

	
	$result->MoveNext();						
}

file_put_contents('worms.sql', $sql_string);





?>