<?php

require_once('crossing.php');

require_once('svg.php');

require_once('node_iterator.php');
require_once('tree.php');
require_once('tree_drawer.php');


require_once('perm.php');



//--------------------------------------------------------------------------------------------------
function get_subtree_leaf_order($subtree)
{
	$sequence = array();
	
	$ni = new NodeIterator ($subtree);
	$q = $ni->Begin();
	while ($q != NULL)
	{	
		if ($q->IsLeaf ())
		{
			$sequence[] = $q->GetLabel();
		}
		$q = $ni->Next();
	}
	
	//echo join(",", $sequence) . "\n";
	
	return $sequence;
}

//--------------------------------------------------------------------------------------------------
function get_subtree_geo_order($leaf_sequence, $geo_order)
{
	// Convert absolute geo order to [0,m] where m is number of distinct localities 
	// occupied by this subtree
	$relative_order = array();
	foreach ($leaf_sequence as $k => $v)
	{
		$relative_order[] = $geo_order[$v];
	}
	sort($relative_order);
	$relative_order = array_flip($relative_order);

	return $relative_order;
}

//--------------------------------------------------------------------------------------------------
function layer_crossings($leaf_sequence, $geo_order)
{
	$relative_geo_order = get_subtree_geo_order($leaf_sequence, $geo_order);
			
	// Generate bipartite layer
	$layer = array();
	foreach ($leaf_sequence as $k => $v)
	{
		$layer[] = array($k, $relative_geo_order[$geo_order[$v]]);
	}
	
	// Count number of crossings
	return count_crossings($layer);
}


//--------------------------------------------------------------------------------------------------
function dump_svg($layer)
{
	$svg = '';
	// svg dump
	$svg .= '<?xml version="1.0" ?>
	<svg xmlns:xlink="http://www.w3.org/1999/xlink" 
	xmlns="http://www.w3.org/2000/svg"
	width="300px" 
    height="600px" 
    >';
    
    $svg .= '<g>';
    
    $svg .= '<style type="text/css">
<![CDATA[
	path {
		stroke: black;
		stroke-width:1;
		stroke-linecap:square;
	}
]]>
</style>';
	$i = 0;
	foreach ($layer as $edge)
	{
		$svg .= '<path d="M ' 
				. '20' . ' ' . ($edge[0] * 20) . ' ' . '200' . ' ' . ($edge[1] * 20) . '" />' . "\n";

	}	
	
	$svg .= '</g></svg>';
	return $svg;
}



//--------------------------------------------------------------------------------------------------


// GenGIS style layout

// Banza tree

$newick = '(((((B._parvula_B:0.003181,(B._parvula_A:0.020173,(B._kauaiensis_B:0.004824,B._kauaiensis_A:0.003941):0.013348):0.004084):0.011951,((B._molokaiensis_B:0,B._molokaiensis_A:0):0.028291,(B._deplanata_B:0,B._deplanata_A:0):0.03147):0.000672):0.007252,(((B._brunnea_B:0.002641,B._brunnea_A:0.002143):0.01806,((B._pilimauiensis_B:0.002093,B._pilimauiensis_A:0.002688):0.002807,(B._mauiensis_B:0.000473,B._mauiensis_A:0.000324):0.003169):0.016605):0.002041,((B._nitida_B:0.007032,B._nitida_A:0.008551):0.017162,B._nitida_C:0.025889):0.002026):0.014358):0.002074,(B._unica_B:0.017669,B._unica_A:0.014463):0.029122):0.02983,(B._nihoa_B:0.000261,B._nihoa_A:-0.000261):0.059528);';

//$newick = '((B._nihoa_B:0.000261,B._nihoa_A:-0.000261):0.059528,((B._unica_A:0.014463,B._unica_B:0.017669):0.029122,((((B._molokaiensis_B:0,B._molokaiensis_A:0):0.028291,(B._deplanata_A:0,B._deplanata_B:0):0.03147):0.000672,(B._parvula_B:0.003181,(B._parvula_A:0.020173,(B._kauaiensis_B:0.004824,B._kauaiensis_A:0.003941):0.013348):0.004084):0.011951):0.007252,(((B._nitida_A:0.008551,B._nitida_B:0.007032):0.017162,B._nitida_C:0.025889):0.002026,((B._brunnea_A:0.002143,B._brunnea_B:0.002641):0.01806,((B._mauiensis_B:0.000473,B._mauiensis_A:0.000324):0.003169,(B._pilimauiensis_B:0.002093,B._pilimauiensis_A:0.002688):0.002807):0.016605):0.002041):0.014358):0.002074):0.02983);';

//$newick = '(((B._brunnea_B:0.002641,B._brunnea_A:0.002143):0.01806,((B._pilimauiensis_B:0.002093,B._pilimauiensis_A:0.002688):0.002807,(B._mauiensis_B:0.000473,B._mauiensis_A:0.000324):0.003169):0.016605):0.002041,((B._nitida_B:0.007032,B._nitida_A:0.008551):0.017162,B._nitida_C:0.025889):0.002026);';


