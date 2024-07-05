<?php
 use Infobip\Configuration;
 use Infobip\Api\SmsApi;
 use Infobip\Model\SmsDestination;           //All the important libraries from the dependancies downloaded
 use Infobip\Model\SmsTextualMessage;
 use Infobip\Model\SmsAdvancedTextualRequest;


 require __DIR__. "/vendor/autoload.php";


 $message = $_POST["message"];   //here is assigninng values to the variables
 $phonenumber = $_POST["phonenumber"];

 $apiURL ="9lpd14.api.infobip.com";//apiURLfrom Infobip
 $apiKey ="22a530116eb6dea85e11f3749f96446d-dc7c7280-445c-49af-8363-21ecda49fd07";//apiKey from infobip


 $configuration =new Configuration(host:$apiURL,apiKey: $apiKey);
 $api = new SmsApi(config: $configuration);

 $destination =new SmsDestination(to: $phonenumber); //sets the destination  of the message sent

 $theMessage = new SmsTextualMessage(
    destinations: [$destination],          //defining the structure of the message
    text: $message,
    from: "Syntax Flow"
 );

 //Send SMS Message
 $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
 $response = $api->sendSmsMessage($request);

echo 'SMS sent Successfully';//confirmation that message has been