<?php

require_once(dirname(dirname(__FILE__)) . '/lib.php');
require_once(dirname(dirname(__FILE__)) . '/nameparse.php');
require_once(dirname(dirname(__FILE__)) . '/publications/reference.php');

//require_once(dirname(__FILE__) . '/citation.php');


//--------------------------------------------------------------------------------------------------
function lookup($reference)
{	
	global $config;
	
	$ch = curl_init(); 
	
	$url = 'http://bionames.org/bionames-api/api_lookup.php';
	
	curl_setopt ($ch, CURLOPT_URL, $url); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 

	// Set HTTP headers
	$headers = array();
	$headers[] = 'Content-type: application/json'; // we are sending JSON
	
	// Override Expect: 100-continue header (may cause problems with HTTP proxies
	// http://the-stickman.com/web-development/php-and-curl-disabling-100-continue-header/
	$headers[] = 'Expect:'; 
	curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
	
	if ($config['proxy_name'] != '')
	{
		curl_setopt($ch, CURLOPT_PROXY, $config['proxy_name'] . ':' . $config['proxy_port']);
	}

	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($reference));
	
	$response = curl_exec($ch);
	
	//echo $response;
	
	$obj = json_decode($response);

	return $obj;	
}

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
/**
 * @brief Add an author to a reference from a string containing the author's name
 *
 * @param reference Reference object
 * @param author Author name as a string
 *
 */
function reference_add_author_from_string(&$reference, $author_string, $secondary = false)
{
	if ($secondary)
	{
		if (!isset($reference->book->author))
		{
			$reference->book->author = array();
		}
	}
	else
	{
		if (!isset($reference->author))
		{
			$reference->author = array();
		}
	}	
	
	$parts = parse_name($author_string);

	$author = new stdClass();
	$author->name = $author_string;
	
	if (isset($parts['last']))
	{
		$author->lastname = $parts['last'];
	}
	if (isset($parts['suffix']))
	{
		$author->suffix = $parts['suffix'];
	}
	if (isset($parts['first']))
	{
		$author->firstname = $parts['first'];
		
		if (array_key_exists('middle', $parts))
		{
			$author->firstname .= ' ' . $parts['middle'];
		}
		
		// Space initials nicely
		$author->firstname = preg_replace("/\.([A-Z])/", ". $1", $author->firstname);
		$author->firstname = str_replace(".", "", $author->firstname);
		
	}
	if ($secondary)
	{
		$reference->book->author[] = $author;	
	}
	else
	{
		$reference->author[] = $author;	
	}
	

}


//--------------------------------------------------------------------------------------------------
class Parser 
{
	function __construct() {}

	function extract_citations(&$obj) {}

