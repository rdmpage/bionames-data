<?php

$filename = 'sorted.txt';

$file_handle = fopen($filename, "r");

$count = 0;

echo '<!DOCTYPE html>
<meta charset="utf-8">
<style>

body {
	padding:20px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}

</style>
<title>Journal article availability</title>';

echo '<h1>Journal article availability</h1>';
?>

<p>This is a list of the journals in BioNames, ordered by how many articles each journal has in the BioNames database.
Each journal is colour-coded by the percentage of articles which are available online (where "available" means that the full text
is online, it may or may not be behind a paywall). There will be gaps in coverage (i.e., journals that have articles online but
which haven't yet been added to BioNames, but the list also highlights those journals that are not available online.
</p>

<table>
<tr><td style="background-color:#00FF00;">&gt; 90%</td><td>Almost all are available</td></tr>
<tr><td style="background-color:yellow;">&lt; 90%</td><td>Most are available</td></tr>
<tr><td style="background-color:orange">&lt; 50%</td><td>Limited availability</td></tr>
<tr><td style="background-color:red;color:white">&lt; 10%</td><td>Mostly inaccessible</td></tr>
</table>

<?php

echo '<table cellpadding="4" cellspacing="0">';

while (!feof($file_handle)) 
{
	$line = trim(fgets($file_handle));
	$parts = explode("\t", $line);
	
	if ($count == 0)
	{
		echo '<tr>';
		echo '<th>ISSN (click for details)</th>';
		echo '<th>Journal</th>';
		echo '<th>Articles</th>';
		echo '<th>Digitised</th>';
		echo '<th>%&nbsp;digitised</th>';
		echo '</tr>';
		
		echo "\n";
	}
	else
	{
		
		echo '<tr';
		
		$colour = 'yellow';
		$text = 'black';
		
		if ($parts[4] > 90)
		{
			$colour = '#00FF00';
		}
		

		if ($parts[4] < 50)
		{
			$colour = 'orange';
		}
		
		if ($parts[4] < 10)
		{
			$colour = 'red';
			$text = 'white';
		}
		
		echo ' style="background-color:' . $colour . ';color:' . $text . '"';
		
		
		echo '>';
		
		echo '<td>';
		echo '<a href="http://bionames.org/issn/' . $parts[0] . '" target="_new">' . $parts[0] . '</a>';
		echo '</td>';
		
		
		echo '<td>' . $parts[1] . '</td>';
		echo '<td align="right">' . $parts[2] . '</td>';
		echo '<td align="right">' . $parts[3] . '</td>';
		echo '<td align="right">' . $parts[4] . '</td>';
		
		
		
		
		
		echo '</tr>';
		
		echo "\n";
		
	}
	$count++;
}


echo '</table>';

?>