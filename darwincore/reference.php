<?php

// handle reference

//--------------------------------------------------------------------------------------------------
$reference_fields = array(
	'_id' 		=> 'http://purl.org/dc/terms/identifier',
	'type' 		=> 'http://eol.org/schema/reference/publicationType',
	
	'citation_string' => 'http://eol.org/schema/reference/full_reference',
	
	'title' 	=> 'http://eol.org/schema/reference/primaryTitle',

	'secondary_title' 	=> 'http://purl.org/dc/terms/title',
	
	'issn' 		=> 'http://purl.org/ontology/bibo/issn',
	
	'volume' 	=> 'http://purl.org/ontology/bibo/volume',
	'issue' 	=> 'http://purl.org/ontology/bibo/issue',
	'pages' 	=> 'http://purl.org/ontology/bibo/pages',
	'spage' 	=> 'http://purl.org/ontology/bibo/pageStart',
	'epage' 	=> 'http://purl.org/ontology/bibo/pageEnd',
	
	'year' 		=> 'http://purl.org/dc/terms/created',
	
	// authors
	'authors'	=> 'http://purl.org/ontology/bibo/authorList',
	'editors'	=> 'http://purl.org/ontology/bibo/editorList',
	
	// Identifiers
	'url' 		=> 'http://purl.org/ontology/bibo/uri',
	'doi' 		=> 'http://purl.org/ontology/bibo/doi',
	'handle' 	=> 'http://purl.org/ontology/bibo/handle',
	'pmid' 		=> 'http://purl.org/ontology/bibo/pmid',
	'isbn10' 	=> 'http://purl.org/ontology/bibo/isbn10',
	'isbn13' 	=> 'http://purl.org/ontology/bibo/isbn13',
	'oclc' 		=> 'http://purl.org/ontology/bibo/oclcnum',
);

$reference_map = array(
	'_id'		=> 'ReferenceID',
	
	'type'		=> 'PublicationType',
	
	'citation_string' => 'FullReference',

	'title'		=> 'PrimaryTitle',
	
	'secondary_title' => 'SecondaryTitle',
	
	'issn' 		=> 'ISSN',
	'volume' 	=> 'Volume',
	'issue' 	=> 'Issue',
	'pages' 	=> 'Pages',
	'spage' 	=> 'PageStart',
	'epage' 	=> 'PageEnd',
	
	'year'		=> 'DateCreated',
	
	'authors'	=> 'AuthorList',
	'editors'	=> 'EditList',
	
	'url'		=> 'URI',
	'doi'		=> 'DOI',
	'handle' 	=> 'HANDLE',
	'pmid' 		=> 'PMID',
	'isbn10' 	=> 'ISBN10',
	'isbn13' 	=> 'ISBN13',
	'oclc'		=> 'OCLC',
);

