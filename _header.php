<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/app.css" />
    <script src="bower_components/modernizr/modernizr.js"></script>
    <script>
    	window.dataLayer = window.dataLayer || [];
<?php
    if ($useGTM) {
	// === user tracking

	if ( $login ) {
?>		dataLayer.push({ "visitor" : {
			"visitorLoginState": "Logged in",		// session level "Logged out", "Logged in"
			"visitorUID": "<?php echo $userIDhash; ?>",	// visitorUID - empty string or hash of personal code (UA TOS require forgetting on logout)
													// === following are user-level, only set these after login so we can use them also during following visits:
			"visitorType": "Private",				// "Private", "Business"
			"visitorEmployee": "<?php echo $userEmployee; ?>",			// "Employee" - if "own" user, must set filtering
			"visitorExistingCustomer": "<?php echo $userExisting; ?>",	// "Yes", "No" (has purchased during past X time)
			"visitorPastCustomer": "<?php echo $userPast; ?>",			// "Yes", "No" (has ever purchased)
		} });
<?php
	} else {
?>		dataLayer.push({ "visitor" : {
			"visitorLoginState": "Logged out",		// session level "Logged out", "Logged in"
			"visitorUID": "",						// visitorUID - empty string or personal code (UA TOS require forgetting on logout)
		} });
<?php
	}

	// === product impressions tracking on page
	// here should go product list or detail view code IF shown on separate page
	// if products are shown as tabs OR list is updated via AJAX event should be used

	if ( $currentPage == "category.php" ) {
?>
		dataLayer.push({
		  'ecommerce': {
		    'currencyCode': 'EUR',                      // Local currency is optional.
		    'impressions': [
		     {
		       'name': 'Small Brain',					// Name or ID is required.
		       'id': '475',								// productId
		       'category': 'Private',					// "Private" or "Business"
		       'variant': 'Public',						// is this public or logged-in customer personal offer?
		       'list': 'Organic brains',				// name of tab or page ("Some category", "Search results"" etc)
		       'position': 1
		     },
		     {
		       'name': 'Large brain',
		       'id': '489',
		       'category': 'Private',
   		       'variant': 'Public',						// is this public or logged-in customer personal offer?
		       'coupon': 'Affiliate voucher',			// presume that user has entered voucher code
		       'list': 'Organic brains',
		       'position': 2
		     }]
		  }
		});
<?php
	}

	if ( $currentPage == "productlargebrain.php" ) {
?>
		dataLayer.push({
		  'ecommerce': {
		    'detail': {
		      'products': [
			   {
		        'name': 'Large brain',			// Name or ID is required.
		        'id': '12345',
		        'category': 'Private',
		       }]
		     }
		   }
		});
<?php
	}

	// === checkout login step

	if ( $currentPage == "step-login.php" ) {
?>
		dataLayer.push({
		  'ecommerce': {
		    'checkout': {
		      'actionField': {'step': 1 },
		      'products': [{						// List of productFieldObjects.
			       'name': 'Large brain',			// Name or ID is required.
			       'id': '489',						// productId
			       'category': 'Private',			// "Private" or "Business"
			       'coupon': 'Affiliate voucher',	// if coupon code has been used for product
			   }]
		    }
		  }
		});
<?php
	}

	// === checkout first step - shipping details

	if ( $currentPage == "step-1.php" ) {
?>
		dataLayer.push({
		  'ecommerce': {
		    'checkout': {
		      'actionField': {'step': 2 },
		      'products': [{						// List of productFieldObjects.
			       'name': 'Large brain',			// Name or ID is required.
			       'id': '489',						// productId
			       'category': 'Private',			// "Private" or "Business"
			       'coupon': 'Affiliate voucher',	// if coupon code has been used for product
			   }]
		    }
		  }
		});
<?php
	}

	// === checkout second step - payment selection

	if ( $currentPage == "step-2.php" ) {
?>
		dataLayer.push({
		  'ecommerce': {
		    'checkout': {
		      'actionField': {'step': 3 },
		      'products': [{						// List of productFieldObjects.
			       'name': 'Large brain',			// Name or ID is required.
			       'id': '489',						// productId
			       'category': 'Private',			// "Private" or "Business"
			       'coupon': 'Affiliate voucher',	// if coupon code has been used for product
			       'quantity': 2					// number of measurement points selected for this contract
			   }]
		    }
		  }
		});
<?php
	}

	// === checkout third step - confirm order

	if ( $currentPage == "step-3.php" ) {
?>
		dataLayer.push({
		  'ecommerce': {
		    'checkout': {
		      'actionField': {'step': 4 },
		      'products': [{						// List of productFieldObjects.
			       'name': 'Large brain',			// Name or ID is required.
			       'id': '489',						// productId
			       'category': 'Private',			// "Private" or "Business"
			       'coupon': 'Affiliate voucher',	// if coupon code has been used for product
			       'quantity': 2					// number of measurement points selected for this contract
			   }]
		    }
		  }
		});
<?php
	}

	// === purchase success e.g last step of funnel

	if ( $currentPage == "step-done.php" ) {
?>
		dataLayer.push({
		  'ecommerce': {
		    'purchase': {
		      'actionField': {
		        'id': '<?php echo rand(10000, 99999); ?>',						// required: unique Transaction ID (order number)
		        'revenue': '35.43',					// required: total value
		        'coupon': 'Affiliate voucher'		// optional: if voucher code was used for purchase
		      },
		      'products': [{						// List of productFieldObjects.
			       'name': 'Large brain',			// Name or ID is required.
			       'id': '489',						// productId
			       'category': 'Private',			// "Private" or "Business"
			       'coupon': 'Affiliate voucher',	// if coupon code has been used for product
			       'quantity': 2					// number of products ordered
			   }]
		    }
		  }
		});
<?php
	}
    }
?>
    </script>
<?php
    if (!$useGTM) {
    	echo $GAcode;
    }
?>

  </head>
  <body class="<?php echo $currentPage; ?>">
<?php
    if ($useGTM) {
        echo $GTMcode;
	}
	include "_topbar.php";
?>
    <div class="row">
      <div class="large-12 columns">
        <h1><?php echo $pageTitle; ?></h1>
      </div>
    </div>