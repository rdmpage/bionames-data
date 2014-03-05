<?php

require_once(dirname(__FILE__).'/config.inc.php');
require_once(dirname(__FILE__).'/lib/nusoap.php');

//--------------------------------------------------------------------------------------------------
/**
 * @brief Call uBio's SOAP service to find all names in text
 *
 * @param Text The text to search.
 */
function ubio_findit($text)
{
	global $config;
	$names = array();
	
	$client = new nusoap_client('http://names.ubio.org/soap/', 'wsdl',
				$config['proxy_name'], $config['proxy_port'], '', '');
	
	
	$err = $client->getError();
	if ($err) 
	{
		return $names;
	}
	// This is vital to get through Glasgow's proxy server
	$client->setUseCurl(true);
	
	$param = array(
		'url' => '',
		'freeText' => base64_encode($text),
		'strict' => 0,
		'threshold' => 0.5
		);			

	$proxy = $client->getProxy();
	
	if ($proxy == null)
	{
		echo "-- SOAP proxy failed\n";
	}
	
	$result = $proxy->findIT(
		$param['url'], 
		$param['freeText'], 
		$param['strict'], 
		$param['threshold']
		);
		
	
	// Check for a fault
	if ($proxy->fault) 
	{
		print_r($result);
	} 
	else 
	{
		// Check for errors
		$err = $proxy->getError();
		if ($err) 
		{
		}
		else 
		{
			// Display the result
			//print_r($result);
			
			// Extract names
			$xml = $result['returnXML'];
			
			// Fix entities
			$xml = str_replace("&Atilde;", "Ã", $xml );
			$xml = str_replace("&shy;", '-', $xml);
			$xml = str_replace("&copy;", '©', $xml);
			
			//echo $xml;
		
			if ($xml != '')
			{
			
				if (PHP_VERSION >= 5.0)
				{
					$dom= new DOMDocument;
					$dom->loadXML($xml);
					$xpath = new DOMXPath($dom);
					$xpath_query = "//allNames/entity";
					$nodeCollection = $xpath->query ($xpath_query);
					$nameString = '';
					
					foreach($nodeCollection as $node)
					{
						foreach ($node->childNodes as $v) 
						{
							$name = $v->nodeName;
							if ($name == "nameString")
							{
								$nameString = $v->firstChild->nodeValue;
								$names[$nameString]['nameString'] = $v->firstChild->nodeValue;
							}
							if ($name == "score")
							{
								$names[$nameString]['score'] = $v->firstChild->nodeValue;
							}
							if ($name == "namebankID")
							{
								$names[$nameString]['namebankID'] = $v->firstChild->nodeValue;
							}
							if ($name == "parsedName")
							{
								// Much grief, we need to attribute of this node
								$n = $v->attributes->getNamedItem('canonical');
								$names[$nameString]['canonical'] = $n->nodeValue;
							}
							
						}
					}
				}
			}
			//print_r($names);
			//echo '</pre>';
		}
	}
//		echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
//		echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
//		echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';

	return $names;
}


function tag_names($names, $text, $binomial = false)
{
	foreach ($names as $n)
	{
		// some names to avoid
		if ($n['nameString'] == 'Gen') break;
	
	
		$nameString = $n['nameString'];
		$canonical = $n['canonical'];
		$namebankID = 0;
		if (isset($n['namebankID']))
		{
			$namebankID = $n['namebankID'];
		}
		$nameString = preg_replace('/([A-Z])\[(.*)\] (.*)/', "$1. $3", $nameString);
		
		$is_uninomial = (strpos($canonical, ' ') === false);
		$go = false;
		if ($is_uninomial && !$binomial)
		{
			$go = true;
		}
		if (!$is_uninomial && $binomial)
		{
			$go = true;
		}
		if ($go)
		{
			$pattern = "/(?<!\">)$nameString(?!<\/ext-link>)(?!\")/";
			$replacement =  md5($canonical);
			
			//echo $pattern . "\n";

			$text = preg_replace($pattern, "<ext-link ext-link-type=\"taxon\" ext-link-id=\"$replacement\">$0</ext-link>", $text);
		}
	}
	

	

	return $text;
}

