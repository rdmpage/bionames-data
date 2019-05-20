<?php

require_once('../lib.php');
require_once (dirname(dirname(__FILE__)) . '/lib/taxon_name_parser.php');

$pp = new Parser();	

$json = file_get_contents('116394-unsorted.json');

$obj = json_decode($json);

$count = 0;
$html = '';

$html .= '<table>';

$html .= '<tr><th>EOL</th><th>Name</th><th>EOL</th><th>ION</th><th>Publication</th></tr>';

foreach ($obj->collection_items as $collection_items)
{
	$html .= '<tr>';
	
	
	$html .= '<td>' .  '<a href="http://eol.org/pages/' . $collection_items->object_id . '" target=_new">' . $collection_items->object_id . '</a>' . '</td>';
	
	// clean name (sigh);
	$canonical = $collection_items->name;
	$r = $pp->parse($collection_items->name);
	
	if (isset($r->scientificName))
	{
		if ($r->scientificName->parsed)
		{
			$canonical = $r->scientificName->canonical;
		}
	}
	
	$html .= '<td>' .  '<a href="http://bionames.org/search/' . $canonical . '" target=_new">' . $collection_items->name . '</a>' .  '</td>';
	
	
	
	$url = 'http://bionames.org/api/name/' . rawurlencode($canonical) . '/concepts';
	
	//echo $url . "\n";
	
	//exit();
	
	$json = get($url);
	
	//echo $json;
	$obj =  json_decode($json);
	
	//print_r($obj);
	
	//exit();
	
	$eol_id = 0;
	$ion = 0;
	$publishedInCitation = '';
	
	if (count($obj->concepts) == 1)
	{
		if (isset($obj->concepts[0]->identifier))
		{
			foreach ($obj->concepts[0]->identifier as $k => $v)
			{
				switch ($k)
				{
					case 'eol':
						$eol_id = $v[0];
						break;
					
					case 'ion':
						foreach ($v as $kk => $vv)
						{
							$ion = $kk;
							$publishedInCitation = $vv->publishedInCitation[0];						
						}
						break;
					
					default:
						break;
				}
			}
		}
	}
	
	$html .= '<td>' .  $eol_id . '</td>';
	$html .= '<td>' .  $ion . '</td>';
	//$html .= '<td>' .  $publishedInCitation . '</td>';
	
	if ($publishedInCitation <> '')
	{
		$url = 'http://bionames.org/api/api_citeproc.php?id=' . $publishedInCitation;
		
		$html .= '<td>' .  get($url) . '</td>';
	}
		
	//echo "\t" . $eol_id . "\t" . $ion . "\t" . $publishedInCitation;
	
	$html .= '</tr>';
	
	//echo $html;
	
	$count++;
	
	//if ($count == 20) break;
	
	
	
	
	
}

echo $html;

?>