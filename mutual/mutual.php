<?php

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');


function get_name_count($namestring)
{
	global $couch;
	global $config;
	
	$url = '_design/datamining/_view/names_pages_count?key=' . urlencode(json_encode($namestring)) . '&stale=ok';
	
	//echo $url . "\n";

	$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/" . $url);
	
	$obj = json_decode($resp);
	
	$n = 0;
	if (isset($obj->rows))
	{
		$n = $obj->rows[0]->value;
	}
	
	return $n;
}



function get_name_group($namestring)
{

}

$num_bhl_pages = 551318;

$name_counts = array();
$co_occur = array();


$name = 'Rhacophorus emembranatus';
$name = 'Philautus emembranatus';
//$name = 'Pelturagonia cephalum';
//$name = 'Theloderma leprosa';
//$name = 'Hyla leprosa';
//$name = 'Myophthiria neocaledonica';
//$name = 'Megalophrys feae';
//$name = 'Ixalus lateralis';
//$name = 'Megophrys lateralis';
//$name = 'Brachytarsophrys feae';
//$name = 'Raorchestes';
$name = 'Potamotrygon';
//$name = 'Paraheteronchocotyle amazonensis';
//$name = 'Potamotrygon circularis';

//$name = 'Isocyamus'; // whale louse
//$name = 'Dennyus';

//$name = 'Philautus emembranatus';

//$name = 'Hyla leprosa';

//$name = 'Aerodramus';
//$name = 'Calcarmyobia miniopteris';

$name_counts[$namestring] = get_name_count($name);
$co_occur=array();

$url = '_design/datamining/_view/names_pages?key=' . urlencode(json_encode($name)) . '&stale=ok';

$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/" . $url);
var_dump($resp);

$obj = json_decode($resp);

$one_pages = array();

foreach ($obj->rows as $row)
{
	$one_pages[] = $row->value;
}

//print_r($one_pages);

// now get other names on these pages

foreach ($one_pages as $PageID)
{
	$url = '_design/datamining/_view/pages_names?key=' . $PageID . '&stale=ok';

	$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/" . $url);
	//var_dump($resp);

	$obj = json_decode($resp);
	
	foreach ($obj->rows as $row)
	{
		$namestring = $row->value;
		//echo $namestring;
		
		if (!isset($name_counts[$namestring]))
		{
			$name_counts[$namestring] = get_name_count($namestring);
		}
		
		if (!isset($co_occur[$namestring]))
		{
			$co_occur[$namestring] = 0;
		}
		$co_occur[$namestring]++;
		
		//echo "\n";
	}
	
	print_r($name_counts);

}

print_r($co_occur);

foreach ($co_occur as $k => $v)
{
	$px = $name_counts[$name] / $num_bhl_pages;
	$py = $name_counts[$k] / $num_bhl_pages;
	
	$pxy = $v / $num_bhl_pages;
	
	$I = log($pxy/($px * $py), 2);


	//echo $px . ' ' . $py . ' ' . $pxy . "\n";

	echo $name_counts[$name] . ' ' . $name_counts[$k] . ' ' . $v . ' ' . $I . ' ' . $k . "\n";
}



?>