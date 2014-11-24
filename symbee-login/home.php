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
      echo("<script>window.location = 'index.php';</script>");
    }
  }

  

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="initial-scale=0.5, maximum-scale=2, minimum-scale=0.5, user-scalable=yes, width=320px"/>
  <title>Symbee - Narrativas Colaborativas</title>
  
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/symbee-geral.js"></script>
  <link rel="stylesheet" type="text/css" href="css/symbee.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="mobile-wrap home">

  <!-- TOP MENU + SIDE MENU -->
  <?php include('php/topmenu.php'); ?>

  <!-- MINHAS HISTORIAS -->
  <div class="minhashistorias">
    <h1>HISTÓRIAS EM ANDAMENTO</h1>

  <div class="line-wrap">
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
          $vertodas = 0;
        
          foreach($result as $row) {
            if ($conthistorias < 3) {
              //print_r($row);
              $idnarrativa = $row[id];
              $narrativacriador = $row[criador];
              $narrativanome = $row[nome];
              $narrativagenero = $row[tema];
              //echo $narrativanome;
              echo ("<div class='historia-andamento'>");
              echo ("<a href='historia-visualizacao.php?nome=" . $narrativanome . "&genero=" . $narrativagenero . "&criador=" . $narrativacriador . "&narrativa=" . $idnarrativa . "' class='historiaclick'>");
                echo ("<div class='historia-thumb' style='background: url(img/placeholder/historia-thumb.jpg) no-repeat center' >");
                  echo ("<div class='mask'>");
                  echo ("</div>");
                echo ("</div>");
                echo ("<div class='historia-infos'>");
                  echo ("<p class='titulo'>".$narrativanome."</p>");
                  echo ("<p class='genero'>".$narrativagenero."</p>");
                  echo ("<p class='criador' style='display: none;'>".$narrativacriador."</p>");
                echo ("</div>");
              echo ("</a>");
              echo ("</div>");
              $conthistorias++;
              //echo("<script>console.log('PHP Cont Historias: ".$conthistorias."');</script>"); 

            } else {
              if ($vertodas == 0) {
                echo ("<div class='clearfix'></div>");
                echo ("<a href='#' class='btn-ver-todas'>Ver todas</a>");
                $vertodas = 1;
              }

            }
             
          }  

          if ($conthistorias < 3) {
            $historiasrestantes = 3 - $conthistorias;
            echo("<script>console.log('PHP Historias restantes: ".$historiasrestantes."');</script>"); 

            for ($i=0; $i<$historiasrestantes; $i++) {
              echo ("<div class='historia-andamento click-nova'>");
                echo ("<div class='historia-thumb nova-historia-thumb' >");
                echo ("</div>");
                echo ("<div class='historia-infos'>");
                  echo ("<p class='titulo'> Nova História </p>");
                echo ("</div>");
              echo ("</div>");
            }
          }

        }
        else {
          echo ("<p class='nao-participando'> Você atualmente não está participando de nenhuma história. <br/><br/> <a href='criarhistoria.php'>Clique e crie uma!</a> </p>");
        }

      


      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      }
    ?>
  </div>


  </div>
  <!-- /MINHAS HISTORIAS -->

  <!-- CRIE SUA HISTÓRIA -->
  <div class="call-criar">
    <div class="left">
      <h2> Está louco para ganhar um oscar mas não sabe como? </h2>
      <p>
        Utilize o Symbee e dê sequência em suas ideias!
      </p>
    </div>
    <a href="criarhistoria.php"> Crie sua história </a>
  </div>
  <!-- /CRIE SUA HISTÓRIA -->

  <!-- HISTÓRIAS MAIS VOTADAS -->
  <div class="mais-votadas">
    <h1> LEIA AS HISTÓRIAS MAIS VOTADAS </h1>

    <div class="historia-lista">
      <div class="img-lista">
          <img src="img/placeholder/historia-rank1.png" width="85" height="75"/>
      </div>
      <div class="infos">
        <h3>O cavaleiro Honrado</h3>
        <p> <strong>Gênero:</strong> Ação e Aventura </p>
        <p> <strong> Criador: </strong> CaahZin </p>
        <a href="#" class="btn-ler-historia">Ler História </a>
      </div>
    </div>

    <div class="historia-lista">
      <div class="img-lista">
          <img src="img/placeholder/historia-rank2.png" width="85" height="75"/>
      </div>
      <div class="infos">
        <h3>A última corrida</h3>
        <p> <strong>Gênero:</strong> Ação e Aventura </p>
        <p> <strong> Criador: </strong> Raphael Lucena </p>
        <a href="#" class="btn-ler-historia">Ler História </a>
      </div>
    </div>

    <div class="historia-lista">
      <div class="img-lista">
          <img src="img/placeholder/historia-rank3.png" width="85" height="75"/>
      </div>
      <div class="infos">
        <h3>Dragões Valentes II: O coração de fogo.</h3>
        <p> <strong>Gênero:</strong> Ação e Aventura </p>
        <p> <strong> Criador: </strong> Daniel Laham </p>
        <a href="#" class="btn-ler-historia">Ler História </a>
      </div>
    </div>

  </div>
  <!-- /HISTÓRIAS MAIS VOTADAS -->

</div>

</body>
</html>