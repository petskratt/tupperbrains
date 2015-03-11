<?php

require_once "_globals.php";
$pageTitle = "Categories list page";
include "_header.php";
?>


    <div class="row">
      <div class="large-12 columns">
      	<p>This is products page WITHOUT tabs</p>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Small brain</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="<?php echo ( $login ) ? "step-1.php" : "step-login.php"; ?>" class="button ec-add-to-cart" data-product="name:Small brain;id:475;category:private;list:Fixed;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Buy now!</a>
			    	<a href="productsheatingclickdetail.php" class="ec-product-click" data-product="name:Small brain;id:475;category:private;list:Fixed;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Read more</a>
			    </div>
		    </div>
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Large brain - only for loyalty members</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="<?php echo ( $login ) ? "step-1.php" : "step-login.php"; ?>" class="button ec-add-to-cart" data-product="name:Large brain;id:489;category:private;list:Fixed;coupon:Affiliate;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Buy now!</a>
			    	<a href="productsheatingclickdetail.php" class="ec-product-click" data-product="name:Large brain;id:489;category:private;list:Fixed;coupon:Affiliate;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Read more</a>
			    </div>
		    </div>

	</div>
	</div>

<?php

include "_footer.php";