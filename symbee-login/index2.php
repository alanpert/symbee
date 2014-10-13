<?php
	include('fbconect.php');
	include('php/conect.php');
	echo ("<br/>");
	echo "$dbname";
	echo ("<br/>");

	if ($session) {
		$userPictureURL = "http://graph.facebook.com/".$userID."/picture?type=large";
		echo("<script>console.log('PHP: User ID: ".$userID."');</script>");
		echo("<script>console.log('PHP: User Name: ".$userName."');</script>");
		echo("<script>console.log('PHP: User Email: ".$userEmail."');</script>");
		echo('<img src= '.$userPictureURL.' />');		

	


		if(!isset($error)) {
		//no error
		$sthandler = $connection->prepare("SELECT email FROM usuarios WHERE email = :email");
		$sthandler->bindParam(':email', $userEmail);
		$sthandler->execute();

			if($sthandler->rowCount() > 0){
				echo("<script>console.log('PHP: Usuário já cadastrado.');</script>");
			} else {
		    //Securly insert into database
		    $sql = "INSERT INTO usuarios(
																	email,
											            nome,
											            foto) VALUES (
											            :email, 
											            :nome, 
											            :foto)";
                                          
				$stmt = $connection->prepare($sql);
				                                              
				$stmt->bindParam(':email', $userEmail, PDO::PARAM_STR);       
				$stmt->bindParam(':nome', $userName, PDO::PARAM_STR); 
				$stmt->bindParam(':foto', $userPictureURL, PDO::PARAM_STR);
		 
				                                      
				$stmt->execute(); 
				echo("<script>console.log('PHP: Usuário adicionado ao Banco de Dados.');</script>");

			}
		} else {
		  echo "error occured: ".$error;
		  exit();
		}


	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <title>Symbee - Login</title>
  
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <!--<script type="text/javascript" src="js/facebook-login.js"></script>-->

  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/symbee.css">

</head>
<body>



<!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button> -->

<div id="status">
</div>
<p> TESTE </p>

</body>
</html>