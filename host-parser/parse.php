<?php

$filename = 'hosts.json';

$json = file_get_contents($filename);

$obj = json_decode($json);

foreach ($obj->rows as $row)
{
	echo $row->key . "\n";
}


?>