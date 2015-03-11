<?php
	require_once "_globals.php";
	$pageTitle = "Customer login / registration step";

	// fake login process
	$userName = $userSet[0]['userName'];
	$userEmail = $userSet[0]['userEmail'];
	$userIDhash = $userSet[0]['userIDhash'];
	$userExisting = $userSet[0]['existing'];
	$userPast = $userSet[0]['past'];
	$userEmployee = $userSet[0]['employee'];

	setcookie("userLogin", implode (";", array($userName, $userEmail, $userIDhash, $userExisting, $userPast, $userEmployee) ) );

	if ( !$employee && $mixpanelToken ) { // data sent to Mixpanel only if web user and token defined
		$nameSplit = explode (" ", $userName);
		$mp->people->set($userIDhash, array(
		    '$first_name'       => $nameSplit[0],
		    '$last_name'        => $nameSplit[1],
		    '$email'            => $userEmail,
		    'existing'			=> $userExisting,
		    'past'				=> $userPast
		));
	}

	include "_header.php";
?>


    <div class="row">
      <div class="large-12 columns">
      	<p>This is the cutomer login or signup step.</p>
      </div>
      <div class="large-12 columns text-center">
      	<div class="button">Login</div>
      	<div class="button secondary">1. Contact details</div>
      	<div class="button secondary">2. Payment method</div>
      	<div class="button secondary">3. Confirm & pay</div>
      	<div class="button secondary">Done!</div>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns text-center">
      	  <h2>You have selected this fine brain. Please log in, create user or proceed as anon</h2>
      	  <a href="step-1.php" class="button" data-track-gtm="Click;Login;Email">Log in</a>
      	  <a href="step-1.php" class="button" data-track-gtm="Click;Login;Twitter">Login with Twitter</a>
      	  <a href="step-1.php" class="button" data-track-gtm="Click;Login;Register">Register</a>
      	  <a href="step-1.php" class="button" data-track-gtm="Click;Login;Anon">Proceed as anon</a>
	  </div>
	</div>

<?php

include "_footer.php";