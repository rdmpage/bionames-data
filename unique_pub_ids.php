<?php

// Create unique ids based on md5 hash of publication string
// Can use these as _id field for CouchDB, for example

require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(__FILE__) . '/adodb5/adodb.inc.php');
require_once (dirname(__FILE__) . '/utils.php');


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$filename = 'pub_ids.txt';

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$id = trim(fgets($file_handle));
	
	if ($id != '')
	{
	
		$sql = 'SELECT publication, taxonAuthor, doi, biostor FROM names WHERE id=' . $id . ' LIMIT 1';
		
		$result = $db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
		
		if ($result->NumRows() == 1)
		{
			$publication = $result->fields['publication'];
					
			$str = publication_to_unique_string($result->fields['publication'], $result->fields['taxonAuthor'], $result->fields['doi'], $result->fields['biostor']);
			$m =  md5($str);	
			
			echo "-- $str\n";
			
			echo "UPDATE names SET sici=" . $db->qstr($m) . " WHERE id=$id;" . "\n";
			
		}
	}
}

?>