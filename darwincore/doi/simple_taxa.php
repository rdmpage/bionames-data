<?php

// Create references dump for Darwin Core Archive from MySQL

error_reporting(E_ALL);

require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

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


$db = NewADOConnection('mysql');
$db->Connect("localhost", 
'root' , '' , 'ion');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$delimiter = "\t";

echo join($delimiter, $taxon_map) . "\n";

// list of taxa to process
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
			
		$values[$taxon_map['id']] 			= 'urn:lsid:organismnames.com:name:' . $id;
		$values[$taxon_map['nameComplete']] = $result->fields['nameComplete'];
		if (isset($result->fields['rank']))
		{
			$values[$taxon_map['rank']] = $result->fields['rank'];
		}
		if (isset($result->fields['sici']))
		{
			$values[$taxon_map['sici']] = $result->fields['sici'];
		}

		// Dump
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
		echo $output;

	}
	
}

?>
