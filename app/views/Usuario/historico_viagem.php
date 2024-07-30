<?php

  include('../../links.php');

  $links = alterarLinks(false);
  $paths = alterarCaminhos(false);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
    <meta name="author" content="Magno">
    <!--
      Data de modificação: 19/03/2018
      Obs: Página principal contém menu e rodapé para inserir as outras páginas
    -->
    <title>Editar - Bem vindo</title>
    <link rel="stylesheet" href="<?php echo($links); ?>../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>../css/footer.css">
    <link rel="stylesheet" href="<?php echo($links); ?>../css/style.css">
    <link rel="stylesheet" href="<?php echo($links); ?>../css/editar_usuario.css">
    <script src="<?php echo($links); ?>../js/jquery.min.js"></script>

  </head>
  <body>
       <?php require_once('nav.php');?>
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
  <?php

//    $historico_viagens = new RegistroPassagem();
//    $historico_viagens:

   ?>
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
        </div>
      </div>
</div>
<?php require_once('footer.php'); ?>
