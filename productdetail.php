<?php

require_once "_globals.php";
$pageTitle = "Products page: Large brains";
include "_header.php";
?>


    <div class="row">
      <div class="large-12 columns">
      	<p>This is single product page</p>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Large brain</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="<?php echo ( $login ) ? "step-1.php" : "step-login.php"; ?>" class="button ec-add-to-cart" data-product="name:Large brain;id:489;category:private;coupon:Affiliate;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Buy now!</a>
			    </div>
		    </div>

	</div>
	</div>

<?php

include "_footer.php";