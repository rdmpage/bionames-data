<?php

// CrossRef functions

require_once (dirname(dirname(__FILE__)) . '/lib.php');

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

function get_doi_metadata($doi)
{
	$reference = null;
	
	$url = 'http://dx.doi.org/' . $doi;
	$json = get($url, '', "application/citeproc+json;q=1.0");
	
	//echo $url;
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