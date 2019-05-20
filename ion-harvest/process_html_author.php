<?php

// Authorship

$basedir = 'html';
$files1 = scandir(dirname(__FILE__) . '/' . $basedir);

foreach ($files1 as $directory)
{
	//echo $directory . "\n";
	if (preg_match('/^\d+$/', $directory))
	{	
		//echo $directory . "\n";
		
		$files2 = scandir(dirname(__FILE__) . '/' . $basedir . '/' . $directory);

		foreach ($files2 as $filename)
		{
			//echo $filename . "\n";
			if (preg_match('/^(?<id>\d+)\.html$/', $filename, $m))
			{	

				$id = $m['id'];

				$html = file_get_contents(dirname(__FILE__) . '/' . $basedir . '/' . $directory . '/' . $filename);
				
				//echo $html;
				
				$html = str_replace("\n", " ", $html);
				
				//echo $html;
				
				if (preg_match('/<h1\s+class="documentFirstHeading">Name - (?<name>.*)<\/h1>/U', $html, $m))
				{
					//print_r($m);
					
					$name = $m['name'];
					
					$nameComplete = $name;
					
					//$name = str_replace('&amp;', '&', $name);
					$name = mb_convert_encoding($name, 'UTF-8', 'HTML-ENTITIES');

					if (preg_match('/"http:\/\/www.eol.org\/search\?search_type=text&amp;q=(?<q>.*)"/U', $html, $m))
					{
						//print_r($m);	
						
						$short = $m['q'];
						
						$nameComplete = $short;
						
						$author = trim(str_replace($short, '', $name));
						
						if ($author != '');
						{
							//echo $short . '|' . $author . "|\n";
							
							if (strlen($author) > 0)
							{
							
								$sql = 'UPDATE `names` SET `taxonAuthor`="' . addcslashes($author, '"') . '" WHERE `id`="' . $id . '" AND `nameComplete`="' . $nameComplete. '";';
								echo $sql . "\n";
							}
						}
						
						
					}					
				}
				
				
				if (preg_match_all('/<a href="query.htm\?searchType=tree&amp;q=(?<group>\w+)">/', $html, $m))
				{
					$groups = $m['group'];
					
					
					if (1)
					{
						$sql = 'UPDATE `names` SET `group`="' . addcslashes($groups[count($groups) - 1], '"') . '" WHERE `id`="' . $id . '" AND `nameComplete`="' . $nameComplete. '";';
						
						//echo $groups[count($groups) - 1] . "\n";
						
						echo $sql . "\n";
					}
					else
					{
						echo $id . "\t" . json_encode($groups) . "\n";
					}
				
					//print_r($m);
					
				}
				
				if (preg_match('/<h3>Reported Taxonomic Ranks<\/h3>\s*<p>(?<rank>.*)<\/p>/U', $html, $m))
				{
					//print_r($m);
					
					$sql = 'UPDATE `names` SET `rank`="' . strtolower($m['rank']) . '" WHERE `id`="' . $id . '" AND rank IS NULL;';
					echo $sql . "\n";
				}
				
				
				
				/*
				if (preg_match('/<h3>Variants and Synonyms<\/h3>(.*)<h3>Reported Taxonomic Ranks<\/h3>/U', $html, $m))
				{
					//print_r($m);
					
					if (preg_match_all('/<a href="namedetails.htm\?lsid=(?<id>\d+)"/', $m[1], $mm))
					{
						//print_r($mm);
						
						foreach ($mm['id'] as $variant)
						{
							echo $id . "\t" . $variant . "\n";
						}
						
						
					}
				}
				*/

		
			}
		}
		
		
	}
}	

?>
