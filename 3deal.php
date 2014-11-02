<?php
  //Set values for page
  $page_title = "$3 Deal | Nicebox";

	include 'includes/header.php';
?>

  <div class="container padding-bottom-x3">
		<div class="centerColumn">
      <h1 class="centerText">40% OFF</h1>
			<p class="centerText biggerText">Get A Small Box For $3. This is the same Small Box that orignall sells for $5. In order to get a Small box for just $3 you most first share the news with your friends.</p>

      <p id="shareLocked" class="centerText lightText">This offer is locked, to unlock click a button below and share it.</p>

			<p class="centerText" id="shareLocked">
				<a href="#" class="nb-button  noUnderline" id="facebook-share"><i class="fa fa-facebook-square"></i> Share On Facebook</a>

				<a href="https://twitter.com/intent/tweet?url=http://www.google.com/" class="nb-button noUnderline" id="twitter-share"><i class="fa fa-twitter-square"></i> Tweet This Page</a>

				<a href="https://twitter.com/intent/tweet?url=http://www.google.ca/" class="nb-button noUnderline" id="twitter-share"><i class="fa fa-twitter-square"></i> Tweet This Page</a>

      </p>

        <div class="none" id="shareSuccess">
          <p class="centerText">Thanks for sharing the good news. Use the below button to purchase a Small Box for $3.</p>
          <p class="centerText"><a href="checkout3.php" class="nb-button noUnderline">$3 Small Box</a></p>
        </div>
		</div>
	</div>


<div id="fb-root"></div>


<?php
  //Set script
  $script = "<script src='http://code.jquery.com/jquery-latest.min.js'></script>

<script>
/**
 * Copyright 2014 Facebook 'Share to Download' by Adam Azad (AdamA)
 * Licensed under the Apache License, Version 2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 **/
$(document).ready(function () {

      window.fbAsyncInit = function() {
        FB.init({
          appId      : '387008351446925',
          version    : 'v2.0'
        });
      };
    $('#facebook-share').on('click', function() {
      /** display the share dialog and wait for the response **/
      setTimeout(function(){ $('p').addClass('hidden') }, 1500);
FB.ui({
      method:  'feed',
      link: 'http://nicebox.cloudvent.net/3deal.html',
      caption: 'Test Caption',
      description: 'Test description. This will appear longer.',
      },
      /** our callback **/
      function(response) {
        if (response && !response.error_code) {
          console.log('posted');
          $('#shareSuccess').removeClass('none');
          $('#shareLocked').addClass('none');
          $('#facebook-share').addClass('none');
          $('#twitter-share').addClass('none');
        } else {
          console.log('cancelled');
          $('#shareSuccess').addClass('none');
        }
      }
    );

     });
});


// Load the SDK
(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/en_US/sdk.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script>
// Include the Twitter Library
window.twttr = (function (d,s,id) {
  var t, js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
  js.src='https://platform.twitter.com/widgets.js'; fjs.parentNode.insertBefore(js, fjs);
  return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
}(document, 'script', 'twitter-wjs'));

// On ready, register the callback...
twttr.ready(function (twttr) {
    twttr.events.bind('tweet', function (event) {
      console.log('tweeted');
      $('#shareSuccess').removeClass('none');
      $('#shareLocked').addClass('none');
    });
});
</script>";

	include 'includes/footer.php';
?>
