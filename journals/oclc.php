<?php

/*

Given a list OCLCs fetch data from WorldCat
 
*/

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


$oclcs=array(8356354);
$oclcs=array(493793604);

foreach ($oclcs as $oclc)
{
	$url = 'http://experiment.worldcat.org/oclc/' . $oclc . '.rdf';
	
	$rdf = get($url);
	if ($rdf != '')
	{
		//echo $rdf;
		
		$journal = new stdclass;
		$journal->_id = 'oclc/' . $oclc;
		
		$dom= new DOMDocument;
		$dom->loadXML($rdf);
		$xpath = new DOMXPath($dom);
		
		$xpath->registerNamespace('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
		$xpath->registerNamespace('schema', 'http://schema.org/');

		$xpath_query = '//rdf:Description[@rdf:about="http://www.worldcat.org/oclc/' . $oclc . '"]/schema:name';
		
		//echo $xpath_query . "\n";
		
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			$journal->title = $node->firstChild->nodeValue;
			$journal->title = preg_replace('/\.$/Uu', '', $journal->title);
		}
		
		
		$journal->provenance = array();
		$worldcat = new stdclass;
		$worldcat->time = date(DATE_ISO8601, time());
		$worldcat->url = $url;
		$journal->provenance[] = $worldcat;

		print_r($journal);
		
		if (1)
		{
			echo "CouchDB...\n";
			$couch->add_update_or_delete_document($journal,  $journal->_id);
		}
		
		
	}
}


?>