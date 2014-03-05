<?php

// import into MySQL for cleaning

//error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');

require_once(dirname(dirname(__FILE__)) . '/lib.php');
require_once (dirname(__FILE__) . '/gnrd.php');
require_once (dirname(__FILE__) . '/ubio_findit.php');


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	'root', '', 'embl_hosts');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

//--------------------------------------------------------------------------------------------------
// Return a list of unique name strings from uBio response
function get_unique_names_ubio($response)
{
	$names = array();
	foreach ($response as $k => $v)
	{
		if (isset($v['canonical']))
		{
   			$names[] = $v['canonical'];
   		}
   	}
   	$names = array_unique($names);
   	return $names;
}



//--------------------------------------------------------------------------------------------------
function eol_search($string)
{
	$hit = null;

	$eol_id = 0;
	
	$url = 'http://eol.org/api/search/1.0.json?q='
		. urlencode($string) . '&page=1&exact=false&filter_by_taxon_concept_id=&filter_by_hierarchy_entry_id=&filter_by_string=&cache_ttl=';
		
	//echo $url . "\n";
		
	$json = get($url);
	
	$obj = json_decode($json);
	
	//print_r($obj);
	
	if (count($obj->results) > 0)
	{
		$content = $obj->results[0]->content;
		
		$hits = explode(";", $obj->results[0]->content);
		
		// clean
		for ($i = 0; $i < count($hits); $i++)
		{
			$hits[$i] = strtolower(trim($hits[$i]));
		}
		//print_r($hits);
		
		$query = strtolower($string);
		for ($i = 0; $i < count($hits); $i++)
		{
			if ($hits[$i] == $query)
			{
				$eol_id = $obj->results[0]->id;
				
				$hit = new stdclass;
				$hit->eol_id = $obj->results[0]->id;
				$hit->title = $obj->results[0]->title;

			}
		}	
		
		
	}
	
	return $hit;
}


//--------------------------------------------------------------------------------------------------
function parse_name($string)
{
	$p = new stdclass;
	
	$matched = false;
	
	/*
	if (!$matched)
	{
		if (preg_match('/^(?<part1>.*)\s+\((?<part2>.*)\)$/Uu', $string, $m))
		{
			$p->names = array();
			$p->ids =  array();
			$p->names[] = $m['part1'];
			$p->names[] = $m['part2'];
			
			$matched = true;
		}
	}
	*/
	
	/*
	if (!$matched)
	{
		if (preg_match('/^(?<part1>.*);\s+(?<part2>voucher.*)$/Uu', $string, $m))
		{
			$p->names = array();
			$p->codes = array();
			$p->ids =  array();
			$p->names[] = $m['part1'];
			$p->codes[] = $m['part2'];
			
			$matched = true;
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<part1>.*)\s+\((?<part2>[A-Z]{2}.*)\)$/Uu', $string, $m))
		{
			$p->names = array();
			$p->codes = array();
			$p->ids =  array();
			$p->names[] = $m['part1'];
			$p->codes[] = $m['part2'];
			
			$matched = true;
		}
	}
	*/
	
	if (!$matched)
	{
		// OK, simple rules don't work, let's get serious and use external tools
		
		if (1)
		{
			$response = get_names_from_text($string);
			// Unique names
			$namestrings = get_unique_names($response);
		}
		else
		{
			// uBio
			$response = ubio_findit($string);
			
			
			//print_r($response);
			// Unique names
			$namestrings = get_unique_names_ubio($response);
		}		
		
		if (count($namestrings) > 0)
		{
			$matched = true;
			
			$p->names = array();
			
			foreach ($namestrings as $name)
			{
				$p->names[$name] = new stdclass;
				$p->names[$name]->name = $name;
			}
		
		}
		
		
	}
	
	/*
	if (!$matched)
	{
		if (preg_match('/^(?<part1>.*)\s+(?<part2>[A-Z]{2}.*)$/Uu', $string, $m))
		{
			$p->names = array();
			$p->codes = array();
			$p->ids =  array();
			$p->names[] = $m['part1'];
			$p->codes[] = $m['part2'];
			
			$matched = true;
		}
	}
	

	if (!$matched)
	{
		$p->names = array();
		$p->ids =  array();
		
		$p->names[] = $string;
	}	
	*/
	
	return $p;
}



$host = 'Ptero%';
$host = 'Aero%';
$host = 'Pong%';
$host='Gorilla%';
$host = 'Pan%';
//$host='Panthera leo';
$host = 'Ficus %';
$host='Nothofagus%';
$host = 'Macro%';
$host = 'M%';
$host = 'N%';
$host = 'R%';
$host = 'S%';
$host = 'T%';
$host = 'U%';
$host = 'V%';


$sql = "SELECT * FROM hosts WHERE host LIKE '$host' AND name IS NULL";

$sql = "SELECT * FROM hosts WHERE name IS NULL";

//echo $sql . "\n";

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

//print_r($result);

while (!$result->EOF) 
{	
	$string = $result->fields['host'];
	echo "-- $string\n";
	
	$p = parse_name($string);
	
	if (!isset($p->names))
	{
		// GNRD doesn't handle just names!!!!!
		if (preg_match('/^[A-Z]\w+( \w+)?$/', $string))
		{
			$p->names = array();
			
			$p->names[$string] = new stdclass;
			$p->names[$string]->name = $string;
		}		
	}
	
	
	
	$p->raw_string = $string;
	
	$p->markup = $p->raw_string;
	
	//print_r($p);
	
	if (isset($p->names))
	{
		foreach ($p->names as $k => $v)
		{
			$hit = eol_search($v->name);

			if ($hit)
			{
				$v->id = $hit->eol_id;
				$v->title = $hit->title; 
			}
			
			
			$tag_open = '[';
					
			if ($hit)
			{
				$v->id = $hit->eol_id;
				$v->title = $hit->title; 
			}
			$tag_close = ']';
			$p->markup = preg_replace('/(' . $v->name . ')/', $tag_open . '$1' . $tag_close, $p->markup);
		}	
	}
	
	if ($debug)
	{
		print_r($p);
	}
	
	if ($debug)
	{
		echo json_encode($p);
	}
	
	//print_r($p);
	
	if (isset($p->names))
	{
		$count = 0;

		foreach ($p->names as $k => $v)
		{
			if ($count == 0)
			{
				$sql = "UPDATE hosts SET name='" . addcslashes($v->name, "'") . "'";
	
				if (isset($v->id))
				{
					$sql .= ', eol_id=' . $v->id;
				}
				
				$sql .= ", markup='" .  addcslashes($p->markup, "'") . "'";
			
				$sql .= " WHERE host='" .  addcslashes($string, "'") . "';";
				echo $sql . "\n";
			}
			$count++;
			
		}
	}



	$result->MoveNext();
}



?>