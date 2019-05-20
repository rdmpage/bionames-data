<?php

require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

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


//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$journal = 'Proceedings of the Entomological Society of Washington';
$journal = 'Proceedings of the Biological Society of Washington';
$journal = 'Entomological News';

$journal = 'Canadian Ent';
$journal = 'Journal of Natural History';
$journal = 'Great Basin Naturalist';
$journal = 'Copeia';

$journal = 'Far Eastern Entomologist';

$journal = 'Entomologica Scandinavica';
$journal = 'Proceedings of the Biological Society of Washington';
$journal = 'Proceedings of the Entomological Society of Washington';
$journal = 'Systematic Entomology';
$journal = 'Raffles Bulletin of Zoology';
$journal = 'Crustaceana';

$journal = 'Proceedings of the Linnean Society of New South Wales';
$journal = 'American Museum Novitates';

$journal = 'Annotationes Zoologicae Japonenses';
$journal = 'Spixiana';

$journal = 'Cuadernos de Herp';

$journal = 'Papeis Avulsos de Zoologia (Sao Paulo)';

$journal = 'Transactions of the Entomological Society of London';

$journal = 'Novitates Zoologicae';

$journal = 'Journal of the New York Entomological Society';

$journal = 'Transactions of the Royal Entomological Society of London';
$journal = 'Australian Journal of Zoology';

$journal = 'Journal of Orthoptera Research';
$journal = 'Coleopterists Bulletin';

$journal = 'Journal of Parasitology';

$journal = 'Transactions of the Royal Entomological Society of London';

$journal = 'Smithsonian Contributions to Zoology';

$journal = 'Journal of the Australian Entomological Society';
$journal = 'Entomologica Scandinavica';
$journal = 'Journal of the Linnean Society London Zoology';

$journal = 'Annals of the Natal Government Museum';

$journal = 'Coleopterists Bulletin';
$journal = 'Records of the Australian Museum';

$journal = 'Entomological News Philadelphia';

$journal = 'Proceedings of the Entomological Society of Washington';

$journal = 'Raffles Bulletin of Zoology Supplement';

$journal = 'Fieldiana Zoology';

$journal = 'American Museum Novitates';

$journal = 'Annals of the Transvaal Museum';
$journal = 'Annals of the Natal Museum';

$journal = 'Sitzungsberichte der Gesellschaft Naturforschender Freunde';

$journal = 'Journal of Marine Research';

$journal = 'Bulletin de la Societe Zoologique de France';
$journal = 'Transactions of the San Diego Society for Natural History';

$journal='Field Museum of Natural History Zool';
$journal = 'Zoological Series Field Museum of Natural History';
//$journal = 'Field Museum Publications Chicago Zoological Series';

$journal = 'Annals of Natural History';

$journal = 'Contributions to Natural History';

$journal = 'Zoologische Mededeelingen Leiden';
//$journal = 'Annals & Magazine of Natural History Series ';

$journal = 'Zoologische Verhandelingen (Leiden)';

$journal = 'Carib% J% Sci';

$journal = 'Annalen des Naturhistorischen Museums in Wien Serie B Botanik und Zoologie';

$journal = 'Raffles Bulletin of Zoology, Suppl';

$journal = 'Proceedings of the Zoological Society of London';

$journal = 'Journal of the Kansas Entomological Society';

$journal = 'Bulletin of the American Museum of Natural History';

$journal = 'Proceedings of the United States National Museum Washington';

$journal = 'Proceedings of the Zoological Society';

$journal = 'Psyche Boston';

$journal = 'Breviora';
$journal = 'Records of the Indian Museum';
$journal = 'Vertebrate Zoology';
$journal = 'Bulletin of the Museum of Comparative Zoology';
$journal = 'Acta Zoologica Cracoviensia';

$journal = 'Journal of Mammalogy';
$journal = 'Memoirs Museum of Comparative Zoology Harvard';

$journal = 'Discovery Reports Cambridge';
$journal = 'Zoological Magazine Tokyo';
$journal = 'Arch. Naturgesch.';

$journal = 'Revue Russe d\'Entomologie';

$journal = 'Proceedings of the Academy of Natural Sciences of Philadelphia';

$journal = 'Boletin Cientifico Museo de Historia Natural Universidad de Caldas';

$journal = 'Tijdschr Ent Amsterdam';

$journal = 'Annals of the South African Museum';

$journal = 'Archiv fuer Naturgeschichte Berlin';

$journal = 'Bull Mus hist nat Paris';

$journal = 'Raffles Bulletin of Zoology';

$journal=' Annals & Magazine of Natural History, 7(11)';

$journal = 'Zoologischer Anzeiger';

$journal = 'Journal of the Linnean Society';

$journal = 'Journal of the Linnean Society London Zoology';

$journal = 'Ohio Journal of Science';

$journal = 'Annals & Magazine of Natural History Series 10';

$journal = 'Compte Rendu';

$journal = 'Revista de Biologia Tropical';

$journal = 'Bulletin du Museum d\'Histoire Naturelle Paris';

$journal = 'American Museum Novitates';

$journal = 'Transactions of the Connecticut Academy of Arts and Science';

$journal = 'Transactions of the American Entomological Society';
$journal = 'Journal of the Kansas Entomological Society';

$journal = 'Annals & Magazine of Natural History';
$journal = 'Ann & Mag Nat Hist';
$journal = 'Proceedings of the United States National Museum Art';
$journal = 'Bulletin du Museum Paris';

$journal = 'Copeia Ann Arbor';

$journal = 'Bulletin de la Societe Entomologique de France Paris';

$journal = 'Bulletin of Entomological Research London';
$journal = 'Bulletin of Entomological Research';
$journal = 'Bull Ent Res';

$journal = 'Annalen des Naturhistorischen Museums in Wien';
$journal = 'Arkiv for Zoologi Stockholm';
$journal = 'Philippine Journal of Science';
$journal = 'Parasitology';
$journal = 'International Journal for Parasitology';

$journal = 'Bulletin';
$journal = 'Museum';
$journal = 'Transactions';
$journal = 'Proceedings';
$journal = 'Acta ';
$journal = 'Annals ';
$journal = 'Annale';
$journal = 'Records ';
$journal = 'Revista ';

$journal = 'Memoirs ';
$journal = 'Revue ';

$journal = 'Annals ';

//$journal = 'Proceedings of the United States National Museum';

/*$journal = 'Annals & Magazine of Natural History';

$journal = 'lnternationale Revue ges. Hydrobiol';

$journal = 'Mem Inst Osw Cruz';
$journal = 'Arquivos de Zoologia (Sao Paulo)';

$journal = 'Proceedings of the Biological Society of Washington';
*/

$journal = 'Annals & Magazine of Natural History';


$journal = 'Proceedings of the Entomological Society of Washington';
//$journal = 'Proc. ent. Soc. Wash';

$journal = 'Acta Arachnologica';

$journal = 'Proceedings of the Zoological Society';

$journal = 'Records of the Australian Museum';

$journal = 'Annals of Natural History';

$journal = 'Kansas University Science Bulletin';
//$journal = 'University of Kansas Science Bulletin';


//$journal = 'Raffles Bulletin of Zoology';
//$journal = "Bulletin du Museum National d'Histoire Naturelle";

$journal = 'Florida Entomologist Gainesville';

$journal = 'American Midland Naturalist';
$journal = 'Amphibia-Reptilia';
$journal = 'Herpetofauna (Weinstadt)';
$journal='Papeis Avulsos de Zoologia (Sao Paulo)';
$journal = 'Zool Anz';
$journal = 'Zoologischer Anzeiger';
$journal = 'Arch. Naturgesch';
$journal = 'Annotationes Zoologicae Japonenses';
$journal = 'Tokyo Annotationes Zoologicae Japonenses';
$journal = 'Ameghiniana';
$journal = 'Bijdragen tot de Dierkunde';
$journal = 'Herpetological Review';
$journal = 'Papeis Avulsos do Departamento de Zoologia Sao Paulo';
$journal = 'Zoosystema';
$journal = 'Temminckia';
$journal = 'Researches of Crustacea, Special';

$journal = 'Bull Soo zool Fr';
$journal = 'Bull Mua Hist nat Paris';
$journal = 'Memorias do Instituto Oswaldo Cruz';
$journal = 'Memoirs of the Queensland Museum';
$journal = 'Kontyu Tokyo';
$journal = 'CR Acad Sci Paris';
$journal = 'Zoologischer Anzeiger Leipzig';
$journal = 'Proc US Nat Mus';
$journal = 'Canadian Entomologist';
$journal = 'Annals of the Entomological Society of America';
$journal = 'Zeitschrift fuer Parasitenkunde';
$journal = 'Ann eat Soc Amer Columbus';
$journal = 'Annali del Museo Civico di Storia Naturale di Genova';

$journal = 'Wiener Entomologische Zeitung';
$journal = 'Bonner Zoologische Beitraege';
$journal = 'Konowia Vienna';

$journal = 'CR Ac Sci';

$journal = 'Dobutsugaku Zasshi Tokyo';

$journal = 'Archiv fuer Hydrobiologie Stuttgart';

$journal = 'Oesterreichische Zoologische Zeitschrift';
$journal = 'Zoologische Jahrbuecher (Systematik)';

$journal = 'Nautilus';

$journal = 'Smithsonian Institution National Museum Bulletin';

$journal = 'Deutsche Entomologische Zeitschrift';

$journal = 'Occasional Papers of the Boston Society of Natural History';

$journal = 'Zeitschrift fuer die Gesamte Naturwissenschaft';

$journal = 'Bull Br Mus nat Hist';

$journal = 'Zoologischer Anzeiger Leipzig';

$journal = 'Bollettino della Societa dei Naturalisti in Napoli';

$journal = 'Solenodon';
$journal = 'Zoosystematics and Evolution';

$journal = 'Arquivos do Museu Paranaense Curitiba';

$journal = 'Copeia Ann Arbor';

$journal = 'Zoologische Mededeelingen Leiden';
$journal = 'Australian Zoologist';
//$journal = 'Australian Zoologist'

//$journal = 'PLoS ONE';

$journal = 'Boletin del Museo de Entomologia de la Universidad del Valle';

$journal = 'Canadian Entomologist';

$journal = 'Pan-Pacific Entomologist';

$journal = 'Papers Royal Society of Tasmania';

$journal = 'Journal of the Asiatic Society of Bengal';

$journal = 'Journal of the Linnean Society London';
$journal = 'Zoologica New York';
$journal = 'Journal of Entomology and Zoology Claremont';

$journal = 'Entomologist\'s Monthly Magazine';
$journal = 'Transactions E Soc';

$journal = 'Bull Inst franY Afr noire';

$journal = 'CR ass franY Avanc Sci Paris';

$journal = 'Memoires de l\'Institut Scientifique de Madagascar';

$journal = 'Trudy Gelmintologicheskoi Laboratorii';

$journal = 'Entomological News Philadelphia';

$journal = 'Pan-Pacific Entomologist';

$journal = 'Compte Rendu de l\'Academie des Sciences Paris';

$journal = 'Scientific Reports Great Barrier Reef Expedition';

$journal = 'Revue de Zoologie et de Botanique Africaines';

$journal = 'Zeitschrift fuer Saugietierkunde';
$journal = 'Redia Firenze';

$journal = 'Resultats de Campagnes Scientifiques Monaco';
$journal = 'Records of the Canterbury Museum';
$journal = 'Ichthyological Exploration of Freshwaters';

$journal = 'Entomologische Zeitschrift';
$journal = 'Linzer Biologische Beitraege';
$journal = 'Braueria';
$journal = 'Entomologische Berichte Luzern';
$journal = 'Naturaliste Canadien';
$journal = 'Bull Ann Soc ent Belg Brussels';
$journal = 'Bul Soc Sci Maroc Rabat';
$journal = 'Bul soc hist nat Toulouse';
$journal = 'Bull Lloyd Lib Cincinnati Ohio Bull Ent';
$journal = 'Neuchatel Mem Soc Sci Nat';
$journal = 'Archives de Zoologie Paris';
$journal = 'Bulletin Museum of Comparative Zoology Harvard';
$journal = 'Sitzungsberichte Akademie Wien';

