
<?php

$clientip = $_SERVER['REMOTE_ADDR'];


$api = file_get_contents("http://ip-api.com/xml/{$clientip}");


echo "$api";
?>
