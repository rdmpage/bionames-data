<?php

error_reporting(E_ALL ^ E_DEPRECATED);


require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;



$sql = 'SELECT * FROM names WHERE Publication LIKE "Bulletin de la Soci?t? Botanique de France %" AND Collation = "";';
$sql = 'SELECT * FROM names WHERE Publication LIKE "Curtis\'s Botanical Magazine %" AND Collation = "";';
$sql = 'SELECT * FROM names WHERE Publication LIKE "The Gardens\' Bulletin Singapore %" AND Collation = "";';
$sql = 'SELECT * FROM names WHERE Publication LIKE "Memoirs of the Torrey Botanical Club %" AND Collation = "";';
$sql = 'SELECT * FROM names WHERE Publication LIKE "Bulletin of the British Museum (Natural History), Botany %" AND Collation = "";';

$result = $db->Execute('SET max_heap_table_size = 1024 * 1024 * 1024');
$result = $db->Execute('SET tmp_table_size = 1024 * 1024 * 1024');


$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$Publication = $result->fields['Publication'];
	
	if (preg_match('/(?<journal>.*)\s+(?<volume>\d+)$/', $Publication, $m))
	{
		//print_r($m);
		
		$sql = 'UPDATE names SET Publication=' . $db->qstr($m['journal']) . ', Collation=' . $db->qstr($m['volume']) . ' WHERE  Publication=' . $db->qstr($Publication) . ';';
		echo $sql . "\n";
	
	}
	


	$result->MoveNext();
}

?>