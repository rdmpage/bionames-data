<?php

// Create Darwin Core Archive

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(__FILE__) . '/reference.php');


$delimiter = "\t";

$reference_filename 	= 'references.tsv';
$media_filename 		= 'media.tsv';
$taxon_filename 		= 'taxa.tsv';

//--------------------------------------------------------------------------------------------------
function get_clusters_for_sici($sici)
{
	global $couch;
	
	$db = NewADOConnection('mysql');
	$db->Connect("localhost", 
	'root' , '' , 'ion');

	// Ensure fields are (only) indexed by column name
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

	$cluster_ids = array();
	
	$sql = 'SELECT id, nameComplete, rank FROM names WHERE sici= ' . $db->qstr($sici);
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

	while (!$result->EOF) 
	{
		$cluster = new stdclass;
		$cluster->nameComplete = $result->fields['nameComplete'];
		if ($result->fields['rank'])
		{
			$cluster->rank = $result->fields['rank'];
		}
		$cluster_ids[$result->fields['id']] = $cluster;
		$result->MoveNext();
	}
	
	return $cluster_ids;
}



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

//--------------------------------------------------------------------------------------------------
$taxon_fields = array(
	'TaxonID' => 'http://rs.tdwg.org/dwc/terms/taxonID',
	'ScientificName' => 'http://rs.tdwg.org/dwc/terms/scientificName',
	'TaxonRank' => 'http://rs.tdwg.org/dwc/terms/taxonRank',
	'ReferenceID' => 'http://eol.org/schema/reference/referenceID'
);

$taxon_map = array(
	'id'			=> 'TaxonID',
	'nameComplete'	=> 'ScientificName',
	'rank'			=> 'TaxonRank',
	'sici' 			=> 'ReferenceID' // local id of publication
);

//--------------------------------------------------------------------------------------------------


// Generate metadata

$metadata = new DomDocument('1.0', 'UTF-8');
$archive = $metadata->appendChild($metadata->createElement('archive'));
$archive->setAttribute('xmlns', 	'http://rs.tdwg.org/dwc/text/');
$archive->setAttribute('xmlns:xsi', 	'http://www.w3.org/2001/XMLSchema-instance');
$archive->setAttribute('xsi:schemaLocation', 'http://rs.tdwg.org/dwc/text/  http://rs.tdwg.org/dwc/text/tdwg_dwc_text.xsd');

// taxa
$core = $archive->appendChild($metadata->createElement('core'));

$core->setAttribute('encoding', 			'UTF-8');
$core->setAttribute('fieldsTerminatedBy', 	'\t');
$core->setAttribute('linesTerminatedBy', 	'\n');
$core->setAttribute('ignoreHeaderLines',  	'1');
$core->setAttribute('rowType',  			'http://rs.tdwg.org/dwc/terms/Taxon');

$files = $core->appendChild($metadata->createElement('files'));
$location = $files->appendChild($metadata->createElement('location'));
$location->appendChild($metadata->createTextNode($taxon_filename));

$id = $core->appendChild($metadata->createElement('id'));
$id->setAttribute('index', 	'0');

$index = 0;
foreach ($taxon_fields as $key => $namespace)
{
	$field = $core->appendChild($metadata->createElement('field'));
	$field->setAttribute('index', 	$index++);
	$field->setAttribute('term', 	$namespace);
}

// references

$extension = $archive->appendChild($metadata->createElement('extension'));

$extension->setAttribute('encoding', 			'UTF-8');
$extension->setAttribute('fieldsTerminatedBy', 	'\t');
$extension->setAttribute('linesTerminatedBy', 	'\n');
$extension->setAttribute('ignoreHeaderLines',  	'1');
$extension->setAttribute('rowType',  			'http://eol.org/schema/reference/Reference');

$files = $extension->appendChild($metadata->createElement('files'));
$location = $files->appendChild($metadata->createElement('location'));
$location->appendChild($metadata->createTextNode($reference_filename));

$coreid = $extension->appendChild($metadata->createElement('coreid'));
$coreid->setAttribute('index', 	'0');

$index = 0;
foreach ($reference_fields as $key => $namespace)
{
	$field = $extension->appendChild($metadata->createElement('field'));
	$field->setAttribute('index', 	$index++);
	$field->setAttribute('term', 	$namespace);
}

// media

$extension = $archive->appendChild($metadata->createElement('extension'));

$extension->setAttribute('encoding', 			'UTF-8');
$extension->setAttribute('fieldsTerminatedBy', 	'\t');
$extension->setAttribute('linesTerminatedBy', 	'\n');
$extension->setAttribute('ignoreHeaderLines',  	'1');
$extension->setAttribute('rowType',  			'http://eol.org/schema/media/Document');


