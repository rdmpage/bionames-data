<?php

// Delete clusters 
// This assumes we've fixed whatever clustering/mapping needs to be fixed, and that these
// are just spurious records.

require_once('../lib.php');
require_once ('../config.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');


$ids=array(
5241354
);

foreach ($ids as $id)
{
	$cluster_id = 'cluster/' . $id;
	$couch->add_update_or_delete_document(null, $cluster_id, 'delete');
}



?>

