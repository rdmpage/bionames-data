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

$sici = '755989187d7a9eb5546dde51920f9118';

$sici = 'c3ef35965783411c0b2b407b1aa79e50';

$sici = '17b0c04709d97db8cde25ef4da2fcaa4';

$sici = '9807bdd5bb9d594a1d3db9820daa1935';
$sici = '1a4ab2f341a1a33f9f9f2b76e075a76d';
//$sici = 'be4cab2e857de8395d69f4c578ca6290';
$sici = '55167291ec61e8e974a2aacf2d45805d';
$sici = '37fb83542464dceac76afaf6e61e3bf5';
$sici = 'ec7202d68200db00592587fdcf6814ec';

$sici='d6375c8d10c40d19acb42495fb715b39';
$sici = '983b7c6ff6bddf2b2e03b798ab8c4090';
$sici = 'e40d8086c2d8bc5d1560fdcda5c883f6';
$sici = '174671ff3082c45d7218c801638a32a7';
$sici = '8d8f54e4542a2dd481b9b5da8bc665a9';

$sici = 'ebe2c5265f40d9859b2f2197776177f2';

$sici = 'e775313310c5b2601670d8936cfa051d';

$sici = 'cb5959d76c0c255e3619a8f725393801';

$sici = '49cb2410c06380300a286bfd2e8d1430';

$sici = '24fc8df519a0cecac2a5f22dbccb0c26';
$sici = 'b395b9152149ccb5027e72adb6f8e671';

$sici = 'fe5f37f7bf67ad6aa1e91ffa48fc2588';

$sici = '4f94d1dfd9aa3c5a3f56a3ab3bfcc9f7';

$sici = '3d2414f35afa01f2b81c4605829eb798';

$sici = '8d0cb2ed855042a0682ccff23c083484';

$sicis=array('e47457cdffff3b1759e6e71739d72d72',
'4f4a1edfffeea4386a128654ea7c17da',
'cc98b99e4cd9e8655a53a553355a6d52',
'e6e2b4346da7759acd96a601fbb70ea3');

$sicis=array('76ac39fb163eb45f802e46f0b9d2ca91');

$sicis=array('b50b7eed1b1bee1a1e00813bf4240646');

$sicis=array('b515174b9ca5d9f40dc57e83e1a63019',
'1f566a88362706b9a22576f5cbb78faa'
);

$sicis = array('b9075e4c24562ec633d7b99f0b1f6f5d');

$sicis=array('1f702d6ade7ef44f6d5348954c70e5b3');

foreach ($sicis as $sici)
{
	get_reference (get_sici_sql($sici));
}

?>