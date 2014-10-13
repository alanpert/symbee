<?php

	session_start();
	require_once 'php/facebook/autoload.php';
	// use Facebook\FacebookSession;
	// use Facebook\FacebookRedirectLoginHelper;
	// use Facebook\FacebookJavaScriptLoginHelper;

	// FacebookSession::setDefaultApplication('709089719179470', 'f6dde677f96d42beee8ab9a29edcbea8');

	// $helper = new FacebookJavaScriptLoginHelper();
	// try {
	//   $session = $helper->getSession();
	// } catch(FacebookRequestException $ex) {
	//   // When Facebook returns an error
	//   echo("<script>console.log('PHP: Facebook Error');</script>");
	// } catch(\Exception $ex) {
	//   // When validation fails or other local issues
	//   echo("<script>console.log('PHP: Validation fails');</script>");
	// }
	// if ($session) {
	//   // Logged in
	//   echo("<script>console.log('PHP: Logged in');</script>");
	// }


use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

// init app with app id (APPID) and secret (SECRET)
FacebookSession::setDefaultApplication('709089719179470','f6dde677f96d42beee8ab9a29edcbea8');

// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper( 'http://symbee.com.br/symbee-login/index2.php' );

try {
  $session = $helper->getSessionFromRedirect();
  echo("<script>console.log('PHP: Facebook Status: Logged in');</script>");
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
  echo("<script>console.log('PHP: Facebook Error');</script>");
} catch( Exception $ex ) {
  // When validation fails or other local issues
  echo("<script>console.log('PHP: Validation fails');</script>");
}

// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();

  // get response
  $graphObject = $response->getGraphObject();

  // print data - Set Variables Informations
  //echo  print_r( $graphObject );
  $userID			= $graphObject->getProperty('id');
  $userName		= $graphObject->getProperty('name');
  $userEmail	= $graphObject->getProperty('email');

} else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl() . '" class="btn-loginfb">Entrar com Facebook</a>';
}

?>