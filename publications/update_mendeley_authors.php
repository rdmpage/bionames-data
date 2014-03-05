<?php

// Extract names from PDFs and update 

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(__FILE__) . '/mendeley.php');

$sicis=array('12a0d0dc2eee522c2b685ada9236d126');

$sicis=array(
'f34e942ed2e550a3622e76aab259f882',
'bf8150717a82d299d90ff03bf19c74d6',
'be8a698fe3fb76cc937a5da80e00eab8',
'28f39a4c18baf4c23b6bf8cca7b80e3c',
'a394cb225163f1f6c50600749668c2ac',
'5f01cdd80fabce15b8154b0c08a08916',
'88d434bcf10ee7c3f01a59f40ef697e3',
'b0b29d1f2ccd75366432e3e00863b104',
'f0cbf66ae57c9bfdd7bedb85b6c9542b',
'ced82a10ddaba363058e2f1320584f9c',
'b066d4a417dbafa3f61285a0f1fea3f3',
'6328ac2a8d814bf9bf1887ca073e3296',
'c6b85de921218c705c8e10d80b62d518',
'ecdd3f1b9c5fadc56a72f6982c43a347',
'04ebe5b4b824241d835e03da7c3a3255',
'a40639c7c38d2687073de99f1b2adb57',
'11b23c5cdacb95be40dc11b491a0cc1b'
);

// add missing authors if we have them in Mendeley

$force = false;

foreach ($sicis as $sici)
{
	echo "$sici\n";
	
	// Get reference from CouchDB
	$url = 'http://bionames.org/api/id/' . $sici;
		
	$json = get($url);
	
	if ($json != '')
	{
		$reference = json_decode($json);
		
		//print_r($reference);
		
		if (isset($reference->author) && !$force)
		{
			// skip
			echo "...done!\n";
		}
		else
		{
			$mendeley_id = 0;
			
			if (isset($reference->link))
			{
				foreach ($reference->link as $link)
				{
					$id = mendeley_get_local_from_url($link->url);
					if ($id != 0)
					{
						$mendeley_id = $id;
					}
				}
			}
			
			if ($mendeley_id != 0)
			{
				echo "Found in Mendeley\n";
				
				$mendeley_reference = get_one_reference($mendeley_id);
		
				if (isset($mendeley_reference->author))
				{
					print_r($mendeley_reference->author);
					
					$reference->author = $mendeley_reference->author;
				
					//print_r($reference);
					
					$resp = $couch->send("PUT", "/" . $config['couchdb_options']['database'] . "/" . urlencode($sici), json_encode($reference));
					var_dump($resp);
				}
				
				
			}
		}
	}
}


?>