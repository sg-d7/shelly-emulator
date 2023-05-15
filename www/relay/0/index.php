<?php
// sample:
// http://127.0.0.1/relay/0?turn=off

header('Content-Type: application/json');

$file = dirname(__FILE__).'/status.json';
$json = json_decode(file_get_contents($file), true);

if (isset($_GET["turn"]))
{
	$par = strtolower($_GET["turn"]);
	if (strcmp($par, "on") == 0) {
		$json["ison"] = true;
	} else if (strcmp($par, "off") == 0) {
		$json["ison"] = false;
	}
	
	$tm_file = 'e:/xampp_737/htdocs/public_html/rpc/Input.GetStatus/time.json';
	$json_tm = json_decode(file_get_contents($tm_file), true);
	$json_tm["enabled"] = $json["ison"];
	file_put_contents($tm_file, json_encode($json_tm));
}
$json_result = json_encode($json);
file_put_contents($file, $json_result);
echo $json_result;

?>