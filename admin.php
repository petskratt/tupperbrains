<?php

	$login = true;
	require_once "_globals.php";

    $pageTitle = "Admin brainz";

	// use default user from array - unless we have edited it

	if ( count ( $_POST ) === 0 ) {
		$userName = $userSet[0]['userName'];
		$userEmail = $userSet[0]['userEmail'];
		$userIDhash = $userSet[0]['userIDhash'];
		$userExisting = $userSet[0]['existing'];
		$userPast = $userSet[0]['past'];
		$userEmployee = $userSet[0]['employee'];
	} else {
		$userName = $_POST['userName'];
		$userEmail = $_POST['userEmail'];
		$userIDhash = userIDhash ( $_POST['userIDhash'] );
		$userExisting = $_POST['existing'];
		$userPast = $_POST['past'];
		$userEmployee = $_POST['employee'];
	}

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
      	<p>You have visited "admin login" page and are now (and forever) being tagged as "own" - even if you use the web from home, cafe or mobile connection, e.g this is way better than IP filtering. GTM has filter that should exclude your current and future sessions from tracking in Google Analytics.</p>
      </div>
    </div>



<?php

include "_footer.php";