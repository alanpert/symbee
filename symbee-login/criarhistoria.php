<?php

  include('php/conect.php');


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
      echo("<script>window.location = 'http://symbee.com.br/symbee-login/index.php';</script>");
    }
  }

  

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="initial-scale=0.5, maximum-scale=2, minimum-scale=0.5, user-scalable=yes, width=320px"/>
  <title>Symbee - Criar Nova História</title>
  
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/symbee-geral.js"></script>
  <link rel="stylesheet" type="text/css" href="css/symbee.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="mobile-wrap nova-historia">

  <!-- TOP MENU + SIDE MENU -->
  <?php include('php/topmenu.php'); ?>

  <!-- CONTEUDO -->
  <div class="criar-wrap">
    <h1 class="titulo"> Criar nova história </h1>
    <p class="subtitulo"> Preencha as informações abaixo e começe a desenvolver a sua história </p>

    <div class="box-criar-historia">
      <form action="historia-criada.php" method="post" id="criar-form">
        <input type="text" id="name-historia" name="name-historia" placeholder="Insira o nome da história..." />
        <p class="desc-input">O nome da história poderá ser mudado ao decorrer da história</p>

        <a class="selecione-cat">Selecione o gênero*</a>
        <p class="desc-input">Escolha o gênero que guiará sua história</p>
        <ul class="fake-select">
          <li>Ação e Aventura</li>
          <li>Comédia</li>
          <li>Fantasia</li>
          <li>Ficção Científica</li>
          <li>Romance</li>
          <li>Terror</li>
        </ul>
        <input type="hidden" id="genero-historia" name="genero-historia" />

        <div class="radios">
          <h3 class="jogadores-titulo">Escolha o número de jogadores</h3>

          <input type="radio" name="num-jogadores" id="1-jogador" value="1 jogador" />
          <label for="1-jogador">Apenas eu</label>  

          <input type="radio" name="num-jogadores" id="2-jogadores" value="2 jogadores" />        
          <label for="2-jogadores">1 Colaborador</label>
          
          <input type="radio" name="num-jogadores" id="3-jogadores" class="ultimo" value="3 jogadores" />
          <label for="3-jogadores">2 Colaboradores</label>          
        </div>
        <a class="btn-criar" id="btncriar" href="#">Criar</a>
      </form>
    </div>
  </div>


</div>

</body>
</html>