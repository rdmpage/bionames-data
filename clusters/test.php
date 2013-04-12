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

add_cluster_from_id($id);

?>