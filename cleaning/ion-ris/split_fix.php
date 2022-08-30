<?php

// fix parsing errors

require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(dirname(dirname(__FILE__))) . '/adodb5/adodb.inc.php');

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	$config['db_user'] , $config['db_passwd'] , $config['db_name']);

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$journal = "Sci.";
$title_extra = "Bull. mar";

$title_extra ="Proceedings Calif. Acad";
$title_extra ="Proc. Calif. Acad";
$title_extra ="Pacif";
$title_extra ="Contr";
$title_extra = "Occ. Pap. Calif. Acad";
$title_extra = "Bull. Sth. Calif. Acad";
$title_extra = "Bull. Los Ang. Cty Mus";
$title_extra = 'Iowa St. J';
$title_extra='Bulletin Acad. r. Belg. Cl';
$title_extra ='Pakist. J';
$title_extra ='N.Z. J';
$title_extra ='Curr';
$title_extra ='NW';
$title_extra = 'Q. J. Fla Acad';
$title_extra = 'Tex. J';
$title_extra = 'J. Ariz. Acad';
$title_extra = 'Contr. mar';
$title_extra = "Proc. Egypt. Acad";
$title_extra = "C.r. Acad. bulg";
$title_extra = 'Q. Jl Fla Acad';
$title_extra = 'Geol. Newsl. int. Un. geol';
$title_extra = 'Ceylon J';
$title_extra = 'Ohio J';
$title_extra = 'J. Tenn. Acad';


$journal = 'Ent.';
$extras = array(
'Ann. Soc',
'Beitr', 
'Fragm',
'Israel J',
'J. Econ',
'Mich',
'Nachrichtenblatt bayer',
'N.Z',
'N. Z',
'Notul',
'Pan-Pacif',
'Philipp',
'Quaest',
'Tijdschr',
'Trans. Soc. Br',
'Z. angew'
);


$journal = 'Bull.';
$extras = array(
'Hong Kong Fish',
'Kans. Univ. Sci',
'Otago Mus',
'University Kans. Sci'
);

$journal = 'Beitr.';
$extras=array(
'Bonn. zool'
);

$journal = 'Honolulu';
$extras=array(
'J. med. Ent'
);

$journal = 'Paris (Zool.)';
$extras=array(
'Memoires Mus. natu. Hist. nat',
'Bulletin Mus. natn. Hist. nat'
);



$journal = 'nat., Paris';
$extras=array(
'Bull. Mus. natn. Hist',
);

$journal = 'Soc.';
$extras=array(
'Trans. Am. microsc',
' J. Assam Sci',
'J. Bombay nat. Hist',
'Trans. Am. ent',
'J. Aust. ent',
'J. Kans. ent',
'Zool. J. Linn',
'J. Bombay nat. Hist',
'Proc. Hawaii ent',
'Trans. Br. ent. nat. Hist',
'Zoological J. Linn',
'Trans. Shikoku ent',
'J. Elisha Mitchell scient',
'J. N.Y. ent',
'J. Georgia ent',
'J. Kans. ent',
'J. Assam Sci',
'Proc. Yorks. geol',
'Journal Kans. east',
'Rev. Bulg. geol',
'Bull. Br. arachnol',
'J. Kans. ent'

);

$journal = 'Wash.';
$extras=array(
'Proc. biol. Soc',
'Proc. ent. Soc',
'Proc. helminth. Soc',
'Proceedings ent. Soc',
'Proceedings biol. Soc'
);

$journal = 'Anz.';
$extras=array(
'Zool'
);

$journal = '(Syst.)';
$extras=array(
'Zool. Jb'
);


$journal = 'Meded., Leiden';
$extras=array(
'Zool'
);

$journal = 'Leiden (E J Brill)';
$extras=array(
'Nova Guinea. Resultats de l\'Expedition scientifique Neerlandaise a la Nouvelle-Guinee en 1903, sous les auspices de Arthur Wichmann, Chef de l\'Expedition',
'Nova Guinea, Resultats de l\'expedition scientifique neerlandaise a la Nouvelle Guinee en 1903, sous les auspices de Arthur Wichmann, chef de l\'expedition',
'Nova Guinea, Resultats do l\'expedition scientifique neerlandaiso a la Nouvelle Guinee en 1903 sous les auspices de Arthur Wichmann, chef do l\'expedition',
'Nova Guinea. Resultats de l\'expedition scientifique neerlandaise a la Nouvalle Guinee en1903 sous les auspices deArthur Wichmann,chef de l\'expedition',
'Nova Guinea, Resultats de l\'expedition scientifique neerlandaise a la Nouvelle Guinee en 1903, sous les auspices de Arthur Wichmann, chef de l\'expedition'
);