// frogs
$newick = '((Craugastor_tabasarae_MVUP_1720,(Craugastor_cf._longirostris_FMNH_257678,Craugastor_cf._longirostris_FMNH_257561)),(((((Craugastor_cf._podiciferus_FMNH_257672,Craugastor_cf._podiciferus_MVZ_149813,Craugastor_cf._podiciferus_UCR_16361,Craugastor_cf._podiciferus_FMNH_257670,Craugastor_cf._podiciferus_FMNH_257669),((Craugastor_cf._podiciferus_UCR_16355,Craugastor_cf._podiciferus_UCR_16354,Craugastor_cf._podiciferus_UCR_16353),((Craugastor_cf._podiciferus_FMNH_257671,Craugastor_cf._podiciferus_FMNH_257673),Craugastor_cf._podiciferus_UTA_A_52449))),(((Craugastor_cf._podiciferus_UCR_16356,(Craugastor_cf._podiciferus_UCR_16358,Craugastor_cf._podiciferus_UCR_16357)),(Craugastor_cf._podiciferus_UCR_17462,Craugastor_cf._podiciferus_UCR_17469),(Craugastor_cf._podiciferus_FMNH_257596,Craugastor_cf._podiciferus_FMNH_257595)),((Craugastor_cf._podiciferus_UCR_17439,Craugastor_cf._podiciferus_UCR_17442,Craugastor_cf._podiciferus_UCR_17441,Craugastor_cf._podiciferus_UCR_17443),(Craugastor_cf._podiciferus_UCR_18062,Craugastor_cf._podiciferus_MVZ_164825)))),((((Craugastor_cf._podiciferus_FMNH_257653,Craugastor_cf._podiciferus_FMNH_257550),Craugastor_cf._podiciferus_FMNH_257757,Craugastor_cf._podiciferus_FMNH_257756,(Craugastor_cf._podiciferus_FMNH_257652,Craugastor_cf._podiciferus_FMNH_257651),Craugastor_cf._podiciferus_FMNH_257755),Craugastor_cf._podiciferus_FMNH_257758),(Craugastor_cf._podiciferus_UCR_16360,Craugastor_cf._podiciferus_UCR_16359))),((((Craugastor_sp._A_USNM_563039,Craugastor_sp._A_USNM_563040),(Craugastor_sp._A_AJC_0891,Craugastor_sp._A_AJC_0890)),(Craugastor_sp._A_FMNH_257689,Craugastor_sp._A_FMNH_257562)),((Craugastor_stejnegerianus_UCR_16332,Craugastor_bransfordii_MVUP_1875),(Craugastor_underwoodi_UCR_16315,Craugastor_underwoodi_USNM_561403)))));';

//$newick = '(Craugastor_cf._podiciferus_FMNH_257672,Craugastor_cf._podiciferus_MVZ_149813,Craugastor_cf._podiciferus_UCR_16361,Craugastor_cf._podiciferus_FMNH_257670,Craugastor_cf._podiciferus_FMNH_257669);';

// Read tree
$t = new Tree();
$t->Parse($newick);


// Load coordinates
$filename = 'coordinates.txt';
$filename = 'frogs.txt';
$file_handle = fopen($filename, "r");

$pts = array();
$latitude = array();
$longitude = array();

while (!feof($file_handle)) 
{
	$line = trim(fgets($file_handle));
	$parts = explode("\t", $line);
	
	$pt = array($parts[1],$parts[2]);
	$latitude[] = $parts[1];
	$longitude[] = $parts[2];
	$pts[$parts[0]] = $pt;	
}

// For now sort coordinates left-right by longitude
//array_multisort($longitude, SORT_ASC, SORT_NUMERIC, $pts); 
array_multisort($latitude, SORT_ASC, SORT_NUMERIC, $pts); 

// Store order of geographic pts
$i = 0;
$geo_sequence = array();

$geo_order = array();

foreach ($pts as $leaf => $pt)
{
	$geo_sequence[] = $leaf;
	$geo_order[$leaf] = $i++;
}


//-------------------------------------------------------------
// Dump current situation

	$sequence = get_subtree_leaf_order($t->GetRoot());
	$layer = array();
	foreach ($sequence as $k => $v)
	{
		$layer[] = array($k, $geo_order[$v]);
	}



//exit();


