<?php
//include index.php
//include('index.php');
include('functions.php');


/*//Setting constants for API credentials
const CLIENT_ID = 'GATEW0000103';
const CLIENT_SECRET = '57EDFB8B985A490B982FDCD4792D19A3';


$url = "https://authentication.vinsolutions.com/connect/token";

//Initiating Access Token 
$ch = curl_init();
$data = array(
    'client_id' =>CLIENT_ID,
    'client_secret' => CLIENT_SECRET,
    'grant_type' => 'client_credentials',
    'scope' => 'PublicAPI'
);

$options = array(
    
    'Host:' => 'authentication.vinsolutions.com',
    'Content-type:' =>"application/x-www-form-urlencoded"
    );

curl_setopt($ch, CURLOPT_URL, "https://authentication.vinsolutions.com/connect/token");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $options);

curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=".CLIENT_ID."&client_secret=57EDFB8B985A490B982FDCD4792D19A3&scope=PublicAPI");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($ch);
$response = json_decode($result, true);
$response1 = $response['access_token'];


$bearerToken = $response1;
//Testing Response
    //echo $bearerToken . "<br>";

curl_close($ch);

//Printing results of API Access Token request


getInventory($bearerToken);*/
getBearerToken();






?>