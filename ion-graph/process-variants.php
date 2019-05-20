<?php

require_once (dirname(dirname(__FILE__)) . '/config.inc.php');
require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


//----------------------------------------------------------------------------------------
function get_name($id)
{
	global $db;
	
	$name = null;
	
	$sql = 'SELECT * FROM `names` WHERE `id` = "' . $id . '" LIMIT 1';
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{	
		$name = new stdclass;
		$name->id = $id;
		$name->name = $result->fields['nameComplete'];
		$name->group = $result->fields['group'];
		$name->cluster_id = $result->fields['cluster_id'];
		if ($result->fields['taxonAuthor'] != '')
		{
			$name->taxonAuthor = $result->fields['taxonAuthor'];
		}
	}
	return $name;
	
}

//----------------------------------------------------------------------------------------

// Variants

// Groups

$basedir = 'html';

// in the same folder
//$basedir = dirname(__FILE__) . '/' . $basedir;

// This machine
$basedir = '/Users/rpage/Desktop/bionames-data-2015/ion-harvest/' . $basedir;

// Seagate
//$basedir = '/Volumes/Seagate Expansion/MacBookPro2015/Users/rpage/Desktop/Stuff-2013-more/ion_harvest/html';
//$basedir = '/Volumes/Seagate Expansion/MacBookPro2015/Users/rpage/Desktop/Stuff-2013-more/ion_harvest/html-dddd';
//$basedir = '/Volumes/Seagate Expansion/MacBookPro2015/Users/rpage/Desktop/Stuff-2013-more/ion_harvest/html-old';
//$basedir = '/Volumes/Seagate Expansion/MacBookPro2015/Users/rpage/Desktop/Stuff-2013-more/ion_harvest/html-x';


$files1 = scandir($basedir);

$files1=array(5207);


foreach ($files1 as $directory)
{
	//echo $directory . "\n";
	if (preg_match('/^\d+$/', $directory))
	{	
		//echo $directory . "\n";
		
		$files2 = scandir($basedir . '/' . $directory);

		foreach ($files2 as $filename)
		{
			//echo $filename . "\n";
			if (preg_match('/^(?<id>\d+)\.html$/', $filename, $m))
			{	

				$id = $m['id'];

				$html = file_get_contents($basedir . '/' . $directory . '/' . $filename);
				
				//echo $html;
				
				$html = str_replace("\n", " ", $html);
				
				if (preg_match('/<h3>Variants and Synonyms<\/h3>(.*)<h3>Reported Taxonomic Ranks<\/h3>/U', $html, $m))
				{
					//print_r($m);
					
					if (preg_match_all('/<a href="namedetails.htm\?lsid=(?<id>\d+)"/', $m[1], $mm))
					{
						//print_r($mm);
						
						foreach ($mm['id'] as $variant)
						{
							//echo $id . "\t" . $variant . "\n";
							
							$n1 = get_name($id);
							$n2 = get_name($variant);
							echo  $n1->name . ' - ' . $n2->name;
							
							echo ' ' . $n1->cluster_id . ' - ' . $n2->cluster_id;
							if ($n1->name != $n2->name) echo " * ";
							
							echo "\n";
							
							if (!$n2 ) exit();
						}
					}
				}
			}
		}
	}
}	

?>
