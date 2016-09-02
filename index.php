<html>
<head>
<meta http-equiv="author" content="The Alchemist"/>
<title>
The Alchemist Fake Mailer
</title>
</head>
<body background="http://fc00.deviantart.net/fs70/i/2011/324/9/2/black___purple_textures_by_paralyzinglove-d4gscvx.jpg">
<p align=center>
<img src="http://i67.photobucket.com/albums/h298/bcfcrule11/theAlchemist.png" alt="The Alchemist Fake Mailer" /></p>
<form name="fakemail" action="<?php $PHP_SELF; ?>" method="POST">
<p><label for="fname"><b><font size="5" color=c0c0c0>From name :</b></font></label><br>
<input name="fname" id="fname" type="text" class="formbox" /><br></p>
<p><label for="femail"><font size="5" color=c0c0c0>From email id :</font></label><br>
<input name="femail" id="femail" type="text" class="formbox" /><br></p>
<p><label for="to"><font size="5" color=c0c0c0>To :</font></label><br>
<input name="to" id="to" type="text" class="formbox"/><br></p>
<p><label for="subject"><font size="5" color=c0c0c0>Subject :</font></label><br>
<input name="subject" id="subject" type="text" class="formbox"/><br></p>
<p><label for="message"><font size="5" color=c0c0c0>Message :</font></label><br>
<textarea name="message" id="message" cols="60" rows="8"></textarea></p>
<p><input name="submit" id="submit" type="submit" value="Send!!" /></p></form>
<?php
//Fake mailer code created by The Alchemist
function send_email($to=null,$subject=null,$from_name=null,$from_mail=null,$mail_content=null,$replyto=null)
{
    $headers = "From: \"".$from_name."\" <".$from_mail.">\r\nReply-To: ".$replyto."\r\n";//here's the main part
    if(@mail($to,$subject,$mail_content,$headers))
    {
        $mail_send_result="<p><font size=4 color=#c0c0c0>Email successfully sent to $to.!!</font></p>";//If mail gets sent successfully
    }
    else
    {
        $mail_send_result="<p><font size=4 color=#c0c0c0>Email NOT sent to $to.</font></p>";//If mail does not get sent
    }
    return $mail_send_result;
}
if(isset($_POST['to']) && isset($_POST['fname']) && isset($_POST['femail']) 
&& isset($_POST['message']) && isset($_POST['subject']) && isset($_POST['submit']))
{
    $from_name=$_POST['fname'];
    $from_mail=$_POST['femail'];
    $mail_content=$_POST['message'];
    $to=$_POST['to'];
    $subject=$_POST['subject'];
    $replyto=$_POST['femail'];
    echo send_email($to,$subject,$from_name,$from_mail,$mail_content,$replyto);
}
?>
</body>
</html> 
