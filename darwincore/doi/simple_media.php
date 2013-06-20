<?php

// Create references dump for Darwin Core Archive from MySQL

error_reporting(E_ALL);

require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
$media_fields = array(
	'MediaID' => 'http://purl.org/dc/terms/identifier',
	'TaxonID' => 'http://rs.tdwg.org/dwc/terms/taxonID',
	
	'Type' => 'http://purl.org/dc/terms/type',
	
	'Subject' => 'http://iptc.org/std/Iptc4xmpExt/1.0/xmlns/CVterm',

	'Rating' => 'http://ns.adobe.com/xap/1.0/Rating',
	'Audience' => 'http://purl.org/dc/terms/audience',

	'Title' => 'http://purl.org/dc/terms/title',
	'Description' => 'http://purl.org/dc/terms/description',
	'CreateDate' => 'http://ns.adobe.com/xap/1.0/CreateDate',
	
	'BibliographicCitation' => 'http://purl.org/dc/terms/bibliographicCitation',
	
	
	'AccessURI' => 'http://rs.tdwg.org/ac/terms/accessURI',
	
	// Id for reference 
	'ReferenceID' => 'http://eol.org/schema/reference/referenceID'
	
	
);

$media_map = array(
	'id'			=> 'MediaID',
	
	'taxonId'		=> 'TaxonID',
	
	'type' 			=> 'Type', 
	
	'subject'		=> 'Subject',
	
	'rating'		=> 'Rating',
	'audience'		=> 'Audience',
	
	'title'			=> 'Title',
	'description' 	=> 'Description', // text description that this is original publication
	'year'			=> 'CreateDate', // year of publication

	'citation' 		=> 'BibliographicCitation',
	'url'			=> 'AccessURI',
	'sici' 		=> 'ReferenceID' // local id of publication

);

$db = NewADOConnection('mysql');
$db->Connect("localhost", 
'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$delimiter = "\t";

echo join($delimiter, $media_map) . "\n";

// list of references to process
$filename = 'ids.txt';

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$id = trim(fgets($file_handle));
	
	// get row
	$sql = 'SELECT * FROM names WHERE id= ' . $id . ' LIMIT 1';
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

	if ($result->NumRows() == 1)
	{
		$values = array();
			
		$values[$media_map['id']] 			= $id;
		$values[$media_map['taxonId']] 		= 'urn:lsid:organismnames.com:name:' . $id;
		$values[$media_map['type']] 		= 'http://purl.org/dc/dcmitype/Text';
		$values[$media_map['subject']] 		= 'http://eol.org/schema/eol_info_items.xml#Taxonomy';

		$values[$media_map['rating']] 		= 4; // I think it's pretty good
		$values[$media_map['audience']] 	= 'Expert';
		
		$uri = '';
		// get "best" uri
		
		if ($uri == '')
		{
			if (isset($result->fields['doi']))
			{
				$uri = 'http://dx.doi.org/' . $result->fields['doi'];
			}
		}
		if ($uri == '')
		{
			if (isset($result->fields['handle']))
			{
				$uri = 'http://hdl.handle.net/' . $result->fields['handle'];
			}
		}
		if ($uri == '')
		{
			if (isset($result->fields['biostor']))
			{
				$uri = 'http://biostor.org/reference/' . $result->fields['biostor'];
			}
		}
		if ($uri == '')
		{
			if (isset($result->fields['jstor']))
			{
				$uri = 'http://www.jstor.org/stable/' . $result->fields['jstor'];
			}
		}
		if ($uri == '')
		{
			if (isset($result->fields['url']))
			{
				$uri = $result->fields['url'];
			}
		}

		$description = 'Original description of "';
		
		if (isset($result->fields['rank']))
		{
			switch ($result->fields['rank'])
			{
				case 'species':
				case 'subspecies':
				case 'genus':
				case 'subgenus':
					$description .= '<i>' . $result->fields['nameComplete'] . '</i>';
					break;
					
				default:
					$description .= $result->fields['nameComplete']  . '"';
					break;
			}
		}
		else
		{
			$description .= $result->fields['nameComplete'] ;
		}
		$description .=  '"';
		if ($uri != '')
		{
			$description .= ' published in ' . $uri;
		}
		$description .= '.';
	
		
		$values[$media_map['description']] = $description;

		// reference details
		if (isset($result->fields['title']))
		{
			$values[$media_map['title']] = $result->fields['title'];
		}
		
		if (isset($result->fields['publication']))
		{
			$publication = $result->fields['publication'];
			$publication = str_replace("\n", '', $publication);
			$publication = str_replace("\r", '', $publication);
			if (preg_match('/\.\s+(.?\w+\]?)?,?\s*\[Zoological Record(.*)\]$/', $publication))
			{
				// clean
				$publication = preg_replace('/\.\s+(.?\w+\]?),??\s*\[Zoological Record(.*)\]$/', '', $publication);
			}
			
			// last ditch clean up
			$publication = preg_replace('/\.\s+\[Zoological Record(.*)\]$/', '', $publication);
			$values[$media_map['citation']] = $publication;
		}				
		
		if ($result->fields['year'])
		{
			$values[$media_map['year']] = $result->fields['year'];
		}
		
		
		if ($uri != '')
		{
			$values[$media_map['url']] = $uri;
		}
		

		$values[$media_map['sici']] = $result->fields['sici'];



		// Dump
		
			
		$output = '';
		$first = true;
		foreach ($media_map as $key => $value)
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
