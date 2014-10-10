<script src='http://code.jquery.com/jquery-latest.min.js'></script>

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
</script>
