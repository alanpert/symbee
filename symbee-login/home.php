<?php

  include('fbconect.php');
  include('php/conect.php');


  if ($session) {
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
  }


  if($_COOKIE['user'] != "") { 
    echo("<script>console.log('PHP: COOKIE COM EMAIL.');</script>");
    $cookieemail = $_COOKIE['user'];
    //echo ($cookieemail);
    echo("<script>console.log('PHP: HOME:Cookie Email: ".$cookieemail."');</script>");
    

    // CONECTAR NO BD E VERIFICAR O LOGIN
    try {
      $stmt = $connection->prepare('SELECT * FROM usuarios WHERE email = :email');
      $stmt->execute(array('email' => $cookieemail));
     
      $result = $stmt->fetchAll();
     
      if ( count($result) ) { 
        foreach($result as $row) {
          echo("<script>console.log('PHP: Usuário já cadastrado.');</script>");
          //print_r($row);
          //echo("Olá, ".$row[1].". Seja Bem-Vindo!");
          //echo("<img src='".$row[2]."' alt='' />");
          $varemail = $row[0];
          $varnome = $row[1];
          $varurlfoto = $row[2];
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
  <script type="text/javascript" src="js/symbee-geral.js"></script>
  <link rel="stylesheet" type="text/css" href="css/symbee.css">

</head>
<body>

<div class="mobile-wrap home">

  <div class="minibar">
    <a href="home.php" class="minibar-logo"> <img src="img/minibar-logo.png" width="140" height="53" alt="Symbee" /> </a>
    <a href="#" class="btn-sidebar img-replace" id="btn-sidebar"> SideBar </a>

    <div class="sideout" id="sideout">
    </div>
    <div class="sidebar" id="sidebar">
      <div class="foto" style="background: url('<?php echo ($varurlfoto); ?>') center no-repeat">
          <div class="foto-mask"></div>
      </div>
      <p class="nome"> <?php echo ($varnome); ?> </p>
      <p class="email"> <?php echo ($varemail); ?> </p>

      <span class="separador"></span>

      <ul>
        <li class="itens-menu"><a href="#"> Visualizar Perfil </a></li>
        <li class="itens-menu"><a href="criarhistoria.php"> Criar História </a></li>
        <li class="itens-menu"><a href="#"> Ler História </a></li>
        <li class="itens-menu sair"><a href="deletecookie.php"> Sair </a></li>
      </ul>

      <img src="img/symbee-logo-legenda.png" width="200" height="76" alt="Symbee - Narrativas Colaborativas" class="logo-legenda" />
    </div>
  </div>

  <!-- MINHAS HISTORIAS -->
  <div class="minhashistorias">

  
  <?php
    // TRAZENDO AS NARRATIVAS RELACIONADAS COM O USUARIO
    try {
      $stmt = $connection->prepare('SELECT * FROM tblNarrativas WHERE criador = :email');
      $stmt->execute(array('email' => $cookieemail));
     
      $result = $stmt->fetchAll();
     
      $numHistorias = count($result);
      echo("<script>console.log('PHP Total Historias: ".$numHistorias."');</script>"); 


      if ( $numHistorias > 0 ) {
        $historiasrestantes = 0;
        $conthistorias = 0;
      
        foreach($result as $row) {
          if ($conthistorias < 3) {
          //print_r($row);
            $narrativanome = $row[nome];
            $narrativagenero = $row[tema];
            //echo $narrativanome;
            echo ("<div class='historia-thumb'>");
            echo ("<a href='#' class='historia-link'>");
            echo ("<p>".$narrativanome."</p>");
            echo ("<p>".$narrativagenero."</p>");
            echo ("</a>");
            echo ("</div>");
            $conthistorias++;
            //echo("<script>console.log('PHP Cont Historias: ".$conthistorias."');</script>"); 

          } else {
            echo ("<p> Mais... </p>");
          }
           
        }  

        if ($conthistorias < 3) {
          $historiasrestantes = 3 - $conthistorias;
          echo("<script>console.log('PHP Historias restantes: ".$historiasrestantes."');</script>"); 

          for ($i=0; $i<$historiasrestantes; $i++) {
            echo ("<div class='historia-thumb'>");
            echo ("<a href='#' class='historia-link'>");
            echo ("<p> Clique para adicionar uma história. </p>");
            echo ("</a>");
            echo ("</div>");
          }
        }

      }
      else {
        echo ("<p> Você atualmente não está participando de nenhuma história. Clique e crie uma! </p>");
      }

    


    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
  ?>


  </div>
  <!-- /MINHAS HISTORIAS -->

</div>

</body>
</html>