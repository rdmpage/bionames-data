<?php

// extract reference from string

function parse_citation($str)
{
	$debug = false;
	$obj = new stdclass;
	
	$obj->parsed = false;
	
	//$obj->id = $result->fields['id'];
	$obj->bibliographicCitation = $str;
	
	$matched = false;
	
	if (!$matched)
	{
		if (preg_match('/^(?<authorstring>.*)\s+\((?<year>[0-9]{4})\)\s+(?<title>.*)\.\s+(?<journal>(.*)),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+(?<pagination>.*)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<authorstring>.*)\.\s+(?<year>[0-9]{4})\.\s+(?<title>.*)\.\s+(?<journal>(.*)\(.*\))\s+(?<volume>\d+)(\((?<issue>.*)\))?:(?<pagination>.*)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	

	if (!$matched)
	{
		if (preg_match('/^(?<authorstring>.*)\.\s+\((?<year>[0-9]{4})\)\.?\s+(?<title>.*)\.\s+(?<journal>(.*))\s+(?<volume>\d+)\s*(\((?<issue>.*)\))?:\s*(?<pagination>.*)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// Anker, A. , 2007a. Alpheus zimmermani sp. nov. , a new colourful snapping shrimp (Crustacea: Decapoda) from the Caribbean Sea. — Cahiers de Biologie Marine 48: 241-247.
	if (!$matched)
	{
		if (preg_match('/^(?<authorstring>.*),\s+(?<year>[0-9]{4})[a-z]?\.?\s+(?<title>.*)\.\s+(?<journal>(.*))\s+(?<volume>\d+)\s*(\((?<issue>.*)\))?:\s*(?<pagination>.*)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	
	

	if (!$matched)
	{
		if (preg_match('/^(?<authorstring>.*)\.\s+(?<year>[0-9]{4}(\[[0-9]{4}\])?)\.\s+(?<title>.*),\s+(?<publisher>.*),\s+(?<pubLoc>.*):(?<pagination>\d+)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
			
			//exit();
		}
	}		
	
	// Schnabel, K. E. (2009) A review of the New Zealand Chirostylidae (Anomura: Galatheoidea) with description of six new species from the Kermadec Islands. Zoological Journal of the Linnean Society, 155, 542582
	if (!$matched)
	{
		if (preg_match('/^(?<authorstring>.*)\.\s+\((?<year>[0-9]{4})\)\s+(?<title>.*)\.\s+(?<journal>(.*)\(.*\))\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+(?<pagination>.*)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/^(?<authorString>.*)\.\s+(?<year>[0-9]{4}(\[[0-9]{4}\])?)\.\s+(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+)(\((?<issue>.*)\))?:(?<pagination>.*)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	
	if (!$matched)
	{
		if (preg_match('/^(?<authorString>.*)\.\s+(?<year>[0-9]{4}(\[[0-9]{4}\])?)\.\s+(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+)(\((?<issue>.*)\))?:(?<pagination>.*)$/iUu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	

	if (!$matched)
	{
		if (preg_match('/^(?<authorstring>.*)\.\s+(?<year>[0-9]{4}(\[[0-9]{4}\])?)\.\s+(?<title>.*),\s+(?<publisher>.*),\s+(?<pubLoc>.*)\s+(?<pagination>\d+)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
			
			//exit();
		}
	}	

	if (!$matched)
	{
		if (preg_match('/^(?<authorstring>.*)\.\s+(?<year>[0-9]{4}(\[[0-9]{4}\])?)\.\s+(?<title>.*),\s+(?<publisher>.*),\s+(?<pubLoc>.*)\s+(?<volume>\d+):(?<pagination>\d+)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
			
			//exit();
		}
	}	

	if (!$matched)
	{
		if (preg_match('/^(?<authorstring>.*)\.\s+(?<year>[0-9]{4}(\[[0-9]{4}\])?)\.\s+(?<title>.*),\s+(?<publisher>.*),\s+(?<pubLoc>.*)\s+(?<volume>\d+):(?<pagination>\d+)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
			
			//exit();
		}
	}	
	
	// Buckton. 1883. Monograph of British Aphides 4:167
	if (!$matched)
	{
		if (preg_match('/^(?<authorString>.*)\.\s+(?<year>[0-9]{4}(\[[0-9]{4}\])?)\.\s+(?<title>.*)\s+(?<volume>\d+)(\((?<issue>.*)\))?:(?<pagination>.*)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// catch if fail ---- 
	
	if (!$matched)
	{
		if (preg_match('/^(?<authorString>.*)\.\s+(?<year>[0-9]{4}(\[[0-9]{4}\])?)\.\s+(?<title>.*):(?<pagination>.*)$/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	
	

	if (!$matched)
	{
		if (preg_match('/^(?<authorString>.*)\.\s+(?<year>[0-9]{4}(\[[0-9]{4}\])?)\.\s+(?<title>.*)\./iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	

	/*
	if (!$matched)
	{
		if (preg_match('/^(?<authorString>.*)\.\s+\((?<year>[0-9]{4}(\[[0-9]{4}\])?)\)\.\s+(?<title>.*)/iu', $obj->bibliographicCitation, $m))
		{
			//print_r($m);
			$matched = true;
			if ($debug) echo "-- " . __LINE__ . "\n";
		}
	}	
	*/


	if (!$matched)
	{
		/*
		echo "-- NOT MATCHED \n";
		echo "-- " . $obj->bibliographicCitation . "\n";
		
		$notmatched[] = $obj->bibliographicCitation;
		*/
		//exit();
	}
	
	if ($matched)
	{
		$obj->parsed = true;
		
		if (isset($m['journal']))
		{
			$obj->journal = new stdclass;
		}
		
		foreach ($m as $k => $v)
		{
			if (!is_numeric($k) && ($v != ''))
			{
				switch ($k)
				{
					case 'title':
					case 'year':
						$obj->${k} = trim($v);
						break;
						
					case 'journal':
						// clean
						$obj->journal->name = $v;
						{
							if (preg_match('/^(?<journal>(?<one>[A-Z]).*)\s+\((?<two>[A-Z]).*\)$/', $obj->journal->name, $mm))
							{
								if ($mm['one'] == $mm['two'])
								{
									$obj->journal->name = $mm['journal'];
								}
							}
						}	
						
						if (preg_match( "/[\x{0097}]/u", $obj->journal->name))
						{
							$obj->journal->name = preg_replace( "/^([\x{0097}])\s+/u", '', $obj->journal->name);
						}
						break;
						
					case 'volume':
					case 'issue':
						$obj->journal->${k} = $v;
						break;
				
					case 'pagination':
						$v = trim($v);
						$v = rtrim($v, '.');

						// Handle en-dash
						$v = preg_replace( "/([\x{0096}])/u", '-', $v);
						
						$pages = $v;
						if (preg_match('/^(?<spage>\d+)(-)(?<epage>\d+)$/', $v, $mm))
						{
							$pages = $mm['spage'] . '--' . $mm['epage'];
						}
						if (isset($obj->journal))
						{
							$obj->journal->pages = $pages;
						}
						else
						{
							$obj->pages = $pages;
						}
						break;
						
					default:
						break;
				}
			}
		}
				
	}

	return $obj;
}

?>