<?php

// import from Mendeley 

require_once (dirname(dirname(__FILE__)). '/couchsimple.php');

require_once (dirname(__FILE__) . '/mendeley.php');
require_once (dirname(__FILE__) . '/publication_utils.php');


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


$url = 'http://hdl.handle.net/2246/3415';

$id = mendeley_get_local_from_url($url);

if ($id <> 0)
{
	$reference = get_one_reference($id);
	
	//print_r($reference);
	
	echo reference_to_ris($reference);
}

?>