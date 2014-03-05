<?php

$filename = 'bioone.html';

$html = file_get_contents($filename);

$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DOMXPath($dom);

foreach($xpath->query("//div[class='refnumber']") as $node) 
{
    echo $node->firstChild->nodeValue;
    echo "---\n";
} 

?>
