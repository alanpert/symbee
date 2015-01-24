<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Symbee | Narrativas colaborativas</title>
</head>

<script src="library/js/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<!-- LESS -->
<link rel="stylesheet" type="text/css" href="library/less/base.css" />  
<link rel="stylesheet" type="text/css" href="library/js/lightbox/source/jquery.fancybox.css" />   
<script src="library/js/less-1.7.5.min.js"></script>
<script type="text/javascript" src="library/js/fx.js"></script>
<script type="text/javascript" src="library/js/scroll/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="library/js/lightbox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="library/js/lightbox/source/helpers/jquery.fancybox-media.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>

<body>
<div class="site">
	<div class="mask"></div>
    <div class="ler-uma-historia box">
        <h4>Ler uma história</h4>
        <div class="genero-historia" id="ler-uma-historia">
            <div class="icon-molde"></div>
            <div class="icon"></div>
        </div>
        <div class="clearfix"></div>
        <a class="selecione-cat no-select">Selecione o gênero</a>
        <p class="desc-input">Escolha o gênero que guiará sua história</p>
        <form action="ler-historia.php" id="ler-historia" method="post">
            <ul class="fake-select">
              <li>Ação e Aventura</li>
              <li>Comédia</li>
              <li>Fantasia</li>
              <li>Ficção Científica</li>
              <li>Romance</li>
              <li>Terror</li>
            </ul>
            <input type="hidden" id="genero-historia-ler" name="genero-historia-ler" />
        </form>
        <div class="text-center t-margin-40"><a href="#" class="button inline yellow" id="ler-btn">Ler</a></div>
    </div>

   <header class="logged">
        <div class="container relative clearfix h-100">
            <a class="login-drop">Ver perfil</a>
            <div class="fivecol first">
                <a href="homepage-logado.php" class="logo-symbee-site">
                    <img src="library/img/elementos/logo-symbee-positivo.png" alt="Symbee | Narrativas colaborativas" title="Symbee | Narrativas colaborativas" />
                </a>
            </div>
            <div class="sevencol last">
                <div class="sevencol first">
                    <ul class="menu-principal first clearfix">
                        <a href="#" class="c-default"><li>Entenda <span>&rsaquo;</span></li></a>
                        <a href="como-funciona.php"><li class="no-border">Sobre a jogabilidade</li></a>
                        <a href="sobre-projeto.php"><li class="no-border">Sobre o projeto</li></a>
                    </ul>
                    <ul class="menu-principal clearfix">
                        <a href="#" class="c-default"><li>Fale conosco <span>&rsaquo;</span></li></a>
                        <a href="contato.php"><li class="no-border">Sobre dúvidas</li></a>
                        <a href="contato.php"><li class="no-border">Sobre colaborar</li></a>
                    </ul>
                </div>
                <div class="fivecol last">
                    <div class="menu-login-area">
                        <a href="#" class="ler-link">Ler uma história</a>
                        <a href="criar-historia.php">Nova história</a>
                        <a href="deletecookie.php">Sair</a>
                    </div>
                    <input type="text" placeholder="Pesquise..." id="site-search" />
                    <ul class="social-media">
                        <a href="https://www.facebook.com/symbeeoficial" target="_blank"><li id="facebook"></li></a>
                        <a href="https://www.youtube.com/user/symbeenarrativas" target="_blank"><li id="youtube"></li></a>
                        <a href="https://twitter.com/symbee_NC" target="_blank"><li id="twitter"></li></a>
                        <a href="#" target="_blank"><li id="instagram"></li></a>
                        <a href="#" target="_blank"><li id="rss"></li></a>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    
    <div class="area-perfil bg-negative open">
        <div class="container clearfix relative h-100">
            <div class="fourcol first" style="height: 20px;">
                <p class="infos-gerais">Histórias participadas: <span>18</span></p>
                <p class="infos-gerais">Gênero favorito: <span>Terror</span></p>
                <p class="infos-gerais no-select">
                    <a id="ver-hists" class="infos-gerais no-select">Ver minhas histórias</a>
                </p>
                <p class="infos-gerais">
                    <a class="infos-gerais ler-link-perfil">Ler uma história</a>
                </p>
                <div class="box-sobre-user">
                    <textarea maxlength="200" placeholder="Escreva o que está pensando..."></textarea>
                    <a id="save-text-sobre" class="action-text yellow relative">Salvar</a>
                    <a id="edit-text-sobre" class="action-text first-l relative">Editar</a>
                </div>
            </div>
            <div class="fourcol text-center user-infos-coluna">
                <div class="foto" style="background: url('<?php echo ($varurlfoto); ?>') center no-repeat">
                  <div class="foto-mask"></div>
              </div>
            	<!-- <img src="library/img/placeholder/user-place-img.png" alt="Cauê Ancona" title="Cauê Ancona" /> -->
                <h2 class="h3"><?php echo ($varnome); ?></h2>
                <p><?php echo ($varemail); ?></p>
                <a href="criar-historia.php" class="button yellow">Nova história</a>
            </div>
            <div class="fourcol last">
                <h3>Atualizações</h3>
                <ul class="list-attualizacoes">
                    <li class="clearfix">
                        <div class="img-att" id="user4"></div>
                        <p class="text-att"><strong>Nadja Cunha</strong> te convidou para entrar em um grupo.</p>
                        <a class="action-text">Recusar</a>
                        <a class="action-text yellow first-l">Aceitar</a>
                    </li>
                    <li class="clearfix">
                        <div class="img-att" id="user2"></div>
                        <p class="text-att"><strong>Robinson Jr</strong> adicionou um novo trecho na história.</p>
                        <a class="action-text yellow">Visualizar</a>
                    </li>
                    <li class="clearfix">
                        <div class="img-att" id="user3"></div>
                        <p class="text-att"><strong>Cris Moraes</strong> comentou em um trecho da sua história.</p>
                        <a class="action-text yellow">Visualizar</a>
                    </li>
                    <li class="clearfix">
                        <div class="img-att" id="user4"></div>
                        <p class="text-att"><strong>Nadja Cunha</strong> Solicitou a atualização do título da sua história.</p>
                        <a class="action-text yellow">Visualizar</a>
                    </li>
                    <li class="clearfix">
                        <div class="img-att" id="user2"></div>
                        <p class="text-att"><strong>Robinson Jr</strong> te convidou para entrar em um grupo.</p>
                        <a class="action-text">Recusar</a>
                        <a class="action-text yellow first-l">Aceitar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="area-historias bg-dark-negative open">
    	<div class="container clearfix relative h-100">
        	<div class="close-area negative">
            	<div class="close-molde"></div>
                <div class="close-button"></div>
            </div>
        	<h2 class="b-margin-50">Histórias em andamento</h2>
        	<ul class="list-minhas-hists">

          <?php
            // TRAZENDO AS NARRATIVAS RELACIONADAS COM O USUARIO
            try {
              $stmt = $connection->prepare('SELECT * FROM tblNarrativas WHERE criador = :email');
              $stmt->execute(array('email' => $cookieemail));
             
              $result = $stmt->fetchAll();
             
              $numHistorias = count($result);


              if ( $numHistorias > 0 ) {
                $historiasrestantes = 0;
                $conthistorias = 0;
                $vertodas = 0;

                foreach($result as $row) {
                  if ($conthistorias < 3) {
                    $idnarrativa = $row[id];
                    $narrativacriador = $row[criador];
                    $narrativanome = $row[nome];
                    $narrativagenero = $row[tema];
                    $urlhistoria = "single-historia.php?nome=" . $narrativanome . "&genero=" . $narrativagenero . "&criador=" . $narrativacriador . "&narrativa=" . $idnarrativa;

                    echo ('
                    <li id="m-his1">
                      <a class="editor-links no-decoration" href="' . $urlhistoria . '">
                          <div class="img"></div>
                          <h3>' . $narrativanome . '</h3>
                          <p>
                            Gênero: ' . $narrativagenero . ' <br/>
                            Criador: ' . $narrativacriador . '
                          </p>
                          <a class="editor-links" href="' . $urlhistoria . '">Editar</a>
                      </a>
                    </li>
                    ');
                    $conthistorias++;

                  } else {
                    if ($vertodas == 0) {
                      $vertodas = 1;
                    }
                  }


                }



              } else {
                echo ("<p class='nao-participando'> Você atualmente não está participando de nenhuma história. <br/><br/> </p>");
              }





            } catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
            }

          ?>

            </ul>
            <div class="text-center t-margin-40">
                <?php 
                  if ($vertodas == 1) {
                    echo ('
                      <a href="#" class="button inline r-margin-30">Ver todas</a>
                    ');
                  }
                ?>
                <a href="criar-historia.php" class="button yellow inline">Criar nova</a>
            </div>
        </div>
    </div>