$journal = 'Novitates Zoologicae Tring';
$journal = 'Med Parasitol Moscow';
$journal = 'C R Acad Sci Paris';
$journal = 'Trudy vsesoyuzn ent Obshch Moscow';
$journal = 'Entomologicheskoe Obozrenie';
$journal = 'Koleopterologische Rundschau';
$journal = 'Zeitschrift fuer Saugetierkunde';

$journal = 'Canadian Entomologist';
$journal = 'Broteria Serie Zoologica';

$journal = 'J Straits R Asiat Soc';
$journal = 'Acta Med Fakult Okayama';
$journal = 'Acta Coleopterologica (Munich)';

$journal = 'Saturnafrica';
$journal = 'Entomologia Africana';
$journal = 'Historical Biology';
$journal = 'Beitraege zur Entomologie';
$journal = 'Kogane';
$journal = 'Natura optima dux Foundation, Warszawa';
$journal = 'Zoologica Baetica';
$journal = 'Bulletin of the National Museum of Nature and Science Series A Zoology, Suppl';
$journal = 'Iheringia Serie Zoologia';
$journal = 'Nouvelle Revue d\'Entomologie';
$journal = 'Coleopteres';
$journal = 'Zoologische Jahrbuecher Jena Abteilungen f Systematik';
$journal = 'Monograph geol. Mus UAR';

$journal = 'Australian J Zool';
$journal = 'Aust J Zool';
$journal = 'Zoologica (Stuttgart)';

$journal = 'Folia Entomologica Hungarica';

$journal = 'American Museum Novitates';
$journal = 'Archiv fuer Protistenkunde Jena';
$journal = 'Zoologische Jahrbuecher Jena Systematik';
$journal = 'Ann Rept Fish Board Scotland';
$journal = 'Biologisches Zentralblatt';
$journal = 'Nauplius';
$journal = 'Travaux de la Societe des Naturalistes de Leningrade Sect Zool';
$journal = 'Sinensia Shanghai';
$journal = 'Voprosy Ikhtiologii';
$journal = 'California Fish and Game';
$journal = 'Boletim do Museu Municipal do Funchal';
$journal = 'Suisan Kenkiushi Japan';
$journal = 'CR Acad Sci Moscou NS';
$journal = 'Ergebnisse der Wissenschaftlichen Untersuchung des Schweizerischen Nationalparks NF';
$journal = 'Memoirs of the Queensland Museum';
$journal = 'Jahrbuch der Hamburgischen Wissenschaftlichen Anstalten';
$journal = 'Archiv fuer Naturgeschichte Leipzig NF';
$journal = 'Bull US Mus';

$journal = 'Proceedings of the United States National Museum';

$journal = 'Nyt Magazin for Naturvidenskaberne';
$journal = 'Entomologische Zeitung';
$journal = 'Insecta Matsumurana';
$journal = 'Treubia Buitenzorg';
$journal = 'Soc Entomol Stuttgart';
$journal = 'Genera Insectorum Fasc Bruxelles';
$journal = 'Bulletin et Annales de la Societe Entomologique de Belgique';
$journal = 'Esakia, Special issue';
$journal = 'Entomologische Mitteilungen';
$journal = 'Bulletin of the Illinois Natural History Survey';
$journal = 'CR Ass Frauc';
$journal = 'Videnskabelige Meddelelser Nat For Kjobenhavn';
$journal = 'Videns. Medd nat For Kjobenhavn';
$journal = 'Arbeiten der Biologischen Wolga-Station Saratov';
$journal = 'Revista Brasileira de Biologia';
$journal = 'Folia Zoologica et Hydrobiologica Riga';
$journal = 'Occ Pap R Ont Mus';
$journal = 'Muenchener Koleopterologische Zeitschrift';
$journal = 'Bull Mus Hist nat Belg';
$journal = 'Carnegie Institution Publication';
$journal = 'Compte Rendu de l\'Academie des Sciences Paris';
$journal = 'Tijdschrift der Nederlandsche Dierkundige Vereeniging';
$journal = 'Stanford University Publications Biological Sciences';
$journal = 'Entomologist\'s Monthly Magazine';
$journal = 'Ectoparasites';
$journal = 'Ber Ned Ent Ver';
$journal = 'Bulletin du Museum Paris';
$journal = 'Insects of Hawaii';
$journal = 'Bollettino del Laboratorio di Zoologia in Portici';
$journal = 'Bollettino della Societa Entomologica Italiana';
$journal = 'Memorie della Societa Entomologica Italiana Genoa';
$journal = 'Dr. H. Brauns misit Broteria Braga';
$journal = 'Archivos do Museu Rio de Janeiro';
$journal = 'Stylops London';
$journal = 'Nat Hist Juan Fernandez and Easter Island';
$journal = 'Geodiversitas';
$journal = 'Arch Inst Pasteur Algerie Algiers';
$journal = 'Proceedings of the Academy Philadelphia';
$journal = 'Arch Inst Pasteur Alger';
$journal = 'Papers from the Tortugas Laboratory of the Carnegie Institution of Washington';
$journal = 'Danish Ingolf-Expedition S';
$journal = 'Videnskabelige Meddelelser fra Dansk Naturhistorisk Forening';
$journal = 'Proc zool Soc';
$journal = 'Entomologische Berichten Nederland';
$journal = 'Zeitschrift fuer Wissenschaftliche Insektenbiologie Berlin';
$journal = 'Compte Rendu des Seances de la Societe de Biologie Paris';
$journal = 'Boletim Biologico Sao Paulo';
$journal = 'Proceedings Zoological Society';


$journal = 'Sci Bull Minist Agric For Japan Tokyo';
$journal = 'Sci Bull Min Agric For Tokyo';
$journal = 'Philippine Journal of Science';
$journal = 'Insecutor Inscitiae Menstruus';
$journal = 'Zeitschrift fuer Angewandte Entomologie';
$journal = 'Parasitology Cambridge';
$journal = 'Report on Veterinary Research South Africa Pretoria';

$journal = 'Meem Mus Hist nat Belg Brussels';
$journal = 'Entomologist London';
$journal = 'Stuttgarter Beitraege zur Naturkunde';
$journal = 'Ent Tidskr Stockholm';
$journal = 'Stockholm Vet Akad Handl';
$journal = 'ZooKeys';
$journal = 'Zootaxa';
$journal = 'Acta Universitatis Lundensis (NF)';
$journal = 'Anais do Instituto de Medicina Tropica Lisboa';
$journal = 'J Tenn Acad Sci';
$journal = 'University of California Publications in Zoology';
$journal = 'Ann Sci nat Paris';
$journal = 'Arch zeol exp gen Paris';
$journal = 'Archives de la Societe Russe de Protistologie Moscow';
$journal = 'Sci Res Zoological Expedition British East Africa 1914';
$journal = 'Occasional Papers of the Bishop Museum Honolulu';
$journal = 'Smithsonian Miscellaneous Collections';
$journal = 'Memoirs of the American Entomological Institute (Gainesville)';
$journal = 'Annals & Magazine of Natural History';

$journal = 'Sabah Forest Record';
$journal = 'Tijdschrift voor Entomologie';

$journal = 'K svenska VetenskAkad Handl Stockholm';
$journal = 'Verhandlungen der Zoologisch-Botanischen Gesellschaft in Wien Band';
$journal = 'Publicacoes Culturais da Companhia de Diamantes de Angola';
$journal = 'Trans North Nat Union';

$journal = 'Archiv fuer Mikroskopische Anatomie';
//$journal = 'Archiv fuer Naturgeschichte';
//$journal = 'Zeitschrift fuer Wissenschaftliche Zoologie';
//$journal = 'Zentralblatt fuer Bakteriologie Jena';
//$journal = 'Contr Dept Trop Med & Inst Trop Biol Med Cambridge';
$journal = 'Lloydia Cincinnati';
$journal = 'Journal of Parasitology Urbana';
$journal = 'Opuscula Zoologica (Budapest)';
$journal = 'Bulletin of the Misaki Marine Biological Institute Kyoto University';

$journal = 'Acarologia';
//$journal = 'Bulletin de la Societe Royale de Zoologie d\'Anvers';
//$journal = 'Bulletin et Annales de la Societe Entomologique de Belgique';
//$journal = 'Revue de Zoologie et de Botanique Africaines';

$journal = 'Proceedings of the California Academy of Sciences';
$journal = 'Capita Zoologica \'s Gravenhage';

$journal = 'Trudy Inst Geol Geofiz sib Otd';
$journal = 'Oriental Insects';
$journal = 'Zool Jabrb Jena (Syst)';
$journal = 'Zoologische Jahrbuecher Jena Supplement';
$journal = 'Zoologica';

$journal = 'Ofversigt Ak Forhandlingar';
$journal = 'Arkiv for Zoologi';
$journal = 'Senckenbergiana Frankfurt a M';
$journal = 'Abhandlungen der Senckenbergischen Naturforschenden Gesellschaf';
$journal = 'Organisms Diversity & Evolution';
$journal = 'Bollettino dei Musei di Zoologia Torino';
$journal = 'Science Reports of the Tohoku University';
$journal = 'Archives de Zoologie Experimentale et Generale Paris';
$journal = 'Archives Neerlandaises de Zoologie Leiden';
$journal = 'Mitt. Hohlen- u. Karstf Berlin';
$journal = 'JB Hamb';
$journal = 'Jahrbuch Hamburg Anst';
$journal = 'Mt Mus Hamburg';
$journal = 'Travaux de la Station Limnologique du Lac Bajkal Moscow';
$journal = 'Fauna Sudwest-Australiens Jena';
$journal = 'Wissenschaftliche Meeresuntersuchungen (N F)';
$journal = 'Verhandlungen des Vereins Hamburg naturw';
$journal = 'Inst Parcs Nat Congo Belge Brussels';
$journal = 'Proceedings of the Royal Society London Ser B';
$journal = 'Arquivos zool S Paulo';
$journal = 'Zbl Bakt Jena';
$journal = 'Estud Ens Docum Jta Invest Ultramar Lisbon';
$journal = ' Memoires de l\'Institut Francais d\'Afrique Noire Dakar';
$journal = 'Atlantide Report';
$journal = 'Biblioteca de la Academia de Ciencias Fisicas, Matematicas y Naturales, Caracas - Venezuela';
$journal = 'Abhandlungen vom Naturwissenschaftlichen Verein zu Bremen';
$journal = 'Zeitschrift fuer Morphologie und Oekologie der Tiere Berlin';
$journal = 'Zoopathologica New York';
$journal = 'Sitzungsberichte der Gesellschaft Naturforschender Freunde zu Berlin';
$journal = 'Palaeontologische Zeitschrift';
$journal = 'Archives des Sciences Physiques et Naturelles Geneve';
$journal = 'Entomologische Berichten \'s Gravenhage';
$journal = 'Skrifter om Svalbard og Ishavet';
$journal = 'Archives de Parasitologie';
$journal = 'Encyclopedie Entomologique Ser B II Dipt';
$journal = 'Terre et la Vie Paris';
$journal = 'Entomologisk Tidskrift Stockholm';
$journal = 'Abhandlungen der Zoologisch-Botanischen Gesellschaft in Wien';
$journal = 'Sitzungsberichte Akademie der Wissenschaften Wien';
$journal = 'Nova Guinea';
$journal = 'Monographs Academy of Natural Sciences of Philadelphia';
$journal = 'Notulae Naturae Philadelphia';
$journal = 'Proceedings of the Academy of Natural Sciences of Philadelphia';
$journal = 'Pacific Science';
$journal = 'Atti del Museo di Storia Naturale di Trieste';
$journal = 'Mem Accad Ital Roma';
//$journal = 'Folia Zoologica et Hydrobiologica Riga';
$journal = 'Contributions from the Biological Laboratory of the Science Society of China Nanking';

$journal = 'Bulletin United States National Museum';
$journal = 'Bulletin Bishop Museum Honolulu';
$journal = 'Memorias de la Sociedad Cubana de Historia Natural';
$journal = 'Zoological Magazine Japan';
$journal = 'Journal of Helminthology Leiper Suppl';
$journal = 'Entomologisches Nachrichtenblatt';
$journal = 'Memorie dell\'Accademia Nuovi Lincei (2)';
$journal = 'Jornal de Sciencias Mathematicas Physicas e Naturaes Lisboa';
$journal = 'J Sci mat fis e nat Lisbon (3)';
$journal = 'Copeia New York';
$journal = 'Publ Univ Washington Geol';
$journal = 'Neotropica (La Plata)';
$journal = 'Occasional Papers of the Museum of Zoology University of Michigan Ann Arbor';

