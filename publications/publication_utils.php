<?php

require_once (dirname(dirname(__FILE__)). '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/reference.php');

//--------------------------------------------------------------------------------------------------
function get_isbn_thumbnail(&$reference, $isbn)
{
	global $db;
	
	
	$thumbnail = '';

	$sql = "SELECT * FROM isbn_thumbnails WHERE isbn = " . $db->qstr($isbn) . " LIMIT 1;";
	
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
function get_oclc_thumbnail(&$reference, $oclc)
{
	global $db;
	
	
	$thumbnail = '';

	$sql = "SELECT * FROM oclc_thumbnails WHERE oclc = " . $db->qstr($oclc) . " LIMIT 1;";
	
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
function have_identifier($namespace, $identifier)
{
	global $config;
	global $couch;
	
	$id = null;
	
	if (is_numeric($identifier))
	{
		$couch_id = $identifier;
	}
	else
	{
		$couch_id = urlencode('"' . $identifier . '"');
	}

	$url = '_design/identifier/_view/' . $namespace . '?key=' . $couch_id;
	
	$url .= '&stale=ok';	
	
	//echo $url . "\n";
	
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
			print_r($response_obj->rows);
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
			if ($id) break;
		}
	}
	
	if ($id == null)
	{
		// try links
		$links = array();
		if (isset($reference->link))
		{
			foreach ($reference->link as $link)
			{
				$links[$link->anchor] = $link->url;
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