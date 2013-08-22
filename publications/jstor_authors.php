<?php

// Update publications with JSTOR metadata (needs file with sici and JSTOR id)

require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');



//--------------------------------------------------------------------------------------------------
function authors_from_string($authorstring)
{
	$authors = array();
	
	// Strip out suffix
	$authorstring = preg_replace("/,\s*Jr./u", "", trim($authorstring));
	$authorstring = preg_replace("/,\s*jr./u", "", trim($authorstring));
	
	$authorstring = preg_replace("/,$/u", "", trim($authorstring));
	$authorstring = preg_replace("/&/u", "|", $authorstring);
	$authorstring = preg_replace("/;/u", "|", $authorstring);
	$authorstring = preg_replace("/ and /u", "|", $authorstring);
	$authorstring = preg_replace("/\.,/Uu", "|", $authorstring);				
	$authorstring = preg_replace("/\|\s*\|/Uu", "|", $authorstring);				
	$authorstring = preg_replace("/\|\s*/Uu", "|", $authorstring);				
	$authors = explode("|", $authorstring);
	
	for ($i = 0; $i < count($authors); $i++)
	{
		$authors[$i] = preg_replace('/\.([A-Z])/u', ". $1", $authors[$i]);
		$authors[$i] = preg_replace('/^\s+/u', "", $authors[$i]);
		$authors[$i] = mb_convert_case($authors[$i], MB_CASE_TITLE, 'UTF-8');
	}
	
	
	

	return $authors;
}

//--------------------------------------------------------------------------------------------------
function augment_jstor(&$reference, $id)
{
	//echo "Augment\n";
	
	$url = 'http://www.jstor.org/stable/' . $id;
	
	//echo $url . "\n";
	
	$html = get($url);
	
	//echo "html=$html\n";
	
	$html = str_replace("\n", "", $html);
	$html = str_replace("\r", "", $html);
	
	
	// extract stuff
	
	//$reference = new stdclass;
	
	/*
	$reference->url = 'http://www.jstor.org/stable/' . $id;
	
	if (preg_match('/<cite>(?<journal>.*)<\/cite>/Uu', $html, $m))
	{
		$reference->secondary_title = $m['journal'];
	}
	*/
	if (preg_match('/<div\s+class="author">(?<author>.*)<\/div>/Uu', $html, $m))
	{
		$authorstring = $m['author'];
		$authors = authors_from_string($authorstring);
		foreach ($authors as $a)
		{
			$a = str_replace('.', '', $a);
			$author = new stdclass;
			
			// clean off III etc.
			
			echo "|$a|\n";
			$a = preg_replace('/,\s+[I]+$/i', '', $a);
			
			
			if (preg_match('/^(?<firstname>.*)\s+(?<lastname>\w+(-\w+)?)$/Uu', $a, $m))
			{
				$author->firstname = $m['firstname'];
				$author->lastname = $m['lastname'];
				$author->name = $author->firstname . ' ' . $author->lastname;
			}
			else
			{
				$author->name = $a;
			}
			$reference->author[] = $author;
		}

		
	}
	/*
	if (preg_match('/<h2\s+class="h3">(?<title>.*)<\/h2>/Uu', $html, $m))
	{
		$reference->title = $m['title'];
	}
	
	if (preg_match('/<\/cite>\s*<br\/>(?<citation>.*)<br\/>/Uu', $html, $m))
	{
		//print_r($m);
		
		$citation = $m['citation'];
		if (preg_match('/Vol.\s+(?<volume>\d+),(\s+No.\s+(?<issue>\d+))?\s+\(\w+.,\s+(?<year>[0-9]{4})\),\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)/', $citation, $mm))
		{
			//print_r($mm);
			
			$reference->volume = $mm['volume'];
			$reference->issue = $mm['issue'];
			$reference->spage = $mm['spage'];
			$reference->epage = $mm['epage'];
			$reference->year = $mm['year'];
			
		}
	}
	*/
	
	if (preg_match('/Abstract:\s*<p>(?<abstract>.*)<\/p>/Uu', $html, $m))
	{
		$reference->abstract = trim($m['abstract']);
	}
}

$filename = 'jstor.txt';

$file = @fopen($filename, "r") or die("couldn't open $filename");

$file_handle = fopen($filename, "r");

$docs = null;

$count = 0;
$skip = true;

while (!feof($file_handle)) 
{
	$line = trim(fgets($file_handle));
	$parts = explode("\t", $line);
	
	
	$sici = $parts[0];
	$jstor = $parts[1];
	
	if ($jstor == 25005080)
	{
		$skip = false;
	}
	
	if (!$skip)
	{
		
	
		$url = 'http://bionames.org/api/id/' . $sici;
		
		echo $url . "\n";
		
		$json = get($url);
		
		if ($json != '')
		{
			$reference = json_decode($json);
			
			//print_r($reference);
			
			if (isset($reference->author))
			{
				//unset($reference->author);
			}
			else
			{
				// fetch
				augment_jstor($reference, $jstor);
				
				print_r($reference);
				
				$resp = $couch->send("PUT", "/" . $config['couchdb_options']['database'] . "/" . urlencode($sici), json_encode($reference));
				var_dump($resp);
				
				//exit();
				
				if (($count++ % 10) == 0)
				{
					$rand = rand(2000000, 6000000);
					echo '...sleeping for ' . round(($rand / 1000000),2) . ' seconds' . "\n";
					usleep($rand);
				}
				
			
			}
	
		}
	}
}


?>