// Traverse tree in post order, re-orering if we need to...


	$ni = new NodeIterator ($t->GetRoot());
	$q = $ni->Begin();
	while ($q != NULL)
	{	
		if (!$q->IsLeaf ())
		{
			// Get children
			
			$child_nodes = array();
			$child_nodes[] = $q->GetChild();
			$r = $q->child->sibling;
			while ($r)
			{
				$child_nodes[] = $r;
				$r = $r->sibling; 
			}
		
			// what is degree of node?
			$degree = count($child_nodes);
			
			echo $degree . "\n";
			
			if ($degree > 2)
			{
				$children = array();
				foreach ($child_nodes as $c)
				{
					$children[] = get_subtree_leaf_order($c);
				}
				
				// try different arrangements
				$p = range(0, $degree-1);
				
				$best_score = 1000;
				$best_perm = $p;

				while ($p)
				{
					echo '[' . join(',', $p) . ']' . "\n";
					$leaf_sequence = array();
					foreach ($p as $p_i)
					{
						$leaf_sequence = array_merge($leaf_sequence, $children[$p_i]);
					}
				
					$score = layer_crossings($leaf_sequence, $geo_order);
					echo "Number of crossings: $score\n";
					
					if ($score < $best_score)
					{
						$best_score = $score;
						$best_perm = $p;
					}

					$p = pc_next_permutation($p);
					
				}
				
				echo 'Best permutation = [' . join(',', $best_perm) . ']' . "\n";
				
				// update tree
				
				for ($i = 0; $i < $degree; $i++)
				{
					if ($i == 0)
					{
						$q->SetChild($child_nodes[$best_perm[$i]]);
					}
					else
					{
						$child_nodes[$best_perm[$i]]->SetSibling(null);
						$child_nodes[$best_perm[$i-1]]->SetSibling($child_nodes[$best_perm[$i]]);
					}	
				}	
				
				
				
				
				

				
				
			}
			else
			{
				// simple swap test
				$children = array();
				
				$children[] = get_subtree_leaf_order($child_nodes[0]);
				$children[] = get_subtree_leaf_order($child_nodes[1]);
				
				//print_r($children);
				//exit();
					
				// Complete list of leafs using left + right descendant	[0,n] where n is number of leaves		
				$leaf_sequence = array_merge($children[0], $children[1]);
				
				$score1 = layer_crossings($leaf_sequence, $geo_order);
				echo "Number of crossings: $score1\n";
				
				$leaf_sequence = array_merge($children[1], $children[0]);
							
				//print_r($layer);
				$score2 = layer_crossings($leaf_sequence, $geo_order);
				echo "Number of crossings: $score2\n";
				
				//echo dump_svg($layer);
				
				if ($score2 < $score1)
				{
					// swap children				
					$left = $q->GetChild();
					$right = $q->GetChild()->GetSibling();
					
					$q->SetChild($right);
					$left->SetSibling($right->GetSibling());
					$right->SetSibling($left);
				}
				
				echo "-------------\n";
			}			


		}
		$q = $ni->Next();
	}


	
echo $t->WriteNewick();

// draw...

	$t->BuildWeights($t->GetRoot());
	
	
	$height = 400;
	$width = 800;
	$tree_width 	= $width - 700;
	
	// Drawing properties
	$attr = array();
	$attr['inset']			= 0;
	$attr['width'] 			= $tree_width;
	$attr['height'] 		= $height;
	
	// font size
	$font_height = 10;
	
	$attr['font_height'] 	= $font_height;
	$attr['line_width'] 	= 1;
	
	// Don't draw labels (we do this afterwards)
	$attr['draw_leaf_labels'] = false;
	$attr['draw_internal_labels'] = false;
	
	$td = NULL;
	
	if ($t->HasBranchLengths())
	{
		$td = new PhylogramTreeDrawer($t, $attr);
	}
	else
	{
		$td = new RectangleTreeDrawer($t, $attr);
	}
	
	
	$td->CalcCoordinates();	
	$port = new SVGPort('', $width, $height, $font_height, false);
	
	$port->StartGroup('tree', true);
	$td->Draw($port);
	$port->EndGroup();
	
	
	// Map stuff...
	$min_lat = 90;
	$max_lat = -90;
	$min_long = 180;
	$max_long = -180;
	foreach ($pts as $pt)
	{
		$min_lat = min($min_lat, $pt[0]);
		$max_lat = max($max_lat, $pt[0]);
		$min_long = min($min_long, $pt[1]);
		$max_long = max($max_long, $pt[1]);
	}	
	
	
	//
	
	{	
		$n = new NodeIterator ($t->getRoot());
				
		
		$q = $n->Begin();
		while ($q != NULL)
		{	
			if ($q->IsLeaf ())
			{
				$label = $q->Getlabel();
				echo $label .  ' ' . $geo_order[$label] . "\n";
				
				
				
				$pt0 = $q->GetAttribute('xy');
				
				$port->DrawText($pt0, $label);
				
				
				$pt0['x'] += 200;
				$pt1 = array();
				
				// origin
				//$x = $pt0['x'] + 100 + 100 * ($max_long - $min_long)
				
				echo $pts[$label][0] . "\n";
				echo $pts[$label][1] . "\n";
				
				
				if (0)
				{
					$pt1['x'] = $pt0['x'] + 100 + ($pts[$label][1] - $min_long)/($max_long - $min_long) * 100;
					$pt1['y'] = ($pts[$label][0] - $min_lat)/($max_lat - $min_lat) * $height;
				}
				else
				{
					$pt1['x'] = $pt0['x'] + 100;
					$pt1['y'] = $geo_order[$label] * $td->leaf_gap;
				}
				
				$port->DrawLine($pt0, $pt1);

			}			
			$q = $n->Next();
		}
	}
	
	
	
	$svg = $port->GetOutput();
	file_put_contents('g2.svg', $svg);
	






?>
