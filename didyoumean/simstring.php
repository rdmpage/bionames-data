<?php

// http://stackoverflow.com/questions/2390604/how-to-pass-variables-as-stdin-into-command-line-from-php

$cmd = '/usr/local/bin/simstring -d all_names.db -t 0.8 cosine';

$string = 'Dobsonia andersoni' . "\n";

$descriptorspec = array(
   0 => array("pipe", "r"),
   1 => array("pipe", "w")
);

$process = proc_open($cmd, $descriptorspec, $pipes);

if (is_resource($process)) {
    fwrite($pipes[0], $string);
    fclose($pipes[0]);

    $output = stream_get_contents($pipes[1]);
    fclose($pipes[1]);

    $return_value = proc_close($process);
	
	// clean
	$lines = explode("\n", $output);
	
	$hits = array();
	foreach ($lines as $line)
	{
		if (preg_match('/^\s+/', $line))
		{
			$hits[] = trim($line);
		}
	}
	print_r($hits);
}

?>