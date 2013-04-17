<?php

// Load publications for list of names

require_once(dirname(__FILE__) . '/publications_core.php');

$sici = '04009baaeb7c0a7ba17cc8cec60e7b0c';
$sici = 'ea15d456ad5f2c2d003b799462c93bf6';

$sici = 'ce3e5e4c5c284a8628b241aa0f4bd0f5';
$sici = '898b4b4a9a8e84ec0cfae8e7d47e6e9e';
$sici = '0cfa4a83b02d0a97ae791f5383b9cfd6';
$sici = '9252375233aa5a9ee7ee0a98dad2d7f7';
$sici = '1f61d973f43f12db725ecf18df0358c5';
$sici = '3102a7491ea1772ab26e241accbb72f4';
$sici = '9f10eddf04b270e02c64f20976386ad3';

$sici = '37044a5547ec293c50381f0b2e2f5ae3';

//$sici = '9e621ffd4985de8a6259ae8e8c0a230f';

$sici = 'fad13c12f3bfdb3357dce7e24abee459';
$sici = 'fff3de0b8582e36bbd07589cf7e60ab1';
$sici = '8c88fb55ce8d7b4d6d73233dd1d6703c';
$sici = 'bff5e9c1ae9a7848716a7a1d04396230';
$sici = 'cb573494b4477f0cece90da5e613b7da';
$sici = 'f6065acc05d00511a5121b115727e14d';
$sici = 'd9321a14f873762788d9f1a14b68d1fd';
$sici = 'c6c309857e1f2d598aa59e8fcb5ec294';

$sici = '0e6af40954e085d4ede7145422dd8427';
$sici = 'f922943f818bef883ead76061316ac53';

$sici = 'bfb477910b3d4c6628e8857bca850451';

$sici = 'ccb43f185ea558c7b48e8e53a92e5af9';

//echo $sici . "\n";
//exit();

get_reference (get_sici_sql($sici));

?>