$journal = 'Hydrobiol';
$extras=array(
'lnternationale Rev. ges',
'lnternationale Revue ges',
'Cah. O.R.S.T.O.M'
);

$journal = 'Mus';
$extras=array(
'Records W. Aust',
'Record W. Aust',
'Records S. Aust',
'Records Aust',
'Record Aust',
'Bulletin Iraq nat. Hist',
'Memoirs Aust',
'Bulletin Basrah nat. Hist',
'Mitteilungen hamb. zool',
 'Yokosuka Cy',
 'Memoirs Qd',
 'Records Auckland lnst',
 'Casopis narod',
 '\(asopis narod',
 'Annals Afr',
 
);

$journal='10';
$journal='11';
$journal='9';
$extras=array(
'Memoirs Memoirs Inst Vertebr Paleont Paleoanthrop Peking, No',
'Memoirs Inst Vertebr Paleont Paleoanthrop Peking, No',
'Proceedings of the Japanese Society for Systematic Zoology, No',
'Memoirs ent Soc sth Afr, No',
'Bulletin Allyn Mus, No',
'Bulletin Fac dourest Sci Otsuma Wmns Univ, No',
'Memoirs Inst Vertebr Paleont Paleoanthrop Peking, No'
);

$journal = 'Smithsonian Institution U S National Museum Proceedings';
$extras=array(
'Washington D.C'
);

$journal='Zool., Lond.';
$extras=array(
'J'
);

$journal = 'Hist.';
$extras=array(
'J. nat'
);

$journal = '(Ent.)';
$extras=array(
'Bull. Br. Mus. nat. Hist'
);


$journal = 'Yearbook American Philosophical Society';
$extras=array(
//'Transactions Am. ent',
//'ZoologicalJ. Linn',
//'Zoological J. Linn'

'Transactions Am. ent',
'Transactions Am. microsc',
'Journal Kansas ent',
'Transactions Shikoku ent',
'Bulletin Yokohama munic. Univ',
'Review bulg. geol',
'Proceedings Hawaii. ent',
'Journal Georgia ent',
'Transactions Am. micros',
'Transactions Am. Fish',
'Journal Lepid',
'Bulletin Md herpet'

);

/*
$journal = 'Obozr.';
$extras=array(
'Ent'
);

$journal = 'Univ Kans';
$extras=array(
'Occasional Pap. Mus. nat. Hist'
);

$journal = 'Parasit.';
$extras=array(
'J'
);
*/

$journal = 'Hydrobiol.';
$extras=array(
'Arch',
'Internationale Revue ges',
'lnternationale Revue ges',
'Int. Revue ges',
'Revta Mus. argent. Cienc. nat. B.R. Inst. nac. Invest. Cienc. nat'
);

$journal = 'Nom.';
$extras=array(
'Bull. zool'
);

$journal = 'afr.';
$extras=array(
'Revue Zool. Bot',
'J. ent. Soc. sth',
'J. ent. J. ent. Soc. sth',
'Revue Zool. Bot'
);

$journal = 'Ges.';
$extras=array(
'Mitt. schweiz. ent',
'Mitt. munch. ent',
'Z. wien. ent',
'Abh. Schw. pal',
'Abh. Senckenberg. Naturforsch',
'Abh. senckenb. naturforsch'


);

$journal = 'Nat.';
$extras=array(
'Atti Soc. ital. Sci',
'W. Aust',
'Am. Midl',
'Noticiario mens. nac. Hist',
'SWest',
'Nouv. Arch. Mus. d\'Hist',
'Memorie Soc. ital. Sci',
'Notul',
'Bolm. Soc. port. Cienc',
'Cah',
'Ann. Sci'
);

