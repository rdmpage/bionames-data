<?php

require_once (dirname(dirname(dirname(__FILE__))) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

//----------------------------------------------------------------------------------------
function find_doi($string)
{
	$doi = '';
	
	$url = 'https://mesquite-tongue.glitch.me/search?q=' . urlencode($string);
	
	$opts = array(
	  CURLOPT_URL =>$url,
	  CURLOPT_FOLLOWLOCATION => TRUE,
	  CURLOPT_RETURNTRANSFER => TRUE
	);
	
	$ch = curl_init();
	curl_setopt_array($ch, $opts);
	$data = curl_exec($ch);
	$info = curl_getinfo($ch); 
	curl_close($ch);
	
	if ($data != '')
	{
		$obj = json_decode($data);
		
		//print_r($obj);
		
		if (count($obj) == 1)
		{
			if ($obj[0]->match)
			{
				$doi = $obj[0]->id;
			}
		}
		
	}
	
	return $doi;
			
}	

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;


$sql="select * from names where updated >= '2018-12-25' and journal='Zookeys' and doi is null";
$sql = "select * from names where updated >= '2019-04-11' and publicationParsed='Y' and doi is null";

$sql = "select * from names where updated >= '2019-04-11' and journal='Zookeys' and doi is null";
$sql = "select * from names where updated >= '2019-04-11' and journal='Zootaxa' and doi is null";

//$sql = "select * from names where journal='Journal of Melittology' and doi is null";

$sql="select * from names where issn='0073-2230'";

$sql="select * from names WHERE journal ='Geobios (Villeurbanne)' and doi is null";

$sql = "select * from `names-5429609` where publicationParsed='Y' and doi is null";
$sql = "select * from `names-5484821` where publicationParsed='Y' and doi is null";

$sql = "select * from `names-5484821` where journal LIKE 'Zoological S%'";


$sql="select * from names where issn='1303-2712'";


$sql = "select sici, publication, journal from `names-5507237` where publicationParsed='Y' and doi is null";

$sql="select * from names WHERE issn='0025-1461' and doi is null";

$sql='select * from names WHERE journal="Journal Fish Res Bd Canada"';

$sql = "select sici, publication, journal from `names-5541545` where publicationParsed='Y' and doi is null";

$sql = "select sici, publication, journal from `names-4500000-4505000-update` where publicationParsed='Y' and doi is null";

$sql = "select sici, publication, journal from `names-5562820` where publicationParsed='Y' and doi is null";

$sql = "select sici, title, publication, journal from `names` where publicationParsed='Y' and issn='0278-0372' and doi is null";


//$sql="select * from names WHERE issn='0096-0446' and doi is null";
//$sql = "select * from `names-5429609` where sici='e75c137771d0740d55a21f06ff9637d6'";

//echo $sql . "\n";

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$obj = new stdclass;

	$obj->id = $result->fields['sici'];	
	$obj->publication = $result->fields['publication'];
	
	//$obj->publication = preg_replace('/\[Zoological Record Volume \d+\]/u', '', $obj->publication);

	//$obj->publication = preg_replace('/Geobios \(Villeurbanne\)/u', 'Geobios', $obj->publication);

	$obj->journal = $result->fields['journal'];	
	
	$obj->title = $result->fields['title'];	
	
	//$obj->publication = $obj->title;
	
	echo "-- " . $obj->publication . "\n";
	
	//print_r($obj);
	
	$doi = find_doi($obj->publication);
	if ($doi != '')
	{
		echo "-- $doi\n";
		
		$go = true;
		
		// sanity check for zootaxa
		if (preg_match('/zootaxa/', $doi))
		{
			if (!preg_match('/^Zootaxa$/', $obj->journal))
			{
				$go = false;
			}
			
			if (!$go)
			{
				echo "-- *** spurious match ***\n";
			}
		}
		
		if ($go)
		{
			echo 'UPDATE names SET doi="' . $doi . '" WHERE sici="' . $obj->id . '";' . "\n";
		}
	}


		
	
	$result->MoveNext();
}



?>