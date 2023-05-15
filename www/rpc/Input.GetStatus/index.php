<?php	

$tm = dirname(__FILE__).'/time.json';

$json_time = json_decode(file_get_contents($tm), true);
if ($json_time["enabled"]) {
	header('Content-Type: application/json');
	$file = dirname(__FILE__).'/status.json';
	echo file_get_contents($file);
} else {
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
}

?>