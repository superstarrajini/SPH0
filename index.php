<?php

header('Content-Type: text/xml');

$clientip = $_SERVER['REMOTE_ADDR'];

$api1 = file_get_contents("http://freegeoip.net/xml/{$clientip}");

echo $api->Response[0]->IP;
echo $api->Response[0]->CountryName;
echo $api->Response[0]->City;

?>
