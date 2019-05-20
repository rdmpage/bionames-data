<?php

require_once (dirname(dirname(dirname(__FILE__))) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$journal = 'Proceedings of the Entomological Society of Washington';
$journal = 'Proceedings of the Biological Society of Washington';
//$journal = 'Entomological News%';
$journal = 'Zool% Anz%';
$journal = 'Novitates Zoologicae';
$journal = 'Bulletin of the British Museum (Natural History) Entomology';
$journal = 'Canadian Entomologist';
$journal = 'Journal of Natural History';
$journal = 'Copeia';
$journal = 'Japanese journal of entomology';
$journal = 'Great Basin Naturalist';
$journal = 'Int% J% Ent%';
$journal = 'Copeia%';

// -- done(ish)

$journal = 'Proceedings of the Biological Society of Washington';
$journal = 'Proceedings of the Entomological Society of Washington';

$journal = 'Journal of Natural History';
$journal = 'Systematic Entomology';

$journal = 'Raffles Bulletin of Zoology';
$journal = 'Crustaceana%';
$journal = 'Invertebrate Taxonomy';
$journal = 'Deutsche Entomologische Zeitschrift';
$journal = 'Zoological Studies';

$journal = 'Proceedings of the United States National Museum';

$journal = 'Copeia';

$journal = 'Proceedings of the Linnean Society of New South Wales';

$journal = 'American Museum Novitates';
$journal = 'Spixiana';

$journal = 'Revista Brasileira de Entomologia';

$journal = 'Entomological News Philadelphia';
$journal = 'Memorias do Instituto Oswaldo Cruz';

$journal = 'Papeis Avulsos de Zoologia (Sao Paulo)';

$journal = 'European Journal of Entomology';

$journal = 'Journal of Marine Science and Technology';
$journal = 'Bulletin of the Kanagawa Prefectural Museum Natural Science';

$journal = 'ZEITSCHRIFT FUER PARASITENKUNDE';

$journal = 'Journal of the Royal Society of New Zealand';

$journal = 'Canadian Entomologist';

$journal = 'Records of the Australian Museum';
$journal = 'Novitates Zoologicae';
$journal = 'Journal of the New York Entomological Society';
$journal = 'Transactions of the Royal Entomological Society of London';


$journal = 'Journal of Natural History';
$journal = 'Australian Journal of Zoology';

$journal = 'Journal of Orthoptera Research';
$journal = 'Coleopterists Bulletin';
$journal = 'Canadian Journal of Zoology';
$journal = 'Journal of Arachnology';

$journal = 'Journal of Protozoology';

$journal = 'Psyche%';

$journal = 'Journal of Medical Entomology';

$journal = 'Crustaceana';
$journal = 'Crustaceana (Leiden)';

$journal = 'Proceedings of the Biological Society of Washington';


$journal = 'Annals & Magazine of Natural History Series 12';

$journal = 'Japanese journal of entomology';
$journal = 'Zoosystema';

$journal = 'Journal of East African Natural History';

$journal = 'International Journal for Parasitology';

$journal = 'Deutsche Entomologische Zeitschrift';
$journal = 'Journal of the Kansas Entomological Society';
$journal = 'Insect Systematics & Evolution';
$journal = 'Species Diversity';

$journal = 'Proceedings of the Biological Society of Washington';

$journal = 'Journal of Paleontology';

$journal = 'Records of the Western Australian Museum';
$journal = 'Transactions of the American Entomological Society';
$journal = 'Zoological Journal of the Linnean Society';
$journal = 'Can% Ent%';

$journal = 'Journal of Asia-Pacific Entomology';

$journal = 'Proceedings of the Entomological Society of Washington';

$journal = 'Acta Arachnol Tokyo';
$journal = 'Acta Arachnologica';

$journal = 'Spixiana';

$journal = 'Psyche%';

$journal = 'Proceedings of the Biological Society of Washington';

$journal = 'Systematic Parasitology';
$journal = 'Breviora';

$journal = 'J Nat Hist';
$journal = 'Journal of Natural History';
$journal = 'Bulletin of the American Museum of Natural History';
$journal = 'Bulletin of the British Museum (Natural History) Entomology';


//$journal = 'Systematic Ent';

$journal = 'Journal of the Marine Biological Association of the United Kingdom';
$journal = 'Deutsche Entomologische Zeitschrift';

$journal = 'Asiatic Herpetological Research';

$journal = 'Bulletin Br Mus nat Hist (Ent)';
$journal = 'Bull Br Mus nat Hist (Ent)';
$journal = 'Empididae Bull Br Mus nat Hist London (Ent)';
$journal = 'Bulletin Br Mus nat Hist Ent';

$journal = 'Journal of Parasitology';

$journal = 'Proceedings of the Linnean Society of New South Wales';

$journal = 'International Journal of Acarology';
$journal = 'Journal of Vertebrate Paleontology';
$journal = 'Mitteilungen aus dem Zoologischen Museum in Berlin';
$journal = 'Proceedings of the Zoological Society of London';
$journal = 'Journal of the New York Entomological Society';
$journal = 'Hydrobiologia';

$journal = 'Neotropical Ichthyology';
$journal = 'Annals of the Entomological Society of America';
//$journal = 'Transactions of the Royal Entomological Society of London';

$journal = 'Bulletin of Entomological Research';
$journal = 'Nematologica';
$journal = 'Aquatic Insects';
$journal = 'New York Bulletin of the American Museum of Natural History';
$journal = 'Zoologischer Anzeiger';

$journal = 'Transactions of the American Entomological Society';
$journal = 'Zoologica Scripta';
$journal = 'Zoologica Scr';

$journal = 'Smithsonian Contributions to Zoology';

$journal = 'Journal of the Kansas Entomological Society';
$journal = 'Transactions of the Entomological Society of London';
$journal = 'Journal of the Australian Entomological Society';
$journal = 'Australian Journal of Entomology';
$journal = 'Florida Entomologist';
$journal = 'Entomologica Scandinavica';

$journal = 'Proceedings of the Linnean Society of New South Wales';

$journal = 'African Journal of Herpetology';
$journal = 'Annals of the Natal Museum';
$journal = 'Annals of the Natal Government Museum';
$journal = 'European Journal of Entomology';
$journal = 'ZooKeys';

$journal = 'Coleopterists Bulletin';
$journal = 'Records of the Australian Museum';

$journal = 'Journal of Hymenoptera Research';

$journal = 'Tijdschrift voor Entomologie';

$journal = 'Iheringia Serie Zoologia';
$journal = 'Pacific Science';

$journal = 'Novitates Zoologicae Tring';

$journal = 'Asiatic Herpetological Research';

$journal = 'African Entomology';

//$journal = 'Proceedings of the Academy of Natural Sciences of Philadelphia';
//$journal = 'Journal Parasit';

$journal = 'Fieldiana Zoology';

$journal = 'Journal of the Fisheries Research Board of Canada';
$journal = 'Bulletin of Marine Science';

$journal = 'American Museum Novitates';

$journal = 'Tijdschrift voor Entomologie Amsterdam';

$journal = 'Scientia Marina';

$journal = 'Revue Zoologique Africaine';
$journal = 'Entomological News';

$journal='Tijdschr. Ent.';

$journal = 'Bulletin of the American Museum';

$journal = 'Zoosystematics and Evolution';
$journal = 'Journal Herpet';
$journal = 'Australian J Zool';
$journal = 'Journal of Zoological Systematics and Evolutionary Research';

$journal = 'Annales de la Societe Entomologique de Belgique';

$journal = 'Proceedings of the Zoological Society of London';

$journal = 'Crustacean Research';
$journal = 'Records of the Indian Museum';

$journal = 'Florida Entomologist Gainesville';
$journal = 'Journal of the Kansas Entomological Society';

$journal = 'Bulletin of the American Museum of Natural History';

$journal = 'Proceedings of the United States National Museum Washington';

$journal = 'Annals & Magazine of Natural History Series 12';
$journal = 'Annals & Magazine of Natural History Series 8';
$journal = 'Annals & Magazine of Natural History Series 13';
$journal = 'Annals & Magazine of Natural History Series 10';
$journal = 'Annals & Magazine of Natural History Series 11';
$journal = 'Annals & Magazine of Natural History Series 9';


$journal = 'Japanese journal of entomology';
$journal = 'Entomological science';
$journal = 'Kontyu';
$journal = 'Experientia';

$journal = 'Journal of Paleontology';

$journal = 'Insecutor Inscitiae Menstruus';

$journal = 'Organisms Diversity & Evolution';

$journal = 'Proceedings of the Zoological Society';

$journal = 'Acta Palaeontologica Polonica';

$journal = 'Transactions of the Lepidopterological Society of Japan';
$journal = 'Kontyu Tokyo';
//$journal = 'Tyo to Ga';

$journal = 'Bulletin of the National Science Museum Series A (Zoology)';

$journal = 'African Invertebrates';
$journal = 'South African Journal of Zoology';

$journal = 'Annals of the Transvaal Museum';

$journal = 'Parasitology';

$journal = 'Folia Parasitologica';
$journal = 'Folia Parasitologica (Ceske Budejovice)';

$journal = 'Acta Zoologica Academiae Scientiarum Hungaricae';
$journal = 'J Nematol';
$journal = 'Journal of Nematology';
$journal = 'Revue de Nematologie';
$journal = 'Fundamental and Applied Nematology';

$journal = 'Insecta Mundi';

$journal = 'Bulletin of the Natural History Museum Zoology Series';
$journal = 'Acta Zootaxonomica Sinica';
$journal = 'Records of the Indian Museum';

$journal = 'Trans. Am. microsc. Soc.';

$journal = 'Revue Suisse de Zoologie';

$journal = 'Acta Zoologica Cracoviensia';
//$journal = 'Acta Zoologica Cracoviensia Ser B-Invertebrata';

$journal = 'Journal of Mammalogy';
$journal = 'Journal of Zoology (London)';
$journal = 'Nature (London)';
$journal = 'Mammalia';
$journal = 'Bulletin of the British Museum (Natural History) Zoology';
$journal = 'Australian Mammalogy';
$journal = 'Mammalian Biology';

$journal = 'Mitteilungen aus dem Museum fuer Naturkunde in Berlin Zoologische Reihe';

$journal = 'Proceedings of the California Academy of Sciences';
$journal = 'Journal of the Entomological Society of Southern Africa';
//$journal = 'Bulletin of Entomological Research London';
//$journal = 'Bull Ent Res';

$journal = 'Biol Bull';

$journal = 'Records Austr Mus';
$journal = 'Turkish Journal of Zoology';

$journal = 'Transactions of the Linnean Society 2nd Ser Zoology London';

$journal = 'Japanese Journal of Ichthyology';

$journal = 'Transactions of the Zoological Society of London';
$journal = 'New Zealand Journal of Zoology';

$journal = 'Venus (Tokyo)';
$journal = 'Zoological Science (Tokyo)';
$journal = 'Zoological Magazine Tokyo';
$journal = 'Entomotaxonomia';
$journal = 'Entomologia Sinica';
$journal = 'Annals of Natural History';

$journal = 'Transactions of the Zoological Society';
$journal = 'Ibis London';

$journal = 'Journal of the New York Entomological Society';

$journal = 'Proceedings of the Academy Philadelphia';
$journal = 'Zoological Research';
$journal = 'Notes from the Leyden Museum';

$journal = 'Archiv fuer Molluskenkunde';

$journal = 'Tulane Studies in Zoology';
$journal = 'Zootaxa';

$journal = 'Records of the Indian Museum';
$journal = 'Memoirs of the Indian Museum';
$journal = 'Tijdschr Ent Amsterdam';

$journal = 'University of Kansas Science Bulletin';
$journal = 'Journal Nat Hist';

$journal = 'Comptes Rendus de l\'Academie des Sciences Serie II A Sciences de la Terre et des Planetes';
$journal = 'Comptes Rendus de l\' Academie des Sciences Serie II A Sciences de la Terre et des Planetes';

$journal = 'Annals & Magazine of Natural History';

$journal = 'Annals of the South African Museum';

$journal = 'Journal of the Marine Biological Association of the United Kingdom';

$journal = 'University of Kansas Science Bulletin';
$journal = 'Kansas University Science Bulletin';
$journal = 'Marine Biodiversity';
$journal = 'Contributions to Zoology';

$journal = 'Journal of the Linnean Society';

$journal = 'American Naturalist';
$journal = 'Zoological Journal of the Linnean Society';
$journal = 'Biological Journal of the Linnean Society';
$journal = 'Journal of the Linnean Society Zoology';
$journal = 'Journal of the Linnean Society London Zoology';
//$journal = 'Journal of the Linnean Society';

$journal = 'Ohio Journal of Science';

$journal = 'Bulletin Br Mus nat Hist (Zool)';
$journal = 'New Zealand Journal of Marine and Freshwater Research';

$journal = 'Bulletin of Marine Science';

$journal = 'Revista de Biologia Tropical';

$journal = 'Annalen des Naturhistorischen Museums in Wien Serie B Botanik und Zoologie';

$journal = 'American Museum Novitates';
$journal = 'Zoologischer Anzeiger';
$journal = 'Zoologischer Anzeiger Leipzig';
$journal = 'Herpetologica';

$journal = 'Journal Aust Ent Soc';
$journal = 'Transactions of the American Entomological Society';

$journal = 'Zool. J. Linn. Soc.';
$journal = 'Journal of the Kansas Entomological Society';
$journal = 'American Naturalist';
$journal = 'American Journal of Science';
$journal = 'Entomological News Lancaster';
$journal = 'Annals & Magazine of Natural History';

$journal = 'Archivos do Museu Rio de Janeiro';

$journal = 'Nachrichtenblatt der Bayerischen Entomologen';
$journal = 'Southwestern Naturalist';
$journal = 'Copeia Ann Arbor';
$journal = 'Annals ent Soc Am';

$journal = 'Nova Caledonia';
$journal = 'Transactions of the Zoological Society London';

$journal = 'Proceedings of the Royal Society Biological Sciences Series B';

$journal = 'Arkiv for Zoologi Stockholm';
$journal = 'Parasite';

$journal = 'Annals & Magazine of Natural History London 1926 (9)';
$journal = 'Annals & Magazine of Natural History London';
$journal = 'Annals of Natural History';
//$journal = 'Annals & Magazine of Natural History London';
//$journal = 'Annals & Magazine of Natural History Series 12';

$journal = 'Transactions of the Entomological Society of London';
$journal = 'Transactions of the Royal Entomological Society of London';
$journal = 'Polar Biology';

$journal = 'Transactions of the San Diego Society for Natural History';

$journal = 'Proceedings of the Royal Entomological Society of London (B)';
$journal = 'Proceedings of the Royal Entomological Society of London';

$journal = 'Memorias do Instituto Oswaldo Cruz';

$journal = 'Leiden Notes Mus Jentink';

$journal = 'Proceedings of the Entomological Society of Washington DC';

$journal = 'Internationale Revue der Gesamten Hydrobiologie';
$journal = 'Int Revue ges Hydrobiol';
$journal = 'Memoirs of the Entomological Society of Canada';
$journal = 'Mem ent Soc Canada Ottawa';
$journal = 'Arquivos de Zoologia (Sao Paulo)';

$journal = 'Entomological News';

$journal = 'Kansas University Science Bulletin';

$journal = 'American Midland Naturalist';

$journal = 'Occasional Papers of the Museum of Zoology University of Michigan Ann Arbor';

$journal = 'Archiv fuer Protistenkunde';

$journal = 'Occasional Papers of the Museum of Natural History University of Kansas';

$journal = 'Transactions of the Linnean Society London';
$journal = 'Science (Washington D C)';

$journal = 'Journal of the Linnean Society London';
$journal = 'Journal Ent (Ser B)';
$journal = 'Vestnik Zoologii';
$journal='Australian Journal of Marine and Freshwater Research';
$journal = 'J. nat. Hist.';
$journal = 'Entomologische Zeitung Wien';
$journal = 'Annales de la Societe Entomologique de Belgique';

$journal = 'Kontyu Tokyo';
$journal = 'Transactions of the American Microscopical Society';
$journal = 'ZoologicalJ. Linn.';
$journal = 'Antarctic Science';

$journal = 'Parasitology Cambridge';
$journal = 'Zeitschrift fuer Parasitenkunde';
$journal = 'Mitteilungen aus dem Museum fuer Naturkunde in Berlin Deutsche Entomologische Zeitschrift';
$journal = 'Bulletin of the Southern California Academy of Sciences';

//$journal = 'Journal Zool London';

$journal = 'Konowia Vienna';

$journal = 'Journal of Helminthology';

$journal = 'Transactions Am. microsc. Soc.';

$journal = 'Journal of Micropalaeontology';

$journal = 'South African Journal of Science';
$journal = 'ZooKeys';
$journal = 'Zootaxa';

$journal = 'Journal of the Royal Microscopical Society London';
$journal = 'Journal of the Royal Microscopical Society';

$journal = 'Pretoria Annals Transvaal Museum';

$journal = 'Oesterreichische Zoologische Zeitschrift';

$journal = 'Jena Denkschriften der Med Gesellschaft';

$journal = 'Malacologia';

$journal = 'Smithsonian Institution U S National Museum Proceedings';

$journal = 'Bull. Zool. Nom.';
$journal = 'Nautilus';

$journal = 'Bollettino di Zoologia';
$journal = 'Deutsche Entomologische Zeitschrift';

$journal = 'Helminthologia (Bratislava)';

$journal = 'Bulletin de la Societe Zoologique Paris';

$journal = 'Memoirs of the National Museum of Victoria';

$journal = 'australian zoologist';

$journal = 'Journal of the Faculty of Agriculture Hokkaido University Sapporo';
$journal='Journal of the Faculty of Science Hokkaido University Zoology';
$journal='Journal  of the Faculty of Science Hokkaido University Zoology';
$journal = 'Journal of the Faculty of Agriculture Hokkaido Imperial University Sapporo';

$journal = 'J Fac Hokkaido Univ (6) Zool';
$journal = 'Journal Fac Sci Hokkaido Univ (Ser Zool)';
$journal = 'Journal of the College of Agriculture Hokkaido Imperial University';
//$journal = 'Journal  of the Faculty of Science Hokkaido University Zoology (6)';
//$journal = 'Journal  of the Faculty of Science Hokkaido University Zoology';
//$journal = 'Journal of the Faculty of Science Hokkaido University Series VI Zoology';
//$journal = 'Journal of the Faculty of Science Hokkaido University';
//$journal = 'Journal of the Faculty of Science Hokkaido University (4) Zoology';

$journal = 'Iberus';
$journal = 'Zoosystematics and Evolution';

$journal = 'Japanese Journal of Tropical Medicine and Hygiene';

$journal = 'Journal of the Egyptian Society of Parasitology';

$journal = 'Bulletin of the Southern California Academy of Sciences';

$journal = 'Annot zool japon Tokyo Art';

$journal = 'Edaphologia';

$journal = 'Australian Zoologist';

$journal = 'Journal of the Bombay Natural History Society';

$journal = 'Historia naturalis bulgarica';

$journal = 'Zeitschrift fuer Wissenschaftliche Zoologie';
$journal = 'Zeitschrift fuer Wissenschaftliche Zoologie Leipzig';
$journal = 'New Zealand J Zool';
$journal = 'Memoirs of the National Museum of Victoria';

$journal = 'Marine Biol Berlin';

$journal = 'Revista Chilena de Entomologia';

$journal = 'J Parasit';

$journal = 'Memoirs of the National Museum of Victoria';

$journal = 'Brigham Young Univ Sci Bull';
$journal = 'Brigham Young University Science Bulletin Biol';
$journal = 'Brigham Young Univ Sci Bull (Biol Ser)';

$journal = 'Entomological News Philadelphia';
$journal = 'Memoirs of the National Museum of Victoria';

$journal = 'PLoS ONE';

$journal = 'Far Eastern Entomologist';

$journal = 'Journal of the Royal Soc N Z';
$journal = 'Journal of the Kansas Entomological Society';
$journal = 'Journal of the Washington Academy of Sciences';
$journal = 'Gayana';

$journal = 'Sarsia';
$journal = 'Bulletin de la Societe Zoologique Paris';

$journal = 'Marine Biology (Berlin)';
$journal = 'Fossil Record';
$journal = 'Pomona';
$journal = 'Annales Zoologici (Warsaw)';

$journal = 'Mitteilungen Muenchener Entomologischen Gesellschaft';

$journal = 'Bulletin de la Societe Entomologique Paris';
$journal = 'Transactions of the Sapporo Natural History Society';

$journal = 'Braueria';
$journal = 'Annales Zoologici (Warsaw)';
$journal = 'Koleopterologische Rundschau';
$journal = 'Iheringia Serie Zoologia';

$journal = 'Entomologische Zeitung';
$journal = 'Graellsia';
$journal = 'Zeitschrift fuer Zoologische Systematik und Evolutionsforschung';
$journal = 'Memoirs of Museum Victoria';

$journal = 'Bull. Mus. comp. Zool Harv.';

$journal = 'Ophelia';
$journal = 'Transactions of the Royal Society of Tropical Medicine and Hygiene';
$journal = 'Zoologia';

$journal = 'Proceedings of the Malacological Society of London';
$journal = 'Jahrbuch der Hamburgischen Wissenschaftlichen Anstalten';
$journal = 'Proceedings of the Royal Society of New South Wales';

$journal = 'African Zoology';
$journal = 'New York J Ent Soc';
$journal = 'P Soc Washington';
$journal = 'Entomologische Mitteilungen Berlin';
$journal = 'Annali del Museo Genova';
$journal = 'Memoirs of the American Entomological Society';
$journal = 'Videnskabelige Meddelelser Nat For Kjobenhavn';
$journal = 'Archives de Parasitologie';

$journal = 'Memoirs of the Queensland Museum';
$journal = 'New Zealand Journal of Geology and Geophysics';

$journal = 'Compte Rendu de l\'Academie des Sciences Paris';
$journal = 'Compte Rendu des Seances de la Societe de Biologie';
$journal = 'Bulletin du Museum Paris';
$journal = 'Annals Nat% Mus%';

$journal = 'Bulletin of the British Ornithologists\' Club';

$journal = 'Stylops London';
$journal = 'Memoirs of the Queensland Museum';
$journal = 'Annals of Tropical Medicine & Parasitology';
$journal = 'Occasional Papers of the California Academy of Sciences';
$journal = 'Insecta Matsumurana Sapporo';

$journal = 'Memoirs of the Queensland Museum';
//$journal = 'Entomophaga Paris';
//$journal = 'Parasitology Cambridge';

$journal = 'Bulletin Am Mus nat Hist';
$journal = 'Portici Bollettino del Laboratorio di Zoologia';

$journal = 'Organisms Diversity & Evolution';
$journal = 'Zoologische Jahrbuecher Jena Supplement';
$journal = 'Zoologische Jahrbuecher Supplement';
$journal = 'Transactions R Ent Soc London';
$journal = 'Journal of the Washington Academy of Sciences';
$journal = 'Zoologische Verh Leiden';
$journal = 'Memoirs of the Queensland Museum';
$journal = 'Leiden Notes Mus Jentink';
$journal = 'Edaphologia';
$journal = 'Memoirs of the Queensland Museum';
//$journal = 'Zeitschrift fuer Wissenschaftliche Insektenbiologie Berlin';

$journal = 'London Transactions of the Entomological Society';
$journal = 'Transactions of the New Zealand Institute';
$journal = 'Publications in Biological Oceanography National Museum of Natural Sciences Canada';	

$journal = 'Veroeffentlichungen der Zoologischen Staatssammlung Muenchen';
$journal = 'Memoirs of the Queensland Museum';
$journal = 'Annals of the South African Museum';
$journal = 'Alcheringa';

$journal = 'Journal of the Natural History Society of Siam';
$journal = 'Stettiner Entomologische Zeitung';

$journal = 'Sitzungsberichte der Gesellschaft Naturforschender zu Berlin';

$journal = 'Zootaxa';
$journal = 'Zoologica afr';
$journal = 'Initial Reports of the Deep Sea Drilling Project';

$journal = 'International J Speleol';

$journal = 'Journal of the Entomological Society of Queensland';
$journal = 'Science New York';

/*$sql = "SELECT * FROM names INNER JOIN crossref 
ON names.journal=crossref.title
WHERE (names.year >= crossref.start_date)
AND (names.doi IS NULL)";
*/

$sql = 'SELECT * from names WHERE journal LIKE "' . $journal . '%"';

//$sql = 'SELECT * from names WHERE journal = "' . $journal . '"';

//$sql = 'select * from `bulletin du museum national d\'histoire naturelle`';
//$sql .= ' WHERE year > 2000 ORDER BY year';

//$sql = 'SELECT * from names WHERE issn = "0342-7536"';
//$sql = 'SELECT * from names WHERE issn = "0372-1426"'; // Transactions of The Royal Society of South Australia
//$sql = 'SELECT * from names WHERE issn = "0035-418X"'; // Revue suisse de Zoologie
//$sql = 'SELECT * from names WHERE issn = "1280-9659"';
//$sql = 'SELECT * from names WHERE issn = "0342-7536"'; // Nota Lepidopterologica
//$sql = 'SELECT * from names WHERE issn = "1342-8144"'; 
//$sql = 'SELECT * from names WHERE issn = "0079-4295"'; // Postilla
//$sql = 'SELECT * from names WHERE issn = "0007-1471"'; // BMNH G
//$sql = 'SELECT * from names WHERE issn = "0028-7199"'; // JNYSoc
//$sql = 'SELECT * from names WHERE issn = "0084-5647"';

//$sql = 'SELECT * from names WHERE issn = "0003-0023"';
//$sql = 'SELECT * from names WHERE issn = "1326-6756"';

//$sql = 'SELECT * from names WHERE issn = "1059-1559"';
$sql = 'SELECT * from names WHERE issn = "0035-418X"'; // Revue suisse de Zoologie

$sql = 'SELECT * from names WHERE issn = "0015-4040"'; // Florida entomologist
$sql = 'SELECT * from names WHERE issn = "0015-3850"'; // Quarterly Journal of the Florida Academy of Sciences

$sql = 'SELECT * from names WHERE issn = "0081-0282"';

$sql = 'SELECT * from names WHERE issn = "0717-652X"';
$sql = 'SELECT * from names WHERE issn = "0040-7496"';

$sql = 'SELECT * from names WHERE issn = "0433-8731"';
$sql = 'SELECT * from names WHERE issn = "0372-1426"'; // Transactions of The Royal Society of South Australia

$sql = 'SELECT * from names WHERE issn = "1895-3131"';

$sql = 'SELECT * from names WHERE issn = "0077-7749"';

$sql = 'SELECT * from names WHERE issn = "0370-2774"';

$sql = 'SELECT * from names WHERE issn = "0037-9271"';

$sql = 'SELECT * from names WHERE issn = "0952-7583"';

$sql = "select * from names4495670_4499910 where publication is not null";

$sql = 'SELECT * from names WHERE issn = "0939-7140"';




//$sql = 'SELECT * FROM names WHERE id > 4964979 AND publication IS NOT NULL';


$sql = 'SELECT * from names WHERE journal = "Bull. ent. Res."';


//$sql = 'SELECT * from names WHERE taxonAuthor like "Fain %"';

//$sql .= " AND (cinii is null)";

//$sql .= " AND volume IN (63,64)";
//$sql .= " AND volume between 24 and 29";
//$sql .= " AND volume in (34, 45, 46, 47, 48)";

//$sql .= " AND volume in (23)";

//$sql .= " AND volume IN( 71,72,73)";


//$sql .= " AND year >= 2008";

//$sql .= " AND year IN (1953,1954,1955)";

//$sql .= " AND year BETWEEN 1970 AND 1980";


//$sql .= " AND (pdf is null)";

//$sql .= " AND (jstor is null)";
//$sql .= " AND (handle is null)";
//$sql .= " AND (pdf is null)";

//$sql .= " AND (biostor is null)";
 $sql .= " AND (doi is null)";

//$sql .= " AND (url is null)";
//$sql .= " AND (cinii is null)";

//$sql .= ' ORDER BY year DESC';

//$sql = 'SELECT * FROM names WHERE title="New Western Spiders"';



//$sql = 'SELECT * from names WHERE doi = "10.1111/sen.2011.36.issue-1"';

//$sql .= " AND (doi is null) and (year > 1999)";

//$sql .= " AND (doi is null) and (biostor is null) and (spage is not null)";

//$sql .= " AND (doi is null) and (handle is null)";


//$sql .= " AND year < 1923";

//$sql .= " AND volume=137";

//$sql = 'SELECT * from names WHERE year = 2006';


/*$sql = "SELECT * FROM names WHERE journal IN ('Zoologische Mededelingen (Leiden)',
'Zoologische Mededeelingen Leiden',
'Zoologische Meded Leiden');";*/

//$sql = "SELECT * FROM names WHERE year='2011'";

//$sql = 'SELECT * FROM names WHERE issn="0035-418X"';
//$sql .= " AND volume=108";

//$sql = 'SELECT * from names where id=122822';

//$sql = 'SELECT * from names where id>=4530079 and publicationParsed="Y"';

//$sql = 'SELECT * from names where updated > "2012-02-14" and publicationParsed="Y"';

$sql="select * from names where issn='0035-418X' and volume in (75,76,78);";

$sql = "select * from names where journal='Studies Neotrop Fauna' and doi is null and spage is not null";

//$sql = "select * from names where journal is not null and doi is null and year=2011";

//$sql="select * from names where issn='0082-6340' and volume in (1,2,3,4);";
//$sql="select * from names where issn='1252-607X' and year > 2004";

$sql="select * from names where issn='0090-3558' and doi is null";

$sql="select * from names where journal='Entomologisches Nachrichtenblatt' and pdf is null and spage is not null";

$sql="select * from names where issn='0035-418X' and biostor is null and year=2011";

$sql="select * from names where journal='Proceedings of the Entomological Society of Ontario'";

$sql="select * from names where issn='0035-418X' and biostor is null";

$sql="select * from names where journal LIKE 'Memoirs on the coleoptera%' and biostor is null";
$sql="select * from names where oclc=13962191 and biostor is null";

$sql = "select * from `names-5340754` where publicationParsed='Y' and doi IS NULL;";
$sql = "select * from `names-5340754` where journal='Zookeys' and doi IS NULL;";


$sql="select * from names where issn='0365-5164' and doi is null";


$sql="select distinct sici, title, journal, issn, volume, issue, spage, epage, year  from names where issn='0236-7130' and volume=29";



$sql = "select * from `names` where journal='Bull. geol. Surv. Can.';";

// $sql = "select * from `names` WHERE publication LIKE '%Journal of Vertebrate Paleontology%' AND publicationParsed='N';"; 
$sql="select * from names where issn='0272-4634' and doi is null;";

$sql = "select * from `names` where journal='Bulletin of the Geological Society of China';";

$sql="select * from names where issn='0387-5733' and year < 1991";

// Memorias do Instituto Butantan (Sao Paulo)
$sql="select * from names where issn='0073-9901' and year >= 1990";

$sql="select * from names where issn='0073-9901' and year >= 1960 and year < 1980 order by year, cast(volume as signed), cast(spage as signed)";

$sql="select * from names where issn='0066-7870'";

$sql="select * from names where journal='Caribbean Journal of Science' and doi is null and year >= 2007";

$sql = "select * from `names-5353853` where `publication` is not null and doi is null";



$sql="select * from names where issn='0749-8004' and doi is null";

$sql="select * from names where journal='Caucasian Entomological Bulletin'";

$sql="select * from names where updated >= '2018-12-25' and publicationParsed='Y'";

$sql="select * from names where issn='0022-4324' and biostor is null";


$sql="select * from names where issn='0013-8827' AND volume IN (42,43)";

$sql = "select * from names where updated >= '2019-04-11' and publicationParsed='Y'";

$sql="select * from names where issn='0073-2230'";




//echo $sql . "\n";

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$obj = new stdclass;

	$obj->id = $result->fields['sici'];	
	$obj->title = $result->fields['title'];
	$obj->secondary_title = $result->fields['journal'];
	
	$series = $result->fields['series'];
	
	/*
	if ($series != '')
	{
		$obj->secondary_title .= ', Series ' . $series;
	}
	*/
	$obj->issn = $result->fields['issn'];
	
	$obj->volume = $result->fields['volume'];
	$obj->issue = $result->fields['issue'];
	$obj->spage = $result->fields['spage'];
	$obj->epage = $result->fields['epage'];
	$obj->year = $result->fields['year'];

	$obj->doi = $result->fields['doi'];
	
	//print_r($obj);
	
	if ($obj->spage != '') 
	{
		//print_r($obj);
		
		$ris = '';
		$ris .= "TY  - JOUR\n";
		$ris .= "ID  - " . $obj->id . "\n";
		$ris .= "TI  - " . $obj->title . "\n";
		
		if ($obj->issn == '0096-3801')
		{
			$obj->secondary_title = preg_replace('/\s+No\.(.*)$/', '', $obj->secondary_title);
		}
		if ($obj->issn == '0035-8894')
		{
			$obj->secondary_title = 'Transactions of the Entomological Society of London';
		}
	
		if ($obj->secondary_title == 'Leiden Notes Mus Jentink')
		{
			$obj->secondary_title = 'Notes Leyden Museum';
		}
		if ($obj->secondary_title == 'London Transactions of the Entomological Society')
		{
			$obj->secondary_title = 'Transactions of the Entomological Society London';
		}
		
		if ($obj->secondary_title == 'Memoirs on the Coleoptera Lancaster Pa')
		{
			$obj->secondary_title = 'Memoirs on the Coleoptera';
		}
		if ($obj->secondary_title == 'Mem Col Lancaster Pa')
		{
			$obj->secondary_title = 'Memoirs on the Coleoptera';
		}
		if ($obj->secondary_title == 'Mem Col')
		{
			$obj->secondary_title = 'Memoirs on the Coleoptera';
		}
		if ($obj->secondary_title == 'Mem Col Lancaster')
		{
			$obj->secondary_title = 'Memoirs on the Coleoptera';
		}

		if ($obj->secondary_title == 'Memorias do Instituto Butantan (Sao Paulo)')
		{
			$obj->secondary_title = 'Memorias do Instituto Butantan';
		}
		
		
		


			
		
		
		$ris .= "JF  - " . $obj->secondary_title . "\n";
		
		
		if ($obj->issn != '')
		{
			$ris .= "SN  - " . $obj->issn . "\n";
		}
		
		$ris .= "VL  - " . $obj->volume . "\n";
		$ris .= "IS  - " . $obj->issue . "\n";
		if (0)
		{
			$ris .= "SP  - e-" . $obj->spage . "\n";
			$ris .= "EP  - e-" . $obj->epage . "\n";
		}
		else
		{
			$ris .= "SP  - " . $obj->spage . "\n";
			$ris .= "EP  - " . $obj->epage . "\n";
		}
		$ris .= "Y1  - " . $obj->year . "///\n";
		
		if ($obj->doi != '')
		{
			$ris .= "DO  - " . $obj->doi . "\n";
		}
			
		
		$ris .= "ER  - \n\n";
		
		//if ($obj->volume >= 110)
		{
			echo $ris;
		}
		
	}
	
	$result->MoveNext();
}



?>