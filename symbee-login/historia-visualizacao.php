<?php

  include('php/conect.php');
  include('php/teste-login.php');

  // Pegar URL e Separar Parâmetros
  $actual_link = basename($_SERVER['REQUEST_URI']);
  //echo ($actual_link);
  // $url = 'https://mysite.com/test/1234?basic=2&email=xyz2@test.com';
  $visualizacao = 0;

  $parts = parse_url($actual_link);
  parse_str($parts['query'], $query);
  $titulohistoriaclick = $query['nome'];
  if ($titulohistoriaclick) {
    $visualizacao = 1;
    $generohistoriaclick = $query['genero'];
    $criadorhistoriaclick = $query['criador'];
    $idnarrativa = $query['narrativa'];
  }
  else {
    echo("<script>window.location = 'criarhistoria.php';</script>");
  }
  

  // VARIAVEIS PARA CONFIG HISTORIA
  $nomehistoria = $titulohistoriaclick;
  $generohistoria = $generohistoriaclick;

  $urlminiicon = "";
  switch ($generohistoria) {
    case "Ação e Aventura":
      $urlminiicon = "img\icon-genero\icon-mini-acao.png";
      break;

    case "Comédia":
      $urlminiicon = "img\icon-genero\icon-mini-comedia.png";
      break;

    case "Fantasia":
      $urlminiicon = "img\icon-genero\icon-mini-fantasia.png";
      break;

    case "Ficção Científica":
      $urlminiicon = "img\icon-genero\icon-mini-ficcao.png";
      break;

    case "Romance":
      $urlminiicon = "img\icon-genero\icon-mini-romance.png";
      break;

    case "Terror":
      $urlminiicon = "img\icon-genero\icon-mini-terror.png";
      break;
  }
  //echo $query['nome'];
  //echo $query['genero'];
  //echo $query['criador'];
  //echo $query['narrativa'];

   try {
        $stmt = $connection->prepare('SELECT * FROM tblTrechos WHERE idnarrativa = :idnarrativa ORDER BY indice');
        $stmt->execute(array('idnarrativa' => $idnarrativa));
         
        $result = $stmt->fetchAll();

        $numrodada = count($result);
        // echo ($numrodada);

      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="initial-scale=0.5, maximum-scale=2, minimum-scale=0.5, user-scalable=yes, width=320px"/>
  <title>  Criando...  </title>
  
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/symbee-geral.js"></script>
  <link rel="stylesheet" type="text/css" href="css/symbee.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="mobile-wrap historia-criada">

  <!-- TOP MENU + SIDE MENU -->
  <?php include('php/topmenu.php'); ?>

  <!-- CONTEUDO -->
  <?php include('infos-historia-config.php'); ?>
  <div>
    <!-- <p> Nome História: <?php //echo ($titulohistoriaclick); ?></p> -->
    <!-- <p> Gênero História: <?php //echo ($generohistoriaclick); ?> </p> -->
    <p> Criador: <?php echo ($criadorhistoriaclick); ?></p>
  </div>

  <div>
    <?php
      //Trechos da história
     
      if ( count($result) ) { 
        foreach($result as $row) {
          //print_r($row);
          echo ("<p> Trecho: " . $row[indice] . "</p>");
          echo ("<p> " . $row[texto] . " </p>");
          echo ("<br/>");
          //$trechointro = $row[intro];
        }   


      } else {
        //echo "No rows returned.";
        echo("<script>console.log('PHP Trecho Intro: No Rows Returned.');</script>");
      }


    ?>
  </div>

</div>

</body>
</html>