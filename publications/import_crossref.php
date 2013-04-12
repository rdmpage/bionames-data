<?php

// Import from CrossRef

require_once (dirname(dirname(__FILE__)). '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/reference.php');
require_once (dirname(__FILE__) . '/crossref.php');


$doi = '10.5169/seals-168834'; // non-crossref but some metadata (!)
$doi = '10.1017/S1477200006002003'; // no ISSN
$doi = '10.1016/S1631-0691(02)01488-9';

$reference = get_doi_metadata($doi);

if ($reference)
{
	$reference->_id = $doi;

	print_r($reference);
	$couch->add_update_or_delete_document($reference,  $reference->_id);
}


?>