	//----------------------------------------------------------------------------------------------
	function is_name($str)
	{
		$is_name = false;
		
		if (preg_match('/
		[A-Z][a-zA-Z]+,
		\s*
		([A-Z]\.\s*)+
		/x', $str))
		{
			$is_name = true;
		}
		
		return $is_name;
	}
	

	//----------------------------------------------------------------------------------------------
	function is_end_of_citation($str, $mean_line_length) {}
	//----------------------------------------------------------------------------------------------
	function parse_citation($str, &$reference, $debug = false) {}
}

//--------------------------------------------------------------------------------------------------
class ZootaxaParser extends Parser
{
	
	//----------------------------------------------------------------------------------------------
	// Extract bibliographic citations from list of references
	function extract_citations(&$obj)
	{
		$sum_line_length = 0;
		$num_lines = 0;
		foreach ($obj->pages as $page)
		{
			$lines = explode("\n", $page);
			$num_lines += count($lines);
		
			foreach ($lines as $line)
			{
				$sum_line_length += strlen($line);
			}
		}
		$mean_line_length = $sum_line_length / $num_lines;
	
		define (STATE_START, 			0);
		define (STATE_IN_REFERENCES, 	1);
		define (STATE_OUT_REFERENCES,	2);
		define (STATE_START_CITATION,	3);
		define (STATE_END_CITATION,		4);
		
		$state = STATE_START;
		
		$obj->citations = array();
		$citation_string = '';
		
		foreach ($obj->pages as $page)
		{
			$lines = explode("\n", $page);
			$n = count($lines);
			$line_number = 0;
		
			// Skip running head
			$line_number++;
			
			//print_r($lines);
		
			while (($state != STATE_OUT_REFERENCES) && ($line_number < $n))
			{
				$line = trim($lines[$line_number]);
				$line_number++;
				
				//echo $line . "\n";
				
				// Trim hyphenation
				$len = mb_strlen($line);
				$has_hyphen = false;
				if (preg_match('/[a-z]\-$/U', $line))
				{					
					$line = mb_substr($line, 0, $len-1);
					$has_hyphen = true;
				}
				
				$next_state = $state;
				
				switch ($state)
				{
					case STATE_START:
						// Look for references
						if (preg_match('/^\s*(ZOOTAXA)?(REFERENCE[S]?|LITERATURE CITED|LITERAT(U|TJ)(R|E)E CITED)$/i', $line))
						{
							// Ignore table of contents
							if (preg_match('/\.?\s*[0-9]$/', $line))
							{
							}
							else
							{
								$state = STATE_IN_REFERENCES;
							}
						}
						break;
						
					case STATE_IN_REFERENCES:
						if (preg_match('/^[A-Z]/', $line))
						{
							if (preg_match('/^((Note added in proof)|(Appendix)|(Buchbesprechungen)|(Figure)|(ZOOTAXA APPENDIX)|Manuscript received|Acknowledgement of receipt)/i', $line))
							{
								$state = STATE_OUT_REFERENCES;
							}
							else
							{
								$state = STATE_START_CITATION;
								$citation_string = $line;
								if ($this->is_end_of_citation($line, $mean_line_length))
								{
									$obj->citations[] = $citation_string;
									$state = STATE_IN_REFERENCES;
								}
								else
								{
									if ($has_hyphen === false)
									{
										$citation_string .= ' ';
									}
								}								
							}
						}
						break;
						
					case STATE_START_CITATION:
						$citation_string .= $line;
						if ($this->is_end_of_citation($line, $mean_line_length))
						{
							$obj->citations[] = $citation_string;
							$state = STATE_IN_REFERENCES;
						}
						else
						{
							if ($has_hyphen === false)
							{
								$citation_string .= ' ';
							}
						}
						break;
						
				}
			}
		
		}
	
	}
	
	
	//----------------------------------------------------------------------------------------------
	function is_end_of_citation($str, $mean_line_length)
	{
		$is_end = false;
		
		// Article
		if (preg_match('/[0-9]\.$/', $str))
		{
			$is_end = true;
		}
		
		// Annotation
		if (preg_match('/\]$/', $str))
		{
			$is_end = true;
		}
	
		// Book
		if (preg_match('/pp\.$/', $str))
		{
			$is_end = true;
		}
	
		// Plates
		if (preg_match('/pls\.$/', $str))
		{
			$is_end = true;
		}
		
		// Website
		if (preg_match('/\([A|a]ccessed[:]?\s*(on\s*)?(\d+ \w+|\w+ \d+,)\s*([0-9]{4})?\).$/', $str))
		{
			$is_end = true;
		}
		
		// Software
		if (preg_match('/by the author.$/', $str))
		{
			$is_end = true;
		}
	
		if (preg_match('/\.$/', $str))
		{
			//echo $str . '[' . strlen($str) . ']' . "\n";
			if (strlen($str) < $mean_line_length)
			{
				if (!$this->is_name($str))
				{
					$is_end = true;
				}
			}
		}
		
		return $is_end;
	}
	
	//----------------------------------------------------------------------------------------------
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
}

//--------------------------------------------------------------------------------------------------
class ProcHelminthParser extends ZootaxaParser
{
	//----------------------------------------------------------------------------------------------
	function parse_citation($str, &$reference, $debug = false)
	{
		$matched = false;
		
		// Clean up
		$str = trim($str);
		
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
	
	
		// Article
		if (!$matched)
		{
			if ($debug) echo "Trying " . __LINE__ . "\n";
			
			// Menezes, N. A. 1983. Guia pratico para o conhecimento e identificacao de tainhas e paratis (Pisces, Mugilidae) do litoral brasileiro. Revista Brasileira de Zoologia 2(1): 1-12.

			if (preg_match('/
			(?<authors>.*)
			\s*
			(?<year>[0-9]{4})[a-z]?(\s*\("[0-9]{4}"\))?
			(?<middle>.*)
			\s*
			(?<volume>\d+)
			(\s*\((?<issue>\d+)\))?		
			:
			\s*
			(?<spage>[e]?\d+)
			(.
			(?<epage>\d+))?
			\.?
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
				
			}
	
		}
		

	
		
		return $matched;
	}	

}

//--------------------------------------------------------------------------------------------------
class JournalofArachnologyParser extends ZootaxaParser
{
	//----------------------------------------------------------------------------------------------
	function parse_citation($str, &$reference, $debug = false)
	{
		$matched = false;
		
		// Clean up
		$str = trim($str);
		
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
	
	
		// Article
		if (!$matched)
		{
			if ($debug) echo "Trying " . __LINE__ . "\n";
			
			// Menezes, N. A. 1983. Guia pratico para o conhecimento e identificacao de tainhas e paratis (Pisces, Mugilidae) do litoral brasileiro. Revista Brasileira de Zoologia 2(1): 1-12.

			if (preg_match('/
			(?<authors>.*)
			\s*
			(?<year>[0-9]{4})[a-z]?(\s*\("[0-9]{4}"\))?
			(?<middle>.*)
			\s*
			(?<volume>\d+)
			(\s*\((?<issue>\d+)\))?		
			:
			\s*
			(?<spage>[e]?\d+)
			(.
			(?<epage>\d+))?
			\.?
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
				
			}
	
		}
		

	
		
		return $matched;
	}	

}




$filename = 'da4cb69d068402a57e3e2bfaef783dafcd19e6b5.json';
$filename = '3306940031684d207863b2304f6b1c92.json';
$filename = 'd4559f7a7e645c95be8d6489cb3982f2.json';

$filename = '982b52d33f1bb4b5bc34650e674e6f02.json';
$filename = '20bc47c7172ae35f205cbd7e4471bda8.json';

// Proc Helminth Soc
//$filename = 'a222f38cd8f13cf8f86995d23c073b45.json';
//$filename = '2cd9a26ef0a40731349b9f56d9640251.json';

// Journal of Arachnology
$filename = '8e9133145988dc86bde186e8a71b8b03.json';

// Rev Suisse
$filename = '80825.json';

$json = file_get_contents($filename);

$obj = json_decode($json);

//print_r($obj);


// lat long

// specimen codes

// references

//$parser = new ProcHelminthParser();
//$parser = new ZootaxaParser();
$parser = new JournalofArachnologyParser();

$parser->extract_citations($obj);

if (0)
{
	print_r($obj);
	exit();
}

$count = 0;
$obj->references = array();
foreach ($obj->citations as $citation)
{
	$reference = new stdclass;
	$reference->id = $count;
	$count++;
	$matched = $parser->parse_citation($citation, $reference, 0);
		
	if ($matched)
	{
		$obj->references[] = $reference;
	}
	else
	{
		$obj->references[] = $reference; // null;
	}
}

if (0)
{
	//print_r($obj);
	
	$citations = array();
	
	foreach ($obj->references as $reference)
	{
		$citations[] = $reference;
	}
	
	if (1)
	{
		print_r($citations);
	}
	else
	{
		echo json_encode($citations);
	}
	
	exit();
}


//exit();

$citations = array();

foreach ($obj->references as $reference)
{
	//print_r($reference);
	
	$reference = lookup($reference);
	
	//print_r($reference);
	
	
	$citations[] = $reference;
}

echo json_encode($citations);

//print_r($citations);

?>