<?php

$apiKey = "e6ebed29-a73a-4af7-9344-bea87e897a30";
$consumerSecret = "0a4852eccf754a06924d3d3a3239c9cf";
$redirectURI = "http://localhost:8080/Oauth2/answer.php";

$code = $_REQUEST['code'];
$token = $_REQUEST['access_token'];

echo "<br><br><a href='https://oauth2.constantcontact.com/oauth2/oauth/token?grant_type=authorization_code&client_id=$apiKey&client_secret=$consumerSecret&code=$code&
redirect_uri=$redirectURI'>Click Here!</a>";

if ($_REQUEST['code'] != null)
{
	echo "<br><br><br><p>Click the link below if you have already generated an access token and added it to your files.</p><br>";
	echo "<a href='https://api.constantcontact.com/v2/contact/?access_token=$token'>Contact</a>";
}

?>