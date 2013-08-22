<?php

// Import from CrossRef
require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

require_once (dirname(dirname(__FILE__)). '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/reference.php');
require_once (dirname(__FILE__) . '/crossref.php');
require_once (dirname(__FILE__) . '/publication_utils.php');


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$doi = '10.5169/seals-168834'; // non-crossref but some metadata (!)
$doi = '10.1017/S1477200006002003'; // no ISSN
$doi = '10.1016/S1631-0691(02)01488-9';
$doi = '10.1515/mamm.1967.31.2.260';

$doi = '10.1007/BF02684242';

$doi = '10.1071/ZO9550071';

$doi = '10.1186/1471-2148-11-175';


$doi = '10.1016/j.crvi.2013.05.005'; // Resurrection of New Caledonian maskray Neotrygon trigonoides (Myliobatoidei: Dasyatidae) from synonymy with N. kuhlii, based on cytochrome-oxidase I gene sequences and spotting patterns

$docs = null;

$reference = get_doi_metadata($doi, $docs);



if ($reference)
{
	$reference->_id = $doi;
	
	get_doi_thumbnail($reference, $doi);

	print_r($reference);
	$couch->add_update_or_delete_document($reference,  $reference->_id);
}


?>