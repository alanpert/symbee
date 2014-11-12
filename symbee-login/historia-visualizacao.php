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
  if ($titulohistoriaclick) {
    $visualizacao = 1;
    $titulohistoriaclick = $query['nome'];
    $generohistoriaclick = $query['genero'];
    $criadorhistoriaclick = $query['criador'];
  }
  else {
    echo ("1");
  }
  
  //echo $query['nome'];
  //echo $query['genero'];
  //echo $query['criador'];

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
  <div>
    <p> Nome História: <?php echo ($titulohistoriaclick); ?></p>
    <p> Gênero História: <?php echo ($generohistoriaclick); ?> </p>
    <p> Criador: <?php echo ($criadorhistoriaclick); ?></p>
  </div>

</div>

</body>
</html>