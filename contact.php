<?php

if($_POST["submit"]) {
    $recipient="sudarshan.is17@rvce.edu.in";
    $subject= $_POST["subject"];
    $sender=$_POST["sender"];
    $senderEmail=$_POST["senderEmail"];
    $message=$_POST["message"];
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: sudarshan.is17@rvce.edu.in' . "\r\n";
    $mailBody="Name: $sender\nEmail: $senderEmail\n\n$message";

    mail($recipient, $subject, $mailBody, $headers);
  
  	echo '<link rel="stylesheet" href="css/style.css">
  	<div class="wrapper">
    <a href="index.html"  class="button">Go Back</a>
	</div>';

 }

?>