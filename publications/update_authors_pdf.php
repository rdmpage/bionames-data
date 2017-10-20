<?php

// add missing authors if we have them in database linked to PDF

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(__FILE__) . '/publications_core.php');

$sicis=array('f237804755809b46a79e5c853dfdd3a5');

$sicis=array('e151fa15faaa8fd0eb8aa3bf3f34bec1');

$sicis=array('cd0bc25cb6a3947418cafd088c50baaf');

$sicis=array(
'994bf58c22dcfeea128593f4d29dfde1',
'54ac401909bcb3f53adf7398e251222c',
'aa12a31c7a899499a377ad2fa62b1dd4'
);

$force = false;
$force = true;

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
			$pdf = '';
			
			if (isset($reference->link))
			{
				foreach ($reference->link as $link)
				{
				   if ($link->anchor == 'PDF')
				   {
				   		$pdf = $link->url;
				   }
				}
			}
			
			if ($pdf != '')
			{
				get_authors_pdf($pdf, $reference);
				print_r($reference);
				
				$resp = $couch->send("PUT", "/" . $config['couchdb_options']['database'] . "/" . urlencode($sici), json_encode($reference));
				var_dump($resp);
			}
		}
	}
}


?>