$journal = 'Biol.';
$extras=array(
'Senckenberg',
'Senckenburg',
'C.r. Seanc. Soc',
'Revta. Bras',
'Revta Bras',
' J. theor',
'Wasmann J',
'Zh. obshch',
'Allan Hancock Monogr. mar',
'Rev. Brasil',
'Adv. mar',
'Acta bras',
' Jap. J. med. Sci'
);

$journal = 'Nat.';
$extras=array(
'Noticiario Mens. Mus. nac. Hist',
'Boletin Soc. venez. Cienc',
'Boln Soc. venez. Boln Soc. venez. Cienc'
);

$journal = 'Paris';
$extras=array(
'Agronomie trop',
'Bull. Mus. natn. Hist. nat'

);

$journal = 'Syst.';
$extras=array(
'Zool. Jahrb'
);

$journal='Vict.';
$extras=array(
'Memoirs natn. Mus',
'Proc. R. Soc',
'Memoirs natn. Mus',
'Mem. natn. Mus'
);


$journal='biol.)';
$extras=array(
'Bull. Acad. pol. Sci. (Ser. Sci',
'Studia Univ. Babes-Bolyai (Ser',
'Anal. Univ. Bucuresti (Ser. St. Nat',
'Bull. Acad, poi. Sci. (Ser. Sci',
'Bulletin Acad. pol. Sci. (Ser. Sci'
);

$journal='Univ';
$extras=array(
'Occasional Pap. Mus. Texas Tech',
'Uchenye Zap. tartu. gos',
'Occasional Pap. Mus. Zool. La St'
);

$journal = 'noire (A)';
$extras=array(
'Bull. Inst. fond. Afr'
);

$journal = 'Inst';
$extras=array(
'Trudy Paleont',
'Mitteilungen hamb. zool. Mus',
'Trudy Limnol',
'Tsentral\'biol. Pochv',
'Trudy dal\'nevost, nauch. tsentralbiol pochv',
'Memoirs Am. ent',
'Memoirs N.Z. Oceanogr',
'Raboty sev. kavk. gidrobiol. Sta. gorsk. sel\'Khoz',
'Trudy dal\'nevost. nauch. tsentralbiol. pochv',
'Trudy vses. nauchno-issled. geol. Neft',
'Bulletin Maurit',
'Contribution Am. ent',
'Contriibutions Am. ent',
'Trudy dal\'nevost. nauch. tsentrabiol pochv',
'Trudy dal\'revost. nauch. tsentralbiol. pochv',
'Trudy dal\'nevost nauch. tsentralbiol. pochv',
'Trudy dal\'nevost. nauch. tsentral biol. pochv'
);

$journal = 'Zool.';
$extras=array(
'Beob. Ergebn',
'Pakist. J',
'Can. J',
'Ark',
'Smithson. Contr',
'Rev. et Mag',
'Smithsonian Contr',
'Israel J',
'Jap J.',
'Vest',
'Korean J',
'Tulane Stud',
'Vest. csl. Spol',
'Proc. all-India Congr',
'Revta Mus. argent. Cienc. nat. Invest. Cienc. nat. Cienc',
'Z. angew',
'Aust',
'Aust J.',
'Aust. J',
'Occ. Pap. R. Ont. Mus',
'Appl. Ent',
'Annls Mus. r. Afr. cent. 8[degrees] Sci',
'Suite. Rev. et Mag',
'Jap. J. sanit',
'Siebold und Kolliker\'s Zeitschr. f. wissensch',
'Zeitschr. wiss',
'Boll. Soc. Rom',
'Proc. First  All-India Congr',
'Am',
'An. Inst. Biol. Univ. Nal. Auton. Mex. Ser',
'Jap. J',
'Nytt Mag',
'Proc. Japan. Soc. syst'

);

$journal = 'Insects';
$extras=array(
'Orient',
'Pacif'
);

$journal = 'Bishop Museum';
$extras=array(
'Occasional Papers Bernice P',
'Insects of Micronesia, B. P'
);

$journal = 'Rec';
$extras=array(
'New Zealand 0.l',
'New Zealand O.I',
'New Zealand O. I',
'New Zealand O.l',
'New Zealand 0.1'
);


$journal = 'Tasm.';
$extras=array(
'Pap. Proc. R. Soc'
);

$journal = 'Petersburg)';
$extras=array(
'Parazitologiya (St',
'Botanicheskii Zhurnal (St'
);

