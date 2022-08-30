<?php

// Match pages within a BioStor reference to BHL pages

error_reporting(E_ALL ^ E_DEPRECATED);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');


//----------------------------------------------------------------------------------------
// Parse IPNI collation to build a set of journal, volume, issue, year locators
function collation_to_locators($result, &$reference)
{
	
	$reference->id = $result->fields['Id'];
	$reference->name = $result->fields['Full_name_without_family_and_authors'];

	
	$reference->journal = $result->fields['Publication'];
	
	// Clean
	if ($reference->journal == 'Kew Bull.')
	{
		$reference->journal = 'Kew Bulletin';
	}
	
	$reference->year = $result->fields['Publication_year_full'];
	
	if ($result->fields['biostor'] != '')
	{
		$reference->biostor = $result->fields['biostor'];
	}
	
	
	//$reference->year = preg_replace('/\s+\[.*\]$/', '', $reference->year);
	
	if (preg_match('/[0-9]{4}\s+\[(?<year>[0-9]{4})\s+publ/', $reference->year, $m))
	{
		$reference->year = $m['year'];
	}
	
	if (preg_match('/[0-9]{4}\s+\[\d+ \w+ (?<year>[0-9]{4})\]/', $reference->year, $m))
	{
		$reference->year = $m['year'];
	}	
	
	echo "-- " .  $result->fields['Id'] . " " . $result->fields['Publication'] . " " . $result->fields['Collation'] . " " . $result->fields['Publication_year_full'] . "\n";

	
	$matched = false;
	
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+)\.\s+(?<pages>\d+)\./', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// 4e ser., 8, 1986, section B, Adansonia no. 4: 420
	// 4 ser., 10, section B, Adansonia no. 1: 51 (-52), fig
	if (!$matched)
	{
		if (preg_match('/^\d+[e]?\s+ser.,?\s+(?<volume>\d+)[,|\.](.*)\d+:\s+(?<pages>\d+)/u', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}	
	
	
	// Sér. 4, 12(2): 206
	if (!$matched)
	{
		if (preg_match('/^Sér. \d+,\s+(?<volume>\d+)\((.*)\):\s+(?<pages>\d+)/u', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}	
	
	
	// Phytoneuron
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[0-9]{4}-\d+):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	// No. 7, 43 (1942)
	if (!$matched)
	{
		if (preg_match('/No.\s+(?<volume>\d+)(,|\.|,.)\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// No. 4 (Stud. Trop. Am. Pl. I.) 26
	if (!$matched)
	{
		if (preg_match('/No.\s+(?<volume>\d+)\s+\(S.*\)\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\((?<issue>.*)\):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->issue = $m['issue'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}

	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+):\s+(?<pages>\d+)[,]?/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\s+(?<pages>\d+)$/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// 1936, xvii. 48
	if (!$matched)
	{
		if (preg_match('/[0-9]{4},\s+(?<volume>[ivxlc]+)\.\s+(?<pages>\d+)\.?$/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// xliii. 74 1962
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ivxlc]+)\.\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// ser. III, iv. 221 (1922).
	if (!$matched)
	{
		if (preg_match('/ser.\s+(?<series>[IVXL]+),\s+(?<volume>[ivxl]+)\.\s+(?<pages>\d+)\s+\((?<year>[0-9]{4})\)/', $result->fields['Collation'], $m))
		{
			$matched = true;
			
			//print_r($m);
			
			$reference->series = $m['series'];
			$reference->volume = $m['volume'];
			$reference->pages = $m['pages'];
			$reference->year = $m['year'];
			
			//print_r($reference);
		}
	}	

	return $reference;
}

//----------------------------------------------------------------------------------------


$cache = array();


$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db->EXECUTE("set names 'utf8'"); 

$sql = 'SELECT * FROM names WHERE Genus="Schismatoglottis"';

$sql = 'SELECT * FROM names WHERE Genus="Smithatris"';

$sql = 'SELECT * FROM names WHERE Id="28965-1"';

$sql = 'SELECT * FROM names WHERE Genus="Odontoglossum"';

//$sql .= ' AND Publication="Bull. Jard. Bot. Buitenzorg"';
//$sql .= ' AND Publication="Ann. Mus. Bot. Lugduno-Batavi"';
//$sql .= ' AND Publication="Repert. Spec. Nov. Regni Veg. Beih."';
//$sql .= ' AND Publication="Richardiana"';
$sql .= ' AND Publication="Linnaea"';




$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$reference = new stdclass;
	
	$matched = collation_to_locators($result, $reference);
	
	if ($matched)
	{
		//print_r($reference);
		
		echo "-- " . $reference->name . "\n";
		
		if (isset($reference->journal) && isset($reference->volume) && isset($reference->pages))
		{
			$parameters = array();
		
			$pid = '';
		
			switch ($reference->journal)
			{
				case 'Ann. Mus. Bot. Lugduno-Batavi':
					$pid = 'title:113';
					break;
			
				case 'Bull. Jard. Bot. Buitenzorg':
					$pid = 'title:82095';
					break;
					
				case 'Linnaea':
					$pid = 'title:626';
					break;				
					
				case 'Novon':
					$pid = 'title:744';
					break;
					
				case 'Repert. Spec. Nov. Regni Veg. Beih.':
					$pid = 'title:84482';
					break;
					
				case 'Richardiana':
					$pid = 'title:153166';
					break;
		
				default:
					break;
			}
			
			if ($pid != '')		
			{
				$parameters['pid'] = $pid;
			}

			$parameters['volume'] = $reference->volume;
			$parameters['spage'] = $reference->pages;
		
			if (isset($reference->year))		
			{
				$parameters['date'] = $reference->year;
			}
			
			$parameters['format'] = 'json';
		
			$openurl = 'http://www.biodiversitylibrary.org/openurl?' . http_build_query($parameters);
			
			//echo $openurl . "\n";
			
			$json = get($openurl);
			
			if ($json != '')
			{
				$obj = json_decode($json);
				
				//print_r($obj);
				
				if (count($obj->citations) > 0)
				{
					$PageID = $obj->citations[0]->Url;
					
					$PageID = str_replace('https://www.biodiversitylibrary.org/page/', '', $PageID);
					
					$score = 1;
					
					if (1)
					{
						// Check match with OCR text
						
						$parameters = array(
							'op' => 'GetPageMetadata',
							'pageid' => $PageID,
							'ocr' => 'true',
							'names' => 'true',
							'format' => 'json',
							'apikey' => '0d4f0303-712e-49e0-92c5-2113a5959159'
						);
	
						$url = 'https://www.biodiversitylibrary.org/api2/httpquery.ashx?' . http_build_query($parameters);

						//echo $url . "\n";
		
						$json = get($url);
		
						//echo $json;
		
						$doc = json_decode($json);
						
						//print_r($doc);
						
						$text = $doc->Result->OcrText;
						
						
						$text = preg_replace('/\n/', '', $text);
						$text = preg_replace('/[\.|,]/', '', $text);
						$text = strtolower($text);
						
						//echo $text;
						
						$target = strtolower($reference->name);
						
						$pos = strpos($text, $target);
						
						if ($pos === false) {
						
							// can we get an approximate match?	
							// chunk text and see	
							
							$target_parts = explode(' ', $target);			
							$num_parts = count($target_parts);
							
							$parts = explode(' ', $text);
							
							$n = count($parts);
							$found = false;
							$i = 0;
							while ($i < $n - $num_parts && !$found)
							{
								$j = 0;
								$p = array();
								while ($j < $num_parts)
								{
									$p[] = $parts[$i + $j];
									$j++;
								}
							
								$s = join(' ', $p);
								
								//echo $s . "\n";
								
								$d = levenshtein($s, $target);
								
								if ($d <= 2) {
									$found = true;
									$score += 1;
								}
								
								
								$i++;
								
							}
						
						
						
						} else {
							$score += 2;
						}
						
					
						
					
					}
					
					echo "-- Score: $score\n";
					
					
					//if ($score > 1)
					{
						// SQL to update database
						
						echo 'UPDATE names SET bhl=' . $PageID . ', bhl_score=' . $score . ' WHERE Id="' . $reference->id . '";' . "\n";
					}
					
					
					
				}
				
			}
			
			
		}
			

	
		
	}
	else
	{
		echo "-- not matched\n";
		//exit();
	}
	
	echo "\n";
	
	
	$result->MoveNext();
}

?>