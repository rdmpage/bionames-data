<?php

// load some data from NCBI

// Example

/*

Bats

// names
SELECT `canonicalName` FROM taxon WHERE `order` =  "Chiroptera Blumenbach, 1779";

// taxon ids
SELECT id FROM taxon WHERE `order` = "Chiroptera Blumenbach, 1779" and `parentNameUsageID` IS NOT NULL;

*/

$base_filename = 'Eleutherodactylus';
$base_filename = 'Chiroptera';
$base_filename = 'Chiroptera';

$base_path = 'examples/Chiroptera-NCBI';

// Files we need:

// List of taxon names for which we construct a mapping between clusters and taxa
$names_filename = $base_filename . '_names.txt'; // canonical names

// A classification is a set of taxonomic concepts from an external provider
$classification_filename = $base_filename . '_ncbi.txt'; // NCBI taxon ids we want to load


$flags = array();
$flags['publications'] 		= false; // load publications
$flags['clusters'] 			= false; // load clusters
$flags['classification'] 	= true; // load classification
$flags['make_mapping'] 		= false; // make mapping between clusters and classification
$flags['mapping'] 			= false; // load mapping


if ($flags['publications'])
{
	// Load clusters of taxon names
	$command = "php publications/load_publications_from_names.php " . $base_path . "/" . $names_filename;
	echo "\n==> Loading publications from names in $base_filename...\n";
	echo $command . "\n";
	system($command);
}

if ($flags['clusters'])
{
	// Load clusters of taxon names
	$command = "php clusters/load_cluster.php " . $base_path . "/" . $names_filename;
	echo "\n==> Loading clusters for $base_filename...\n";
	echo $command . "\n";
	system($command);
}


if ($flags['classification'])
{
	// Load a classification
	$command = "php classifications/ncbi/load_ncbi.php " . $base_path . "/" . $classification_filename;
	echo "\n==> Loading classification for $base_filename...\n";
	echo $command . "\n";
	//exit();

	system($command);
}

if ($flags['make_mapping'])
{
	// Load mapping for this classification
	$command = "php taxonconcept/make_mapping.php " . $base_path . "/" . $names_filename;
	echo "\n==> Creating mapping for $base_filename...\n";
	echo $command . "\n";
	system($command);
}

if ($flags['mapping'])
{
	// Load mapping for this classification
	$command = "php taxonconcept/load_mapping.php " . $base_path . "/" . $classification_filename;
	echo "\n==> Loading mapping for $base_filename...\n";
	echo $command . "\n";
	system($command);
}


?>