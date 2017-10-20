<?php

// ION

// Dump data for darwin core style export to CouchDB
require_once(dirname(__FILE__) . '/config.inc.php');
require_once(dirname(__FILE__) . '/adodb5/adodb.inc.php');

require_once (dirname(__FILE__). '/couchsimple.php');



//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysql');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db->EXECUTE("set names_indexfungorum 'utf8'"); 


$page = 100;
$offset = 0;

$result = $db->Execute('SET max_heap_table_size = 1024 * 1024 * 1024');
$result = $db->Execute('SET tmp_table_size = 1024 * 1024 * 1024');


$done = false;

while (!$done)
{
	$sql = 'SELECT * FROM `names` LIMIT ' . $page . ' OFFSET ' . $offset;
	
	$sql = 'SELECT * FROM `names` WHERE nameComplete LIKE "' . $name . '"';
	
	//$id = 522039;
	//$id = 550939;
	$id = 4485455;
	$id = 1282446;
	$id = 4490351;
	$sql = 'SELECT * FROM `names` WHERE id=' . $id;
	

	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

	while (!$result->EOF && ($result->NumRows() > 0)) 
	{	
		$obj = new stdclass;
		
		$obj->id 		 = 'urn:lsid:organismnames.com:name:' . $result->fields['id'];
		$obj->cluster_id = $result->fields['cluster_id'];
		
		$obj->type = 'http://rs.tdwg.org/ontology/voc/TaxonName#TaxonName';
		
		// For DarwinCore
		//$obj->taxonID 				= $obj->id;
		
		$obj->scientificNameID 		= $obj->id;
		
		
		$obj->scientificName  		= $result->fields['nameComplete'];
		
		if ($result->fields['taxonAuthor'] != '')
		{
			$obj->scientificNameAuthorship  = utf8_encode($result->fields['taxonAuthor']);
		}
		
		// rank
		if ($result->fields['rank'] != '')
		{
			$obj->verbatimTaxonRank  = $result->fields['rank'];
		}				
		
		$obj->html = $obj->scientificName;
		
		if ($result->fields['genusPart'] != '')
		{
			$obj->genus = $result->fields['genusPart'];
			
			$obj->html = '<i>' . $obj->genus . '</i>';
		}	
		if ($result->fields['specificEpithet'] != '')
		{
			$obj->specificEpithet  = $result->fields['specificEpithet'];
			
			$obj->html .= ' <i>' . $obj->specificEpithet . '</i>';
		}		
		if ($result->fields['infraSpecificEpithet'] != '')
		{
			$obj->infraspecificEpithet  = $result->fields['infraSpecificEpithet'];
			
			$obj->html .= ' <i>' . $obj->infraspecificEpithet . '</i>';			
		}	
		
		if (isset($obj->scientificNameAuthorship))
		{
			$obj->html .= ' ' . $obj->scientificNameAuthorship;	
		}
		
		//$obj->kingdom 	=  'Fungi';

		$obj->nomenclaturalCode 	=  'ICZN';
		
		// publication

		
		if ($result->fields['publication'] != '')
		{
			$obj->namePublishedIn = $result->fields['publication'];
			$obj->namePublishedIn = preg_replace('/\s*\[Zoological Record Volume \d+\]/i', '', $obj->namePublishedIn);
		}
		
		if ($result->fields['microreference'] != '')
		{
			$obj->microreference  = $result->fields['microreference'];
		}		
		
		
		if ($result->fields['year'] != '')
		{
			$obj->namePublishedInYear  = $result->fields['year'];
		}		
		
		// identifiers and links
		if ($result->fields['issn'] != '')
		{
			$obj->issn  = $result->fields['issn'];
		}		
		
		if ($result->fields['doi'] != '')
		{
			$obj->doi  = $result->fields['doi'];
			$obj->doi = strtolower($obj->doi);
			
			$obj->namePublishedInID = 'doi:' . $obj->doi;
		}		
		
		if ($result->fields['jstor'] != '')
		{
			$obj->jstor  = $result->fields['jstor'];
			
			if (!isset($obj->namePublishedInID))
			{	
				$obj->namePublishedInID = 'http://www.jstor.org/stable/' . $obj->jstor;
			}
		}		
		
		if ($result->fields['biostor'] != '')
		{
			$obj->biostor  = $result->fields['biostor'];
			
			if (!isset($obj->namePublishedInID))
			{	
				$obj->namePublishedInID = 'http://biostor.org/reference/' . $obj->biostor;
			}
		}		
		
		if ($result->fields['url'] != '')
		{
			$obj->url  = $result->fields['url'];

			if (!isset($obj->namePublishedInID))
			{	
				$obj->namePublishedInID = $obj->url;
			}
		}	
			
		if ($result->fields['pdf'] != '')
		{
			$obj->pdf  = $result->fields['pdf'];
		}
		
		if ($result->fields['handle'] != '')
		{
			$obj->handle  = $result->fields['handle'];

			if (!isset($obj->namePublishedInID))
			{	
				$obj->namePublishedInID = 'http://hdl.handle.net/' . $obj->handle;
			}
		}	
		
				
		if ($result->fields['bhl'] != '')
		{
			$obj->bhl  = $result->fields['bhl'];
		}
				
		if ($result->fields['isbn'] != '')
		{
			$obj->isbn  = $result->fields['isbn'];
			
			if (!isset($obj->namePublishedInID))
			{	
				$obj->namePublishedInID = 'isbn:' . $obj->isbn;
			}
			
		}		

		if (!isset($obj->namePublishedInID) && ($result->fields['sici'] != ''))
		{
			$obj->namePublishedInID = 'http://bionames.org/references/' . $result->fields['sici'];
		}
		
		if ($result->fields['updated'] != '')
		{
			$obj->timestamp  = strtotime($result->fields['updated']);
		}		

		
		// message is a text/csv (we are simulating a row in a database)
		// https://tools.ietf.org/html/rfc4180
		$doc = new stdclass;
		
		$doc->_id = $obj->id;
		$doc->{'message-timestamp'} = date("c", time());
		$doc->{'message-modified'} 	= $doc->{'message-timestamp'};
		$doc->{'message-format'} 	= 'text/csv';
		
		$doc->message = $obj;
		
		print_r($doc);
		
		
		// Upload 
		echo "CouchDB...";
		$couch->add_update_or_delete_document($doc,  $doc->_id);
		
		$count++;

		$result->MoveNext();
	}
	
	//echo "-------\n";
	
	if ($result->NumRows() < $page)
	{
		$done = true;
	}
	else
	{
		$offset += $page;
		
		//if ($offset > 3000) { $done = true; }
	}
	
	
}
	



?>