<?php

// Load local copy of JSON GBIF (which has map to ION)
error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


$basedir = 'gbif';
$files1 = scandir(dirname(__FILE__) . '/' . $basedir);

foreach ($files1 as $directory)
{
	if (preg_match('/^\d+$/', $directory))
	{	
		$files2 = scandir(dirname(__FILE__) . '/' . $basedir . '/' . $directory);

		foreach ($files2 as $filename)
		{
			//echo $filename . "\n";
			if (preg_match('/^(?<id>\d+)\.json$/', $filename, $m))
			{	
				$id = 'gbif/' . $m['id'];
				
				if ($m['id'] > 6119329)
				{
				
					$path = $basedir . '/' . $directory . '/' . $filename;
					echo "$path\n";
					
					$json = file_get_contents($path);
					
					$resp = $couch->send("PUT", "/" . $config['couchdb_options']['database'] . "/" . urlencode($id), $json);
					var_dump($resp);
				}				
				//exit();
				
				
			}
		}
	}
}


?>