$journal = 'Entomologische Zeitschrift';
$extras=array(
'Deutsche',
'Berliner'
);

$journal = 'Tokyo';
$extras=array(
'Bull. natn. Sci. Mus',
'Appl. Ent. Zool',
'Acta arachn',
'National Inst. Anim. Hlth Q'
);

$journal = 'John\'s College';
$extras=array(
'Memoirs of the School of Entomology St'
);

$journal = 'Harv.';
$extras=array(
'Bull. Mus. comp. Zool',
'Bulletin Mus. comp. Zool'
);


$journal = 'S Aust';
$extras=array(
'Transactions R. Soc',
'Transactions R. Sco'
);

$journal = '(N.S.)';
$extras=array(
'Annls Soc. ent. Fr',
'Prirodov. Pr. Cesk. Akad. Ved',
'Insecta matsum',
'J. A. S. B',
'Q. J. Micr. Sci',
'Revue algol',
'Lav. Soc. ital. Biogeogr',
'Scientific Publs Sci. Mus. Minn',
'Ann. Soc. ent. Fr'
);

$journal = 'Mus.';
$extras=array(
'Rec. S. Aust',
'Ann. Transv',
'Special Publs W. Aust',
'P. U. Nat',
'Ann. Cape prov',
'Bull. Auckland Inst',
'Rec. Auckland Inst',
'Ann. S. Afr',
'Ann. Carneg',
'Records Queen Vict',
'Res. Bull. Meguro Parasit',
'Records Aust',
'Life Sci. Contr. R. Ont',
'Cas. narod',
'Cas. nerod',
'Rec. Aust',
' J. E. Afr. nat. Hist. Soc. natn',
'Zbirn. Prats zool',
'Bull. Iraq nat. Hist',
'Rec. Queen Vict',
'Annals Transv',
'J. E. Afr. nat. Hist. Soc. natn'
);

$journal = 'Mag';
$extras=array(
'Entomologist\'s mon',
'Geol'
);

$journal = 'N.S.)';
$extras=array(
'Revta Mus. La Plata (Zool'
);

$journal='News';
$extras=array(
'Ent'
);


$journal='Fr.';
$extras=array(
'Bull. Soc. Z',
'Bull. Soc. ent',
'C.r. Somm. Seanc. Soc. geol',
'Bull. Soc. geol',
'Bulletin Soc. ent',
'Bull. Soc. zool',
'Bull. Soc. geol'

);

$journal='hung.';
$extras=array(
'Annls hist.-nat. Mus. natn',
'Acta zool',
'Annls hist.-nat. Mus, natn',
'Parasit',
'Acta Zool. Acad. Sci',
'Mulls hist.-nat. Mus. natn'
);

$journal = '8)';
$extras = array(
'Annls Mus. r. Afr. cent. (Ser'

);



$journal = 'Belg.';
$extras = array(
'Ann. Soc. mal',
'Bull. Scient. Fr',
'Bull. Annls Soc. r. ent',
'Mem. Soc. r. ent',
'Bull. Inst. r. Sci. nat',
'Annis Annls Soc. geol',
'Annls Soc. geol',
'Bull. biol. Fr',
'Bulletin Annls. Soc. r. ent',
'Bulletin Cercle Lepid',
'Annls Soc. r. zool'


);


$journal='Petersburg)';
$extras = array(
'Parazitologiya (St'
);

$journal = 'Bpest';
$extras = array(
'Opusc. zool'
);

$journal = '2';
$extras = array(
'Memoirs Lyman ent Mus Res Lab, No',
'Memoirs Can. Soc. Petrol. Geol, No',
'Acta Humboldtiana Geol Palaeont, No',
'Memoirs Sch Ent St Johns Coll, No',
'Pap. Dep. Ent. Univ. Qd',
'Niger. J. Sci',
'Bulletin Sch. Agric. For. Taihoku imp. Univ, No'
);

$journal = '(Zool.)';
$extras = array(
'Bulletin Br. Mus. nat. Hist',
'Bull. Br. Mus. nat. Hist',
'Revue roum. Biol.',
'Studii Cerc. Biol',
'Revue roum. Biol',
'Boln Mus. nac. Rio de J',
'Revta Mus. argent. Cienc. nat. Bernardino Rivadavia Inst. nac. Invest. Cienc. nat',
'Bolm Mus. nac. Rio de J',
'Annls Sci. nat'
);

