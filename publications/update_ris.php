<?php

// update authors from RIS file to reference we already have

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)). '/couchsimple.php');

require_once (dirname(__FILE__) . '/mendeley.php');
require_once (dirname(__FILE__) . '/publication_utils.php');

require_once(dirname(dirname(__FILE__)) . '/ris.php');



//--------------------------------------------------------------------------------------------------
function ris_import($reference)
{
	global $couch;
	
	//print_r($reference);
	//exit();
	
	// find this reference
	$id = have_reference_already($reference);
	
	if ($id)
	{
		//r($reference);
		
		$url = 'http://bionames.org/bionames-api/api_id.php?id=' . urlencode($id);
		
		
		//echo $url . "\n";
			
		$json = get($url);
		
		//echo $json;
		
		if ($json != '')
		{
			$db_reference = json_decode($json);
			
			$have_authors = true;
			
			if (isset($db_reference->author))
			{
				$have_authors = (count($db_reference->author) > 0);
			}
			else
			{
				$have_authors = false;
			}
			
			if (!$have_authors)
			{
				echo "Adding authors\n";
				
				//print_r($reference);				
				$db_reference->author = $reference->author;
				//print_r($db_reference);
				$couch->add_update_or_delete_document($db_reference,  $db_reference->_id);
				//exit();
			}
		}
		
		//exit();
			
	}
	else
	{
		echo "Not found\n";
	}

	
	/*
	if (isset($reference->_id))
	{
		if (have_reference_already($reference))
		{
			echo "\nHave reference already\n";
		}
		else
		{
			$couch->add_update_or_delete_document($reference,  $reference->_id);
		}
	}
	*/
	
}




//--------------------------------------------------------------------------------------------------
$filename = '';
if ($argc < 2)
{
	echo "Usage: import_ris.php <RIS file> \n";
	exit(1);
}
else
{
	$filename = $argv[1];
}

$file = @fopen($filename, "r") or die("couldn't open $filename");
fclose($file);

import_ris_file($filename, 'ris_import');


?>