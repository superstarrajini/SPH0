<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>Port Scanner</title>
 
 
   <style type="text/css">
   
      body
      {
         color: #ffffff;
         text-shadow: 2px 2px #000000;
         background-color: #282828;
         font-family: Arial, Helvetica, sans-serif;
      }
     
      pre
      {
         background-color: #353535;
         border: solid 1px #505050;
      }
     
      input
      {
         font-family: Arial, Helvetica, sans-serif;
      }
     
      .Button
      {
         padding: 5px 10px;
         background: #303030;
         border: solid #101010 1px;
         color: #fff;
         cursor: pointer;
         font-weight: bold;
         border-radius: 5px;
         -moz-border-radius: 5px;
         -webkit-border-radius: 5px;
         text-shadow: 1px 1px #000;
      }
     
      .Input
      {
         border: solid #101010 1px;
         color: white;
         font-weight: bold;
         padding: 3px;
         background-color: #252525;
      }
    </style>
</head>
<body>
<div align="center">
<pre>
___________.__                 _____   .__           .__                      .__           __   
\__    ___/|  |__    ____     /  _  \  |  |    ____  |  |__    ____    _____  |__|  _______/  |_ 
  |    |   |  |  \ _/ __ \   /  /_\  \ |  |  _/ ___\ |  |  \ _/ __ \  /     \ |  | /  ___/\   __\
  |    |   |   Y  \\  ___/  /    |    \|  |__\  \___ |   Y  \\  ___/ |  Y Y  \|  | \___ \  |  |  
  |____|   |___|  / \___  > \____|__  /|____/ \___  >|___|  / \___  >|__|_|  /|__|/____  > |__|  
                \/      \/          \/            \/      \/      \/       \/          \/        
Port Scanner                                                                www.HackCommunity.com
</pre>
<form action="" method="POST">
Enter URL or IP : <input type="text" class="Input" name="target" value="<?php if(isset($_POST['target']))
{echo htmlentities($_POST['target']);} else { echo 'http://example.com';}?>" size="50" />
Enter lower limit : <input type="text" class="Input" name="lower" value="<?php if(isset($_POST['lower']))
{echo htmlentities($_POST['lower']);} else { echo 1;}?>" size="5" />
Enter upper limit : <input type="text" class="Input" name="upper" value="<?php if(isset($_POST['upper']))
{echo htmlentities($_POST['upper']);} else { echo 100;}?>" size="5" />
<input type="submit" name="submit" class="Button" value="Port Scan" />
</form>
<br />
<br />
<?php
set_time_limit(0);
if(isset($_POST['target']) && isset($_POST['upper']) && isset($_POST['lower']) 
    && isset($_POST['submit']) && is_numeric($_POST['upper']) && is_numeric($_POST['lower']) 
    && (filter_var($_POST['target'],FILTER_VALIDATE_IP) || filter_var($_POST['target'],FILTER_VALIDATE_URL)))
{
      $target = $_POST['target'];
    $flag = 0;
    $lower = $_POST['lower']; //set lower limit
    $upper = $_POST['upper']; //set upper limit
    if($lower <= 0)
    {
        $lower = 1;
    }
    if($upper >= 65536)
    {
        $upper = 65535;
    }
    $numberof = ($upper - $lower) + 1; //number of parallel requests
    $ar = range($lower,$upper); //putting all the ports in an array
    for($i=0 ; $i < $numberof ; $i++)
    {
        $ch[$i] = curl_init($target);
        curl_setopt($ch[$i], CURLOPT_PORT, $ar[$i]);
        curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, true);
    }
    $mh = curl_multi_init();
    // Thanks to PeopleUnderTheStairs for the idea of using multi cURL
    for($i=0 ; $i < $numberof ; $i++)
    {
        curl_multi_add_handle($mh,$ch[$i]);
    }
    $running = NULL;
    do
    {
        curl_multi_exec($mh,$running);
    }while($running);
    for($i = 0 ; $i < $numberof ; $i++)
    {
        if(!curl_error($ch[$i]))
        {         
            $flag = 1;
            echo '<span style="color: #F00;">Port '.$ar[$i].' is open</span><br />';
        }
        curl_multi_remove_handle($mh,$ch[$i]);
        curl_close($ch[$i]);   
    }
    curl_multi_close($mh); //All the curl handlers and multi curl handlers are closed
    if($flag == 0)
    {
        echo '<span style="color: #F00;">No open ports found between '.$lower.' and '.$upper.'</span>';
    }
}
?>
</div>
</body>
</html> 