function reference_from_sici($sici, &$values, $delimiter = "\t")
{
	global $reference_map;
	$map = $reference_map;


	$values = array();
	$url = 'http://bionames.org/bionames-api/id/' . $sici;
	
	if (1)
	{
		$json = get($url);
	}
	else
	{
	$json = '{
  "_id": "8758cbab41875d4bd3ede2bcdf019207",
  "_rev": "2-a7126b8c121dd6b779dda055818d8661",
  "type": "article",
  "provenance": {
    "mysql": {
      "id": "1811211",
      "modified": "2013-02-24 14:26:39"
    }
  },
  "citation_string": "Martin A Collins (2005) Opisthoteuthis borealis: a new species of cirrate octopod from Greenland waters. Journal of the Marine Biological Association of the United Kingdom, 85(6): 1475--1479",
  "title": "Opisthoteuthis borealis: a new species of cirrate octopod from Greenland waters",
  "journal": {
    "name": "Journal of the Marine Biological Association of the United Kingdom",
    "volume": "85",
    "issue": "6",
    "pages": "1475--1479",
    "identifier": [
      {
        "id": "0025-3154",
        "type": "issn"
      }
    ]
  },
  "year": "2005",
  "identifier": [
    {
      "type": "doi",
      "id": "10.1017\/S002531540501266X"
    }
  ],
  "author": [
    {
      "firstname": "Martin A",
      "lastname": "Collins",
      "name": "Martin A Collins"
    }
  ],
  "publisher": "Cambridge University Press",
  "status": 200
}';

$json='{
  "_id": "0081c63751f08ed7de06882f8ffdfedd",
  "_rev": "2-0c2a8f433893129585ab1185f1edb403",
  "type": "chapter",
  "provenance": {
    "mysql": {
      "id": "820931",
      "modified": "2013-05-17 16:05:28"
    }
  },
  "citation_string": "Further notes on the Isopoda Bopyridae of Hong Kong. Morton, B.[Ed]. The marine flora and fauna of Hong Kong and southern China 2. Volume 2. Taxonomy and ecology., Hong Kong University Press, Hong Kong, 1990: i-x, 449-942. Chapter pagination: 555-566.",
  "title": "Further notes on the Isopoda Bopyridae of Hong Kong",
  "year": "1990",
  "book": {
    "title": "The marine flora and fauna of Hong Kong and southern China 2",
    "pages": "555--566",
    "identifier": [
      {
        "type": "googleBooks",
        "id": "-YtPJ94PeisC"
      },
      {
        "type": "isbn",
        "id": "9622092535"
      }
    ]
  },
  "status": 200
}';

}
	
	//echo $json;
	
	$reference = json_decode($json);
	
	// export...
	
	$uri = '';
	
	foreach ($reference as $k => $v)
	{
		
		
		switch ($k)
		{
			case 'citation_string':
				// need to add this only if not parsed
				
				if (!isset($reference->journal) && !isset($reference->title) && !isset($reference->pages))
				{
					$values[$map['citation_string']] = $v;
				}
				break;
		
			case 'author':
				$authors = array();
				foreach ($reference->author as $author)
				{
					if (isset($author->lastname) && isset($author->firstname))
					{
						$a = $author->lastname . ', ' . $author->firstname;
						$authors[] = $a;
					}
				}
				$values[$map['authors']] = join(';', $authors);
				break;
		
			case 'book':
				if (isset($reference->book->identifier))
				{
					foreach ($reference->book->identifier as $identifier)
					{
						switch ($identifier->type)
						{
							case 'isbn':
								if (strlen($identifier->id) == 10)
								{
									$values[$map['isbn10']] = $identifier->id;
								}
								if (strlen($identifier->id) == 13)
								{
									$values[$map['isbn13']] = $identifier->id;
								}
								break;
								
							default:
								if (isset($map[$identifier->type]))
								{
									$values[$map[$identifier->type]] = $identifier->id;
								}
								break;
						}
					}
				}
				
				if (isset($reference->book->title))
				{
					$values[$map['secondary_title']] = $reference->book->title;
				}				
				
				if (isset($reference->book->pages))
				{
					$values[$map['pages']] = str_replace('--', '-', $reference->book->pages);
					if (preg_match('/(?<spage>.*)--(?<epage>.*)$/', $reference->book->pages, $m))
					{
						$values[$map['spage']] = $m['spage'];
						$values[$map['epage']] = $m['epage'];
					}
				}
				break;
		
		
			case 'journal':
			
				if (isset($reference->journal->identifier))
				{
					foreach ($reference->journal->identifier as $identifier)
					{
						if (isset($map[$identifier->type]))
						{
							$values[$map[$identifier->type]] = $identifier->id;
						}						
					}
				}
				
				foreach ($reference->journal as $jk => $jv)
				{				
					if (isset($map[$jk]))
					{
						switch ($jk)
						{
							case 'pages':
								$values[$map[$jk]] = str_replace('--', '-', $jv);
								if (preg_match('/(?<spage>.*)--(?<epage>.*)$/', $jv, $m))
								{
									$values[$map['spage']] = $m['spage'];
									$values[$map['epage']] = $m['epage'];
								}
								break;
							
							default:
								$values[$map[$jk]] = $jv;
								break;
						}							
					}
					else
					{
						// Journal name
						if ($jk == 'name')
						{
							$values[$map['secondary_title']] = $jv;
						}												
					}
				}
				break;
				
			case 'identifier':
				foreach ($reference->identifier as $identifier)
				{
					switch ($identifier->type)
					{
						case 'isbn':
							if (strlen($identifier->id) == 10)
							{
								$values[$map['isbn10']] = $identifier->id;
							}
							if (strlen($identifier->id) == 13)
							{
								$values[$map['isbn13']] = $identifier->id;
							}
							break;
							
						case 'biostor':
							$uri = 'http://biostor.org/reference/' . $identifier->id;
							break;

						case 'cinii':
							$uri = 'http://ci.nii.ac.jp/naid/' . $identifier->id;
							break;
							
						case 'jstor':
							$uri = 'http://www.jstor.org/stable/' . $identifier->id;
							break;
								
							
						default:
							if (isset($map[$identifier->type]))
							{
								$values[$map[$identifier->type]] = $identifier->id;
							}
							break;
					}
				}
				break;				

			case 'link':
				foreach ($reference->link as $link)
				{
					switch ($link->anchor)
					{
						case 'LINK':
							if ($uri == '')
							{
								$uri = $link->url;
							}
							break;
													
						default:
							break;
					}
				}
				break;	
				
			case 'year':
				if (!isset($reference->journal) && !isset($reference->title) && !isset($reference->pages))
				{					
				}
				else
				{
					$values[$map[$k]] = $v;
				}
				break;
			
			
			
			default:
				if (isset($map[$k]))
				{
					$values[$map[$k]] = $v;
				}
				break;
		}
	}
	
	if ($uri != '')
	{
		$values[$map['url']] = $uri;
	}
	
	
	return $reference;

}


//--------------------------------------------------------------------------------------------------
// Get "best" URI for a reference
function best_uri($reference)
{
	$uri = '';	
	
	foreach ($reference as $k => $v)
	{
		switch ($k)
		{
			case 'identifier':
				foreach ($reference->identifier as $identifier)
				{
					switch ($identifier->type)
					{
						case 'doi':
							$uri = 'http://dx.doi.org/' . $identifier->id;
							break;
							
						case 'handle':
							if ($uri == '')
							{
								$uri = 'http://hdl.handle.net/' . $identifier->id;
							}
							break;
							
						case 'biostor':
							if ($uri == '')
							{
								$uri = 'http://biostor.org/reference/' . $identifier->id;
							}
							break;
	
						case 'jstor':
							if ($uri == '')
							{
								$uri = 'http://www.jstor.org/stable/' . $identifier->id;
							}
							break;
	
						case 'cinii':
							if ($uri == '')
							{
								$uri = 'http://ci.nii.ac.jp/naid/' . $identifier->id;
							}
							break;
							
						default:
							break;
					}
				}
				break;
				
			case 'year':
				$year = $v;
				break;
						
			default:
				break;				
		}
	}
	if ($uri == '')
	{
		$uri = '';		
		foreach ($reference as $k => $v)
		{
			switch ($k)
			{
				case 'link':
					foreach ($reference->link as $link)
					{
						if ($link->anchor == 'URL')
						{
							$uri = $link->url;
						}
					}
					break;
				default:
					break;
			}
		}
	}
	
	return $uri;
}

?>