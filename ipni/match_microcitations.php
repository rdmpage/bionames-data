<?php

// martch using "remote" microcitation resolver

error_reporting(E_ALL ^ E_DEPRECATED);

require_once (dirname(dirname(__FILE__)) . '/adodb5/adodb.inc.php');
require_once (dirname(dirname(__FILE__)) . '/lib.php');

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
// Convert Arabic numerals into Roman numerals.
function roman($arabic)
{
	$ones = Array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX");
	$tens = Array("", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC");
	$hundreds = Array("", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM");
	$thousands = Array("", "M", "MM", "MMM", "MMMM");

	if ($arabic > 4999)
	{
		// For large numbers (five thousand and above), a bar is placed above a base numeral to indicate multiplication by 1000.
		// Since it is not possible to illustrate this in plain ASCII, this function will refuse to convert numbers above 4999.
		die("Cannot represent numbers larger than 4999 in plain ASCII.");
	}
	elseif ($arabic == 0)
	{
		// About 725, Bede or one of his colleagues used the letter N, the initial of nullae,
		// in a table of epacts, all written in Roman numerals, to indicate zero.
		return "N";
	}
	else
	{
		// Handle fractions that will round up to 1.
		if (round(fmod($arabic, 1) * 12) == 12)
		{
			$arabic = round($arabic);
		}

		// With special cases out of the way, we can proceed.
		// NOTE: modulous operator (%) only supports integers, so fmod() had to be used instead to support floating point.
		$roman = $thousands[($arabic - fmod($arabic, 1000)) / 1000];
		$arabic = fmod($arabic, 1000);
		$roman .= $hundreds[($arabic - fmod($arabic, 100)) / 100];
		$arabic = fmod($arabic, 100);
		$roman .= $tens[($arabic - fmod($arabic, 10)) / 10];
		$arabic = fmod($arabic, 10);
		$roman .= $ones[($arabic - fmod($arabic, 1)) / 1];
		$arabic = fmod($arabic, 1);


		return $roman;
	}
}

//--------------------------------------------------------------------------------------------------
$db = NewADOConnection('mysqli');
$db->Connect("localhost", 
	'root', '', 'ipni');

// Ensure fields are (only) indexed by column name
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

$db->EXECUTE("set names 'utf8'"); 

// American Fern Journal
$sql = 'SELECT * FROM ipni.names WHERE issn="0002-8444" and doi is NULL';
//$sql = 'SELECT * FROM ipni.names WHERE issn="0002-8444" and Publication_year_full > 2011';

// Nuytsia
$sql = 'SELECT * FROM ipni.names WHERE issn="0085-4417"';

$sql = 'SELECT * FROM ipni.names WHERE issn="0373-2967"';

// Phytotaxa
$sql = 'SELECT * FROM ipni.names WHERE issn="1179-3155" AND doi IS NULL';

//
// Bull. Torrey Bot. Club
$sql = 'SELECT * FROM ipni.names WHERE issn="0040-9618"';



// taiwania
//$sql = 'SELECT * FROM ipni.names WHERE issn="0372-333X" AND url IS NULL';
//$sql = 'SELECT * FROM ipni.names WHERE issn="0372-333X" AND url IS NULL and Collation LIKE "%(1971)"';

// Bot Mag Tokyo
//$sql = 'SELECT * FROM ipni.names WHERE issn="0006-808X"';

// Bulletin de la Société Botanique de France
//$sql = 'SELECT * FROM ipni.names WHERE issn="0037-8941" AND doi is NULL limit 100';

// Madroño
//$sql = 'SELECT * FROM ipni.names WHERE issn="0024-9637" and doi is null and Publication_year_full > 2004';

// Blumea
//$sql = 'SELECT * FROM ipni.names WHERE issn="0006-5196" AND url is NULL limit 1000';

// Austrobaileya
$sql = 'SELECT * FROM ipni.names WHERE issn="0155-4131" AND jstor is NULL and Collation <> "";';

// Systematic Botany
$sql = 'SELECT * FROM ipni.names WHERE issn="0363-6445" and jstor is null and Collation <> "";';

$sql = 'SELECT * FROM ipni.names WHERE issn="1809-5348" and Collation <> "" and doi is null;';

$sql = 'SELECT * FROM ipni.names WHERE issn="0370-6583" and Publication_year_full  like "20%"  limit 10;';

// Syst. & Geogr. Pl.
$sql = 'SELECT * FROM ipni.names WHERE issn="1374-7886" AND jstor is null';


$sql = 'SELECT * FROM ipni.names WHERE issn="0313-4083" AND Collation <> "" AND jstor is null LIMIT 500';

$sql = 'SELECT * FROM ipni.names WHERE issn="0006-8241" AND Collation <> "" AND doi is null LIMIT 10';
$sql = 'SELECT * FROM ipni.names WHERE issn="0006-8241" AND Collation LIKE "15%" and doi is null';



$sql = 'SELECT * FROM ipni.names WHERE issn="0040-0262" and doi is null and Publication_year_full LIKE"2013%"';

// taxon (still lots to do)

$sql = 'SELECT * FROM ipni.names WHERE issn="0040-0262" AND Collation like "56%" and doi is null  ';

// Willdenowia (still JSTOR to do)
$sql = 'SELECT * FROM ipni.names WHERE issn="0511-9618" AND Collation <> "" and Publication_year_full > 1996';


$sql = 'SELECT * FROM ipni.names WHERE issn="0305-7364" AND Collation <> "" AND doi IS NULL;';

$sql = 'SELECT * FROM ipni.names WHERE issn="0083-7792" AND Collation <> "" AND doi IS NULL;';

$sql = 'SELECT * FROM ipni.names WHERE issn="0097-1618" AND Collation <> "";';

$sql = 'SELECT * FROM ipni.names WHERE issn="0084-5906" AND Collation <> "" and jstor is null;';
$sql = 'SELECT * FROM ipni.names WHERE issn="0084-5906" AND Collation like "i.%" and jstor is null;';

$sql = 'SELECT * FROM ipni.names WHERE issn="0312-9764" AND Collation <> "" AND doi IS NULL;';


$sql = 'SELECT * FROM ipni.names WHERE issn="0361-185X" AND Collation <> "" and jstor is null; ';

$sql = 'SELECT * FROM ipni.names WHERE issn="0374-6607" AND Collation <> "" AND doi IS NULL ';

$sql = 'SELECT * FROM ipni.names WHERE issn="0451-9930" AND Collation <> "" and jstor is NULL';


$sql = 'SELECT * FROM ipni.names WHERE issn="2202-0802" AND Collation <> ""';


$sql = 'SELECT * FROM ipni.names WHERE issn="0040-0262" AND Collation <> "" and doi is null';

$sql = 'SELECT * FROM ipni.names WHERE issn="0303-9153" AND Collation <> "" and doi is null';

 
$sql = 'SELECT * FROM ipni.names WHERE issn="0037-8941" AND Collation like "51%" and doi is null';

// J bot texas
$sql = 'SELECT * FROM ipni.names WHERE issn="1934-5259" AND Collation <> ""';

// SIDA

$sql = 'SELECT * FROM ipni.names WHERE issn="0036-1488" AND Collation <> ""';

// Gayana. Botánica
// 
$sql = 'SELECT * FROM ipni.names WHERE issn="0016-5301" AND Collation <> "" and Publication_year_full > 1999';

// Darwiniana
$sql = 'SELECT * FROM names WHERE Id="60455881-2"';
$sql = 'SELECT * FROM ipni.names WHERE issn="0011-6793" AND Collation <> "" and Publication_year_full > 2003 and url is null';

// Adansonia

$sql = 'SELECT * FROM ipni.names WHERE issn="1280-8571" AND Collation <> "" and Publication_year_full > 2008';

$sql = 'SELECT * FROM ipni.names WHERE issn="0029-8948" AND Collation <> ""';


$sql = 'SELECT * FROM names WHERE Id="512804-1"';


$sql = 'SELECT * FROM ipni.names WHERE issn="0037-9557" AND Collation <> "" and jstor is NULL';

$sql = 'SELECT * FROM ipni.names WHERE Publication="Bull. Soc. Bot. France" AND Collation <> "" and doi is NULL';


// new additions
$sql = 'SELECT * FROM ipni.names WHERE Publication="Phytokeys" AND Collation <> "" and doi is NULL';

// Phytotaxa
$sql = 'SELECT * FROM ipni.names WHERE Publication="Phytotaxa" AND Collation <> "" and doi is NULL and Publication_year_full > 2012';

///$sql = 'SELECT * FROM ipni.names WHERE Publication="Turczaninowia" AND Collation <> "" and doi is NULL';

//$sql = 'SELECT * FROM ipni.names WHERE Publication="Acta Bot. Gallica" AND Collation <> "" and doi is NULL';
//$sql = 'SELECT * FROM ipni.names WHERE Publication="Acta Bot. Gallica Bot. Lett." AND Collation <> "" and doi is NULL';
//$sql = 'SELECT * FROM ipni.names WHERE Publication="Taiwania" AND Collation <> "" and doi is NULL';

//$sql = 'SELECT * FROM names WHERE Id="77133086-1"';

$sql = 'SELECT * FROM ipni.names WHERE Publication="Novon" AND Collation <> "" and doi is NULL';

$sql = "SELECT * FROM ipni.names WHERE Publication IN('Acta Bot. Gallica Bot. Lett.',
'Acta Bot. Hung.',
'Acta Soc. Bot. Poloniae',
'Amer. Fern J.',
'Ann. Bot. (Oxford)',
'Ann. Bot. Fenn.',
'Austral. Syst. Bot.',
'Blumea',
'Bot. J. Linn. Soc.',
'Bot. Sci.',
'Brittonia',
'Bull. Bot. Res., Harbin',
'Candollea',
'Curtis\'s Bot. Mag.',
'Edinburgh J. Bot.',
'Eur. J. Taxon.',
'Feddes Repert.',
'Guihaia',
'Harvard Pap. Bot.',
'J. Biogeogr.',
'J. Torrey Bot. Soc.',
'J. Trop. Subtrop. Bot.',
'Kew Bull.',
'Korean J. Pl. Taxon.',
'Madroño',
'Molec. Phylogen. Evol.',
'New J. Bot.',
'Nordic J. Bot.',
'Novon',
'Pacific Sci.',
'PhytoKeys',
'Phytotaxa',
'Pl. Biosystems',
'Pl. Diversity Resources',
'Pl. Ecol. Evol.',
'Pl. Syst. Evol.',
'PLoS ONE',
'Rhodora',
'S. African J. Bot.',
'Syst. Biodivers.',
'Syst. Bot.',
'Taiwania',
'Taxon',
'Turczaninowia',
'Turkish J. Bot.',
'Webbia',
'Willdenowia') AND Collation <> '' and doi is NULL and Publication_year_full > 2012";

//$sql = 'SELECT * FROM names WHERE issn="0075-5974" AND Collation <> "" and doi is NULL and Publication_year_full > 2013';

$sql = 'SELECT * FROM names WHERE issn="0254-6299" and Collation <> "" and doi is null';

$sql = 'SELECT * FROM names WHERE Id="77105068-1"';

 
$sql = 'SELECT * FROM names WHERE Publication="S. African J. Bot." and  doi is null and Publication_year_full=1995';


$sql = 'SELECT * FROM names WHERE issn="0211-1322" and Collation <> "" and doi is null';
$sql = 'SELECT * FROM names WHERE issn="0211-1322" and Collation like "62%" and doi is null';



$sql = 'SELECT * FROM names WHERE issn="0008-8692" and Collation <> "" and doi is null';
$sql = 'SELECT * FROM names WHERE issn="0006-8101" and Collation <> "" and doi is null';

$sql = 'SELECT * FROM names WHERE issn="0014-8962" and Collation <> "" and doi is null';

$sql = 'SELECT * FROM names WHERE issn="0006-8098" and Collation <> "" and jstor is null';


$sql = 'SELECT * FROM names WHERE issn="1409-3871" and Collation like "12%" and doi is null';


$sql = 'SELECT * FROM names WHERE issn="1641-8190" and Collation <> "" and Publication_year_full > 2012';

$sql = 'SELECT * FROM names WHERE issn="1808-2688" and Collation <>"" and doi is null';


$sql = 'SELECT * FROM names WHERE issn="0003-3847" and Collation <>"" and (doi is null and jstor is null)';

$sql = 'SELECT * FROM names WHERE issn="1808-2688" and Collation <>"" and doi is null';


$sql = 'SELECT * FROM names WHERE issn="0370-6583" and Collation <>"" and (doi is null and jstor is null)';


$sql = 'SELECT * FROM names WHERE issn="0302-2439" and Collation <>"" and doi is null';

$sql = 'SELECT * FROM names WHERE issn="0363-6445" and Collation <>"" and doi is null';

$sql = 'SELECT * FROM names WHERE issn="0312-9764" and Collation <>"" and doi is null';


$sql = 'SELECT * FROM names WHERE issn="1179-3155" and Collation <>"" and doi is null';

$sql = 'SELECT * FROM names WHERE issn="0258-1485" and Collation <>"" and doi is null and Publication_year_full = 1926';



$sql = 'SELECT * FROM names WHERE issn="1673-5102" and Collation <>"" and doi is null and Publication_year_full >= 2006';

$sql = 'SELECT * FROM names WHERE issn="0253-2700" and Collation <>"" and doi is null and Publication_year_full > 1998';

$sql = 'SELECT * FROM names WHERE issn="0102-3306" and Collation <>"" and doi is null ';
//$sql = 'SELECT * FROM names WHERE issn="0015-5551" and Collation <>"" ';

$sql = 'SELECT * FROM names WHERE issn="0511-9618" and Collation <>"" and doi is null and  Publication_year_full > 1995';


$sql = 'SELECT * FROM names WHERE issn="0044-5967" and Collation like "31(%"';


//$sql = 'SELECT * FROM names WHERE Publication="Fl. Neotrop. Monogr." and Collation <>"" ';

$sql = 'SELECT * FROM names WHERE issn="0007-196X" and Collation  <>"" and doi is null';



$sql = 'SELECT * FROM names WHERE Publication="Harvard Pap. Bot." and Collation <>"" and doi is NULL and Publication_year_full like "2011%"';


$sql = 'SELECT * FROM names WHERE issn="0258-1485" and Collation  <>"" and doi is null';

// Kew
$sql = 'SELECT * FROM names WHERE issn="0075-5974" and Collation  <>"" and (doi is null or jstor is null)';



$sql = 'SELECT * FROM names WHERE issn="0044-5983" and Collation  <>"" and doi is null';

$sql = 'select * from names where issn="0370-6583" and Collation like "no%"';

// Ber. Deutsch. Bot. Ges.
$sql = 'select * from names where issn="0011-9970" and Collation  <>"" and doi is null';

// J. Wuhan Bot. Res.
$sql = 'select * from names where issn="1000-470X" and Collation  like "24%" and url is null';

// Meded. Bot. Mus. Herb. Rijks Univ. Utrecht 
$sql = 'select * from names where issn="2352-5754" and Collation  <> "" and url is null';

$sql = 'SELECT * FROM names WHERE issn="1000-6567" and Collation  like "8%" and url is null';// and Publication_year_full = 1995';


$sql = 'select * from names where issn="0258-1485" and Collation  <> "" and doi is null';

$sql = 'select * from names where issn="0258-1485" and Collation  like "6: %" and doi is null';


$sql = 'select * from names where issn="1055-3177" and Collation  <> "" and ((jstor is null) or (doi is null))';


$sql = 'select * from names where issn="2327-2929" and Collation  <> "" and  (doi is null) and Publication_year_full=2010';

$sql = 'select * from names where issn="1005-3395" and Collation  <> "" and  pdf is null';

$sql = 'select * from names where issn="0006-8063" and Collation  <> "" and  pdf is null';

//$sql = 'select * from names where issn="1000-3142" and Collation like <> "" and pdf is null';

// Phytotaxa
//$sql = 'select * from names where issn="1179-3155" and Collation  <> "" and  doi is null';



$sql = 'select * from names where issn="0255-0105" and Collation <>"" and jstor is null';
$sql = 'select * from names where issn="0083-6133" and Collation <>"" and jstor is null';

$sql = 'select * from names where issn="0187-7151" and Collation <>"" and url is null';

$sql = 'select * from names where issn="1897-2810" and Collation <>"" and doi is null';

$sql = 'select * from names where issn="0085-4417" and Collation <>"" and url is null';

$sql = 'select * from names where issn="1000-470X" and Collation <>"" and url is null';

$sql = 'select * from names where issn="0289-3568" and Collation <>"" and url is null';
$sql = 'select * from names where issn="0289-3568" and Collation <>"" ';//and url is null';

$sql = 'select * from names where issn="1346-7565" and Collation <>"" and url is null';

// 
$sql = 'select * from names where issn="0075-5974" and doi is null';

$sql = 'select * from names where issn="1346-6852" and Collation <>"" and url is null';

$sql = 'select * from names where issn="0181-1797" and Collation <>"" and doi is null';

$sql = 'select * from names where Publication ="in Ann. Naturhist. Mus. Wien" and Collation <>"" and jstor is null';


$sql = 'select * from names where issn="0037-9557" and Collation <>"" and jstor is null';

$sql = 'select * from names where issn="0041-1752" and Collation <>"" and handle is null';


$sql = 'select * from names where issn="0011-6793" and Collation <>"" and jstor is null';


$sql = 'select * from names where issn="1641-8190" and Collation <>"" and url is null';


$sql = 'select * from names where issn="0035-4902" and Collation <>"" and jstor is null';

$sql = 'select * from `2015` where issn="0511-9618" and Collation <>"" and doi is null';

$sql = 'select * from `2016` where Collation <>"" and issn is not null and doi is null';
//$sql = 'select * from `2015` where Collation <>"" and issn is not null and doi is null';

// Korean J. Pl. Taxon.
$sql = 'select * from `2015` where issn="1225-8318" and Collation <>"" and doi is null';

// 1055-3177
$sql = 'select * from `2015` where issn="1055-3177" and Collation <>"" and doi is null and Publication_year_full=2015';

//0960-4286
$sql = 'select * from `names` where issn="0960-4286" and Collation <>"" and doi is null and Publication_year_full=2014';

//$sql = 'select * from names where issn in ("1280-8571","1253-8078","1030-1887","0006-5196","0007-196X") and Collation <>"" and doi is null';


$sql = 'select * from `names` where issn="0511-9618" and Collation <>"" and jstor is null and doi is null';

// 0370-6583
$sql = 'select * from `names` where issn="0370-6583" and Collation <>"" and jstor is null';

$sql = 'select * from `names` where issn="0370-3681" and Collation <>""';
$sql = 'select * from `names` where issn="0370-5412" and Collation <>""';
$sql = 'select * from `names` where issn="0373-4293" and Collation <>"" and url is null';
$sql = 'select * from `names` where issn="2304-7534" and Collation <>""';


$sql = 'select * from `names` where issn="0374-5481" and Collation LIKE "ser. 3%" AND doi IS NULL';
$sql = 'select * from `names` where issn="0374-5481" and Collation LIKE "Ser. III%" AND doi IS NULL';
$sql = 'select * from `names` where issn="0374-5481" and Collation LIKE "ser. 2%" AND doi IS NULL';


$sql = 'select * from `names` where issn="0024-9637" and Collation <>"" and jstor is null';


$sql = 'select * from `names` where issn="0024-9637" and Collation <>"" and jstor is null';

$sql = 'select * from names where Publication="Taxon" AND doi is NULL and Publication_year_full > 2012 AND Collation LIKE "6%"';


// Can J Bot
$sql = 'select * from `names` where issn="0008-4026" and Collation <>"" and doi is null';

// J Arnold Arboretum

$sql = 'select * from `names` where issn="0004-2625" and Collation <>"" and jstor is null LIMIT 1000';

//$sql = 'select * from `names` where issn="0084-5906" and Collation <>"" and jstor is null LIMIT 2000';

$sql = 'select * from `names` where issn="0378-2697" and Collation <>"" and doi is null';

// Caldasia

$sql = 'select * from `names` where issn="0366-5232" and Collation <>"" and jstor is null';

//$sql = 'SELECT * FROM `2016` WHERE doi IS NULL';

$sql = 'select * from `names` where issn="0097-3157" and Collation <>"" and jstor is null';

$sql = 'select * from `names` where issn="0006-324X" and Publication_year_full LIKE "20%" and doi is null';


$sql = 'select * from `names` where issn="1870-3453" and Collation <>"" and url is null';

$sql = 'select * from `names` where issn="0960-4286" and Collation <>"" and doi is null';



$sql = 'select * from `names` where issn="0735-8032" and Collation <>"" and jstor is null';

$sql = 'select * from `names` where issn="0370-6583" and Collation LIKE "18-19:%" and jstor is null';

$sql = 'select * from `names` where issn="0037-8941" and Collation <> "" and doi is null';

$sql = 'select * from names where issn="0370-6583" and Collation like "61(2)%"';

//$sql = 'select * from names where doi="10.1017/S0960428603000398"';


$sql = 'select * from `names` where issn="0211-1322" and Collation like "58%" and doi is null';

$sql = 'select * from names where Publication="Revista Peru. Biol." and doi is null';

$sql = 'select * from `names` where issn="0374-7859" and Publication_year_full like "201%"';


$sql = 'select * from `names` where issn="0100-8404" and Collation <> "" and doi is null';
$sql = 'select * from `names` where issn="0366-1326" and Collation <> "" and doi is null';

$sql = 'select * from `names` where issn="0097-3807" and Collation like "21%" and jstor is null ';

$sql = 'select * from names where issn="0374-7859" and doi is NULL and Publication_year_full > 2014';

$sql = 'select * from `names` where issn="0187-7151" and Collation <> "" and doi is null';

$sql = 'select * from `names` where doi="10.1002/fedr.19310081101"';

$sql = 'SELECT * FROM names WHERE Id="77134797-1"';

$sql = 'select * from `names` where issn="0495-3843" and Collation <> "" and url is null';

//Iheringia, Bot.
$sql = 'select * from `names` where issn="0073-4705" and Collation <> "" and url is null';


// Lankesteriana 
$sql = 'select * from `names` where issn="1409-3871" and Collation LIKE "4%" and doi is null';


// Muelleria 
$sql = 'select * from `names` where issn="0077-1813" and Collation is not null';



//$sql = 'select * from `2014` where issn="0026-6493" and Collation <>""';

$sql = 'select * from names where issn="0006-8241" and doi is NULL';

$sql = 'select * from names where issn="0737-8211" and doi is NULL';

$sql = 'select * from names where issn="1000-4025" and doi is NULL';
$sql = 'select * from names where issn="0210-9506" and url is NULL';
$sql = 'select * from names where issn="1988-4257" and url is NULL';

$sql = 'select * from names where issn="0370-6583" and jstor is NULL';

$sql = 'select * from names where issn="0004-2625" and jstor is NULL';



$sql = 'select * from names where issn="0038-4909" and jstor is NULL';

$sql = 'select * from names where issn="2327-2929" and Collation like "16%" and doi is NULL';

//$sql = 'select * from names where Id="689058-1"';


$sql = 'select * from names where issn="0155-4131" and jstor is NULL';

$sql = 'select * from names where issn="0265-086X" and doi is NULL';

$sql = 'select * from names where issn="0976-5069" and doi is NULL';

$sql = 'select * from names where issn="0044-5983" and doi is NULL';


$sql = 'select * from names where Id="207975-1"';


//$sql = 'select * from names where issn="0312-9764" and doi is NULL and Publication_year_full = 2012';

$sql = 'select * from names where issn="0026-279X" and pdf is NULL';

$sql = 'select * from names where issn="0044-5967" and doi is NULL and Collation like "10%"';

$sql = 'select * from names where issn="0372-4611"  and Collation like "13%"'; // and pdf is null

$sql = 'select * from names where issn="0366-3094"  and doi is null';

$sql = 'select * from names where issn="0008-7475"  and doi is null';

$sql = 'select * from names where issn="1097-993X"';
$sql = 'select * from names where issn="0199-9818" and jstor is null';

$sql = 'select * from names where issn="0096-6134" and doi is null';

$sql = 'select * from names where issn="0006-808X" and doi is null and Collation LIKE "32%"';

//$sql = 'select * from names where Id="466139-1"';

$sql = 'select * from names where Genus = "Machilus" and issn="0006-808X"';

$sql = 'select * from names where issn="0001-804X" and wikidata is null';

$sql = 'select * from names where issn="0042-5672"';

//$sql = 'select * from names where Id="780121-1"';

$sql = 'select * from names where issn="0374-5481" and doi is null and Collation LIKE "ser. 3,%"';


$sql = 'select * from names where issn="0037-8941" and doi is null and Collation LIKE "11%"';

$sql = 'select * from names where issn="1659-3049"';

$sql = 'select * from names where issn="1179-3155" and doi is null';
$sql = 'select * from names where Publication="J. As. Soc. Straits" and jstor is null';
$sql = 'select * from names where Publication="Contr. U.S. Natl. Herb." and jstor is null';

$sql = 'select * from names where issn="0370-5412" and doi is null';


$sql = 'select * from names where Publication="Rev. Bot. Appl. Agric. Trop." and doi is null';



$sql = 'select * from names where issn="0366-2128" and doi is null';

$sql = 'select * from names where issn="0252-192X"'; 

$sql = 'select * from names where issn="0079-2047"';

$sql = 'select * from names where issn="0022-2062" and Collation like "9%" and url is null';


$sql = 'select * from names where issn="0003-049X" and  jstor is null';

$sql = 'select * from names where issn="0366-5232" and Collation like "11%" and jstor is null';

$sql = 'select * from names where issn="0370-6583" and Collation like "no. %" and jstor is null;';

$sql = 'select * from names where issn="0068-547X" and pdf is null and Publication_year_full like "2%"';

$sql = 'select * from names where issn="0366-5232" and Collation like "7%" and jstor is null';

$sql = 'select * from names where issn="0006-8098" and jstor is null';

$sql = 'select * from names where issn="0211-1322" and Collation <> "" and doi is null;';


$sql = 'select * from names where issn="1673-5102"  and url is null;';


$sql = 'select * from names where issn="0040-0262" and Collation <> "" and doi is null;';
$sql = 'select * from names where issn="0040-0262" and Collation <> "" and jstor is null;';

$sql = 'select * from names where issn="0003-3847" and Collation <> "" and jstor is null;';



$sql = 'select * from names where Id="77151454-1"';

$sql = 'select * from names where issn="0312-9764" and Collation LIKE "12%" and doi is null;';

$sql = 'select * from names where issn="0524-0476" and doi is NULL';

$sql = 'select * from names where issn="0253-1453" and doi is NULL';

// J. Bamboo Res
$sql = 'select * from names where issn="1000-6567" and doi is NULL AND url is NULL';

$sql = 'select * from names where issn="0365-7779" and doi is NULL AND url is NULL';

$sql = 'select * from names where issn="0021-7662" and doi is NULL AND url is NULL';








$include_issue_in_search = false;
//$include_issue_in_search = true;

$include_authors_in_search = true;
$include_authors_in_search = false;

$include_year_in_search = false;
//$include_year_in_search = true;

$include_series_in_search = false;
//$include_series_in_search = true;


$result = $db->Execute($sql);
if ($result == false) die("failed [" . __FILE__ . ":" . __LINE__ . "]: " . $sql);

while (!$result->EOF) 
{	
	$reference = new stdclass;
	
	$reference->id = $result->fields['Id'];
	
	// authors
	$reference->authors = $result->fields['Publishing_author'];
	$reference->authors = preg_replace('/([A-Z]\.)/', '', $reference->authors);
	$reference->authors = preg_replace('/\.$/', '', $reference->authors);
	$reference->authors = preg_replace('/(.*) ex /', '', $reference->authors);
	
	if (preg_match('/ & /', $reference->authors))
	{
		$parts = preg_split('/ & /', $reference->authors);
		$reference->authors = $parts[0];
	}
	
	$reference->journal = new stdclass;
	$reference->journal->name = $result->fields['Publication'];
	
	// Clean
	if ($reference->journal->name == 'Kew Bull.')
	{
		$reference->journal->name = 'Kew Bulletin';
	}
	if ($reference->journal->name == 'Syst. Bot.')
	{
		$reference->journal->name = 'Systematic Botany';
	}
	if ($reference->journal->name == 'Bull. Misc. Inform. Kew')
	{
		$reference->journal->name = 'Bulletin of Miscellaneous Information (Royal Gardens, Kew)';
	}	
			
	$identifier = new stdclass;
	$identifier->type = 'issn';
	$identifier->id = $result->fields['issn'];
	
	// hack, put other ISSN here (e.g., if we are using eISSN not print ISSN)
	//$identifier->id = '1853-8460';
	
	$reference->journal->identifier[] = $identifier;
	
	
	$reference->year = $result->fields['Publication_year_full'];
	
	echo "-- " .  $result->fields['Id'] . " " . $result->fields['Publication'] . " " . $result->fields['Collation'] . " " . $result->fields['Publication_year_full'] . "\n";

	
	$matched = false;
	
	//$collation = utf8_decode($result->fields['Collation']);
	$collation = $result->fields['Collation'];

	
	
	if ($reference->journal->name == 'Rodriguésia')
	{
		if (preg_match('/^no\.\s+(?<issue>\d+):\s+(?<pages>\d+)/i', $collation, $m))
		{
			$matched = true;
			
			//print_r($m);
			$reference->journal->issue = $m['issue'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	if ($reference->journal->name == 'Bulletin of Miscellaneous Information (Royal Gardens, Kew)')
	{
		if (preg_match('/^(?<pages>\d+)?\s+\((?<year>[0-9]{4})\)$/i', $collation, $m))
		{
			$matched = true;
			
			//print_r($m);
			$reference->journal->volume = $m['year'];
			$reference->year = $m['year'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	if ($reference->journal->name == 'Kew Bulletin')
	{
		// 1953. 550 (1954)
		if (preg_match('/^(?<year>[0-9]{4})\.\s+(?<pages>\d+)?\s+\([0-9]{4}\)$/i', $collation, $m))
		{
			$matched = true;
			
			//print_r($m);
			$reference->year = $m['year'];
			$reference->journal->pages = $m['pages'];
		}
	}	
	
	// No. 29. 43 (1965)
	if (!$matched)
	{
		if (preg_match('/No\.\s+(?<volume>\d+)[\.|,]\s*(?<pages>\d+)\.?\s*\((?<year>[0-9]{4})\)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			$reference->year = $m['year'];
			
			$reference->authors = $result->fields['Publishing_author'];
		
			//print_r($reference);
			
			//exit();
		}
	}	
	
	
	// cxiv. (Mitt. Bot. Mus. Univ. Zurich, ccxlii.) 60
	if (!$matched)
	{
		if (preg_match('/(?<volume>[cixlv]+)\.\s+\(.*\)\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			
			$reference->authors = $result->fields['Publishing_author'];
		
			//print_r($reference);
			
			//exit();
		}
	}	
	
	
	// v. (1894) 50; Vasey, III. N. Am. Grass. i. I. (1890)t. 50
	if (!$matched)
	{
		if (preg_match('/(?<volume>[ixlv]+)\.\s+\((?<year>[0-9]{4})\)\s+(?<pages>\d+)[.|;]/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			$reference->year = $m['year'];
			
			$reference->authors = $result->fields['Publishing_author'];
		
			//print_r($reference);
			
			//exit();
		}
	}
	
	
	// xxi. No. 1, 48 (1958)
	// xxi. No. I, 53 (1958).
	if (!$matched)
	{
		if (preg_match('/(?<volume>[ixlv]+)\.\s+No\.\s*(?<issue>[\d+|I]),\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->issue = $m['issue'];
			if ($reference->journal->issue == 'I')
			{
				$reference->journal->issue = 1;
			}
			$reference->journal->pages = $m['pages'];
			
			$reference->authors = $result->fields['Publishing_author'];
		
			//print_r($reference);
			
			//exit();
		}
	}
	
	
	
	
	// 10, no. 20: 43
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+),\s+no.\s+(?<issue>\d+):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'];
			$reference->journal->pages = $m['pages'];
			
			$reference->authors = $result->fields['Publishing_author'];
		
			//print_r($reference);
			
			//exit();
		}
	}
	
	// 23-24: 243
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+-\d+):\s+[\[]?(?<pages>\d+)[\]]?/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->volume = str_replace('-', '/', $reference->journal->volume);
			
			$reference->journal->pages = $m['pages'];
			
			$reference->authors = $result->fields['Publishing_author'];
		
			//print_r($reference);
			
			//exit();
		}
	}
	
	
	
	// ser. 3, 19(111): 197 1867 [Mar 1867]
	if (!$matched)
	{
		if (preg_match('/^ser\.\s+(?<series>\d+),\s+(?<volume>\d+)(\((?<issue>\d+)\))?:\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->series = $m['series'];
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			$reference->authors = $result->fields['Publishing_author'];
		
			//print_r($reference);
			
			//exit();
		}
	}
	
	// Ser. 12, x. 44 (1957)
	if (!$matched)
	{
		if (preg_match('/^Ser\.\s+(?<series>\d+),\s+(?<volume>[ixlv]+)\.\s+(?<pages>\d+)\s+\([0-9]{4}\)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->series = $m['series'];
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			
			$reference->authors = $result->fields['Publishing_author'];
		
			//print_r($reference);
			
			//exit();
		}
	}
	
	
	// Ser. III, iv. (1859) 361
	if (!$matched)
	{
		if (preg_match('/^Ser\.\s+(?<series>[IVX]+),\s+(?<volume>[ixlv]+)\.\s+\([0-9]{4}\)\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->series = arabic($m['series']);
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			
			$reference->authors = $result->fields['Publishing_author'];
		
			//print_r($reference);
			
			//exit();
		}
	}
	
	// 1940, xxi 390
	// 1940. xxi. 323.
	if (!$matched)
	{
		if (preg_match('/^(?<year>[0-9]{4})[\.|,]\s+(?<volume>[ixlv]+)[\.]?\s+(?<pages>\d+)[\.]?/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// xxxii, 335
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ixlv]+),\s+(?<pages>\d+)$/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// xxov. 234 (1943)
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ixlv]+)\.\s+(?<pages>\d+)\s+/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// iii. 448, 450 (1939)
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ixlv]+)\.\s+(?<pages>\d+),/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// v. 540 (1941)
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ixlv]+)\.\s+(?<pages>\d+)\s*\(/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+):\s*(?<pages>\d+)$/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// 12: [514], fig. 1-3
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+):\s*\[(?<pages>\d+)\]/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// 30, pt. 1: 279
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+),\s+pt.\s+(?<issue>\d+):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// xxxvii. 108
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ixlv]+)\.\s+(?<pages>\d+)\.$/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// 1938, vii. 29
	if (!$matched)
	{
		if (preg_match('/^(?<year>[0-9]{4}),\s+(?<volume>[ixlv]+)\.\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// 47;65
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+);(?<pages>\d+)$/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// 61 (1958)
	if (!$matched)
	{
		if (preg_match('/^(?<year>[0-9]{4}),\s+(?<pages>\d+)\s+\([0-9]{4}\)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->year = $m['year'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// 61 (1958)
	if (!$matched)
	{
		if (preg_match('/^([0-9]{4},\s+)?(?<pages>\d+)\s+\((?<year>[0-9]{4})\)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->year = $m['year'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+)B:\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// No. 51 (Monogr. Burmanniac.) 126(1938)
	// No. 95 (Rec. Trav. Bot. Neerl. xli. Jul. 1948) 439 (Juu. 1948)
	if (!$matched)
	{
		if (preg_match('/^No.\s+(?<volume>\d+) \((.*)\)\s+(?<pages>\d+)\s*\(/i', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// No. 52, p. 50 (1939)
	if (!$matched)
	{
		if (preg_match('/^No.\s+(?<volume>\d+),\s+p.\s+(?<pages>\d+)[\s+|\.]/i', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// no. 107: 131
	if (!$matched)
	{
		if (preg_match('/^No.\s+(?<volume>\d+)[,|:]\s+(?<pages>\d+)$/i', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// No. 107, 57, 129 (1951)
	if (!$matched)
	{
		if (preg_match('/^No.\s+(?<volume>\d+)[,|:]\s+(?<pages>\d+)(, | &)/i', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// 14 (1/2) suppl.:
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\s*\((?<issue>\d+\/\d+)\)\s+suppl.:\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = 'supl.' . str_replace('/','-', $m['issue']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// 14 (1/2; suppl.): 195
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\((?<issue>\d+\/\d+),\s+suppl.\):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = 'supl.' . str_replace('/','-', $m['issue']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// 14(1–2, Suppl.): 209
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\((?<issue>\d+–\d+),\s+Suppl.\):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
		
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = 'supl.' . str_replace('–','-', $m['issue']);
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// 1(Suppl.)
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\((?<issue>\d+)\)Supl.:\s+(?<pages>\d+)\s+/', $result->fields['Collation'], $m))
		{
			$matched = true;
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'] . ' supl.1';
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	// 1(2)Supl.: 196 (1988)
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\((?<issue>\d+)\)Supl.:\s+(?<pages>\d+)\s+/', $result->fields['Collation'], $m))
		{
			$matched = true;
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'] . ' supl.1';
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// 98B(Suppl.) 169 (1996)
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)B\(Suppl.\):?\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// 6:14 (-15;
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+):(?<pages>\d+)\s+\([-]?\d+/', $result->fields['Collation'], $m))
		{
			$matched = true;
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// Kew Bulletin post 2013
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\((?<issue>.*)\)-(?<article>\d+):\s+(?<pages>\d+)/', $result->fields['Collation'], $m))
		{
			$matched = true;
		
			//print_r($m);
		
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'];
			$reference->journal->article_number = $m['article'];
			$reference->journal->pages = $m['pages'];
		
			//print_r($reference);
		}
	}
	
	
	// 66(1) : 45
	if (!$matched)
	{
		echo "-- $collation --\n";
		if (preg_match('/(?<volume>\d+)\((?<issue>\d+)\)\s+:\s+(?<pages>\d+)/u', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	

	// xxv. (1889) 36.
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ivxlc]+)\.?\s+\((?<year>[0-9]{4})\)\s+(?<pages>\d+)\.?$/i', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
		}
	}

	// lvi. 353 (1948)
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ivxlc]+)\.?\s+(?<pages>\d+),?\s+\((?<year>[0-9]{4})\)\.?$/i', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			echo "-- " . $m['volume'] . "\n";
			
			$v = $m['volume'];
			if ($v == 'Ivi')
			{
				$v = 'lvi';
			}
			if ($v == 'Ivii')
			{
				$v = 'lvii';
			}
			
			$reference->journal->volume = arabic($v);
			
			
			$reference->journal->pages = $m['pages'];
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/^(?<volume>[ivxlc]+)\.?\s+(?<pages>\d+)$/i', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			//echo "-- " . $m['volume'] . "\n";
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
		}
	}

	
	if (!$matched)
	{
		if (preg_match('/^no.\s+(?<issue>.*):\s+(?<pages>\d+)\b/Uu', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			$reference->journal->issue = $m['issue'];
			
			
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)\s*(\((?<issue>.*)\))?:\s+(?<pages>\d+)\b/Uu', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'];
			
			$reference->journal->issue = str_replace('–','-', $m['issue']);
			
			
			
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
			//exit();
		}
	}
	
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>\d+)(\((?<issue>.*)\))\s+(?<pages>\d+)\b/Uu', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	/*
	if (!$matched)
	{
		if (preg_match('/(?<volume>[ivxlc]+)\.?\s+(?<pages>\d+)/i', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	*/
	
	if (!$matched)
	{
		if (preg_match('/(?<volume>[0-9]{4}),?\s+(?<pages>\d+)/i', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	if (!$matched)
	{
		if (preg_match('/\((?<volume>[0-9]{4})\)?\s+(?<pages>\d+)/i', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}	
	
	
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+)\.?(\s+p.)?\s+(?<pages>\d+)\.?\s+(?<year>[0-9]{4})\.?$/i', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// 1920, vi, 205.
	if (!$matched)
	{
		if (preg_match('/^(?<year>[0-9]{4}),\s+(?<volume>[ivxlc]+),\s+(?<pages>\d+)\.?$/i', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = arabic($m['volume']);
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// 10, 57 (1964).
	if (!$matched)
	{
		if (preg_match('/^(?<volume>\d+),\s+(?<pages>\d+)\s+\((?<year>[0-9]{4})\)\.?$/i', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// 56(M?m. 3d): 391 1909
	if (!$matched)
	{
		//echo 'x';
		echo "-- $collation\n";
		if (preg_match('/^(?<volume>\d+)\(Mém.*\):\s+(?<pages>\d+)/ui', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// 55(3):188
	if (!$matched)
	{
		echo "-- $collation\n";
		if (preg_match('/(?<volume>\d+)\((?<issue>.*)\):\s*(?<pages>\d+)\b/Uu', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->issue = $m['issue'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// ii. Nos. 5-8, 348
	if (!$matched)
	{
		echo "-- $collation\n";
		if (preg_match('/(?<volume>[i]+)\.\s+No[a|s]?\.\s+(?<issue>.*)[,|\.]\s+(?<pages>\d+)\b/Uu', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->volume = arabic($reference->journal->volume);
			$reference->journal->issue = $m['issue'];
			$reference->journal->issue = str_replace('-', '/', $reference->journal->issue);
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	// Anno 11. No. 8, 25 (1937).
	if (!$matched)
	{
		echo "-- $collation\n";
		if (preg_match('/Anno\s+(?<volume>\d+)\.\s+No.\s+(?<issue>\d+),\s+(?<pages>\d+)\s+/Uu', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	
	// No. 6, 18 (1969)
	if (!$matched)
	{
		echo "-- $collation\n";
		if (preg_match('/No.\s+(?<volume>\d+),\s+(?<pages>\d+)\s+/Uu', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	// 18; 21 (1975).
	if (!$matched)
	{
		echo "-- $collation\n";
		if (preg_match('/(?<volume>\d+);\s+(?<pages>\d+)\s+/Uu', $collation, $m))
		{
			echo "-- Matched " . __LINE__ . "\n";
			$matched = true;
			
			//print_r($m);
			
			
			
			$reference->journal->volume = $m['volume'];
			$reference->journal->pages = $m['pages'];
			
			//print_r($reference);
		}
	}
	
	
	
	//print_r($reference);
	
	// hack s
	//$reference->journal->volume = 7;
	//$reference->journal->volume =  30;
	
	
	// We've parsed a reference
	if ($matched)
	{
		// Find it...
		
		$parameters = array();
		
		if (isset($reference->journal->identifier))
		{
			foreach ($reference->journal->identifier as $identifier)
			{
				switch ($identifier->type)
				{
					case 'issn':
						$parameters['issn'] = $identifier->id;
						break;
					default:
						break;
				}
			}
		}
				
		if (isset($reference->journal->volume))
		{
		
			// temp
			//$reference->journal->volume = 16;
		
			$parameters['volume'] = $reference->journal->volume;
		}
		
		if ($include_issue_in_search)
		{
			if (isset($reference->journal->issue))
			{			
				// clean
				if ($reference->journal->name == 'Acta Bot. Venez.')
				{
					$reference->journal->issue = str_replace('-', '/', $reference->journal->issue);
				
					if (preg_match('/^(?<one>\d+).*(?<two>\d+)$/', $reference->journal->issue, $mm))
					{
						$reference->journal->issue = $mm['one'] . '/' . $mm['two'];
					}
				}
				
				if ($reference->journal->name == 'Selbyana')
				{
					$reference->journal->issue = str_replace('-', '/', $reference->journal->issue);
				}
				
				
				$parameters['issue'] = $reference->journal->issue;
			}
		}		

		if (isset($reference->journal->pages))
		{
			$parameters['page'] = $reference->journal->pages;
		}
		
		if (isset($reference->journal->article_number))
		{
			$parameters['article_number'] = $reference->journal->article_number;
		}

		if (isset($reference->journal->series) && $include_series_in_search)
		{
			$parameters['series'] = $reference->journal->series;
		}

		
		if ($include_authors_in_search)
		{
			if (isset($reference->authors))
			{
				$parameters['authors'] = $reference->authors;
				
				// clean
				$parameters['authors'] = str_replace('.', '', $parameters['authors']);
			}
		}
		
		
		//print_r($parameters);
		
		
		if ($include_year_in_search)
		{
			if (isset($reference->year))
			{
				$parameters['year'] = $reference->year;
				
				// clean
				$parameters['year'] = substr($parameters['year'], 0, 4);
				
			}
		}		
		
		

		$url = 'http://localhost/~rpage/microcitation/www/index.php?' . http_build_query($parameters);
		
		//echo $url ."\n";
			
		$json = get($url);
		
		//echo $json;
		
		//exit();
		//echo $json;
	
		$obj = json_decode($json);
	
		//print_r($obj);
	
		if (isset($obj->sql))
		{
			echo '-- ' . $obj->sql . ";\n";
		}
	
		if (isset($obj->found) && $obj->found)
		{
			//echo $obj->doi . "\n";
			
			if (count($obj->results) == 1)
			{
				// Wikidata
				if (isset($obj->results[0]->wikidata))
				{
					echo 'UPDATE names SET wikidata="' . $obj->results[0]->wikidata . '" WHERE Id="' . $reference->id . '";' . "\n";
				}
			
			
			
				// DOI
				if (isset($obj->results[0]->doi))
				{
					echo 'UPDATE names SET doi="' . $obj->results[0]->doi . '" WHERE Id="' . $reference->id . '";' . "\n";
				}
				
				// Handle
				if (isset($obj->results[0]->handle))
				{
					echo 'UPDATE names SET handle="' . $obj->results[0]->handle . '" WHERE Id="' . $reference->id . '";' . "\n";
				}

				// JSTOR
				if (isset($obj->results[0]->jstor))
				{
					echo 'UPDATE names SET jstor="' . $obj->results[0]->jstor . '" WHERE Id="' . $reference->id . '";' . "\n";
				}				
				
				// PDF
				if (isset($obj->results[0]->pdf))
				{
					echo 'UPDATE names SET pdf="' . $obj->results[0]->pdf . '" WHERE Id="' . $reference->id . '";' . "\n";
				}				
				
				// URL
				if (isset($obj->results[0]->url))
				{
					$use_url = true;
					
					if (isset($obj->results[0]->jstor)) { $use_url = false; }
					
					if (preg_match('/http:\/\/ci.nii.ac.jp\/naid\//', $obj->results[0]->url))
					{
						//echo  'UPDATE names SET cinii="' . str_replace('http://ci.nii.ac.jp/naid/', '', $obj->results[0]->url) . '" WHERE Id="' . $reference->id . '";' . "\n";
					}
					
					if ($use_url)
					{
						echo 'UPDATE names SET url="' . $obj->results[0]->url . '" WHERE Id="' . $reference->id . '";' . "\n";
					}
				}
				
			}
		}
	}
	else
	{
		echo "-- no match\n";
	}
	
	
	$result->MoveNext();
}

?>