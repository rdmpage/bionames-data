<?php

// Match RIS file to BHLEurope content

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once('../lib/fingerprint.php');
require_once('../lib/lcs.php');

require_once(dirname(dirname(__FILE__)) . '/ris.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


//--------------------------------------------------------------------------------------------------
function ris_import($reference)
{
	global $db;
	
	$sql = "SELECT *, MATCH(title) AGAINST(" . $db->qstr($reference->title) . ")
		AS score FROM bhleurope
		WHERE MATCH(title) AGAINST(" . $db->qstr($reference->title) . ")"
	
		//. " AND year = " . $reference->year 
		. " ORDER BY score DESC
		LIMIT 1";	
		
	//echo $sql;
		
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	$threshold = 90;
	$threshold = 85;
	//$threshold = 80;
	
	while (!$result->EOF) 
	{	
		//if ($debug)
		{
			//print_r($reference);
			//echo $result->fields['score'] . "|\t" . $result->fields['title'] . "\n";
		}
		
		$v1 = $reference->title;
		$v2 = $result->fields['title'];					

 		//$v2 = mb_convert_encoding($result->fields['title'], 'UTF-8', mb_detect_encoding($result->fields['title']));					
 		
 		$v2 = utf8_encode($result->fields['title']);

		//echo $v1 . "|\n";
		//echo $v2 . "|\n";
		
		//$v1 = finger_print($v1);
		//$v2 = finger_print($v2);					
		
		echo "-- $v1\n";
		echo "-- $v2\n";
		
		$lcs = new LongestCommonSequence($v1, $v2);
		$d = $lcs->score();
		
		//echo $d;
		
		$score = 100 * min($d / strlen($v1), $d / strlen($v2));
		
		echo "-- score=$score\n";
		
		if ($score >= $threshold)
		{
			// ok
			
			echo "-- found****\n";
			
			//print_r($reference);
			
			if(preg_match('/\/static\/(?<id>[a-z0-9]+)\//', $result->fields['pdf'], $mm))
			{
				echo "UPDATE names SET url='http://www.bhl-europe.eu/bhle-view/bhle:10706-" .  $mm['id'] . "' WHERE sici='" . $reference->publisher_id . "';\n";
			
			}
			
			echo "UPDATE names SET pdf='" .  $result->fields['pdf'] . "' WHERE sici='" . $reference->publisher_id . "';\n";
		}
		
		//exit();
		
		$result->MoveNext();
	}
	
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