$journal = 'Redia Firenze';
$journal = 'Dept Agric & Comm Japan Imp Pl Quar Sta Yokohama Bull';
$journal = 'Eclogae Geologicae Helvetiae';
$journal = 'Travaux de l\'Institut de Zoologie Acad Sci Leningrad';
$journal = 'Science Reports Tokyo Bunrika Daigaku (B)';
$journal = 'Izvestiya Zapadno-Sibirskogo Otdela Russkogo Geograficheskogo Obshchestva Omsk';

$journal = 'Trans Siberian Agric Acad Omsk';
$journal = 'Trudui Sibirsk S Kh Akad Omsk';
$journal = 'Ann Mag nat Hist London (12)';

$journal = 'Bulletin de la Societe Zoologique de France';
$journal = 'Opredeliteli po Faune SSSR';
$journal = 'Zoological Survey of India, Calcutta';
$journal = 'Senckenbergische Naturforschende Gesellschaft Frankfurt';

$journal = 'Caldasia Bogota';

$journal = 'Travaux du Laboratoire de Geologie Lyon';
$journal = 'Bull Soc Cien Nat Barcelona';
$journal = 'Memoires de la Societe Geologique de France';
$journal = 'Museo Regionale di Scienze Naturali Bollettino (Turin)';
$journal = 'Travaux du Laboratoire de Geologie Univ Grenoble';
$journal = 'Notes et Memoires du Service des Mines et de la Carte Geologique du Maroc';

$journal = 'Deutsche Sudpolar Expedition';
$journal = 'Korean Journal of Systematic Zoology, Special issue';
$journal = 'Journal of the Marine Biological Association of India';
$journal = 'West Australian Naturalist';
$journal = 'Proceedings of the Royal Society of New South Wales';

$journal = 'Bull Inst fond Afr noire';
$journal = 'Report Allan Hancock Pacific Expedition';
$journal = 'Verhandlungen des natw Ver Hamburg';

$journal = 'Zoologische Meded Leiden';

$journal = 'Esperiana Memoir';
$journal = 'Zoological Journal of the Linnean Society';
$journal = 'Journal of Conchology';
$journal = 'Esakia';
$journal = 'Venus Tokyo';
$journal = 'U S Department of Agriculture Agriculture Handbook';
$journal = 'Travaux de la Station Limnologique du Lac Bajkal Leningrad';

$journal = 'Revue Francaise d\'Aquariologie Herpetologie';
$journal = 'Glasnik Zemaljskog Museja u Bosni i Hercegovini Sarajevo';
$journal = 'Eos Madrid';
$journal = 'Verhandlungen der Zoologisch-Botanischen Gesellschaft in Wien';
$journal = 'Folia Universitaria Cochabamba';
$journal = 'Veroeffentlichungen der Zoologischen Staatssammlung Muenchen';
$journal = 'Canadian Field Naturalist';
$journal = 'Journal of Insect Science (Tucson)';
$journal = 'Transactions of the Connecticut Academy of Arts and Science';
$journal = 'Missione Biologica Sagan-Omo Roma Zool';
$journal = 'Osnabruecker Naturwissenschaftliche Mitteilungen';
$journal = 'Senckenbergiana Biologica';
$journal = 'Publications of the Carnegie Institution';
$journal = 'Occasional Papers California Academy of Sciences';
$journal = 'Zool Jahrb Jena (Syst) Bd Heft';
$journal = 'Sitzungsberichte der Gesellschaft Naturforschender zu Berlin';
$journal = 'Smithsonian Institution Miscellaneous Collection';
$journal = 'Boletim do Museu Nacional Rio de Janeiro NS Zoologia';
$journal = 'Panstwowe Wydawnictowo Naukowe, Warsaw';
$journal = 'Memorias do Instituto Butantan';
$journal = 'Spolia Zeylanica';

$journal = 'Boletim da Faculdade de Filosofia Ciencias e Letras Universidade de Sao Paulo Zoologica';

$journal = 'Opuscula Zoologica (Muenchen)';
$journal = 'Nachrichtsblatt der Deutschen Malakozoologischen Gesellschaft';

$journal = 'Bulletin Indiana Department of Geology and Natural Resources Indianapolis';

$journal = 'Kilimandjaro';

$journal = 'Journal fuer Ornithologie';
$journal = 'Misc Ent Castanet-Tolosan';

$journal = 'Proc US Nat Mus';

$journal = 'Bulletin of the Raffles Museum Singapore';

$journal = 'Annales du Musee Zoologique Academie des Sciences St Peterburg';
$journal = 'Nat Hist Juan Fernandez Uppsala Zool';

$journal = 'P Soc Victoria';

$journal = 'Journal fuer Ornithologie';

$journal = 'Sitzungsberichte der Gesellschaft Naturforschender zu Berlin';

$journal = 'Ofversigt af Finska Vetenskapssocietetens Forhandlingar Helsingfors';

$journal = 'Rev Soc Bot Afr';
$journal = 'Proceedings of the Helminthological Society of Washington';

$journal = 'Boletim do Museu Nacional Rio de Janeiro Zoologia';
$journal = 'Revista Brasileira de Biologia';

$journal = 'Bulletin of the Brooklyn Entomological Society';
$journal = 'Discovery Reports';
$journal = 'Smithsonian Miscellaneous Collections';
$journal = 'Smithsonian Contributions to Paleobiology';

$journal = 'Siboga';

$journal = 'Proces Verb Soc Linn Bordeaux';
$journal = 'Compte Rendu';
$journal = 'Insecutor Inscitiae Menstruus';

$journal = 'Public Health Reports';

$journal = 'Professional Papers US Geological Survey';

$journal = 'Boletin del Museo Nacional de Historia Natural Chile';

$journal = 'Entomologist\'s Monthly Magazine';

$journal = 'Australian Entomologist, 39(4)';
$journal = 'Veliger, 51(3)';

$journal = 'Allan Hancock Pacific Expedition';

$journal = 'Psyche (Cambridge)';

$journal =' Schriften zur Malakozoologie aus dem Haus der Natur-Cismar';

$sql = 'SELECT * from names WHERE publication LIKE "%' . $journal . '%" AND publicationParsed="N"';

//$sql .= ' AND year=2012';

//$sql = 'SELECT * from names WHERE journal="' . $journal . '"';

//$sql = 'SELECT * FROM names WHERE taxonAuthor LIKE "Veron %" AND publicationParsed="N"';

//$sql = 'SELECT * FROM names WHERE id > 5015135 AND publication IS NOT NULL AND publicationParsed="N"';
//$sql = 'SELECT * FROM names WHERE id > 4964979 AND journal like "(Lepidoptera: Gelechiidae) revealed by molecular data and morphology-how many species are there? Zootaxa"';

//$sql = 'select * from names where id in (4991615)';

//$sql = 'select * from names where title="Braconid wasps from the Cape Verde Islands 3. Braconinae, Cheloninae, Hormiinae, Microgastrinae and Opiinae (Hymenoptera: Braconidae). Mitteilungen des Internationalen Entomologischen Vereins E.V"';

//$sql = 'SELECT * from siboga WHERE publication LIKE "%' . $journal . '%" AND publicationParsed="N"';

//$sql = 'SELECT * from names WHERE taxonAuthor like "Peters 1878"  AND publication IS NOT NULL AND publicationParsed="N"';

//$sql = 'SELECT * from names WHERE genusPart="Molossops" AND publication IS NOT NULL AND publicationParsed="N"';

//$sql = 'SELECT * from names WHERE sici="d959c62dcc76d3c9e278d554c1794448"';

//$sql = 'SELECT * from names WHERE publication like "A new Fruit Bat from N. Loochoo. Lansania Tokyo, 1 1929: pp. 125-128%"';

/*
$sql = 'SELECT * FROM names WHERE sici in (
"cc79475805beed0ba321072251c6986d",
"dfe76668fb4c4a1c0b43515060f8cf3e",
"fdda2f3f223aedd6bf6360e30c19bf16",
"2c6493247cd8d54d05da83af78519050",
"c06a0341d40251789827d51c15b4302f",
"5ac3180abd384dead3badba6ef7dbfea",
"ca6b45c0ae284f664f941c5a10d5df88",
"3b2c28c1fe8417d2dd50b336647aa8ec"
)';
*/

//$sql = 'SELECT * from names WHERE year=1920 AND publication IS NOT NULL AND publicationParsed="N"';



//$sql = 'select * from names where year="1999" AND publicationParsed="N"';

//$sql = 'SELECT * FROM names where issn="0033-2615"';
//$sql = 'SELECT * FROM names where id=780328';


//$sql = 'SELECT * from names WHERE year=2001 AND publicationParsed="N"';


//$sql .= " LIMIT 1000";


//$sql .= " AND volume=1941 LIMIT 100";

//$sql = 'SELECT * from names WHERE publication LIKE "%' . $journal . '%" AND journal <> "Contributions to Natural History (Bern)"';


//$sql = 'SELECT * from names WHERE year=1903 AND publication IS NOT NULL AND publicationParsed="N"';

//$sql = 'SELECT * from names WHERE taxonAuthor="Buckton 1903" AND publication IS NOT NULL AND publicationParsed="N"';

//$sql .= ' AND year > 1920 and year < 1950';

//$sql .= ' AND year = 1993';


//$sql = 'SELECT * FROM names where id=1902290';
//$sql = 'SELECT * FROM names where taxonAuthor="Blume 1965"';


//echo $sql;

//$sql = 'SELECT * from names WHERE journal ="Ent." and publication like "%Can. Ent.,%"';

//$sql = 'select * from names where id=3691743';
//$sql = 'select * from names where id=558168';

//$sql = 'select * from names where taxonAuthor like "Becker 1907" AND publicationParsed="N" and publication IS NOT NULL';

//$sql = 'select * from names where genusPart="Hydractinia" AND publicationParsed="N" and publication IS NOT NULL';

//$sql = 'select * from names where sici in ("311f22565f89567b2e47329471662a6b")';

//echo $sql . "\n";

//$sql = 'select * from names where id = 3950391;' ;
//$sql = 'select * from names where year=1927 AND publicationParsed="N" and publication IS NOT NULL';

//$sql = "select * from names4495670_4499910 where publication is not null and publicationParsed='N'";

//$sql = "select * from names where `group`='Nematomorpha' and  publication is not null and publicationParsed='N'";

$sql = 'select * from names where publication is not null and publicationParsed ="N" and year=1921';

$sql = 'select * from names1921';

$sql = 'select * from names where publication is not null and publicationParsed ="N" and  publication like "% Lambillionea%"';

$sql = 'SELECT * from names where sici in ("aa92d7c9dac9d905ddd1248503a2975a")';


$sql = 'select * from names where taxonAuthor like "Kazenas %" AND publicationParsed="N" and publication IS NOT NULL';

$sql = 'select * from names where `group` = "Microspora" AND publicationParsed="N" and publication IS NOT NULL';

$sql = 'select * from names where publicationParsed="N" and publication IS NOT NULL LIMIT 1000';



$sql = 'SELECT * from names where sici in ("b1610a06fa190860d14b9a954c5e058d","576fcfa50d800fe7a31bb0260cd8fbb0","2599f5a7727603f5c3102c7fb4f4ada9")';
$sql = 'SELECT * from names WHERE publication LIKE "%Byulleten\' Moskovskogo Obshchestva Ispytatelei Prirody Otdel Biologicheskii%" AND publicationParsed="N"';


$sql = 'select * from names where publication is not null and publicationParsed ="N" and year=1983';

$sql = 'select * from names where journal="Class Anthozoa.] Luppov, N.P.; Alekseeva, L.V.; Bogdanova, T.N.; Korotkov, V.A.; Dzhalilov, M.R.; Lobacheva, S.V.; Kuzmicheva, E.I.; Akopyan, V.T.; Smirnova, S.B.[The Valanginian of Mangyshlak.], Nauka"';

$sql = 'select * from names where publication is not null and publicationParsed ="N" and year < 1870';

$sql = 'select * from names where publication is not null and publicationParsed ="N" and year between 1870 and 1900';

$sql = 'select * from names where publication is not null and publicationParsed ="N" and year between 1900 and 1905';

