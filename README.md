OAuth-2-PHP-Example
===================

This is a simple example of how to implement OAuth 2.  You can simply install the files in a folder on your server, navigate to the folder, and follow the steps to authenticate using OAuth 2.  At the end, you will want to store the access token that in generated inside the config.php file that you use for your application, or store it in a database. You will "Authorize", login, "Grant Access", and "Click here", and finally get to a page that shows your access token, which never expires.

Extended Instructions:

How To Use These FIles to Authenticate Using OAuth 2

1.  Go to http://community.constantcontact.com/t5/Documentation/API-Keys/ba-p/25015 and generate an API Key if you haven't already.  Go to that link even if you've already created your API Key, and take note of your API Key, Consumer secret, and Redirect URI.  Make sure your redirect URI is a page that you can access in your website.
2.  Go into the config.php file and set the values for $apikey, $consumersecret, $verificationURL, and $returnURL.
3.  Go into the answer.php file and add the values for $apiKey and $redirectURI.
3.  Navigate to the file on your server (in your web browser) that contains the OAuth 2 files.  Click on the link that says "Authorize here".
4.  Provide your Constant Contact credentials on the login screen.
5.  Grant access.
6.  "Click here"
7.  The last page should tell you what your access token is.  From here on out, you can just append that value to the URI that you want to make a call to.  The access token never expires.
8.  If you have any issues, you can reach out to us at webservices@constantcontact.com