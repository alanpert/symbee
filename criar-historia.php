<?php 
  include('php/conect.php');

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
      echo("<script>window.location = 'http://symbee.com.br/';</script>");
    }
  }


  include('header-interna.php'); 

?>
    <div class="criar-content space">
    	<div class="container clearfix relative">
        	<h1 class="color-white">Criar nova história</h1>
            <h2 class="desc-title color-white">Preencha as informações abaixo e começe a desenvolver a sua história</h2>
        	<div class="box-criar-historia clearfix">
            	<form action="#" id="criar-form" method="post">
                	<input type="text" id="name-historia" placeholder="Insira o nome da história..." />
                    <p class="desc-input">O nome da história poderá ser mudado ao decorrer da história</p>
                    <a class="selecione-cat no-select">Selecione o gênero*</a>
                    <p class="desc-input">Escolha o gênero que guiará sua história</p>
                    <ul class="fake-select">
                    	<li>Aventura e ação</li>
                    	<li>Comédia</li>
                    	<li>Fantasia</li>
                    	<li>Ficção científica</li>
                    	<li>Romance</li>
                    	<li>Terror</li>
                    </ul>
                    <input type="hidden" id="genero-historia" name="genero-historia" />
                    
                    <div class="radios t-margin-20">
                    	<h3 class="b-margin-20">Escolha o número de jogadores</h3>
                        <label for="1-jogador">1 jogador</label>
                        <input type="radio" name="num-jogadores" id="1-jogador" value="1 jogador" />
                        <label for="2-jogadores">2 jogadores</label>
                        <input type="radio" name="num-jogadores" id="2-jogadores" value="2 jogadores" />
                        <label for="3-jogadores">3 jogadores</label>
                        <input type="radio" name="num-jogadores" id="3-jogadores" class="ultimo" value="3 jogadores" />
                    </div>
                    <a href="inicio-historia.html" class="button yellow float-right t-margin-30 b-criar">Criar</a>
                </form>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>