<?php

require_once('utils.php');

$xml = '<?xml version="1.0" encoding="utf-8" ?> <rdf:RDF xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:tdwg_pc="http://rs.tdwg.org/ontology/voc/PublicationCitation#" xmlns:tdwg_co="http://rs.tdwg.org/ontology/voc/Common#" xmlns:tdwg_tn="http://rs.tdwg.org/ontology/voc/TaxonName#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><tdwg_tn:TaxonName rdf:about="urn:lsid:organismnames.com:name:108999"><dc:identifier>urn:lsid:organismnames.com:name:108999</dc:identifier><dc:creator rdf:resource="http://www.organismnames.com"/><dc:Title>Turbobactrites eudoraensis</dc:Title><tdwg_tn:nameComplete>Turbobactrites eudoraensis</tdwg_tn:nameComplete><tdwg_tn:nomenclaturalCode rdf:resource="http://rs.tdwg.org/ontology/voc/TaxonName#ICZN"/><tdwg_co:PublishedIn>Carboniferous and Permian Bactritoidea (Cephalopoda) in North America. UNIVERSITY OF KANSAS PALEONTOLOGICAL CONTRIBUTIONS ARTICLE, No. 64 1979: 1-75.  60 [Zoological Record Volume 116]</tdwg_co:PublishedIn><tdwg_co:microreference>60</tdwg_co:microreference><rdfs:seeAlso rdf:resource="http://www.organismnames.com/namedetails.htm?lsid=108999"/></tdwg_tn:TaxonName></rdf:RDF>';

/*$xml = '<?xml version="1.0" encoding="utf-8" ?> <rdf:RDF xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:tdwg_pc="http://rs.tdwg.org/ontology/voc/PublicationCitation#" xmlns:tdwg_co="http://rs.tdwg.org/ontology/voc/Common#" xmlns:tdwg_tn="http://rs.tdwg.org/ontology/voc/TaxonName#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><tdwg_tn:TaxonName rdf:about="urn:lsid:organismnames.com:name:38"><dc:identifier>urn:lsid:organismnames.com:name:38</dc:identifier><dc:creator rdf:resource="http://www.organismnames.com"/><dc:Title>Elphidotarsius russelli</dc:Title><tdwg_tn:nameComplete>Elphidotarsius russelli</tdwg_tn:nameComplete><tdwg_tn:nomenclaturalCode rdf:resource="http://rs.tdwg.org/ontology/voc/TaxonName#ICZN"/><tdwg_co:PublishedIn>Palaeocene Primates from western Canada. Canadian Journal of Earth Sciences, 15(8) 1978: 1250-1271.  1264 [Zoological Record Volume 115]</tdwg_co:PublishedIn><tdwg_co:microreference>1264</tdwg_co:microreference><rdfs:seeAlso rdf:resource="http://www.organismnames.com/namedetails.htm?lsid=38"/></tdwg_tn:TaxonName></rdf:RDF>';*/


$xml = '<?xml version="1.0" encoding="utf-8" ?> <rdf:RDF xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:tdwg_pc="http://rs.tdwg.org/ontology/voc/PublicationCitation#" xmlns:tdwg_co="http://rs.tdwg.org/ontology/voc/Common#" xmlns:tdwg_tn="http://rs.tdwg.org/ontology/voc/TaxonName#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><tdwg_tn:TaxonName rdf:about="371873"><dc:identifier>371873</dc:identifier><dc:creator rdf:resource="http://www.organismnames.com"/><dc:Title>Pinnotheres atrinicola</dc:Title><tdwg_tn:nameComplete>Pinnotheres atrinicola</tdwg_tn:nameComplete><tdwg_tn:nomenclaturalCode rdf:resource="http://rs.tdwg.org/ontology/voc/TaxonName#ICZN"/><tdwg_co:PublishedIn>Description of a new species of Pinnotheres, and redescription of P. novaezelandiae (Brachyura: Pinnotheridae). New Zealand Journal of Zoology, 10(2) 1983: 151-162.  158 [Zoological Record Volume 120]</tdwg_co:PublishedIn><tdwg_co:microreference>158</tdwg_co:microreference><rdfs:seeAlso rdf:resource="http://www.organismnames.com/namedetails.htm?lsid=371873"/></tdwg_tn:TaxonName></rdf:RDF>';

