<?php
$ch = curl_init();
$clientId = "Abe8HRAujOeqpN42VBKZ9E1NzV8WbnGxOUOFurN9DD83RtZb0Gs89j4KKjTW";
$secret = "EMlKKhBn8WTAmfMF7MXMJXordA8r463byinv4o2-Z4ANZsTtkfqJeunfEZBy";

curl_setopt($ch,CURLOPT_URL,"https://api.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($ch,CURLOPT_HEADER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERPWD,$clientId.":".$secret);
curl_setopt($ch,CURLOPT_POSTFIELDS,"grant_type=client_credentials");

$result = curl_exec($ch);

if(empty($result))die("Error: No response.");
else
{
	$json = json_decode($result);
	print_r($json->access_token);
}

curl_close($ch);

?>
