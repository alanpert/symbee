<?php 
  include('fbconect.php');
  include('php/conect.php');

  if ($session) {
    if(!isset($error)) {
    //no error
    $userPictureURL = "http://graph.facebook.com/".$userID."/picture?type=large";

    $sthandler = $connection->prepare("SELECT email FROM usuarios WHERE email = :email");
    $sthandler->bindParam(':email', $_SESSION['user']);
    $sthandler->execute();

      if($sthandler->rowCount() > 0) {
        echo("<script>console.log('PHP: Usuário já cadastrado.');</script>");
      } else {
        //Securly insert into database
        $sql = "INSERT INTO usuarios(
                                  email,
                                  nome,
                                  foto) VALUES (
                                  :email, 
                                  :nome, 
                                  :foto)";
                                          
        $stmt = $connection->prepare($sql);
                                                      
        $stmt->bindParam(':email', $userEmail, PDO::PARAM_STR);       
        $stmt->bindParam(':nome', $userName, PDO::PARAM_STR); 
        $stmt->bindParam(':foto', $userPictureURL, PDO::PARAM_STR);
     
                                              
        $stmt->execute(); 
        echo("<script>console.log('PHP: Usuário adicionado ao Banco de Dados.');</script>");
        echo("<script>window.location.reload(true);</script>");
      }

    } else {
      echo "error occured: ".$error;
      exit();
    }
  }


  if($_COOKIE['user'] != "") { 
    echo("<script>console.log('PHP: COOKIE COM EMAIL.');</script>");
    $cookieemail = $_COOKIE['user'];
    //echo ($cookieemail);
    echo("<script>console.log('PHP: HOME:Cookie Email: ".$cookieemail."');</script>");
    

    // CONECTAR NO BD E VERIFICAR O LOGIN
    try {
      $stmt = $connection->prepare('SELECT * FROM usuarios WHERE email = :email');
      $stmt->execute(array('email' => $cookieemail));
     
      $result = $stmt->fetchAll();
     
      if ( count($result) ) { 
        foreach($result as $row) {
          echo("<script>console.log('PHP: Usuário já cadastrado.');</script>");
          //print_r($row);
          //echo("Olá, ".$row[1].". Seja Bem-Vindo!");
          //echo("<img src='".$row[2]."' alt='' />");
          $varemail = $row[0];
          $varnome = $row[1];
          $varurlfoto = $row[2];
        }   
      } else {
        echo "No rows returned.";
      }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


  } else {
    echo("<script>console.log('PHP: COOKIE ERRo.');</script>");
    if ($session) {
      echo("<script>window.location.reload(true);</script>");
    } else {
      echo("<script>window.location = 'index.php';</script>");
    }
  }

  include('header-on.php');

?>

<script type="text/javascript">
	$(document).ready(function(e) {
        $('.site').fadeIn(600);
    });
</script>

    <div class="ler-uma-historia box">
    	<h4>Ler uma história</h4>
        <div class="genero-historia" id="ler-uma-historia">
            <div class="icon-molde"></div>
            <div class="icon"></div>
        </div>
        <div class="clearfix"></div>
        <a class="selecione-cat no-select">Selecione o gênero</a>
        <p class="desc-input">Escolha o gênero que guiará sua história</p>
        <ul class="fake-select">
            <li>Aventura e ação</li>
            <li>Comédia</li>
            <li>Fantasia</li>
            <li>Ficção científica</li>
            <li>Romance</li>
            <li>Terror</li>
        </ul>
        <div class="text-center t-margin-40"><a href="#" class="button inline yellow">Ler</a></div>
    </div>
    <div class="rank-content space">
    	<div class="container clearfix">
        	<h2>Leia as histórias mais votadas</h2>
        	<p class="desc-title">Precisa de inspiração? Veja o que os beezers mais votados estão fazendo e saiba como entrar no hall da fama das abelhas.</p>
            <ul class="rank-historias">
            	<!-- História 1 -->
            	<li id="hist1">
                	<a href="single-historia.php"><div class="hist-picture"></div></a>
                </li>
                <div id="hist1-content" class="content-hist left">
                	<h4>O cavaleiro honrado</h4>
                    <p class="hist-info"><strong>Gênero:</strong> Ação e aventura | <strong>Criador:</strong> CaahZin</p>
                    <p class="hist-resumo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id est et leo mattis pulvinar. Mauris sed hendrerit tortor.</p>
                </div>
                <!--------------->
                
            	<!-- História 2 -->
            	<li id="hist2">
                	<a href="single-historia.php"><div class="hist-picture"></div></a>
                </li>
                <div id="hist2-content" class="content-hist right">
                	<h4>A última corrida</h4>
                    <p class="hist-info"><strong>Gênero:</strong> Ação e aventura | <strong>Criador:</strong> RaphaLucena92</p>
                    <p class="hist-resumo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id est et leo mattis pulvinar. Mauris sed hendrerit tortor.</p>
                </div>
                <!--------------->
                
            	<!-- História 3 -->
            	<li id="hist3">
                	<a href="single-historia.php"><div class="hist-picture"></div></a>
                </li>
                <div id="hist3-content" class="content-hist left">
                	<h4>Dragões valentes II: o coração de fogo</h4>
                    <p class="hist-info"><strong>Gênero:</strong> Fantasia | <strong>Criador:</strong> MikaMiku</p>
                    <p class="hist-resumo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id est et leo mattis pulvinar. Mauris sed hendrerit tortor.</p>
                </div>
                <!--------------->

            	<!-- História 4 -->
            	<li id="hist4">
                	<a href="single-historia.php"><div class="hist-picture"></div></a>
                </li>
                <div id="hist4-content" class="content-hist right">
                	<h4>Night whispers</h4>
                    <p class="hist-info"><strong>Gênero:</strong> Terror | <strong>Criador:</strong> Cidok</p>
                    <p class="hist-resumo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id est et leo mattis pulvinar. Mauris sed hendrerit tortor.</p>
                </div>
                <!--------------->
                
            	<!-- História 5 -->
            	<li id="hist5">
                	<a href="single-historia.php"><div class="hist-picture"></div></a>
                </li>
                <div id="hist5-content" class="content-hist left">
                	<h4>Peixolândia</h4>
                    <p class="hist-info"><strong>Gênero:</strong> Comédia | <strong>Criador:</strong> Rita002</p>
                    <p class="hist-resumo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id est et leo mattis pulvinar. Mauris sed hendrerit tortor.</p>
                </div>
            </ul>
        </div>
    </div>
    <div class="generos-area space bg-gray">
    	<div class="container clearfix">
        	<h2>Conheça os genêros</h2>
        	<p class="desc-title">Está em dúvida de que história fazer? Conheça os gêneros disponíveis aos beezers</p>
            <ul class="generos-historias">
            	<li id="terror">
                	<div class="icon-molde"></div>
                    <div class="icon"></div>
                    <h4>Terror</h4>
                </li>
                
            	<li id="comedia">
                	<div class="icon-molde"></div>
                    <div class="icon"></div>
                    <h4>Comédia</h4>
                </li>
                
            	<li id="romance">
                	<div class="icon-molde"></div>
                    <div class="icon"></div>
                   <h4>Romance</h4>
                </li>
                
            	<li id="fantasia">
                	<div class="icon-molde"></div>
                    <div class="icon"></div>
                    <h4>Fantasia</h4>
                </li>
                
            	<li id="acao">
                	<div class="icon-molde"></div>
                    <div class="icon"></div>
                    <h4>Aventura e Ação</h4>
                </li>
                
            	<li id="ficcao">
                	<div class="icon-molde"></div>
                    <div class="icon"></div>
                    <h4>Ficção Científica</h4>
                </li>
            </ul>
            <div class="text-center t-margin-50">
                <a href="como-funciona.php" class="button inline">Entenda como funciona</a>
                <a href="criar-historia.php" class="l-margin-30 button yellow inline">Começar uma história</a>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>