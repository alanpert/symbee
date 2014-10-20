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

  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/symbee.css">

</head>
<body>

<div class="wrap-all">
	<div class="topo">
		<img src="img/symbee-logo.png" width="317" height="122" alt="Symbee" />
	</div>

	<?php echo '<a href="' . $helper->getLoginUrl() . '" class="btn-loginfb">Entrar com Facebook</a>'; ?>

</div>

</body>
</html>