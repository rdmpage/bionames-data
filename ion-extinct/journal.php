<?php

// Get extinct flag for names

require_once (dirname(dirname(__FILE__)) . '/config.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

//----------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


//----------------------------------------------------------------------------------------


$journals = array(
'Revue de Micropaleontologie'
);

$issns = array(
//'0035-1598' // Revue de Micropaleontologie
//'0022-3360' // Journal of paleontology
'0026-2803' // Micropaleontology
);


foreach ($issns as $issn)
{
	$sql_string = '';
	
	echo $issn . "\n";

	// taxonomic names
	$sql = 'SELECT * from names WHERE issn="' . $issn . '" AND names.extinct IS NULL';
	
	echo $sql . "\n";


	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

	while (!$result->EOF) 
	{	
		$cluster_id = $result->fields['cluster_id'];		
		
		$sql_string .= 'UPDATE names SET extinct="Y", extinct_source="journal" WHERE `cluster_id`="' . $cluster_id  . '";' . "\n";
				
		$result->MoveNext();						
	}
	
	file_put_contents($issn . '.sql', $sql_string);
}



?>