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

$ids=array(1955683);

$ids=array(2133005,
3757038,
3757055,
3757056,
3757065,
3757067,
3757089,
726715);

$ids=array(
3716799,
3716800);

$ids=array(
4033340,
4033351,
4033354,
);

$ids=array(
1088908,
1210530,
122009,
1321585,
1334489,
1387165,
1456234,
1715017,
183841,
190880,
1970964,
1990835,
203906,
203907,
218695,
224714,
3719930,
3719932,
3719936,
3719938,
3719941,
3719943,
3719952,
3719955,
3719957,
3719960,
3719964,
3719968,
3720071,
3720074,
3720077,
3720113,
3720130,
3720131,
3720132,
3720144,
3720145,
3720146,
3720147,
3720403,
3720406,
3720407,
3720408,
3720410,
3720687,
3720691,
3720693,
3720698,
3720704,
3720708,
3720710,
3720712,
3720714,
3720716,
3720720,
3720721,
3720722,
3720723,
3720725,
3720726,
3720902,
3720906,
3720908,
3720910,
3720911,
3720912,
3720915,
3720920,
3720922,
3720944,
3720946,
3720948,
3720960,
3720962,
4916,
405137,
420687,
508875,
554878,
584263,
625055,
625821,
625861,
844147,
891458,
4900643
);

$ids=array(4869166);

foreach ($ids as $id)
{
	add_cluster_from_id($id);
}

?>