function tag_all_names($names, $text)
{
	$text = '   ' . $text;
	// do binonials first
	$text = tag_names($names, $text, true);
	// do uninomials
	$text = tag_names($names, $text, false);
	
	foreach ($names as $n)
	{
		$canonical = $n['canonical'];
		$pattern =  "/ext-link-id=\"" . md5($canonical) . "\"/";
		$replacement =  $canonical;
		$text = preg_replace($pattern, "ext-link-id=\"$replacement\"", $text);
		
	}	
	
	$text = trim($text);
	return $text;
}

if (0)
{

// test

$text = 'Philorhizus marggii n. sp. is described from Greece (southern Peloponnese). Type locality: Taygetos Massif, Profitis Illias, N 36°58’/E 022°21’, 2000-2400 m asl. Members of this micropterous species are distinguished from the other Philorhizus species occurring on the Balkans by habitus, the special colouration pattern of the elytra and the special construction of the internal sac of the median lobe. Illustrations of the habitus, the median lobe and its internal sac and a description of the habitat of the new species are presented. A key to all Philorhizus species known from Greece is given. Biogeographic notes on the distribution of micropterous Philorhizus species in the western Palaearctic realm are given. Philorhizus paulo Wrase, 1995 is recorded from France for the first time (East Pyrenees)';

$text = 'The first comprehensive combined molecular and morphological phylogenetic analysis of the major groups of termites is presented. This was based on the analysis of three genes (cytochrome oxidase II, 12S and 28S) and worker characters for approximately 250 species of termites. Parsimony analysis of the aligned dataset showed that the monophyly of Hodotermitidae, Kalotermitidae and Termitidae were well supported, while Termopsidae and Rhinotermitidae were both paraphyletic on the estimated cladogram. Within Termitidae, the most diverse and ecologically most important family, the monophyly of Macrotermitinae, Foraminitermitinae, Apicotermitinae, Syntermitinae and Nasutitermitinae were all broadly supported, but Termitinae was paraphyletic. The pantropical genera Termes, Amitermes and Nasutitermes were all paraphyletic on the estimated cladogram, with at least 17 genera nested within Nasutitermes, given the presently accepted generic limits. Key biological features were mapped onto the cladogram. It was not possible to reconstruct the evolution of true workers unambiguously, as it was as parsimonious to assume a basal evolution of true workers and subsequent evolution of pseudergates, as to assume a basal condition of pseudergates and subsequent evolution of true workers. However, true workers were only found in species with either separate- or intermediate-type nests, so that the mapping of nest habit and worker type onto the cladogram were perfectly correlated. Feeding group evolution, however, showed a much more complex pattern, particularly within the Termitidae, where it proved impossible to estimate unambiguously the ancestral state within the family (which is associated with the loss of worker gut flagellates). However, one biologically plausible optimization implies an initial evolution from wood-feeding to fungus-growing, proposed as the ancestral condition within the Termitidae, followed by the very early evolution of soil-feeding and subsequent re-evolution of wood-feeding in numerous lineages.';

$text = 'The family Kalotermitidae is redescribed. The subfamily names \'Electrotermitinae\' and \'Kalotermitinae\' are placed in synonymy. The fossil genus Eotermes is removed from the family Kalotermitidae and placed in the family Hodotermitidae. 2. Three hundred and fifty-three species, fossil and living, are classified into 24 genera. Of these 24 genera, the following eight are new: Postelectrotermes, Ceratokalotermes, Comatermes, Incisitermes, Marginitermes, Tauritermes, Bifiditermes, and Bicornitermes. The genera Pterotermes, Proneotermes, Allotermes, and Epicalotermes are resurrected. The genus name \'Proglyptotermes\' is relegated to synonymy. All the genera are described, and the generitype species are illustrated. 3. The generic classification is based on a constellation of conservative, adaptive, and regressed characters of both the imago and the soldier castes. 4. The phylogeny of the genera is discussed. The imago-nymph mandible indicates two main evolutionary lines. The first line is represented by the Proelectrotermes-Calcaritermes complex, and the second line by the Incisitermes-Cryptotermes complex. 5. Several cases of convergence are illustrated. In both the main lines of the family Kalotermitidae, the phragmotic head, the enlarged third antennal segment, and the slightly sclerotized median vein have all evolved independently many times. Also, the arolium has been convergently lost in many genera. 6. A discussion on conservative and regressed characters is included. Characters that show phylogenetic advancement or regression are also listed. 7. It is evident from the data on the hosts and Protozoa that the evolution of the genera of the Protozoa did not occur in conjunction with the evolution of the host genera and that the differentiation of the Protozoa genera took place before the differentiation of the host genera.';

$text = '            <p>In all of the 14 acanthosomatid species listed in Additional file <supplr sid="S1">1</supplr>, well-developed crypts were found in the fourth section of the midgut (<it>Elasmostethus humeralis </it>and its midgut are shown in Figure <figr fid="F1">1A&#8211;C</figr>). The midgut crypts were white in color and arranged in two rows, fused into two-dimensional assemblages and forming a butterfly-shaped organ. When the organs of <it>E. humeralis</it>, <it>Elasmucha signoreti</it>, <it>Sastragala esakii</it>, and <it>Acanthosoma giganteum </it>were subjected to sectioning microscopy, no connection was found between the crypt lumen and the midgut main tract (a section image of the midgut crypt of <it>E. humeralis </it>is shown in Figure <figr fid="F1">1D</figr>).</p>
';

$text = ' <p>The <it>16S rRNA </it>gene sequences originating from the gut symbionts of the acanthosomatid stinkbugs, representing 18 populations, 14 species, and 5 genera, were subjected to molecular phylogenetic analyses together with <it>16S rRNA </it>gene sequences of &#947;-proteobacterial representatives. The acanthosomatid symbionts formed a monophyletic group with high supporting values (100% in Bayesian, 100% in maximum parsimony (MP), and 95% in maximum likelihood (ML), respectively). The phylogenetic relationship of the symbionts was generally in agreement with the systematics of the host insects: the symbionts from congenic host species, <it>Elasmostethus </it>spp., <it>Elasmucha </it>spp., <it>Sastragala </it>spp., and <it>Acanthosoma </it>spp., formed clades, respectively. The monophyletic group of the acanthosomatid symbionts showed a phylogenetic affinity to the clade of <it>Buchnera</it>, obligate endocellular symbionts of aphids, and also to the clade of <it>Ishikawaella</it>, obligate gut symbionts of plataspid stinkbugs (Figure <figr fid="F3">3</figr>).</p>';

$text = '<p>A diverse array of stinkbugs are associated with gut symbiotic bacteria, most of which are harbored in the lumen of the midgut crypts <abbrgrp><abbr bid="B2">2</abbr><abbr bid="B23">23</abbr><abbr bid="B33">33</abbr></abbrgrp>. Despite these extensive histological descriptions, only a limited number of stinkbug gut symbionts have been microbiologically characterized, including &#947;-proteobacterial <it>Ishikawaella </it>from stinkbugs of the family Plataspidae <abbrgrp><abbr bid="B19">19</abbr></abbrgrp>, &#946;-proteobacterial <it>Burkholderia </it>from broad-headed bugs of the family Alydidae <abbrgrp><abbr bid="B34">34</abbr></abbrgrp>, nocardioform actinomycetes from assassin bugs of the family Reduviidae <abbrgrp><abbr bid="B35">35</abbr></abbrgrp>, and an unnamed &#947;-proteobacterium from the southern green stinkbug <it>Nezara viridula </it>of the family Pentatomidae <abbrgrp><abbr bid="B22">22</abbr></abbrgrp>. Molecular phylogenetic analyses indicated that the clade of the acanthosomatid gut symbionts is related to but distinct from the clade of the plataspid gut symbionts <it>Ishikawaella </it>in the &#947;-<it>Proteobacteria </it>(Figures <figr fid="F3">3</figr> and <figr fid="F4">4</figr>). These results indicate that the bacterial symbiont characterized in this study is specifically associated with the family Acanthosomatidae, and strongly suggest that symbiotic associations with diverse microbes have evolved repeatedly and independently in different stinkbug lineages.</p>';

$text = '<p><italic>Anochetus</italic> and <italic>Odontomachus</italic> were treated globally by
                Brown <xref ref-type="bibr" rid="pone.0001787-Brown1">[1]</xref>, <xref
                    ref-type="bibr" rid="pone.0001787-Brown2">[2]</xref>. This paper revises the
                genera for the Island of Madagascar and also includes new records from the
                Seychelles and Comoro Islands. The revision is based on morphological and CO1
                sequence analysis of 500 individuals. We evaluate the role of DNA barcoding as a
                tool to accelerate species identification and description.</p>
            <p><italic>Anochetus</italic> and <italic>Odontomachus</italic> are closely related
                genera <xref ref-type="bibr" rid="pone.0001787-Brown1">[1]</xref>, <xref
                    ref-type="bibr" rid="pone.0001787-Brady1">[3]</xref>, <xref ref-type="bibr"
                    rid="pone.0001787-Ouellette1">[4]</xref> characterized by long and straight
                mandibles inserted just on either side of the cephalic midline and with two or three
                large teeth near tip arranged in a vertical series (<xref ref-type="fig"
                    rid="pone-0001787-g001">Figure 1a,b</xref>). The single tooth or spine at the
                apex of the petiole separates <italic>Odontomachus</italic> from the closely related
                genus <italic>Anochetus</italic> (which has two teeth or rounded margin).
                    <italic>Odontomachus</italic> and <italic>Anochetus</italic> can also be easily
                distinguished by the characters on the back of the head. With head viewed from back
                near neck of pronotum, <italic>Odontomachus</italic> has dark, inverted V-shaped
                apophyseal lines that converge to form a distinct, sometimes shallow groove or ridge
                on upper back of head. In <italic>Anochetus</italic>, the V-shaped apophyseal lines
                are absent. In the same region of the back of head, however, nuchal carinae in
                    <italic>Anochetus</italic> form an uninterrupted, inverted U-shaped ridge. In
                the field, small members of <italic>Anochetus</italic> might also be mistaken for
                    <italic>Strumigenys</italic>, from which they may be distinguished by their
                one-segmented waist (vs. two segments in <italic>Strumigenys</italic>).</p>
            <fig id="pone-0001787-g001" position="float">
                <object-id pub-id-type="doi">10.1371/journal.pone.0001787.g001</object-id>
                <label>Figure 1</label>
                <caption>
                    <title>oblique dorsal view of head.</title>
                    <p>A, <italic>Anochetus madagascarensis</italic>. B, <italic>Odontomachus
                            coquereli</italic>.</p>
                </caption>
                <graphic xlink:href="info:doi/10.1371/journal.pone.0001787.g001" alt-version="no"
                    mimetype="image" position="float" xlink:type="simple"/>
            </fig>';
            
$text = '<p>Diagnostic base pairs (or combination of base pairs) for each species within the
                    Malagasy region are presented. This more cladistic interpretation of the DNA
                    barcode data is very sensitive to the number of specimens analyzed – and the
                    fewer specimens incorporated, the greater the likelihood that a rare haplotype
                    is not reflected in the data. We present this method of analysis not to that our
                    coverage of each species is sufficient to reflect the variation within a
                    species, but rather to demonstrate that such an analysis is possible within a
                    group of taxa or region, when there is good representation of the variability
                    within a species. The nucleotide position given refers to the barcode region,
                    and can be compared to their full mitochondrial position by adding 48 (as
                    aligned to the <italic>Bos taurus</italic> complete mitochondrial genome
                    sequence Genbank ref AY676873). The standard IUPAC ambiguity codes are used to
                    denote intra-specific variation.</p>
                <p>Complementary genetic analyses. In addition to the CO1 barcode, for some
                    specimens we amplified portions of the rRNA gene regions: 18S, 28S (D2) and
                    ITS1. Within the variable D2 region of 28S, the forward primer corresponds to
                    positions 3549–3568 in <italic>Drosophila melanogaster</italic> reference
                    sequence (Genbank M21017). Within the 18S sequence, the forward primer
                    corresponds to positions 375–406 in <italic>Drosophila melanogaster</italic>
                    reference sequence while the ITS1 sequence was generated using primers where the
                    forward primer corresponds to positions 1822–1843 in <italic>Drosophila
                        melanogaster</italic> reference sequence. Representative sequences have been
                    deposited in Genbank: 18S: EU041960-EU042009; 28S: EU042010-EU042038,
                    EU073708:EU073711; ITS1: EU042039-EU042097, EU073664: EU073707). Primers used to
                    generate these fragments are listed in <xref ref-type="table"
                        rid="pone-0001787-t001">Table 1</xref>. In some cases we utilized a standard
                    PCR diagnostic to test for <italic>Wolbachia</italic>
                    <xref ref-type="bibr" rid="pone.0001787-Braig1">[20]</xref>.
                    <italic>Wolbachia</italic> are obligate intracellular endosymbiotic bacteria
                    that cause reproductive incompatibility between infected and uninfected
                    lineages, resulting in an increased proportion of infected maternal lineages
                    that cannot reproduce.</p>';
