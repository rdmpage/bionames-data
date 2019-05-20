<?php

//--------------------------------------------------------------------------------------------------
// From http://snipplr.com/view/6314/roman-numerals/
// Expand subtractive notation in Roman numerals.
function roman_expand($roman)
{
	$roman = str_replace("CM", "DCCCC", $roman);
	$roman = str_replace("CD", "CCCC", $roman);
	$roman = str_replace("XC", "LXXXX", $roman);
	$roman = str_replace("XL", "XXXX", $roman);
	$roman = str_replace("IX", "VIIII", $roman);
	$roman = str_replace("IV", "IIII", $roman);
	
	$roman = str_replace("IC", "LXXXXVIIII", $roman);
	
	
	return $roman;
}
    
//--------------------------------------------------------------------------------------------------
// From http://snipplr.com/view/6314/roman-numerals/
// Convert Roman number into Arabic
function arabic($roman)
{
	$result = 0;
	
	$roman = strtoupper($roman);

	// Remove subtractive notation.
	$roman = roman_expand($roman);

	// Calculate for each numeral.
	$result += substr_count($roman, 'M') * 1000;
	$result += substr_count($roman, 'D') * 500;
	$result += substr_count($roman, 'C') * 100;
	$result += substr_count($roman, 'L') * 50;
	$result += substr_count($roman, 'X') * 10;
	$result += substr_count($roman, 'V') * 5;
	$result += substr_count($roman, 'I');
	return $result;
} 


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