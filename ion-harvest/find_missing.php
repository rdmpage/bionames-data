<?php

// find missing names 


error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

	
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$start = 2365000;
$stop  = 2368000;

$ids = array();

for ($id = $start; $id < $stop; $id++)
{
	echo "$id";
	
	$sql = 'SELECT * FROM `names` WHERE `id` = "' . $id . '" LIMIT 1';

	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 0)
	{
		$ids[] = $id;
	}
	else
	{
		echo " ok";
	}

	echo "\n";
}

print_r($ids);

echo join(",\n", $ids) . "\n";

?>