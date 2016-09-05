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

<style>
  
    .anaglyph {
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  border: none;
  font: normal 50px/normal "Chau Philomene One", Helvetica, sans-serif;
  color: rgb(51, 51, 51);
  text-align: center;
  -o-text-overflow: clip;
  text-overflow: clip;
  letter-spacing: 3px;
  text-shadow: -3px 0 1px rgb(30,242,241) , 3px 0 1px rgb(246,5,10) ;
}

</style>
