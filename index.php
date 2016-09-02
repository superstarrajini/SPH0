<?php
$to      = 'waftrue@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: test@test.com' . "\r\n" .
   'Reply-To: test@test.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
