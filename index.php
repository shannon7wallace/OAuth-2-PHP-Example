<?php

session_start ();
require_once 'ConstantContact.php';
require_once 'config.php';
$search = false;
$action = false;
	
// Is there an active session with a username attached? If so we will allow them to search their contacts for an email address.
if ($DatastoreUser) {
?>
<html>
<body>
<?php
		$ConstantContact = new ConstantContact ( "oauth2", $apikey, $username, $accessToken );
		// This is to see if a post was made
		if($_POST)
		{
			if ($_POST["action"]) $action = true;
			if ($_POST["action"] == "logout") {
				//If the user clicks on the Log Out button then we will end the session.
				session_destroy();
				die("Logged Out, <a href='index.php'>Click Here</a> to continue.");
			} else {
				//Otherwise search the email address associated with this action.
				$search = $ConstantContact->searchContactsByEmail($_POST["searchEmailAddress"]);
			}
		}	
?>

	<!-- this form searches for a contact by their email address -->
	<H1>Search for a contact</H1>
	<form action="index.php" method="post">
		<input type="hidden" name="action" value="search" />
		<input type="text" name="searchEmailAddress" maxlength="50">
		<input type="submit" name="submit" value="Submit" />
	</form>
	<!-- The HTML code from here to the end is Preformatted so that the information returned by the API is readable.-->
	<pre>
	
<?php

// Check to make sure that we have a search result. Is $search == false then we did not find any contacts.
	if($search != false)
	{
		if ($_POST["action"] == "delete") {
			// If the user clicked on the Unsubscribe Contact button then we will want to unsubscribe them.
			$ConstantContact->DeleteContact($search[0]);
		} else {
			// the only action left is a basic search, so we will get the Contact details and display them.
			//First we will get the Contact Details from the Wrapper.
			$details = $ConstantContact->getContactDetails($search[0]);
			//Then we will let the user know that a contact exists with that email address
			echo $details->emailAddress . " Exists";
?>

<!-- Create a button allowing the user to unsubscribe the contact. This button is functional. DO NOT use it unless you have access to the email address being unsubscribed. -->
<form action="index.php" method="post">
<input type="hidden" name="action" value="delete" />
<input type="hidden" name="searchEmailAddress" value="<?php echo $details->emailAddress; ?>" />
<input type="submit" name="submit" value="Unsubscribe Contact" />
</form>

<?php
			//then we print the Contact Details
			echo print_r($details,1);
		}
	} else if($action == true) {
		//no contact was found, so we will notify the user.
		echo "No Contacts found with that email address.";
	}
?>

<!-- This form adds a log out button which triggers this page to end the PHP session -->
<form action="index.php" method="post">
<input type="hidden" name="action" value="logout" />
<input type="submit" name="submit" value="Log Out" />
</form>
</pre>
</body>
</html>

<?php 
} else {
?>

<!-- If there is no active session we will create a simple link to allow the user to log in and grant access to their account. -->
<html>
<body>
	<h1>oAuth2</h1>
	<h3>You need to authenticate in order to continue.</h3>
	
<?php

// you must encode your redirect URL and the link contains the variables from config.php
	$theRequest = urlencode ( $verificationURL );
	echo "<a href='https://oauth2.constantcontact.com/oauth2/oauth/siteowner/authorize?response_type=code&client_id=" 
		. $apikey . "&redirect_uri=" 
		. $theRequest 
		. "'>Click here to Authenticate</a>";
}
?>

</body>
</html>