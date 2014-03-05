<?php

//require_once(dirname(__FILE__) . '/reference.php'); 

// Reference string parsing...

//--------------------------------------------------------------------------------------------------
function parse_authors($authors, &$reference, $editors = false)
{
	if (preg_match_all('/(?<author>\w+(\-\w+)?,\s+([A-Z](\-[A-Z])?)\.(\s*[A-Z]\.)*)/u', $authors, $m))
	{
		//print_r($m);
		
		foreach ($m['author'] as $a)
		{
			reference_add_author_from_string($reference, $a, $editors);
		}
	}
}

//--------------------------------------------------------------------------------------------------
function parse_citation($str, &$reference, $debug = false)
{
	$matched = false;
	
	// Clean up
	$str = trim($str);
	
	$str = preg_replace('/\s*\d+\s*ZOOTAXA\s*/', '', $str);
	
	$reference->type = 'generic';
	$reference->citation_string = $str;
	
	
	if ($debug)
	{
		echo "|$str|\n";
	}
	
/*	if (preg_match('/(.*)(?<epage>\d+)\.$/uU', $str, $m))
	{
		print_r($m);
	}
*/	

	if (!$matched)
	{
	
		// Alcoa Frog Watch (2008) A site dedicated to providing information on all aspects of frogs of Western Australia. Available from http://frogwatch.museum.wa.gov.au/. (accessed 1 April 2010)
		
		if (preg_match('/(
		(?<title>.*)
		\s*
		\((?<year>[0-9]{4})[a-z]?\)
		(?<secondary_title>.*)
		Available[:]\s*(from\s*)?
	(?<url>
	(?:(?:ftp|https?):\/\/)
	(?:[a-z0-9](?:[-a-z0-9]*[a-z0-9])?\.)+(?:com|edu|biz|org|gov|int|info|mil|net|name|museum|coop|aero|[a-z][a-z])\b
	(:\d+)?
	(?:\/[^;"\'<>()\[\]{}\s\x7f-\xff]*(?:[.,?]+[^;"\'<>()\[\]{}\s\x7f-\xff]+)*)?    
	)	
	)
	\s*
	\([A|a]ccessed[:]?\s*(on\s*)?(?<accessed>(\d+\s*\w+|\w+\s\d+,)(\s*[0-9]{4})?)\)
	/x', $str, $matches))
		{
			$matched = true;
			
			//print_r($matches);

			$reference->type = 'website';
			$reference->citation_string = $str;
			$reference->title = trim($matches['title']);
			$reference->url = $matches['url'];
			$reference->url = preg_replace('/[\.|,]$/', '', $reference->url);
			
			$reference->accessed = $matches['accessed'];
			
			
		}
	}

	// Article
	if (!$matched)
	{
		if ($debug) echo "Trying " . __LINE__ . "\n";
		
		//Kottelat, M. (1988) Authorship, dates of publication, status and types of Spix and Agassiz's Brazilian fishes. Spixiana, 11, 69­93.";
		
		if (preg_match('/
		(?<authors>.*)
		\s*
		\((?<year>[0-9]{4})[a-z]?(\s*\("[0-9]{4}"\))?\)
		(?<middle>.*)
		,?
		\s*
		(?<volume>\d+)
		(\s*\((?<issue>\d+)\))?		
		,
		\s*
		(?<spage>[e]?\d+)
		(.
		(?<epage>\d+))?
		\.?
		(\s*(doi|DOI):\s*(?<doi>.*)\.)?
		$
		/uUx', $str, $matches))
		{
			$matched = true;
			
			$reference->journal = new stdclass;
			
			//print_r($matches);
			
			$middle = $matches['middle'];
			if (preg_match('/\(Ser\. (?<series>\d+)\)/', $middle, $m))
			{
				$reference->series = $m['series'];
				$middle = preg_replace('/\(Ser\. \d+\)/', '', $middle); 
			}
			
			
			$pos = strrpos($middle, ".");
			if ($pos === false)
			{
			}
			else
			{
				$reference->title = substr($middle, 0, $pos);
				$reference->title = preg_replace('/^\s*\./', '', $reference->title);
				$reference->title = preg_replace('/^\s*:/', '', $reference->title);
				
				
				$reference->journal->name = trim(substr($middle, $pos+1));
			}
			
			
			$reference->type = 'article';
			$reference->citation_string = $str;
			$reference->year = $matches['year'];
			
			$reference->journal->volume = $matches['volume'];
			
			if ($matches['issue'] != '')
			{
				$reference->journal->issue = $matches['issue'];
			}
			$reference->journal->pages = $matches['spage'];
			
			if (isset($matches['epage']) && ($matches['epage'] != ''))
			{
				$reference->journal->pages .= '--' . $matches['epage'];
			}
			if ($matches['doi'] != '')
			{
				$identifier = new stdclass;
				$identifier->type = 'doi';
				$identifier->id = str_replace(' ', '', trim($matches['doi']));
			}
			
			//print_r($reference);
			
			
			// authors
			parse_authors($matches['authors'], $reference);
			
			// DOI
			
		}

	}
	
	// Article in journal with volume/issue wrapped in parentheses
	if (!$matched)
	{
		if ($debug) echo "Trying " . __LINE__ . "\n";
		
		//Kottelat, M. (1988) Authorship, dates of publication, status and types of Spix and Agassiz's Brazilian fishes. Spixiana, 11, 69­93.";
		
		if (preg_match('/
		(?<authors>.*)
		\s*
		\((?<year>[0-9]{4})[a-z]?(\s*\("[0-9]{4}"\))?\)
		(?<middle>.*)
		,?
		\s*
		\((?<volume>\d+)\)
		,
		\s*
		(?<spage>[e]?\d+)
		(.
		(?<epage>\d+))?
		\.?
		(\s*(doi|DOI):\s*(?<doi>.*)\.)?
		$
		/uUx', $str, $matches))
		{
			$matched = true;
			
			$reference->journal = new stdclass;
			
			//print_r($matches);
			
			$middle = $matches['middle'];
			if (preg_match('/\(Ser\. (?<series>\d+)\)/', $middle, $m))
			{
				$reference->series = $m['series'];
				$middle = preg_replace('/\(Ser\. \d+\)/', '', $middle); 
			}
			
			
			$pos = strrpos($middle, ".");
			if ($pos === false)
			{
			}
			else
			{
				$reference->title = substr($middle, 0, $pos);
				$reference->title = preg_replace('/^\s*\./', '', $reference->title);
				$reference->title = preg_replace('/^\s*:/', '', $reference->title);
				
				
				$reference->journal->name = trim(substr($middle, $pos+1));
			}
			
			
			$reference->type = 'article';
			$reference->citation_string = $str;
			$reference->year = $matches['year'];
			
			$reference->journal->volume = $matches['volume'];
			
			if ($matches['issue'] != '')
			{
				$reference->journal->issue = $matches['issue'];
			}
			$reference->journal->pages = $matches['spage'];
			
			if (isset($matches['epage']) && ($matches['epage'] != ''))
			{
				$reference->journal->pages .= '--' . $matches['epage'];
			}
			if ($matches['doi'] != '')
			{
				$identifier = new stdclass;
				$identifier->type = 'doi';
				$identifier->id = str_replace(' ', '', trim($matches['doi']));
			}
			
			//print_r($reference);
			
			
			// authors
			parse_authors($matches['authors'], $reference);
			
			// DOI
			
		}

	}
	
	
	// Chapter
	if (!$matched)
	{
		if ($debug) echo "Trying " . __LINE__ . "\n";

		// Thompson, R.G. (1979) Larvae of North American Carabidae with a key to the tribes. In: Erwin, T.L., Ball, G.E., Whitehead, D.R. & Halpern, A.L. (Eds.) Carabid Beetles: Their Evolution, Natural History, and Classification. Proceedings of the First International Symposium of Carabidology. Dr. W. Junk b.v. Publishers, The Hague, pp 209-291.

		if (preg_match('/(?<authors>.*)\s*\((?<year>[0-9]{4})[a-z]?\)
		(?<title>.*)
		\.
		\s*
		In[:]?
		\s*
		(?<editors>.*)
		\([E|e]d[s]?\.\)
		,?
		\s*
		(?<secondary_title>.*)
		\.
		\s*
		(?<publisher>.*)
		\s*
		pp\.?
		\s*
		(?<spage>\d+)
		.
		(?<epage>\d+)
		\.$
		/uUx', $str, $matches))
		{
			$matched = true;
			
			//print_r($matches);

			$reference->type = 'chapter';
			$reference->citation_string = $str;
			$reference->year = $matches['year'];
			$reference->title = trim($matches['title']);
			
			
			// book
			$reference->book = new stdclass;
						
			$reference->book->title = trim($matches['secondary_title']);
			$reference->book->title = preg_replace('/^, /', '', $reference->book->title);
			
			$reference->book->pages = $matches['spage'];
			
			if (isset($matches['epage']) && ($matches['epage'] != ''))
			{
				$reference->book->pages .= '--' . $matches['epage'];
			}
			
			
			// publisher
			if ($matches['publisher'] != '')
			{
				$reference->book->publisher = new stdclass;
				$publisher = trim($matches['publisher']);
				$publisher = preg_replace('/,$/', '', $publisher);
				$pos = strpos($publisher, ",");
				if ($pos === false)
				{
					$reference->book->publisher->name = $publisher;
				}
				else
				{
					$reference->book->publisher->name = substr($publisher, 0, $pos);
					$reference->book->publisher->address = trim(substr($publisher, $pos+1));
				}
			}
			
			// authors
			parse_authors($matches['authors'], $reference);
			parse_authors($matches['editors'], $reference, true);
		}

	}
	
	// Book
	if (!$matched)
	{
		if ($debug) echo "Trying " . __LINE__ . "\n";

		// Anstis, M. (2002) Tadpoles of south-eastern Australia: a guide with keys. Reed New Holland Press, Sydney, NSW, Australia, 281 pp.
		
		if (preg_match('/(?<authors>.*)\s*\((?<year>[0-9]{4})[a-z]?\)(?<title>.*)
		\.
		\s*
		(?<publisher>.*)
		\s*
		(?<pages>\d+)
		\s+pp.$
		/uUx', $str, $matches))
		{
			$matched = true;
			
			//print_r($matches);
			
			$reference->type = 'book';
			$reference->citation_string = $str;
			$reference->year = $matches['year'];
			
			$reference->title = trim($matches['title']);
			
			// publisher
			if ($matches['publisher'] != '')
			{
				$reference->publisher = new stdclass;
				$publisher = trim($matches['publisher']);
				$publisher = preg_replace('/,$/', '', $publisher);
				$pos = strpos($publisher, ",");
				if ($pos === false)
				{
					$reference->publisher->name = $publisher;
				}
				else
				{
					$reference->publisher->name = substr($publisher, 0, $pos);
					$reference->publisher->address = trim(substr($publisher, $pos+1));
				}
			}
			
			$reference->pages = $matches['pages'];
			
			// authors
			parse_authors($matches['authors'], $reference);

		}
		
	}
	

	
	return $matched;
}
	
// Test cases
if (0)
{
	
	$refs = array();
	$failed = array();
	
/*	$refs[] = "Kottelat, M. (1988) Authorship, dates of publication, status and types of Spix and Agassiz's Brazilian fishes. Spixiana, 11, 69­93.";
	
	$refs[] = "Whitehead, P.J.P. & Myers, G. S. (1971) Problems of nomenclature and dating of Spix and Agassiz's Brazilian fishes (1829­1831). Journal of the Society for the Bibliography of Natural History, 5, 478­497";
	
	$refs[] = "Leviton, A.E., Gibbs, R.H. Jr., Heal, E., & Dawson, C.E. (1985) Standards in herpetology and ichthyology: Part 1. Stan dard symbolic codes for institutional resource collections in herpetology and ichthyology. Copeia, 1985, 802­832";
	
	$refs[] = 'Bousquet, Y. & Goulet, H. (1984) Notation of primary setae and pores on larvae of Carabidae (Coleoptera: Adephaga). Canadian Journal of Zoology, 62, 575-588.';*/
	
	$refs[] = 'Thompson, R.G. (1979) Larvae of North American Carabidae with a key to the tribes. In: Erwin, T.L., Ball, G.E., Whitehead, D.R. & Halpern, A.L. (Eds.) Carabid Beetles: Their Evolution, Natural History, and Classification. Proceedings of the First International Symposium of Carabidology. Dr. W. Junk b.v. Publishers, The Hague, pp 209-291.';
	
	$refs[] = 'Boulenger, G.A. (1894a) Descriptions of new freshwater fishes from Borneo. Annals and Magazine of Natural History (Ser. 6), 13, 245­251.';
	
	$refs[] = 'Alcoa Frog Watch (2008) A site dedicated to providing information on all aspects of frogs of Western Australia. Available from http://frogwatch.museum.wa.gov.au/. (accessed 1 April 2010)';
	
	echo "--------------------------\n";	
	$ok = 0;
	foreach ($refs as $str)
	{
	
		echo $str . "\n";
		$reference = new stdclass;
		$matched = parse_citation($str, $reference, true);
		
		if ($matched)
		{
			$ok++;
			
			print_r($reference);
		}
		else
		{
			array_push($failed, $str);
		}
	}
	
	// report
	
	echo "--------------------------\n";
	echo count($refs) . ' references, ' . (count($refs) - $ok) . ' failed' . "\n";
	print_r($failed);
}


?>