<?php

  include('php/conect.php');
  include('php/teste-login.php');

  $nomehistoria = $_POST["name-historia"];
  $generohistoria = $_POST["genero-historia"];
  $numjogadores = $_POST["num-jogadores"];

  $nivelcomeco = 1;


  // Definindo o Mini Icone de Gênero
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


  // Redirect Caso não Tenha nome de História - Apenas para impedir o acesso direto a essa URL
  if($nomehistoria == "") {
    echo("<script>window.location = 'criarhistoria.php';</script>");
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
  $idhistoria = $connection->lastInsertId('id');
  include('php/relacao-historia-usuario.php');


  // Trazendo trecho Intro
  //echo("<script>console.log('PHP Trecho Intro: ".$generohistoria."');</script>"); 
  try {
        $stmt = $connection->prepare('SELECT * FROM tblIntros WHERE tema = :generohistoria');
        $stmt->execute(array('generohistoria' => $generohistoria));
       
        $result = $stmt->fetchAll();
        if ( count($result) ) { 
          foreach($result as $row) {
            $trechointro = $row[intro];
          }   
        } else {
          //echo "No rows returned.";
          echo("<script>console.log('PHP Trecho Intro: No Rows Returned.');</script>");
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
  <title>  Criando... <?php echo ($nomehistoria); ?> </title>
  
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
  <div class="banner" style="background: url(img/placeholder/placeholder-img-capa.jpg) no-repeat center;">
    <div class="dados">
      <h2> <?php echo ($nomehistoria); ?> </h2>
      <p> <?php echo ($generohistoria); ?> </p>
    </div>
  </div>

  <div class="infos">
    <div class="btn-config">
      <a href="#" class="action-config">
        <p> Configurações da História </p>
      </a>
      <ul class="dropdown" id="drop-config-hist">
        <li><a href="#">Editar Nome</a></li>
        <li><a href="#" class="abrir-convidar">Convidar Amigos</a></li>
        <li><a href="#">Editar Capa</a></li>
        <li><a href="home.php">Voltar</a></li>
      </ul>
    </div>
    <div class="info-rodada">
      <p> Rodada: <span>1</span> </p>
      <img src="<?php echo ($urlminiicon); ?>" width="80" height="75" alt="<?php echo ($generohistoria); ?>" class="mini-icon-genero">
    </div>

    <div class="box-convidar-amigos">
      <p> Convide um amigo para participar desta história! </p>
      <form action="#" method="post" id="form-convidar">
        <input type="text" id="email-convidado" name="email-convidado" placeholder="Digite o email..." />
        <input type="hidden" id="idhistoriaconvidar" name="idhistoriaconvidar" value="<?php echo ($idnarrativa); ?>"/>
      </form>

      <div class="btn-wrap">
        <a href="#" class="btn-fechar-convidar"> Fechar </a>
        <a href="#" class="btn-ok-convidar"> OK </a>
      </div>
    </div>

    <div class="box-convidar-amigos-sucesso">
      <p class="texto-sucesso"> Convite Enviado com Sucesso! </p>
      <p> Compartilhe esta URL: </p>
      <input type="text" id="url-sucesso" name="url-sucesso" placeholder="URL" />

      <div class="btn-wrap">
        <a href="#" class="btn-fechar-convidar"> Fechar </a>
      </div>
    </div>


  </div>

  <div class="introducao">
    <form action="php/post-intro.php" method="post" id="form-intro">
      <p class="base">
        <?php echo ($trechointro); ?>
      </p>

      <p class="regras">
        Dê continuidade ao texto acima para criar sua introdução. 
        <br/>
        Máximo: <span>500 caracteres.</span>  Mínimo: <span class="min-carac">150 caracteres</span>
      </p>
      
      <textarea placeholder="Adicione o texto..." maxlength="500" id="addintro" name="addintro"></textarea>
      <input type="hidden" id="idhistoria" name="idhistoria" value="<?php echo $idhistoria?>"/>
      <input type="hidden" id="nomehistoria" name="nomehistoria" value="<?php echo $nomehistoria?>"/>
      <input type="hidden" id="generohistoria" name="generohistoria" value="<?php echo $generohistoria?>"/>
      <a class="btn-salvar" href="#">Salvar</a>

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