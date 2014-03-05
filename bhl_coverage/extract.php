<?php

require('../lib.php');

$filename = 'identifier.json';

$file_handle = fopen($filename, "r");


$count = 0;

$journal = array();

while (!feof($file_handle)) 
{
	$line = trim(fgets($file_handle));
	$line = rtrim($line, ",");
	
	if (strlen($line) > 44)
	{
	
		$obj = json_decode($line);
		
		
		if (!isset($journal[$obj->key[0]]))
		{
			$j = new stdclass;
			
			
			$url = 'http://bionames.org/bionames-api/api_journal.php?issn=' . $obj->key[0];
		
			$json = get($url);
			
			$result = json_decode($json);
			if (isset($result->title))
			{
				$j->title = $result->title;
			}
		
			
			
			//$j->year_count = array();
			//$j->year_id_count = array();
	
			$j->decade_count = array();
			$j->decade_id_count = array();
			
			$j->num_articles = 0;
			$j->num_any_id = 0;
			
			$journal[$obj->key[0]] = $j;
		}
		
		$issn = $obj->key[0];
		$year = $obj->key[1];
		$decade = floor($year/10) * 10;
		
		
		
		
		$journal[$issn]->num_articles++;
		
		/*
		if (!isset($journal[$issn]->year_count[$year]))
		{
			$journal[$issn]->year_count[$year] = 0;
		}
		$journal[$issn]->year_count[$year]++;
		*/
	
		if (!isset($journal[$issn]->decade_count[$decade]))
		{
			$journal[$issn]->decade_count[$decade] = 0;
		}
		$journal[$issn]->decade_count[$decade]++;
		
		
		if (count($obj->value) != 0)
		{
			$journal[$obj->key[0]]->num_any_id++;
			
			/*
			if (!isset($journal[$issn]->year_id_count[$year]))
			{
				$journal[$issn]->year_id_count[$year] = 0;
			}
			$journal[$issn]->year_id_count[$year]++;
			*/
	
			if (!isset($journal[$issn]->decade_id_count[$decade]))
			{
				$journal[$issn]->decade_id_count[$decade] = 0;
			}
			$journal[$issn]->decade_id_count[$decade]++;
				
		}
	}
	//print_r($obj);
	
	
	$count++;
	//if ($count == 10) break;
}

//print_r($journal);

// dump


echo "issn\ttitle\tarticles\tlinks\tcoverage";

$start = 1850;
$end = 2020;
for ($i = $start; $i < $end; $i += 10)
{
	echo "\t$i";
}
echo "\n";


foreach ($journal as $k => $v)
{
	echo $k;
	echo "\t";
	echo $v->title;
	echo "\t";
	echo $v->num_articles;
	echo "\t";
	echo $v->num_any_id;
	echo "\t";
	echo round(100 * $v->num_any_id / $v->num_articles);
	
	// coverage
	
	for ($i = $start; $i < $end; $i += 10)
	{
		$value = 0;
		$articles = 0;
		$ids = 0;
		
		//echo "i=$i\n";
		if (isset($v->decade_count[$i]))
		{
			$articles = $v->decade_count[$i];
			
			if (isset($v->decade_id_count[$i]))
			{
				$ids = $v->decade_id_count[$i];
			}
			
			
			/*
			if ($articles != 0)
			{
				$value = round(100 * $ids / $articles);
			}
			*/
			//$value = $articles;
			$value = $ids;
			
			
			
		}
		echo "\t" . $value;
		
		
	}
	echo "\n";
}
	
