    <?php
    // Be sure to include our gateway class
    require_once('AfricasTalkingGateway.php');
    // Specify your login credentials
    $username   = "smurigas";
    $apikey     = "6b8132dc7b4f81f97b8d9ba45d7ed9879e63c74c661263a1548edc7edfba0f8c";
    // NOTE: If connecting to the sandbox, please use your sandbox login credentials    
    // Specify your Africa's Talking phone number in international format
    $from = "+254727134325";
    // Specify the numbers that you want to call to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)
    $to   = "+254727134325";
    // Create a new instance of our awesome gateway class
    $gateway = new AfricasTalkingGateway($username, $apikey);
    // NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
    /*************************************************************************************
                ****SANDBOX****
    $gateway    = new AfricasTalkingGateway($username, $apiKey, "sandbox");
    **************************************************************************************/
    // Any gateway errors will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    {
      // Make the call
      $results = $gateway->call($from, $to);
      //This will loop through all the numbers you requested to be called
      foreach($results as $result) {
        //Only status "Queued" means the call was successfully placed
        echo $result->status;
        echo $result->phoneNumber;
        echo "<br/>";
      }
            
    }
    catch ( AfricasTalkingGatewayException $e )
    {
      echo "Encountered an error while making the call: ".$e->getMessage();
    }
    // DONE!!! 