<?php

/*

Given a list if ISSNs fetch data from WorldCat. Add any preceding or succeeding ISSN to a queue and
add them.
 
*/

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)). '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


$issns = array('0022-2933', '0374-5481');

//$issns = array('0068-547X');

//$issns = array('0006-324X');

$issns = array('0374-5481');

$issns = array('0077-7749');

$issns_processed = array();

while (count($issns) > 0)
{
	echo "ISSNs to process\n";
	print_r($issns);
	echo "ISSNs done\n";
	print_r($issns_processed);
	
	$issn = array_shift($issns);
	$issns_processed[] = $issn;
	
	$url = 'http://xissn.worldcat.org/webservices/xid/issn/' . $issn . '?method=getHistory&format=json';
	
	$json = get($url);
	if ($json != '')
	{
		//echo $json;
		
		$obj = json_decode($json);
		
		//print_r($obj);
		
		$preceding = array();
		$succeeding = array();
		
		// Get relations between journals		
		if (isset($obj->group))
		{
			foreach ($obj->group as $g)
			{
				foreach ($g->list as $list)
				{
					switch ($g->rel)
					{							
						case 'preceding':
							$preceding[] = $list->issn;
							break;
							
						case 'succeeding':
							$succeeding[] = $list->issn;
							break;
							
						case 'this':
						default:
							break;
					}
				}
			}
		}
		
		// clean
		$preceding = array_unique($preceding);
		$succeeding = array_unique($succeeding);
		
		// Now handle this journal
		foreach ($obj->group as $g)
		{
			foreach ($g->list as $list)
			{
				if ($g->rel == 'this')
				{
					$journal = $list;
					$journal->_id = 'issn/' . $list->issn;
					
					$journal->type = 'journal';
					
					if (count($preceding) > 0)
					{
						$journal->preceding = $preceding;
					}
					if (count($succeeding) > 0)
					{
						$journal->succeeding = $succeeding;
					}
					
					// Add to queque
					foreach ($preceding as $i)
					{
						if (!in_array($i, $issns_processed))
						{
							$issns[] = $i;
						}
					}
					foreach ($succeeding as $i)
					{
						if (!in_array($i, $issns_processed))
						{
							$issns[] = $i;
						}
					}					
					
					$journal->provenance = array();
					$worldcat = new stdclass;
					$worldcat->time = date(DATE_ISO8601, time());
					$worldcat->url = $url;
					$journal->provenance[] = $worldcat;

					//print_r($journal);
					
					if (1)
					{
						echo "CouchDB...\n";
						$couch->add_update_or_delete_document($journal,  $journal->_id);
					}
					
				}
			}
		}
		
	}
}


?>