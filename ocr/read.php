<?php

// convert image.png -compress none image.pbm

function read_pbm($filename)
{
	$image = new stdclass;
	
	$file_handle = fopen($filename, "r");
	
	
	// skip first line
	fgets($file_handle);
	
	$line = trim(fgets($file_handle));
	$parts = explode(' ', $line);
	
	$image->width 	= $parts[0];
	$image->height 	= $parts[1];
		
	$r = 0;
	$c = 0;
	
	$image->pixels = array();
	
	$image->bits = array();
	
	//print_r($image);exit();
	
	while (!feof($file_handle)) 
	{
		$line = trim(fgets($file_handle));
		$parts = explode(' ', $line);
		
		foreach ($parts as $p)
		{
			if (!isset($image->pixels[$r]))
			{
				$image->pixels[$r] = array();
			}
			$image->pixels[$r][$c] = $p;
			
			$c++;
			
			if ($c == $image->width) { $r++; $c=0; }
		}
	}
	
	if (isset($image->pixels[$image->height]))
	{
		unset($image->pixels[$image->height]);
	}
	
	
	
	foreach ($image->pixels as $row => $col)
	{
		echo join('', $col) . "\n";
	}
	
	
	return $image;
}

// Pattern
$filename = 'Miniopterus.pbm';
$filename = 'Nyctinomus.pbm';
$filename = 'Mops.pbm';

$image = read_pbm($filename);


// pick a pixel

$row = 4;
$col = 20;

echo $image->pixels[$row][$col];

// floodfill


$Q = array();

$Q[] = array($row,$col);

print_r($Q);
while (count($Q) > 0)
{
	$N = array_shift($Q);
	
	if ($image->pixels[$N[0]][$N[1]] == 1)
	{
		$w = $e = $N[1];
		$w--;
		while ($image->pixels[$N[0]][$w] == 1)
		{
			$w--;
		}
		$e++;
		while ($image->pixels[$N[0]][$e] == 1)
		{
			$e++;
		}
		
		for ($i = $w+1; $i < $e; $i++)
		{
			$image->pixels[$N[0]][$i] = 2;
			
			if ($N[0] != 0)
			{
				if ($image->pixels[$N[0] - 1][$i] == 1)
				{
					$Q[] = array($N[0] - 1,$i);
				}
			}
			if ($N[0] < count($image->pixels))
			{
				if ($image->pixels[$N[0] + 1][$i] == 1)
				{
					$Q[] = array($N[0] + 1,$i);
				}
			}
			
			// diagonal at left
			if ($w >= 0)
			{
				if ($N[0] != 0)
				{
					if ($image->pixels[$N[0] - 1][$w ] == 1)
					{
						$Q[] = array($N[0] - 1,$w);
					}
				}
				if ($N[0] < count($image->pixels))
				{
					if ($image->pixels[$N[0] + 1][$w] == 1)
					{
						$Q[] = array($N[0] + 1,$w);
					}
				}
			}
			// diagonal at right
			if ($e < count($image->pixels[0]))
			{
				if ($N[0] != 0)
				{
					if ($image->pixels[$N[0] - 1][$e] == 1)
					{
						$Q[] = array($N[0] - 1,$e);
					}
				}
				if ($N[0] < count($image->pixels))
				{
					if ($image->pixels[$N[0] + 1][$e] == 1)
					{
						$Q[] = array($N[0] + 1,$e);
					}
				}
			}
			
			
		}
		
		
		
	}
}


	foreach ($image->pixels as $row => $col)
	{
		$s =  join('', $col);
		$s = str_replace('0', ' ', $s);
		echo "$s\n";
	}




?>
