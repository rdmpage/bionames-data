<?php

// Get extinct flag for names

require_once (dirname(dirname(__FILE__)) . '/config.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


$filename = 'groups.txt';

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$name = trim(fgets($file_handle));
	if ($name != '')
	{
		echo "-- $name\n";
		
		$url = 'https://paleobiodb.org/data1.2/taxa/single.json?name=' . urlencode($name) . '&show=attr';
		
		//echo $url . "\n";
		
		$json = get($url);
		
		//echo $json;
		
		if ($json != '')
		{
			$obj = json_decode($json);
			
			//print_r($obj);
			
			if (isset($obj->records))
			{
				if (count($obj->records) == 1)
				{
					if ($obj->records[0]->ext == 0)
					{
						echo "-- extinct\n";
						
						echo 'UPDATE names SET extinct="Y" WHERE `group`="' . $name . '";' . "\n";
					}
				}
			}
		}
		
	}
}


?>