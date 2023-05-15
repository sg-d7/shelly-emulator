<?php
header('Content-Type: application/json');

$file = realpath(__DIR__ . '/..').'/Input.GetStatus/status.json';

$json = json_decode(file_get_contents($file), true);

$state = $json["state"];

$resp = array("was_on" => $state);

if (isset($_GET["on"])) {
	$par = strtolower($_GET["on"]);
	if (strcmp($par, "true") == 0) {
		$json["state"] = true;
	} else if (strcmp($par, "false") == 0) {
		$json["state"] = false;
	}
	$json_result = json_encode($json);
	file_put_contents($file, $json_result);
}
$json_result = json_encode($resp);
echo $json_result;
?>