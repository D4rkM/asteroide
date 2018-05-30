<!--
  Autor: BRUNA
  Data de modificação: 28/03/2018
  Detalhes: Está pagina tem como objetivo listar as viagens do usuario
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
-->
<?php

  include('../../links.php');

  $links = alterarLinks(false);
  $paths = alterarCaminhos(true);

 ?>
  <?php require_once('nav.php'); ?>
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo($links); ?>../css/footer.css">
<!-- Conteúdo da página -->
<div class="conteudo_historico">
  <!--Container que segura todas as informações da pagina -->
<div class="titulo-conteudo-padrao">
  <h2>Historico de compra de passagens</h2>
</div>
<div class="menu_lateral2">
<ul>
 <a href="editar_perfil.php"><li>Editar Perfil</li></a>
 <a href="interacao_usuario.php"><li>Interação</li></a>
 <a href="historico_viagem.php"><li>Historico de Compra</li></a>
 <a href="acompanhamento_viagem.php"><li>Acompanhamento da viagem</li></a>
</ul>
</div>
  <div class="historico_container">
    <!--Container responsael por segurar o titulo da pagima -->
        <!--Conteiner que segura os hitorocos do lado esquerdo-->
        <div class="conetudo_left">
          <div class="registros">
            <ul>
              <li><strong>Origem:</strong>São Paulo - span</li>
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
          <div class="registros">
            <ul>
              <li><strong>Origem:</strong>São Paulo - span</li>
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
        </div>
        <!--Conteiner que segura os hitorocos do lado direito-->
        <div class="conetudo_rigth">
          <div class="registros">
            <ul>
              <li><strong>Origem:</strong>São Paulo - span</li>
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
          <div class="registros">
            <ul>
              <li><strong>Origem:</strong>São Paulo - span</li>
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
        </div>
      </div>
</div>
<?php require_once('footer.php'); ?>