$journal = '(Vert.)';
$extras=array(
'Annls Paleont',
'Annales Paleont'
);

$journal = '(OFFICE DE LA RECHERCHE SCIENTIFIQUE ET TECHNIQUE OUTRE-MER) SERIE HYDROBIOLOGIE';
$journal = '(Office de la Recherche Scientifique et Technique Outre-Mer) Serie Entomologie Medicale et Parasitologie';
$journal = '(OFFICE DE LA RECHERCHE SCIENTIFIQUE ET TECHNIQUE OUTRE-MER) SERIE BIOLOGIE';
$extras=array(
'CAHIERS O.R.S.T.O.M',
'Cahiers O.R.S.T.O.M',
'Cahiers O.R.S.T.O.M',
'CAHIERS O.R.S.T.O.M'
);


$journal='(Monogr.)';
$extras=array(
'Palaeontogr. Soc'
);


$journal='(Geol.)';
$extras=array(
'Byull. Mosk. Obshch. Ispyt. Prir',
'Sci. Rep. Tohoku Univ',
'Bulletin Br. Mus. nat. Hist',
'Acta Univ. Carol',
'Bull. Br. Mus. nat. Hist',
'Trans. R. Soc. N.Z',
'Mem. Fac. Sci. Kyushu Univ',
'Mem. Fac. Sci. Kyushu Univ',
'Acta Univ. Carol',
'Acta Univ. Carol'
);

$journal = '(Earth Sci.)';
$extras=array(
'Trans. R. Soc. N.Z'

);

$journal = '(C)';
$extras=array(
'Proc. k. ned. Akad. Wet'

);

$journal = 'Var.';
$extras=array(
'Entomologist\'s Rec. J'

);

$journal = 'Sci.)';
$extras=array(
'R. Soc. N.Z. (Biol',
'Trans. R. Soc. N.Z. (Biol',
'Occ. Pap. Univ. Conn. (Biol',
'Bull. Fukuoka Gakugei Univ. (Nat'
);

$journal = 'Am.';
$extras=array(
'Mem. geol. Soc',
'Ann. ent. Soc',
'Palaeontogr',
'Bull. geol. Soc',
'Misc. Publs Ent. Soc',


);

$journal='zool.)';
$extras=array(
'Annales Mus. r. Afr. cent. (Ser. 8 Sci',
'Revue roum. Biol. (Ser',
'Studii Cerc. Biol. (Ser',
);

$journal='Wien';
$extras=array(
'Denkschr. Ak. Wiss',
'Armin naturh. Mus',
'Verh. x.-b',
'Annln naturh. Mus',
'Verh. x.-b',
'Verh. zoolog.-bot. Gesellsch',
'Verb. z-b',
'Verh. r.-b',
'Annln naturh. Mus',
'Jb. geol. Bundesanst'
);

$journal='jap.';
$extras=array(
'Annotnes zool'
);

$journal = 'Biol Sol';
$extras=array(
'Revue Ecol'
);

$journal = 'Zannato\" Montecchio Maggiore (VI)';
$extras=array(
'Studi e Ricerche Associazione Amici Museo Civico \"G',
);


$journal = 'Tsentral\'biol. Pochv. Inst';
$extras=array(
'Trudy Dal\'nevostochnogo Nauch'
);

$journal = 'bohemoslov.';
$extras=array(
'Acta ent'
);

$journal = 'Frankfurt A.M.';
$extras = array(
'Mitteilungen des Internationalen Entomologischen Vereins E.V'
);

$journal = 'Hist.';
$extras = array(
'Bull. Am. Mus. nat',
'Bull. Peabody Mus. nat',
'Transactions S. Diego Soc. nat',
'Bulletin Am. Mus. nat. Hist.',
'Occ. Pap. Delaware Mus. nat'
);


$journal = 'Leiden';
$extras = array(
'Zoologische Verh',
'Zool. Meded',
'Zoologische Meded',
'Zool. Verh'
);

$journal = '4';
$extras=array(
'Bulletin Ass mex Cave Stud, No'
);

