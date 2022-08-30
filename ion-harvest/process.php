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

//$files1 = array('5504');

$skip = array();

$skip = array(
4500201,
4501315,
4501809,
4501885,
4502167,
4502223,
4502745,
4502783,
4502871,
4502889,
4502935,
4502995,
4503113,
4503171,
4503261,
4503313,
4503384,
4503515,
4503549,
4503568,
4503585,
4503719,
4504051,
4504095,
4504217,
4504267,
4504335,
4504521,
4504765,
4504991,
4500200,
4500574,
4500810,
4501280,
4501716,
4502178,
4502616,
4502820,
4502866,
4503060,
4503220,
4503228,
4503258,
4503594,
4503646,
4503652,
4503716,
4503994,
4504000,
4504258,
4504596,
4504644,
4504650,
4504758,
4504834,
4504846,
4505000,
4500125,
4500588,
4501497,
4501573,
4501582,
4501589,
4501777,
4502267,
4502781,
4502845,
4502893,
4502905,
4502980,
4503133,
4503144,
4503187,
4503191,
4503221,
4503251,
4503507,
4503517,
4503577,
4504073,
4504085,
4504146,
4504249,
4504265,
4504457,
4504541,
4504542,
4504567,
4504753,
4504988,
4500118,
4500872,
4500976,
4501496,
4502606,
4502732,
4502790,
4502794,
4502808,
4502842,
4503042,
4503218,
4503426,
4503778,
4503802,
4503828,
4503840,
4503952,
4504152,
4504276,
4504402,
4504488,
4504574,
4504688,
4504852,
4504874,
4504896,
4500300,
4501265,
4501803,
4502611,
4502863,
4502897,
4502899,
4502901,
4503205,
4503211,
4503235,
4503323,
4503485,
4503529,
4503575,
4503795,
4503985,
4504083,
4504497,
4504729,
4504857,
4500202,
4502176,
4502272,
4502284,
4502750,
4502824,
4502856,
4502916,
4503226,
4503254,
4503310,
4503352,
4503514,
4503666,
4503732,
4503738,
4504284,
4504290,
4504590,
4504894,
4504936,
4500573,
4500591,
4500921,
4501007,
4501580,
4501581,
4502181,
4502615,
4502801,
4502925,
4502988,
4503031,
4503063,
4503087,
4503153,
4503263,
4503305,
4503497,
4503528,
4503571,
4503675,
4503704,
4503720,
4503724,
4503725,
4503737,
4503753,
4503762,
4503779,
4503841,
4504077,
4504195,
4504361,
4504473,
4504517,
4504563,
4504565,
4504586,
4504695,
4504733,
4500218,
4500256,
4500996,
4501456,
4501644,
4501882,
4501898,
4502634,
4502776,
4503170,
4503222,
4504034,
4504194,
4504248,
4504352,
4504752,
4504790,
4504886,
4500195,
4500281,
4500299,
4500582,
4501679,
4502269,
4502619,
4502749,
4502751,
4502753,
4502767,
4502793,
4502795,
4502817,
4502829,
4503045,
4503124,
4503179,
4503223,
4503237,
4503322,
4503345,
4503359,
4503937,
4503987,
4504039,
4504099,
4504151,
4504555,
4504571,
4504581,
4504771,
4504921,
4504931,
4500274,
4500842,
4501468,
4502198,
4502218,
4502646,
4502838,
4502852,
4502874,
4503112,
4503154,
4503244,
4503374,
4503498,
4503614,
4503916,
4503996,
4504078,
4504158,
4504732,
4504754,
4504770,
4504880,
4504954,
4500584,
4500589,
4500593,
4501003,
4501013,
4501621,
4501629,
4502119,
4502855,
4502919,
4502920,
4503025,
4503077,
4503129,
4503168,
4503183,
4503186,
4503527,
4503647,
4503755,
4503905,
4503984,
4504213,
4504535,
4504589,
4504706,
4504735,
4504746,
4504815,
4504859,
4504869,
4504945,
4504964,
4504986,
4501266,
4501314,
4501482,
4501518,
4502200,
4502632,
4502636,
4502914,
4503010,
4503062,
4503138,
4503482,
4503954,
4504250,
4504358,
4504530,
4504638,
4500127,
4500906,
4501005,
4501593,
4502219,
4502653,
4502687,
4502740,
4502788,
4502879,
4502902,
4503157,
4503181,
4503195,
4503227,
4503306,
4503360,
4503379,
4503393,
4503495,
4503573,
4503583,
4503739,
4503745,
4503771,
4503988,
4504001,
4504122,
4504323,
4504531,
4504560,
4504573,
4504585,
4504725,
4504789,
4504947,
4504984,
4501008,
4501570,
4501884,
4502676,
4502778,
4502832,
4503174,
4503196,
4503420,
4503486,
4503662,
4503794,
4503826,
4504178,
4504230,
4504332,
4500273,
4501583,
4501591,
4501875,
4502177,
4502639,
4502651,
4503051,
4503128,
4503162,
4503617,
4503962,
4504041,
4504144,
4504149,
4504207,
4504219,
4504225,
4504237,
4504275,
4504393,
4504588,
4504697,
4504961,
4501630,
4501896,
4502196,
4502818,
4502936,
4503224,
4503570,
4503574,
4503578,
4503648,
4503664,
4503820,
4504150,
4504196,
4504292,
4504316,
4504556,
4504792,
4504950,
4500123,
4501687,
4502169,
4502203,
4502285,
4502805,
4502837,
4502949,
4503175,
4503182,
4503197,
4503259,
4503302,
4503308,
4503389,
4503579,
4503615,
4503643,
4503722,
4503728,
4503748,
4503913,
4504087,
4504147,
4504181,
4504205,
4504271,
4504333,
4504355,
4504475,
4504737,
4500224,
4501624,
4502236,
4502650,
4503036,
4503054,
4503130,
4503132,
4503292,
4503334,
4503576,
4503690,
4503718,
4503792,
4504002,
4504208,
4504400,
4504594,
4504642,
4504830,
4504938,
4500162,
4500909,
4501487,
4501637,
4501877,
4502731,
4502747,
4502807,
4502895,
4502909,
4502947,
4503047,
4503120,
4503145,
4503219,
4503327,
4503331,
4503717,
4503731,
4503759,
4503833,
4503986,
4504065,
4504177,
4504351,
4504465,
4504693,
4504897,
4504989,
4500116,
4500616,
4500874,
4501072,
4501576,
4501810,
4502204,
4502654,
4502686,
4502862,
4502890,
4503198,
4503656,
4503734,
4503834,
4504252,
4504310,
4504354,
4504356,
4504392,
4504850,
4504878,
4504882,
4504998,
4500239,
4500275,
4500285,
4501281,
4501647,
4501727,
4501873,
4501907,
4502283,
4502926,
4502982,
4503189,
4503193,
4503249,
4503461,
4503551,
4503553,
4503582,
4503791,
4503825,
4503902,
4503982,
4504277,
4504365,
4504526,
4504533,
4504548,
4504559,
4504689,
4504727,
4504741,
4504745,
4504795,
4504833,
4504999,
4500282,
4500910,
4502268,
4502602,
4502730,
4502770,
4502888,
4502996,
4502998,
4503032,
4503058,
4503190,
4503192,
4503250,
4503282,
4503356,
4503640,
4503712,
4503714,
4503790,
4504482,
4504576,
4504698,
4504836,
4501575,
4501579,
4501889,
4502757,
4502761,
4502789,
4502983,
4502997,
4503209,
4503245,
4503321,
4503326,
4503344,
4503475,
4503499,
4503506,
4503562,
4503586,
4503655,
4503741,
4503751,
4503961,
4504139,
4504209,
4504493,
4504539,
4504562,
4504699,
4504731,
4504767,
4504786,
4504889,
4504933,
4504997,
4500286,
4501464,
4501680,
4502618,
4502800,
4502846,
4502848,
4502950,
4503134,
4503158,
4503210,
4503758,
4503804,
4504040,
4504114,
4504336,
4504694,
4504930,
4500289,
4501585,
4501799,
4502168,
4502221,
4502849,
4502931,
4502937,
4502940,
4502973,
4503009,
4503117,
4503139,
4503347,
4503367,
4503501,
4503564,
4503581,
4503653,
4503711,
4503797,
4504102,
4504128,
4504131,
4504215,
4504553,
4504823,
4504891,
4504913,
4500290,
4501484,
4501578,
4502690,
4502810,
4502870,
4502918,
4502938,
4502974,
4503028,
4503240,
4503248,
4503630,
4503978,
4503990,
4504036,
4504050,
4504222,
4504288,
4504686,
4504796,
4504824,
4504932,
4504994,
4500120,
4500205,
4501584,
4501900,
4501901,
4502635,
4502724,
4502762,
4502928,
4502944,
4502945,
4503037,
4503126,
4503140,
4503155,
4503165,
4503166,
4503188,
4503241,
4503271,
4503385,
4503561,
4503607,
4503649,
4503989,
4504075,
4504111,
4504180,
4504211,
4504326,
4504515,
4504519,
4504569,
4504584,
4504687,
4504766,
4504827,
4504853,
4504935,
4500158,
4500594,
4500870,
4501590,
4501594,
4501642,
4501890,
4502216,
4502222,
4502638,
4502798,
4502814,
4502830,
4503080,
4503176,
4503200,
4503238,
4503654,
4503770,
4504130,
4504154,
4504210,
4504232,
4504534,
4504652,
4504684,
4504696,
4504842,
4500115,
4500179,
4500197,
4500199,
4500279,
4500922,
4500981,
4500987,
4501522,
4501577,
4501643,
4502709,
4502813,
4502904,
4502913,
4502951,
4503065,
4503201,
4503225,
4503231,
4503335,
4503363,
4503493,
4503520,
4503555,
4503557,
4503563,
4503687,
4503721,
4503908,
4504123,
4504137,
4504145,
4504263,
4504297,
4504363,
4504528,
4504726,
4504740,
4504829,
4504847,
4504881,
4504929,
4504962,
4500240,
4501000,
4501016,
4501592,
4501626,
4502738,
4502876,
4502976,
4503008,
4503018,
4503038,
4503256,
4503492,
4503592,
4503736,
4503824,
4503848,
4504112,
4504202,
4504282,
4504330,
4504884,
4500241,
4500302,
4500841,
4500871,
4501279,
4501317,
4501520,
4501525,
4502771,
4502839,
4502921,
4502922,
4502959,
4503029,
4503131,
4503215,
4503320,
4503386,
4503397,
4503487,
4503829,
4503847,
4503997,
4504015,
4504257,
4504353,
4504357,
4504543,
4504544,
4504761,
4504843,
4504893,
4504895,
4504966,
4500570,
4501274,
4502158,
4502804,
4502894,
4503156,
4503236,
4503296,
4503330,
4503424,
4503516,
4503938,
4504138,
4504262,
4504738,
4500160,
4500161,
4500985,
4501733,
4502763,
4502833,
4502841,
4502869,
4502900,
4502946,
4502957,
4502979,
4503091,
4503127,
4503143,
4503147,
4503257,
4503548,
4503580,
4503747,
4503803,
4504033,
4504079,
4504141,
4504157,
4504175,
4504203,
4504507,
4504757,
4504762,
4500276,
4500994,
4501422,
4501638,
4502194,
4502338,
4502674,
4502754,
4503178,
4503212,
4503550,
4503552,
4503974,
4504046,
4504132,
4504794,
4500269,
4500809,
4501011,
4501351,
4501625,
4501881,
4502691,
4502865,
4502908,
4502911,
4502964,
4503159,
4503199,
4503217,
4503233,
4503348,
4503368,
4503403,
4503593,
4503629,
4503729,
4503900,
4503959,
4503993,
4504005,
4504103,
4504142,
4504164,
4504328,
4504329,
4504331,
4504525,
4504549,
4504759,
4504764,
4504768,
4504877,
4504885,
4500978,
4501804,
4502844,
4502892,
4502930,
4503026,
4503242,
4503284,
4503530,
4503912,
4503936,
4503998,
4504062,
4504086,
4504264,
4504286,
4504558,
4504756,
4504890,
4500129,
4500157,
4500265,
4501588,
4501807,
4502193,
4502700,
4502773,
4502777,
4502803,
4502827,
4502867,
4502906,
4502923,
4502924,
4502948,
4503013,
4503149,
4503243,
4503247,
4503279,
4503283,
4503307,
4503744,
4503793,
4503823,
4503831,
4504119,
4504163,
4504197,
4504461,
4504700,
4504743,
4504760,
4504879,
4504963,
4500198,
4500204,
4500618,
4500992,
4502710,
4502816,
4502858,
4502978,
4503202,
4503214,
4503752,
4503958,
4504038,
4504076,
4504200,
4504274,
4504296,
4504514,
4504714,
4504996,
4500277,
4500301,
4501811,
4502649,
4502713,
4502719,
4503067,
4503203,
4503207,
4503239,
4503547,
4503560,
4503569,
4503651,
4503661,
4503999,
4504101,
4504324,
4504340,
4504423,
4504459,
4504583,
4504965,
4504982,
4502642,
4502812,
4502834,
4502868,
4502898,
4502932,
4502972,
4503050,
4503194,
4503400,
4503650,
4503670,
4503796,
4504004,
4504490,
4504592,
4504654,
4500119,
4500181,
4500191,
4500209,
4500580,
4501273,
4501726,
4501897,
4502782,
4502787,
4502825,
4502965,
4502967,
4502985,
4503269,
4503297,
4503309,
4503324,
4503611,
4503663,
4503723,
4503757,
4503835,
4503975,
4504003,
4504129,
4504159,
4504165,
4504467,
4504523,
4504551,
4504739,
4504755,
4504835,
4504955,
4501910,
4502840,
4503030,
4503150,
4504054,
4504206,
4504270,
4504730,
4504820,
4504828,
4504898,
4500117,
4500183,
4500651,
4500995,
4502633,
4502737,
4502765,
4502780,
4502815,
4502857,
4502915,
4503027,
4503089,
4503123,
4503141,
4503169,
4503229,
4503395,
4503425,
4503491,
4503566,
4503659,
4503691,
4503735,
4503743,
4503749,
4503969,
4503991,
4504148,
4504306,
4504327,
4504491,
4504665,
4504831,
4504875,
4504887,
4501628,
4502756,
4502774,
4502910,
4502912,
4503000,
4503014,
4503116,
4503510,
4503558,
4503688,
4503710,
4504042,
4504084,
4504136,
4504512,
4504848,
4500283,
4500983,
4501491,
4501586,
4501740,
4502166,
4502199,
4502823,
4502903,
4502907,
4502989,
4503146,
4503287,
4503503,
4503733,
4503935,
4504160,
4504189,
4504269,
4504366,
4504449,
4504742,
4504744,
4504791,
4504813,
4504825,
4504919,
4500572,
4501640,
4502202,
4502640,
4502878,
4502956,
4502994,
4503090,
4503172,
4503270,
4503396,
4503754,
4504272,
4504278,
4504538,
4504610,
4504648,
4504690,
4504816,
4504888,
4504892,
4502160,
4502617,
4502707,
4502766,
4502799,
4502929,
4502981,
4503061,
4503151,
4503163,
4503265,
4503599,
4503685,
4503740,
4503766,
4503907,
4504035,
4504043,
4504047,
4504097,
4504135,
4504273,
4504391,
4504477,
4504685,
4504779,
4504785,
4504807,
4504821,
4501490,
4501878,
4502672,
4503078,
4503230,
4503298,
4503332,
4503394,
4503556,
4503644,
4504082,
4504268,
4504294,
4504468,
4501587,
4501627,
4501639,
4501641,
4502173,
4502641,
4502760,
4502811,
4502851,
4502859,
4502875,
4502891,
4502933,
4503115,
4503148,
4503164,
4503167,
4503355,
4503441,
4504140,
4504182,
4504279,
4504399,
4504546,
4504728,
4504899,
4504920,
4500284,
4501596,
4502822,
4502934,
4502970,
4503260,
4503268,
4503318,
4503358,
4503496,
4503512,
4503572,
4503660,
4503668,
4503730,
4503992,
4504080,
4504204,
4504470,
4504646,
4504806,
);

foreach ($files1 as $directory)
{
	//echo $directory . "\n";
	if (preg_match('/^\d+$/', $directory))
	{	
		//echo $directory . "\n";
		
		$files2 = scandir(dirname(__FILE__) . '/' . $basedir . '/' . $directory);
		
		//$files2 = array('5504012.xml');

		foreach ($files2 as $filename)
		{
			//echo $filename . "\n";
			if (preg_match('/\.xml$/', $filename))
			{	

				$xml = file_get_contents(dirname(__FILE__) . '/' . $basedir . '/' . $directory . '/' . $filename);
				
				$id = str_replace('.xml', '', $filename);
				
				echo "-- $id\n";
				
				//echo $xml;

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
	
				//if (isset($obj->publication))
				//if (!isset($obj->publication))
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
			
			
					if (!in_array($id, $skip))
					{
						echo $sql . "\n";
					}
		
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
