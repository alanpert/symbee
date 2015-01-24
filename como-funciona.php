<?php 
  include('php/conect.php');
  include('php/teste-login.php');

  include 'header-interna.php'; 

?>
<script type="text/javascript" src="library/js/fx-como-funciona.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('header').removeClass('logged');
    });
</script>
<style>
	.area-historias,.area-perfil,.login-drop { display: none; }
</style>
    <div class="box-desafio box">
    	<h3>Desafio do trecho</h3>
        <p class="destaque">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
    </div>
    <div class="nav-como-funciona bg-negative">
    	<div class="container clearfix relative">
        	<div class="hover-effect"></div>
        	<ul class="nav-funciona">
            	<a class="cadastrar"><li><span>01</span>. Cadastre-se</li></a>
            	<a class="criar-historia"><li><span>02</span>. Criar história</li></a>
            	<a class="desafios"><li><span>03</span>. Desafios</li></a>
            	<a class="contar-historia"><li><span>04</span>. Conte</li></a>
            	<a class="comece-agora"><li><span>05</span>. Começar!</li></a>
            </ul>
        </div>
    </div>
    <div class="bg-yellow mega-space relative">
    	<div id="cadastrar" class="anchor-div"></div>
    	<div class="funciona-section container clearfix relative left-funciona">
        	<h2><span>01</span> - Cadastre-se</h2>
            <div class="content-funciona">
                <p>Primeiramente cadastre-se em nossa plataforma! Para facilitar a sua vida e fazer com que o cadastro não seja uma coisa chata, o Symbee permite o registro apenas utilizando o facebook. O cadastro é gratuito e não pretendemos mudar isso! Para de ser bunda mole, cadastre-se e siga o passo a passo desta página para entender melhor essa maravilha.</p>
            </div>
            <img src="library/img/elementos/cadastre-se.png" class="funciona-img" alt="Cadastre-se gratuitamente" title="Cadastre-se gratuitamente" />
        </div>	
    </div>
    <div class="bg-red mega-space relative">
    	<div id="criar-historia" class="anchor-div"></div>
    	<div class="funciona-section container clearfix relative right-funciona">
        	<h2><span>02</span> - Crie uma história</h2>
            <div class="content-funciona">
                <p>Após cadastrado você estará habilitado a ler e dar vida a novas histórias. Disponibilizamos milhares de botões que te levam para a página de criação. Nela você decide o nome da sua engenhoca, o gênero desejado e o número de participantes. Depois disso fica fácil - é só convidar seus amigos (se quiser) e começar a contar sua história.</p>
            </div>
            <img src="library/img/elementos/criar-historia.png" class="funciona-img" alt="Crie sua história e chame amigos" title="Crie sua história e chame amigos" />
        </div>	
    </div>
    <div class="bg-black mega-space relative">
    	<div id="desafios" class="anchor-div"></div>
    	<div class="funciona-section container clearfix relative left-funciona">
        	<h2><span>03</span> - Realize os desafios</h2>
            <div class="content-funciona">
                <p>Ao criar uma nova história, nós daremos como base uma introdução e a cada trecho que você e/ou sua equipe escrever nós mandamos um desafio, que vai evoluindo com o passar dos turnos! O Symbee libera 6 gêneros diferentes para você mergulhar: Aventura e ação, Comédia, Fantasia, Ficção científica, Romance e Terror.</p>
            </div>
            <img src="library/img/elementos/realize-desafios.png" class="funciona-img" alt="Enfrente os desafios" title="Enfrente os desafios" />
        </div>	
    </div>
    <div class="bg-blue mega-space relative">
    	<div id="contar-historia" class="anchor-div"></div>
    	<div class="funciona-section container clearfix relative right-funciona">
        	<h2><span>04</span> - Espalhe sua história</h2>
            <div class="content-funciona">
                <p>Após terminar sua história, não fique calado! Compartilhe ela nas principais redes sociais existentes que a web nos proporciona. Além disso, ao finalizar sua história ela automáticamente é publicada em nossa plataforma e se torna disponível para qualquer beezer ler! Chega de mimimi e timidez e libere suas criações.</p>
            </div>
            <img src="library/img/elementos/conte-sua-historia.png" class="funciona-img" alt="Conte sua história nas redes" title="Conte sua história nas redes" />
        </div>	
    </div>
    <div class="bg-yellow mega-space relative">
    	<div id="comece-agora" class="anchor-div"></div>
    	<div class="funciona-section container clearfix relative left-funciona">
        	<h2><span>05</span> - Comece agora!</h2>
            <div class="content-funciona">
                <p>Pare tudo que está fazendo! Cadastre-se e inicie uma nova história agora! Se está sem tempo, não tem problema. Symbee também está disponível e possui funcionalidades exclusivas para os principais SmartPhones do mercado. Comece uma nova história sem compromissO e deixe-nos conquistar você. ;*</p>
            </div>
            <a href="criar-historia.php" class="button blue big funciona-button no-select">Comece agora</a>
        </div>	
    </div>

<?php include 'footer.php'; ?>