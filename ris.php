<?php

/**
 * @file ris.php
 *
 */

// Parse RIS file and try and find first page of article in BHL

require_once (dirname(__FILE__) . '/nameparse.php');

$debug = false;

$logfile;

$key_map = array(
	'ID' => 'publisher_id',
	'T1' => 'title',
	'TI' => 'title',
	'SN' => 'issn',
	'JO' => 'secondary_title',
	'JF' => 'secondary_title',
	'BT' => 'secondary_title', // To handle TROPICS fuckup
	'VL' => 'volume',
	'IS' => 'issue',
	'SP' => 'spage',
	'EP' => 'epage',
	'N2' => 'abstract',
	'UR' => 'url',
	'AV' => 'availability',
	'Y1' => 'year',
	'KW' => 'keyword',
	'L1' => 'pdf', 
	'N1' => 'notes',
	'L2' => 'fulltext', // check this, we want to have a link to the PDF...
	'DO' => 'doi' // Mendeley 0.9.9.2
	);
	
//--------------------------------------------------------------------------------------------------
function process_ris_key($key, $value, &$obj)
{
	global $debug;
	
	switch ($key)
	{
		case 'AU':
		case 'A1':					
			// Interpret author names
			
			// Trim trailing periods and other junk
			//$value = preg_replace("/\.$/", "", $value);
			$value = preg_replace("/&nbsp;$/", "", $value);
			$value = preg_replace("/,([^\s])/", ", $1", $value);
			
			// Handle case where initials aren't spaced
			$value = preg_replace("/, ([A-Z])([A-Z])$/", ", $1 $2", $value);

			// Clean Ingenta crap						
			$value = preg_replace("/\[[0-9]\]/", "", $value);
			
			// Space initials nicely
			$value = preg_replace("/\.([A-Z])/", ". $1", $value);
			
			// Make nice
			$value = mb_convert_case($value, 
				MB_CASE_TITLE, mb_detect_encoding($value));
				
			if (1)
			{
							
				// Get parts of name
				$parts = parse_name($value);
				
				$author = new stdClass();
				
				if (isset($parts['last']))
				{
					$author->lastname = $parts['last'];
				}
				if (isset($parts['suffix']))
				{
					$author->suffix = $parts['suffix'];
				}
				if (isset($parts['first']))
				{
					$author->firstname = $parts['first'];
					
					if (array_key_exists('middle', $parts))
					{
						$author->firstname .= ' ' . $parts['middle'];
					}
				}
				$author->firstname = preg_replace('/\./Uu', '', $author->firstname);
				$author->name = $author->firstname . ' ' . $author->lastname;
			}
			else
			{
				$author = $value;
			}
			$obj->author[] = $author;
			break;	
	
		case 'JF':
		case 'JO':
			$value = mb_convert_case($value, 
				MB_CASE_TITLE, mb_detect_encoding($value));
				
			$value = preg_replace('/ Of /', ' of ', $value);	
			$value = preg_replace('/ the /', ' the ', $value);	
			$value = preg_replace('/ and /', ' and ', $value);	
			
			
			$obj->journal = new stdclass;
			$obj->journal->name = $value;
			break;
			
		case 'VL':
			$obj->journal->volume = $value;
			break;

		case 'IS':
			$obj->journal->issue = $value;
			break;
			
		case 'SN':
			$identifier = new stdclass;
			$identifier->type = 'issn';
			$identifier->id = $value;
			$obj->journal->identifier[] = $identifier;			
			break;

		case 'N2':
			$obj->abstract = $value;			
			break;
			
			
		case 'T1':
		case 'TI':
			$value = preg_replace('/([^\s])\(/', '$1 (', $value);	
			$value = str_replace("\ü", "ü", $value);
			$value = str_replace("\ö", "ö", $value);

			$value = str_replace("“", "\"", $value);
			$value = str_replace("”", "\"", $value);
						
			$obj->title = $value;
			break;
				
		// Handle cases where both pages SP and EP are in this field
		case 'SP':
			if (preg_match('/^(?<spage>[0-9]+)\s*[-|–|—]\s*(?<epage>[0-9]+)$/u', trim($value), $matches))
			{
				if (isset($obj->journal))
				{
					$obj->journal->pages = $matches['spage'] . '--' . $matches['epage'];
				}
				else
				{
					$obj->pages = $matches['spage'] . '--' . $matches['epage'];
				}				
			}
			else
			{
				if (isset($obj->journal))
				{
					$obj->journal->pages = $value;
				}
				else
				{
					$obj->pages = $value;
				}
			}				
			break;

		case 'EP':
			if (preg_match('/^(?<spage>[0-9]+)\s*[-|–|—]\s*(?<epage>[0-9]+)$/u', trim($value), $matches))
			{
				if (isset($obj->journal))
				{
					$obj->journal->pages = $matches['spage'] . '--' . $matches['epage'];
				}
				else
				{
					$obj->pages = $matches['spage'] . '--' . $matches['epage'];
				}				
			}
			else
			{
				if (isset($obj->journal->pages))
				{
					$obj->journal->pages .= '--' . $value;
				}
				else
				{
					$obj->pages .= '--' . $value;
				}				
			}				
			break;
			
		case 'PY': // used by Ingenta, and others
		case 'Y1':
		   $date = $value; 
		   
		   if (preg_match("/(?<year>[0-9]{4})\/(?<month>[0-9]{1,2})\/(?<day>[0-9]{1,2})/", $date, $matches))
		   {                       
			   $obj->year = $matches['year'];
			   $obj->date = sprintf("%d-%02d-%02d", $matches['year'], $matches['month'], $matches['day']);			   
		   }
		   

		   if (preg_match("/^(?<year>[0-9]{4})\/(?<month>[0-9]{1,2})\/(\/)?$/", $date, $matches))
		   {                       
				   $obj->year = $matches['year'];
		   }

		   if (preg_match("/^(?<year>[0-9]{4})\/(?<month>[0-9]{1,2})$/", $date, $matches))
		   {                       
				   $obj->year = $matches['year'];
		   }

		   if (preg_match("/[0-9]{4}\/\/\//", $date))
		   {                       
			   $year = trim(preg_replace("/\/\/\//", "", $date));
			   if ($year != '')
			   {
					   $obj->year = $year;
			   }
		   }

		   if (preg_match("/^[0-9]{4}$/", $date))
		   {                       
				  $obj->year = $date;
		   }
		   
		   
		   if (preg_match("/^(?<year>[0-9]{4})\-[0-9]{2}\-[0-9]{2}$/", $date, $matches))
		   {
		   		$obj->year = $matches['year'];
				$obj->date = $date;
		   }
		   break;
		   
		case 'KW':
			$obj->keyword[] = $value;
			break;
	
		// Mendeley 0.9.9.2
		case 'DO':
			$identifier = new stdclass;
			$identifier->type = 'doi';
			$identifier->id = $value;
			$obj->identifier[] = $identifier;			
			break;
			
			
		case 'L1':
			$link = new stdclass;
			$link->url = $value;
			$link->anchor = 'PDF';
			$obj->link[] = $link;
			break;

		case 'UR':
			$link = new stdclass;
			$link->url = $value;
			$link->anchor = 'LINK';
			$obj->link[] = $link;
			break;			
			
		default:
			break;
	}
}



