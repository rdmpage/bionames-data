<?php

// Create references dump for Darwin Core Archive from MySQL

error_reporting(E_ALL);

require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

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

$db = NewADOConnection('mysql');
$db->Connect("localhost", 
'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$delimiter = "\t";

echo join($delimiter, $reference_map) . "\n";

// list of references to process
$filename = 'sici-test.txt';
$filename = 'all_md5.txt';
//$filename = 'sici-test.txt';

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$sici = trim(fgets($file_handle));
	
	// get row
	$sql = 'SELECT * FROM names WHERE sici= ' . $db->qstr($sici) . ' LIMIT 1';
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

	if ($result->NumRows() == 1)
	{
		$values = array();
		foreach ($result->fields as $k => $v)
		{
			if ($v != '')
			{
			switch ($k)
			{
				case 'publication':
					$publication = $v;
					$publication = str_replace("\n", '', $publication);
					$publication = str_replace("\r", '', $publication);
					if (preg_match('/\.\s+(.?\w+\]?)?,?\s*\[Zoological Record(.*)\]$/', $publication))
					{
						// clean
						$publication = preg_replace('/\.\s+(.?\w+\]?),??\s*\[Zoological Record(.*)\]$/', '', $publication);
					}
					
					// last ditch clean up
					$publication = preg_replace('/\.\s+\[Zoological Record(.*)\]$/', '', $publication);
					$values[$reference_map['citation_string']] = $publication;
					break;
					
				case 'sici':
					$values[$reference_map['_id']] = $v;
					break;
					
				case 'biostor':
					if ($v != '')
					{
						$values[$reference_map['url']] = 'http://biostor.org/reference/' . $v;
					}
					break;
					
				case 'url':
					if (!isset($reference_map['url']))
					{
						$values[$reference_map['url']] = $url;
					}
					break;

				case 'journal':
					$values[$reference_map['secondary_title']] = $v;					
					if ($result->fields['isPartOf'] == 'Y')
					{
						$values[$reference_map['type']] = 'chapter';
					}
					else
					{
						$values[$reference_map['type']] = 'article';
					}
					break;
					
				case 'isbn':
					if (strlen($v) == 10)
					{
						$values[$reference_map['isbn10']] = $v;
					}
					if (strlen($v) == 13)
					{
						$values[$reference_map['isbn13']] = $v;
					}
					if ($result->fields['isPartOf'] == 'Y')
					{
						$values[$reference_map['type']] = 'chapter';
					}
					else
					{
						if (isset($result->fields['issn']))
						{
							$values[$reference_map['type']] = 'article';
						}
						else
						{
							$values[$reference_map['type']] = 'book';
						}
					}
					
					break;
					
				default:				
					if (isset($reference_map[$k]))
					{
						$values[$reference_map[$k]] = $v;
					}
				break;
			}
			}
		}
		
		$output = '';
		$first = true;
		foreach ($reference_map as $key => $value)
		{
			if (!$first) { $output .= $delimiter;  }
			$first = false;
			if (isset($values[$value]))
			{
				$output .=  $values[$value];
			}
		}
		$output .= "\n";			
		echo $output;

	}
	
}

?>
