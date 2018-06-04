<?php

  include('../links.php');

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
    <title>Home - Bem vindo</title>
    <link rel="stylesheet" href="<?php echo($links); ?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/footer.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style_login.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style_detalhes.css">

  </head>
  <body>
    <div class="modalContainerLogin">
      <div class="modal-login">
      </div>
    </div>
    <?php require_once('nav.php'); ?>

    <div class="imagem-de-fundo" style="background-image:url('<?php echo($links); ?>img/travel.jpg');">
      <div class="titulo-sobre-imagem">
        VEJA QUEM ESTÁ VIAJANDO CONOSCO
      </div>
    </div>
    <div class="titulo-conteudo-padrao">
      <h2>CONFIRA A VIAGEM DE NOSSOS CLIENTES</h2>
    </div>
    <div class="conteudo_interacao">
      <div class="interacao_container">
        <?php
        // $a = 0;
        // while($a < 5){
          require_once("../controllers/interacao_controller.php");
          require_once("../models/interacao_class.php");

          $controller_interacao = new controllerInteracao();
          $list = $controller_interacao::Lista();

          // if($list->ativo == 1){
          $cont = 0;
          if($list[$cont]->ativo == 1){
            // var_dump($list[$cont]->ativo);die;
          while($cont < count($list)){
           ?>
        <div class="cardbox card-blog">
          <div class="cardbox-title" <?php $list[$cont]->ativo ?>>
            <div class="foto-user">
              <img src="<?php echo($links); ?><?php echo $list[$cont]->imagem_usuario ?>" alt="user">
              <h3>
                <?php echo $list[$cont]->nome_usuario ?>
              </h3>
            </div>
            <div class="cardbox-local">
              <img src="<?php echo($links); ?>img/icon/location.svg" alt="local">
              <?php echo $list[$cont]->local ?>
            </div>
          </div>
          <div class="cardbox-content">
            <div class="cardbox-text">
              <p><?php echo $list[$cont]->comentario ?></p>
            </div>
            <div class="cardbox-img">
              <img class="" src="../<?php echo $list[$cont]->imagem ?>" alt="angra">
            </div>
          </div>
        </div>
      <?php
    //   $a++;
    // }
    $cont += 1;
  }
}
  // }
    ?>
      </div>
    </div>
    <?php require_once('footer.php'); ?>
    <script src="<?php echo($links); ?>js/jquery.min.js"></script>
    <script>
      // Modal Login
      $(document).ready(function() {
            $(".login").click(function() {
              $(".modalContainerLogin").fadeIn(500);
            });
      });
      //função para abrir a modal
      function Login(){
          $.ajax({
              type: "POST",
              url: "views/login.php",
              success: function(dados){
                  $('.modal-login').html(dados);
               }
              });
          }
      // -------------------------------------------------------------------------------------

      // Modal de detalhes
      $(document).ready(function() {
            $(".detalhes").click(function() {
              $(".modalContainerDetalhes").slideToggle(1000);
            });
      });

      function Detalhes(){
          $.ajax({
              type: "POST",
              url: "views/detalhes.php",
              success: function(dados){
                  $('.modal-detalhes').html(dados);
               }
              });
          }
      // --------------------------------------------------------------------------------------
    </script>
    <script>
      // Configura o Texto que irá aparecer na pagina inicial
      $(document).ready(function(){
        var textos = ["Deixe o stress de lado e curta nossa viagem", 'Viajar de "Bus" pode ser tão divertido como estar em família' , "Veja nossos pacotes de passagens"];
        var atual = 0;
        $('#frases').text(textos[atual++]);
        setInterval(function() {
            $('#frases').fadeOut(function() {
                if (atual >= textos.length) atual = 0;
                $('#frases').text(textos[atual++]).fadeIn();
            });
        }, 5000);
      });
    </script>
  </body>
</html>
