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

    $urlNovoTrecho = "adicionar-novo-trecho.php?nome=" . $titulohistoriaclick . "&genero=" . $generohistoriaclick . "&criador=" . $criadorhistoriaclick . "&narrativa=" . $idnarrativa;
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

  // Pegando o texto de introdução
  try {
    $stmt = $connection->prepare('SELECT * FROM tblIntros WHERE tema = :generohistoria');
    $stmt->execute(array('generohistoria' => $generohistoria));
     
    $result = $stmt->fetchAll();

    if ( count($result) ) { 
      foreach($result as $row) {
        $textointro = $row[intro];
      }   
    } else {
      echo "No rows returned.";
    }

  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

  // Pegando o nome do Criador
  try {
    $stmt = $connection->prepare('SELECT * FROM usuarios WHERE email = :criadorhistoriaclick');
    $stmt->execute(array('criadorhistoriaclick' => $criadorhistoriaclick));
     
    $result = $stmt->fetchAll();

    if ( count($result) ) { 
      foreach($result as $row) {
        $nomeinteirocriador = $row[nome];
      }   
    } else {
      echo "No rows returned.";
    }

  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

  // Pegando o número de rodadas e trechos da historia
  try {
    $stmt = $connection->prepare('SELECT * FROM tblTrechos WHERE idnarrativa = :idnarrativa ORDER BY indice');
    $stmt->execute(array('idnarrativa' => $idnarrativa));
     
    $resultrecho = $stmt->fetchAll();

    $numrodada = count($resultrecho);
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

<div class="mobile-wrap historia-criada historia-semaltura">

  <!-- TOP MENU + SIDE MENU -->
  <?php include('php/topmenu.php'); ?>

  <!-- CONTEUDO -->
  <?php include('infos-historia-config.php'); ?>
  <div>
    <!-- <p> Nome História: <?php //echo ($titulohistoriaclick); ?></p> -->
    <!-- <p> Gênero História: <?php //echo ($generohistoriaclick); ?> </p> -->
    <p class="contadapor">Contada por: <strong> <?php echo ($nomeinteirocriador); ?></strong></p>
  </div>

  <div>
    <?php
      //Trechos da história
      echo ("<p class='textointro'> " . $textointro . " </p>");
     
      if ( count($resultrecho) ) { 
        foreach($resultrecho as $row) {
          //print_r($row);
          $usuariotrecho = $row[idusuario];

            // Adicionando o nome do criador do trecho
            try {
              $stmt = $connection->prepare('SELECT * FROM usuarios WHERE email = :usuariotrecho');
              $stmt->execute(array('usuariotrecho' => $usuariotrecho));
               
              $resultTrecho = $stmt->fetchAll();

              if ( count($resultTrecho) ) { 
                foreach($resultTrecho as $rowTrecho) {
                  $usuariotrecho = $rowTrecho[nome];
                }   
              } else {
                echo "No rows returned.";
              }

            } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
            }


          //echo ("<p> Trecho: " . $row[indice] . "</p>");
          echo ("<div class='trechohistoria'>");
            echo ("<p class='textotrecho'> " . $row[texto] . " </p>");

            
            echo ("<p class='clickinfos'><a href='#' class='info-click'> Informações </a></p>");
            echo ("<div class='infos-cont'>");
              echo ("<p> Escrito por: <strong>" . $usuariotrecho . "</strong> </p>");
              echo ("<input type='hidden' class='indicetrecho' name='indicetrecho' value='"  . $row[indice] . "' />");

              $urlcontinuacao = "continuar-novo.php?nome=" . $titulohistoriaclick . "&email=" . $varemail . "&tema=" . $generohistoriaclick . "&indice=" . $row[indice] . "&idnarrativa=" . $idnarrativa ;

              if ($row[indice] == 1) {
                
              } else {

                echo ("<a href='#' class='verdesafiotrecho'> Ver Desafio </a>");

                echo ("
                  <div class='mask'></div>
                  <div class='box-desafio'>
                    <h3>Desafio do trecho</h3>
                    <p class='destaque'>");

                    // Pegando Desafio do trecho
                    try {
                      $stmt = $connection->prepare('SELECT * FROM tblDesafios WHERE nivel = :nivel');
                      $stmt->execute(array('nivel' => $row[indice]));
                       
                      $resultdesafios = $stmt->fetchAll();

                      if ( count($resultdesafios) ) { 
                        foreach($resultdesafios as $rowdesafios) {
                          echo ($rowdesafios[desafio]);
                        }   
                      } else {
                        echo "No rows returned.";
                      }

                    } catch(PDOException $e) {
                        echo 'ERROR: ' . $e->getMessage();
                    }

                    if ($row[palavrachave]) {
                      echo ("<br/> <br/>");
                      echo ("Palavra-chave: " . $row[palavrachave]);
                    }

                echo ("
                    </p>
                  </div>");

              }




              echo ("<a href='" . $urlcontinuacao . "' class='continuar-novo'> Continuar desse ponto </a>");
            echo ("</div>");

          echo ("</div>");
          //$trechointro = $row[intro];
        }   


      } else {
        //echo "No rows returned.";
        echo("<script>console.log('PHP Trecho Intro: No Rows Returned.');</script>");
      }

      // Pegando relação de historia e usuario
      try {
        $stmt = $connection->prepare('SELECT * FROM tblHistoriaPessoa WHERE relUser = :relemail AND relNarrativa = :idrel');
        $stmt->execute(array('relemail' => $varemail, 'idrel' => $idnarrativa));
         
        $result = $stmt->fetchAll();

        if ( count($result) ) { 
          foreach($result as $row) {
            if ($numrodada < 16) {
              echo ("<div class='novo-trecho-wrap'>");
                echo ("<a href='" . $urlNovoTrecho . "' class='adicionar-novo-trecho'> Adicionar novo trecho </a> ");
              echo ("</div>");
            }
          }   
        }

      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      }




    ?>
  </div>

</div>

</body>
</html>