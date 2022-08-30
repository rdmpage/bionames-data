<?php

// ION page selector



require_once('../adodb5/adodb.inc.php');


//----------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	'root' , '' ,'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db->EXECUTE("set nz 'utf8'"); 



$page = 1000;
$offset = 0;

$done = false;

$debug = false;
//$debug = true;

while (!$done)
{
	$sql = 'SELECT * FROM names WHERE spage IS NOT NULL AND microreference IS NOT NULL AND (microreference <> "")';
	
	// Bulletin of the British Arachnological Society
	// $sql .= ' AND issn="0524-4994"';
	
	$sql .= ' LIMIT ' . $page . ' OFFSET ' . $offset;
			
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __LINE__ . "]: " . $sql);
	while (!$result->EOF) 
	{
		$hit = new stdclass;
		$hit->id = $result->fields['id'];
		$hit->nameComplete = $result->fields['nameComplete'];
		$hit->spage = $result->fields['spage'];
		if ($result->fields['epage'] != "")
		{
			$hit->epage = $result->fields['epage'];
		}
		$hit->microreference = $result->fields['microreference'];
		
		// print_r($hit);
		
		echo "-- " . $hit->id . " " . $hit->nameComplete . " " . $hit->spage;
		if (isset($hit->epage))
		{
			echo "-" . 	$hit->epage;
		}
		echo " [" . 	$hit->microreference . "]";
		echo "\n";
		
		// OK...
		
		
		if (isset($hit->epage))
		{
			// both pages
			if (
				is_numeric($hit->spage)
				&& is_numeric($hit->epage)
				&& is_numeric($hit->microreference)
			)
			{
				if (
					($hit->microreference >= $hit->spage)
					&& ($hit->microreference <= $hit->epage)
				)
				{
					$selector = $hit->microreference - $hit->spage + 1;
				
					// echo "selector=$selector\n";
				
					echo 'UPDATE names SET selector="' . $selector . '" WHERE id="' . $hit->id . '";' . "\n";
				}
			}
		}
		else
		{
			// just spage
			if (
				is_numeric($hit->spage)
				&& is_numeric($hit->microreference)
			)
			{
				if (
					$hit->microreference == $hit->spage
				)
				{
					$selector = $hit->microreference - $hit->spage + 1;
				
					// echo "selector=$selector\n";
				
					echo 'UPDATE names SET selector="' . $selector . '" WHERE id="' . $hit->id . '";' . "\n";
				}
			}
			
		
		}


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