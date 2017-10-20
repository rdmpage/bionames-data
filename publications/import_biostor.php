<?php

// Import a BioStor references and add to CouchDB
require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/reference.php');
require_once (dirname(__FILE__) . '/biostor.php');

require_once (dirname(__FILE__) . '/publication_utils.php');


$ids=array(
234922
);

// to do...
foreach ($ids as $id)
{
	
	$json = get('http://direct.biostor.org/reference/' . $id . '.bibjson');
	
	echo $json;
	
	if ($json != '')
	{
		$reference = json_decode($json);
		
		if ($reference)
		{
			// ignore stuff not linked to BHL
			$go = true;
			
			if ($reference->link)
			{
				foreach ($reference->link as $link)
				{
					if ($link->url == 'http://www.biodiversitylibrary.org/page/0')
					{
						$go = false;
					}
				}
			}
			
			if ($go)
			{			
				$reference->_id = 'biostor/' . $id;	
				
				$biostor = new stdclass;
				$biostor->time = time();
				$biostor->url = 'http://direct.biostor.org/reference/' . $id . '.bibjson';
				$reference->provenance['biostor'] = $biostor;
				
				
				$reference->citation_string = reference_to_citation_string($reference);
				
				// thumbnail
				$url = 'http://direct.biostor.org/reference/' . $id . '.json';
				$json = get($url);
				
				if ($json != '')
				{				
					$obj = json_decode($json);
					$reference->thumbnail = $obj->thumbnails[0];		
				}
				
				biostor_enhance($reference, $id);
				
				print_r($reference);
				
				//if (!have_reference_already($reference))
				{				
					$couch->add_update_or_delete_document($reference,  $reference->_id);
				}
			}
		}		
	}
}

?>