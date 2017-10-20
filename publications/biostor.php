<?php

// BioStor-specific code

require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(__FILE__) . '/reference.php');

function biostor_enhance (&$reference, $biostor_id)
{
	// Get BioStor-specific JSON
	
	if ($biostor_id == 151283)
	{
		$json = file_get_contents(dirname(__FILE__) . '/151283.json');
	}
	else
	{	
		$url = 'http://direct.biostor.org/reference/' . $biostor_id . '.json';
		$json = get($url);
	}

	if ($json != '')
	{				
		$obj = json_decode($json);
		
		$biostor = new stdclass;
		$biostor->time = date(DATE_ISO8601, time());
		$biostor->url = $url;
		$reference->provenance['biostor'] = $biostor;
		
		$reference->thumbnail = $obj->thumbnails[0];	
		
		//print_r($obj);
		
		// title
		$reference->title = $obj->title;
		
		// pagination
		if (isset($reference->journal) && !isset($reference->journal->pages))
		{
			if (isset($obj->pages))
			{
				$reference->journal->pages = str_replace('-', '--', $obj->pages);
			}
		}
		
		// authors
		if (isset($obj->authors) && !isset($reference->author))
		{
			foreach ($obj->authors as $author)
			{
				$a = new stdclass;
				$a->name = '';
				if (isset($author->forename))
				{
					$a->firstname = $author->forename;
					$a->name .= $a->firstname;
				}
				if (isset($author->surname))
				{
					$a->lastname = $author->surname;
					if ($a->name != '')
					{
						$a->name .= ' ';
					}
					$a->name .= $a->lastname;
				}
				$reference->author[] = $a;
			}
		}
		
		// untested
		// Get any additional identifiers from BioStor (e.g., DOIs)
		foreach ($obj->identifiers as $k => $v)
		{
			switch ($k)
			{
				case 'doi':
					$have_doi = false;
					foreach ($reference->identifier as $id)
					{
						if ($id->type == 'doi')
						{
							$have_doi = true;
						}
					}
					if (!$have_doi)
					{
						$x = new stdclass;
						$x->type = 'doi';
						$x->id = $v;
						
						$reference->identifier[] = $x;
					}								
					break;
					
				case 'zoobank':
					$have_lsid = false;
					foreach ($reference->identifier as $id)
					{
						if ($id->type == 'zoobank')
						{
							$have_lsid = true;
						}
					}
					if (!$have_lsid)
					{
						$x = new stdclass;
						$x->type = 'zoobank';
						$x->id = $v;
						
						$reference->identifier[] = $x;
					}								
					break;
					
					
				default:
					break;
			}
		}
		
		// BHL pages
		if (isset($obj->bhl_pages))
		{
			$reference->bhl_pages = $obj->bhl_pages;
		}
		
		// geo
		if (isset($obj->geometry) && !isset($reference->geometry))
		{
			$reference->geometry = $obj->geometry;
		}
		
		// taxon names
		if (isset($obj->names))
		{
			$reference->names = $obj->names;
		}
		
		// specimens
					
	}
}

?>
