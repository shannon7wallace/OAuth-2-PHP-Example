OAuth-2-PHP-Example
===================

This is a simple example of how to implement OAuth 2.  You can simply install the files in a folder on your server, navigate to the folder, and follow the steps to authenticate using OAuth 2.  At the end, you will want to store the access token that in generated inside the config.php file that you use for your application, or store it in a database. You will "Authorize", login, "Grant Access", and "Click here", and finally get to a page that shows your access token, which never expires.

Extended Instructions:

How To Use These FIles to Authenticate Using OAuth 2

1.  Download the files here and host them on your server.
2.  Go to http://community.constantcontact.com/t5/Documentation/API-Keys/ba-p/25015 and generate an API Key if you haven't already. Go to that link even if you've already created your API Key, and take note of your API Key, Consumer secret, and Redirect URI. Make sure your redirect URI is a page that you can access in your website. This redirect URI will ultimately need to be the answer.php file hosted on your server.
3.	Go into the config.php file and set the values for $apikey, $consumersecret, $verificationURL, and $returnURL.
4.	Go into the answer.php file and add the values for $apiKey, $consumerSecret and $redirectURI. If in doubt, use the same URL for redirectURI, returnURL, and verificationURL. This should be the full URL of your answer.php file.
5.	Navigate to the index.php file on your server (in your web browser) that contains the OAuth 2 files. Click on the link that says “Click here to Authenticate.”
6.	Provide your Constant Contact credentials on the login screen.
7.	Grant access.
8.	You will be shown your access token and also you will be able to click on “Click Here to Continue” (but it won't work until you do the steps below).
9.  To continue, save the value for the access token and your username in lines 31 and 32 of config.php (and uncomment those lines).  Also set the full URL of index.php for "redirect_uri" on line 42 of answer.php.
10.	If you go back to answer.php and click to continue you will be able to use an example tool for searching contact email addresses which makes use of the access token you generated.
11.	If you have any issues, you can reach out to us at webservices@constantcontact.com.