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
// PDF thumbnail where we don't have full PDF (e.g., Zootaxa preview)
function get_pdf_thumbnail(&$reference, $pdf)
{
	$url = 'http://direct.bionames.org/bionames-archive/pdfstore?url=' . urlencode($pdf) . '&noredirect&format=json';
	$json = get($url);
	
	$obj = json_decode($json);
	
	if ($obj->http_code == 200)
	{		
		$url = 'http://direct.bionames.org/bionames-archive/documentcloud/pages/' . $obj->sha1 . '/1-small';
		//$url = 'http://direct.bionames.org/bionames-archive/pdf/a7/81/4a/a7814a96735ca5025ccde73ffb5f25757bba09b3/images/thumbnails/page-0.png';
		
		//echo $url;
		//exit();
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
		
		//echo $image;
		//exit();
		
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
	
	//print_r($reference);
	
	// enhance
	
	// Use DOI as GUID by default
	if (isset($reference->identifier))
	{
		foreach ($reference->identifier as $identifier)
		{
			if ($identifier->type == 'doi')
			{
				$reference->_id = $identifier->id;
				
				get_doi_thumbnail($reference, $identifier->id);
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
				get_sha1($reference, $link->url);	
				
				
				if (preg_match('/http:\/\/www.bhl-europe.eu\/static\//', $link->url))
				{
					// BHL-Europe
					
					$reference->publisher = 'BHL-Europe';
					
					
					// OCR text
					if (preg_match('/\/static\/(?<id>[a-z0-9]+)\//', $link->url, $m))
					{
						$ocr_url = 'http://www.bhl-europe.eu/static/' . $m['id'] . '/' . $m['id'] . '_full_ocr.txt';
						$ocr = get($ocr_url);	
					
						$reference->text = $ocr;
					}
					
				}
				
				
			}
			if ($link->anchor == 'LINK')
			{
				$url = $link->url;
				//echo $url . "\n";
				// Zootaxa
				if (preg_match('/http:\/\/www.mapress.com\//', $link->url))
				{
					
					if (!isset($reference->thumbnail))
					{
						get_pdf_thumbnail($reference, $link->url);					
					}
				}
				
				//exit();
				
				// Handle cases where we have DOI but it is not resolving
				if (preg_match('/http:\/\/dx.doi.org\/(?<id>.*)$/', $link->url, $m))
				{
					$identifier = new stdclass;
					$identifier->type = 'doi';
					$identifier->id = $m['id'];
					
					$reference->identifier[] = $identifier;					
					
					
					if (!isset($reference->_id))
					{
						$reference->_id = $m['id'];
					}
					
					
				}
				
				if (preg_match('/http:\/\/zoobank.org\/urn:lsid:zoobank.org:pub:(?<id>.*)$/', $link->url, $m))
				{
					$identifier = new stdclass;
					$identifier->type = 'zoobank';
					$identifier->id = $m['id'];
					
					$reference->identifier[] = $identifier;					
					
					/*
					if (!isset($reference->_id))
					{
						$reference->_id = 'pmid/' . $m['id'];
					}
					*/
					
				}
				
				
				// Hathi
				if (preg_match('/http:\/\/catalog.hathitrust.org\/Record\/(?<id>\d+)$/', $link->url, $m))
				{
					$identifier = new stdclass;
					$identifier->type = 'hathi';
					$identifier->id = $m['id'];
					
					$reference->identifier[] = $identifier;					
				}
				
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
				
				if (preg_match('/http:\/\/ci.nii.ac.jp\/naid\/(?<id>\d+)(\/en)?$/', $link->url, $m))
				{
					$identifier = new stdclass;
					$identifier->type = 'cinii';
					$identifier->id = $m['id'];
					
					$reference->identifier[] = $identifier;		
					
					$rdf_url = 'http://ci.nii.ac.jp/naid/' . $identifier->id . '.rdf';
					$rdf = get($rdf_url);
					
					if ($rdf != '')
					{
						//echo $rdf;
						
						$cinii = new stdclass;
						$cinii->time = date(DATE_ISO8601, time());
						$cinii->url = $rdf_url;
						$reference->provenance['cinii'] = $cinii;
						
						$dom= new DOMDocument;
						$dom->loadXML($rdf);
						$xpath = new DOMXPath($dom);
						
						$xpath->registerNamespace('dc',      'http://purl.org/dc/elements/1.1/');
						$xpath->registerNamespace('dcterms', 'http://purl.org/dc/terms/');
						$xpath->registerNamespace('rdfs',    'http://www.w3.org/2000/01/rdf-schema#');
						$xpath->registerNamespace('rdf',     'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
						
						$xpath->registerNamespace('foaf',    'http://xmlns.com/foaf/0.1/');
						$xpath->registerNamespace('prism',   'http://prismstandard.org/namespaces/basic/2.0/');
						$xpath->registerNamespace('con',     'http://www.w3.org/2000/10/swap/pim/contact#');
						$xpath->registerNamespace('cinii',   'http://ci.nii.ac.jp/ns/1.0/');
						
						// Title
						$nodeCollection = $xpath->query ('//rdf:Description[@xml:lang="en"]/dc:title');
						foreach ($nodeCollection as $node)
						{						
							$reference->title = $node->firstChild->nodeValue;
						}
						
						
						// Thumbnail
						$nodeCollection = $xpath->query ('//foaf:depiction/foaf:Image/@rdf:about');
						foreach ($nodeCollection as $node)
						{						
							$thumbnail_url = $node->firstChild->nodeValue;
							$image = get($thumbnail_url);
							
							if ($image != '')
							{				
								$mime_type = 'image/png';
								$base64 = chunk_split(base64_encode($image));
								$reference->thumbnail = 'data:' . $mime_type . ';base64,' . $base64;		
							}													
						}
						
						// Author(s)
						if (!isset($reference->author))
						{
							$reference->author = array();
							$nodeCollection = $xpath->query ('//rdf:Description[@xml:lang="en"]/dc:creator');
							foreach ($nodeCollection as $node)
							{			
								$author = new stdclass;
//								if (preg_match('/^(?<firstname>.*)\s+(?<lastname>\w+(-\w+)?)$/Uu', $node->firstChild->nodeValue, $m))

								// CiNii has names with last name captilised (Japansese names have different order to Western names)
								if (preg_match('/^(?<lastname>[A-Z]+(\-[A-Z]+)?)\s+(?<firstname>[A-Z][a-z]+(\-[A-Z][a-z]+)?)$/Uu', $node->firstChild->nodeValue, $m))
								{
									$author->firstname = $m['firstname'];
									$author->lastname = $m['lastname'];
									$author->name = $author->firstname . ' ' . $author->lastname;
								}
								else
								{
									$author->name = $node->firstChild->nodeValue;
								}
								$reference->author[] = $author;
							}
						}
					}
					
					
					
				}
				
				if (preg_match('/http:\/\/hdl.handle.net\/(?<id>.*)$/', $link->url, $m))
				{
					$identifier = new stdclass;
					$identifier->type = 'handle';
					$identifier->id = $m['id'];
					
					$reference->identifier[] = $identifier;					
					
					/*
					if (!isset($reference->_id))
					{
						$reference->_id = 'pmid/' . $m['id'];
					}
					*/
					
				}
				
				if (preg_match('/http:\/\/www.jstor.org\/stable\/(?<id>.*)$/', $link->url, $m))
				{
					$identifier = new stdclass;
					$identifier->type = 'jstor';
					$identifier->id = $m['id'];
					
					$reference->identifier[] = $identifier;					
					
					
				
					get_jstor_thumbnail($reference, $identifier->id);
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
	
	//print_r($reference);
	
	if (0)
	{
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
	}	
	// Generate GUID from md5 if needed
	$reference->citation_string = reference_to_citation_string($reference);
	
	if (!isset($reference->_id))
	{
		$reference->_id = md5($reference->citation_string);
	}
	
	//unset($reference->thumbnail);

	print_r($reference);
	
	echo json_encode($reference);
	
	//exit();
	
	
	if (isset($reference->_id))
	{
		//if (have_reference_already($reference))
		if (0)
		{
			echo "\nHave reference already\n";
		}
		else
		{
			$couch->add_update_or_delete_document($reference,  $reference->_id);
		}
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