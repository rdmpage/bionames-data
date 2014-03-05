<?php

$json = file_get_contents('issn.json');

$obj = json_decode($json);

// count

$total = array();

foreach ($obj->rows as $row)
{
	if (!isset($row->key[0]))
	{
		$total[$row->key[0]] = 0;
	}
	$total[$row->key[0]] += $row->value;
}

//rsort($total);
//print_r($total);

// filter rarer journals
$cutoff = 500;

$table_rows = array();
foreach ($total as $issn => $count)
{
	if ($total[$issn] > $cutoff)
	{
		for ($decade = 1750; $decade < 2020; $decade += 10)
		{
			if (!isset($table_rows[$decade]))
			{
				$table_rows[$decade] = array();
			}
			$table_rows[$decade][$issn] = 0;
		}
	}
}

foreach ($obj->rows as $row)
{
	$issn = $row->key[0];
	if ($total[$issn] > $cutoff)
	{
		$decade = $row->key[1];
		$table_rows[$decade][$issn] = $row->value;
	}
}	

//print_r($table_rows);

// text dump

// header
$journals = array_keys($table_rows['1750']);

echo "\t" . join("\t", $journals) . "\n";

foreach ($table_rows as $decade => $row)
{
	echo $decade;
	foreach ($row as $count)
	{
		echo "\t" . $count;
	}
	echo "\n";
}


?>