$files = $extension->appendChild($metadata->createElement('files'));
$location = $files->appendChild($metadata->createElement('location'));
$location->appendChild($metadata->createTextNode($media_filename));
		

$coreid = $extension->appendChild($metadata->createElement('coreid'));
$coreid->setAttribute('index', 	'1'); // index of taxon id

$index = 0;
foreach ($media_fields as $key => $namespace)
{
	$field = $extension->appendChild($metadata->createElement('field'));
	$field->setAttribute('index', 	$index++);
	$field->setAttribute('term', 	$namespace);
}


file_put_contents('meta.xml', $metadata->saveXML());

// output files
file_put_contents($reference_filename, join($delimiter, $reference_map) . "\n");
file_put_contents($media_filename, join($delimiter, $media_map) . "\n");
file_put_contents($taxon_filename, join($delimiter, $taxon_map) . "\n");

// Now generate dump


// list of references to process
$filename = 'sici.txt';

$file_handle = fopen($filename, "r");

while (!feof($file_handle)) 
{
	$sici = trim(fgets($file_handle));
	
	// Taxon names
	$cluster_ids = get_clusters_for_sici($sici);	
	
	echo "$sici\n";
	
	// Reference
	$reference_values = array();
	$reference = reference_from_sici($sici, $reference_values, $delimiter);
	
	$output = '';
	$first = true;
	foreach ($reference_map as $key => $value)
	{
		if (!$first) { $output .= $delimiter;  }
		$first = false;
		if (isset($reference_values[$value]))
		{
			$output .=  $reference_values[$value];
		}
	}
	$output .= "\n";	
	file_put_contents($reference_filename, $output, FILE_APPEND);
	
	// Link to taxa (media)
	
	foreach ($cluster_ids as $id => $cluster)
	{
		// taxa
		$values = array();
		
		$values[$taxon_map['id']] 			= 'urn:lsid:organismnames.com:name:' . $id;
		$values[$taxon_map['nameComplete']] = $cluster->nameComplete;
		if (isset($cluster->rank))
		{
			$values[$taxon_map['rank']] = $cluster->rank;
		}
		$values[$taxon_map['sici']] 		= $sici;
		
		$output = '';
		$first = true;
		foreach ($taxon_map as $key => $value)
		{
			if (!$first) { $output .= $delimiter;  }
			$first = false;
			if (isset($values[$value]))
			{
				$output .=  $values[$value];
			}
		}
		$output .= "\n";			
		file_put_contents($taxon_filename, $output, FILE_APPEND);


		// media (link names to references)
			$values = array();
			
			$values[$media_map['id']] 			= $id;
			$values[$media_map['taxonId']] 		= 'urn:lsid:organismnames.com:name:' . $id;
			$values[$media_map['type']] 		= 'http://purl.org/dc/dcmitype/Text';
			$values[$media_map['subject']] 		= 'http://eol.org/schema/eol_info_items.xml#Taxonomy';
	
			$values[$media_map['rating']] 		= 4; // I think it's pretty good
			$values[$media_map['audience']] 	= 'Expert';
	
			$description = 'Original description of "';
			
			if (isset($cluster->rank))
			{
				switch ($cluster->rank)
				{
					case 'species':
					case 'subspecies':
					case 'genus':
					case 'subgenus':
						$description .= '<i>' . $cluster->nameComplete . '</i>';
						break;
						
					default:
						$description .= $cluster->nameComplete . '"';
						break;
				}
			}
			else
			{
				$description .= $cluster->nameComplete;
			}
			$description .=  '"';
			$uri = best_uri($reference);
			if ($uri != '')
			{
				$description .= ' published in ' . $uri;
			}
			$description .= '.';
			$values[$media_map['description']] = $description;
			
			// reference details
			if (isset($reference->title))
			{
				$values[$media_map['title']] = $reference->title;
			}

			if (isset($reference->citation_string))
			{
				$values[$media_map['citation']] = str_replace('--', '-', $reference->citation_string);
			}
			
			if (isset($reference->year))
			{
				$values[$media_map['year']] = $reference->year;
			}
			
			if ($uri != '')
			{
				$values[$media_map['url']] = $uri;
			}
	
			$values[$media_map['sici']] 		= $sici;
			
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
			file_put_contents($media_filename, $output, FILE_APPEND);
			
			//echo $uri . "\n";
			//print_r($values);
		
	
	
	}
	
	
	
	
}




?>
