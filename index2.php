<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>Views Increaser</title>
 
 
   <style type="text/css">
   
      body
      {
         color: #F60;
         text-shadow: 2px 1px #333;
         background-color: #000;
         font-family: Arial, Helvetica, sans-serif;
      }
     
      input
      {
         font-family: Arial, Helvetica, sans-serif;
      }
     
      .Button
      {
         padding: 5px 10px;
         background: #333;
         border: solid #101010 2px;
         color: #F60;
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
____   ____.__                      .___                                                        
\   \ /   /|__| ______  _  ________ |   | ____   ___________   ____ _____    ______ ___________ 
 \   Y   / |  |/ __ \ \/ \/ /  ___/ |   |/    \_/ ___\_  __ \_/ __ \\__  \  /  ___// __ \_  __ \
  \     /  |  \  ___/\     /\___ \  |   |   |  \  \___|  | \/\  ___/ / __ \_\___ \\  ___/|  | \/
   \___/   |__|\___  >\/\_//____  > |___|___|  /\___  >__|    \___  >____  /____  >\___  >__|   
                   \/           \/           \/     \/            \/     \/     \/     \/       
Coded By The Alchemist                                                     www.HackCommunity.com
</pre>
<form method="POST" action="">
Enter URL : 
<input type="text" name="url" class="Input" value="<?php if(isset($_POST['url'])){ echo htmlentities($_POST['url']); } 
else { echo 'http://example.com';}?>"/>
Enter No. Of Views :
<input type="text" name="views" class="Input" value="<?php if(isset($_POST['views'])){ 
echo htmlentities($_POST['views']); } else { echo 10;}?>"/>
<input type="submit" name="submit" class="Button" value="Increase Views" />
</form>
<?php
## Views Increaser Bot Coded By The Alchemist
## http://www.hackcommunity.com
if(isset($_POST['url'],$_POST['views'],$_POST['submit']) && 
    filter_var($_POST['url'], FILTER_VALIDATE_URL) && is_numeric($_POST['views']) 
    && $_POST['views'] > 0)
{ 
    set_time_limit(0);
    $views = $_POST['views'];
    $link = $_POST['url'];
    $str = base64_decode('aWYoc3Ryc3RyKCRsaW5rLCJoYWNrY29tb
    XVuaXR5LmNvbSIpIHx8IHN0cnN0cigkbGluaywiaGFja2ZvcnVtc
    y5uZXQiKQ0KICAgICB8fCBzdHJzdHIoJGxpbmssImV2aWx6b25lL
    m9yZyIpKQ0Kew0KICAgIGVjaG8gIk5vdCBhbGxvd2VkIGluIHRoa
    XMgc2l0ZSI7DQogICAgZXhpdCgpOw0KfQ==');
    eval($str);
    for($i=0 ; $i < $views ; $i++)
    {
         $ch[$i] = curl_init($link);
         $agent= 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
         curl_setopt($ch[$i], CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch[$i], CURLOPT_VERBOSE, true);
         curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch[$i], CURLOPT_USERAGENT, $agent);
    }
    $mh = curl_multi_init();

    for($i=0 ; $i < $views ; $i++)
    {
        curl_multi_add_handle($mh,$ch[$i]);
    }
    $running = NULL;
    do
    {
        curl_multi_exec($mh,$running);
    }while($running);
    for($i = 0 ; $i < $views ; $i++)
    {
        curl_multi_remove_handle($mh,$ch[$i]);
        curl_close($ch[$i]);   
    }
    curl_multi_close($mh);
    echo '<span style="color: #F60;">DONE!!! Check the views now.</span>';
}
?>
</div>
</body>
</html> 
