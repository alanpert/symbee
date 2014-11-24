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

    $ulrVoltar = "historia-visualizacao.php?nome=" . $titulohistoriaclick . "&genero=" . $generohistoriaclick . "&criador=" . $criadorhistoriaclick . "&narrativa=" . $idnarrativa;

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

  // Pegando o número de rodadas e trechos da historia
  try {
    $stmt = $connection->prepare('SELECT * FROM tblTrechos WHERE idnarrativa = :idnarrativa ORDER BY indice');
    $stmt->execute(array('idnarrativa' => $idnarrativa));
     
    $result = $stmt->fetchAll();

    $numrodada = count($result);
    // echo ($numrodada);

  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

  // Num de Caracteres
  $numMaxCaracteres = 500 + (100 * $numrodada);
  $numMinCaracteres = 150 + (100 * $numrodada);

  $numrodada = $numrodada + 1;


  if ($numrodada > 1) {
    $niveldesafio = (string)$numrodada;
    //Pegando texto do Desafio
    try {
      $stmt = $connection->prepare('SELECT * FROM tblDesafios WHERE nivel = :nivel');
      $stmt->execute(array('nivel' => $niveldesafio));
       
      $result = $stmt->fetchAll();

      if ( count($result) ) { 
        foreach($result as $row) {
          //print_r($row);
          $desafiotexto = $row[desafio];
        }   
      } else {
        echo "No rows returned.";
      }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

  } else {
    //REDIRECIONAR
  }


  // Pegando palavra-chave
   try {
    $stmt = $connection->prepare('SELECT * FROM tblPalavrasChaves');
    $stmt->execute();

    $result = $stmt->fetchAll();
    $palavrastotal = count($result);
    $palavrarandom = rand(1,$palavrastotal);
    //echo ($palavrarandom);

  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

  try {
    $stmt = $connection->prepare('SELECT * FROM tblPalavrasChaves WHERE id = :idpalavra');
    $stmt->execute(array('idpalavra' => $palavrarandom));
     
    $result = $stmt->fetchAll();

    if ( count($result) ) { 
        foreach($result as $row) {
          //print_r($row);
          $palavrachave = $row[palavra];
        }   
      } else {
        //echo "No rows returned.";
      }

  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="initial-scale=0.5, maximum-scale=2, minimum-scale=0.5, user-scalable=yes, width=320px"/>
  <title>  Editando... <?php echo ($nomehistoria); ?> </title>
  
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

  <div class="introducao">
    <form action="php/post-novo-trecho.php" method="post" id="form-intro">
      <p class="base">
        <?php echo ($desafiotexto); ?>
      </p>

      <p class="regras">
        Palavra Chave: <span><?php echo($palavrachave); ?> </span>
        <br/>
        Máximo: <span><?php echo ($numMaxCaracteres); ?> caracteres.</span>  Mínimo: <span class="min-carac"> <?php echo ($numMinCaracteres); ?> caracteres</span>
      </p>
      
      <textarea placeholder="Adicione o texto..." maxlength="<?php echo ($numMaxCaracteres); ?>" id="addnovotrecho" name="addnovotrecho"></textarea>
      <input type="hidden" id="mincaracteres" name="mincaracteres" value="<?php echo ($numMinCaracteres); ?>"/>
      <input type="hidden" id="idhistoria" name="idhistoria" value="<?php echo ($idnarrativa); ?>"/>
      <input type="hidden" id="nomehistoria" name="nomehistoria" value="<?php echo ($nomehistoria); ?>"/>
      <input type="hidden" id="generohistoria" name="generohistoria" value="<?php echo ($generohistoria); ?>"/>
      <input type="hidden" id="historiaindice" name="historiaindice" value="<?php echo ($numrodada); ?>"/>
      <input type="hidden" id="palavrachavetrecho" name="palavrachavetrecho" value="<?php echo ($palavrachave); ?>"/>
      <p class="btns-wrap">
        <a class="btn-salvar-voltar" href="<?php echo ($ulrVoltar); ?>">Voltar</a>
        <a class="btn-salvar-novo-trecho" href="#">Salvar</a>
      </p>
      <p class="contador-caracteres">0</p>
    </form>
  </div>


  <div class="info-hide">
    <p> Nome da História: <?php echo ($nomehistoria); ?></p>
    <p> Gênero: <?php echo ($generohistoria); ?> </p>
    <p> Numero de jogadores: <?php echo ($numjogadores); ?> </p>
    <br/ >
    <p> Criado por: <?php echo ($varnome); ?> </p>
  <div>


</div>

</body>
</html>