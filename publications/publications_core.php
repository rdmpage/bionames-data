<?php



require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)). '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/reference.php');
require_once (dirname(__FILE__) . '/biostor.php');
require_once (dirname(__FILE__) . '/crossref.php');
require_once (dirname(__FILE__) . '/mendeley.php');

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
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$reference->file = new stdclass;
		$reference->file->sha1 = $result->fields['sha1'];
		$reference->file->url = $result->fields['pdf'];
		
		// thumbnail
		$url = 'http://bionames.org/archive/documentcloud/pages/' . $reference->file->sha1 . '/1-small';

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
// PDF thumbnail where we don't have full PDF (e.g., Zootaxa preview)
function get_pdf_thumbnail(&$reference, $pdf)
{
	$url = 'http://bionames.org/archive/pdfstore?url=' . urlencode($pdf) . '&noredirect&format=json';
	$json = get($url);
	
	$obj = json_decode($json);
	
	if ($obj->http_code == 200)
	{		
		$url = 'http://bionames.org/archive/documentcloud/pages/' . $obj->sha1 . '/1-small';
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
function get_doi_thumbnail(&$reference, $doi)
{
	global $db;
	
	$thumbnail = '';

	$sql = "SELECT * FROM doi_thumbnails WHERE doi = " . $db->qstr($doi) . " LIMIT 1;";
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$thumbnail = $result->fields['path'];
		
		$filename = '/Users/rpage/Sites/itaxon/thumbnails/' . $thumbnail;
		
		$image_type = exif_imagetype($filename);
		switch ($image_type)
		{
			case IMAGETYPE_GIF:
				$mime_type = 'image/gif';
				break;
			case IMAGETYPE_JPEG:
				$mime_type = 'image/jpg';
				break;
			case IMAGETYPE_PNG:
				$mime_type = 'image/png';
				break;
			case IMAGETYPE_TIFF_II:
			case IMAGETYPE_TIFF_MM:
				$mime_type = 'image/tif';
				break;
			default:
				$mime_type = 'image/gif';
				break;
		}
		
		$image = file_get_contents($filename);
		$base64 = chunk_split(base64_encode($image));
		$reference->thumbnail = 'data:' . $mime_type . ';base64,' . $base64;				
	}
}


//--------------------------------------------------------------------------------------------------
function get_id_sql($id)
{
	$sql = "select * from names where id=" . $id . ' AND publication IS NOT NULL';
	return $sql;
}


//--------------------------------------------------------------------------------------------------
function get_sici_sql($sici)
{
	global $db;
	
	$sql = "select * from names where sici=" . $db->qstr($sici) . " LIMIT 1";
	
	//echo $sql;
	
	return $sql;
}


//--------------------------------------------------------------------------------------------------
function get_reference($sql)
{
	global $db;
	global $couch;
	

	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	
	while (!$result->EOF) 
	{
		$reference = new stdclass;
		$reference->type = 'generic';
		
		$reference->_id = $result->fields['sici'];
		
		$reference->provenance = array();
		
		$mysql = new stdclass;
		$mysql->id = $result->fields['id'];
		$mysql->modified = $result->fields['updated'];
		$reference->provenance['mysql'] = $mysql;
				
		if ($result->fields['publication'] != null)
		{
			$reference->citation_string = $result->fields['publication'];
			// clean
			$reference->citation_string = preg_replace('/\s+(\d+|[ixvcl]+)\s+\[Zoological Record(.*)$/', '', $reference->citation_string);
		}
		
		if ($result->fields['title'] != null)
		{
			$reference->title = $result->fields['title'];	
		}
	
		if ($result->fields['journal'] != null)
		{	
			$reference->type = 'article';
			$reference->journal = new stdclass;
			$reference->journal->name = $result->fields['journal'];
			
			if ($result->fields['volume'] != '')
			{
				$reference->journal->volume = $result->fields['volume'];
			}
		
			if ($result->fields['issue'] != '')
			{
				$reference->journal->issue = $result->fields['issue'];
			}
		}
		
		if ($result->fields['spage'] != null)
		{
			if (isset($reference->journal))
			{
				$reference->journal->pages = $result->fields['spage'];
				if ($result->fields['epage'] != null)
				{
					$reference->journal->pages .= '--' . $result->fields['epage'];
				}
			}
			else
			{
				$reference->pages = $result->fields['spage'];
				if ($result->fields['epage'] != null)
				{
					$reference->pages .= '--' . $result->fields['epage'];
				}	
			}
		}
		
		if ($result->fields['issn'] != null)
		{
			if (!isset($reference->journal))
			{
				$reference->journal = new stdclass;
				$reference->type = 'journal';
			}
			$reference->journal->identifier = array();
			$issn = new stdclass;
			$issn->id = $result->fields['issn'];
			$issn->type = 'issn';
			$reference->journal->identifier[] = $issn;
		}
			
		if ($result->fields['year'] != null)
		{
			$reference->year = $result->fields['year'];
		}
		
		// links
		
		// pdf
		/*
		$reference->link = array();
		if ($result->fields['pdf'] != null)
		{
			$link = new stdclass;
			$link->url = $result->fields['pdf'];
			$link->anchor = 'PDF';
			$reference->link[] = $link;
			
			get_sha1(&$reference, $link->url);
		}
		*/
		
		//print_r($reference);
		
		echo "Identifiers...\n";
		
		//----------------------------------------------------------------------------------------------
		// identifiers
		$reference->identifier = array();
		$keys = array('doi', 'biostor', 'cinii', 'googleBooks', 'handle', 'isbn', 'jstor', 'pmc', 'pmid', 'url', 'pdf', 'canonical_uuid');
		
		foreach ($keys as $k)
		{
			if ($result->fields[$k] != null)
			{
				switch ($k)
				{
					case 'doi':
					case 'pmc':
					case 'handle':
						$identifier = new stdclass;
						$identifier->type = $k;
						$identifier->id = $result->fields[$k];
						$reference->identifier[] = $identifier;
						break;
	
					case 'isbn':
					case 'googleBooks':
						$identifier = new stdclass;
						$identifier->type = $k;
						$identifier->id = $result->fields[$k];
					
						if ($result->fields['isPartOf'] == 'N')
						{
							$reference->identifier[] = $identifier;
							$reference->type = 'book';
						}
						else
						{
							if (!isset($reference->book))
							{
								$reference->book = new stdclass;
								$reference->type = "chapter";
							}
							$reference->book->identifier[] = $identifier;
						}
						break;
						
					case 'biostor':
					case 'cinii':
					case 'jstor':
					case 'pmid':
						$identifier = new stdclass;
						$identifier->type = $k;
						$identifier->id = $result->fields[$k];
						$reference->identifier[] = $identifier;
						break;
						
					case 'canonical_uuid':
						$identifier = new stdclass;
						$identifier->type = 'mendeley_uuid';
						$identifier->id = $result->fields[$k];
						$reference->identifier[] = $identifier;
						break;
					
						
					case 'url':
						$is_url = true;
						
						if (preg_match('/http:\/\/gallica.bnf.fr\/ark:\/(?<ark>.*)$/', $result->fields[$k], $m))
						{
							$identifier = new stdclass;
							$identifier->type = 'ark';
							$identifier->id = $m['ark'];
							$reference->identifier[] = $identifier;
						}
						
						if ($is_url)
						{
							if (!isset($reference->link))
							{
								$reference->link = array();
							}
							$link = new stdclass;
							$link->url = $result->fields[$k];
							$link->anchor = 'LINK';
							$reference->link[] = $link;
						}
						break;
	
					case 'pdf':
						echo "PDF thumbnail...\n";

						if (!isset($reference->link))
						{
							$reference->link = array();
						}
						$link = new stdclass;
						$link->url = $result->fields[$k];
						$link->anchor = 'PDF';
						$reference->link[] = $link;
						
						get_sha1(&$reference, $link->url);
						break;
						
					default:
						break;
				}
			}
		}
		
		//print_r($reference);
		
		//----------------------------------------------------------------------------------------------
		// Special case of Zootaxa preview PDFs
		if (isset($reference->link))
		{
			foreach ($reference->link as $link)
			{
				if ($link->anchor == 'LINK')
				{
					if (preg_match('/http:\/\/www.mapress.com\//', $link->url))
					{
						if (!isset($reference->thumbnail))
						{
							get_pdf_thumbnail($reference, $link->url);					
						}
					}
				}
			}
		}
		
		echo "Add metadata...\n";

		
		$keys = array('doi', 'biostor', 'cinii', 'googleBooks', 'handle', 'isbn', 'jstor', 'pmc', 'pmid', 'url', 'pdf', 'canonical_uuid');
		
		
		//----------------------------------------------------------------------------------------------
		// could get all names linked to these identifiers to "tag" article	
		
		//----------------------------------------------------------------------------------------------
		// add data from external identifiers
		
		foreach ($reference->identifier as $identifier)
		{
			// DOI
			// We may have a thumbnail
			if ($identifier->type == 'doi')
			{
				echo "DOI...\n";

				get_doi_thumbnail(&$reference, $identifier->id);
				
				// enhance metadata
				$r = get_doi_metadata($identifier->id);
				
				//print_r($r);
				//exit();
				
				if ($r)
				{
				
				
					// authors
					if (isset($r->author) && !isset($reference->author))
					{
						$reference->author = $r->author;
					}
					
					if (isset($r->publisher))
					{
						$reference->publisher = $r->publisher;
					}

				
				}
			}
			
			// BioStor REMEMBER THIS IS NOT CALLING BIBJSON!!!
			// thumbnail
			if ($identifier->type == 'biostor')
			{
				biostor_enhance($reference, $identifier->id);
			
				/*
				$url = 'http://biostor.org/reference/' . $identifier->id . '.json';
				$json = get($url);

				if ($json != '')
				{				
					$obj = json_decode($json);
					
					$biostor = new stdclass;
					$biostor->time = date(DATE_ISO8601, time());
					$biostor->url = $url;
					$reference->provenance['biostor'] = $biostor;
					
					$reference->thumbnail = $obj->thumbnails[0];	
					
					//print_r($obj);
					
					// title
					$reference->title = $obj->title;
					
					// authors
					if (isset($obj->authors) && !isset($reference->author))
					{
						foreach ($obj->authors as $author)
						{
							$a = new stdclass;
							$a->name = '';
							if (isset($author->forename))
							{
								$a->firstname = $author->forename;
								$a->name .= $a->firstname;
							}
							if (isset($author->surname))
							{
								$a->lastname = $author->surname;
								if ($a->name != '')
								{
									$a->name .= ' ';
								}
								$a->name .= $a->lastname;
							}
							$reference->author[] = $a;
						}
					}
					
					// untested
					// Get any additional identifiers from BioStor (e.g., DOIs)
					foreach ($obj->identifiers as $k => $v)
					{
						switch ($k)
						{
							case 'doi':
								$have_doi = false;
								foreach ($reference->identifier as $id)
								{
									if ($id->type == 'doi')
									{
										$have_doi = true;
									}
								}
								if (!$have_doi)
								{
									$x = new stdclass;
									$x->type = 'doi';
									$x->id = $v;
									
									$reference->identifier[] = $x;
								}								
								break;
								
							default:
								break;
						}
					}
					
					// geo
					if (isset($obj->geometry))
					{
						$reference->geometry = $obj->geometry;
					}
					
					// taxon names
					
					
					// specimens
					
					
					
					
				}
				*/
			}
			
			// Gallica
			// thumbnail
			if ($identifier->type == 'ark')
			{		
				if (!isset($reference->thumbnail))
				{
					if (preg_match('/(?<namespace>\d+)\/(?<id>.*)\/f(?<page>\d+)$/', $identifier->id, $m))
					{
						$namespace 	= $m['namespace'];
						$arkid 		= $m['id'];
						$start_page = $m['page'];
												
						$url = 'http://bionames.org/gallica/' . $arkid . '/start/' . $start_page . '/pages/1-small';
		
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
			
			// CiNii
			// could get thumbnail for subscription articles via RDF
			// could get author details and Japanese details
			if ($identifier->type == 'cinii')
			{
			
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
					
										
					
				}
				
				
			}
			
			// PubMed get abstract, maybe sequence links...
			if ($identifier->type == 'pmid')
			{
			}
			
			
		}
		
		echo "Clean...\n";
		
		//----------------------------------------------------------------------------------------------
		// clean
		if (count($reference->link) == 0)
		{
			unset($reference->link);
		}
		if (count($reference->identifier) == 0)
		{
			unset($reference->identifier);
		}
		
		//print_r($reference);
		
		echo "Mendeley...\n";
		if (1)
		{
			//----------------------------------------------------------------------------------------------
			// meta from ion MySQL/Mendeley
			if ($result->fields['local_uuid'] != null)
			{
				$mendeley = new stdclass;
				$mendeley->time = date(DATE_ISO8601, time());			
				$mendeley->local_uuid = $result->fields['local_uuid'];
				
				// could get local Mendeley details, such as authorship, abstract, tags...
				
				$id = get_from_local_uuid($mendeley->local_uuid);
				if ($id != 0)
				{
					$r = get_one_reference($id);
					
					if (isset($r->author) && !isset($reference->author))
					{
						$reference->author = $r->author;
					}
				}				
				if ($result->fields['canonical_uuid'] != null)
				{
					$mendeley->canonical_uuid = $result->fields['canonical_uuid'];
				}
								
				$reference->provenance['mendeley'] = $mendeley;
			}
		}		
		
		//----------------------------------------------------------------------------------------------
		if (count($reference->provenance) == 0)
		{
			unset($reference->provenance);
		}

		if (isset($reference->journal))
		{
			$reference->citation_string = reference_to_citation_string($reference);
			//print_r($reference);
			//exit();
		}
		/*
		else
		{
			$reference->citation = $reference->citation_string;		
		}
		*/
		
		if (1)
		{
			echo json_format(json_encode($reference));
		}

		if (1)
		{
			echo "CouchDB...\n";
			$couch->add_update_or_delete_document($reference,  $reference->_id);
		}
		
		
		$result->MoveNext();
	
	}
}

?>