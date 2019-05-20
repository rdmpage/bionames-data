<?php

// Get extinct flag for names

require_once (dirname(dirname(__FILE__)) . '/config.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

//----------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


//----------------------------------------------------------------------------------------

$filename = 'groups.txt';
$filename = 'names.txt';
$filename = 'test.txt';

$file_handle = fopen($filename, "r");

$count = 1;

while (!feof($file_handle)) 
{
	$name = trim(fgets($file_handle));
	if ($name != '')
	{
		echo "-- $name\n";
		
		// groups
		$sql = 'SELECT * from names INNER JOIN paleodb_taxon ON names.`group` = paleodb_taxon.scientificName
INNER JOIN paleodb_speciesprofile ON paleodb_taxon.id = paleodb_speciesprofile.id
WHERE `group` = ' . $db->qstr($name) . ' AND paleodb_speciesprofile.isExtinct="true" LIMIT 1';

		// taxonomic names
		$sql = 'SELECT * from names INNER JOIN paleodb_taxon ON names.`nameComplete` = paleodb_taxon.scientificName
INNER JOIN paleodb_speciesprofile ON paleodb_taxon.id = paleodb_speciesprofile.id
WHERE `nameComplete` = ' . $db->qstr($name) . ' AND paleodb_speciesprofile.isExtinct="true" AND names.extinct IS NULL LIMIT 1';
		
		
		$result = $db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
		while (!$result->EOF) 
		{	
			if ($result->fields['isExtinct'] == 'true')
			{
				//echo "-- is extinct\n";
				
				//echo 'UPDATE names SET extinct="Y", extinct_source="paleodb" WHERE `group`="' . $name . '";' . "\n";
				
				$cluster_id = $result->fields['cluster_id'];
				
				echo 'UPDATE names SET extinct="Y", extinct_source="paleodb" WHERE `cluster_id`="' . $cluster_id  . '";' . "\n";
			}
						
			$result->MoveNext();						
		}
		
		
		
	}
	
		// Give server a break every 10 items
		if (($count++ % 10) == 0)
		{
			$rand = rand(100000, 300000);
			echo "\n-- sleeping for " . round(($rand / 1000000),2) . ' seconds' . "\n\n";
			usleep($rand);
		}
	
}


?>