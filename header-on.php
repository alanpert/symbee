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
                        <a href="#"><li>Entenda <span>&rsaquo;</span></li></a>
                        <a href="como-funciona.php"><li class="no-border">Sobre a jogabilidade</li></a>
                        <a href="projeto.php"><li class="no-border">Sobre o projeto</li></a>
                    </ul>
                    <ul class="menu-principal clearfix">
                        <a href="#"><li>Fale conosco <span>&rsaquo;</span></li></a>
                        <a href="#"><li class="no-border">Sobre dúvidas</li></a>
                        <a href="#"><li class="no-border">Sobre colaborar</li></a>
                    </ul>
                </div>
                <div class="fivecol last">
                	<div class="menu-login-area">
                        <a href="ler-historia.php" class="ler-link">Ler uma história</a>
                        <a href="criar-historia.php">Nova história</a>
                        <a href="deletecookie.php">Sair</a>
                    </div>
                    <input type="text" placeholder="Pesquise..." id="site-search" />
                    <ul class="social-media">
                    	<a href="#"><li id="facebook"></li></a>
                    	<a href="#"><li id="pinterest"></li></a>
                    	<a href="#"><li id="twitter"></li></a>
                    	<a href="#"><li id="instagram"></li></a>
                    	<a href="#"><li id="rss"></li></a>
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
                    <a class="infos-gerais">Ler uma história</a>
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
            	<li id="m-his1">
                	<div class="img"></div>
                    <h3>O cavaleiro honrado</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id est et leo mattis pulvinar. Mauris sed hendrerit tortor.</p>
                    <a class="editor-links">Editar</a>
                    <a class="editor-links">Excluir</a>
                </li>
            	<li id="m-his2">
                	<div class="img"></div>
                    <h3>A última corrida</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id est et leo mattis pulvinar. Mauris sed hendrerit tortor.</p>
                    <a class="editor-links">Editar</a>
                    <a class="editor-links">Excluir</a>
                </li>
            	<li id="m-his3">
                	<div class="img"></div>
                    <h3>Dragões valentes ll: O coração de fogo</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id est et leo mattis pulvinar. Mauris sed hendrerit tortor.</p>
                    <a class="editor-links">Editar</a>
                    <a class="editor-links">Excluir</a>
                </li>
            </ul>
            <div class="text-center t-margin-40">
                <a href="#" class="button inline">Ver todas</a>
                <a href="criar-historia.php" class="l-margin-30 button yellow inline">Criar nova</a>
            </div>
        </div>
    </div>
