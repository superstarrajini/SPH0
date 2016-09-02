<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>URL Finder</title>
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
 ____ _____________.____        _________                                         
|    |   \______   \    |      /   _____/ ____ _____    ____   ____   ___________ 
|    |   /|       _/    |      \_____  \_/ ___\\__  \  /    \ /    \_/ __ \_  __ \
|    |  / |    |   \    |___   /        \  \___ / __ \|   |  \   |  \  ___/|  | \/
|______/  |____|_  /_______ \ /_______  /\___  >____  /___|  /___|  /\___  >__|   
                 \/        \/         \/     \/     \/     \/     \/     \/       
Coded by The Alchemist                                       www.HackCommunity.com</pre>
<form method="post" action="">
<table>
<tr><td><label for="urls">Enter URLs :</label></td>
<td><textarea class="Input" name="urls" cols="50" rows="5"></textarea></td></tr>
<tr><td></td><td><input class="Button"type="submit" name="submit" value="Check" /></tr></tr>
</table>
</form>
<?php

set_time_limit(0);
##Coded by The Alchemist
class Urlfinder
{

    private function get_url_type($url)
    {
        if(strstr($url,"http://adf.ly"))
        {
            return "adfly";
        }
        else if(strstr($url,"http://adfoc.us"))
        {
            return "adfoc";
        }
        else if(strstr($url,"linkbucks.com") || strstr($url,"any.gs")  || strstr($url,"tinylinks.co") 
    || strstr($url,"yyv.co")  || strstr($url,"miniurls.co") || strstr($url,"qqc.co")  
    || strstr($url,"whackyvidz.com")  || strstr($url,"ultrafiles.net")  || strstr($url,"dyo.gs") 
    || strstr($url,"megaline.co")  || strstr($url,"uberpicz.com")  || strstr($url,"linkgalleries.net")  
    || strstr($url,"qvvo.com") || strstr($url,"urlbeat.net")  || strstr($url,"seriousfiles.com")  
    || strstr($url,"zxxo.net")  || strstr($url,"ugalleries.net") || strstr($url,"picturesetc.net"))
        {
            return "linkbucks";
        }
        return "invalid";
    }
    
    private function get_url_from_contents($contents,$type)
    {
        if($type == "adfly")
        {
            $pos1 = strpos($contents,"var zzz = '");
            $pos1 = $pos1 + 11;
            $pos2 = strpos($contents,"'",$pos1);
        }
        else if($type == "adfoc")
        {
            $pos = strpos($contents,'//var click_url = "http://adfoc.us/serve/click/');
            $pos = $pos + 1;
            $pos1 = strpos($contents,'var click_url = "',$pos);
            $pos1 = $pos1 + 17;
            $pos2 = strpos($contents,'"',$pos1);
        }
        else
        {
            $pos1 = strpos($contents,"Lbjs.TargetUrl = '");
            $pos1 = $pos1 + 18;
            $pos2 = strpos($contents,"'",$pos1);
        }
        return substr($contents,$pos1,$pos2-$pos1);
    }

    private function get_hidden_urls($urls)
    {
        $i = 0;
        $agent= 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
        foreach($urls as $url)
        {
            $ch[$i] = curl_init($url);
            curl_setopt($ch[$i], CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch[$i], CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch[$i], CURLOPT_VERBOSE, true);
            curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch[$i], CURLOPT_USERAGENT, $agent);
            curl_setopt($ch[$i], CURLOPT_HEADER, true);
            $i++;
        }
        $numberof = $i;
        $mh = curl_multi_init();
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
            $hiddenurl = $this->get_url_from_contents(curl_multi_getcontent($ch[$i]),$this->get_url_type($urls[$i]));
            echo '<br />Hidden URL behind : <span style="color: red;">'.$urls[$i].'</span> IS <span style="color: red;">';
            echo htmlentities($hiddenurl).'</span><br />';
            curl_multi_remove_handle($mh,$ch[$i]);
            curl_close($ch[$i]);   
        }
        curl_multi_close($mh);
    }

    public function main($input)
    {
        $i = 0;
        if(!strstr($input,"\n") && filter_var($input,FILTER_VALIDATE_URL))
        {
            $urls = array(trim($input));
            $i++;
        }
        else
        {
            $urls = explode("\n",$input);
            foreach($urls as $val)
            {
                $val = trim($val);
                if(filter_var($val,FILTER_VALIDATE_URL) && $this->get_url_type($val) != "invalid")
                {
                    $urls[$i] = $val;
                    $i++;
                }
            }
        }
        if($i > 0)
        {
            $this->get_hidden_urls($urls);
        }
        else
        {
            echo '<span style="color : red">No valid URLs entered</span>';
        }    
    }
}
if(isset($_POST['urls'],$_POST['submit']))
{
    $obj = new Urlfinder();
    $obj->main($_POST['urls']);
}
?>
</div>
</body>
</html> 
