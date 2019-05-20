<?php

require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

function get_issn($journal)
{
	global $db;
	
	$issn = '';
	
	$sql = 'SELECT issn FROM names WHERE journal=' . $db->qstr($journal) . ' AND issn IS NOT NULL LIMIT 1';
	//$sql = 'SELECT issn FROM names2013 WHERE journal=' . $db->qstr($journal) . ' AND issn IS NOT NULL LIMIT 1';
	
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

$sql = 'select distinct journal from names where id > 5102576 and publication is not null';

$sql = 'select distinct journal from names where DATE_SUB(CURDATE(),INTERVAL 1 DAY)';
$sql = 'select distinct journal from names2013';

$sql = 'select distinct journal from `names-5148072` where issn IS NULL';
$sql = 'select distinct journal from `names-5156345` where issn IS NULL';
$sql = 'select distinct journal from `names-5170612` where issn IS NULL';
$sql = 'select distinct journal from `names-5194354` where issn IS NULL';

$sql = 'select distinct journal from `names-5206458` where issn IS NULL';

$sql = 'select distinct `journal` from `names-5215383` where `issn` IS NULL';

$sql = "select * from names where updated > '2015-10-01'";

// 2015-10-17
$sql = 'select distinct `journal` from `names-5224337` where `issn` IS NULL';


$sql = 'select distinct `journal` from `names-5237103` where `issn` IS NULL';

// 2016-01-16
$sql = 'select distinct `journal` from `names-5241772` where `issn` IS NULL';
$sql = 'select distinct `journal` from `names-5251401` where `issn` IS NULL and journal is not null';

// 2016-03-09
$sql = 'select distinct `journal` from `names-5256965` where `issn` IS NULL and journal is not null';

// 2016-07-24
$sql = 'select distinct `journal` from `names` where `issn` IS NULL and journal is not null and  updated > "2016-07-24 10:00:00"';


$sql = 'select distinct `journal` from `names-5262018` where `issn` IS NULL and journal is not null';

// 2017-06-01
$sql = 'select distinct `journal` from `names-5304582` where `issn` IS NULL and journal is not null';

$sql = 'select distinct `journal` from `names-5333010` where `issn` IS NULL and journal is not null';
$sql = 'select distinct `journal` from `names-5340754` where `issn` IS NULL and journal is not null';
$sql = 'select distinct `journal` from `names-5353853` where `issn` IS NULL and journal is not null';

$sql = 'select distinct `journal` from names where updated >= "2018-12-25" AND `issn` IS NULL and journal is not null';

$sql = 'select distinct `journal` from names where updated >= "2019-04-11" AND `issn` IS NULL and journal is not null';


$result = $db->Execute('SET max_heap_table_size = 1024 * 1024 * 1024');
$result = $db->Execute('SET tmp_table_size = 1024 * 1024 * 1024');


$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$journal = $result->fields['journal'];
	
	$issn = get_issn($journal);
	if ($issn != '')
	{
		$sql = 'UPDATE names SET issn="' . $issn . '" WHERE  journal=' . $db->qstr($journal) . ' AND DATE_SUB(CURDATE(),INTERVAL 1 DAY) <= updated;';
//		$sql = 'UPDATE names SET issn="' . $issn . '" WHERE  journal=' . $db->qstr($journal) . ' AND year=2013;';
		
		echo $sql . "\n";
	}

	$result->MoveNext();
}

?>