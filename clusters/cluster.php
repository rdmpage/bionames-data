<?php

// Add clusters (names + publication links)

error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

//--------------------------------------------------------------------------------------------------
function clean_publication ($publication, $taxon_author = null)
{
	if (preg_match('/\.\s+(.?\w+\]?)?,?\s*\[Zoological Record(.*)\]$/', $publication))
	{
		// clean
		$publication = preg_replace('/\.\s+(.?\w+\]?),??\s*\[Zoological Record(.*)\]$/', '', $publication);
	}
	
	// last ditch clean up
	$publication = preg_replace('/\.\s+\[Zoological Record(.*)\]$/', '', $publication);
	
	// Use author name to try and disambiguate references with no title or pagination
	if ($taxon_author)
	{
		$publication = $taxon_author . '. ' . $publication;
	}
	return $publication;	
}

//--------------------------------------------------------------------------------------------------
function get_cluster($cluster_id)
{
	global $couch;
	
	$db = NewADOConnection('mysql');
	$db->Connect("localhost", 
	'root' , '' , 'ion');

	// Ensure fields are (only) indexed by column name
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

	
	$cluster = null;
	
	$sql = 'SELECT * FROM names WHERE cluster_id= ' . $cluster_id;
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() > 0)
	{
		$cluster = new stdclass;
		
		$cluster->_id = 'cluster/' . $cluster_id;
		$cluster->type = 'nameCluster';
		$cluster->names = array();
		$cluster->nomenclaturalCode = 'ICZN';
		$cluster->publication = array();
		$cluster->publishedInCitation = array();
		$cluster->rankString = '';
		$cluster->taxonAuthor = '';
		$cluster->year = array();
		
		while (!$result->EOF) 
		{
			$name = new stdclass;
			$name->nomenclaturalCode = 'ICZN';
			
			$keys = array('id', 'nameComplete', 'taxonAuthor', 'uninomial', 'genusPart', 'infragenericEpithet', 'specificEpithet', 'infraspecificEpithet', 'rank', 'publication', 'year', 'sici');
			
			foreach ($keys as $k)
			{
				if ($result->fields[$k] != null)
				{
					switch ($k)
					{
						case 'id':
							$name->id = 'urn:lsid:organismnames.com:name:' . $result->fields[$k];
							break;
							
						case 'rank':
							$name->rankString = $result->fields[$k];
							
							
							break;						
							
						case 'sici':
							$name->publishedInCitation = $result->fields['sici'];
							$cluster->publishedInCitation[] = $name->publishedInCitation;
							break;
							
						case 'taxonAuthor':
							$name->taxonAuthor = $result->fields['taxonAuthor'];
													
							if (strlen($name->taxonAuthor) > strlen($cluster->taxonAuthor))
							{
								$cluster->taxonAuthor = $name->taxonAuthor;
							}
							break;
							
						case 'year':
							$name->{$k} = $result->fields[$k];
							$cluster->year[] = $result->fields[$k];
							break;
						
						default:
							$name->{$k} = $result->fields[$k];
							break;
					}
				}
			}
			// Extract year from taxon author if we don't already have it....
			if (!isset($name->year))
			{
				if (isset($name->taxonAuthor))
				{			
					if (preg_match('/(?<year>[0-9]{4})$/', $name->taxonAuthor, $m))
					{
						$name->year = $m['year'];
						$cluster->year[] = $name->year;
					}
				}
			}
			
			// Publication
			if (isset($name->publication))
			{
				$publication = clean_publication($name->publication, (isset($name->taxonAuthor) ? $name->taxonAuthor : null));
				$name->publication = $publication;
				$cluster->publication[] = $name->publication;
			}
			
			// Name
			if (!isset($cluster->nameComplete))
			{
				$cluster->nameComplete = $name->nameComplete;
				
				$keys = array('uninomial', 'genusPart', 'infragenericEpithet', 'specificEpithet', 'infraspecificEpithet', 'rank');
				foreach ($keys as $k)
				{
					if (isset($name->{$k}))
					{
						$cluster->{$k} = $name->{$k};
					}
				}
			}
			
			// Rank
			if (($cluster->rankString == '') && isset($name->rankString))
			{
				$cluster->rankString = $name->rankString;
			}
			
			
			$cluster->names[] = $name;
		
			$result->MoveNext();	
		}
		
		// Decide what values to use as a summary of this cluster of names, e.g. name, publication, taxon author
		$cluster->publication = array_unique($cluster->publication);
		if (count($cluster->publication) == 0)
		{
			unset($cluster->publication);
		}
	
		$cluster->publishedInCitation = array_unique($cluster->publishedInCitation);
		if (count($cluster->publishedInCitation) == 0)
		{
			unset($cluster->publishedInCitation);
		}
		
		if ($cluster->rankString == '')
		{
			unset($cluster->rankString);
		}
		
	
		if ($cluster->taxonAuthor == '')
		{
			unset($cluster->taxonAuthor);
		}
		
		$cluster->year = array_unique($cluster->year);
		if (count($cluster->year) == 0)
		{
			unset($cluster->year);
		}
		else
		{
			sort($cluster->year);
		}
	
		
	}
	
	return $cluster;
}

//--------------------------------------------------------------------------------------------------
function add_cluster($cluster_id)
{
	global $couch;
	
	$cluster = get_cluster($cluster_id);
		
	if (1)
	{
		if ($cluster)
		{
			print_r($cluster);
			
			echo "CouchDB...\n";
			$couch->add_update_or_delete_document($cluster,  $cluster->_id);
		}
	}

}

//--------------------------------------------------------------------------------------------------
function add_cluster_from_id($id)
{
	$db = NewADOConnection('mysql');
	$db->Connect("localhost", 
	'root' , '' , 'ion');

	// Ensure fields are (only) indexed by column name
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	
	$sql = 'SELECT cluster_id FROM names WHERE id= ' . $id . ' LIMIT 1';
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		add_cluster($result->fields['cluster_id']);
	}
	
}

//--------------------------------------------------------------------------------------------------
function add_cluster_from_name($name)
{
	$db = NewADOConnection('mysql');
	$db->Connect("localhost", 
	'root' , '' , 'ion');
	
	$clusters = array();

	// Ensure fields are (only) indexed by column name
	$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
	
	$sql = 'SELECT DISTINCT cluster_id FROM names WHERE nameComplete= ' . $db->qstr($name);
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	if ($result->NumRows() == 1)
	{
		$clusters[] = $result->fields['cluster_id'];
	}
	
	foreach ($clusters as $cluster_id)
	{
		add_cluster($cluster_id);
	}
	
}


?>