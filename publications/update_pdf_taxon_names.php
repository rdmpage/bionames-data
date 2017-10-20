<?php

// Extract names from PDFs and update 

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');

require_once (dirname(__FILE__) . '/publications_core.php');
require_once (dirname(__FILE__) . '/gnrd.php');


function extract_names($sha1)
{
	$names = array();
	
	$url = 'http://bionames.org/bionames-archive/documentcloud/' . $sha1 . '.json';
	$json = get($url);
	$documentcloud = json_decode($json);
	
	if (isset($documentcloud->pages))
	{
		for ($i = 1; $i <= $documentcloud->pages; $i++)
		{
			$url = $documentcloud->resources->page->text;
			$url = str_replace('{page}', $i, $url);
			
			$text = get($url);
			
			$text = json_decode($text);
			
			$text = preg_replace('/^\s+$/', '', $text);
			
			if ($text != '')
			{
				
				$response = get_names_from_text($text);
				// Unique names
				$namestrings = get_unique_names($response);
				
				print_r($namestrings);
				
				foreach ($namestrings as $namestring)
				{
					if (!isset($names[$namestring]))
					{
						$n = new stdclass;
						$n->namestring = $namestring;
						$n->pages = array();
						$names[$namestring] = $n;
					}
					// make page number globally unique
					$names[$namestring]->pages[] = $sha1 . '-' . $i;
				}
			
			}
			echo "\n=============================================\n";
		}
		
		$names = array_values($names);
		
		echo "Names:\n";
		print_r($names);
	}

	return $names;
}

$sicis = array(
'66993cce6a76aafcc47e0ef256063c8f'
);


$sicis = array('a319edde9bdeaa9b2994f6690ea020e1');

$force = true; 
$force = false; // only find names if we don't have them already

$skip = true;
//$skip = false;

foreach ($sicis as $sici)
{
	echo "$sici\n";
	
	//if ($sici == '391197f9540326f072e986e7514882eb')
	{
		$skip = false;
	}
	
	if (!$skip)
	{
	
		// Get reference from CouchDB
		
		$url = 'http://direct.bionames.org/api/id/' . $sici;
		
		$url = 'http://bionames.org/bionames-api/api_id.php?id=' . urlencode($sici);
		
		
		//echo $url . "\n";
			
		$json = get($url);
		
		echo $json;
		
		if ($json != '')
		{
			$reference = json_decode($json);
			
			print_r($reference);
			
			if (isset($reference->names) && !$force)
			{
				// skip
				echo "...done!\n";
			}
			else
			{
				// either no names, or we are forcing an update
				
				$sha1 = '';
				if (isset($reference->file->sha1))
				{
					$sha1 = $reference->file->sha1;
				}
				
				//$sha1 = get_sha1_from_sici($sici);
				
				$names = array();
		
				if ($sha1 != '')
				{
					echo "sha1=$sha1\n";
					//exit();
					
					// Get names
					$names = extract_names($sha1);
				}
				else
				{
					// can we use anything else for indexing?
					if (isset($reference->abstract))
					{
						$response = get_names_from_text($reference->abstract);
						
						//print_r($response);
						
						// Unique names
						$namestrings = get_unique_names($response);
				
						print_r($namestrings);
				
						foreach ($namestrings as $namestring)
						{
							if (!isset($names[$namestring]))
							{
								$n = new stdclass;
								$n->namestring = $namestring;
								$n->pages = array();
								$names[$namestring] = $n;
							}
							// make page number globally unique
							$names[$namestring]->pages[] = $sici . '-1';
						}
					}
				}
				
					
				if (count($names) != 0)
				{
					$reference->names = $names;
				
					print_r($reference);
					
					echo json_encode($reference);
					
					$resp = $couch->send("PUT", "/" . $config['couchdb_options']['database'] . "/" . urlencode($sici), json_encode($reference));
					var_dump($resp);
				}
				
				
				
			}
		}
	}
}


?>