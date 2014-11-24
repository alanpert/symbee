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
    <p> Rodada: <span><?php echo($numrodada); ?></span> </p>
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