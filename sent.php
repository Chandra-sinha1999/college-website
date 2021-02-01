<?php
$to_email = "chandra.17bit1057@abes.ac.in";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: cpsinha1999@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} 
else {
    echo "Email sending failed...";
}
?>
