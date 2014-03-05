<?php

// Add basic metadata for a list of DOIs to database so that we can do range search
// for a single page

require('crossref.php');

require('../publications/reference.php');

$filename = 'doi.txt';
$filename = 'brittonia.doi.txt';
$filename = 'kew.doi.txt';
$filename = 'kewmisc.doi.txt';
$filename = 't.txt';
$filename = '0374-6313-doi.txt';
$filename = 'novon.txt';
$filename = 'torrey-doi.txt';

$dois = array();

$file_handle = fopen($filename, "r");

$ris = '';

$count = 0;


while (!feof($file_handle)) 
{
	$doi = trim(fgets($file_handle));
	
	if (!isset($dois[$doi]))
	{
		
		echo "-- $doi\n";
		
		$reference = new stdclass;
		
		// sql
		if (1)
		{
			if (preg_match('/10.2307\/(?<id>\d+)$/', $doi, $m))
			{
				
				$reference->journal = new stdclass;
				
				augment_jstor($reference, $m['id']);
				// just grab pages
				if (preg_match('/(?<spage>.*)--(?<epage>.*)/', $reference->journal->pages, $m))
				{
					$sql = 'UPDATE crossref SET spage="' . $m['spage'] . '", epage="' . $m['epage'] . '" WHERE doi="' . $doi . '";';			
					echo $sql .= "\n";
				}
			}
		}
		else
		{
	
			
		
			$identifier = new stdclass;
			$identifier->type = 'doi';
			$identifier->id = $doi;
			$reference->identifier[] = $identifier;
			
			
			get_doi_metadata_unixref($doi, $reference);
			
					
			
			if (preg_match('/10.2307\/(?<id>\d+)$/', $doi, $m))
			{
				augment_jstor($reference, $m['id']);
			}
			
			
			
			//print_r($reference);
		
			$ris .= reference_to_ris($reference);
		
		
			$sql = "REPLACE INTO crossref (doi, title, journal, issn, volume, spage, epage) VALUES (";
			
			$sql .= '"' . $doi . '"';
			$sql .= ', "' . addcslashes($reference->title, '"') . '"';
			$sql .= ', "' . addcslashes($reference->journal->name, '"') . '"';
			
			
			if (isset($reference->journal->identifier))
			{
				foreach ($reference->journal->identifier as $identifier)
				{
					switch ($identifier->type)
					{
						case 'issn':
							$sql .= ', "' . $identifier->id . '"';
							break;
							
						default:
							break;
					}
				}
			}
			else
			{
				$sql .= ', ""';
			}
			
			
			
			$sql .= ', "' . $reference->journal->volume . '"';
			
			if (preg_match('/(?<spage>.*)--(?<epage>.*)/', $reference->journal->pages, $m))
			{
				$sql .= ', "' . $m['spage'] . '"';
				$sql .= ', "' . $m['epage'] . '"';
			
			}
			else
			{
				$sql .= ', "' . $reference->journal->pages . '"';
				$sql .= ', ""';
			}
			
			
			$sql .= ");";
			echo $sql . "\n";
		}
	}
	$dois[] = $doi;
	
	
	if (($count++ % 10) == 0)
	{
		$rand = rand(2000000, 6000000);
    	echo '-- sleeping for ' . round(($rand / 1000000),2) . ' seconds' . "\n";
    	usleep($rand);
    }
	
}

file_put_contents('doi.ris', $ris);

?>
