<?php
// turn off the WSDL cache
ini_set("soap.wsdl_cache_enabled", "0");
try {
	$client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
	$user = "";
    $pass = "";
    $fromNum = "";
    $toNum = array("9122000000","9210000000");
    $messageContent = '';
	$op  = "send";
	//If you want to send in the future  ==> $time = '2016-07-30' //$time = '2016-07-30 12:50:50'
	
	$time = '';
	
	echo $client->SendSMS($fromNum,$toNum,$messageContent,$user,$pass,$time,$op);
	echo $status;
} catch (SoapFault $ex) {
    echo $ex->faultstring;
}
?>