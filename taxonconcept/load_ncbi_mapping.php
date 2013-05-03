<?php

// Export mapping between names and NCBI concepts
error_reporting(E_ALL);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

require_once (dirname(dirname(__FILE__)) . '/clusters/cluster.php');



//--------------------------------------------------------------------------------------------------
function load_mapping($filename)
{
	global $config;
	global $couch;
	
	$file = @fopen($filename, "r") or die("couldn't open $filename");
	
	$file_handle = fopen($filename, "r");
	
	while (!feof($file_handle)) 
	{
		$id = trim(fgets($file_handle));
	
		$ion_db = NewADOConnection('mysql');
		$ion_db->Connect("localhost", 'root', '', 'ion');
		
	
		// Select mapping 
		$sql = 'SELECT * FROM names_to_concept WHERE ncbi_id = ' . $id;
				
		$result = $ion_db->Execute($sql);
		if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql . ' ' . $ion_db->ErrorMsg());
	
		while (!$result->EOF) 
		{
			$ncbi_id = $result->fields['ncbi_id'];
			
			echo $ncbi_id . "\n";
			
			if ($ncbi_id != 0)
			{
				// Fetch existing NCBI concept from CouchDB
				$url = 'http://bionames.org/bionames-api/id/ncbi/' . $ncbi_id;
				
				echo $url . "\n";
				
				$json = get($url);
				
				//echo $json;
				
				if ($json != '')
				{
					$taxonconcept = json_decode($json);
					
					//print_r($taxonconcept);
					
					if (!isset($taxonconcept->identifier))
					{				
						$taxonconcept->identifier = new stdclass;
					}
					
					if ($result->fields['ncbi_eol_id'] != 0)
					{
						$taxonconcept->identifier->eol[] = $result->fields['ncbi_eol_id'];
						$taxonconcept->identifier->eol = array_unique($taxonconcept->identifier->eol);
					}
			
					// Map to name cluster (include info)
					//$taxonconcept->identifier->ion[] = $result->fields['cluster_id'];
					
					
					// get details on name cluster
					$c = get_cluster($result->fields['cluster_id']);
					
					print_r($c);
					
					$cluster = new stdclass;
					//$cluster->id = $result->fields['cluster_id'];
					
					if (isset($c->nameComplete))
					{
						$cluster->nameComplete = $c->nameComplete;
					}
					if (isset($c->taxonAuthor))
					{
						$cluster->taxonAuthor = $c->taxonAuthor;
					}
					if (isset($c->publication))
					{
						$cluster->publication = $c->publication;
					}
					if (isset($c->publishedInCitation))
					{
						$cluster->publishedInCitation = $c->publishedInCitation;
						
						// year
						if (isset($c->year))
						{
							$cluster->year = $c->year;
						}												
					}
												
					if (!isset($taxonconcept->identifier->ion))
					{
						$taxonconcept->identifier->ion = new stdclass;
					}
	
					$taxonconcept->identifier->ion->{$result->fields['cluster_id']} = $cluster;
					
					// update
					$couch->add_update_or_delete_document($taxonconcept,  $taxonconcept->_id);
					
				}
			}
			$result->MoveNext();
		}
	
	}

}

// Read a file with a list of NCBI ids and load the mapping into CouchDB
$filename = '';
if ($argc < 2)
{
	echo "Usage: load_mapping_ncbi.php <id file>\n";
	exit(1);
}
else
{
	$filename = $argv[1];
}

load_mapping($filename);



?>
