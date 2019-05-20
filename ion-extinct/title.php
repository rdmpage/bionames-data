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

/*
// Paleozoic
$eras=array(
'Cambrian', 'Ordovician', 'Silurian', 'Devonian', 'Carboniferous','Permian'
);
*/

/*
// Mesozoic
$eras = array(
'Triassic', 'Jurassic', 'Cretaceous'
);
*/

/*
// Cenozoic
$eras = array(
'Paleocene', 'Eocene', 'Oligocene', 'Miocene', 'Pliocene', 'Pleistocene'
);
*/

//$eras=array('Holocene');


$eras=array('Paleozoic','Mesozoic','Cenozoic', 'Paleogene','Neogene', 'Pennsylvanian', 'Campanian', 'Mississippian');


// Note examples like 4442329 where the title is "extinct(?)"
//$eras=array('fossil', 'extinct');

foreach ($eras as $era)
{
	$sql_string = '';
	
	echo $era . "\n";

	// taxonomic names
	$sql = 'SELECT * from names WHERE title LIKE "%' . $era . '%" AND names.extinct IS NULL';
	
	echo $sql . "\n";


	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

	while (!$result->EOF) 
	{	
		$cluster_id = $result->fields['cluster_id'];		
		
		$sql_string .= 'UPDATE names SET extinct="Y", extinct_source="title" WHERE `cluster_id`="' . $cluster_id  . '";' . "\n";
				
		$result->MoveNext();						
	}
	
	file_put_contents($era . '.sql', $sql_string);
}



?>