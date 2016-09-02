<?php
$to      = 'nobody@supremeforums.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@supremeforums.com' . "\r\n" .
   'Reply-To: webmaster@supremeforums.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
