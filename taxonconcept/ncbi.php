<?php

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');


// NCBI 
//--------------------------------------------------------------------------------------------------
$phylota_db = NewADOConnection('mysql');
$phylota_db->Connect("localhost", 
	'root', '', 'phylota');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


// get names

$namestring = 'Eleutherodactylus ridens';

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
WHERE ncbi_names.name_txt=' . $phylota_db->qstr($namestring)
. ' AND name_class IN ("scientific name", "synonym", "authority")' 
. ' AND division_id IN (1,2,5,6,10)';

echo $sql . "\n";

?>