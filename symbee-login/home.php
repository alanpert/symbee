<?php

  include('fbconect.php');
  include('php/conect.php');


  if(!isset($error)) {
  //no error
  $userPictureURL = "http://graph.facebook.com/".$userID."/picture?type=large";

  $sthandler = $connection->prepare("SELECT email FROM usuarios WHERE email = :email");
  $sthandler->bindParam(':email', $_SESSION['user']);
  $sthandler->execute();

    if($sthandler->rowCount() > 0) {
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
      echo("<script>window.location.reload(true);</script>");
    }

  } else {
    echo "error occured: ".$error;
    exit();
  }


  if($_COOKIE['user'] != "") { 
    echo("<script>console.log('PHP: COOKIE COM EMAIL.');</script>");
    $cookieemail = $_COOKIE['user'];
    //echo ($cookieemail);
    echo("<script>console.log('PHP: HOME:Cookie Email: ".$cookieemail."');</script>");
    


    try {
      $stmt = $connection->prepare('SELECT * FROM usuarios WHERE email = :email');
      $stmt->execute(array('email' => $cookieemail));
     
      $result = $stmt->fetchAll();
     
      if ( count($result) ) { 
        foreach($result as $row) {
          echo("<script>console.log('PHP: Usuário já cadastrado.');</script>");
          //print_r($row);
          echo("Olá, ".$row[1].". Seja Bem-Vindo!");
          echo("<img src='".$row[2]."' alt='' />");
        }   
      } else {
        echo "No rows returned.";
      }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }



  } else {
    echo("<script>console.log('PHP: COOKIE ERRo.');</script>");
    if ($session) {
      echo("<script>window.location.reload(true);</script>");
    } else {
      echo("<script>window.location = 'http://symbee.com.br/symbee-login/index2.php';</script>");
    }
  }


  

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

  HOME

  <a href="deletecookie.php"> Logout </a>

</div>

</body>
</html>