<?php

// Extract names from OCR text (e.g. BHL Europe)

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');

require_once (dirname(__FILE__) . '/publications_core.php');
require_once (dirname(__FILE__) . '/gnrd.php');




$sicis=array('fd85aa661694db08f24b132eaeaa088e');

$sicis=array(
'1f36a0c071e68de8586a002bf11b280d',
'2967af7aa0fe8b7671fecafc75445b49',
'6896c9321f0db86ae3e43ef2e0a8c8bb',
'61c759a4b5dac95173a0e748cf4351f3',
'087a06f40ab8e4986c926c331bd3ddcf',
'bc09c248f6f129ce737db7f7992b06f6',
'08896ff36d4e3652990e99892f96a617',
'9e52b4c54b3997bf6007e84285386e1c',
'6858271bd9a85b2a9955aa773a65e807',
'f2f8850620d9a1786a5eae213488cb33',
'7564b533e163d315042abac5e84425d2',
'd181e8f195073d1dfc3656bb1dd7cbfd',
'5235bbcd92a916288b1cb4de45464456',
'a74d4cbc09b483cc9db20cbfa3f17ccd',
'4dfefb9a5fb716a71e8ddba22cfdf47e',
'dd77d114e5dd87ca9556dcf21c2608c4',
'2bed6f6887ceb83bab93b8474aaaf16c',
'ab79919445e8ee56b8cec8a465fb03ee',
'ea4204288c08fcae66022bb930a7b681',
'120bd23f69ba3d0a82b37f7dfe0a9deb',
'7ece2ec2a65202aee4e3ca6fd56084a6',
'100de982816c04429e3f7ca363d4815a',
'9b74cd74ca2707fe075e6a2f3fc3a8c8',
'8cb23333905b185175f836700580cf7c',
'86eecd318c3f2c61e0ef3f243d36826c',
'b61494ef50cd6b1836caf1dd382daf3d',
'a3cc24639ab5127b1454b003fba55689',
'214e2a2a6b50bcd33f7d790e8616eb9d',
'c58d4739cc8804a9df6bca428b76ddd6',
'bdce6187d17d6bee93e9cac42e350673',
'7c10d43e2649248bb8020db2e8458773',
'b8513bc17af0e35110bfb839200a25f1',
'998e10e541e4dffff70fedbbf6931a4b',
'7286f37460ec150d2ae1fb9bedd01782',
'036f1ae60f02fede8cfe3edb7bf320d7',
'231526a7a3319db055c2f41d167dd3a7',
'1a40f4936d7be4832aef6fc385d83497',
'32343165472567ef452d5de386bab602',
'e2aa4252ff00205eecdd484a1cb2d298',
'a97fae16f6d419646a30dd01b3021742',
'3884d65f43eb0b0a9896b57ba7b440d0'
);

$sicis=array('22579b420d4d01c31667e48a4bd69170');


$sicis=array('10.2989/16085914.2012.668850');

$sicis=array('3a4df517aa62fbd2e987f8d746c06779');

$sicis=array('3d28f82bf67f1ef4903ed98257b29db6');

$sicis=array('biostor/135785');

$sicis=array('959c60e0c1438c9dde787825a00a66d0');

$sicis=array(
'd800d837a74418f51ae0da526685bc02',
'f15c5dafc5cc740134a85fd63b2ba481d3eb1799',
'd147d2e00c4b5383da1898a3501e1f3a39cbb2c3'
);

$sicis=array('685336afe1ce6c7135249a75172e0920');

$sicis=array('d56c55ab13a940dda9ca73baccdfcd42');

$sicis=array('d403a26f7ec9df1e43064507cf9e5685');

$sicis=array('96c8051e89cfc84f93f6c7ebac49c942');

$sicis=array('8cc560453bb81407d89b4ed7b68369bc');

$sicis=array('4944c8091c2c955480141bef2d894dc0');

$sicis=array('1798a5d26db48454193e14254790efd9');

$force = true; // only find names if we don't have them already


foreach ($sicis as $sici)
{
	// Get reference from CouchDB
	
	$url = 'http://direct.bionames.org/api/id/' . $sici;
	
	//$url = 'http://bionames.org/bionames-api/api_id.php?id=' . urlencode($sici);
	
	
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
			if (isset($reference->text))
			{
				$response = get_names_from_text($reference->text);
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


?>