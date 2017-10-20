<?php

require_once (dirname(__FILE__) . '/cluster.php');

if (1)
{

$ids=array(
5321517,
5321518);

	foreach ($ids as $id)
	{
		echo "$id\n";
		add_cluster_from_id($id);
	}
}
else
{


	$start = 5256965;
	$stop =  5262018;

	// adding mciroreferences to CouchDB - didn't do this first time around (sigh)
	$start = 5000000;
	$start = 5059853;
	$stop =  5200000;

	// reverse direction
	$start = 4900000;
	$start = 4908808;
	$stop =  5000000;

	$start = 4800000;
	$stop =  4900000;

	$start = 4600000;
	$stop =  4700000;

	$start = 4000000;
	$stop =  4600000;

	// to do
	$start = 3846007;
	$stop =  4000000;

	$start = 3000000;
	$start = 3165374;
	$start = 3236361;
	$start = 3293107;
	$start = 3300000;
	$start = 3350416;
	$stop =  3846007;

	$start = 2800000;
	$start = 2841232;
	$start = 2899958;
	$start = 2906962;
	$start = 2951867;
	$stop =  3000000;

	$start = 2500000;
	$start = 2772138;
	$stop  = 2800000;

	$start = 2300000;
	$stop  = 2500000;

	$start = 2290164;
	$stop  = 2300000;

	$start = 1800000;
	$stop  = 2000000;

	$start = 1600000;
	$start = 1683026;
	$start = 1686099;
	$start = 1755681;
	$start = 1773451;
	$stop  = 1800000;

	$start = 1400000;
	$stop = 1600000;
	$start = 1200000;
	$stop = 1400000;

	$start = 1000000;
	$start = 1010472;
	$start = 1012894;
	$start = 1073097;
	$start = 1161782;
	$start = 1177662;
	$stop  = 1200000;

	$start = 1178579;
	$stop  = 1200000;

	$start =  800000;
	$start =  857002;
	$start =  984064;
	$stop  = 1000000;

	$start =  663346;
	$start =  710536;
	$start = 734582;
	$start = 745256;

	$start = 523777;
	$stop  = 600000;

	$start = 1;
	$start =  31531;
	$start = 168649;
	$stop  = 200000;



	//$start = 4173592;
	//$stop =  4173593;

	$start  = 5304582;
	$start  = 5307345;
	$stop 	= 5316348;



	for ($id = $start; $id < $stop; $id++)
	{
		echo "$id\n";
		add_cluster_from_id($id);
	}

}

?>