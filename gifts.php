<?php
  //Set values for page
  $page_title = "Gifts | Nicebox";

	include 'includes/header.php';
?>

	<div class="container">
		<div class="centerColumn">
			<h1 class="centerText">GIFTS</h1>
			<p class="centerText biggerText">Take a look at some of the recent boxes sent out to see what you might get. Submit your own photos on Instagram using <strong class="roundText">#WhatsMyBox</strong>. To get the photos right to our phone you should probably follow our Instagram.</p>
      <p class="centerText"><a href="#" class="nb-button noUnderline"><i class="fa fa-instagram"></i> Follow @Nicebox</a>
		</div>
	</div>

  <div class="whiteBackground padding">
  	<div class="container">
  		<div class="centerColumn">
        <div id="instafeed"></div>
        <p class="centerText margin"><a href="#" id="load-more" class="nb-button noUnderline">Load More Boxes</a></p>
      </div>
    </div>
  </div>

<?php
  //Set script
  $script = "
<script type='text/javascript' src='js/instafeed.min.js'></script>
<script type='text/javascript'>
  var loadButton = document.getElementById('load-more');

  var feed = new Instafeed({
      get: 'tagged',
      tagName: 'gift',
      clientId: 'a25f5a7693b04351b165dc8df1e6aded',
      limit: 30
  });

  loadButton.addEventListener('click', function() {
    feed.next();
    setTimeout(scroll, 100);
    function scroll() {
        window.scrollTo(0,document.body.scrollHeight);
    }
  });

  feed.run();
</script>";

	include 'includes/footer.php';
?>