$journal = 'Entomologische Zeitung';
$extras=array(
'Wiener',
'Stettiner'
);

$journal = 'National Mus Proc';
$extras=array(
'Washington Smithsonian Inst',
'Washington D.C. Smithson an Inst',
'Washington D.C. Smithsonian Inst'

);

$journal = 'Soc';
$extras=array(
'Zoological J. Linn',
'Proceedings Trans. Br. ent. nat. Hist',
'Journal N. Y. ent',
'Transactions Am. ent',
'Transactions Shikoku ent',
'Proceedings Hawaii. ent',
'Transactions Am. microsc',
'Special Publs Am. Fish',
'Transatious Am. microsc'

);

$journal = 'Protozool.';
$extras=array(
'J',
);

$journal = 'Zh.';
$extras=array(
'Zool',
'Paleont',
'Palaeont',
'Gidrobiol',
'Heol'
);

$journal = 'Chile';
$extras=array(
'An. Univ',
'Boln Mus. nac. Hist. nat',
'Publnes Cent. Estud. ent. Univ'
);


$journal='Geol Paleont';
$extras=array(
'Memoirs Nanking Inst',
'Tulane Stud'
);

$journal='Toulouse';
$extras=array(
'Bull. Soc. Hist. nat',
'Bulletin Soc. Hist. nat',
'Bull. Soc. Mist. nat'
);

$journal='Fenn.';
$extras=array(
'Act',
'Acta zool',
'Annls zool',
'Ann. Zool'
);

$journal='J Parasit';
$extras=array(
'Boln Soc. Biol',
'Boletin Soc. biol'
);

$journal = 'Concepcion';

$journal='Z.';
$extras=array('Palaont','Bulletin Mus. C');

$journal='Berl.';
$extras=array('Mitt. zool. Mus');

$journal='Res.';
$extras=array('Bull. ent',
'Contr. Cushman Fdn foramin',
'N.Z. J. mar. freshw',
'Pakist. J. Sci. Ind',
'Pakistan. J. scient. ind',
'CSIRO Wildl',
'Agra Univ. J',
'Israel J. agric'
);

$journal='Frankfurt A.M.';
$extras=array('Mitteilungen des Internationalen Entomologischen Vereins E.V');

$journal='Inst.';
$extras=array(
'Contr. Am. ent',
'Tr. N.Z',
'Mem. Am. ent',
'Bull. Maurit',
'Mem. N.Z. oceanogr',
'Izv. Tomsk polytekhn',
'Contributions Am. ent',
'Research Div. Bull. Va polytech'


);

$journal='London';
$extras=array(
'Tr. ent. Soc'
);

$journal='Berlin';
$extras=array(
'Sitz. k. Pr. Ak. Wiss'
);

$journal='Prince Monaco Fasc, xii(vi)';
$extras=array(
'Resultats des Campagnes...'
);

$journal='Wisconsin Acad.';
$extras=array(
'Tr'
);

$journal='Acad.';
$extras=array(
'Tr. Wisconsin'
);

$journal='Ital.';
$extras=array(
'Bull. Soc. Ent'
);

$journal='Exp.';
$extras=array(
'Rep. Zool. Chall'
);

$journal='Lille';
$extras=array(
'Tr. Inst. Zool'
);



$journal='France';
$extras=array(
'Bulletin de la Societe Zoologique de'
);


$journal='Zool.';
$extras=array(
'Chall. Rep'
);

$journal='Rep Zool';
$extras=array(
'Chall'
);

$journal='Genev.';
$extras=array(
'Mem Soc. Phys'
);


$journal='C. Z.';
$extras=array(
'Mem. Mus.'
);

$journal='Ges.';
$extras=array(
'Z. geol',
'SB. Jen'
);

$journal='Forb.';
$extras=array(
'OEfv. Ak'
);

$journal='Z.';
$extras=array(
'Mem. Mus. G'
);

$journal='Earth Sci.';
$extras=array(
'Can. J',
'Israel J'
);

$journal='Aust.';
$extras=array(
'Bull. Bur. Miner. Resour. Geol. Geophys',
'J. geol. Soc',
'Trans. R. Soc. S',
'J. malac. Soc',
'J. Proc. R. Soc. West',
'Bull. geol. Surv. West'

);

