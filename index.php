<?php

header('Content-Type: text/xml');

$clientip = $_SERVER['REMOTE_ADDR'];

$api = htmlentities("http://freegeoip.net/xml/{$clientip}");


echo $api;

?>

