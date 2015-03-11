// this document contains all datalayer elements used in refernce implementation

// when providing information for datalayer in <head> check and initilize:

window.dataLayer = window.dataLayer || [];

// visitor data

dataLayer.push({
	"visitor": {
		"visitorLoginState": "Logged out",		// session level "Logged out", "Logged in"
		"visitorUID": "",						// visitorUID - empty string or personal code (UA TOS require forgetting on logout)
												// === following are user-level, only set these after login and if have information so we can use them also during following visits:
		//	"visitorType": "Private",			// "Private", "Business", "Combined" - do not set to empty!
		//	"visitorRole": "Employee",			// "Employee" - if agent/callcenter/etc - do not set to empty!
		//	"visitorConsumptionPrivate": 123,	// yearly kWh for all PRIVATE measurment points - do not set to 0 if currently unknown!
		//	"visitorExistingCustomer": "Yes",	// "Yes", "No" (has active or activating PRIVATE contract)
		//	"visitorPastCustomer": "Yes",		// "Yes", "No" (has had PRIVATE contract)
		}
});


// === Measuring product list views
// event: if page has tabs this has to fire on tab view for particular tab (initial with hashtag and following clicks)
// pageview: if page does not have tabs e.g all products visible then it needs to be tracked as pageview

dataLayer.push({
  'ecommerce': {
    'currencyCode': 'EUR',                      // Local currency is optional.
    'impressions': [
     {
       'name': 'Heating Click',					// Name or ID is required.
       'id': '489',								// productId
       'category': 'Private',					// "Private" or "Business"
       'variant': 'Public',						// is customer show public product, special voucher code product etc?
       'list': 'Fixed prices tab',				// name of tab or page ("Personal offer", "Search results"" etc)
       'position': 1
     },
     {
       'name': 'Small Click',
       'id': '475',
       'category': 'Private',
       'variant': 'Newton voucher',
       'list': 'Fixed prices tab',
       'position': 2
     }]
  }
});


// === Measuring product detail views
// event: user clicked to open product data so we track product detail view
// pageview: if products will get separate pages then it needs to be tracked as pageview

dataLayer.push({
  'ecommerce': {
    'detail': {
      'products': [
	   {
        'name': 'Heating Click',			// Name or ID is required.
        'id': '12345',
        'category': 'Private',
       }]
     }
   }
});

// === Measuring add to carts
// event: user clicked on "Sign contract" on product detail or list view

dataLayer.push({
  'event': 'addToCart',
  'ecommerce': {
    'currencyCode': 'EUR',
    'add': {                                // 'add' actionFieldObject measures.
      'products': [{                        //  adding a product to a shopping cart.
	       'name': 'Heating Click',			// Name or ID is required.
	       'id': '489',						// productId
	       'category': 'Private',			// "Private" or "Business"
	       'coupon': 'Newton voucher',		// is customer show public product, special voucher code product etc?
	       'variant': 'public',				// was user logged in at that moment? public, login or calculator (for personalized offer)
       }]
    }
  }
});

// === Measuring contract steps
// event: when user clicks button to move to next step

// step 1 - login

function onContractLogin() {
  dataLayer.push({
    'event': 'checkout',
    'ecommerce': {
      'checkout': {
        'actionField': {'step': 1, 'option': 'ID-card'},	// option is optional, on login step shows login method
        'products': [{
	       'name': 'Heating Click',			// Name or ID is required.
	       'id': '489',						// productId
	       'category': 'Private',			// "Private" or "Business"
	       'coupon': 'Newton voucher',				// is customer show public product, special voucher code product etc?
       }]
     }
   }
   'eventCallback': function() {
      document.location = 'measurementpoints.php';	// actual action to do after ecommerce data has been sent to Google
   }
  });
}

// step 2 - select measurement points & previous

function onContractSelectMeasurementPoints() {
  dataLayer.push({
    'event': 'checkout',
    'ecommerce': {
      'checkout': {
        'actionField': {'step': 2},			// step numbers start from 2 if user has already logged in
        'products': [{
	       'name': 'Heating Click',			// Name or ID is required.
	       'id': '489',						// productId
	       'category': 'Private',			// "Private" or "Business"
	       'coupon': 'Newton voucher',				// is customer show public product, special voucher code product etc?
	       'quantity': 2					// number of measurement points selected for this contract
       }]
     }
   }
   'eventCallback': function() {
      document.location = 'contacts.php';	// actual action to do after ecommerce data has been sent to Google
   }
  });
}

// step 3 - contact address

function onContractContactAddress() {
  dataLayer.push({
    'event': 'checkout',
    'ecommerce': {
      'checkout': {
        'actionField': {'step': 3},			// step numbers start from 2 if user has already logged in
        'products': [{
	       'name': 'Heating Click',			// Name or ID is required.
	       'id': '489',						// productId
	       'category': 'Private',			// "Private" or "Business"
	       'coupon': 'Newton voucher',				// is customer show public product, special voucher code product etc?
	       'quantity': 2					// number of measurement points selected for this contract
       }]
     }
   }
   'eventCallback': function() {
      document.location = 'sign.php';	// actual action to do after ecommerce data has been sent to Google
   }
  });
}

// step 4 - sign contract

function onContractContactAddress() {
  dataLayer.push({
    'event': 'checkout',
    'ecommerce': {
      'checkout': {
        'actionField': {'step': 4},			// step numbers start from 2 if user has already logged in
        'products': [{
	       'name': 'Heating Click',			// Name or ID is required.
	       'id': '489',						// productId
	       'category': 'Private',			// "Private" or "Business"
	       'coupon': 'Newton voucher',		// is customer show public product, special voucher code product etc?
	       'quantity': 2					// number of measurement points selected for this contract
       }]
     }
   }
   'eventCallback': function() {
      document.location = 'done.php';	// actual action to do after ecommerce data has been sent to Google
   }
  });
}


// Measuring successful contract signing
// pageview or event


dataLayer.push({
  'ecommerce': {
    'purchase': {
      'actionField': {
        'id': '98765',						// required: unique Transaction ID ("new agreement" number?)
        'revenue': '35.43',					// required: total value (note it is passed as string, could be expected 1 year bill)
        'coupon': 'Newton voucher'			// optional: if voucher code was used
      },
      'products': [{						// List of productFieldObjects.
	       'name': 'Heating Click',			// Name or ID is required.
	       'id': '489',						// productId
	       'category': 'Private',			// "Private" or "Business"
	       'coupon': 'Newton voucher',		// is customer show public product, special voucher code product etc?
	       'quantity': 2					// number of measurement points selected for this contract
	   }]
    }
  }
});