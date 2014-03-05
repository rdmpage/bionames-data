<?php


$filename = 'zootaxa.csl';

$xml = file_get_contents($filename);

//$xml = '<style><info><title>xxxx</title></info></style>';

//echo $xml;

$dom = new DOMDocument;
$dom->loadXML($xml);
$xpath = new DOMXPath($dom);


$nodes = $xpath->query ('//bibliography/layout');
foreach($nodes as $node)
{
	echo "-\n";
}

?>