$xml = '<?xml version="1.0" encoding="utf-8" ?> <rdf:RDF xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:tdwg_pc="http://rs.tdwg.org/ontology/voc/PublicationCitation#" xmlns:tdwg_co="http://rs.tdwg.org/ontology/voc/Common#" xmlns:tdwg_tn="http://rs.tdwg.org/ontology/voc/TaxonName#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><tdwg_tn:TaxonName rdf:about="1532210"><dc:identifier>1532210</dc:identifier><dc:creator rdf:resource="http://www.organismnames.com"/><dc:Title>Arcotheres guinotae</dc:Title><tdwg_tn:nameComplete>Arcotheres guinotae</tdwg_tn:nameComplete><tdwg_tn:nomenclaturalCode rdf:resource="http://rs.tdwg.org/ontology/voc/TaxonName#ICZN"/><tdwg_co:PublishedIn>A new crab species of the genus Arcotheres Manning, 1993, from Thailand (Crustacea, Brachyura, Pinnotheridae). Zoosystema, 23(3) 2001: 493-497.  494 [Zoological Record Volume 138]</tdwg_co:PublishedIn><tdwg_co:microreference>494</tdwg_co:microreference><rdfs:seeAlso rdf:resource="http://www.organismnames.com/namedetails.htm?lsid=1532210"/></tdwg_tn:TaxonName></rdf:RDF>';

$xml  ='<?xml version="1.0" encoding="utf-8" ?> <rdf:RDF xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:tdwg_pc="http://rs.tdwg.org/ontology/voc/PublicationCitation#" xmlns:tdwg_co="http://rs.tdwg.org/ontology/voc/Common#" xmlns:tdwg_tn="http://rs.tdwg.org/ontology/voc/TaxonName#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><tdwg_tn:TaxonName rdf:about="urn:lsid:organismnames.com:name:4006592"><dc:identifier>urn:lsid:organismnames.com:name:4006592</dc:identifier><dc:creator rdf:resource="http://www.organismnames.com"/><dc:Title>Hoplocephalus collaris</dc:Title><tdwg_tn:nameComplete>Hoplocephalus collaris</tdwg_tn:nameComplete><tdwg_tn:nomenclaturalCode rdf:resource="http://rs.tdwg.org/ontology/voc/TaxonName#ICZN"/><tdwg_co:PublishedIn>[Title unknown.] Proceedings of the Linnean Society of New South Wales, (2)(i) 1887: Unpaginated.  1111 [Zoological Record Volume 24]</tdwg_co:PublishedIn><tdwg_co:microreference>1111</tdwg_co:microreference><rdfs:seeAlso rdf:resource="http://www.organismnames.com/namedetails.htm?lsid=4006592"/></tdwg_tn:TaxonName></rdf:RDF>
';

$xml = '<?xml version="1.0" encoding="utf-8" ?> <rdf:RDF xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:tdwg_pc="http://rs.tdwg.org/ontology/voc/PublicationCitation#" xmlns:tdwg_co="http://rs.tdwg.org/ontology/voc/Common#" xmlns:tdwg_tn="http://rs.tdwg.org/ontology/voc/TaxonName#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><tdwg_tn:TaxonName rdf:about="644578"><dc:identifier>644578</dc:identifier><dc:creator rdf:resource="http://www.organismnames.com"/><dc:Title>Discias vernbergi</dc:Title><tdwg_tn:nameComplete>Discias vernbergi</tdwg_tn:nameComplete><tdwg_tn:nomenclaturalCode rdf:resource="http://rs.tdwg.org/ontology/voc/TaxonName#ICZN"/><tdwg_co:PublishedIn>Discias vernbergi, new species, a caridean shrimp (Crustacea: Decapoda: Bresiliidae) from the northwestern Atlantic. Proceedings of the Biological Society of Washington, 100(3) 1987: 506-514.  507 [Zoological Record Volume 124]</tdwg_co:PublishedIn><tdwg_co:microreference>507</tdwg_co:microreference><rdfs:seeAlso rdf:resource="http://www.organismnames.com/namedetails.htm?lsid=644578"/></tdwg_tn:TaxonName></rdf:RDF>';

// Extract stuff

$basedir = 'rdf-2012';
$basedir = 'rdf';
$basedir = 'rdf-4530085';
$basedir = 'rdf-missing';
$basedir = 'rdf';
//$basedir = 'rdf-extra-extra';

$files1 = scandir(dirname(__FILE__) . '/' . $basedir);

