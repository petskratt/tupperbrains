<?php
	require_once "_globals.php";
	$pageTitle = "Shipping details step";

	if ( !$employee && $mixpanelToken ) { // data sent to Mixpanel only if web user and token defined
		$mp->identify($userIDhash);
		$mp->track("Contract funnel", array("step" => "2 delivery"));
	}
	include "_header.php";
?>


    <div class="row">
      <div class="large-12 columns">
      	<p>This is the first step of checkout - enter contact details.</p>
      </div>
      <div class="large-12 columns text-center">
      	<div class="button success">Login</div>
      	<div class="button">1. Contact details</div>
      	<div class="button secondary">2. Payment method</div>
      	<div class="button secondary">3. Confirm & pay</div>
      	<div class="button secondary">Done!</div>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns text-center">
      	<h2>Please enter shipping / contact details and click Continue</h2>
		  <form action="step-2.php" id="createContractForm" class="contract-form custom" method="post">
		  	<input type="hidden" name="step" value="step_2" class="step">
		  	<button type="submit" name="step" value="step_2" id="confirmSelectedObjects" class="saveStep button btn-big">Continue</button>
		  </form>
	  </div>
	</div>

<?php

include "_footer.php";