<?php

// fix missing URLs

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$sicis = array();

$sql = 'SELECT sici, pdf FROM names WHERE issn="1148-8425" and pdf LIKE "http://www.bhl-europe.eu/static/%" AND url IS NULL';


		
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	while (!$result->EOF) 
	{	
		if(preg_match('/\/static\/(?<id>[a-z0-9]+)\//', $result->fields['pdf'], $mm))
		{
			echo "UPDATE names SET url='http://www.bhl-europe.eu/bhle-view/bhle:10706-" .  $mm['id'] . "' WHERE sici='" . $result->fields['sici'] . "';\n";		
		}
		$result->MoveNext();
	}
	



?>