<html>
  
  <style>
    
    * {
 font-size: 100%;
 font-family: Arial;
 color: red;
  word-break: break-all;
} 

    
  </style>
</html>
<?php
header('Content-Type: text/html');


$clientip = $_SERVER['REMOTE_ADDR'];


$api = file_get_contents("http://freegeoip.net/xml/{$clientip}");


echo $api;
?>

