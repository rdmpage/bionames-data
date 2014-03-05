<?php

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)). '/couchsimple.php');

require_once (dirname(__FILE__) . '/mendeley.php');
require_once (dirname(__FILE__) . '/publication_utils.php');

require_once(dirname(dirname(__FILE__)) . '/ris.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

//--------------------------------------------------------------------------------------------------
function get_sha1(&$reference, $pdf)
{
	global $db;
	
	$sql = "select sha1, pdf from sha1 where pdf=" . $db->qstr($pdf) . ' LIMIT 1';
	
	//echo $sql . "\n";
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$reference->file = new stdclass;
		$reference->file->sha1 = $result->fields['sha1'];
		$reference->file->url = $result->fields['pdf'];
		
		// thumbnail
		$url = 'http://direct.bionames.org/bionames-archive/documentcloud/pages/' . $reference->file->sha1 . '/1-small';
		
		//$url = 'http://direct.bionames.org/bionames-archive/pdf/3a/2e/93/3a2e93dc51b584d0c50952fd86bb11934cbd2ded/images/thumbnails/page-0.png';
//		$url = 'http://direct.bionames.org/bionames-archive/pdf/7a/fe/bc/7afebc75c3dc3695fa52ed48acb7e09525313b14/images/thumbnails/page-0.png';
//		$url = 'http://direct.bionames.org/bionames-archive/pdf/e3/2f/09/e32f09354895373b2bb7f406f7b4ffaba93b726c/images/thumbnails/page-0.png';
//		$url = 'http://direct.bionames.org/bionames-archive/pdf/98/b9/78/98b97815ac832055260477a8d3760ab55dd9c2b3/images/thumbnails/page-0.png';
		$image = get($url);
		
		if ($image != '')
		{				
			$mime_type = 'image/png';
			$base64 = chunk_split(base64_encode($image));
			$reference->thumbnail = 'data:' . $mime_type . ';base64,' . $base64;		
		}
		
	}
}

//--------------------------------------------------------------------------------------------------
function ris_import($reference)
{
	global $couch;
	
	// enhance
	
	// Use DOI as GUID by default
	if (isset($reference->identifier))
	{
		foreach ($reference->identifier as $identifier)
		{
			if ($identifier->type == 'doi')
			{
				$reference->_id = $identifier->id;
			}
		}
	}
	
	// PDF
	$pdf = '';
	$url = '';
	
	if (isset($reference->link))
	{
		foreach ($reference->link as $link)
		{
			if ($link->anchor == 'PDF')
			{
				$pdf = $link->url;
			}
			if ($link->anchor == 'LINK')
			{
				$url = $link->url;
				
				if (preg_match('/http:\/\/www.ncbi.nlm.nih.gov\/pubmed\/(?<id>\d+)$/', $link->url, $m))
				{
					$identifier = new stdclass;
					$identifier->type = 'pmid';
					$identifier->id = $m['id'];
					
					$reference->identifier[] = $identifier;					
					
					/*
					if (!isset($reference->_id))
					{
						$reference->_id = 'pmid/' . $m['id'];
					}
					*/
					
				}
				
				if (preg_match('/http:\/\/gallica.bnf.fr\/ark:\/(?<ark>.*)$/',  $link->url, $m))
				{
					$identifier = new stdclass;
					$identifier->type = 'ark';
					$identifier->id = $m['ark'];
					$reference->identifier[] = $identifier;
					
					if (!isset($reference->thumbnail))
					{
						if (preg_match('/(?<namespace>\d+)\/(?<id>.*)\/f(?<page>\d+)$/', $identifier->id, $m))
						{
							$namespace 	= $m['namespace'];
							$arkid 		= $m['id'];
							$start_page = $m['page'];
													
							$url = 'http://bionames.org/bionames-gallica/' . $arkid . '/start/' . $start_page . '/pages/1-small';
			
							$image = get($url);
							
							if ($image != '')
							{				
								$mime_type = 'image/png';
								$base64 = chunk_split(base64_encode($image));
								$reference->thumbnail = 'data:' . $mime_type . ';base64,' . $base64;		
							}
						}
					}
					
				}
				
				
				
			}
		}
	}
	
	// Use Mendeley UUID as GUID
	if ($pdf != '')
	{
		get_sha1($reference, $pdf);
		
		$id = mendeley_get_local_from_url($pdf);
		
		if ($id <> 0)
		{
			//echo "mendeley=$id\n";
			$uuid = mendeley_get_local_uuid_from_id($id);
			//echo "mendeley=$uuid\n";
			
			if (!isset($reference->_id))
			{
				$reference->_id = $uuid;
			}
		}
	}
	
	// Do we have this in Mendeley?
	if ($url != '')
	{
		$id = mendeley_get_local_from_url($url);
		
		if ($id <> 0)
		{
			//echo "mendeley=$id\n";
			$uuid = mendeley_get_local_uuid_from_id($id);
			//echo "mendeley=$uuid\n";
			
			if (!isset($reference->_id))
			{
				$reference->_id = $uuid;
			}
		}
	}
	
	// Generate GUID from md5 if needed
	$reference->citation_string = reference_to_citation_string($reference);
	
	if (!isset($reference->_id))
	{
		$reference->_id = md5($reference->citation_string);
	}

	print_r($reference);
	
	//echo json_encode($reference);
	
	
	if (isset($reference->_id))
	{
		if (have_reference_already($reference))
		{
			echo "\nHave reference already\n";
		}
		$couch->add_update_or_delete_document($reference,  $reference->_id);
	}
	
}




//--------------------------------------------------------------------------------------------------
$filename = '';
if ($argc < 2)
{
	echo "Usage: import_ris.php <RIS file> \n";
	exit(1);
}
else
{
	$filename = $argv[1];
}

$file = @fopen($filename, "r") or die("couldn't open $filename");
fclose($file);

import_ris_file($filename, 'ris_import');


?>