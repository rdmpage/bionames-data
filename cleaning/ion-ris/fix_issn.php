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

//$sql = "select * from names4495670_4499910 where publication is not null";

$sql = 'select distinct journal from names where DATE_SUB(CURDATE(),INTERVAL 1 DAY) <= updated';

$sql = 'select distinct journal from names_1922';

$sql = 'select distinct journal from names where DATE_SUB(CURDATE(),INTERVAL 1 DAY) <= updated and year=1903';

$sql = 'select distinct journal from names where journal is not null and year=2011';
$sql = 'select distinct journal from names where journal is not null and year=1983';


$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$journal = $result->fields['journal'];
	
	$issn = get_issn($journal);
	if ($issn != '')
	{
//		$sql = 'UPDATE names SET issn="' . $issn . '" WHERE  journal=' . $db->qstr($journal) . ' AND DATE_SUB(CURDATE(),INTERVAL 1 DAY) <= updated;';
		$sql = 'UPDATE names SET issn="' . $issn . '" WHERE  journal=' . $db->qstr($journal) . ' AND year=1983;';
		
		echo $sql . "\n";
	}
	
	


	$result->MoveNext();
}

?>