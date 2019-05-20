<?php

require_once (dirname(dirname(__FILE__)). '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/reference.php');

//--------------------------------------------------------------------------------------------------
// meta
function get_abstract_from_doi($doi)
{
	$abstract = '';
	
	$url = 'http://dx.doi.org/' . $doi;
	
	echo $url . "\n";
	
	$html = get($url, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.2.5 (KHTML, like Gecko) Version/8.0.2 Safari/600.2.5');
	
	echo $html;	
	
	$html = str_replace("\n", "", $html);
		
	if (preg_match('/<meta\s+name="citation_abstract"\s+content="(?<abstract>.*)"\s*\/>/Uu', $html, $m))
	{
		$abstract = $m['abstract'];		
	}
	if (preg_match('/<meta\s+name="dc.Description"\s+content="(?<abstract>.*)"\s*\/>/Uu', $html, $m))
	{
		$abstract = $m['abstract'];		
	}

	return $abstract;
}

//--------------------------------------------------------------------------------------------------
function doi2pmid($doi)
{
	$pmid = 0;
	$url = 'http://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=pubmed&term=' . urlencode($doi . '[DOI]');
	
	$xml = get($url);
	
	//echo $xml;
	
	// Did we get a hit?
	$dom= new DOMDocument;
	$dom->loadXML($xml);
	$xpath = new DOMXPath($dom);
	
	$xpath_query = '//eSearchResult/Count';
	$nodeCollection = $xpath->query ($xpath_query);
	foreach($nodeCollection as $node)
	{
		$count = $node->firstChild->nodeValue;
	}
	
	if ($count == 1)
	{
		$xpath_query = '//eSearchResult/IdList/Id';
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			$pmid = $node->firstChild->nodeValue;
		}
	}
	
	return $pmid;

}

//--------------------------------------------------------------------------------------------------
// add PubMed metadata
// abstract
function pmid_metadata(&$reference, $pmid)
{
	$url = 'http://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&id=' . $pmid . '&rettype=xml';
	
	$xml = get($url);
	
	//echo $xml;
	
	// Did we get a hit?
	$dom= new DOMDocument;
	$dom->loadXML($xml);
	$xpath = new DOMXPath($dom);
	
	$xpath_query = '//Abstract/AbstractText';
	$nodeCollection = $xpath->query ($xpath_query);
	foreach($nodeCollection as $node)
	{
		$reference->abstract = $node->firstChild->nodeValue;
	}
	
	$identifiers = array();
	if (isset($reference->identifier))
	{
		foreach ($reference->identifier as $identifier)
		{
			$identifiers[] = $identifier->type;
		}
	}
	
	if (!in_array('pmc', $identifiers))
	{
		$xpath_query = '//ArticleIdList/ArticleId[@IdType="pmc"]';
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			$identifier = new stdclass;
			$identifier->type = 'pmc';
			$identifier->id = $node->firstChild->nodeValue;
		
			$reference->identifier[] = $identifier;
		}
	}	
	
	
}

