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
$helper = new FacebookRedirectLoginHelper( 'http://symbee.com.br/mobile/home.php' );

try {
  $session = $helper->getSessionFromRedirect();
 	// see if we have a session
	if ( isset( $session ) ) {
	  // graph api request for user data
	  $request = new FacebookRequest( $session, 'GET', '/me' );
	  $response = $request->execute();
	  //echo("<script>console.log('SESSION START.');</script>");

	  // get response
	  $graphObject = $response->getGraphObject();

	  // print data - Set Variables Informations
	  //echo  print_r( $graphObject );
	  $userID			= $graphObject->getProperty('id');
	  $userName		= $graphObject->getProperty('name');
	  $userEmail	= $graphObject->getProperty('email');
	  $_SESSION['user'] = $userEmail;

	  setcookie("user",$userEmail, time()+3600*3);
	  echo("<script>console.log('PHP fbconect: useremail: ".$userEmail."');</script>");  
	  //echo("<script>console.log('PHP fbconect: Cookie: ".$_COOKIE['user']."');</script>");  

	  //echo("<script>console.log('PHP: SESSION START VARIAVEL: ".$_SESSION['user']."');</script>");  

	} else {
	  // show login url
	  //echo '<a href="' . $helper->getLoginUrl() . '" class="btn-loginfb">Entrar com Facebook</a>';
	}
  echo("<script>console.log('PHP: Facebook Status: Logged in');</script>");

} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
  echo("<script>console.log('PHP: Facebook Error');</script>");

} catch( Exception $ex ) {
  // When validation fails or other local issues
  echo("<script>console.log('PHP: Validation fails');</script>");
}







?>