$journal = 'Frey Tutzing Bei Muenchen';
$extras=array(
'Entomologische Arbeiten aus dem Museum G'
);

$journal='Parasit.';
$extras=array(
'J',
'Revta iber',
'Proc. 2nd Int. Congr',
'Boln. chil',
'Angew',
'Ann. trop. Med'


);


$journal='Geol';
$extras=array(
/*'Recent Res',
'Mitteilungen bayer. St. Palaont. Inst',
'Tulane Stud',
'Stockholm Contr',
'Mededelinge Wkgrp Tert. Kwart',
'Z \' asopis Miner',
'C \' asopsis Miner',
'Casopsis Miner',
't asopis Miner',
'tasopis Miner',
'Uasopsis Miner',
'Beihefte Z',
'Journal Min',
'Gsopis Miner',
'Kwart',
'Scottish J',
'tasopis Miner',
'Mitteilungen bayer. St. Palaont. hist',*/
//'Mitteilungen bayer St. Palaont. hist',
//'Mitteilungen Ges',
'Mittetlungen bayer. St. Palaont hist',
'Mitteilungen bayer. St. Palaont. hilt'


);

$journal='Geol.';
$extras=array(
/*'Biul. Inst',
'Acad. Sci. Estonia, Inst',
'Alberta Soc. Petrol',
'Acad. Sci. Estonia, Inst',
'Mitt. bayer. St. Palaont. Hist',
'Chem',
'Mitt. bayer. St. Palaont. Hist. Mitt. bayer. St. Palaont. Hist',
'Mitt. bayer. St. Palaont. Hist',
'Bull. Can. Petrol',
'Acad. Sci. Estonia, Inst',
'Brigham Young Univ. Stud',
'Recent Res',
'Mitteilungen bayer. St. Palaont. Inst',
'Tulane Stud',
'Stockholm Contr',
'Mededelinge Wkgrp Tert. Kwart',
'Z \' asopis Miner',
'C \' asopsis Miner',
'Casopsis Miner',
't asopis Miner',
'tasopis Miner',
'Uasopsis Miner',
'Beihefte Z',
'Journal Min',
'Gsopis Miner',
'Kwart',
'Scottish J',
'tasopis Miner',

'Annls Mus r. Afr. cent 8[degrees] Sci'*/

'Cas. Miner',
'Vestn. ustred. est',
'Vest. ustred. Ust',
'Eesti NSV Tead. Akad. Toimetised Keem',
'Biol'

);

$journal='Georg Frey';
$extras=array(
'Ent. Arb. Mus'
);


$journal='Novit.';
$extras=array(
'Durban Mus',
'American Mus',
'Am. Mus'
);


$journal='Ber., Amst.';
$extras=array(
'Ent'
);

$journal='Insects 12';
$extras=array(
'Pacif'
);


$journal='Wien 73';
$extras=array(
'Annln naturh. Mus'
);


$journal='India';
$extras=array(
'Bull. Ent. Soc',
'Q. Jl geol. Min. metall. Soc',
'J. mar. biol. Ass',
'J. zool. Soc',
'J. Geol. Soc',
'Bull. Ent. ent. Soc'
);

$journal = 'Journal Geol Soc';
$extras=array(
'London Quart'
);

$journal = 'Journal of the Geological Society London';
$extras=array(
'Quart',
'Q'
);

$journal = 'J Sci Manila 1938';
$extras=array(
'Philipp',
'Phil'
);

$journal = '(B)';
$extras=array(
'Proc. R. ent. Soc. Lond',
'Proc. K. ned. Akad. Wet',
'Geologische Jb',
'Proc. Indian natn. Sci. Acad',
'Atti Soc. tosc. Sci. Nat., Mem',
'Proc. Indian Acad. Sci',
'Phil. Trans. R. Soc',
'Proceedings Indian Acad. Sci'
);

$journal = 'Can.';
$extras=array(
'Bull. geol. Surv',
'Memoirs ent. Soc'
);

$journal = 'Ent';
$extras=array(
'GravenhageTijdschr',
'Gravenhage Tijdschr',
'Canad',
'Pan-Pacif'
);

$journal = 'leth.';
$extras=array(
'Senckenberg'
);

