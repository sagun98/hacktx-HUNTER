<?php

require_once 'vendor/autoload.php'; 
use Twilio\Rest\Client;

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACc003825788da58313814ccc9216d6599";
$token = "2371bb7b87ac9c0c5e457302b9effcdc";
$client = new Client($sid, $token);

// Loop over the list of messages and echo a property for each one
foreach ($client->messages->read() as $message) {
    echo "Sender:".$message->from;
    echo "<br>";
    echo "Receiver:".$message->to;
    echo "<br>";
    echo "SID: ".$message->sid;
    echo "<br>";
    echo $message->body;
    echo "<br>";
    echo $message->time;
    echo "<br>";
    echo "<br>";
    }
?>