//--------------------------------------------------------------------------------------------------
function import_ris($ris, $callback_func = '')
{
	global $debug;
	
	$volumes = array();
	
	$rows = explode("\n", $ris);
	
	$state = 1;	
		
	foreach ($rows as $r)
	{
		$parts = explode ("  - ", $r);
		
		$key = '';
		if (isset($parts[1]))
		{
			$key = trim($parts[0]);
			$value = trim($parts[1]); // clean up any leading and trailing spaces
		}
				
		if (isset($key) && ($key == 'TY'))
		{
			$state = 1;
			$obj = new stdClass();
			$obj->authors = array();
			
			if ('JOUR' == $value)
			{
				$obj->genre = 'article';
			}
			if ('ABST' == $value)
			{
				$obj->genre = 'article';
			}
		}
		if (isset($key) && ($key == 'ER'))
		{
			$state = 0;
						
			// Cleaning...						
			if ($debug)
			{
				print_r($obj);
			}	
			
			if ($callback_func != '')
			{
				$callback_func($obj);
			}
			
		}
		
		if ($state == 1)
		{
			if (isset($value))
			{
				process_ris_key($key, $value, $obj);
			}
		}
	}
	
	
}


//--------------------------------------------------------------------------------------------------
// Use this function to handle very large RIS files
function import_ris_file($filename, $callback_func = '')
{
	global $debug;
	$debug = false;
	
	$file_handle = fopen($filename, "r");
			
	$state = 1;	
	
	while (!feof($file_handle)) 
	{
		$r = fgets($file_handle);
//		$parts = explode ("  - ", $r);
		$parts = preg_split ('/  -\s+/', $r);
		
		//print_r($parts);
		
		$key = '';
		if (isset($parts[1]))
		{
			$key = trim($parts[0]);
			$value = trim($parts[1]); // clean up any leading and trailing spaces
		}
				
		if (isset($key) && ($key == 'TY'))
		{
			$state = 1;
			$obj = new stdClass();
			
			if ('JOUR' == $value)
			{
				$obj->type = 'article';
			}
		}
		if (isset($key) && ($key == 'ER'))
		{
			$state = 0;
						
			// Cleaning...						
			if ($debug)
			{
				print_r($obj);
			}	
			
			if ($callback_func != '')
			{
				
				$callback_func($obj);
			}
			
		}
		
		if ($state == 1)
		{
			if (isset($value))
			{
				process_ris_key($key, $value, $obj);
			}
		}
	}
	
	
}


?>