foreach ($files1 as $directory)
{
	//echo $directory . "\n";
	if (preg_match('/^\d+$/', $directory))
	{	
		//echo $directory . "\n";
		
		$files2 = scandir(dirname(__FILE__) . '/' . $basedir . '/' . $directory);

		foreach ($files2 as $filename)
		{
			//echo $filename . "\n";
			if (preg_match('/\.xml$/', $filename))
			{	

				$xml = file_get_contents(dirname(__FILE__) . '/' . $basedir . '/' . $directory . '/' . $filename);

	// fix
	$xml = str_replace('&amp;AMP;', '&amp;', $xml);
	$xml = str_replace('&AMP;', '&amp;', $xml);
	

	$dom= new DOMDocument;
	$dom->loadXML($xml);
	$xpath = new DOMXPath($dom);
	
	$xpath->registerNamespace('dc',      'http://purl.org/dc/elements/1.1/');
	$xpath->registerNamespace('dcterms', 'http://purl.org/dc/terms/');
	$xpath->registerNamespace('tdwg_pc', 'http://rs.tdwg.org/ontology/voc/PublicationCitation#');
	$xpath->registerNamespace('tdwg_co', 'http://rs.tdwg.org/ontology/voc/Common#');
	$xpath->registerNamespace('tdwg_tn', 'http://purl.org/dc/elements/1.1/');
	$xpath->registerNamespace('rdfs',    'http://www.w3.org/2000/01/rdf-schema#');
	$xpath->registerNamespace('rdf',     'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
	
	
	$obj = new stdclass;
	
	// Identifier
	$nodeCollection = $xpath->query ('//dc:identifier');
	foreach ($nodeCollection as $node)
	{
		$obj->id = (Integer)str_replace('urn:lsid:organismnames.com:name:', '', $node->firstChild->nodeValue);
	}

	// Name
	$nodeCollection = $xpath->query ('//tdwg_tn:nameComplete');
	foreach ($nodeCollection as $node)
	{
		//echo $node->firstChild->nodeValue . "\n";
		
		// ION nameComplete field may contain extra bits (such as group names)
		// so we keep original string and may have to modify nameComplete
		
		$obj->originalString = $node->firstChild->nodeValue;
		$obj->nameComplete = $node->firstChild->nodeValue;
		
		// parse
		
		$matched = false;
		
		// Uninomial
		if (!$matched)
		{
			if (preg_match('/^\w+$/', $obj->nameComplete, $m))
			{
				$obj->uninomial = $obj->nameComplete;
				$matched = true;
			}
		}
		
		// Subgenus
		if (!$matched)
		{
			if (preg_match('/^(?<genus>\w+) \((?<subgenus>\w+)\)$/', $obj->nameComplete, $m))
			{
				$obj->genusPart = $m['genus'];
				$obj->infragenericEpithet = $m['subgenus'];
				$obj->rank = subgenus;
				$matched = true;
			}
		}
		
		
		// Binonimial
		if (!$matched)
		{
			if (preg_match('/^(?<genus>\w+) (?<species>\w+)$/', $obj->nameComplete, $m))
			{
				$obj->genusPart = $m['genus'];
				$obj->specificEpithet = $m['species'];
				$obj->rank = species;
				$matched = true;
			}
		}

		// Bionomial with subgenus
		if (!$matched)
		{
			if (preg_match('/^(?<genus>\w+) \((?<subgenus>\w+)\) (?<species>\w+)$/', $obj->nameComplete, $m))
			{
				$obj->genusPart = $m['genus'];
				$obj->infragenericEpithet = $m['subgenus'];
				$obj->specificEpithet = $m['species'];
				$obj->rank = species;
				$matched = true;
			}
		}
		
		// Trinomial
		if (!$matched)
		{
			if (preg_match('/^(?<genus>\w+) (?<species>\w+) (?<subspecies>\w+)$/', $obj->nameComplete, $m))
			{
				$obj->genusPart = $m['genus'];
				$obj->specificEpithet = $m['species'];
				$obj->infraspecificEpithet = $m['subspecies'];
				$obj->rank = 'subspecies';
				$matched = true;
			}
		}
		
		
		// Variety
		// Nassa incrassata var. elongata
		if (!$matched)
		{
			if (preg_match('/^(?<genus>\w+) (?<species>\w+) var. (?<variety>\w+)$/', $obj->nameComplete, $m))
			{
				$obj->genusPart = $m['genus'];
				$obj->specificEpithet = $m['species'];
				$obj->infraspecificEpithet = $m['variety'];
				$obj->rank = 'infraspecificTaxon';
				$matched = true;
			}
		}

		// Variety (genus only)
		if (!$matched)
		{
			if (preg_match('/^(?<genus>\w+) var. (?<variety>\w+)$/', $obj->nameComplete, $m))
			{
				$obj->genusPart = $m['genus'];
				$obj->infraspecificEpithet = $m['variety'];
				$obj->rank = 'infraspecificTaxon';
				$matched = true;
			}
		}
		
		// Name with group name...
		// Sceloglaux carunculata (Meliphagidae)
		if (!$matched)
		{
			if (preg_match('/^(?<genus>\w+) (?<species>\w+) \((?<groupName>\w+(idae))\)$/', $obj->nameComplete, $m))
			{
				$obj->genusPart = $m['genus'];
				$obj->specificEpithet = $m['species'];
				$obj->rank = 'species';
				
				$obj->nameComplete = $obj->genusPart . ' ' . $obj->specificEpithet;
				
				$matched = true;
				
				//print_r($m);exit();
				
			}
		}
		
		
		
		$obj->nameParsed = ($matched ? 'Y' : 'N');
	}
	
	// Code
	$nodeCollection = $xpath->query ('//tdwg_tn:nomenclaturalCode/@rdf:resource');
	foreach ($nodeCollection as $node)
	{
		//echo $node->firstChild->nodeValue . "\n";
	}
	
	// Publication
	$nodeCollection = $xpath->query ('//tdwg_co:PublishedIn');
	foreach ($nodeCollection as $node)
	{
		
		$obj->publication = $node->firstChild->nodeValue;
		
		
		$publication = $obj->publication;
		if (preg_match('/\.\s+(.?\w+\]?)?,?\s*\[Zoological Record(.*)\]$/', $publication))
		{
			// clean
			$publication = preg_replace('/\.\s+(.?\w+\]?),??\s*\[Zoological Record(.*)\]$/', '', $publication);
		}
		
		// last ditch clean up
		$publication = preg_replace('/\.\s+\[Zoological Record(.*)\]$/', '', $publication);
		
		
		$str = publication_to_unique_string($publication);
		//echo "-- $str\n";
		$obj->sici =  md5($str);	
		
		
		
		if (preg_match('/\[Zoological Record Volume (?<volume>\d+)\]/', $obj->publication, $m))
		{
			$obj->zooRecord = $m['volume'];
		}
		
		$matched = false;
		$chapter = false;
		
		// A revision of the New Zealand species of Howickia Richards. Zootaxa, 3887(1), Nov 21 2014: 1-36
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\)),\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+\w+\s+\d+\s+(?<year>[0-9]{4}):(\s+\d+,)\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>\[.*\])\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+\d+\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)\((?<issue>\d+)\),\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>e\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		
		
		if (!$matched)
		{
			if (preg_match('/\[(?<title>.*)\.\]\s+(?<journal>.*),\s+(?<volume>\d+)\((?<issue>\d+)\),\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+vol.\s+(?<volume>[ixvl]+)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		//--
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+)(\((?<issue>.*)\)),\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(No.\s+)?(?<volume>\d+)(\((?<issue>.*)\))?(, (\w+ [0-9]{2}|[0-9]{2} \w+))?\s+(?<year>[0-9]{4}):(\s+pp\.)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+),\s+\d+\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+),\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>[ivxl]+)\s+(?<year>[0-9]{4}): pp\.\s+(?<spage>\d+)(-| & )(?<epage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+\((?<series>[0-9ivxl])\)\((?<volume>[ivxl]+)\)\s+(?<year>[0-9]{4}): pp\.\s+(?<spage>\d+)(-| & )(?<epage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
				//exit();
			}
		}
		
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+(\w+\s+)?(?<year>[0-9]{4}):\s+(?<spage>\d+)(-| & )(?<epage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
				//exit();
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>\[.*\.\])\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
				//exit();
			}
		}
		
		// PLoS ONE
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\s+(?<journal>PLoS .*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>e\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
				//exit();
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\s+(?<journal>.*),\s+(?<volume>\d+),\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)\./u', $obj->publication, $m))
			{
				//print_r($m);
				echo "-- " . __LINE__ . "\n";
				$matched = true;
				//exit();
			}
		}
		
		
		// Chunioteuthis. Eine neue Cephalopodengattung. Zoologischer Anzeiger Leipzig, 46 1916: (349-359)
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)-(?<epage>\d+)\)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		

		if (!$matched)
		{
			if (preg_match('/\[Title unknown.\]\s+(?<journal>.*),\s+(?<volume>([ivxl]+|\d+)(\((?<issue>.*)\))?\s+)?(?<year>[0-9]{4}): Unpaginated./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		// [Title unknown.] Annals of Natural History, (5)(xix) 1887: Unpaginated.  172 [Zoological Record Volume 24]
		if (!$matched)
		{
			if (preg_match('/\[Title unknown.\]\s+(?<journal>.*),\s+\((?<series>[0-9ivxl])\)\((?<volume>[ivxl]+)\)\s+(?<year>[0-9]{4}): Unpaginated./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\)),\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>[ixcvl]+)\s+(?<year>[0-9]{4}):\s+(pp.\s*)?(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\)),\s+(\w+-\w+)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\)),\s+\d+\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\)),\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+),/u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)[,|.]/u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>A world catalogue of Chironomidae \(Diptera\). Part 2. Orthocladiinae \(Section A\))\.(.*)\s+(?<year>[0-9]{4}):\s+([ixv\-,\s]+)(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}

		if (!$matched)
		{
			if (preg_match('/(?<title>\[.*\])\s+(?<journal>.*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		// Etude des coleopteres Lathridiidae de l'Afrique intertropicale. Annls Mus. r. Afr. cent. (Ser. 8) No. 184 1970: 1-47.  24 [Zoological Record Volume 107]
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>Annls Mus. r. Afr. cent.)\s+\(Ser.\s+(?<series>\d+)\)(\s+No.)?\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)[,|.]/u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		

		// extra
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>Annls Soc. ent. Fr. \(N.S.\))\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)[,|.]/u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		
		// Phumosia spangleri, a new species from Uganda, and redescription of Phumosia lesnei (Seguy) from Mozambique (Diptera: Sarcophagidae, Calliphorinae). Novos Taxa ent. No. 81 1970: 1-17.  3 [Zoological Record Volume 107]
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)(\s+No.)?\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)[,|.]/Uu', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
			}
		}
		



		// Chapter
		if (!$matched)
		{
			if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<year>[0-9]{4}):\s+([ixv\-,\s0-9]+)\.\s+Chapter pagination:\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
			{
				echo "-- " . __LINE__ . "\n";
				$matched = true;
				$chapter = true;
			}
		}

		/*
		// If all fails just get year
		if (!$matched)
		{
			if (preg_match('/\s+(?<year>[0-9]{4}):\s+/Uu', $obj->publication, $m))
			{
				//print_r($m);
				$matched = true;
			}
		}
		*/
		
		
		if (!$matched)
		{
			$kill = true;
			if (!preg_match('/^Description of two new/', $obj->publication))
			{
				$kill = false;
			}
			if (!preg_match('/^Erebidae,Arctiinae/', $obj->publication))
			{
				$kill = false;
			}
			
			if ($kill)
			{
				echo "\n****NOT MATCHED\n";
				exit();
			}
		}
		
		
		if ($matched)
		{
			$obj->publicationParsed = (($matched && $m['journal']) ? 'Y' : 'N');
			foreach ($m as $k => $v)
			{
				if (!is_numeric($k))
				{
					$obj->${k} = $v;
				}
			}
		
		}
		
		
	}
	
	// Microreference
	$nodeCollection = $xpath->query ('//tdwg_co:microreference');
	foreach ($nodeCollection as $node)
	{
		$obj->microreference = $node->firstChild->nodeValue;
	}
	
	//print_r($obj);
	
	//if ($obj->id >= 5015136)
	
	if (isset($obj->publication))
	{
	
	
		
		$keys = array();
		$values = array();
		
		
		foreach ($obj as $k => $v)
		{
			if ($v != '')
			{
				$keys[] = $k;
				$values[] = "'" . addslashes($v) . "'";
			}
		}
		
		if ($chapter)
		{
			$keys[] = 'isPartOf';
			$values[] = "'Y'";
		}
		
		
		$sql = 'REPLACE INTO `names` ('
			. join(",", $keys) . ') VALUES ('
			. join(",", $values) . ');';
			
		echo $sql . "\n";
		
	/*
	if ($filename == '5246208.xml')
	{
		echo $xml;
		exit();
	}
	*/
		
		
		/*
		if (isset($obj->publication))
		{
			echo "*\t" . $obj->journal . "\t" . $obj->publication . "\n";
		}
		*/
		
		if ($chapter)
		{
			//exit();
		}
	}	
		
			}
		}
		
		
	}
}	

?>
