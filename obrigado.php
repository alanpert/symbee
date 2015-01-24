<?php 
  include('php/conect.php');
  include('php/teste-login.php');

  include 'header-interna.php'; 

?>
    <div class="criar-content space">
    	<div class="container clearfix relative">
        	<h1 class="color-white">Obrigado pelo contato</h1>
            <h2 class="desc-title color-white">Recebemos sua mensagem e responderemos o quanto antes. Enquanto isso, crie uma nova história!</h2>
        	<div class="box-criar-historia clearfix">
            	<form action="inicio-historia.php" id="criar-form" method="post">
                    <input type="text" name="name-historia" id="name-historia" placeholder="Insira o nome da história..." />
                    <p class="desc-input">O nome da história poderá ser mudado ao decorrer da história</p>
                    <a class="selecione-cat no-select">Selecione o gênero*</a>
                    <p class="desc-input">Escolha o gênero que guiará sua história</p>
                    <ul class="fake-select">
                        <li>Ação e Aventura</li>
                        <li>Comédia</li>
                        <li>Fantasia</li>
                        <li>Ficção Científica</li>
                        <li>Romance</li>
                        <li>Terror</li>
                    </ul>
                    <input type="hidden" id="genero-historia" name="genero-historia" />
                    
                    <div class="radios t-margin-20">
                      <h3 class="b-margin-20">Escolha o número de jogadores</h3>
                        <label for="1-jogador">Apenas eu</label>
                        <input type="radio" name="num-jogadores" id="1-jogador" value="1 jogador" />
                        <label for="2-jogadores">1 colaborador</label>
                        <input type="radio" name="num-jogadores" id="2-jogadores" value="2 jogadores" />
                        <label for="3-jogadores">2 colaboradores</label>
                        <input type="radio" name="num-jogadores" id="3-jogadores" class="ultimo" value="3 jogadores" />
                    </div>
                    <a href="#" class="button yellow float-right t-margin-30 b-criar" id="btncriar">Criar</a>
                </form>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>