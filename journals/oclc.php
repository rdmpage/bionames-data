<?php

/*

Given a list OCLCs fetch data from WorldCat
 
*/

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


$oclcs=array(8356354);
$oclcs=array(493793604);
$oclcs=array(149683940);

$oclcs=array(187748,839056,1318593,1321112,1376204,1478736,1661552,1758754,1767249,1770540,1771594,1772999,1778777,1824093,1832705,2017321,2256260,2450616,2450646,2458868,2469881,2490733,3063797,3131780,4813936,5288091,5882578,5882596,6074629,6466422,6611393,6618268,7534490,7602121,8168411,8202271,8271617,8326732,8356354,8367051,8466361,8466677,8505392,8858169,9660300,9674056,9782210,10767898,11014658,12227212,14601149,14708519,15310044,16833835,17016704,17423440,21591580,25175084,25223508,25338230,26368635,26988799,27422946,29161417,32078184,39560753,49490209,56845701,72694454,149683940,154253814,182862129,182948689,221689133,222166671,315405633,477160542,491634712,493793604,700908859,703961870,727144867,829821597);

$oclcs=array(37623320);

$oclcs=array(137299959);

$oclcs=array(8163065,8162436,8168411);

$oclcs=array(1772999,6303212);

// IPNI
$oclcs = array(5519009);

// Others
$oclcs = array(7534490);

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