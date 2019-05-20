<?php

// Load publications for list of names

require_once(dirname(__FILE__) . '/publication_utils.php');
require_once(dirname(__FILE__) . '/publications_core.php');



$sicis=array();



$sicis = array(
'd9a5900d7dffbf5eec0dfcdfcb6dc9ef',
'2c17f7d801a1d73c05bb21dceb1818f3',
'a2a8ea6bda9b201095faf992a8326026',
'2994bc558caeae37342d43fc84c8a5fc',
'540bff1011083f907c6a57463c525f45',
'2b25c3cb89cf5f8005df53f39c47001b',
'95723c8c1957634e269860aee0479cff',
'72cc84de321bb58aa2e092d51d3452d7',
'09194339d4b9efea1628a9012e6cace0',
'012a09ca984cfc3bb20a32d25738c241',
'7c21f89c462644e3d1d128c2af15d4e6',
'0fbdb0c86b0f890e082e69caf1be8a07',
'125423ba6a5852a01f21430615547838',
'79d9144f88e32d3b6329416d2ef150d7',
'bf5f1db8e5db4f1ab149838cf2f93a64',
'e9c22733b09441b19383f9de70d37c35',
'14be6287d897b4d47c9b8ce7ed1c1c1d',
'4514824cb6e141e1cad7e4cfaa9dcbc0',
'9915eed028aeb93ac783caffd26b8a91',
'c0c65fb53e0bee9829483be69fe2da20',
'9b757ef8a7baf676d30645cbc9de0b99',
'7ab83a98bd172071bf367c6bd2e219d1',

);

foreach ($sicis as $sici)
{
	echo "Adding $sici...\n";
	$docs = null; 
	get_reference(get_sici_sql($sici), $docs, true);
}

?>