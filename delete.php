<?php

// delete one or more objects

require_once(dirname(__FILE__) . '/couchsimple.php');


$ids=array(
'cluster/3974743',
//'biostor/127801'
);

foreach ($ids as $id)
{
	$couch->add_update_or_delete_document(null, $id, 'delete');
}


?>