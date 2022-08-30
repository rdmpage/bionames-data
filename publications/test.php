<?php

// Load publications for list of names
// SELECT DISTINCT CONCAT("'", sici, "',") FROM names WHERE issn='1131-933X';

error_reporting(E_ALL ^ E_DEPRECATED);

require_once(dirname(__FILE__) . '/publication_utils.php');
require_once(dirname(__FILE__) . '/publications_core.php');

$sicis=array();


$sicis=array(
"82c1e6b15fc8c47a518598cc2d39c8a4",
"19b22f9864ffce22027c9fb843118bb4",
"8f6278ff52df94e3c8da3d1f7f4bf7a5",
"3aff2e0e280bc0d03e3e346ac16bb4e3",
"0936c11724137cbd048bc5aaf3f88b7c",
"6c1d7e6206e23dea939265f78d91f778",
"fdf47c45f4df9fe674f61ff9aa1e1e00",
"1e0c3e58ffa5b180a20edc23f365774b",
"955567f5b488d040e9e3ad4b40b883cc",
"a3bddf26cd7453775c54bef71150418c",
"8ce890b4cfedb085e6b717fd8075e0c1",
"7501d660db8c1e4e38a841ee98d53cf1",
"f0881bf029f56faf648d5f52aa7d216c",
"73d00b147eb57025e82641b02ccb99f3",
"db38a65c88a9e8b25eb1cd07157b17af",
"8a5df7745e4f0010ab8f4e43721ea01a",
"cc91cdb7cad3da97c94f16d978285a5e",
"993ed9c5dc7307e370cc7f8d92375718",
"fa58f70d6be1589550d76eb837492fa2",
"1d0d1f12413742eb7338c42a73d9c2de",
"300403dbe808f2a31e87c3eef29e5a3b",
"b8e6e02c5648df707189913b64fc5ee4",
"afde5367fda815d67fdc9a49f16e8cb0",
"afb0a9f46c09459c2ce4ac5378f38787",
"5d0e8d1e5795069b0d924c0f5faca1d6",
"26025efa4c5a7ed5571765076bfc5e63",
"d3d935963d3c2e8c039c9e592a079512",
"ded9bffb80871a1eb8ae674982ae5c51",
"5cbfb8489e7850cdb3100b5c6161c5ad",
"6561c2c56d818f4cd9dc743a10160852",
"d1ecdd5c65c6d8cfef0b0345d209f7ef",
"65df29f471c804c62b860a9f1c9ecc66",
"243e74608c11895a0b7995b8ad110516",
"d09d1ef296abd853576786b00f66a649",
"e08731e7b3c703ec53c3fe79d6b02776",
"c870ddd6d0371bb3dc9a50f375d3d617",
"bfee73f8e221b6a78ee6d8c1b4b1d272",
"9b52a30001134873e51192262b4aa442",
"ea2f0003a0de752790fc64666baf2f95",
"f2aa193295d2cb759f1605d46c1e5ea2",
"0c9820dfb793c98635ccadbaa3f68290",
"d63afbf74ce2c9f924a2ba3a51dd096b",
);


foreach ($sicis as $sici)
{
	echo "Adding $sici...\n";
	$docs = null; 
	get_reference(get_sici_sql($sici), $docs, true);
}

?>