<?php 
  include('php/conect.php');
  include('php/teste-login.php');

  include 'header-interna.php'; 

?>
    <div class="box-form box">
        <h3>Envie-nos sua mensagem</h3>
        <p class="destaque">Teremos o prazer em respondê-lo</p>
        <form id="criar-form">
            <input name="name" type="text" id="name" placeholder="Insira o seu nome">
            <input name="email" type="email" id="email" placeholder="Insira o seu e-mail">
            <textarea name="message" id="message" rows="10" cols="50" placeholder="Digite sua mensagem"></textarea>
            <a href="obrigado.php" class="button yellow float-right t-margin-30">Enviar</a>
        </form>
    </div>
    <div class="space bg-gray">
    	<div class="container clearfix relative">
        	<h1 class="h2">Primeiramente, escolha sobre o que quer falar</h1>
        	<p class="desc-title">Veja abaixo as opções de contato conosco e sinta-se a vontade.<br />Conversar é o que mais gostamos de fazer</p>
            <div class="clearfix"></div>

            <div class="lista-contato fourcol first"><ul>
                <a href="#"><li>
                    <img src="library/img/elementos/contato/img-bug.png" />
                    <h2>Possui dúvidas ou encontrou bugs no Symbee e gostaria de nos xingar?</h2>
                    <p>Fale com a equipe que não responde (suporte) do Symbee e conte-nos tudo o que te incomoda.</p>
                </li></a>
            </ul></div>

            <div class="lista-contato fourcol"><ul>
                <a href="#"><li>
                    <img src="library/img/elementos/contato/img-donation.png" />
                    <h2>Sempre foi uma pessoa legal, de bom coração e gostaria de colaborar conosco?</h2>
                    <p>Fale com a equipe que gerencia as histórias e conte-nos como você gostaria de ajudar o Symbee.</p>
                </li></a>
            </ul></div>

            <div class="lista-contato fourcol last"><ul>
                <a href="#"><li>
                    <img src="library/img/elementos/contato/img-beer.png" />
                    <h2>Está sem nada para fazer? Sua namorada te chutou? Gostaria de tomar uma cerveja?</h2>
                    <p>Fale com a equipe que fica sem fazer nada o dia todo e troque uma ideia sobre o sentido da vida.</p>
                </li></a>
            </ul></div>
        </div>
    </div>
<?php include 'footer.php'; ?>