<?php
$clientip = $_SERVER['REMOTE_ADDR'];

$testip = "51.36.83.169";
$api1 = file_get_contents("http://ip-api.com/xml/{$testip}");

echo "IP is $api1";

?>
