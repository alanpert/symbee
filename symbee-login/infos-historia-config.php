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
      <li><a href="#">Convidar Amigos</a></li>
      <li><a href="#">Editar Capa</a></li>
      <li><a href="home.php">Voltar</a></li>
    </ul>
  </div>
  <div class="info-rodada">
    <p> Rodada: <span><?php echo($numrodada); ?></span> </p>
    <img src="<?php echo ($urlminiicon); ?>" width="80" height="75" alt="<?php echo ($generohistoria); ?>" class="mini-icon-genero">
  </div>

</div>