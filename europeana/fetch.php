<?php

require_once(dirname(dirname(__FILE__)) . '/lib.php');

$config['cache_dir'] 	= '.';
$config['convert']		= '/usr/local/bin/convert';

/*
http://bhle-dev-1.nhm.ac.uk/aip-preview/bookreader/image.php?path=
../uk-rbge/NRBGEv24-46/Volume45/NRBGE_0045/NRBGE_0045_1988_0002&leaf=203
*/

$path = 'uk-rbge/NRBGEv24-46/Volume45/NRBGE_0045/NRBGE_0045_1988_0002';


$parts = explode("/", $path);

$image_path = $config['cache_dir'];
foreach ($parts as $part)
{
	$image_path .= '/' . $part;
	
	
	// Ensure cache subfolder exists for this item
	if (!file_exists($image_path))
	{
		$oldumask = umask(0); 
		mkdir($image_path, 0777);
		umask($oldumask);
		
	}
}

// Thumbnails are in a subdirectory
$oldumask = umask(0); 
mkdir($image_path . '/thumbnails', 0777);
umask($oldumask);


$done = false;
$page = 1;
while (!$done)
{
	$url = 'http://bhle-dev-1.nhm.ac.uk/aip-preview/bookreader/image.php?path=';
	
	$p = '../' . $path . '&leaf=' . $page;
	
	$url .= $p;
	
	
	$image = get($url);
	
	if ($image == '')
	{
		$done = true;
	}
	else
	{
		$image_filename = $image_path . '/' . $page . '.jpg';
		
		file_put_contents($image_filename, $image);
		
		// Thumbnail
		$thumbnail_filename = $image_path . "/thumbnails/" . $page . '.gif'; 
		$command = $config['convert']  . ' -thumbnail 100 ' . $image_filename . ' ' . $thumbnail_filename;
		echo $command . "\n";
		system($command);
	}
	$page++;

}



?>
