<?php

// IPNI BHL protologues

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$sql = 'SELECT * FROM ipni.names WHERE Publication="Revis. Gen. Pl." AND bhl IS NULL';
//$sql = 'SELECT * FROM ipni.names WHERE Publication="Revis. Gen. Pl." AND bhl IS NULL';

$count = 1;

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$url = 'http://www.ipni.org/ipni/idPlantNameSearch.do?id=' . $result->fields['Id'];
	
	echo "-- " . $result->fields['Id'] . "\n";
	
	$html = get($url);
	
	//echo $html;
	
	if (preg_match('/\[Read the <a href="http:\/\/www.biodiversitylibrary.org\/page\/(?<pageid>\d+)">protologue<\/a> in BHL\]/Uu', $html, $m))
	{
		echo 'UPDATE names set bhl="' . $m['pageid'] . '" WHERE Id="' . $result->fields['Id'] . '";' . "\n";
	}

	if (($count++ % 5) == 0)
	{
		$rand = rand(10000, 5000000);
		echo '...sleeping for ' . round(($rand / 1000000),2) . ' seconds' . "\n";
		usleep($rand);
	}

	
	
	$result->MoveNext();
}

?>