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
$issns = array('0031-0220');
$issns = array('0079-8835');
$issns = array('0025-1461');


$issns = array('0007-1498'); // breaks code epically :(

$issns=array('0022-2372');
$issns=array('0027-4100');
$issns=array('0149-175X');
$issns=array('0374-5481');
$issns=array('0003-0082');
$issns=array('0370-2774');
$issns=array('0006-7172');
$issns=array('1616-5047');
$issns=array('1508-1109');
$issns=array('0008-4301');
$issns=array('0082-5107');
$issns=array('0016-6995');
$issns=array('0077-2070');
$issns=array('0067-1975');
$issns=array('1217-8837');
$issns=array('0384-8159'); // another example
$issns=array('0067-4745');
$issns=array('0923-9308');
$issns=array('0376-0375');
$issns=array('0008-6452');
$issns=array('0028-0119');
$issns=array('0012-723X');
$issns=array('0310-0049');
$issns=array('0580-3896');
$issns=array('0067-2238');
$issns=array('0508-4865');
$issns=array('0096-2961');
$issns=array('0370-047X');
$issns=array('0015-0754');
$issns=array('1280-9551');
$issns=array('0041-1752');
$issns=array('1935-3952');
$issns=array('0037-2102');
$issns=array('0035-418X');
$issns=array('0546-0670');
$issns=array('0006-324X');
$issns=array('0272-4634');
$issns=array('0003-0090');
$issns=array('0312-3162');

$issns=array('0006-6982');
$issns=array('0084-5620');
$issns=array('0028-1042');
$issns=array('0289-0003');
$issns=array('0096-3801');
$issns=array('0065-1710');
$issns=array('0024-0672');

$issns=array('0366-3515');
$issns=array('0038-4909');
$issns=array('0370-3908');

$issns=array('1175-5326');

$issns=array('0749-8934');
$issns=array('1000-0739');

$issns_processed = array();

while (count($issns) > 0)
{
	echo "ISSNs to process\n";
	print_r($issns);

	echo "ISSNs done\n";
	print_r($issns_processed);
	
	/*
	echo "ISSNs to process (array_diff)\n";
	$issns = array_diff($issns, $issns_processed);
	print_r($issns);
	*/
	
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