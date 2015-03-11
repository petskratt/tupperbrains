// dataLayer helper for potential interaction, incl merges and gets

/* https://github.com/google/data-layer-helper (c) Google 2014 / MIT license */

(function(){var g=/\[object (Boolean|Number|String|Function|Array|Date|RegExp)\]/;function h(a){return null==a?String(a):(a=g.exec(Object.prototype.toString.call(Object(a))))?a[1].toLowerCase():"object"}function k(a,b){return Object.prototype.hasOwnProperty.call(Object(a),b)}function m(a){if(!a||"object"!=h(a)||a.nodeType||a==a.window)return!1;try{if(a.constructor&&!k(a,"constructor")&&!k(a.constructor.prototype,"isPrototypeOf"))return!1}catch(b){return!1}for(var c in a);return void 0===c||k(a,c)};function n(a,b,c){this.b=a;this.f=b||function(){};this.d=!1;this.a={};this.c=[];this.e=p(this);r(this,a,!c);var d=a.push,e=this;a.push=function(){var b=[].slice.call(arguments,0),c=d.apply(a,b);r(e,b);return c}}window.DataLayerHelper=n;n.prototype.get=function(a){var b=this.a;a=a.split(".");for(var c=0;c<a.length;c++){if(void 0===b[a[c]])return;b=b[a[c]]}return b};n.prototype.flatten=function(){this.b.splice(0,this.b.length);this.b[0]={};s(this.a,this.b[0])};
function r(a,b,c){for(a.c.push.apply(a.c,b);!1===a.d&&0<a.c.length;){b=a.c.shift();if("array"==h(b))a:{var d=b,e=a.a;if("string"==h(d[0])){for(var f=d[0].split("."),u=f.pop(),d=d.slice(1),l=0;l<f.length;l++){if(void 0===e[f[l]])break a;e=e[f[l]]}try{e[u].apply(e,d)}catch(v){}}}else if("function"==typeof b)try{b.call(a.e)}catch(w){}else if(m(b))for(var q in b)s(t(q,b[q]),a.a);else continue;c||(a.d=!0,a.f(a.a,b),a.d=!1)}}
function p(a){return{set:function(b,c){s(t(b,c),a.a)},get:function(b){return a.get(b)}}}function t(a,b){for(var c={},d=c,e=a.split("."),f=0;f<e.length-1;f++)d=d[e[f]]={};d[e[e.length-1]]=b;return c}function s(a,b){for(var c in a)if(k(a,c)){var d=a[c];"array"==h(d)?("array"==h(b[c])||(b[c]=[]),s(d,b[c])):m(d)?(m(b[c])||(b[c]={}),s(d,b[c])):b[c]=d}};})();

var helper = new DataLayerHelper(dataLayer);

// foundation init & callbacks (NB! based on Foundation 5)

$(document).foundation({
    tab: {
      callback : function (tab) {
		  tabProductImpressions(tab); // if tab is clicked or activated wiht # send event of product impressions
      }
    }
  });

$(document).ready(function() {

	// functions for boilerplate

	$('#dataLayerDump').html(JSON.stringify(dataLayer));
    $("#refreshDataLayer").on("click", function (event) {
	    event.preventDefault();
	    $('#dataLayerDump').html(JSON.stringify(dataLayer));
    });

});



$(document).ready(function() {

	// actual functionality for website

    $(".ec-add-to-cart").on("click", function (event) {
		// event.preventDefault(); // just for boilerplate !!!
		var dataEvent = { 'event': 'addToCart',   'ecommerce': { 'currencyCode': 'EUR', 'add': {  } } };
		dataEvent['ecommerce']['add']['products'] = [getOptionObject ( $(this).data('product') ) ];
		dataLayer.push(dataEvent);
    });

    $(".ec-product-detail").on("click", function (event) {
		event.preventDefault(); // just for boilerplate, in real life should open details panel !!!
		var dataEvent = { 'event': 'productDetail',   'ecommerce': { 'currencyCode': 'EUR', 'detail': {  } } };
		dataEvent['ecommerce']['detail']['products'] = [getOptionObject ( $(this).data('product') ) ];
		dataLayer.push(dataEvent);
    });

    $(".ec-product-click").on("click", function (event) {
		var dataEvent = { 'event': 'productClick',   'ecommerce': { 'currencyCode': 'EUR', 'click': { 'actionField': { 'list': 'Fixed', 'products': [] } } } };
		dataEvent['ecommerce']['click']['actionfield']['products'].push ([getOptionObject ( $(this).data('product') ) ]);
		dataLayer.push(dataEvent);
    });

	if ( !window.location.hash ) {
		var productsTab = $("#productTabs dd.active");
		if ( productsTab.length ) {
			tabProductImpressions(productsTab);
		}
	}

});


function tabProductImpressions ( tab ) {
  	// ensure only one tabview is counted during pageview
	if ( typeof helper.get(tab[0].id) == 'undefined' ) {

		// find products on tab
		var dataEvent = { 'event': 'productList',   'ecommerce': { 'currencyCode': 'EUR', 'impressions': [] } },
			tabButtons = $( '#' + tab[0].id.split('-').slice(0,1) +' .add-to-cart'),
			i, item;
		dataEvent[tab[0].id] = true;
		for (i = 0; i < tabButtons.length; ++i) {
		    item = getOptionObject ( $(tabButtons[i]).data('product') );
		    item['list'] = tab[0].id;
		    dataEvent['ecommerce']['impressions'].push (item);
		}

		dataLayer.push(dataEvent);
	} // if first time event
}

function getOptionObject ( optionString ) {

	var opts_array = optionString.split(';'), opts_params, i, productObject = {};
	i = opts_array.length;

    while (i--) {
      opts_params = opts_array[i].split(':');
      if (opts_params.length === 2) {
          productObject[opts_params[0]] = opts_params[1];
      }
    }

	return productObject;

}