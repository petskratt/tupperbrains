<?php

// just in case we forget on some page...

$pageTitle = "GTM enhanced eCommerce analytics boilerplate";
$currentPage = basename($_SERVER["PHP_SELF"]);

// predefined users

$emailBaseAccount = "peeter.marvet";
$emailBaseDomain = "gmail.com";

$userSet = array(
	0 => array('userName' => 'Nevil Never', 'userEmail' => "{$emailBaseAccount}+never@{$emailBaseDomain}", 'userIDhash' => userIDhash( "37001010000" ), 'existing' => 'no', 'past' => 'no', 'employee' => 'no' ),
	1 => array('userName' => 'Wanda Wasclient', 'userEmail' => "{$emailBaseAccount}+wasclient@{$emailBaseDomain}", 'userIDhash' => userIDhash( "48001010000" ), 'existing' => 'no', 'past' => 'yes', 'employee' => 'no'  ),
	2 => array('userName' => 'Carl Current', 'userEmail' => "{$emailBaseAccount}+current@{$emailBaseDomain}", 'userIDhash' => userIDhash( "39001010000" ), 'existing' => 'yes', 'past' => 'yes', 'employee' => 'no'  ),
	3 => array('userName' => 'Emily Employee', 'userEmail' => "{$emailBaseAccount}+employee@{$emailBaseDomain}", 'userIDhash' => userIDhash( "46001010000" ), 'existing' => 'yes', 'past' => 'yes', 'employee' => 'yes'  ),
);


// boilerplate loads user data from cookie - unless it has been pre-set by login page

if ( isset ( $_COOKIE["userLogin"] ) && !isset ($login) ) {
	$login = true;
	$userData = explode (";", $_COOKIE["userLogin"]);
	$userName = $userData[0];
	$userEmail = $userData[1];
	$userIDhash = $userData[2];
	$userExisting = $userData[3];
	$userPast = $userData[4];
	$userEmployee = $userData[5];
} else {
	if ( !isset ($login) )	$login = false;
}

// pages for top menu

$pages = array (
    "categories.php" => "Brains",
    "category.php" => "Zombies",
    "aboutpage.php" => "About us",
    "promopage.php" => "GiveUsSomeMonies",

);


// this is included in all pages, right after opening <body>

// switch to toggle GA / GTM
$useGTM = true;

// $GTMid = "GTM-TSCKJP"; // test container in legacy GTM
$GTMid = "GTM-KNK336"; // test container in new GTM - simple version
// $GTMid = "GTM-5GKLVR"; // test container in new GTM - LIVE LIVE LIVE

$GTMcode = "<!-- Google Tag Manager -->
<noscript><iframe src=\"//www.googletagmanager.com/ns.html?id={$GTMid}\"
height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{$GTMid}');</script>
<!-- End Google Tag Manager -->
";

$GAid = "UA-60134300-1";
$GAcode = "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '{$GAid}', 'auto');
  ga('send', 'pageview');

</script>";




// Mixpanel library setup

require 'vendor/autoload.php';
$mixpanelToken = "3eaa939a3e82f6e3be4b36c9f1604a8d";
$mp = Mixpanel::getInstance($mixpanelToken);
$employee = false;

// functions that are re-used

function userIDhash ( $userID = "37001010000") {
	$salt = 'Q7+b!3A>oq+W++aEg2g~]E`0Ki|<L1|$TQ+%-N+yw]esX$r-<tEGBY&?lKY?0vCD';
	return substr(hash('sha256', $salt . $userID), 0, 10);
}
