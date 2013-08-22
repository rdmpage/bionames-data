<?php

// update clusters

require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

$db = NewADOConnection('mysql');
$db->Connect("localhost", 
'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$filename =  'update.txt';
$filename = 'cluster_ids.txt';
//$filename = 'missing-2013-06-12.txt';


$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

$skip = true;

while (!feof($file_handle)) 
{
	$cluster_id =trim(fgets($file_handle));
	
	if ($cluster_id == 4931113)
	{
		$skip = false;
	}
	
	if (!$skip)
	{
		
		// fetch from database
		
		$url = 'http://bionames.org/api/id/cluster/' . $cluster_id;
		
		echo $url . "\n";
		
		$json = get($url);
		
		if ($json != '')
		{
			$cluster = json_decode($json);
			
			//print_r($cluster);
			
			if (isset($cluster->group))
			{
				// skip
			}
			else
			{			
				$n = count($cluster->names);
				
				for ($i = 0; $i < $n; $i++)
				{
					$sql = 'SELECT * FROM names INNER JOIN names_ion_groups ON names.`group` = names_ion_groups.name WHERE names.id = ' . str_replace('urn:lsid:organismnames.com:name:', '', $cluster->names[$i]->id) . ' LIMIT 1';
		
					$result = $db->Execute($sql);
					if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
					
					if ($result->NumRows() == 1)
					{
						$groups = $result->fields['json'];
						$cluster->names[$i]->group = json_decode($groups);
						
						if (!isset($cluster->group))
						{
							$cluster->group = $cluster->names[$i]->group;
						}
						else
						{
							
						}
						
					}
				}
				
				//print_r($cluster);
				
				$resp = $couch->send("PUT", "/" . $config['couchdb_options']['database'] . "/" . urlencode($cluster->_id), json_encode($cluster));
				var_dump($resp);
				
				//exit();
			}	
		}
	}
}

?>