//--------------------------------------------------------------------------------------------------
function get_isbn_thumbnail(&$reference, $isbn)
{
	global $db;
	
	
	$thumbnail = '';

	$sql = "SELECT * FROM new_isbn_thumbnails WHERE isbn = " . $db->qstr($isbn) . " LIMIT 1;";
	
	//echo $sql . "\n";exit();
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$thumbnail = $result->fields['path'];
		
		$filename = '/Users/rpage/Sites/itaxon/thumbnails/' . $thumbnail;
		$filename = '/Users/rpage/Dropbox/BibScrapper/thumbnails/thumbnails/' . $thumbnail;


		
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
function get_oclc_thumbnail(&$reference, $oclc)
{
	global $db;
	
	
	$thumbnail = '';

	$sql = "SELECT * FROM new_oclc_thumbnails WHERE oclc = " . $db->qstr($oclc) . " LIMIT 1;";
	
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
function get_doi_pdf(&$reference, $doi)
{
	global $db;
	
	$sql = "SELECT sha1, pdf FROM sha1 INNER JOIN new_doi_pdf USING(pdf) WHERE doi=" . $db->qstr($doi) . ' LIMIT 1';
	
	//echo $sql;exit();
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$reference->file = new stdclass;
		$reference->file->sha1 = $result->fields['sha1'];
		$reference->file->url = $result->fields['pdf'];
		
		// thumbnail
		$url = 'http://direct.bionames.org/bionames-archive/documentcloud/pages/' . $reference->file->sha1 . '/1-small';
		
//		$url = 'http://direct.bionames.org/bionames-archive/pdf/7b/1a/28/7b1a2829733572d4d4650db94837f63a5d7aa777/images/thumbnails/page-0.png';
				
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
function get_jstor_thumbnail(&$reference, $jstor)
{
	global $db;
	
	// GIF
	$filename = dirname(dirname(__FILE__)) . '/jstor_thumbnails/' . $jstor . '.gif';
	$filename = '/Users/rpage/Development/jstor-thumbnails-o/' . $jstor . '.gif';
	
	// if no GIF try JPEG
	if (!file_exists($filename))
	{
		$filename = dirname(dirname(__FILE__)) . '/jstor_thumbnails/' . $jstor . '.jpg';
	}

	if (!file_exists($filename))
	{
		$filename = dirname(dirname(__FILE__)) . '/jstor_thumbnails/' . $jstor . '.jpeg';
	}
		
	if (file_exists($filename))
	{
		
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
		$filename = '/Users/rpage/Dropbox/BibScrapper/thumbnails/thumbnails/' . $thumbnail;
		
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
function have_identifier($namespace, $identifier)
{
	global $config;
	global $couch;
	
	$id = null;
	
	/*
	if (is_numeric($identifier))
	{
		$couch_id = $identifier;
	}
	else*/
	{
		$couch_id = urlencode('"' . $identifier . '"');
	}

	$url = '_design/identifier/_view/' . $namespace . '?key=' . $couch_id;
	
	$url .= '&stale=ok';	
	
	echo $url . "\n";
	
	$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/" . $url);

	$response_obj = json_decode($resp);
	
	//print_r($response_obj);
	
	if (isset($response_obj->error))
	{
	}
	else
	{
		if (count($response_obj->rows) == 0)
		{
		}
		else
		{	
			//print_r($response_obj->rows);
			$id = $response_obj->rows[0]->id;
		}
	}
	
	return $id;
}



//--------------------------------------------------------------------------------------------------
// Do we have this reference already?
function have_reference_already($reference)
{
	global $config;
	global $couch;
	
	$id = null;
	
	$identifiers = array();
	
	if (isset($reference->identifier))
	{
		foreach ($reference->identifier as $identifier)
		{
			$identifiers[$identifier->type] = $identifier->id;
		}
	}
	
	//echo "__LINE__ Identifiers\n";
	//print_r($identifiers);
	
	
	if (count($identifiers) > 0)
	{
		// Order of identifiers is order of preference
		$keys = array('doi', 'biostor', 'handle', 'jstor', 'cinii', 'pmid', 'pmc');
		foreach ($keys as $k)
		{
			if (isset($identifiers[$k]))
			{
				$id = have_identifier($k, $identifiers[$k]);
			}
		}
	}
	
	if ($id == null)
	{
	
		//echo "__LINE__ Identifiers\n";
		//print_r($reference->link);
	
	
		// try links
		if (isset($reference->link))
		{
			foreach ($reference->link as $link)
			{
				
				$namespace = strtolower($link->anchor);
				$namespace = 'url';
				
				$url = $link->url;
				
				if (1)
				{
					$url = str_replace('/archive/', '/bionames-archive/', $url);
				}
				
				if (preg_match('/^0018-0130/', $url))
				{
					$url = 'http://bionames.org/bionames-archive/issn/' . $url;
				}
				
				$x = have_identifier($namespace,  $url);
				if ($x)
				{
					$id = $x;
				}
				//echo $link->url; exit();
			}
		}
		
		//print_r($links);
	}
	
	if ($id)
	{
		echo "Found $id\n";
	}
	
	return $id;

}

?>