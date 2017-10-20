<?php

// Update metadata from PDF text// add missing authors if we have them in database linked to PDF

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(__FILE__) . '/publications_core.php');

$sicis=array('8e73372566c8fd6858634ae804b0dc5d');

$sicis=array(
'59f3649a490d473806ee44ddad779455',
'b56f68a6f2b56ce3e069a2e9dfa01db2',
'e5a0b77c729397385faffc90bc572d0a',
'3287e8380cdf3562d9f7b32a2e1b077f',
'd1046bad1fb6286b38ad7ead6ab03195',
'eb5521dcb354be845402c458d896000d',
'a7c660906a8ffea9c4da07224acfced6',
'a0e9911db04c1e32dbd84d9a41a98e02',
'be83e0dd9f6e00dc25acd8236d39e7a2',
'cde4a64e73d579d14c1e5af715b35c57',
'd3656a9dab1a45b9e59c37b82c16ccce',
'2c16611150ab11e2630bfe4949401d6c',
'62d5c09d98ef2cbb2575b1f7fe2623e7',
'b19190b41953d142b8de00aa4bbdc40a',
'd7d0575f31f44fc5571dc094dc607917',
'b84503460746bcccb054165d983fc760',
'093ef1bacf8b6d2d5885181686e919fe',
'1988799435145d685f6191ce405e72f3',
'cfb82a4579e63d7a6ba5a27e3c6f6dda',
'c7fe2afd9c80dd29c3c1728ba002d995',
'8e73372566c8fd6858634ae804b0dc5d',
'c9388b6ecff7866419734b27c155dad7',
'a2f7ea89eda5ff529f5b12eca2303426',
'3e5a45bf1788fd23f224990ea9595d75',
'4fa7b1706481cc624a4c1c9c83451c00',
'27fd2f012a77ecb3497c8647fd5fb910',
'fb99669970d50ab4a2a4078ad1bc6340',
'00e1607717d76a4defe79f17d30da48c',
'944e75aae2c1929113858a2cabc677da',
'9256bada56824db4d908d7e89b37da64',
'd63b63bdb64fe7b7f3e5425fda85baaa',
'e7d733cf950bab71104fe8e5b97d82b0',
'b62c4406b8000a99b26a199a83918967',
'5ed84784ba6dd7426ace9f627e727f3a',
'11acc8c77910e62b288aed1b93be98cc',
'f1a7c6840d2aaaf36bfe9362125fa171',
'483896a4ca2af212b138530b74ee2757',
'e35c07aefe33b66e8a633ccb7798611b',
'35f9850ca478a2b3124090fbc1ba8d28',
'a32b7bd4210f664f48162e34da384572',
'ea49bc165707074048ba8e75a2c39b26',
'c516543c7991f1785ba46b2786aa874b',
'8212fad51ef1c55385f015a7832ac0c4',
'491716e2a284da3e492f09bb3989d3b2',
'ca127fd54b7d4d69772436331265c5db',
'5991506d1606b5430eb9018ac58a202d',
'92e853dd20b37f3dc23af9966e04b2e8'
);

$force = true;

foreach ($sicis as $sici)
{
	echo "-- $sici\n";
	
	// Get reference from CouchDB
	$url = 'http://bionames.org/api/id/' . $sici;
		
	$json = get($url);
	
	if ($json != '')
	{
		$reference = json_decode($json);
		
		$have_doi = false;
		$have_zoobank = false;
		
		if (isset($reference->identifier))
		{
			foreach ($reference->identifier as $identifier)
			{
			   if ($identifier->type == 'doi')
			   {
					$have_doi = true;
			   }
			   if ($identifier->type == 'zoobank')
			   {
					$have_zoobank = true;
			   }
			}
		}
		
		
		//print_r($reference);
		
		if (isset($reference->file))
		{
			$sha1 = $reference->file->sha1;
			
			$url = 'http://bionames.org/bionames-archive/documentcloud/pages/' . $sha1 . '/1';
			$text = get ($url);
			
			//echo $text;
			
			$sql = '';
			
			if (preg_match('/DOI:\s+(?<doi>10\..*\/.*)\\\/Uu', $text, $m))
			{
				//print_r($m);
				
				$doi = $m['doi'];
				$doi = str_replace('\/', '/', $doi);
				echo "-- $doi\n";
				
				if (!$have_doi)
				{
					$identifer= new stdclass;
					$identifer->type='doi';
					$identifer->id=$doi;
					$reference->identifier[] = $identifer;
					
					
				}
				$sql .= 'UPDATE `names` SET `doi`="' . $doi . '" WHERE `sici` = "' . $sici . '";' . "\n";
					
			}

			if (preg_match('/(?<lsid>urn:lsid.*)\\\/Uu', $text, $m))
			{
				//print_r($m);
				
				$lsid = $m['lsid'];
				echo "-- $lsid\n";
				
				$zoobank = str_replace('urn:lsid:zoobank.org:pub:','', $lsid);
				
				if (!$have_zoobank)
				{
					$identifer= new stdclass;
					$identifer->type='zoobank';
					$identifer->id=$zoobank;
					$reference->identifier[] = $identifer;
				}

			}
			
			// process;
			
			//print_r($reference);
				
			if (0)
			{
				$resp = $couch->send("PUT", "/" . $config['couchdb_options']['database'] . "/" . urlencode($sici), json_encode($reference));
				var_dump($resp);
			}
			else
			{
				echo $sql;
			}
			
		}
	}
}


?>