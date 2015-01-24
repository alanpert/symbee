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

    $ulrVoltar = "single-historia.php?nome=" . $titulohistoriaclick . "&genero=" . $generohistoriaclick . "&criador=" . $criadorhistoriaclick . "&narrativa=" . $idnarrativa;

  }
  else {
    echo("<script>window.location = 'criar-historia.php';</script>");
  }

  // VARIAVEIS PARA CONFIG HISTORIA
  $nomehistoria = $titulohistoriaclick;
  $generohistoria = $generohistoriaclick;


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

    case "Ficção Científica":
      $generoicone = "ficcao";
      break;

    case "Romance":
      $generoicone = "romance";
      break;

    case "Terror":
      $generoicone = "terror";
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





  include('header-interna.php'); 
 ?>

<div class="banner interna single-banner">
	<div class="container clearfix h-100">
		<h1> <?php echo ($nomehistoria); ?> </h1>
		<h2 class="desc-title">Continue com a criação da narrativa!</h2>
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
				<span><?php echo ($numrodada); ?></span>
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
	<div class="container clearfix relative text-center">
    	<h4>Instruções da rodada</h4>
        <p>Caracteres: <span class="color-yellow"><?php echo ($numMinCaracteres . "~" . $numMaxCaracteres); ?></span></p>
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
        	<?php echo ($desafiotexto); ?>
        </p>
        <p class="palavra-chave">Palavra chave:<br /><span><?php echo($palavrachave); ?></span></p>
    </div>
</div>
<div class="space inicio-historia">
	<div class="container relative clearfix">
		<form action="php/post-novo-trecho.php" method="post" id="form-intro">
    	<p class="instrucoes">De continuidade ao texto acima para criar sua introdução. Na primeira rodada você tem direito de usar até <?php echo ($numMaxCaracteres); ?> caracteres, possuindo um <span class="min-caracteres">mínimo de <?php echo ($numMinCaracteres); ?>.</span></p>
    	<textarea placeholder="Adicione o texto..." maxlength="<?php echo ($numMaxCaracteres); ?>" id="addnovotrecho" name="addnovotrecho"></textarea>
      <input type="hidden" id="mincaracteres" name="mincaracteres" value="<?php echo ($numMinCaracteres); ?>"/>
      <input type="hidden" id="idhistoria" name="idhistoria" value="<?php echo ($idnarrativa); ?>"/>
      <input type="hidden" id="nomehistoria" name="nomehistoria" value="<?php echo ($nomehistoria); ?>"/>
      <input type="hidden" id="generohistoria" name="generohistoria" value="<?php echo ($generohistoria); ?>"/>
      <input type="hidden" id="historiaindice" name="historiaindice" value="<?php echo ($numrodada); ?>"/>
      <input type="hidden" id="palavrachavetrecho" name="palavrachavetrecho" value="<?php echo ($palavrachave); ?>"/>
    	<p class="contador-caracteres">0</p>

        <div class="clearfix"></div>
        <div class="text-center t-margin-50">
            <a class="button-back-page button inline r-margin-60">Voltar para o perfil</a>
            <a class="button yellow inline btn-salvar-novo-trecho">Postar introdução</a>
        </div>
      </form>
    </div>
</div>



 <?php include 'footer.php'; ?>