<!--
  Autor: BRUNA
  Data de modificação: 28/03/2018
  Detalhes: Está pagina tem como objetivo listar as viagens do usuario
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
  -->
  <?php
  include('../../links.php');

  $links = alterarLinks(false);
  $paths = alterarCaminhos(false);

 ?>
<link rel="stylesheet" href="../../css/style.css">
<?php require_once('nav.php'); ?>
<!-- Conteúdo da página -->
<div class="titulo-conteudo-padrao">
  <h2>Acompanhamento da Viagem</h2>
</div>
<div class="conteudo_acompanhamento">
  <div class="menu_lateral2">
  <ul>
   <a href="editar_perfil.php"><li>Editar Perfil</li></a>
   <a href="interacao_usuario.php"><li>Interação</li></a>
   <a href="historico_viagem.php"><li>Historico de Compra</li></a>
   <a href="acompanhamento_viagem.php"><li>Acompanhamento da viagem</li></a>
  </ul>
</div>
  <!--Container que segura todas as informações da pagina -->
  <div class="acompanhamento_container">
        <div class="info_viagem">
          <ul>
            <center><li><strong>Informações da Viagem</strong></li></center>
            <li><strong>Origem:</strong>São Paulo - SP</li>
            <li><strong>Destino:</strong>Rio de Janeiro - RJ</li>
            <li><strong>Data e hora id:</strong>23/01/2018 ás 19h30</li>
            <li><strong>Data e hora volta:</strong>02/02/2018 ás 12h30</li>
            <li><strong>Rodoviaria ida:</strong>Rodoviaria Tiete - SP</li>
            <li><strong>Rodoviaria volta:</strong>Rodoviaria Novo Rio</li>
            <li><strong>Onibus:</strong>Executivo</li>
            <li><strong>Valor da Passagem:</strong>R$200,00</li>
            <li><strong>Quantidade de pessoas:</strong></li>
            <li><strong>QRCode:</strong></li>
          </ul>
        </div>
        <div class="mapa_viagem">
          <iframe class="rota_mapa" src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d940274.7602253772!2d-45.47825378545273!3d-22.988929205330713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x94ce588f85b00cc9%3A0x2916c2b304e4d535!2sTerminal+Rodovi%C3%A1rio+Tiet%C3%AA%2C+Av.+Cruzeiro+do+Sul%2C+1800+-+Santana%2C+S%C3%A3o+Paulo+-+SP!3m2!1d-23.5162428!2d-46.6241421!4m5!1s0x997f1edb096d39%3A0x16815ebfa63554ca!2sTerminal+Rodovi%C3%A1rio+Novo+Rio+-+Av.+Francisco+Bicalho%2C+1+-+Santo+Cristo%2C+Rio+de+Janeiro+-+RJ%2C+20220-310!3m2!1d-22.8993443!2d-43.2082906!5e0!3m2!1spt-BR!2sbr!4v1522243611112" allowfullscreen></iframe>
        </div>
        <div class="parada">
          <strong>Proximas Paradas:</strong>
        </div>
        <div class="parada">
          <img src="../../img/local3.png" alt="local">Paraty - RJ
        </div>
        <div class="parada">
          <img src="../../img/local3.png" alt="local">Angra dos Reis - RJ
        </div>
        <div class="parada">
          <img src="../../img/icon.png" alt="local">Itaguai - RJ
        </div>
        <div class="parada">
          <img src="../../img/local3.png" alt="local">Duque de Caxias - RJ
        </div>
  </div>
</div>
<?php require_once('footer.php'); ?>
