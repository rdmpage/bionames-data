<?php

// look in local BHL

// assumes we know item for a given reference

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
function find(&$reference)
{
	global $db;
	
	$sql = "SELECT * FROM bhl_page WHERE ItemID=" . $reference->ItemID . "  AND PageNumber=" . $reference->journal->pages;
	
	//echo $sql . "\n";
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$reference->PageID = $result->fields['PageID'];
	}
}
	
	
//--------------------------------------------------------------------------------------------------
function find_item($TitleID, $volume)
{
	global $db;
	
	$ItemID = 0;
	
	$pattern = '';
	
	switch ($TitleID)
	{
		case 314:
			$pattern = "v.$volume %";
			break;


		case 8113:
			$pattern = "v.$volume (%";
			break;
			
		default:
			break;
	}
	
	$sql = 'SELECT * FROM bhl_item WHERE TitleID=' . $TitleID . '  AND VolumeInfo LIKE "' . $pattern . '"';
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$ItemID = $result->fields['ItemID'];
	}
	
	return $ItemID;
}


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$sql = 'SELECT * FROM ipni.names WHERE Publication="Fl. Yunnan." AND Collation LIKE "3%"';


$TitleID = 8113;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Sida" AND Collation LIKE "11(%"';
$sql = 'SELECT * FROM ipni.names WHERE Publication="Sida" AND Collation <> ""';


$TitleID = 314;
$sql = 'SELECT * FROM ipni.names WHERE Publication="Notul. Syst. (Paris)" AND Collation LIKE "14:%"';
//$sql = 'SELECT * FROM ipni.names WHERE Publication="Notul. Syst. (Paris)" AND Collation <> ""';


//$sql = 'SELECT * FROM ipni.names WHERE Id="99377-1"';


$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$reference = new stdclass;
	
	$reference->id = $result->fields['Id'];
	
	$reference->journal = new stdclass;
	$reference->journal->name = $result->fields['Publication'];
	
	if ($result->fields['issn'] != '')
	{
		$identifier = new stdclass;
		$identifier->type = 'issn';
		$identifier->id = $result->fields['issn'];
		$reference->journal->identifier[] = $identifier;
	}
	
	$reference->year = $result->fields['Publication_year_full'];
	
	echo "-- " .  $result->fields['Id'] . " " . $result->fields['Publication'] . " " . $result->fields['Collation'] . " " . $result->fields['Publication_year_full'] . "\n";

	
	$matched = false;
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\((?<issue>.*)\):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}

	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+):\s+(?<pages>\d+)[,]?/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\s+(?<pages>\d+)$/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// 1936, xvii. 48
	if (!$matched)
	{
		if (preg_match('/[0-9]{4},\s+(?<volume>[ivxlc]+)\.\s+(?<pages>\d+)\.?$/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// xliii. 74 1962
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ivxlc]+)\.\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	if ($matched)
	{
		// Map publication to ItemID here... 

		$ItemID = find_item($TitleID, $reference->journal->volume);
		
		if ($ItemID != 0)
		{
			$reference->ItemID = $ItemID;		
			//print_r($reference);
			find($reference);
			//print_r($reference);
			
			if (isset($reference->PageID))
			{
				echo 'UPDATE names SET bhl=' . $reference->PageID . ' WHERE Id="' . $reference->id . '";' . "\n";
			}
		}		

	}
	else
	{
		echo "-- not matched\n";
		//exit();
	}
	
	
	$result->MoveNext();
}

?>