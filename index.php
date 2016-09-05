<?php

header("Content-Type: text/plain");

$clientip = $_SERVER['REMOTE_ADDR'];

$api = ("http://freegeoip.net/xml/{$clientip}");


var_dump($api);

?>

