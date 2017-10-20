<?php

// Load publications for list of names

require_once(dirname(__FILE__) . '/publication_utils.php');
require_once(dirname(__FILE__) . '/publications_core.php');


$sicis = array('557dc12291663364196ab308499bce78');


// UPDATE names SET pdf='http://cassidae.uni.wroc.pl/Vyjayandi_Cotiganopsis_lowres.pdf' WHERE sici='d5cbd07f1050347e6996f6b3ed6b1ada';
// INSERT INTO names_authors_pdf(pdf,author) VALUES('http://cassidae.uni.wroc.pl/Vyjayandi_Cotiganopsis_lowres.pdf', 'Vyjayandi, M. C.;Rajeesh, R. S.;Sajin, John P.;Dhanasree, M. M.;Ehrmann, R.');

foreach ($sicis as $sici)
{
	echo "Adding $sici...\n";
	$docs = null; 
	get_reference(get_sici_sql($sici), $docs, true);
}

?>