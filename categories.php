<?php

require_once "_globals.php";
$pageTitle = "Products page";
include "_header.php";
?>


    <div class="row">
      <div class="large-12 columns">
      	<p>This is products page where users can view products in one or more tabs.</p>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">

		<dl id="productTabs" class="tabs" data-tab data-options="deep_linking:true">
		  <dd id="organic-tab" class="active"><a href="#organic">Organic brains</a></dd>
		  <dd id="nucular-tab"><a href="#nucular">Nucular brains</a></dd>
<?php if ( $login ) {
?>		  <dd id="calculator-tab" class="right"><a href="#club">Your price</a></dd>
<?php } ?>
		</dl>
		<div class="tabs-content">
		  <div class="content active" id="organic">
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Small brain</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="<?php echo ( $login ) ? "step-1.php" : "step-login.php"; ?>" class="button ec-add-to-cart" data-product="name:Small brain;id:475;category:private;list:Organic;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Buy now!</a>
			    	<a href="#" class="ec-product-detail" data-product="name:Small brain;id:475;category:private;list:Organic;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Read more</a>
			    </div>
		    </div>
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Large brain</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="<?php echo ( $login ) ? "step-1.php" : "step-login.php"; ?>" class="button ec-add-to-cart" data-product="name:Large brain;id:489;category:private;list:Organic;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Buy now!</a>
			    	<a href="#" class="ec-product-detail" data-product="name:Large brain;id:489;category:private;list:Organic;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Read more</a>
			    </div>
		    </div>
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Large brain - only for loyalty members</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="<?php echo ( $login ) ? "step-1.php" : "step-login.php"; ?>" class="button ec-add-to-cart" data-product="name:Large brain;id:489;category:private;list:Organic;coupon:Affiliate;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Buy now!</a>
			    	<a href="#" class="ec-product-detail" data-product="name:Large brain;id:489;category:private;list:Organic;coupon:Affiliate;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Read more</a>
			    </div>
		    </div>
		  </div>
		  <div class="content" id="nucular">
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Fat Boy brain</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="<?php echo ( $login ) ? "step-1.php" : "step-login.php"; ?>" class="button ec-add-to-cart" data-product="name:Fat Boy brain;id:499;category:private;list:Nucular;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Buy now!</a>
			    	<a href="#" class="ec-product-detail" data-product="name:Fat Boy brain;id:499;category:private;list:Nucular;variant:<?php echo ( $login ) ? "login" : "public"; ?>">Read more</a>
			    </div>
		    </div>
		  </div>
<?php if ( $login ) {
?>		  <div class="content" id="club">
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Small brain</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="step-2.php" class="button ec-add-to-cart" data-product="name:Small brain;id:475;category:private;list:Personal;variant:club">Buy now!</a>
			    	<a href="#" class="ec-product-detail" data-product="name:Small brain;id:475;category:private;list:Personal;variant:club">Read more</a>
			    </div>
		    </div>
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Large brain</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="step-2.php" class="button ec-add-to-cart" data-product="name:Large brain;id:489;category:private;list:Personal;variant:club">Buy now!</a>
			    	<a href="#" class="ec-product-detail" data-product="name:Large brain;id:489;category:private;list:Personal;variant:club">Read more</a>
			    </div>
		    </div>
		    <div class="row panel">
			    <div class="small-10 columns">
			    	<h3>Large brain for Affiliate</h3>
			    </div>
			    <div class="small-2 columns">
			    	<a href="step-2.php" class="button ec-add-to-cart" data-product="name:Large brain;id:489;category:private;list:Personal;variant:club;coupon:Affiliate">Buy now!</a>
			    	<a href="#" class="ec-product-detail" data-product="name:Large brain;id:489;category:private;list:Personal;variant:club;coupon:Affiliate">Read more</a>
			    </div>
		  </div>
<?php } ?>
		</div>
	  </div>
    </div>

<?php

include "_footer.php";