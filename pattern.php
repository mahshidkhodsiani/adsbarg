<?php


$code=rand('1000', '9999');
$num="09130109552";

    	$client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
	$user = "arta9120469460"; 
	$pass = "43875910"; 
	$fromNum = "+983000505"; 
	$toNum = $num; 
	$pattern_code = "5d43det7mmbukgk"; 
	$input_data = array( "verification-code" => $code); 

	echo $client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data);

?>
