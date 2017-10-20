<?php

require_once('../lib.php');


$id = 140890;
$id = 136812;

$url = 'http://biostor.org/reference/' . $id . '.bibjson';

$json = get($url);

//echo $json;

$obj = json_decode($json);

$obj->_id = $id;


$text = get('http://biostor.org/reference/' . $id . '.text');

//$obj->pages = preg_split("/(\f)+/", $text);
//print_r($pages);

//echo json_format(json_encode($obj));

$pages = preg_split("/(\f)+/", $text);

$n = count($pages);
for ($i = 0; $i < $n; $i++)
{
	$obj = new stdclass;
	$obj->_id = $id . '-' . $i;
	$obj->documentId = $id ;
	$obj->type = "page";
	$obj->text = $pages[$i];
	
	
	echo json_format(json_encode($obj));
	echo "\n";
	
}

?>

