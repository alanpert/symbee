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

    $urlNovoTrecho = "novo-trecho.php?nome=" . $titulohistoriaclick . "&genero=" . $generohistoriaclick . "&criador=" . $criadorhistoriaclick . "&narrativa=" . $idnarrativa;
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
      echo "No rows returned.1";
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
      echo "No rows returned.2";
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





  include('header-interna.php'); 
?>

    <div class="banner interna single-banner">
    	<div class="container clearfix h-100">
        	<h1><?php echo($titulohistoriaclick); ?></h1>
            <h2 class="desc-title">Leia a história e continue com a criatividade!</h2>
        </div>
    </div>
    <div class="sub-menu-hist bg-negative">
    	<div class="container clearfix h-100 relative">
        	<ul class="itens-sub-menu">
            	<a><li class="ots-hists"><span class="element"></span><p>Outras histórias do autor</p></li></a>
                <li class="rating no-select">
                	<p>Média:</p>
                    <span class="star checked no-select"></span>
                    <span class="star checked no-select"></span>
                    <span class="star checked no-select"></span>
                    <span class="star checked no-select"></span>
                    <span class="star no-select"></span>
                </li>
                <li class="visu">
                	<p>Visualizações:</p>
                    <span>327</span>
                </li>
            </ul>
        	<ul class="list-outras cinco-item">
            	<a><li id="primeiro">Aventuras em alto mar</li></a>
            	<a><li>Quem não quer ganhar dinheiro?</li></a>
            	<a><li>Um dia sem você</li></a>
            	<a><li>Um dia sem você ll: esperança</li></a>
            	<a><li id="ultimo">Um dia sem você lll: reencontro</li></a>
            </ul>
        </div>
    </div>
    <div class="compartilhar-historia bg-dark-negative">
    	<div class="container clearfix h-100 relative">
        	<h4>Conte essa história nas redes</h4>
            <ul class="social-footer">
                <a href="#"><li id="facebook"></li><div class="icon"></div></a>
                <a href="#"><li id="twitter"></li><div class="icon"></div></a>
            </ul>
        </div>
    </div>
    <div class="single space">
    	<div class="container clearfix">
        	<div class="sidebar fourcol first">
                <h4 class="widgettitle t-margin-0">Gênero da história</h4>
				<div class="genero-historia" id="<?php echo ($generoicone); ?>">
                    <div class="icon-molde"></div>
                    <div class="icon"></div>
                    <h4><?php echo ($generohistoriaclick); ?></h4>
                </div>
                <p><!-- Quisque ac lorem neque. Nulla id neque dolor. Cras dignissim, libero sit amet malesuada posuere, ipsum enim aliquam ligula, a vehicula orci erat tristique nulla. --></p>
                <h4 class="widgettitle">Conheça os autores</h4>
                <ul class="outros-part-list">
                    <a href="homepage-logado.html"><li id="caue"><div class="tool-autor">Cauê Ancona</div></li></a>
                    <a href="homepage-logado.html"><li id="nadja"><div class="tool-autor">Nadja Cunha</div></li></a>
                    <a href="homepage-logado.html"><li id="robinson"><div class="tool-autor">Robinson Jr.</div></li></a>
                </ul>
            </div>
            <div class="single-content eightcol last">
                <p class="byline autor">Contada por <a href="#"><strong><?php echo ($nomeinteirocriador); ?></strong></a><!--  <span class="date">::</span> 12 de setembro de 2014 --></p>
                <div class="clearfix"></div>
                <p class="destaque intro"><?php echo ($textointro); ?></p>
                <!-- <div class="primeira-letra">L</div><p>orem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor.</p> -->
                <div class="clearfix"></div>


                <?php 
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
                      echo ('

                        <div class="trecho">
                          <div class="threecol first">
                              <p><strong>Autor:</strong> ' . $usuariotrecho . '</p>
                              <input type="hidden" class="indicetrecho" name="indicetrecho" value="' . $row[indice] . '" />
                                <p class="nota clearfix"><strong class="float-left">Nota:</strong>
                                <span class="star checked no-select"></span>
                                <span class="star checked no-select"></span>
                                <span class="star checked no-select"></span>
                                <span class="star no-select"></span>
                                <span class="star no-select"></span></p>
                                <div class="clearfix"></div>

                      ');
                      
                      if ($row[indice] == 1) {                
                      } else {
                        // Pegando Desafio do trecho
                        try {
                          $stmt = $connection->prepare('SELECT * FROM tblDesafios WHERE nivel = :nivel');
                          $stmt->execute(array('nivel' => $row[indice]));
                           
                          $resultdesafios = $stmt->fetchAll();

                          if ( count($resultdesafios) ) { 
                            foreach($resultdesafios as $rowdesafios) {
                              //print_r($rowdesafios);
                              $desafiotrecho = $rowdesafios[desafio];
                            }   
                          } else {
                            echo "No rows returned.";
                          }

                        } catch(PDOException $e) {
                          echo 'ERROR: ' . $e->getMessage();
                        }

                        echo ('      

                                  <a class="ver-desafio">Ver desafio</a>&nbsp;|
                                  <div class="mask"></div>
                                  <div class="box-desafio box">
                                    <h3>Desafio do trecho</h3>
                                      <p class="destaque"> ' . $desafiotrecho . '
                                      <br/><br/>
                                      Palavra-chave: ' . $row[palavrachave] . '
                                      </p>
                                  </div>
                        ');
                      }

                      echo ('

                                <a>Continuar</a>
                            </div>
                            <div class="ninecol last">
                              <div class="line"></div>
                                <p>' . $row[texto] . '</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                      ');
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


                <!-- <img src="library/img/placeholder/img-hist-content.jpg" alt="Batalha de gasmarrar" title="Batalha de gasmarrar" />
                <p class="desc-img">Figura 1: A batalha de Gasmarrar</p> -->

           </div>
        </div>
    </div>
    <div class="bg-red small-space c2a-call">
    	<div class="container clearfix">
        	<div class="eightcol first">
                <h4>Sua mãe sempre disse que você é criativo?<br /><span>Pois então mostre para todo mundo que ela estava falando a verdade e comece uma nova história!</span></h4>
            </div>
            <div class="fourcol last">
                <a href="criar-historia.html" class="button large inline t-margin-20">Começar uma história</a>
            </div>
        </div>
    </div>
   
 <?php include 'footer.php'; ?>