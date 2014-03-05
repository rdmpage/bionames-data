<?php

require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$sql = 'SELECT * FROM names WHERE journal="London British Museum (Natural History)"';
//$sql = 'SELECT * FROM names WHERE journal="Insects of Samoa"';



$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);


while (!$result->EOF) 
{	
	if (preg_match('/\. Ruwenzori Expedition 1952$/', $result->fields['title']))
	{
		$title = $result->fields['title'];
		$title = str_replace('. Ruwenzori Expedition 1952', '', $title);
		
		$journal = 'Ruwenzori Expedition 1952';
		
		$sql = "UPDATE names SET title='$title', journal='$journal', oclc=532765 WHERE id=" . $result->fields['id'] . ";";
		
		echo $sql . "\n";
		
	}
	
	// Ruwenzori Expedition 1934-35
	if (preg_match('/\. Ruwenzori Expedition 1934-35$/', $result->fields['title']))
	{
		$title = $result->fields['title'];
		$title = str_replace('. Ruwenzori Expedition 1934-35', '', $title);
		
		$journal = 'Ruwenzori Expedition 1934-35';
		
		$sql = "UPDATE names SET title='$title', journal='$journal', oclc=3765205 WHERE id=" . $result->fields['id'] . ";";
		
		echo $sql . "\n";
		
	}
	
	// . Ruwenzori Exped. 1934-35
	if (preg_match('/\. Ruwenzori Exped. 1934-35$/', $result->fields['title']))
	{
		$title = $result->fields['title'];
		$title = str_replace('. Ruwenzori Exped. 1934-35', '', $title);
		
		$journal = 'Ruwenzori Exped. 1934-35';
		
		$sql = "UPDATE names SET title='$title', journal='$journal', oclc=3765205 WHERE id=" . $result->fields['id'] . ";";
		
		echo $sql . "\n";
		
	}
	
	// Ruwenzori Expedition 1934-5
	if (preg_match('/\. Ruwenzori Expedition 1934-5$/', $result->fields['title']))
	{
		$title = $result->fields['title'];
		$title = str_replace('. Ruwenzori Expedition 1934-5', '', $title);
		
		$journal = 'Ruwenzori Expedition 1934-5';
		
		$sql = "UPDATE names SET title='$title', journal='$journal', oclc=3765205 WHERE id=" . $result->fields['id'] . ";";
		
		echo $sql . "\n";
		
	}
	
	// Ruwenzori Expedition 1934-35. Cerambycidae
	if (preg_match('/^Ruwenzori Expedition 1934-35/', $result->fields['title']))
	{
		$title = $result->fields['title'];
		$title = str_replace('Ruwenzori Expedition 1934-35. ', '', $title);
		
		$journal = 'Ruwenzori Expedition 1934-35';
		
		$sql = "UPDATE names SET title='$title', journal='$journal', oclc=3765205 WHERE id=" . $result->fields['id'] . ";";
		
		echo $sql . "\n";
		
	}
	
	// Insects of Samoa
	if (preg_match('/\. Insecta of Samoa$/', $result->fields['title']))
	{
		$title = $result->fields['title'];
		$title = str_replace('. Insecta of Samoa', '', $title);
		
		$journal = 'Insecta of Samoa';
		
		$sql = "UPDATE names SET title='$title', journal='$journal', oclc=149683940 WHERE id=" . $result->fields['id'] . ";";
		
		echo $sql . "\n";
		
	}
	
	
	$result->MoveNext();
}



?>