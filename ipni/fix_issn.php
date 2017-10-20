<?php

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

function get_issn($journal)
{
	global $db;
	
	$issn = '';
	
	$sql = 'SELECT issn FROM names WHERE Publication=' . $db->qstr($journal) . ' AND issn IS NOT NULL LIMIT 1';
	//$sql = 'SELECT issn FROM names2013 WHERE journal=' . $db->qstr($journal) . ' AND issn IS NOT NULL LIMIT 1';
	
	//echo $sql . "\n";
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1) 
	{
		$issn = $result->fields['issn'];
	}
	
	return $issn;
	
}


$sql = 'select distinct `Publication` from `names` where `issn` IS NULL and Publication is not null AND DATE_SUB(CURDATE(),INTERVAL 1 DAY) <= updated;';

//echo $sql . "\n";

$result = $db->Execute('SET max_heap_table_size = 1024 * 1024 * 1024');
$result = $db->Execute('SET tmp_table_size = 1024 * 1024 * 1024');


$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$journal = $result->fields['Publication'];
	
	echo "-- $journal\n";
	
	$issn = get_issn($journal);
	if ($issn != '')
	{
		$sql = 'UPDATE names SET issn="' . $issn . '" WHERE  Publication=' . $db->qstr($journal) . ' AND DATE_SUB(CURDATE(),INTERVAL 1 DAY) <= updated;';
		
		echo $sql . "\n";
	}
	
	


	$result->MoveNext();
}

?>