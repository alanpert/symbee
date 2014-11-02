<?php

  include('php/conect.php');
  include('php/teste-login.php');

  $nomehistoria = $_POST["name-historia"];
  $generohistoria = $_POST["genero-historia"];
  $numjogadores = $_POST["num-jogadores"];

  $nivelcomeco = 1;

  if($nomehistoria == "") {
    echo("<script>window.location = 'http://symbee.com.br/symbee-login/criarhistoria.php';</script>");
  }

  $sql = "INSERT INTO tblNarrativas(
                                  criador,
                                  nome,
                                  tema,
                                  numPart,
                                  nivelcomeco
                                  ) VALUES (
                                  :criador, 
                                  :nome, 
                                  :tema,
                                  :numPart,
                                  :nivelcomeco)";
                                          
  $stmt = $connection->prepare($sql);
                                                
  $stmt->bindParam(':criador', $cookieemail, PDO::PARAM_STR);       
  $stmt->bindParam(':nome', $nomehistoria, PDO::PARAM_STR); 
  $stmt->bindParam(':tema', $generohistoria, PDO::PARAM_STR);
  $stmt->bindParam(':numPart', $numjogadores, PDO::PARAM_STR);
  $stmt->bindParam(':nivelcomeco', $nivelcomeco, PDO::PARAM_STR);
                                    
  $stmt->execute();

  // ADICIONAR RELAÇÃO NA TABELA "tblHistoriaPessoa" DE ID NARRATIVA E EMAIL DE QUEM ESTIVER LOGADO
  // $idhistoria = $connection->lastInsertId('id');
  // include('php/relacao-historia-usuario.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="initial-scale=0.5, maximum-scale=2, minimum-scale=0.5, user-scalable=yes, width=320px"/>
  <title>  Criando... <?php echo ($nomehistoria); ?> </title>
  
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/symbee-geral.js"></script>
  <link rel="stylesheet" type="text/css" href="css/symbee.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>

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

  <div class="banner" style="background: url(img/placeholder/placeholder-img-capa.jpg) no-repeat center;">
    <div class="dados">
      <h2> <?php echo ($nomehistoria); ?> </h2>
      <p> <?php echo ($generohistoria); ?> </p>
    </div>
  </div>

  <div class="infos">
    <div class="btn-config">
      <a href="#">
        <p> Configurações da História </p>
      </a>
    </div>
    <div>
      <p> Rodada: <span>1</span> </p>
    </div>

  </div>



  <p> Nome da História: <?php echo ($nomehistoria); ?></p>
  <p> Gênero: <?php echo ($generohistoria); ?> </p>
  <p> Numero de jogadores: <?php echo ($numjogadores); ?> </p>
  <br/ >
  <p> Criado por: <?php echo ($varnome); ?> </p>



</div>

</body>
</html>