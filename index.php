<?php

header("Content-Type: text/xml");

$clientip = $_SERVER['REMOTE_ADDR'];

$api = ("http://freegeoip.net/xml/{$clientip}");


echp ($api);

?>

