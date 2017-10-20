<?php

// fetch back bibliographic metadata (again)

require_once (dirname(dirname(__FILE__)) . '/lib.php');

$sicis=array(
'703b79c5edbfb873e82cbf19835f5f6f',
'414775c999d1b2c913cb5ec232f42527');

foreach ($sicis as $sici)
{

	echo "-- $sici\n";
	
	
	$url = 'http://bionames.org/bionames-api/api_id.php?id=' . urlencode($sici);
	
	
	//echo $url . "\n";
		
	$json = get($url);
	
	//echo $json;
	
	if ($json != '')
	{
		$reference = json_decode($json);
		
		$sql = 'UPDATE `names`';
				
		
		$pdf = '';
		
		if (isset($reference->link))
		{
			
			
			foreach ($reference->link as $link)
			{
				$k = $link->anchor;
				$v = $link->url;
				
				switch ($link->anchor)
				{
					case 'PDF':
						$pdf = $v;
						break;
					
					default:
						break;
				}
				
				
			}
			
		}
		
		if ($pdf != '')
		{
			$sql .= ' SET pdf="' . $pdf . '"';
		}
		else
		{
			$sql .= ' SET pdf=NULL';
		}
		
		
		$journal = '';
		$volume = '';
		if (isset($reference->journal))
		{		
			if (isset($reference->journal->name))
			{
				$journal = $reference->journal->name;
			}
			if (isset($reference->journal->volume))
			{
				$volume = $reference->journal->volume;
			}
		}

		if ($journal != '')
		{
			$sql .= ', journal="' . addcslashes($journal, '"') . '"';
		}
		else
		{
			$sql .= ',  journal=NULL';
		}
		if ($volume != '')
		{
			$sql .= ', volume="' . $volume . '"';
		}
		else
		{
			$sql .= ', volume=NULL';
		}


		$sql .= ' WHERE `sici` = "' . $sici . '";';
		echo $sql .= "\n";
	}
	else
	{
		echo "-- Not found $sici\n";
	}
}

?>