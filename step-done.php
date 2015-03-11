<?php
	require_once "_globals.php";
	$pageTitle = "Payment success!";

	setcookie("userLogin", implode (";", array($userName, $userEmail, $userIDhash, "yes", "yes", $userEmployee) ) );

	if ( !$employee && $mixpanelToken ) { // data sent to Mixpanel only if web user and token defined
		$mp->people->set($userIDhash, array(
		    'existing'			=> "yes",
		    'past'				=> "yes"
		));

		$mp->identify($userIDhash);
		$mp->track("Contract funnel", array("step" => "5 done"));
	}

	include "_header.php";
?>


    <div class="row">
      <div class="large-12 columns">
      	<p>This is the thank-you step of the checkout - user has returned from bank.</p>
      </div>
      <div class="large-12 columns text-center">
      	<div class="button success">Login</div>
      	<div class="button success">1. Measurement points</div>
      	<div class="button success">2. Contact</div>
      	<div class="button success">3. Sign</div>
      	<div class="button success">Done!</div>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns text-center">
      	<h2>Hip hip hooray!<br>Your brain is being harvested and will ship soon.<br>Now go hunt some geeks!</h2>
		  <a href="/" data-track-gtm="Click;Sales done;Back to homepage">Back to homepage</a>
		  <a href="/" data-track-gtm="Click;Sales done;Selfservice">Go to selfservice</a>
		  <a href="/" class="button" data-track-gtm="Click;Sales done;Claim present">Get campaign present</a>
	  </div>
	</div>

<?php

include "_footer.php";