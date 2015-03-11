<?php

require_once "_globals.php";
$pageTitle = "Tupperbrains - grey matter that matters";
include "_header.php";
?>


    <div class="row">
      <div class="small-12 columns">
      	<p>This is frontpage where user can interact with top slider, category selector and detail descriptions content.</p>
      </div>
    </div>
<!--

    <div class="row">
      <div class="small-12 columns panel slider" data-track-gtm="Frontpage extravaganza">
      	<h2>This simulates top slider.<br>It has 3 conflicting cta-s fighting for your attention:</h2>
      	<ul>
	      	<li><a href="promopage.php">Click me! I'll take you to the <strong>promo page</strong>!</a></li>
	      	<li><a href="#someAnchor" id="anchorlink" class="inpage">Click me! There is more <strong>content below folding</strong> that needs reading!</a></li>
	      	<li><a href="http://tehnokratt.net">External link</a> (we are afraid you won't like our goods, but we have another great business, maybe you likes this better?)</li>
      	</ul>
      </div>
    </div>
-->

    <div class="row">
      <div class="small-12 columns panel" data-track-gtm="Frontpage promo">
      	<h2>This simulates top slider.<br>It has 3 conflicting cta-s fighting for your attention:</h2>
      	<ul>
	      	<li><a href="promopage.php" onclick="ga('send', 'event', 'OnClick', 'promopage');">Click me! I'll take you to the <strong>promo page</strong>!</a></li>
	      	<li><a href="#someAnchor" onclick="ga('send', 'event', 'OnClick', 'belowfold');">Click me! There is more <strong>content below folding</strong> that needs reading!</a></li>
	      	<li><a href="http://tehnokratt.net" onclick="ga('send', 'event', 'OnClick', 'external', 'tehnokratt');">External link</a> (we are afraid you won't like our goods, but we have another great business, maybe you likes this better?)</li>
      	</ul>
      </div>
    </div>



    <div class="row">
      <div class="small-12 large-6 columns panel">
        <div class="row">
            <div class="small-4 columns">
                <img src="https://placekitten.com/g/310/310">
            </div>
            <div class="small-8 columns">
              	<h2>Organic brains</h2>
              	<p>Presentation of one product category. If you click on button we should register it.</p>
        	  	<a href="category.php#organic" class="button">Pick your brain!</a>
    	  	</div>
	  	</div>
      </div>
      <div class="small-12 large-6 columns panel">
        <div class="row">
            <div class="small-4 columns">
                <img src="https://placekitten.com/g/300/300">
            </div>
            <div class="small-8 columns">
              	<h2>Nucular brains</h2>
              	<p>Presentation of another product category. Click on button, we register it.</p>
        	  	<a href="category.php#nucular" class="button">Look inside a brain!</a>
            </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns panel">
        <div class="row">
            <div class="small-4 columns">
                <img src="https://placekitten.com/g/600/400">
            </div>
            <div class="small-8 columns">
              	<h2>This is some Detail description</h2>
              	<p>We just use it to push next panel below fold. And cat picture to distract you.</p>
        	    <p><a href="promopage.php">Read more!</a></p>
            </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns panel">
        <div class="row">
            <div class="small-8 columns">
              	<h2>This is some Detail description</h2>
              	<p>We just use it to push next panel below fold. And cat picture to distract you.</p>
        	    <p><a href="promopage.php">Read more!</a></p>
            </div>
            <div class="small-4 columns">
                <img src="https://placekitten.com/g/630/430">
            </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns panel">
        <div class="row">
            <div class="small-4 columns">
                <img src="https://placekitten.com/g/620/420">
            </div>
            <div class="small-8 columns">
              	<h2>This is some Detail description</h2>
              	<p>We just use it to push next panel below fold. And cat picture to distract you.</p>
        	    <p><a href="promopage.php">Read more!</a></p>
            </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns panel callout">
        <div class="row">
            <div class="small-8 columns">
              	<h2><a name="someAnchor"></a>Detail description linked from top</h2>
              	<p>We just use it to push next panel below fold. And cat picture to distract you.</p>
        	    <p><a href="promopage.php">Read more!</a></p>
        	    <p><a href="promopage.php" class="button alert">Buy now!</a></p>
            </div>
            <div class="small-4 columns">
                <img src="https://placekitten.com/g/630/430">
            </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns panel">
        <div class="row">
            <div class="small-4 columns">
                <img src="https://placekitten.com/g/624/424">
            </div>
            <div class="small-8 columns">
              	<h2>This is some Detail description</h2>
              	<p>We just use it to push next panel below fold. And cat picture to distract you.</p>
        	    <p><a href="promopage.php">Read more!</a></p>
            </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns panel">
        <div class="row">
            <div class="small-8 columns">
              	<h2>This is some Detail description</h2>
              	<p>We just use it to push next panel below fold. And cat picture to distract you.</p>
        	    <p><a href="promopage.php">Read more!</a></p>
            </div>
            <div class="small-4 columns">
                <img src="https://placekitten.com/g/635/435">
            </div>
        </div>
      </div>
    </div>

<?php

include "_footer.php";