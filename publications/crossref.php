<?php

// CrossRef functions

require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(dirname(__FILE__)) . '/lib/fingerprint.php');
require_once (dirname(dirname(__FILE__)) . '/lib/lcs.php');


//--------------------------------------------------------------------------------------------------
function do_issn($issn, &$reference)
{
	$identifier = new stdclass;
	$identifier->id = $issn->content;
	
	if (preg_match('/^(?<one>[0-9]{4})(?<two>([0-9]{3})([0-9]|X))$/', $identifier->id, $m))
	{
		$identifier->id = $m['one'] . '-' . $m['two'];
	}
	
	switch ($issn->media_type)
	{
		case 'print':
		case 'electronic':
		default:
			$identifier->type = 'issn';
			break;
	}
	
	$reference->journal->identifier[] = $identifier;
}

//--------------------------------------------------------------------------------------------------
// Use content negotian and citeproc, may fail with some DOIs
// e.g. [14/12/2012 12:52] curl --proxy wwwcache.gla.ac.uk:8080 -D - -L -H   "Accept: application/citeproc+json;q=1.0" "http://dx.doi.org/10.1080/03946975.2000.10531130" 

function get_doi_metadata($doi, &$json)
{
	$reference = null;
	
	$url = 'http://data.crossref.org/' . $doi;
	$url = 'http://dx.doi.org/' . $doi;
	$json = get($url, '', "application/citeproc+json;q=1.0");
	
	echo $url;
	echo $json;
	//exit();
	
	if ($json == '')
	{
		return $reference;
	}
	
	$citeproc = json_decode($json);

	if ($citeproc == null)
	{
		return $reference;
	}
		
	$reference = new stdclass;
	$reference->type = 'generic';
	
	$crossref = new stdclass;
	$crossref->time = date(DATE_ISO8601, time());
	$crossref->url = 'http://dx.doi.org/' . $doi;
	$reference->provenance['crossref'] = $crossref;
		
	$reference->title = $citeproc->title;
	if ($reference->title != '')
	{
		// clean
		$reference->title = strip_tags($reference->title);
		
		$reference->title = preg_replace('/\s\s+/u', ' ', $reference->title);
		$reference->title = preg_replace('/^\s+/u', '', $reference->title);
		$reference->title = preg_replace('/\s+$/u', '', $reference->title);
		
	}
	
	$reference->identifier = array();
	$identifier = new stdclass;
	$identifier->type = 'doi';
	$identifier->id = $citeproc->DOI;
	$reference->identifier[] = $identifier;
	
	if ($citeproc->type == 'article-journal')
	{
		$reference->type = 'article';
		$reference->journal = new stdclass;
		$reference->journal->name = $citeproc->{'container-title'};
		$reference->journal->volume = $citeproc->volume;
		if ($citeproc->issue)
		{
			$reference->journal->issue = $citeproc->issue;
		}
		$reference->journal->pages = $citeproc->page;
		
		if (preg_match('/--/', $reference->journal->pages))
		{
		}
		else
		{
			$reference->journal->pages = str_replace('-', '--', $reference->journal->pages);
		}
		
	}

	if ($citeproc->issued->{'date-parts'})
	{
		$reference->year = $citeproc->issued->{'date-parts'}[0][0];
	}
	else
	{
		if (isset($citeproc->issued->raw))
		{
			if (preg_match('/^[0-9]{4}$/', $citeproc->issued->raw))
			{
				$reference->year = $citeproc->issued->raw;
			}
		}
	}
	$reference->issued = $citeproc->issued;
	
	if (isset($citeproc->publisher))
	{
		$reference->publisher = $citeproc->publisher;
	}
	
	if (isset($citeproc->author))
	{
		$reference->author = array();
		foreach ($citeproc->author as $a)
		{
			// clean up name
			$author = new stdclass;
			
			if (isset($a->literal))
			{
				if (preg_match('/^(?<lastname>.*),\s+(?<firstname>.*)$/Uu', $a->literal, $m))
				{
					$author->firstname = $m['firstname'];
					$author->lastname = $m['lastname'];
					$author->name = $author->firstname . ' ' . $author->lastname;
				}
				else
				{
					$author->name = $a->literal;
				}
			}
			else
			{
				if (isset($a->given))
				{			
					$author->firstname = $a->given;
					
					// Initials without space (try and catch long names that are all capitals by ignoring names > 3 characters)
					if (preg_match('/^[A-Z]+$/', $a->given) && (strlen($a->given) < 3))
					{
						$initials = str_split($a->given);
						$author->firstname = join(' ', $initials);						
					}					
					
					$author->firstname = preg_replace('/\.([A-Z])/Uu', ' $1', $author->firstname);
					$author->firstname = preg_replace('/\./Uu', '', $author->firstname);
					$author->firstname = mb_convert_case($author->firstname, MB_CASE_TITLE, 'UTF-8');
					$author->lastname = mb_convert_case($a->family, MB_CASE_TITLE, 'UTF-8');
					$author->name = $author->firstname . ' ' . $author->lastname;
				}
			}
			$reference->author[] = $author;
		}
	}
	//print_r($reference);exit();
	return $reference;
}

