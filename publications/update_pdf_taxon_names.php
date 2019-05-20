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


$sicis = array('f3279f10b6152c53b827db8fbdfecf42');
$sicis = array('61eb49ea995aef7252f0579d8f8e7494');
$sicis = array('94b52152eb2e422a03cbabf9bedaa7ba','61b66872e12aedc50ddb8d0ed2c930ac');


$sicis=array('1fa3cd7529e061b9498e5517b2e3e05a',
'b70b0d370458566979a1571f4afb58eb',
'3b1803abcff94fa65fd829ddd42282bf',
'2fdc4e21f2ea00971ee603a9018c92bd',
'd73760a5c050ab00f4979a171ae4bb0d',
'2a822a48d47c84878b53873cde32f09c',
'aff98411db5dbd88eaeaac64ac401c48',
'b8d116c6be463c8d2c33128ad2f81c16',
'9ac2257c1e2d161d0da854435f198549',
'3bfb3be5f34afe831556a54a20b16d34',
'dd549b2af571c3757f34d2ea0c838792',
'f8a64b8af9aba8e0051fbc171b146c61',
'344ef1839eee8ed4401c6e843d161d84',
'e7ac539878b65d5fdb856df47f2c94ae',
'5c3981b782d2266755b9f4f352442dbb',
'14677e507d7d988c4c1c8b2624f6d6d1',
'90d8f472d9857acc44dfa5c7d080a365',
'efd30d34a9568cc56edf96ad57483228',
'27937eeea54c09c04227effc950b43db',
'74bddfc1364b73d35a191ec89ef4851b',
'af7332360367059c7a3f7f2f2afb9c16',
'09531e1249e303b2a6098af5798985c7',
'be129bbc4711906056780d8b89534aa1',
'a7b401687fcbdf5e763dee4be19042f0',
'802dd5bab20ef331b48d5fc771434385',
'48f55b7f9a6baaa3e94151d565ee6807',
'd80cb1be87d24dae98a743c5ad25358d',
'e23ab9d67dddb6921861da35ee0790c3',
'4d04cc2ac347abaea74a8016d67a88c2',
'c61c52bdacc5a7b7c58e8b6705c3e89b',
'ebfe93c2f9c9b03b47b18a21317461c2',
'62dc3764ebe46ffefb573bb0bafb860c',
'241602c9cff2ca453c1e5717c9a2d96c',
'bfd8df5737a4eaf738c58136b2d978ab',
'd0dce8b87ffc4c711ebbe5f25e4c203b',
'7bf2c43a12573e1a35a89302219b4b87',
'7b3c2590cdc36bc4421fa79b073e57a9',
'6f79978b07ddd0336800c56f1744c35a',
'1608967173106c511e2a1f50a7d21720',
'a161be3f7e6ba2b8c851d5370ad4c147',
'e6bd4c23a00efa92ad88753df93b9240',
'bc2531a1aa1db4b25fb5dbcabc62f216',
'ea49eb522c0fecdca24f8cdfde11e1f0',
'5aeba5f3976676a62d641a25362c3cc7',
'6553171c3338901cce5c7d1d3996733d',
'dc484282f4d286a43aff58f554e7eb7e',
'1814388d9c11b44492a4d387980b9aac',
'c44c223288fe914443795a795652007e',
'b9b54cc428af149c21d5aa6dab6c60f2',
'84b5b622134bf4f5004f73ef476587c3',
'320ef5bd2c099588d9803a04474759fd',
'126380df06e26d820919d4e3ebc53107',
'b37a439f80d6440470a0637878af7192',
'310c0993537ffdc525356523281c6366',
'603956cad69835fa736052330191a825',
'31cea1c81430093477fc9c40d941fc1e',
'cc998f16e5435ed1b52fc9c643a1e3d0',
'9e5d5f4d5a933afa5f461c3e34c3d74e',
'6a46f687723ca856ee039c40a4ad0b74',
'b3977fc9b6cad42548b89d3bc09beba0',
'e15150bb4811b7ce65af52b871af3a93',
'57a2a50906eaba4c449e284f99099c3e',
'15d7b7d642fc87b562de3f9883195ede',
'93cc5d11d599d06ac127f39fd0ece113',
'1df2a15dfc663b22e927e9648046930c',
'36eb9a683e711d5ce20b6d225d87b61f',
'818f8e556847a962c4ee238ea9451842',
'9f76f29c306dc959bbf650ed2064cda1',
'365aabfadb010e9a60e68575d298280a',
'ef6755d8b781b6b9e133d59a86af94d3',
'1e0431462cb01f83b728691ed41f96fd',
'db9557c74fc067d774df5056347f708f',
'316e02c4ce8d801705be30cc4a1ef9f1',
'6b7919d4a7e50accc24587d5bd9a0239',
'9669880da0d9452be3955487c9a4d754',
'742c1a900663bed67302fe2ba6192a13',
'379af0fb695f1ed258395e1cdb5c1316');

$sicis=array('10.6119/JMST-013-1220-4');

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