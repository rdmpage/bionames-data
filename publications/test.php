<?php

// Load publications for list of names

require_once(dirname(__FILE__) . '/publications_core.php');

$sici = '04009baaeb7c0a7ba17cc8cec60e7b0c';
$sici = 'ea15d456ad5f2c2d003b799462c93bf6';
get_reference (get_sici_sql($sici));

?>