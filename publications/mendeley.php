<?php

// Mendeley

require_once(dirname(dirname(__FILE__)) . '/config.inc.php');
require_once(dirname(__FILE__) . '/reference.php');


$mendeley_config = array(
	'mendeley_database' => 'sqlite:' . '/Users/rpage/Library/Application Support/Mendeley Desktop' . '/r.page@bio.gla.ac.uk@www.mendeley.com.sqlite'
	);

//$dbh = new PDO($mendeley_config['mendeley_database']);

//--------------------------------------------------------------------------------------------------
function get_thumbnail_for_pdf(&$reference, $pdf_url)
{
	$url = 'http://bionames.org/archive/pdfstore?url=' . urlencode($pdf_url) . '&noredirect&format=json';
	
	$json = get($url);
	$obj = json_decode($json);

	if ($obj->http_code == 200)
	{		
		$reference->file = new stdclass;
		$reference->file->sha1 = $obj->sha1;
		$reference->file->url = $pdf_url;
	
		$url = 'http://bionames.org/archive/documentcloud/pages/' . $obj->sha1 . '/1-small';
		$image = get($url);
		
		if ($image != '')
		{				
			$mime_type = 'png';
			$base64 = chunk_split(base64_encode($image));
			$reference->thumbnail = 'data:' . $mime_type . ';base64,' . $base64;
		}
	}
}

//--------------------------------------------------------------------------------------------------
function get_modified_since($timestamp)
{
	global $dbh;
	
	$sql = 'SELECT id FROM Documents WHERE (added > ' . $timestamp . ') OR (modified > ' . $timestamp . ')';
	
	$modified = array();
	foreach ($dbh->query($sql) as $row)
	{
		$modified[] = $row['id'];
	}
	
	//$modified = array_reverse($modified);
	
	return $modified;
}