//--------------------------------------------------------------------------------------------------
function get_doi_metadata_unixref($doi, &$reference)
{
	global $config;
	
	$url = 'http://www.crossref.org/openurl?pid=r.page@bio.gla.ac.uk&rft_id=info:doi/' . $doi . '&noredirect=true&format=unixref';
	
	$xml = get($url);
	
	//echo $xml;
	
	//exit();
	
			
	if (preg_match('/<doi_record/', $xml))
	{	
		$have_issn = false;
	
	
		$dom= new DOMDocument;
		$dom->loadXML($xml);
		$xpath = new DOMXPath($dom);
		
		/*
		<journal_article publication_type="full_text">
          <titles>
            <title>MOLECULAR SYSTEMATICS AND HISTORICAL BIOGEOGRAPHY OF THE ROCK-THRUSHES (MUSCICAPIDAE: MONTICOLA)</title>
          </titles>
		*/
		$xpath_query = '//journal_article[@publication_type="full_text"]/titles/title';
		$nodeCollection = $xpath->query ($xpath_query);
		
		$title = '';
		
		foreach($nodeCollection as $node)
		{
			$children = $node->childNodes;
			foreach ($children as $child) 
			{
				$title = $node->ownerDocument->saveHTML($node);
			}
		}
		
		if ($title != '')
		{
			$reference->title = $title;
			$reference->title = strip_tags($title);
			$reference->title = preg_replace('/\s\s+/u', ' ', $reference->title);
			$reference->title = preg_replace('/^\s+/u', '', $reference->title);
			$reference->title = preg_replace('/\s+$/u', '', $reference->title);
			$reference->title = preg_replace('/\n/', '', $reference->title);
		}
		
		if (!isset($reference->title))
		{		
			$xpath_query = '//journal_article/titles/title';
			$nodeCollection = $xpath->query ($xpath_query);
			foreach($nodeCollection as $node)
			{
				if (!isset($reference->title))
				{
					$reference->title = $node->firstChild->nodeValue;
					$reference->title = preg_replace('/\s\s+/u', ' ', $reference->title);
					$reference->title = preg_replace('/^\s+/u', '', $reference->title);
					$reference->title = preg_replace('/\s+$/u', '', $reference->title);
					$reference->title = preg_replace('/\n/', '', $reference->title);
				}			
			}
		}
		
		if (isset($reference->title))
		{		
			$reference->title = strip_tags($reference->title);
		}
				

		// journal
		$xpath_query = '//journal/journal_metadata/full_title';
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			if (!isset($reference->journal))
			{
				$reference->journal = new stdclass;
			}
			$reference->journal->name = $node->firstChild->nodeValue;
		}

		$xpath_query = '//journal/journal_issue/journal_volume/volume';
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			$reference->journal->volume = $node->firstChild->nodeValue;
		}
		$xpath_query = '//journal/journal_issue/issue';
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			$reference->journal->issue = $node->firstChild->nodeValue;
		}
		$xpath_query = '//journal_article/pages/first_page';
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			$reference->journal->pages = $node->firstChild->nodeValue;
		}


		$xpath_query = '//journal_article/publication_date[@media_type="print"]/year';
		$nodeCollection = $xpath->query ($xpath_query);
		foreach($nodeCollection as $node)
		{
			$reference->year = $node->firstChild->nodeValue;
		}

		
		// authors
		if (!isset($reference->author))
		{
			$xpath_query = '//journal_article/contributors/person_name[@contributor_role="author"]';
			$nodeCollection = $xpath->query ($xpath_query);
			foreach($nodeCollection as $node)
			{
				$author = new stdclass;
				$nc = $xpath->query ('given_name', $node);
				foreach($nc as $n)
				{
					$author->firstname = $n->firstChild->nodeValue;
					$author->firstname = mb_convert_case($author->firstname, MB_CASE_TITLE, 'UTF-8');
				}
				$nc = $xpath->query ('surname', $node);
				foreach($nc as $n)
				{
					$author->lastname = $n->firstChild->nodeValue;
					$author->lastname = mb_convert_case($author->lastname, MB_CASE_TITLE, 'UTF-8');
				}
				$author->name = $author->firstname . ' ' . $author->lastname;
			
				$reference->author[] = $author;
			}
		
		}
		
		
		// DOI
		if (!isset($reference->identifier))
		{
			$identifier = new stdclass;
			$identifier->type = 'doi';
			$identifier->id = $doi;
			$reference->identifier[] = $identifier;
		}
		
		// ISSN		
		$xpath_query = '//journal/journal_metadata/issn[@media_type="print"]';
		$nodeCollection = $xpath->query ($xpath_query);
		
		foreach($nodeCollection as $node)
		{
			if (isset($reference->journal))
			{
				$identifier = new stdclass;
				$identifier->type = 'issn';
				$identifier->id = $node->firstChild->nodeValue;
				
				if (strlen($identifier->id) == 8)
				{
					$identifier->id = substr($identifier->id, 0, 4) . '-' . substr($identifier->id, 4);
				}				
				$reference->journal->identifier[] = $identifier;
				
				$have_issn = true;
			}
		}

		if (!$have_issn)
		{
			$xpath_query = '//journal/journal_metadata/issn[@media_type="electronic"]';
			$nodeCollection = $xpath->query ($xpath_query);
			
			foreach($nodeCollection as $node)
			{
				if (isset($reference->journal))
				{
					$identifier = new stdclass;
					$identifier->type = 'issn';
					$identifier->id = $node->firstChild->nodeValue;
					
					if (strlen($identifier->id) == 8)
					{
						$identifier->id = substr($identifier->id, 0, 4) . '-' . substr($identifier->id, 4);
					}				
					$reference->journal->identifier[] = $identifier;
					
					$have_issn = true;
				}
			}
		}	
	
	
	
	}
}

