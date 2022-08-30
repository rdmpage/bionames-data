<?php

// Groups

$basedir = 'html';
//$basedir = 'html-5194';
//$basedir = 'html-5170612';
//$basedir = 'html-5206458';
//$basedir = 'html-old';

// in the same folder
$basedir = dirname(__FILE__) . '/' . $basedir;

//$basedir = '/Volumes/Seagate Expansion/MacBookPro2015/Users/rpage/Desktop/Stuff-2013-more/ion_harvest/html';
//$basedir = '/Volumes/Seagate Expansion/MacBookPro2015/Users/rpage/Desktop/Stuff-2013-more/ion_harvest/html-dddd';
//$basedir = '/Volumes/Seagate Expansion/MacBookPro2015/Users/rpage/Desktop/Stuff-2013-more/ion_harvest/html-old';
//$basedir = '/Volumes/Seagate Expansion/MacBookPro2015/Users/rpage/Desktop/Stuff-2013-more/ion_harvest/html-x';
//$basedir = '/Volumes/Seagate Expansion/MacBookPro2015/Users/rpage/Desktop/Stuff-2013-more/ion_harvest/html-xxxxx';

$files1 = scandir($basedir);

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
				
				// query.htm?searchType=tree&amp;q=
				
				if (preg_match_all('/<a\s+href="query.htm\?searchType=tree&amp;q=(?<group>\w+)">\w+<\/a>(\s+\((?<rank>\w+)\))?/', $html, $m))
				{
					$groups = $m['group'];
					$ranks 	= $m['rank'];
					
					
					// sanity check
					
					$ok = true;
					
					$group_key = join('-', $groups);
					
					if (substr_count($group_key, '-Animalia') > 0)
					{
						$ok = false;
					}
					if (substr_count($group_key, '-Protozoa') > 0)
					{
						$ok = false;
					}
					
					if ($ok)
					{
					
						$n = count($groups);
					
						while ($n > 0)
						{
							$group_key = join('-', $groups);
					
							$group_name = $groups[$n - 1];
							$group_rank = $ranks[$n - 1];
					
							array_pop($groups);
							$group_parent_key = join('-', $groups);
						
							echo 'REPLACE INTO names_groups(`key`, `name`, `rank`, `parent_key`) VALUES("' . addcslashes($group_key, '"') . '","' . addcslashes($group_name, '"') . '","' . addcslashes($group_rank, '"') . '","' . addcslashes($group_parent_key, '"') . '");' . "\n";
						
						
							$n--;
						}
					
					}					
					
					//print_r($m);
					
				}
		
			}
		}
		
		
	}
}	

?>
