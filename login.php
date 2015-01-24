<?php
    include('fbconect.php');
    include('header-index.php'); 
?>

<div class="login">
    <div class="container clearfix relative h-100">
        <a href="index.php" class="logo-symbee">
            <h1 id="logo-text">
                Symbee, narrativas colaborativas
                <img src="library/img/elementos/logo-symbee.png" alt="Symbee | Narrativas colaborativas" title="Symbee | Narrativas colaborativas" />
            </h1>
        </a>
        <div class="login-box">
            <h2 class="margin-0 b-margin-30 login-title">Bem vindo, escritor!</h2>
            <p class="desc">Entre com o facebook ou conheça-nos sem compromisso.</p>
             <?php 
                $params = array(
                  "scope" => "public_profile,email");
                echo '<a href="' . $helper->getLoginUrl($params) . '" class="login-button face t-margin-30 b-margin-30">Entrar com o Facebook</a>'; 
              ?>
            <a href="homepage.php" class="login-button">Continuar sem cadastro</a>
        </div>
    </div>
</div>

</body>
</html>

