<html>

  <link rel="stylesheet" type="text/css" href="http://waftrue.comxa.com/style.css">

</html>
<?php
header('Content-Type: text/html');


$clientip = $_SERVER['REMOTE_ADDR'];


$api = file_get_contents("http://freegeoip.net/xml/{$clientip}");


echo $api;
?>