$sql = 'select * from names where taxonAuthor like "Bonet %" and publication is not null and publicationParsed ="N"';

$sql = 'select * from names where `group`="Derbidae" and publication is not null and publicationParsed ="N"';

$sql="select * from names where id >= 5102576 and publication is not null and publicationParsed='N'";



$sql = 'select * from names where sici="ad2696c735f2c01cf68ff67ae9c01553"' ;

$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1990 AND 2000;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1900 AND 1969;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1970 AND 1989;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1960 AND 1969;";

$sql = "select * from names where publication is not null and publicationParsed='N' and year =1969;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1960 AND 1968;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1950 AND 1959;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1940 AND 1949;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1930 AND 1939;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1920 AND 1929;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1910 AND 1919;";
$sql = "select * from names where publication is not null and publicationParsed='N' and year BETWEEN 1900 AND 1910;";


$sql = "select * from `names-5148072` where publication is not null and publicationParsed='N'";

$sql = "select * from names where journal='Annalen des Naturhistorischen Museums in Wien Serie B Botanik und Zoologie, 94-95'";


$sql = "select * from `names-5170612` where publicationParsed='N' LIMIT 100";


$sql = "select * from names where issn='0026-9786'";

$sql = "select * from `names-5206458` where publication is not null and publicationParsed='N';";
$sql = "select * from `names-5215383` where `publication` is not null and `publicationParsed`='N'";

//$sql = "select * from `names-5215383` where publication is not null and publicationParsed = 'N' limit 30;";

$sql = "select * from names where publication is not null and year is null;";


$sql = "select * from names where sici='0921107826250551ee6d37d275f7cf45'";


$sql = "select * from `names-5224337` where `publication` is not null and `publicationParsed`='N'";
$sql = "select * from names where journal='Bulletin of the National Museum of Nature and Science Series A Zoology, Supplement 1'";

$sql = "select * from `names-5237103` where `publication` is not null and `publicationParsed`='N'";

// 2016-01-16
$sql = "select * from `names-5241772` where `publication` is not null and `publicationParsed`='N'";
$sql = "select * from `names-5251401` where `publication` is not null and `publicationParsed`='N'";


$sql = "select * from names where journal like 'Entomofauna, 2%'";

$sql = "select * from `names-5256965` where `publication` is not null and `publicationParsed`='N'";

$sql = "select * from `names-5304582` where `publication` is not null and `publicationParsed`='N'";


$sql = "select * from `names-5333010` where `publication` is not null and `publicationParsed`='N'";
$sql = "select * from `names-5340754` where `publication` is not null and `publicationParsed`='N'";

$sql = "select * from `names` where journal LIKE 'Paleontologicheskii Zhurnal,%'";

//$sql = "select * from names where sici='01121e2f30447e66577973de55378248'";

$sql = "select * from `names` WHERE publication LIKE '%Journal of Vertebrate Paleontology%' AND publicationParsed='N';"; 

$sql = "select * from `names` WHERE  issn='0272-4634' and doi is NULL;";


$sql = "select * from `names` WHERE journal LIKE 'Vertebrate paleontology in the Neotropics%'";

$sql = "select * from `names-5353853` where `publication` is not null and `publicationParsed`='N'";

$sql = "select * from `names` WHERE journal = 'Voy. Jeannel'";

$sql = "select * from names where updated >= '2018-12-25' and publicationParsed='N'";

$sql = "select * from names where updated >= '2019-04-11' and publicationParsed='N'";

$result = $db->Execute('SET max_heap_table_size = 1024 * 1024 * 1024');
$result = $db->Execute('SET tmp_table_size = 1024 * 1024 * 1024');

$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);


$debug_journals = true;
$debug_journals = false;