/*

$text = '<p>In a few cases, we detected deep divergences among individuals that had been assigned to single species. Two lineages, one in the Laurentian Great Lakes area and another one in the St Lawrence River and diverging from 1% to 2% from each other were observed in five species including the common shiner (<italic>Luxilus cornutus</italic>), fathead minnow (<italic>Pimephales promelas</italic>), finescale dace (<italic>Phoxinus neogaeus</italic>), golden shiner (<italic>Notemigonus crysoleucas</italic>) and fantail darter, <italic>Etheostoma flabellare</italic> (<xref ref-type="supplementary-material" rid="pone.0002490.s002">Appendix S2</xref>). The same pattern was found among samples from the brook stickleback <italic>Culaea inconstans</italic> and the redfin pickerel, <italic>Esox americanus</italic>, where the divergence was even greater as it reached 7% and 3%, respectively. This result supports a genetic differentiation of the two <italic>Esox americanus</italic> subspecies <italic>E. americanus americanus</italic> from the St Lawrence River and <italic>E. americanus vermiculatus</italic> from the Laurentian Great Lakes area to the west. Although a single haplotype was found for each subspecies, more genetic divergence was observed between these two subspecies than with <italic>Esox niger</italic> since <italic>E. americanus</italic> was paraphyletic with its genealogy encompassing that of <italic>Esox niger</italic>. Likewise, a lineage found in the Pacific coast and diverging by 1.5% from the eastern samples was observed in the mottled sculpin, <italic>Cottus bairdii</italic>. Moreover, the Pacific lineage of <italic>C. bairdii</italic> was more closely related to the slimy sculpin, <italic>Cottus cognatus</italic>, than other conspecific samples. This suggests that a careful reappraisal of the current taxonomy for these groups could prove informative.</p><p>Cases of shared barcode haplotypes were detected in 13 (7%) of the species analysed including the following pairs: between the lampreys <italic>Ichthyomyzon fossor</italic> and <italic>I. unicuspis</italic>, between the shiners <italic>Notropis volucellus</italic> and <italic>N. buchanani</italic>, between the shad <italic>Alosa aestivalis</italic> and <italic>A. pseudoharengus</italic>, between the putative species in the cisco species flock, <italic>Coregonus artedi</italic>, <italic>C. hoyi</italic>, <italic>C. kiyi</italic>, <italic>C. nigripinnis</italic> and <italic>C. zenithicus</italic>; and, between the darters <italic>Etheostoma nigrum</italic> and <italic>E. olmstedi</italic>. Nevertheless, we only found evidence of introgressive hybridisation between two diverging species in the case of the darters <italic>Etheostoma nigrum</italic> and <italic>E. olmstedi</italic> with two clades diverging by nearly 6%, each one more closely associated with one of the two species. In all the other cases, COI sequences of the mixed species were tightly clustered and differed by less than 0.1% divergence (<xref ref-type="table" rid="pone-0002490-t002">Table 2</xref>).</p></sec><sec id="s4"><title>Discussion</title><p>This study has shown the efficacy of COI barcodes for diagnosing North American freshwater fishes since most species examined here corresponded to a single, cohesive array of barcode sequences that are distinct from those of any other species. The success of the barcoding approach depends on the distribution of genetic distances between conspecific individuals and heterospecific individuals given that failures in barcode clustering are proportional to the overlap between both distributions <xref ref-type="bibr" rid="pone.0002490-Meyer1">[46]</xref>. It has been shown that lineages diversify more quickly within species than between species <xref ref-type="bibr" rid="pone.0002490-Pons2">[47]</xref>. This is due to the fact that diversification within species is driven by mutation at a rate higher than speciation within lineages. Hence, the branch length between species tends to be much deeper than between conspecific individuals leading to a gap in the distribution of the pairwise distance between conspecific individuals and between species that has been referred to the barcoding gap <xref ref-type="bibr" rid="pone.0002490-Meyer1">[46]</xref>. The COI locus harbours a high mutational rate even for mtDNA <xref ref-type="bibr" rid="pone.0002490-Saccone1">[48]</xref>. The present study confirms that, in the vast majority of the taxa examined here (93%), the barcoding gap was observed and the mean genetic distance between conspecifics was generally much smaller than the average distance between individual from distinct species, even if only the sister species were considered.</p><p>Although barcode analyses primarily seek to delineate species boundaries at the COI locus for the assignment of unknown individuals to known species, unsuspected diversity and overlooked species are often detected through barcodes analyses, sometimes spectacularly <xref ref-type="bibr" rid="pone.0002490-Kerr1">[10]</xref>, <xref ref-type="bibr" rid="pone.0002490-Hebert4">[18]</xref>, <xref ref-type="bibr" rid="pone.0002490-Pons2">[47]</xref>. The average distance between conspecific individuals was around 0.3% while average NND and average distance between congeneric species were 7.5% and 8.3%, respectively. When screening for species splits using a threshold of 1% (3 fold higher than the average intraspecific variability), nine species exhibited lineages falling out of the average divergence between conspecific individuals.</p><p>Among the set of 190 species, however, 13 species (7%) exhibited barcode sequences that were shared or overlapped with those of other species. Regarding these cases, at least three factors may be involved <xref ref-type="bibr" rid="pone.0002490-Funk1">[30]</xref>, <xref ref-type="bibr" rid="pone.0002490-Meyer1">[46]</xref>. First, the establishment of reciprocal monophyly between two sister species is a function of time given that fixation of a new coalescent follow the line of descent framework from the coalescent theory <xref ref-type="bibr" rid="pone.0002490-Kingman1">[49]</xref>, <xref ref-type="bibr" rid="pone.0002490-Tajima1">[50]</xref>. Second, the taxa may share polymorphism due to introgressive hybridisation. If hybridisation is due to secondary contact after a stage of isolation and genetic drift, introgressive hybridisation may be detected due to the presence of two divergent clusters, each one being found predominantly in one species or the other. Finally, the barcoding approach first examines species delineation through COI barcodes for species established generally through a traditional approach of taxonomy using phenotypes. Some of the pairs with overlapping barcodes, however, may be a single species. Alternatively, the use of uniform threshold may be a source of error leading to erroneous assignment of individuals to species <xref ref-type="bibr" rid="pone.0002490-Hickerson1">[51]</xref>, <xref ref-type="bibr" rid="pone.0002490-Meier1">[52]</xref>. In the present case, 34 species would have been undetected by using a 1% threshold. Providing that seven species share polymorphism or harbour mixed genealogy, 24 species with monophyletic COI lineages would have been overlooked with a 1% threshold. Yet, the development of assignment tools based on more realist probabilistic models under a coalescent framework will likely solve this problem and enhanced the statistical power of individual assignment through the use of a single gene <xref ref-type="bibr" rid="pone.0002490-Abdo1">[53]</xref>, <xref ref-type="bibr" rid="pone.0002490-Nielsen1">[54]</xref>.</p><p>The present study is the first to assess the resolution of barcoding for freshwater fish species from a variety of primary freshwater groups. It is widely appreciated that the fragmentation of the rivers and lakes from continental freshwater network leads to more pronounced genetic structure among populations and deeper divergence among haplotypes than in the marine realm <xref ref-type="bibr" rid="pone.0002490-Ward2">[38]</xref>. In the largest barcoding study conducted so far on marine fishes to date <xref ref-type="bibr" rid="pone.0002490-Ward1">[7]</xref>, the average observed distance between conspecifics was 0.4% while the average divergence reached 9.9% between congeneric species. However, the average distance between conspecifics and congeneric species reached 0.3% and 8.3%, respectively, for freshwater fishes in this study, a pattern strikingly similar to that of marine fishes. Although geographic structure was often detected here among populations, the present survey suggests that the higher geographic structure of freshwater fishes is not necessarily reflected in deeper intraspecific and interspecific divergence than marine species. Although, we failed to capture a substantial amount of population diversity through the present sampling, it remains unlikely that sampling artefacts alone can account for similar intraspecific divergences found among freshwater and marine species. Admittedly however, the Canadian freshwater fish fauna may not be representative of old established population diversity since most of the rivers and lakes of the country have been colonised after the glacial retreat at the end of the Pleistocene <xref ref-type="bibr" rid="pone.0002490-Bernatchez1">[55]</xref>.</p><p>In summary, most of the North American freshwater fish species analysed here exhibit a similar pattern of genetic diversity at COI, each being a single cluster of tightly related mtDNA sequences distinct from all other species. Therefore, the present survey supports the view that the use of COI barcodes is a powerful tool for species identification. Using this method would clearly allow the identification of individually isolated freshwater fish eggs, larvae, fillets and fins, hence providing many news tools useful for the practice of conservation and forensics genetic in these freshwater fishes. From a systematic perspective, COI barcodes provide a new and fast approach for screening the real number of species characterised by private sets of diagnostic characters. The identification of several cases of polyphyletic or paraphyletic COI species genealogy further supports the view that an iterative process of DNA barcoding followed by taxonomic analyses using other characters will be a productive way to catalogue biodiversity <xref ref-type="bibr" rid="pone.0002490-Kerr1">[10]</xref>, <xref ref-type="bibr" rid="pone.0002490-Barber1">[56]</xref>. The present data set coupled with the functionality in BOLD provides a tool that is already operational for molecular assisted identification of the Canadian species. The entire cataloguing of the North American freshwater fish fauna, which is currently being undertaken by FISH-BOL, will result in a significant improvement of our knowledge concerning the systematic of the freshwater fishes of the region and also facilitate monitoring changes in the geographic distribution of species that will probably occur in the future.</p>';

*/

$qtext = strip_tags($text);

$names = ubio_findit($qtext);

print_r($names);



//$stext = str_replace("\n", " ", $text);
//$stext = preg_replace("/\s\s*/", " ", $stext);
//echo tag_all_names($names, $stext);


}


?>