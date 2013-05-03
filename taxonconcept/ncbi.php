<?php

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib/taxon_name_parser.php');

//--------------------------------------------------------------------------------------------------
function p(&$o)
{
	$taxon_parser = new Parser();
	$parsed = $taxon_parser->parse($o->scientificName);

	if ($parsed->scientificName->parsed)
	{
		$o->canonicalName = $parsed->scientificName->canonical;
		
		foreach ($parsed->scientificName->details as $details)
		{
			foreach ($details as $k => $v)
			{
				if (isset($v->authorship))
				{
					$o->author = $v->authorship;
				}
			}
		}
			
	}
}


// NCBI 
//--------------------------------------------------------------------------------------------------
function get_ncbi_names($namestring)
{
	
	$ncbi_db = NewADOConnection('mysql');
	$ncbi_db->Connect("localhost", 
		'root', '', 'phylota');
	
	// Ensure fields are (only) indexed by column name
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	
	$concepts = null;
	
	
	// get names
	
	//$namestring = 'Eleutherodactylus ridens';
	
	/*
	0	|	BCT	|	Bacteria	|		|
	1	|	INV	|	Invertebrates	|		|
	2	|	MAM	|	Mammals	|		|
	3	|	PHG	|	Phages	|		|
	4	|	PLN	|	Plants	|		|
	5	|	PRI	|	Primates	|		|
	6	|	ROD	|	Rodents	|		|
	7	|	SYN	|	Synthetic	|		|
	8	|	UNA	|	Unassigned	|	No species nodes should inherit this division assignment	|
	9	|	VRL	|	Viruses	|		|
	10	|	VRT	|	Vertebrates	|		|
	11	|	ENV	|	Environmental samples	|	Anonymous sequences cloned directly from the environment	|
	*/
	
	// Get animal names that match this string
	
	$sql = 'SELECT * FROM ncbi_names 
	INNER JOIN ncbi_nodes USING(tax_id) 
	WHERE ncbi_names.name_txt=' . $ncbi_db->qstr($namestring)
	. ' AND name_class IN ("scientific name", "synonym", "authority", "equivalent name", "genbank synonym", "misspelling", "unpublished name")' 
	. ' AND division_id IN (1,2,5,6,10)';
	
	echo $sql . "\n";
	
	$result = $ncbi_db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql . ' ' . $ncbi_db->ErrorMsg());

	while (!$result->EOF) 
	{
		$concept = new stdclass;
		$concept->id = 'ncbi' . $result->fields['tax_id'];
		
		$concept->nameAccordingTo = 'NCBI';
		$concept->sourceIdentifier = $result->fields['tax_id'];
		$concept->scientificName = $result->fields['name_txt'];
		$concept->taxonRank = $result->fields['rank'];
		
		p($concept);
		
		$concepts[] = $concept;
		
		$result->MoveNext();
	}
	
	print_r($concepts);
	
	return $concepts;
	
	
}

/*
$namestring = 'Myotis alticraniatus';
//$namestring = 'Diplura';

get_ncbi_names($namestring);

*/

?>