while (!$result->EOF) 
{	
	$obj = new stdclass;
	
	$obj->id = $result->fields['id'];
	$obj->sici = $result->fields['sici'];
	$obj->publication = $result->fields['publication'];
	$obj->publication = str_replace("\n", "", $obj->publication);
	$obj->publicationParsed = 'N';	
	
	// pre-cleaning
	$obj->publication = preg_replace('/:\s+pp\.\s+(\d+-\d+)\s+figs/', ': pp. $1. figs', $obj->publication);
	
	// Handle missing delimiter (normally '.') signaling end of title
	if (preg_match('/^(?<start>.*)(?<title_end>([a-z]|\)|\]|I))\s+' . $journal . '(?<end>.*)$/Uu', $obj->publication, $m))
	{
		$obj->publication = $m['start'] . $m['title_end'] . '. ' . $journal . $m['end'];
	}
	
	$obj->publication = str_replace('., Vega-Expeditionens', '. Vega-Expeditionens', $obj->publication);
	

	if ($debug_journals)
	{	
		echo "-- " . $obj->publication . "\n";
	}
	echo "\n-- " . $obj->publication . "\n";
		
	
	$matched = false;
	
	// Vertebrate paleontology in the Neotropics
	if (!$matched)
	{
		if (preg_match('/^^(?<title>.*)\.(.*)\.\s+(?<journal>Vertebrate paleontology in the Neotropics.*)\.,\s+(?<publisher>Smithsonian Institution Press),\s+(?<publoc>.*),.*(.*)Chapter pagination:\s+(?<spage>\d+)-(?<epage>\d+)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.(.*)\.\s+(?<journal>Voy.*):\s+\((?<spage>\d+)-(?<epage>\d+)\)/Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
			
	
	
	
	// Paleontologicheskii Zhurnal, 1977(3)75-82
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<publisher>[A-Za-z\'\-\(\)]+((\s+[A-Za-z\'\-\(\)\.]+)+)?),\s+(?<publoc>[A-Za-z]+(\s+&)?(\s+[A-Za-z]+)?),\s+(?<year>[0-9]{4}):(\s+([ivxl\-0123456789]+),)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	
	// books
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<publisher>[A-Za-z\'\-\(\)]+((\s+[A-Za-z\'\-\(\)\.]+)+)?),\s+(?<publoc>[A-Za-z]+(\s+&)?(\s+[A-Za-z]+)?),\s+(?<year>[0-9]{4}):(\s+([ivxl\-0123456789]+),)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<publisher>[A-Za-z\'\-]+((\s+[A-Za-z]+)+)?),\s+(?<publoc>[A-Za-z]+( & New York)?),\s+(?<year>[0-9]{4}):(\s+([ivxl\-0123456789]+),)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	// chapter
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.(?<journal>.*)\.[,]?\s+(?<publisher>[A-Za-z]+((\s+[A-Za-z]+)+)?),\s+(?<publoc>[A-Za-z]+(\s+[A-Za-z]+)?),\s+(?<year>[0-9]{4}):(\s+([ivxl\-0123456789]+),)?\s+(\d+-\d+)\.\s+Chapter pagination:\s*(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
			//exit();
		}
	}		
	
	
	
	//---------
	// Notes diverses, descriptions et diagnoses. Echange Moulins 1913 1914: (97-98 105-106 113-114 121-122 129-130 137-139 145-147 153-154 161-162 169-171 177-180 185-187)
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>Paleontologicheskii Zhurnal),\s+(?<volume>\d+)\((?<issue>.*)\)(?<spage>\d+)-(?<epage>\d+),/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
		
	// Melanges Exotico-Entomologiques 1912-1913: (20 pp.)
	if (!$matched)
	{
		if (preg_match('/^(?<journal>.*)\s+(?<volume>\d+-\d+):\s+\((?<pagination>.*pp\.)\)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	// [Biologia Centrali-americana Coleoptera.] Biologia Centrali-Americana Coleoptera 4(pt. 5) 1907: (137-240).
	if (!$matched)
	{
		if (preg_match('/^(?<title>\[.*\])\s+(?<journal>.*)\s+(?<volume>\d+)\((?<issue>.*)\)\s+(?<year>[0-9]{4}):\s+\((?<pagination>.*)\)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// The fauna of British India including Ceylon and Burma. Rhynchota Vol. iv(pt. 2) 1908: (265-501)
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\s+(?<journal>.*)\s+Vol.\s+(?<volume>[ivxvl]+)\((?<issue>.*)\)\s+(?<year>[0-9]{4}):\s+\((?<pagination>.*)\)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
		
	//-------
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+)(\((?<issue>\d+)\))?,\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>e\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
		
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+-\d+),\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	// Thysanoptera from the Solomon Islands. Bull. Br. Mus. nat. Hist. (Ent.) 24 1970: 83-126.
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Bu.*\))\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			$matched = true;
			echo "-- " . __LINE__ . "\n";
			
			//print_r($m);
		}
	}	
	

	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Ps.*)\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			$matched = true;
			echo "-- " . __LINE__ . "\n";
			
			print_r($m);
		}
	}	
	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>\[.*\])\s+(.*)(?<journal>\[.*\]),(.*)(?<year>[0-9]{4})(.*)Chapter pagination: (?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>Orient\..*)\s+(?<volume>\d+)\s+(?<year>[0-9]{4}): (?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>(Rov Med.|Revista|Records |Mitt. Schweiz).*)\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):(\s+pp\.)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\s+(?<journal>Entomologische Blaetter.*),\s+(?<volume>\d+),\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>\[Lepidoptera of Ecuador.*\])(.*)(?<year>[0-9]{4}):(\s+[ixv\-]+,)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	

	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*)\s+No\.\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):(\s+pp\.)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	

	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)\((?<issue>\d+)\),\s+\w+\s+\d+\s+(?<year>[0-9]{4}): (?<spage>e\d+),/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*). (?<journal>Biodiversity, biogeography and nature conservation in Wallacea and New Guinea). Volume\s+(?<volume>[I]).,(.*)\s+(?<year>[0-9]{4}):(.*)Chapter pagination: (?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*). (?<journal>Masamushi. Entomological papers dedicated to Dr. Kimio Masumoto on the occasion of his retirement., Japanese Society of Scarabaeoidology, Tokyo),\s+(?<year>[0-9]{4}):(.*)Chapter pagination: (?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)"\s+(?<journal>Report.*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+\w+[\']?-\w+[\']?\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>A Sketch.*)\.\s+(?<journal>Bull. Denison Univ.*)\s+(?<volume>[ivxcl]+),\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)[.|,]/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.,\s+(?<journal>Vega-Expeditionens.*),\s+(?<volume>[ivxcl]+),\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)[.|,]/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Parazitologiya.*),\s+(?<volume>\d+)\((?<issue>\d+)\),\s+\w+(-\w+)\'\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+\w+\'(-\w+\')?\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)[\.|,]/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*\.\]?)\s+(?<journal>.*),\s+(?<volume>\d+)\((?<issue>\d+)\)(\(Tome\s+\d+\))?,\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*).\s+(?<journal>(British Antarctic \("\s*Terra Nova"\).*Zoology)),?\s+(?<volume>\d+)(\s+(?<issue>[ixv]+)|\(No.\s+\d+\))\s+(?<year>[0-9]{4}):?\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)(\.|\s+)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}

	if (!$matched)
	{
		if (preg_match('/^(?<title>.*).\s+(?<journal>(Australasian.*))\s+(?<volume>\d+)\s+(?<year>[0-9]{4})\s+Pt.\s+(?<issue>\d+)\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)(\.|\s+)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	

	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\s+(?<journal>Mem.*)\s+(?<volume>\d+)\s+(?<year>[0-9]{4})\s+pp\.?\s+(?<spage>\d+)-(?<epage>\d+)[\.|\s]/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*\.")\s+(?<journal>.*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+\([ivxlc]+ \+ (?<spage>\d+)-(?<epage>\d+)\)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	if (!$matched)
	{
		if (preg_match('/\[title unknown\]\s+(?<journal>.*),\s+(?<volume>\d+)\((?<issue>.*)\)\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)-(?<epage>\d+)\)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.(?<journal>.*),\s+(?<volume>[0-9]{4})\s*Article ID\s*\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)Special Issue,\s+\d+\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>\d+)\)),\s+([A-Z][a-z]+)\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	

	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Mitteilungen des.*)\s+(?<volume>\d+)(\((?<issue>\d+)\))?,\s+\d+\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>\[.*\])\s+(?<journal>.*)\s+(?<volume>\d+)(\((?<issue>\d+)\))?,\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)(-(?<epage>\d+))?\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	if (!$matched)
	{
		if (preg_match('/(?<title>.*)[\.|\?]\s+(?<journal>.*)\s+(?<volume>\d+)\((?<issue>\d+)\),\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	if (!$matched)
	{
		if (preg_match('/(?<title>(.*)[\.|\?])\s+(?<journal>.*)\s+(?<volume>\d+)(\((?<issue>\d+)\))?,\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+)\((?<issue>\d+)\),\s+\d+( de)?\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+),\s+([A-Z]\w+)\s+[0-9]{1,2}\s+(?<year>[0-9]{4}):(\s+\d+),\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>\[Title unknown.\])\s+(?<journal>.*),\s+(?<volume>[ivxlc]+)\s+(?<year>[0-9]{4}):\s+Unpaginated\./u', $obj->publication, $m))
		{
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>[A-Z].*),\s+(No. )(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+Unpaginated./u', $obj->publication, $m))
		{
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+)(\((?<issue>\d+)\))\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\s+(?<journal>.*),\s+(?<volume>[ivxlc]+)\s+(?<year>[0-9]{4}):\s+(?<pages>pp\.\s+[ivxlc]+\.?\s*[-|&]\s*[ivxlc]+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Res(.*))\s+Livr,\s+(?<volume>\d+[a-z]?(\((.*)\))?)\s+(?<year>[0-9]{4}):\s+(?<pagination>.*)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>\[.*\.\])\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+(.*)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+Suppl.)\s+(?<year>[0-9]{4}):\s+([ilvx]+-[ilvx],)\s*(?<spage>\d+)-(?<epage>\d+)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,\s+(.*)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
		
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)\s*Suppl\.?\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+\s+[A])(?<issue>.*)?\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)-(?<epage>\d+)\)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>\[.*\])\s+(?<journal>.*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)-(?<epage>\d+)\)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>[ixvc]+),\s+(?<issue>\d+)\s+(?<year>[0-9]{4}):(\s+pp\.)?\s+(?<spage>\d+)-(?<epage>\d+)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*).\s+(?<journal>.*)\s+(?<volume>\d+)\s+(?<issue>\d+)\s*[0-9]{4}\s+(\(\d+-\d+\))(.*),\s+(?<year>[0-9]{4}):\s+(\((?<spage>\d+)-(?<epage>\d+)\))\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^\[title unknown\]\s+(?<journal>.*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+\((?<pagination>.*)\)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>\[.*\.\])\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>\d+)\))?\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)-(?<epage>\d+)\)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*),?\s+(?<volume>\d+)(\((?<issue>\d+)\))?\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)-(?<epage>\d+)\)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	

	if (!$matched)
	{
		if (preg_match('/^(?<title>\[.*\.\])\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>\d+)\))?\s+(?<year>[0-9]{4}):\s+\((?<pagination>.*)\)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*\.)\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+Unpaginated\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*\.\))\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.(?<journal>.*),\s+(?<volume>\d+),\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+([ivx-]+),\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>\d+)\)),\s+(\d+\s+\w+\s+)?(?<year>[0-9]{4}):\s+Unpaginated/iu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>\d+)\))?\s+(?<year>[0-9]{4}):\s+(?<spage>e\d+),/iu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	/*
	if (!$matched)
	{
		if (preg_match('/\[(?<title>.*)\]\s*(?<journal>.*),\s*(?<volume>\d+)(\((?<issue>.*)\))?,(.*)(?<year>[0-9]{4}):\s*(?<spage>\d+)-(?<epage>\d+)\./iu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	*/
	
	// Adenaplostoma monniotorum n. gen., n. sp., a strange copepod parasite of a compound ascidian from New Caledonia (Crustacea, Copepoda, Cyclopoida, Ascidicolidae). Bulletin du Museum National d'Histoire Naturelle Section A Zoologie Biologie et Ecologie Animales, 15(1-4), Janvier-Mars/Octobre-Decembre 1993: 117-123.
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)[\.|\?]\s+(?<journal>Bulletin du Museum National d\'Histoire Naturelle.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,?\s+(.*)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	// Note sur quelqucs Mammiferes nouveaux prove nants de la Nouvelle-Guinee. Compte Rendu, lxxxv 1877: pp. 1079-1081.  1080 [Zoological Record Volume 14]
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Compte Rendu),\s+(?<volume>[ixvlc]+)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)\s*[-|&]\s*(?<epage>\d+)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	
	
	//  On a new genus and species of Clinocoridae (Cimicidae) from Uganda. Bulletin of Entomological Research, 2 1912: (363 & 364).
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)\s*([-|&]|and)\s*(?<epage>\d+)\)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	

	// Revista Mexicana de Biodiversidad
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Revista Mexicana de Biodiversidad),\s+(?<volume>\d+\(Suplemento\)),\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+S)-(?<epage>\d+S)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	// On the Cyclostomacea of the Dafla Hills, Assam. Journal of the Asiatic Society of Bengal, xlv(pt. 2) 1877: pp. 171-183.
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>[ixvlc]+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	
	// Descriptions of new species of ants from New Guinea. Annals & Magazine of Natural History, 7(11) 1941: pp. 129-144.  129 [Zoological Record Volume 78]
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Annals & Magazine of Natural History),\s+(?<volume>\d+)\s*\((?<series>\d+)\)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// A synoptic classification of the False Scorpions or Chelaspinners, with a report on a cosmopolitan collection of the same.-Part I. The Heterosphyronida (Chthoniidae) (Arachnida-Chelonethidae). Annals & Magazine of Natural History Series 10, Vol. 4 1929: pp. 50-80.  
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.?\s+(?<journal>Annals & Magazine of Natural History Series 10),(\s+[V|v]ol.)?\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+pp.\s(?<spage>\d+)-(?<epage>\d+)(\.|\s)/', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	

	// Contributions towards a Monograph of the species of Annelids belonging to the Amphinomacea, with a list of the known species and a description of several new species (belonging to the group) contained in the National Collection of the British Museum. Journal of the Linnean Society, vol. x(no. 44) 1868: pp. 215-246.
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*)(\s+[V|v]ol\.)?\s+(?<volume>[ivx]+)(\([N|n]o.\s+(?<issue>\d+)\))?\s+(.*)(?<year>[0-9]{4}):\s+(pp.)\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*,\s+Suppl)\s+(?<volume>\d+),\s+(.*)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*)(\s+[V|v]ol\.)?\s+(?<volume>[ivx]+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+(pp.)\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// On some Centipeds and Millipeds from Utah and Arizona. Pan-Pacific Entomologist, Vol. 6(No. 3) 1930: pp. 111-121.
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+Vol.\s+(?<volume>\d+)(\((No.\s+)?(?<issue>.*)\))\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	// Proceedings of the Zoological Society
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Proceedings of the Zoological Society(.*)),(\s+(.*))?\s+(?<year>[0-9]{4}):(\s+pp.)?\s+\(?(?<spage>\d+)-(?<epage>\d+)\)?\./', $obj->publication, $m))
		{
			//print_r($m);
			$m['volume'] = $m['year'];
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	

	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+[A|B])(?<issue>.*)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Can\. Ent\.),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// p. 
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),(\s+[V|v]ol.)?\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):(\s+p\.)\s+(?<spage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)\s+(?<epage>\d+)\)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}

	// Nova Guinea
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Nova Guinea.*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):(\s+\((?<spage>\d+)-(?<epage>\d+)(\)|,))?/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}

	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Nova Guinea.*)\.\s+(?<volume>\d+)(\.\s+(?<publisher>.*),)\s+(?<year>[0-9]{4}):(\s+\((?<spage>\d+)-(?<epage>\d+)(\)|,))?/u', $obj->publication, $m))
		{
			//print_r($m);
			unset($m['publisher']);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	
	// standard
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),(\s+[V|v]ol.)?\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):(\s+pp\.?)?\s+(?<spage>\d+)\s*[-|&]\s*(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)[\.|\?|"]\s+(?<journal>[A-Z].*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)[,|-]\s*(?<epage>\d+)\)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?,?(\s+\w+\s+\d+)?\s+(?<year>[0-9]{4}):\s+(pp\.\s+)?(?<spage>\d+)\s*[-|&| ]\s*(?<epage>\d+)[\.|,]/Uu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	// Arkiv for Zoologi Stockholm
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+\s*[A-Za-z])(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+pp\.\s+(?<spage>\d+)-(?<epage>\d+)\./', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Arkiv for Zoologi Stockholm),\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+\((?<pages>\d+)(\s+pp\.)?\)\./', $obj->publication, $m))
		{
			//print_r($m);
			
			$m['spage'] = 1;
			$m['epage'] = $m['pages'];
			unset($m['pages']);
			
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	

	if (!$matched)
	{
		//echo "Trying " . __LINE__ . "\n";
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Proceedings of the United States National Museum),\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+(?<pages>\d+)\s+pp./', $obj->publication, $m))
		{
			//print_r($m);
			
			$m['spage'] = 1;
			$m['epage'] = $m['pages'];
			unset($m['pages']);
			
			if (preg_match('/no\.?\s*(?<issue>\d+)/i', $m['issue'], $mm))
			{
				$m['issue'] = $m['issue'];
			}
			if (preg_match('/art\.?\s*(?<issue>\d+)/i', $m['issue'], $mm))
			{
				unset($m['issue']);
			}
			
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)[\.|\?]\s+(?<journal>.*),\s+([N|n]o.\s+)?(?<volume>\d+[A-Z]?)(\((?<issue>.*)\))?,(\s+(\d+\s+\w+))?\s+(?<year>[0-9]{4}):(\s+pp\.)?(\s+[ivx]-[ivx]+,?)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/\[?(?<title>.*)\]\s+(?<journal>.*),\s+([N|n]o.\s+)?(?<volume>\d+[A-Z]?)(\((?<issue>.*)\))?,(\s+(\d+\s+\w+))?\s+(?<year>[0-9]{4}):(\s+pp\.)?(\s+[ivx]-[ivx]+,?)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	
	// standard
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)[\.|\?]\s+(?<journal>.*),\s+([N|n]o.\s+)?(?<volume>\d+[A-Z]?)(\((?<issue>.*)\))?,?(\s+(\w+(-\w+)?))?\s+(?<year>[0-9]{4}):(\s+pp\.)?(\s+[ivx]-[ivx]+,)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			if ($m['issue'] == '')
			{
				unset($m['issue']);
			}
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// On eleven new species of freshwater crabs of the genus Somanniathelphusa Bott, 1968, from southern China (Crustacea: Decapoda: Brachyura: Parathelphusidae). Raffles Bulletin of Zoology, 45(1), 17th July 1997: 73-96.  86 [Zoological Record Volume 134]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)\((?<issue>\d+)\),\s+(.*)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	// New West Indian Cerambycid beetles. Proceedings of the United States National Museum Washington, 80(art. 20 no. 2922) 1932: 93 pp.
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)\(art.\s+\d+\s+no.\s+(?<issue>.*)\)\s+(?<year>[0-9]{4}):\s+(?<epage>\d+)\s+pp\./u', $obj->publication, $m))
		{
			//print_r($m);
			$m['spage'] = 1;
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// Raffles suppl.
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.(?<journal>.*Suppl)\s+(?<volume>\d+),(\s+\w+\s+\d+)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	// 88-89
	if (!$matched)
	{
		if (preg_match('/\[?(?<title>.*)\.\]?\s+(?<journal>.*),\s+(?<volume>\d+([-|\/]\d+)?)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	if (!$matched)
	{
		if (preg_match('/\[?(?<title>.*)\.\]?\s+(?<journal>.*),\s+(?<volume>\d+[A|B|C]?),?\s+(\w+\s+)?(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	// The free living nematodes of the Mediter-ranean. iii. The Balearic Islands. Zoologische Mededeelingen Leiden, 23 1942: pp. 229-262.   [Zoological Record Volume 82]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s*(?<journal>.*),\s*(No.\s*)?(?<volume>\d+)\s+(?<year>[0-9]{4}):(\s*pp.)?\s*(?<spage>\d+)-(?<epage>\d+)[\.|,]/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	// [Title unknown.] Annals of Natural History, (7) ix 1902: Unpaginated.   [Zoological Record Volume 39]
	if (!$matched)
	{
		if (preg_match('/\[(?<title>Title unknown)\.?\]\s*(?<journal>.*),\s*\((?<series>\d+)\)\s*(?<volume>[ivx]+)\s*(?<year>[0-9]{4}):\s*Unpaginated\./iu', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s*(?<journal>.*),\s*\((?<series>\d+)\)\s*\(?(?<volume>[ivx]+)\)?\s*(?<year>[0-9]{4}):\s*pp.\s*(?<spage>\d+)-(?<epage>\d+)[\s|\.|,]/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s*(?<journal>.*),\s*\((?<series>\d+)\)\s*\(?(?<volume>[ivx]+)\)?\s*(?<year>[0-9]{4}):\s*(p.\s*(?<spage>\d+)[\.|,])/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	
	// Field museum weirdness
	// A new toad from western China. Zoological Series Field Museum of Natural History, 24 1940: 13 pp. 151-154
	// standard
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(No.\s+)?(?<volume>\d+)(\((?<issue>.*)\))?,?(\s+(\w+(-\w+)?))?\s+(?<year>[0-9]{4}):\s+\d+\s+pp\.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	// raffles supplement
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+),\s+\d+(st|th)\s+\w+\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	// Fieldiana
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(Publication \d+),(.*)\s+(?<year>[0-9]{4}):(\s+([i]-[ivx]+),)?\s*(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// Am Novit
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>American Museum Novitates),(\s+no.)?\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+\d+\s+pp\./iu', $obj->publication, $m))
		{
			//print_r($m);
			$m['spage'] = 1;
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>American Museum Novitates),\s+no.\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):(\s+pp.)?\s+(?<spage>\d+)-(?<epage>\d+)\./iu', $obj->publication, $m))
		{
			//print_r($m);
			$m['spage'] = 1;
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	/*
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)((, No.)|,)\s+(?<volume>\d+) (?<year>[0-9]{4}): \((.*)\s+(\+\s+)?(?<spage>\d+)-(?<epage>\d+)\)\./Uu', $obj->publication, $m))
		{
			//print_r($m);
			$m['spage'] = 1;
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	*/
	
	
	
	// one page
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(No.\s+)?(?<volume>\d+)(\((?<issue>.*)\))?,(.*)?\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	

	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)\)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\s*\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+(?<pagination>\d+)\s*pp\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	

	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(No.\s+)?(?<volume>\d+)\s+(?<year>[0-9]{4}):(\s+([i]-[ivx]+))?,\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(No.\s+)?(?<volume>\d+)\s+(?<year>[0-9]{4}):(.*)\s+([i]-[ivx]+),\s*(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	// date
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(No.\s+)?(?<volume>\d+)(\((?<issue>.*)\))?,(\s+\d+\s\w+)?\s+(?<year>[0-9]{4}):(\s+pp\.)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// Observations on South African Onychophora. Annals of the South African Museum, Vol. 25(Part 2) 1928: pp. 337-340.
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+Vol.\s*(?<volume>\d+)\(Part\s+(?<issue>\d+)\)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	

	// New South African Spiders of the families Migidae, Ctenizidae, Barychelidae, Dipluridae, and Lycosidae. Annals of the South African Museum, (4) 1903: pp. 69-142.
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+\((?<volume>\d+)\)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// No volume just year
	
	// Observations concernant les mammiferes contemporaina des AEpyornis a Madagascar. Bulletin du Museum Paris,  1895: pp. 12-14.
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.?\s+(?<journal>(Bulletin du Museum Paris|Copeia Ann Arbor)),\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			$m['volume'] = $m['year'];
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// Materiaux de la Mission G. Petit a Madagascar. Description de trois Batraciens nouveaux appartenant aux genres Mantidaetylus et Gephyromantis Bull Mus Hist nat Paris, 1(2) 1930: pp. 358-362.   [Zoological Record Volume 67]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.?\s+(?<journal>Bull Mus Hist nat Paris),\s+(?<volume>\d+)\((?<series>\d+)\)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	

	// Chirostylid and galatheid crustaceans (Decapoda: Anomura) of the 'Albatross' Philippine Expedition, 1907-1910. Researches of Crustacea, Special No. 2 1988: 1-203.
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+No.\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	// An enumeration of the Rhynchota received from Baron von Muller, and collected by Mr. Sayer in New Guinea during Mr. Cuthbertson's expedition. Transactions E Soc,  1888: pp. 475-489.
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}

	// Termitenstudien. 3. Systematik der Termiten. Die Familie Metatermitidae. Stockholm Vet Akad Handl, 48(No. 4) 1912: (166).
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)\)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	// Bericht uber die von Herrn Baron Ransonnet am rothen Meere und auf Ceylon gesammelten Neuropteren (L.). Verhandlungen der Zoologisch-Botanischen Gesellschaft in Wien Band xv 1865: pp. 1009-1018.  N. [Zoological Record Volume 2]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>[A-Z].*)\s+(?<volume>[ivx]+)\s+(?<year>[0-9]{4}):\s+pp\.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	// Multiple articles
	//'New species of Heterocera from Costa Rica. xix. Annals & Magazine of Natural History, 11 1913: (1-43 234-262 342-358 361-386).  258 ';

	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>([ixcvl]+|\d+))\s+(?<year>[0-9]{4}):(\s+pp.)?\s+\(?(?<pagination>(?<spage>\d+)-(?<epage>\d+),?(?<other>(\s+\d+-\d+)+))\)?\.\s+((?<microreference>(\d+|[ivxcl]+))\s+)/Uui', $obj->publication, $m))
		{
			//print_r($m);
			
			if ($m['microreference'] != '')
			{
				$microreference = $m['microreference'];
				
				if (!is_numeric($microreference))
				{
					$microreference = arabic($microreference);
				}
				
				//echo "micro=$microreference\n";
				
				if ($m['other'] != '')
				{
					$others = explode(' ', $m['other']);
					
					//print_r($others);
					
					foreach ($others as $other)
					{
						$range = explode('-', $other);
						if (
							($microreference >= $range[0]) &&
							($microreference <= $range[1])
							)
						{
							$m['spage'] = $range[0];
							$m['epage'] = $range[1];
							
							unset($m['spage2']);
							unset($m['epage2']);
						}
					}
				}
			}
			
			unset($m['other']);
			
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
			
		}
	}
	
	// Multiple articles (Proc Zool Soc)
	//'New species of Heterocera from Costa Rica. xix. Annals & Magazine of Natural History, 11 1913: (1-43 234-262 342-358 361-386).  258 ';

	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Proceedings of the Zoological Society(.*)),\s+(?<year>[0-9]{4}):(\s+pp.)?\s+\(?(?<pagination>(?<spage>\d+)-(?<epage>\d+),?(?<other>(\s+\d+-\d+)+))\)?\.\s+((?<microreference>(\d+|[ivxcl]+))\s+)/Uui', $obj->publication, $m))
		{
			//print_r($m);
			
			$m['volume'] = $m['year'];
			
			
			if ($m['microreference'] != '')
			{
				$microreference = $m['microreference'];
				
				if (!is_numeric($microreference))
				{
					$microreference = arabic($microreference);
				}
				
				//echo "micro=$microreference\n";
				
				if ($m['other'] != '')
				{
					$others = explode(' ', $m['other']);
					
					//print_r($others);
					
					foreach ($others as $other)
					{
						$range = explode('-', $other);
						if (
							($microreference >= $range[0]) &&
							($microreference <= $range[1])
							)
						{
							$m['spage'] = $range[0];
							$m['epage'] = $range[1];
							
							unset($m['spage2']);
							unset($m['epage2']);
						}
					}
				}
			}
			
			unset($m['other']);
			
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
			
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+)(\((?<issue>\d+)\))?\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./Uu', $obj->publication, $m))
		{
			$matched = true;
			echo "-- " . __LINE__ . "\n";
			
		}
	}	
	
	
	// no microcitation
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):(\s+pp.)?\s+\(?(?<pagination>(?<spage>\d+)-(?<epage>\d+),?((\s+\d+-\d+)+))\)?\.\s+/Uu', $obj->publication, $m))
		{
			$matched = true;
			echo "-- " . __LINE__ . "\n";
			
		}
	}	
	
	
	
	// Mission Rohan-Chabot dans l'Angola et dans le Rhodesia (1914). Descriptions de Curculionides nouveaux, 1. et 2. notes. Bull Mus Hist nat Paris, 1923 1923: pp. 147-153 & 234-239.  147 [Zoological Record Volume 60]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.?\s+(?<journal>Bulletin du Museum Paris),\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\s+(&\s+)?(?<spage2>\d+)-(?<epage2>\d+)\.\s+((?<microreference>\d+)\s+)?/u', $obj->publication, $m))
		{
			//print_r($m);
			
			// can we choose between two articles?
			
			if (
				($m['microreference'] >= $m['spage2']) &&
				($m['microreference'] <= $m['epage2'])
				)
			{
				$m['spage'] = $m['spage2'];
				$m['epage'] = $m['epage2'];
				
				unset($m['spage2']);
				unset($m['epage2']);
			}
			else
			{
				unset($m['spage2']);
				unset($m['epage2']);
			}

			//print_r($m);
			
			
			
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// Books----------------------------------------------------------------------
	
	// book
	if (!$matched)
	{
		if (preg_match('/(?<title>.*).\s+(?<year>[0-9]{4}):\s+([ivx]+)\s*\+\s*(?<pages>\d+)\s+pp/u', $obj->publication, $m))
		{
			//print_r($m);
			
			$obj->publicationParsed = 'Y';
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	

	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(No.\s+)?(?<volume>\d+)(\((?<issue>.*)\))?,(\s+(\w+(-\w+)?)(\s+\d+)?)?\s+(?<year>[0-9]{4}):(\s+pp\.)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/\[?(?<title>.*)\.\]?\s+(?<journal>.*),\s+(No.\s+)?(?<volume>\d+)(\((?<issue>.*)\))?,?(\s+(\w+(-\w+)?))?\s+(?<year>[0-9]{4}):(\s+pp\.)?\s+(?<spage>\d+)-(?<epage>\d+)(\.|,)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(No.\s+)?(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):(\s+pp\.)?\s+(?<spage>\d+)(-(?<epage>\d+))?\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	// CR Ac Sci
	if (!$matched)
	{
		if (preg_match('/(?<title>.*). (?<journal>CR Ac Sci), (?<volume>\w+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}): pp. (?<spage>\d+)\s*[-|&]\s*(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	// Siboga
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\s+Monogr. (?<volume>[xvli]+)\.\s+(?<journal>.*),\s+(?<year>[0-9]{4}):\s+(?<pagination>.*)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Uitkoinsten(.*))\s+Mon,\s+(?<volume>\d+[a-z]?(\((.*)\))?)\s+(?<year>[0-9]{4}):\s+(?<pagination>.*)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Uitkomsten(.*))\s+Monogr,\s+(?<volume>\d+[a-z]?(\((.*)\))?)\s+(?<year>[0-9]{4}):\s+(?<pagination>.*)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	

	
	

	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>Uitkomsten.*)\s+Mon,\s+(?<volume>\d+[a-z]?)\s+(?<year>[0-9]{4}):\s+(?<pagination>.*)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	
	/*
	// ION RSS
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+[A-Z]?)\s+(?<year>[0-9]{4}):\s+(pp.\s+|\()?(?<spage>\d+)-(?<epage>\d+)(\))?\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	*/
	
	// aust suppl
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),(\s+No.)?\s+(?<volume>\d+)Suppl.,?\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$m['journal'] .= ' Suppl.';
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)No\.\s+(?<issue>.*)\s+(?<year>[0-9]{4}):(\s+([i]-[ixv]+),)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+No\.\s+(?<volume>\d+)(\((?<issue>.*)\))?\s+(?<year>[0-9]{4}):(\s+([i]-[ixv]+),)?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	

	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>[ixvlc]+)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		


	if (!$matched)
	{
		if (preg_match('/\[Title unknown\.?\]\.?\s+(?<journal>.*),\s+(?<volume>[ixvcl]+|\d+)\s+(?<year>[0-9]{4}):\s+Unpaginated\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		


	// no pagination?
	if (!$matched)
	{
		if (preg_match('/\[Title unknown\.?\]\.?\s+(?<journal>.*),\s+(?<volume>.*)\s+(?<year>[0-9]{4}):\s+Unpaginated\.\s+/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	// title only
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<year>[0-9]{4}):\s+(Unpaginated|(pp.\s+)?(?<pagination>.*))\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+)\(\(\d+\)\)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	

	if (!$matched)
	{
		if (preg_match('/^(?<title>\[.*\.\])\s+(?<journal>.*)\s+(?<volume>[ixlc]+)\s+(?<year>[0-9]{4}):\s+Unpaginated\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	// journal not separated from title by "." (spage-epage)
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\s+(?<journal>(Boletin|Bulletin|Entomologische Blaetter|Journal |Mem |Notulae |Proc |Proceedings|Revista|Revue |Transactions|Zoologische).*),(\s+(?<volume>\d+))?\s+(?<year>[0-9]{4}):\s+\((?<spage>\d+)-(?<epage>\d+)\)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}
	
	// journal not separated from title by "." (pp.)
	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\s+(?<journal>(Boletin|Bulletin|Entomologische Blaetter|Journal |Mem |Notulae |Proc |Proceedings|Revista|Revue |Transactions|Zoologische).*),(\s+(?<volume>\d+))?\s+(?<year>[0-9]{4}):\s+pp\.?\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	if (!$matched)
	{
		if (preg_match('/(?<title>Thousand.*),\s+(.*),?\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):?\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)(\.|\s+)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\s+(?<journal>Tijdschrift.*),(\s+(?<volume>\d+))?\s+(?<year>[0-9]{4}):\s+pp\.?\s+(?<spage>[ixvlc]+)-(?<epage>[ixvlc]+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\s+(?<journal>.*),(\s+(?<volume>\d+))?\s+(?<year>[0-9]{4}):\s+pp\.?\s+(?<spage>[ixvlc]+)-(?<epage>[ixvlc]+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	if (!$matched)
	{
		if (preg_match('/^(?<title>.*)\.\s+(?<journal>(Bull|Jour|Proc).*),\s+(?<volume>\d+)(\((?<issue>\d+)\))?\s+(?<year>[0-9]{4}):(\s+pp\.)?\s+(?<spage>\d+)-(?<epage>\d+)\.?\s/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	// Gesneropithex nov. gen., ein neuer Primate aus dem Ludien von Gosgon (Solothurn). Verhandlungen der Schweizerischen Naturforschenden Gesellschaft 126 1946 [1947]: pp. 126-127.   [Zoological Record Volume 84]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>\d+)\s+(?<year>[0-9]{4})\s+\[[0-9]{4}\]:\s+pp\.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// Etude d'Ensemble sur les Dents des Mammiferes Fossiles des Environs de Reims. Bulletin Soc Geol (3)(xix) 1891: pp. 263-290.  275 [Zoological Record Volume 28]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+\((?<series>\d+)\)\((?<volume>[ivxl]+)\)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
		
	// Hudson river beds near Albany and their taxonomic equivalents. Report New York Museum liv((3)) (1901): pp. 485-596.  578 [Zoological Record Volume 41]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+\((?<series>\d+)\)\((?<volume>[ivxl]+)\)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
		
	// Olduvai Gorge 1951-61. Volume 1. A preliminary report of the geology and fauna. (Cambridge University Press), 1965: pp. i-xiv, 1-118.  [Zoological Record Volume 102]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+\((?<publisher>.*)\),\s+(?<year>[0-9]{4}):\s+pp.\s+[ivxl]+-[ivxl]+,\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	// A "stupendous discovery": the fossil skull from Olduvai which represents " the oldest well-established stone toolmaker ever found." Illustrated London News 235 1959: 217, 219.  NOV. PLEIS [Zoological Record Volume 96]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*\.")\s+(?<journal>.*)\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+),\s+(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	// Apuntes sobre el Genero Typotherium. Revista del Museo de La Plata ii 1891: pp. 74 et seq.   [Zoological Record Volume 28]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>[ixvl]+)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<pagination>.*)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	// On the names of certain North American Vertebrates. Science (2)(ix) 1899: pp. 593 & 594.  593 [Zoological Record Volume 36]
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+\((?<series>\d+)\)\((?<volume>[ivxl]+)\)\s+(?<year>[0-9]{4}):\s+pp.\s+(?<spage>\d+)\s+&\s+(?<epage>\d+)/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// Hudson river beds near Albany and their taxonomic equivalents. Report New York Museum liv((3)) (1901): pp. 485-596.  577 [Zoological Record Volume 41]	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<volume>[ivxl]+)\(\((?<issue>\d+)\)\)\s+\((?<year>[0-9]{4})\):\s+pp.\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// [Some notes on Oligocene rhinoceroses from Mongolia.] Travaux Inst Paleont Acad Sci URSS 55 1954: 190-205.   [Zoological Record Volume 92]
	if (!$matched)
	{
		if (preg_match('/(?<title>\[.*\])\s+(?<journal>.*)\s+(?<volume>\d+)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	
	// [Title unknown.] American Naturalist xv 1881: 231, 232, 578, 882.  882 [Zoological Record Volume 18]
	if (!$matched)
	{
		if (preg_match('/(?<title>\[.*\])\s+(?<journal>.*)\s+(?<volume>[ixvl]+)\s+(?<year>[0-9]{4}):\s+(?<pagination>\d+(,\s+\d+)+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}	
	

	// title journal year
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*)\s+(?<year>[0-9]{4}):\s+(?<spage>\d+)-(?<epage>\d+)\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		

	
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>\d+)\((?<issue>\d+)\),\s+\w+\s+\d+\s+(?<year>[0-9]{4}):\s+(?<pagination>(.*)(\d+)(.*))\./u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	

	// if all else fails just grab title, journal, year, and pagination
	if (!$matched)
	{
		if (preg_match('/(?<title>.*)\.\s+(?<journal>.*),\s+(?<volume>.*)\s+(?<year>[0-9]{4}):\s+(?<pagination>(.*)(\d+)(.*))\.\s+/u', $obj->publication, $m))
		{
			//print_r($m);
			$matched = true;
			echo "-- " . __LINE__ . "\n";
		}
	}		
	
	// Catch "obvious" failures and undo
	if ($matched)
	{
		if ($matched) 
		{
			if (preg_match('/^[\]|"|\(]/', $m['journal']))
			{
				$matched = false;
			}
		}
		if ($matched) 
		{
			if (preg_match('/^\d+/', $m['journal']))
			{
				$matched = false;
			}
		}
		if ($matched) 
		{
			if (preg_match('/^[iI][-\.]/', $m['journal']))
			{
				$matched = false;
			}
		}
		if ($matched) 
		{
			if (preg_match('/^Part[\s|e]/', $m['journal']))
			{
				$matched = false;
			}
		}
		if ($matched) 
		{
			if (preg_match('/^Pt\./', $m['journal']))
			{
				$matched = false;
			}
		}
		if ($matched) 
		{
			if (preg_match('/^spec\./', $m['journal']))
			{
				$matched = false;
			}
		}
		if ($matched) 
		{
			if (preg_match('/^Teil./', $m['journal']))
			{
				$matched = false;
			}
		}
	}
	
	
	
	
	if ($matched)
	{
		if ($obj->publicationParsed == 'N')
		{
			$obj->publicationParsed = (($matched && ($m['title'] || $m['journal'])) ? 'Y' : 'N');
		}
		
		
		
		
		foreach ($m as $k => $v)
		{
			if (!is_numeric($k))
			{
				$obj->${k} = $v;
			}
		}
		
		// clean
		
		if (isset($obj->title))
		{
			if ($obj->title == '[Title unknown.]')
			{
				unset($obj->title);
			}
		}
		

		
		if (isset($obj->journal))
		{
		
			$obj->journal = trim($obj->journal);
			
			if (preg_match('/,$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/,$/', '', $obj->journal);
			}
			
			$obj->journal = preg_replace('/, pt\.$/', '', $obj->journal);
			
				
					
			if (preg_match('/^(?<number>[xvcil]+)\.\s+(?<journal>.*)$/Uu', $obj->journal, $mm))
			{
				$obj->journal = $mm['journal'];
				$obj->title .= '. ' . $mm['number'];
			}

			if (preg_match('/^(?<number>Parts.*)\.\s+(?<journal>.*)$/Uu', $obj->journal, $mm))
			{
				$obj->journal = $mm['journal'];
				$obj->title .= '. ' . $mm['number'];
			}

			if (preg_match('/\s+Vol$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/\s+Vol$/', '', $obj->journal);
			}
			if (preg_match('/\s+fasc$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/\s+fasc$/', '', $obj->journal);
			}

			if (preg_match('/, No\.$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/, No\.$/', '', $obj->journal);
			}
			if (preg_match('/,\s+No$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/,\s+No$/', '', $obj->journal);
			}
			if (preg_match('/,\s+Band$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/,\s+Band$/', '', $obj->journal);
			}
			if (preg_match('/\sBd\.$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/\sBd$\./', '', $obj->journal);
			}

			if (preg_match('/\s+Bd Heft$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/\s+Bd Heft/', '', $obj->journal);
			}

			if (preg_match('/\s+No$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/\s+No$/', '', $obj->journal);
			}

			if (preg_match('/\s+livr$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/\s+livr$/', '', $obj->journal);
			}
			
			if (preg_match('/^(?<journal>.*)\s+\((?<series>\d+)\)$/Uu', $obj->journal, $mm))
			{
				$obj->journal = $mm['journal'];
				$obj->series = $mm['series'];
			}

			if (preg_match('/\s+Bd$/Uu', $obj->journal))
			{
				$obj->journal = preg_replace('/\s+Bd$/', '', $obj->journal);
			}
			
			
			// split titles
			if ($obj->journal == 'Nat.')
			{
				if (preg_match('/^(?<title>.*)\. Museo Nao. Cienc/', $obj->title, $mm))
				{
					$obj->title = $mm['title'];
					$obj->journal = 'Museo Nao. Cienc. ' . $obj->journal;
				}
			}
			
			// nat., Madrid Tomo extraord.
			if ($obj->journal == 'nat., Madrid Tomo extraord.')
			{
				if (preg_match('/^(?<title>.*)\. (?<journal>Mem R. Soc. esp. Hist)/', $obj->title, $mm))
				{
					$obj->title = $mm['title'];
					$obj->journal = $mm['journal'] . '. ' . $obj->journal;
				}
			}
			
			// Zanon Ann Mus Civ st nat Genova
			if ($obj->journal == 'Zanon Ann Mus Civ st nat Genova')
			{
				$obj->title .= '. Zanon';
				$obj->journal = 'Ann Mus Civ st nat Genova';
			}
			
			// Z Tokyo
			if ($obj->journal == 'Z Tokyo')
			{
				if (preg_match('/^(?<title>.*), (?<journal>Dobuts)/', $obj->title, $mm))
				{
					$obj->title = $mm['title'];
					$obj->journal = $mm['journal'] . '. ' . $obj->journal;
				}
			}
			
			// The Chilopoda Occ Paprs Mus Zool Univ Michigan Ann Arbor
			if ($obj->journal == 'The Chilopoda Occ Paprs Mus Zool Univ Michigan Ann Arbor')
			{
				if (preg_match('/^(?<title>.*) (?<journal>Occ .*)/', $obj->journal, $mm))
				{
					$obj->title .= '. ' . $mm['title'];
					$obj->journal = $mm['journal'];
				}
			}
			
			// No 1 Amer Mus Novit New York
			if ($obj->journal == 'No 1 Amer Mus Novit New York')
			{
				if (preg_match('/^(?<title>.*) (?<journal>Amer .*)/', $obj->journal, $mm))
				{
					$obj->title .= '. ' . $mm['title'];
					$obj->journal = $mm['journal'];
				}
			}
			
			// n. et spec n. Proceedings of the Royal Physical Society of Edinburgh
			if ($obj->journal == 'n. et spec n. Proceedings of the Royal Physical Society of Edinburgh')
			{
				if (preg_match('/^(?<title>.*) (?<journal>Proceedings .*)/', $obj->journal, $mm))
				{
					$obj->title .= '. ' . $mm['title'];
					$obj->journal = $mm['journal'];
				}
			}
			
			// varr.] 
			
			if (preg_match('/^(?<title>.*varr.\])\s+(?<journal>.*)/', $obj->journal, $mm))
			{
				$obj->title .= '. ' . $mm['title'];
				$obj->journal = $mm['journal'];
			}
			
			// notice.] Nachr Ges Gotting 1886
			if (preg_match('/^(?<title>.*notice.\])\s+(?<journal>.*)/', $obj->journal, $mm))
			{
				$obj->title .= '. ' . $mm['title'];
				$obj->journal = $mm['journal'];
			}
			
			// I Abh Ver Brem
			if (preg_match('/^(?<title>I)\s+(?<journal>.*)/', $obj->journal, $mm))
			{
				$obj->title .= '. ' . $mm['title'];
				$obj->journal = $mm['journal'];
			}
			
			// lre partie Ann Soc ent France Paris
			if ($obj->journal == 'lre partie Ann Soc ent France Paris')
			{
				if (preg_match('/^(?<title>.*) (?<journal>Ann Soc .*)/', $obj->journal, $mm))
				{
					$obj->title .= '. ' . $mm['title'];
					$obj->journal = $mm['journal'];
				}
			}
			// C. F. Baker. Bollettino dei Musei di Zoologia e di Anatomia Comparata Torino
			if ($obj->journal == 'C. F. Baker. Bollettino dei Musei di Zoologia e di Anatomia Comparata Torino')
			{
				if (preg_match('/^(?<title>.*) (?<journal>Bollettino .*)/', $obj->journal, $mm))
				{
					$obj->title .= '. ' . $mm['title'];
					$obj->journal = $mm['journal'];
				}
			}
			// Coelenterati. Memorie Descrittive della Carta Geologica d'Italia Roma
			if ($obj->journal == 'Coelenterati. Memorie Descrittive della Carta Geologica d\'Italia Roma')
			{
				if (preg_match('/^(?<title>.*) (?<journal>Memorie .*)/', $obj->journal, $mm))
				{
					$obj->title .= '. ' . $mm['title'];
					$obj->journal = $mm['journal'];
				}
			}
			
			// Eine Pliocan fauna von Seran (Molukken,) Centralbl
			// sp., which the author discovered in the crab. Nihon Biseibutsugakkwai Zasshi
			if (preg_match('/^(?<title>(.*))\s+(?<journal>Centralbl)$/', $obj->journal, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . ' ' . $obj->journal;
			}
			
			
			// Extra bits on title
			if (preg_match('/^(?<title>(.*))\s+(?<journal>(Conch|Conch. Cab. pt|Proces-Verbaux Soc Malac|C|Abh. Ber. zool. anthropol. Mus|Rep. U. S|Bull. U.S. Fish Comm|MT. z. Stat|Bull. Soc|Boll. Zool|Bull|Nat|Zool. Chal|Arch Z|Bull. Ent))$/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			// sp., which the author discovered in the crab. Nihon Biseibutsugakkwai Zasshi
			if (preg_match('/^(?<title>sp\.(.*))\.\s+(?<journal>.*)/', $obj->journal, $mm))
			{
				$obj->title .= '. ' . $mm['title'];
				$obj->journal = $mm['journal'];
			}
			
			// xxx
			if (preg_match('/^(?<title>.*)\s+(?<journal>Am. Journ. of Sc)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			if (preg_match('/^(?<title>.*)\s+(?<journal>Mem. Soc. Phys)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			if (preg_match('/^(?<title>.*)\s+(?<journal>Naturhist. Tidsskr)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Vidensk. Selsk. Forh)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			if (preg_match('/^(?<title>.*)\s+(?<journal>Jenaische Zeitschr)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			if (preg_match('/^(?<title>.*)\s+(?<journal>Wiener entom)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			if (preg_match('/^(?<title>.*)\s+(?<journal>Wien. ent)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Kongliga Svenska Vetensk.-Akad)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>OEfvers. Kongl. Vetensk-Akad)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			if (preg_match('/^(?<title>.*)\s+(?<journal>OEfvers af K. Vet-Akad)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			if (preg_match('/^(?<title>.*)\s+(?<journal>OEfvers. af k. Vet.-Akad)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Vidensk. Selsk. Skr)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Schriften der naturforschenden Gesellschaft in Danzig)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Madras Quart. Journ. Med)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Zoologischer Theil. Fische. 3. Abtheilung)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Verhandl. der k.-k. zool.-bot)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Trans. Connecticut Acad)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
	
			if (preg_match('/^(?<title>.*)\s+(?<journal>OEfvers. af K. Vet. Akad)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}

			if (preg_match('/^(?<title>.*)\s+(?<journal>Herausgegeben von der k.-k. zool.-bot)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
	
	
			if (preg_match('/^(?<title>.*)\s+(?<journal>Zeitschrift fur wissensch)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Ann. Sci$)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}

			if (preg_match('/^(?<title>.*)\s+(?<journal>OEfvers. af k. Vct.-Akad)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Mem. Soc. de Phys. et d\'Hist.)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Mem. Acad. Imp. Sci. St)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Trans)$/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Arch)$/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Vidensk. Selsk)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
			if (preg_match('/^(?<title>.*)\s+(?<journal>Proc. Roy. Soc)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}

			if (preg_match('/^(?<title>.*)\s+(?<journal>Mem. de l\'Acad. Roy)/', $obj->title, $mm))
			{
				$obj->title = $mm['title'];
				$obj->journal = $mm['journal'] . '. ' . $obj->journal;
			}
			
			
	
			// (Sex Coleoptera nova palaearctica.) Casopis Praze (Prague)
			if (preg_match('/^(?<title>\(.*\)\.?)\s+(?<journal>.*)/', $obj->journal, $mm))
			{
				$obj->title .= '. ' . $mm['title'];
				$obj->journal = $mm['journal'];
			}
						
	
			
			//----------
			// Kungliga Svenska
			
			if (preg_match('/(?<journalstart>Kungliga Svenska|K Svenska|Bollettino|Annali|Boll Mus|Zoologische|Boletin|Biological Results|Ann Mus|Mitteil Vogelw)/', $obj->journal, $mmm))
			{
				//print_r($mmm);
				
				//echo '/^(?<title>.*) (?<journal>' . addcslashes($mmm['journalstart'], "'") . '.*)/' . "\n";
			
				
				if (preg_match('/^(?<title>.*) (?<journal>' . addcslashes($mmm['journalstart'], "'") . '.*)/', $obj->journal, $mm))
				{
					//print_r($mm);
					$obj->title .= '. ' . $mm['title'];
					$obj->journal = $mm['journal'];
				}
			}
			
			// - 
			if (preg_match('/^- /', $obj->journal, $mm))
			{
				$obj->journal = str_replace("- ", "", $obj->journal);
			}
			// )
			if (preg_match('/^\)\s+/', $obj->journal, $mm))
			{
				$obj->title .= ')';
				$obj->journal = preg_replace('/^\)\s+/', '', $obj->journal);
			}

			if (preg_match('/^"\s+/', $obj->journal, $mm))
			{
				$obj->title .= '"';
				$obj->journal = preg_replace('/^"\s+/', '', $obj->journal);
			}
			

			if (preg_match('/,\s+tome$/', $obj->journal, $mm))
			{
				$obj->journal = preg_replace('/,\s+tome$/', '', $obj->journal);
			}
			
			if (preg_match('/,\s+vol.$/', $obj->journal, $mm))
			{
				$obj->journal = preg_replace('/,\s+vol.$/', '', $obj->journal);
			}
			
			if (preg_match('/,\s+Bd.$/', $obj->journal, $mm))
			{
				$obj->journal = preg_replace('/,\s+Bd.$/', '', $obj->journal);
			}
			
			if (preg_match('/\s+[S|s]er\.?\s+(?<series>\d+)$/', $obj->journal, $mm))
			{
				$obj->journal = preg_replace('/\s+[S|s]er\.?\s+(?<series>\d+)$/', '', $obj->journal);
				$obj->series = $mm['series'];
			}
			
		
			
			
			if (0)
			{
				// extra bits of title...
				if (preg_match('/^(?<extra>.*)\.\s+(?<journal>.*)$/Uu', $obj->journal, $mm))
				{
					$obj->journal = $mm['journal'];
					$obj->title .= '. ' . $mm['extra'];
				}
	
	
				if (preg_match('/^(?<extra>" Liguria.")\s+(?<journal>.*)$/Uu', $obj->journal, $mm))
				{
					$obj->journal = $mm['journal'];
					$obj->title .= '. ' . $mm['extra'];
				}
			}
			
			

		}
		
		// hack for books
		if (isset($obj->publisher))
		{
			$obj->title .= '{"publisher":{"name":"' . $obj->publisher . '"';
			if (isset($obj->publoc)) 
			{
				$obj->title .= ',"address":"' . $obj->publoc . '"';
			}
			$obj->title .= '}}';
		}
		
		
		if (isset($obj->volume))
		{
			$obj->volume = preg_replace('/^bd.\s+/i', '', $obj->volume);
		}
		if (isset($obj->volume))
		{
			$obj->volume = preg_replace('/^[N|n]o.\s*/i', '', $obj->volume);
		}

		if (isset($obj->volume))
		{
			$obj->volume = preg_replace('/^Nr.\s+/i', '', $obj->volume);
		}
		
		
		if (isset($obj->volume))
		{
			if (preg_match('/(?<volume>\d+)\s*\((Art|pt).\s+(?<issue>\d+)\)/', $obj->volume, $mm))
			{
				$obj->volume = $mm['volume'];
				$obj->issue = $mm['issue'];
			}	
		}
		if (isset($obj->volume))
		{
			if (preg_match('/(?<volume>\d+)\s*\((?<issue>\d+)\)/', $obj->volume, $mm))
			{
				$obj->volume = $mm['volume'];
				$obj->issue = $mm['issue'];
			}	
		}
		
		
		if (isset($obj->issue))
		{
			$obj->issue = trim($obj->issue, "()");
		}
		
		
		if (isset($obj->issue))
		{
			$obj->issue = preg_replace('/^no.\s+/i', '', $obj->issue);
		}
		
		if (isset($obj->issue))
		{
			$obj->issue = preg_replace('/^Part\s+/i', '', $obj->issue);
		}

		if (isset($obj->issue))
		{
			$obj->issue = preg_replace('/^[P|p]t.\s+/i', '', $obj->issue);
		}
		
		if (isset($obj->issue))
		{
			$obj->issue = preg_replace('/^Heft\s+/i', '', $obj->issue);
		}
		

		if (isset($obj->issue))
		{
			if (preg_match('/^[0-9]{4}$/', $obj->issue))
			{
				unset($obj->issue);
			}
		}
		
		if (isset($obj->pagination) && !isset($obj->spage))
		{
			if (preg_match('/^\(?(?<spage>\d+)-(?<epage>\d+)\)?$/', $obj->pagination, $mm))
			{
				$obj->spage = $mm['spage'];
				$obj->epage = $mm['epage'];		
			}
		}

		if (isset($obj->pagination) && !isset($obj->spage))
		{
			if (preg_match('/^pp.\s+(?<spage>\d+)-(?<epage>\d+)$/', $obj->pagination, $mm))
			{
				$obj->spage = $mm['spage'];
				$obj->epage = $mm['epage'];		
			}
		}
		
		
		/*
		if (isset($obj->journal))
		{
			
			$pos = strpos($obj->journal, $journal);
			if ($pos === false)
			{
			}
			else
			{
				if ($pos > 0)
				{
					$obj->title .= '.' . substr($obj->journal, 0, $pos);
					$obj->journal = substr($obj->journal, $pos);
				}
			}
		}
		*/
		
		// SQL
		$sql = "UPDATE names SET";
//		$sql = "UPDATE names1921 SET";
//		$sql = "UPDATE siboga SET";
		$count = 0;		
		
		
		$pos = strpos($obj->publication, 'Chapter pagination');
		if ($pos === false)
		{
			$obj->isPartOf = 'N';
		}
		else
		{
			$obj->isPartOf = 'Y';
		}
		
		
		
		foreach ($obj as $k => $v)
		{
			switch ($k)
			{
				case 'id':
				case 'sici':
					break;
					
				case 'publisher':
				case 'publoc':
					break;
					
				case 'pages':
					break;
					
				default:
					if ($v != '')
					{
						if ($count != 0)
						{
							$sql .= ",";
						}
						$sql .= " " . $k . "='" .  addcslashes($v, "'") . "'";
						$count++;
					}
					break;
			}
		}
		$sql .= " WHERE sici='" . $obj->sici . "';";
		
		if ($debug_journals)
		{		
			// for debugging journal info
			echo $obj->journal . "\n";
		}
		else
		{
			echo $sql . "\n";
		}
		
		
		
	}
	
	//print_r($obj);	
	
	$result->MoveNext();
}



?>