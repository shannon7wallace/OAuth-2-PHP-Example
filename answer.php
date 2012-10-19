<?php

header('Content-type: text/html');

// Start the Session and create a DataStore Object for storing this user.
session_start ();
require_once "ConstantContact.php";
$Datastore = new CTCTDataStore ();

//Put your API Key, consumerSecret and RedirectURI here.
$apiKey = "";
$consumerSecret = "";
$redirectURI = "";

$code = $_REQUEST['code'];
$username = $_REQUEST['username'];

//We will use PHP cURL to make a request to Constant Contact to get the Access Token.

$rqurl = "https://oauth2.constantcontact.com/oauth2/oauth/token?grant_type=authorization_code&client_id=$apiKey&client_secret=$consumerSecret&code=$code&redirect_uri=$redirectURI";
$rq = curl_init();

curl_setopt($rq, CURLOPT_URL, $rqurl);
curl_setopt($rq, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($rq, CURLOPT_BINARYTRANSFER, 1);
curl_setopt($rq, CURLOPT_HEADER, 0);
curl_setopt($rq, CURLOPT_SSL_VERIFYPEER, 0);

if (!$result = curl_exec($rq)) {
	//If there is an error, dump it so we can see it.
	echo curl_error($rq);
} else {
	echo "<pre>Access Token Information:\n";
	print_r($result);
	$obj = json_decode($result); // The Result of this request is returned as JSON, so we need to parse it.
	//Create the User Ojbect.
	$user['username'] = $username;
	$user['access_token'] = $obj->access_token;
	//Use the DataStore to store the User in the PHP Session.
	$Datastore->addUser($user);
	//Create a link back to index.php where we can now use the Session Data.
	echo "\n<a href='redirect_uri'>Click Here to Continue</a></pre>"; //Replace redirect_uri with your index.php full URL.
}

curl_close($rq);

?>