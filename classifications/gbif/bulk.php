<?php

// Clusters of GBIF taxa in families

require_once (dirname(__FILE__) . '/cluster_utils.php');

//--------------------------------------------------------------------------------------------------
function get_stats($clusters)
{
	$c = new ClusterMap($clusters);
	
	$c->create_sets();
	
	$c->create_graph();
		
	$num_edges = count($c->edges);
	$num_clusters = count($clusters);
	
	$cluster_degrees = array();
	$set_degrees = array();
	foreach ($c->edges as $edge)
	{
		if (!isset($cluster_degrees[$edge[0]]))
		{
			$cluster_degrees[$edge[0]] = 0;
		}
		$cluster_degrees[$edge[0]]++;
	
		if (!isset($set_degrees[$edge[1]]))
		{
			$set_degrees[$edge[1]] = 0;
		}
		$set_degrees[$edge[1]]++;
	}
	
	// Original size of clusters
	$num_original_elements = 0;
	foreach ($clusters as $k => $v)
	{
		$num_original_elements += count($v);
	}
	$num_elements = 0;
	foreach ($c->sets as $k => $v)
	{
		$num_elements += count($v);
	}
	
	// Summary stats
	$max_cluster_degree = 0;
	$max_set_degree = 0;
	
	foreach ($cluster_degrees as $d)
	{
		$max_cluster_degree = max($max_cluster_degree, $d);
	}
	foreach ($set_degrees as $d)
	{
		$max_set_degree = max($max_set_degree, $d);
	}
	
	// output
	echo "\t" . $num_clusters 
		. "\t" . $max_cluster_degree 
		. "\t" . $max_set_degree
		. "\t" . $num_edges
		. "\t" . ($num_clusters/$num_edges)
		. "\t" . $num_original_elements
		. "\t" . $num_elements
		. "\t" . ($num_original_elements - $num_elements)
		. "\t" . (1 - ($num_original_elements - $num_elements)/$num_original_elements)
		. "\n";
		

}



$order = 'Chiroptera Blumenbach, 1779';

// lizards snakes
//$order = 'Squamata Oppel, 1811';

// frogs
//$order = 'Anura';

// Gymnophiona
//$order = 'Gymnophiona';


//$order = 'Diptera'; // mess
//$order  = 'Lepidoptera';

$order = 'Coleoptera Linnaeus, 1758';

$order = 'Hymenoptera';

// Mammals select `order` from taxon where `parentNameUsageID`=359 and taxonRank='order' order by `canonicalName`
$orders = array(
'Afrosoricida Stanhope, 1998',
'Artiodactyla Owen, 1841',
'Carnivora Bowdich, 1821',
'Cetacea Brisson, 1762',
'Chiroptera Blumenbach, 1779',
'Cingulata Illiger, 1811',
'Dasyuromorphia Gill, 1872',
'Dermoptera Illiger, 1811',
'Didelphimorphia Gill, 1872',
'Diprotodontia Owen, 1866',
'Erinaceomorpha Gregory, 1910',
'Hyracoidea Huxley, 1869',
'Lagomorpha Brandt, 1855',
'Macroscelidea Butler, 1956',
'Microbiotheria Ameghino, 1889',
'Monotremata Bonaparte, 1837',
'Notoryctemorphia Kirsch in Hunsaker, 1977',
'Paucituberculata Ameghino, 1894',
'Peramelemorphia Ameghino, 1889',
'Perissodactyla Owen, 1848',
'Pholidota Weber, 1904',
'Pilosa Flower, 1883',
'Primates Linnaeus, 1758',
'Proboscidea Illiger, 1811',
'Rodentia Bowdich, 1821',
'Scandentia Wagner, 1855',
'Sirenia Illiger, 1811',
'Soricomorpha Gregory, 1910',
'Tubulidentata Huxley, 1872'
);


// amphibia
$orders=array(
'Anura',
'Caudata',
'Gymnophiona'
);

// reptiles
// select `order` from taxon where `parentNameUsageID`=358 and taxonRank='order' order by `canonicalName`
$orders=array(
'Crocodylia',
'Rhynchocephalia',
'Squamata Oppel, 1811',
'Testudines Linnaeus, 1758'
);

// insects
//  select `order` from taxon where `parentNameUsageID`=216 and taxonRank='order' order by `canonicalName`
$orders=array(
'Archaeognatha Börner, 1904',
'Blattodea',
'Coleoptera Linnaeus, 1758',
'Dermaptera De Geer, 1773',
'Diptera',
'Embioptera',
'Ephemeroptera',
'Grylloblattodea',
'Hemiptera Linnaeus, 1758',
'Hymenoptera',
'Isoptera Brullé, 1832',
'Lepidoptera',
'Mantodea',
'Mantophasmatodea Zompro, Klass, Kristensen & Adis, 2002',
'Mecoptera',
'Megaloptera',
'Neuroptera',
'Odonata Fabricius, 1793',
'Orthoptera',
'Phasmida',
'Phthiraptera Haeckel, 1896',
'Plecoptera',
'Psocoptera',
'Raphidioptera Martynov, 1938',
'Siphonaptera',
'Strepsiptera Kirby, 1813',
'Thysanoptera Haliday, 1836',
'Trichoptera',
'Zoraptera Silvestri, 1913',
'Zygentoma Börner, 1904'
);

echo "Order\tFamily\tNum Genera\tCluster degree\tSet degree\tNum Edges\tFit\tBefore\tAfter\tGrouped\tGroup Fit\n";

foreach ($orders as $order)
{

	$families = get_families_by_order($order);
	
	
	foreach ($families as $family)
	{
		
		$clusters = get_clusters($family);
		
		if (count($clusters) > 0)
		{
			echo $order . "\t";
			echo $family;
			get_stats($clusters);
		}
	
	}
}



?>