<?php 
  include('php/conect.php');
  include('php/teste-login.php');

	$nomehistoria = $_POST["name-historia"];
  $generohistoria = $_POST["genero-historia"];
  $numjogadores = $_POST["num-jogadores"];

  $nivelcomeco = 1;

  // Definindo o Mini Icone de Gênero
  $generoicone = "";
  switch ($generohistoria) {
    case "Ação e Aventura":
      $generoicone = "acao";
      break;

    case "Comédia":
      $generoicone = "comedia";
      break;

    case "Fantasia":
      $generoicone = "fantasia";
      break;

    case "Ficção científica":
      $generoicone = "ficcao";
      break;

    case "Romance":
      $generoicone = "romance";
      break;

    case "Terror":
      $generoicone = "terror";
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




  include('header-interna.php'); 
 ?>

<div class="banner interna single-banner">
	<div class="container clearfix h-100">
		<h1> <?php echo ($nomehistoria); ?> </h1>
		<h2 class="desc-title">Boa! Você deu início a uma nova história. Toda história precisa de uma introdução, siga abaixo e crie a sua.</h2>
	</div>
</div>
<div class="sub-menu-hist bg-negative">
	<div class="container clearfix h-100 relative">
		<ul class="itens-sub-menu">
			<a>
				<li class="ots-hists"><span class="element"></span><p>Configurações da história</p></li>
			</a>
			<li class="rating no-select">
				<p>Média:</p>
				<span class="star no-select"></span>
				<span class="star no-select"></span>
				<span class="star no-select"></span>
				<span class="star no-select"></span>
				<span class="star no-select"></span>
			</li>
			<li class="visu">
				<p>Rodada:</p>
				<span>1</span>
			</li>
		</ul>
			<ul class="list-outras quatro-item">
				<a><li id="primeiro">Editar nome</li></a>
				<a><li id="editar-capa">Editar capa</li></a>
				<a><li>Convidar amigos</li></a>
				<a><li class="button-back-page">Voltar para o perfil</li></a>
			</ul>
	</div>
</div>
<div class="instrucoes-historia tres-item bg-dark-negative">
	<div class="container clearfix h-100 relative text-center">
    	<h4>Instruções da rodada</h4>
        <p>Caractéres: <span class="color-yellow">150~500</span></p>
        <p>Adicionar: <span class="color-yellow">Capa da história</span></p>
        <p>Gênero: <span class="color-yellow"><?php echo ($generohistoria); ?></span></p>
    </div>
</div>
<div class="bg-gray space inicio-historia">
	<div class="container relative clearfix">
        <div class="genero-historia" id="<?php echo ($generoicone); ?>">
            <div class="icon-molde"></div>
            <div class="icon"></div>
            <h4><?php echo ($generohistoria); ?></h4>
        </div>
        <div class="clearfix"></div>
        <p class="destaque small b-margin-0">
        	<?php echo ($trechointro); ?>
        </p>
    </div>
</div>
<div class="space inicio-historia">
	<div class="container relative clearfix">
		<form action="php/post-intro.php" method="post" id="form-intro">
    	<p class="instrucoes">De continuidade ao texto acima para criar sua introdução. Na primeira rodada você tem direito de usar até 500 caracteres, possuindo um <span class="min-caracteres">mínimo de 150.</span></p>
    	<textarea placeholder="Insira sua introdução..." maxlength="500" id="addintro" name="addintro"></textarea>
    	<input type="hidden" id="idhistoria" name="idhistoria" value="<?php echo $idhistoria?>"/>
      <input type="hidden" id="nomehistoria" name="nomehistoria" value="<?php echo $nomehistoria?>"/>
      <input type="hidden" id="generohistoria" name="generohistoria" value="<?php echo $generohistoria?>"/>
    	<p class="contador-caracteres">0</p>

        <div class="clearfix"></div>
        <div class="text-center t-margin-50">
            <a class="button-back-page button inline r-margin-60">Voltar para o perfil</a>
            <a class="button yellow inline btn-salvar">Postar introdução</a>
        </div>
      </form>
    </div>
</div>



 <?php include 'footer.php'; ?>