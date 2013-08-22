<?php

require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

function get_issn($journal)
{
	global $db;
	
	$issn = '';
	
	$sql = 'SELECT issn FROM names WHERE journal=' . $db->qstr($journal) . ' AND issn IS NOT NULL LIMIT 1';
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1) 
	{
		$issn = $result->fields['issn'];
	}
	
	return $issn;
	
}



$id = 4964979;
$id = 5015135;

$sql = 'select distinct journal from names where id > 4964979 and publication is not null';

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$journal = $result->fields['journal'];
	
	$issn = get_issn($journal);
	if ($issn != '')
	{
		$sql = 'UPDATE names SET issn="' . $issn . '" WHERE  journal=' . $db->qstr($journal) . ' AND id > ' . $id . ';';
		
		echo $sql . "\n";
	}
	
	


	$result->MoveNext();
}

?>