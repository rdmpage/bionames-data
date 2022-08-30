<?php

//----------------------------------------------------------------------------------------
// http://stackoverflow.com/a/5996888/9684
function translate_quoted($string) {
  $search  = array("\\t", "\\n", "\\r");
  $replace = array( "\t",  "\n",  "\r");
  return str_replace($search, $replace, $string);
}

//----------------------------------------------------------------------------------------

$filename = '../names.csv';

$headings = array();

$row_count = 0;

$file = @fopen($filename, "r") or die("couldn't open $filename");

$count = 0;
		
$file_handle = fopen($filename, "r");
while (!feof($file_handle)) 
{
	$row = fgetcsv(
		$file_handle, 
		0, 
		translate_quoted(','),
		translate_quoted('"') 
		);
		
	$go = is_array($row);
	
	if ($go)
	{
		if ($row_count == 0)
		{
			$headings = $row;		
		}
		else
		{
			$obj = new stdclass;
		
			foreach ($row as $k => $v)
			{
				if ($v != '')
				{
					$obj->{$headings[$k]} = $v;
				}
			}
		
			//print_r($obj);	
			
			
			if ($obj->journal == 'Acta Coleopterologica (Munich)')
			{
				//if (!preg_match('/Acta Coleopterologica/', $obj->publication))
				{
					//print_r($obj);	
					$count++;
					echo ".";
					//exit();
				}
			}
		}
	}	
	$row_count++;
	
	if ($row_count % 100000 == 0)
	{
		echo $row_count . "\n";
	}
}

echo "Affected rows=$count\n";

?>

