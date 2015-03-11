<?php
	$login = false;
	$userName = "";
	setcookie("userLogin", false);
	setcookie("userName", false);
	require_once "_globals.php";
	include "_header.php";
?>


    <div class="row">
      <div class="large-12 columns">
      	<p>You have been logged OUT now!</p>
      	</raw>
      </div>
    </div>



<?php

include "_footer.php";