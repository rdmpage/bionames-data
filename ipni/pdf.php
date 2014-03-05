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

$sql = 'SELECT DISTINCT pdf FROM publication WHERE secondary_title="Acta Phytotax. Sin."';

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$reference = new stdclass;
	
	$pdf = $result->fields['pdf'];
	
	// http://www.plantsystematics.com/qikan/public/tjdjl_en.asp?wenjianming=FL9-1-5&houzhui=.pdf&id=13024
	// http://www.plantsystematics.com/qikan/manage/wenzhang/FL11-2-4.pdf
	
	if (preg_match('/wenjianming=(?<id>.*)&houzhui=/', $pdf, $m))
	{
		$url = 'http://www.plantsystematics.com/qikan/manage/wenzhang/' . $m['id'] . '.pdf';
		echo $url . "\n";
	}
	
	$result->MoveNext();
}

?>