//--------------------------------------------------------------------------------------------------
function get_one_reference($id)
{
	global $dbh;
	
	$reference = new stdclass;
	$reference->mendeley = new stdclass;
	
	foreach ($dbh->query('SELECT * from Documents WHERE id=' . $id) as $row)
	{
	
		if ($row['type'] == 'Journal Article')
		{
			$reference->journal = new stdclass;
		}
	
		foreach ($row as $k => $v)
		{
			if (!is_numeric($k))
			{
				if ($v != '')
				{
					//echo $k . '=' . $v . "\n";
					
					switch ($k)
					{
						/*
						case 'note':
							$reference->{$k} = $v;
							break;
						*/
							
						case 'added':
						case 'id':
						case 'modified':
							$reference->mendeley->{$k} = (Integer)$v;
							break;
						
						case 'year':
							$reference->{$k} = $v;
							break;

						case 'uuid':
							$reference->_id = $v;
							$reference->_id = ltrim($reference->_id, '{');
							$reference->_id = rtrim($reference->_id, '}');
							
							$reference->mendeley->uuid = $reference->_id;
							break;
						
						case 'abstract':
						case 'title':	
							$reference->{$k} = $v;
							break;
							
						case 'type':
							switch ($v)
							{
								case 'JournalArticle':
									$reference->type = 'article';
									break;
								case 'Book':
									$reference->type = 'book';
									break;
								case 'BookSection':
									$reference->type = 'incollection';
									break;									
								default:
									$reference->type = 'generic';
									break;
							}
							
						case 'publication':
							if (!isset($reference->journal))
							{
								$reference->journal = new stdclass;
							}
						
							$reference->journal->name = $v;
							break;
							
						case 'volume':
						case 'issue':
							$reference->journal->{$k} = $v;
							break;
							
						case 'pages':
							$reference->journal->{$k} = str_replace('-', '--', $v);
							break;
							
						case 'doi':
						case 'pmid':
							$identifier = new stdclass;
							$identifier->type = $k;
							$identifier->id = $v;
							$reference->identifier[] = $identifier;
							break;
							
						case 'issn':
							$identifier = new stdclass;
							$identifier->type = $k;
							// fix broken ISSN
							$identifier->id = substr($v, 0, 4) . '-' . substr($v, strlen($v)-4, 4);
							$reference->journal->identifier[] = $identifier;
							break;							

						// Handle cases where Mendeley mucked up ISSN/ISBN
						case 'isbn':
							$identifier = new stdclass;
							$identifier->type = $k;
							$identifier->id = $v;
							
							if (preg_match('/[0-9]{4}-[0-9]{3}([0-9]|X)/i', $identifier->id))
							{
								$identifier->type = 'issn';
								$reference->journal->identifier[] = $identifier;
							}
							else
							{
								$reference->identifier[] = $identifier;
							}
							break;							
							
						default:
							break;
					}
				}
			}
		}
	}
	
	//authors
	foreach ($dbh->query('SELECT * from DocumentContributors WHERE documentId=' . $id) as $row)
	{
		//echo $row['firstNames'] . ' ' . $row['lastName'] . "\n";
		
		$author = new stdclass;
		$author->firstname = mb_convert_case($row['firstNames'], MB_CASE_TITLE, 'UTF-8');
		$author->lastname = mb_convert_case($row['lastName'], MB_CASE_TITLE, 'UTF-8');
		$author->name = $author->firstname . ' ' . $author->lastname;
		$reference->author[] = $author;
	}
	
	// tags
	foreach ($dbh->query('SELECT * from DocumentTags WHERE documentId=' . $id) as $row)
	{
		$reference->tag[] = $row['tag'];
	}

	// keywords
	foreach ($dbh->query('SELECT * from DocumentKeywords WHERE documentId=' . $id) as $row)
	{
		$reference->keyword[] = $row['keyword'];
	}
	
	
	//urls
	foreach ($dbh->query('SELECT * from DocumentUrls WHERE documentId=' . $id) as $row)
	{	
		$type = 'link';
		$link = $row['url'];
		$link_id = '';
		
		// CiNii
		if ($link_id == '')
		{
			if (preg_match('/http:\/\/ci.nii.ac.jp\/naid\/(?<id>\d+)$/', $link, $m))
			{
				$type = 'cinii';
				$link_id = $m['id'];
				
				// Add identifier
				$identifier = new stdclass;
				$identifier->type = $type;
				$identifier->id = $link_id;
				$reference->identifier[] = $identifier;				
			}
		}

		// Handles
		if ($link_id == '')
		{
			if (preg_match('/http:\/\/hdl.handle.net\/(?<id>.*)$/', $link, $m))
			{
				$type = 'handle';
				$link_id = $m['id'];
			}
		}
		
		// JSTOR
		if ($link_id == '')
		{
			if (preg_match('/http:\/\/www.jstor.org\/stable\/(?<id>\d+)$/', $link, $m))
			{
				$type = 'jstor';
				$link_id = $m['id'];
				
				// Add identifier
				$identifier = new stdclass;
				$identifier->type = $type;
				$identifier->id = $link_id;
				$reference->identifier[] = $identifier;				
			}
		}
		
		// BioStor
		if ($link_id == '')
		{
			if (preg_match('/http:\/\biostor.org\/reference\/(?<id>\d+)$/', $link, $m))
			{
				$type = 'biostor';
				$link_id = $m['id'];
				
				// Add identifier
				$identifier = new stdclass;
				$identifier->type = $type;
				$identifier->id = $link_id;
				$reference->identifier[] = $identifier;
				
			}
		}		
				
		// Check for PDFs
		
		if ($type == 'link')
		{
			// http://content.ajarchive.org/
			if (preg_match('/http:\/\/content.ajarchive.org/', $link))
			{
				$type = 'pdf';
			}
		}
		
		if ($type == 'link')
		{
			if (preg_match('/http:\/\/www.paru.cas.cz\/folia\/pdfs\//i', $link))
			{
				$type = 'pdf';
			}
		}
		
		if ($type == 'link')
		{
			// http://www.zoores.ac.cn/CN/article/downloadArticleFile.do?attachType=PDF&id=1509
			if (preg_match('/www.zoores.ac.cn\/CN\/article\/downloadArticleFile.do\?attachType=PDF/i', $link))
			{
				$type = 'pdf';
			}
		}
		
		if ($type == 'link')
		{
			// http://journals.fcla.edu/mundi/article/view/24700/24031
			if (preg_match('/journals.fcla.edu\/mundi\/article\/view\/\d+\/\d+$/i', $link))
			{
				$type = 'pdf';
			}
		}
		
		if ($type == 'link')
		{
			// http://ci.nii.ac.jp/lognavi?name=nels&lang=en&type=pdf&id=ART0009681345
			if (preg_match('/http:\/\/ci.nii.ac.jp\/lognavi/i', $link))
			{
				$type = 'pdf';
			}
		}


		if ($type == 'link')
		{
			// http://journals.fcla.edu/mundi/article/view/24700/24031
			if (preg_match('/journals.fcla.edu\/mundi\/article\/view\/\d+\/\d+$/i', $link))
			{
				$type = 'pdf';
			}
		}

		// Naturalis
		if ($type == 'link')
		{
			if (preg_match('/http:\/\/www.repository.naturalis.nl\/document\/\d+$/', $link))
			{
				$type = 'pdf';
			}
		}			
		
		// Zootaxa fulltext
		if ($type == 'link')
		{
			if (preg_match('/\/zt[0-9]([0-9]|[a-z])+.pdf/i', $link))
			{
				$type = 'pdf';
			}
		}			
		
		
		// default PDF
		if ($type == 'link')
		{
			if (preg_match('/\.pdf$/i', $link))
			{
				$type = 'pdf';
			}
		}


		// Undo Zootaxa abstract PDF url
		if ($type == 'pdf')
		{
			if (preg_match('/\/z[0-9]([0-9]|[a-z])+.pdf/i', $link))
			{
				$type = 'link';
			}
		}
		
		
		

		switch ($type)
		{
			case 'link':
				$link = new stdclass;
				$link->url = $row['url'];
				$link->anchor = 'LINK';
				$reference->link[] = $link;
				break;

			case 'pdf':
				$link = new stdclass;
				$link->url = $row['url'];
				
				$link->url = str_replace(' ', '%20', $link->url);
				
				$link->anchor = 'PDF';
				$reference->link[] = $link;
				
				// thumbnail
				get_thumbnail_for_pdf($reference, $link->url);
				break;
				
			default:
				$identifier = new stdclass;
				$identifier->id = $link_id;
				$identifier->type = $type;
				$reference->identifier[] = $identifier;
				break;
		}
	}

	// canonical url
	foreach ($dbh->query('SELECT * from DocumentCanonicalIds INNER JOIN CanonicalDocuments ON DocumentCanonicalIds.canonicalId = CanonicalDocuments.id WHERE DocumentCanonicalIds.documentId=' . $id) as $row)
	{
		$reference->mendeley->url = $row['catalogUrl'];
		$reference->mendeley->cannonical_uuid = $row['uuid'];
		
		//print_r($reference);exit();
	}
	
	// file
	foreach ($dbh->query('SELECT * from DocumentFiles WHERE documentId=' . $id) as $row)
	{
		$reference->mendeley->hash = $row['hash'];
	}
	
	// groups
	foreach ($dbh->query('SELECT groups.id, groups.name from RemoteDocuments INNER JOIN groups ON RemoteDocuments.groupId = groups.id WHERE documentId=' . $id) as $row)
	{
		$reference->groups[$row['id']] = $row['name'];
	}

	return $reference;
}

