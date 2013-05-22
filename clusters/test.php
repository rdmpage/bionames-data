<?php

require_once (dirname(__FILE__) . '/cluster.php');

$cluster_id = 2648172; // Pegohyperia princeps
$cluster_id = 580165; // Diplura
//$cluster_id = 27586; // Acanthobothrium
//$cluster_id = 50691; // Hyperiidae
//$cluster_id = 182937;
//$cluster_id = 21800; // Rhacophorus

//$cluster_id = 238719; // Branchinella frondosa

$cluster_id= 1635928;

$id = 2648172; // Pegohyperia princeps
$id = 580165; // Diplura [two years]
$id = 27586; // Acanthobothrium [two years]
$id = 50691; // Hyperiidae [two years]
$id = 21800; // Rhacophorus [3 years]
$id = 182937; // Abacetus

//$id = 299552; // Apomys insignis

//$id = 728763; // Praomys misonnei
//$id = 1772754; // Praomys petteri
//$id = 4346695; // Praomys coetzeei

//$id = 137026; // Pulex cheopis
//$id = 43933; // Xenopsylla cheopis

//$id = 3757717; // Euthymia saussurei

$id=4236213;
//$id=4236233;
//$id=4236235;

$id = 1361010; // Molossops (Cynomops) greenhalli - bat name but not in GBIF in this form

$id = 1361023; // Micronycteris megalotis homezi

$id = 3364466; // Chaerophon (Lophomops) nigri

$id = 155605;

$id=157613;
$id = 3016054;
$id = 1506323;

$id = 690716; // Mormopterus (Hydromops) nonghenensis
$id = 4331720;
$id = 4273520;
$id = 391313;
$id = 4516787;
$id=2076189;
$id=4359903;
$id=1859763;
$id = 32999;
$id = 4237900;

$ids=array(
1070600,
1386721,
4262244,
4262266,
4262269,
4262298,
4262319,
4262336,
4262341,
4264669,
427111,
468610,
624877,
684853
);

$ids=array(3124264);

foreach ($ids as $id)
{
	add_cluster_from_id($id);
}

?>