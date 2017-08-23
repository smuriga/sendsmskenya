<?php
//Sending Messages using sender id/short code

require_once('AfricasTalkingGateway.php');

$username   = "smurigas";
$apikey     = "6b8132dc7b4f81f97b8d9ba45d7ed9879e63c74c661263a1548edc7edfba0f8c";

$recipients = "+254727134325";

$message    = "testing kenyam sh1t....can it works?...lets find out";

// Specify your AfricasTalking shortCode or sender id
$from = "ksl";

$gateway    = new AfricasTalkingGateway($username, $apikey);

try 
{
   
   $results = $gateway->sendMessage($recipients, $message, $from);
			
  foreach($results as $result) {
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

// DONE!!! 

