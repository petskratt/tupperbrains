<?php

	if ( !isset($pages) ) {
		$pages = array ("#" => "Pages array missing!");
	}

?><nav class="top-bar nav-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#">Tupperbrains</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="left">
      <li <?php if ($currentPage = "index.php" ) echo "class=\"active\""; ?>><a href="/" title="<?php echo time();?>">Home, sweet home</a></li>
    </ul>

    <!-- Left Nav Section -->
    <ul class="right">
<?php



	// <li><a href="#">Left Nav Button</a></li>
	foreach ( $pages as $pageFile => $pageName ) {
		if ( $pageFile === $currentPage ) {
			$thisClass = "class=\"active\"";
		} else {
			$thisClass = "";
		}

		echo "      <li $thisClass><a href=\"$pageFile\">$pageName</a></li>";
	}

	if ( $login ) {
?>	<li class="has-form">
        <a href="logout.php" class="button"><?php echo $userName; ?> | Sign out</a>
      </li>
<?php
	} else {
?>	<li class="has-form">
        <a href="login.php" class="button">Sign in</a>
      </li>
<?php
	}


?>
    </ul>
  </section>
</nav>