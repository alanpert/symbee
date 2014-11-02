<?php 
  include('fbconect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="initial-scale=0.5, maximum-scale=2, minimum-scale=0.5, user-scalable=yes, width=320px"/>
  <title>Symbee - Login</title>
  
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <!--<script type="text/javascript" src="js/facebook-login.js"></script>-->

  <!-- <link rel="stylesheet" type="text/css" href="css/normalize.css"> -->
  <link rel="stylesheet" type="text/css" href="css/symbee.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="login-bg">

  <div class="mobile-wrap login">
  	<img src="img/symbee-logo.png" width="317" height="122" alt="Symbee" class="logo" />

    <div class="login-box">
      <h2>Bem-vindo, escritor!</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel bibendum dui, vel suscipit turpis. </p>
      <?php 
        $params = array(
          "scope" => "public_profile,email");
        echo '<a href="' . $helper->getLoginUrl($params) . '" class="btn-loginfb">Entrar com Facebook</a>'; 
      ?>
      <a href="#" class="saiba-mais">Saiba mais sobre o aplicativo</a>

    </div>
  </div>

	

</div>

</body>
</html>