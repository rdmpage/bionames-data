<?php

// Dump and process large MySQL database by paging through the data

error_reporting(E_ALL ^ E_DEPRECATED);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

// Connect
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db->EXECUTE("set names 'utf8'"); 


$page = 1000;
$offset = 0;

$done = false;

echo "id\tcluster_id\tgroup\tnameComplete\ttaxonAuthor\n";

while (!$done)
{
	$sql = 'select id, cluster_id, `group`, nameComplete, taxonAuthor from names';
	
	$sql .= ' LIMIT ' . $page . ' OFFSET ' . $offset;

	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

	while (!$result->EOF) 
	{
		$row = array();
		
		$row[] = $result->fields['id'];
		$row[] = $result->fields['cluster_id'];
		$row[] = $result->fields['group'];
		$row[] = $result->fields['nameComplete'];
		$row[] = $result->fields['taxonAuthor'];
		
		echo join("\t", $row) . "\n";

		$result->MoveNext();

	}
	
	if ($result->NumRows() < $page)
	{
		$done = true;
	}
	else
	{
		$offset += $page;
		
		// If we want to bale out and check it worked
		//if ($offset > 1000) { $done = true; }
	}
	

}

?>