//--------------------------------------------------------------------------------------------------
function get_from_local_uuid($uuid)
{
	global $dbh;
	
	$id = 0;
	
	
	foreach ($dbh->query('SELECT * from Documents WHERE uuid="{' . $uuid . '}"') as $row)
	{
		$id = $row['id'];
	}
	
	return $id;
}

//--------------------------------------------------------------------------------------------------
// get local mendeley document from URL
function mendeley_get_local_from_url($url)
{
	global $dbh;
	
	$id = 0;
	
	$reference = new stdclass;
	
	foreach ($dbh->query('SELECT * from DocumentUrls WHERE url="' . addcslashes($url, "'") . '"') as $row)
	{
		$id = $row['documentId'];
	}
	
	return $id;

}

//--------------------------------------------------------------------------------------------------
// get uuid from id
function mendeley_get_local_uuid_from_id($id)
{
	global $dbh;
	
	$uuid = '';
	
	foreach ($dbh->query('SELECT * from Documents WHERE id=' . $id) as $row)
	{
		$uuid = $row['uuid'];
		$uuid = str_replace('{', '', $uuid);
		$uuid = str_replace('}', '', $uuid);
	}
	
	return $uuid;

}
/*

//--------------------------------------------------------------------------------------------------
// get uuid from id
function mendeley_get_canonical_uuid_from_id($id)
{
	global $dbh;
	
	$uuid = '';
	
	foreach ($dbh->query('SELECT * from Documents WHERE id=' . $id) as $row)
	{
		$uuid = $row['uuid'];
		$uuid = str_replace('{', '', $uuid);
		$uuid = str_replace('}', '', $uuid);
	}
	
	return $uuid;

}

*/

?>