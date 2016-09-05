<?php
$clientip = $_SERVER['REMOTE_ADDR'];

$api1 = file_get_contents("http://freegeoip.net/json/{$clientip}");

echo "IP is $api1";

?>