$journal = 'Smith Institute of Ichthyology';
$extras=array(
'Ichthyological Bulletin of the J. L. B'
);

/*
$journal = 'Jeannel';
$extras=array(
'Voyage de Ch. Alluaud et R',
'Voyage de Ch. Alluaud et R. Jeannel. Alluaud et R',
'Voy'
'Voyage de Ch. Alluaud et R'
);
*/

$journal = 'Petersburg)';
$extras=array(
'Parazitologiya (St'
);

$journal = 'Zoologicheskii Zhurnal';
$extras=array(
'Amurskii'
);

$journal = 'Lab.';
$extras=array(
'Notes Lyman ent. Mus. Res',
'Publs Seto mar. biol',
'Trudy gel\'mint',
);


$journal = 'Ent Amsterdam';
$extras=array(
'Tijdschr',
'Tijd-schr',
);



$journal = 'Mex.';
$extras=array(
'Paleont',
'An. Esc. nac.  Cienc. biol',
'Folia ent',
'Nat',
);

$journal = 'Path.';
$extras=array(
'J. Invert',
);



foreach ($extras as $title_extra)
{

	//$sql = 'SELECT * from names WHERE journal = "' . $journal . '" AND title LIKE "%\" ' . $title_extra . '"';
	//$sql = 'SELECT * from names WHERE journal = "' . $journal . '" AND title LIKE "%.) ' . $title_extra . '"';
	$sql = 'SELECT * from names WHERE journal = "' . $journal . '" AND title LIKE "%. ' . $title_extra . '"';
	//$sql = 'SELECT * from names WHERE journal = "' . $journal . '" AND title LIKE "%] ' . $title_extra . '"';
	//$sql = 'SELECT * from names WHERE journal = "' . $journal . '" AND title LIKE "%, ' . $title_extra . '"';
	$sql = 'SELECT * from names WHERE journal = "' . $journal . '" AND title LIKE "% ' . $title_extra . '"';
	$sql = 'SELECT * from names WHERE journal = "' . $journal . '" AND title LIKE  "%. ' . $title_extra . '"';

	//$sql = 'SELECT * from names WHERE journal LIKE "%' . $journal . '%"';
	
	//echo $sql . "\n";
	
	$result = $db->Execute($sql);
	if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);
	
	while (!$result->EOF) 
	{
		$id = $result->fields['id'];
		$sici = $result->fields['sici'];
	
		$title = $result->fields['title'];
		$title = preg_replace('/' . addcslashes($title_extra, "()") . '$/Uu', '', $result->fields['title']);
		$title = trim($title);
		$title = rtrim($title, '.');
		$title = rtrim($title, ',');
		
		$volume = '';
		
		//echo $id . "|" . $title . "|" . $fixed_journal . "|\n";
		
		
		switch ($journal)
		{
			case '4':
				{
					$fixed_journal = 'Bulletin Ass mex Cave Stud';
					$volume = 4;
				}
				break;
			
			case 'Yearbook American Philosophical Society':
				$fixed_journal = $title_extra . '. Soc.';
				break;
				
			case '2':
				$fixed_journal = preg_replace ('/,?\s+No$/', '', $title_extra);
				break;
				
			case 'Insects 12':
				$fixed_journal = $title_extra . '. ' . 'Insects';
				break;
				
			case 'Wien 73':
				$fixed_journal = $title_extra . '. ' . 'Wien';
				break;
				
			case 'Zoologicheskii Zhurnal':
				$fixed_journal = $title_extra . ' ' . $journal;
				break;			
				
			default:
				$fixed_journal = $title_extra . '. ' . $journal;
	//			$fixed_journal = $title_extra . ' ' . $journal;
			break;
		}
		
		
		echo 'UPDATE names SET title=' . $db->qstr($title) . ', journal=' . $db->qstr($fixed_journal);
		
		if ($volume != '')
		{
			echo ', volume=' . $db->qstr($volume);
		}
		
		if ($journal == 'Insects 12')
		{
			echo ', volume=12';
		}
		
		
		if ($journal == 'Wien 73')
		{
			echo ', volume=73';
		}
		
		
//		echo ' WHERE id=' . $id . ';' . "\n";
		echo ' WHERE sici="' . $sici . '";' . "\n";
		
		$result->MoveNext();
	}

}


?>