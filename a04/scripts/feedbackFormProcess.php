<?php

$messageToBusiness = 
    "From: $_POST[name]r\n".
    "E-mail address: $_POST[email]\r\n".
    "Phone number: $_POST[number]\r\n".
    "$_POST[feedback]\r\n";

$headerToBusiness = "From: $_POST[email]\r\n";
mail("feedback@quickeats.com", "Feedback Submission",
    $messageToBusiness, $headerToBusiness);

//Construct e-mail confirmation message for the client,
//which is just a sligtly modified version of the message
//that went to the business
$messageToClient =
    "Dear $_POST[name]:\r\n".
    "The following message was received from you 
    by Quick Eats:\r\n\r\n".
    $messageToBusiness.
    "------------------------\r\n".
    "Thank you for the feedback and your patronage.\r\n".
    "The Quick Eats Team\r\n".
    "------------------------\r\n";

$headerToClient = "From: autoreply@quickeats.com\r\n";
mail($_POST['email'], "Re: Feedback",
    $messageToClient, $headerToClient);

//Transforms confirmation message to HTML 5 format for
//display in the client's browser
$display = str_replace("\r\n", "\r\n<br>", $messageToClient);
$display = "<!DOCTYPE html>
    <html lang='en'>
    <head><meta charset='utf-8'><title>Your Message</title></head>
    <body><code>$display</code></body>
    </html>";
echo $display;

//Logs the message in data/feedback.txt on the web server
//Note: directory "data" is at same level as directory "scripts"
$fileVar = fopen("../data/feedback.txt", "a")
    or die("Error: Could not open the log file.");
fwrite($fileVar,
    "\n-------------------------------------------------------\n")
    or die("Error: Could not write divider to the log file.");
fwrite($fileVar, "Date received: ".date("jS \of F, Y \a\\t H:i:s\n"))
    or die("Error: Could not write date to the log file.");
fwrite($fileVar, $messageToBusiness)
    or die("Error: Could not write message to the log file.");
?>