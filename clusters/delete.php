<?php

// delete clusters with given name ids (i.e., if we have updated clusters we will be adding these back)

// update clusters

require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');

$ids = array(
4907606,
4907604,
4907603,
4925112,
4579818,
4560483,
4826507,
4586363,
4700633,
4662708,
4661746,
4651537,
5041202,
4612189,
4762783,
4565892,
4537611,
4946794,
4576051,
4914278,
5076912,
4941781,
4511606,
4655074,
4771488,
4835722,
4778203,
4534671,
5080430,
4836522,
4928085,
4870313,
4988101,
4863877,
4551405,
4866591,
4913658,
4584578,
4653977,
4770321,
4653789,
4770110,
4863631,
4604665,
4719518,
4601023,
4715802,
4563313,
4560720,
4549179,
4569736,
4625418,
4649928,
4571510,
4659732,
4927492,
4821175,
4547112,
4524514,
4937161
);

// Pan
$ids=array(
4363701,
4363705,
4363706,
4363707,
5084257
);

// Homo
$ids=array(
2974988,
93882
);

foreach ($ids as $id)
{
	$json = get('http://direct.bionames.org:5984/bionames/_design/taxonName/_view/name_id_to_cluster?key=%22urn:lsid:organismnames.com:name:' . $id . '%22');
	
	$obj = json_decode($json);
	
	print_r($obj);
	
	if (count($obj->rows) == 1)
	{	
		$cluster_id = $obj->rows[0]->value;
		
		echo $cluster_id . "\n";
		
		$couch->add_update_or_delete_document(null, $cluster_id, 'delete');		
	}
	
}

?>