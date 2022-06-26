<?php
$to_email = "arham426@gmail.com";
$subject = "Helloooo World ..";
$body = "Hi, This is workinggg :)";
$headers = "From:arhamali63@gmail.com";

if(mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>