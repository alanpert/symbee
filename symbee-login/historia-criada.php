<?php

  include('php/conect.php');
  include('php/teste-login.php');

  $nomehistoria = $_POST["name-historia"];
  $generohistoria = $_POST["genero-historia"];
  $numjogadores = $_POST["num-jogadores"];

  if($nomehistoria == "") {
    echo("<script>window.location = 'http://symbee.com.br/symbee-login/criarhistoria.php';</script>");
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="initial-scale=0.5, maximum-scale=2, minimum-scale=0.5, user-scalable=yes, width=320px"/>
  <title>Symbee - História</title>
  
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/symbee-geral.js"></script>
  <link rel="stylesheet" type="text/css" href="css/symbee.css">

</head>
<body>

<div class="mobile-wrap historia-criada">

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

  <?php echo ($nomehistoria); ?>
  <?php echo ($generohistoria); ?>
  <?php echo ($numjogadores); ?>


</div>

</body>
</html>