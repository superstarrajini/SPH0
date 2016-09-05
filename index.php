<?php

header('Content-Type: application/json');

$clientip = $_SERVER['REMOTE_ADDR'];

$api1 = file_get_contents("http://freegeoip.net/json/{$clientip}");

echo json_encode($api1);

?>
