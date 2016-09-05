
<?php
<?xml version="1.0" encoding="ISO-8859-1"?>    
header('Content-Type: text/xml');


$clientip = $_SERVER['REMOTE_ADDR'];


$api = file_get_contents("http://freegeoip.net/xml/{$clientip}");


echo $api;
?>

