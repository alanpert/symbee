$(document).ready(function() {

  


});



function statusChangeCallback(response) {

  console.log('statusChangeCallback');
  console.log(response);

  if (response.status === 'connected') {

    // Logged into your app and Facebook.
    testAPI();

  } else if (response.status === 'not_authorized') {

    // The person is logged into Facebook, but not your app.
    document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';

  } else {

    // The person is not logged into Facebook, so we're not sure if they are logged into this app or not.
    document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
  }

}

// Função disparada após o usuário logar (Olhar na página o status de onlogin)
function checkLoginState() {

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

}


function testAPI() {

  console.log('Welcome!  Fetching your information.... ');

  FB.api('/me', function(response) {
    console.log(JSON.stringify(response));

    console.log('Successful login for: ' + response.name);
    console.log("Email: " + response.email);
    console.log("Foto: " + response.picture);
    document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';

  });

}

// FACEBOOK SDK
window.fbAsyncInit = function() {
  FB.init({
    appId      : '709089719179470',
    cookie     : true,
    xfbml      : true,
    version    : 'v2.1'
  });

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
    if (response.status === 'connected') {
      console.log(response.authResponse.accessToken);
    }
  });
};

(function(d, s, id) {
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 } (document, 'script', 'facebook-jssdk'));