//--------------------------------------------------------------------------------------------------
// Use search API
function crossref_search(&$reference)
{
	global $config;
	
	$citation = '(' . $reference->year . ') ' . $reference->title . '. ' . $reference->journal->name . ', ' . $reference->journal->volume . ': ' . str_replace('--', '-', $reference->journal->pages);
	
	//echo "-- " . $citation . "\n";
		
	$post_data = array();
	$post_data[] = $citation;
	
	//print_r($post_data);
	
	$ch = curl_init(); 
	
	$url = 'http://search.labs.crossref.org/links';
	
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
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
	
	$response = curl_exec($ch);
	
	echo $response;
	
	$obj = json_decode($response);
	if (count($obj->results) == 1)
	{
		if ($obj->results[0]->match)
		{
			$match = false;
			
			$obj->results[0]->doi = str_replace('http://dx.doi.org/', '', $obj->results[0]->doi);
			
			$double_check = true;
			
			if ($double_check)
			{
				$threshold = 0.8;
				
				$j = '';
				$actual_reference = get_doi_metadata($obj->results[0]->doi, $j);
				if ($actual_reference)
				{
					$match = true;
					
					// criteria
					if (0)
					{
						echo '<pre>';
						print_r($actual_reference);
						echo '</pre>';
						echo '<pre>';
						print_r($reference);
						echo '</pre>';
					}
					
					$v1 = '';
					$v2  ='';
					
					if (isset($actual_reference->title) && isset($reference->title))
					{
					
						$v1 = finger_print($actual_reference->title);
						$v2 = finger_print($reference->title);
					}
					else
					{
						$v1 = reference_to_citation_string($actual_reference);
						$v2 = $reference->citation;
						
						$v1 = finger_print($v1);
						$v2 = finger_print($v2);					
					}
					
					if (($v1 != '') && ($v2 != ''))
					{
						//echo $v1 . '<br/>';
						//echo $v2 . '<br/>';
						
						$lcs = new LongestCommonSequence($v1, $v2);
						$d = $lcs->score();
						
						//echo $d;
						
						$score = min($d / strlen($v1), $d / strlen($v2));
						
						$reference->check_score = $score;
						
						if ($score >= $threshold)
						{
							// ok
						}
						else
						{
							$match = false;
						}
					}
				}
			}			
		
			if ($match)
			{
				$identifier = new stdclass;
				$identifier->type = 'doi';
				$identifier->id = $obj->results[0]->doi;
				$reference->identifier[] = $identifier;
			}
		}
	}
	
	//print_r($reference);
	
}


// test
if (0)
{
	$doi = '10.1073/pnas.0810821106';
	$doi = '10.1371/journal.pbio.1000056';
	$doi = '10.1016/j.ympev.2005.03.006';
	$doi = '10.1111/j.1365-294X.2005.02664.x';
	//$doi = '10.1073/pnas.0501840102';
	//$doi = '10.2307/3504042';
	//$doi = '10.1080/03014223.1979.10428344';
	//$doi = '10.4039/Ent58241-10';
	
	$doi = '10.5169/seals-168834'; // non-crossref but some metadata (!)
	get_doi_metadata($doi);
}
	

?>