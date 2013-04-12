<?php

// Make a clean, hopefully unique string for a reference

function publication_to_unique_string($publication, $taxon_author = null, $doi = null, $biostor = null)
{
	$publication = str_replace("\n", '', $publication);
	$publication = str_replace("\r", '', $publication);
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
	
	// Use GUIDs to try and disambiguate references with no title or pagination
	if ($doi)
	{
		$publication .= ' doi:' . $doi;
	}
	else
	{
		if ($biostor)
		{
			$publication .= ' biostor:' . $biostor;
		}
	}	
	
	return $publication;	
}

?>