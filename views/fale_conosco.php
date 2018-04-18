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
    <link rel="stylesheet" href="<?php echo($links); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style_login.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style_detalhes.css">
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
  </head>
  <body>
    <div class="modalContainerLogin">
      <div class="modal-login">
      </div>
    </div>
       <?php require_once('nav.php'); ?>

       <div class="imagem-de-fundo" style='background-image: url("<?php echo($links); ?>img/inf_legislacao.jpg");'>
         <div class="titulo-sobre-imagem">
           FALE CONOSCO
         </div>
       </div>

       <div class="container-contato">
         <div class="contato-box">
           <div class="titulo-conteudo-padrao">
             <h2>RECLAMAÇÕES</h2>
           </div>
           <div class="contato-img">
             <img src="<?php echo($links); ?>img/Reclamacao.jpg" alt="">
           </div>
           <div class="feedback-cliente">
             <div class="escrita">
               <textarea name="name" rows="8"></textarea>
             </div>
           </div>
           <div class="btn_enviar">
             <button class="btn" type="button" name="btn_enviar"> Enviar </button>
           </div>
         </div>
         <div class="contato-box">
           <div class="titulo-conteudo-padrao">
             <h2>SUGESTÕES</h2>
           </div>
           <div class="contato-img">
             <img src="<?php echo($links); ?>img/ideias.png" alt="">
           </div>
           <div class="feedback-cliente">
             <div class="escrita">
               <textarea name="name" rows="8"></textarea>
             </div>
           </div>
           <div class="btn_enviar">
             <button class="btn" type="button" name="btn_enviar"> Enviar </button>
           </div>
         </div>
         <div class="contato-box">
           <div class="titulo-conteudo-padrao">
             <h2>ELOGIOS</h2>
           </div>
           <div class="contato-img">
             <img src="<?php echo($links); ?>img/elogios.jpg" alt="">
           </div>
           <div class="feedback-cliente">
             <div class="escrita">
               <textarea name="name" rows="8"></textarea>
             </div>
           </div>
           <div class="btn_enviar">
             <button class="btn" type="button" name="btn_enviar"> Enviar </button>
           </div>
         </div>
       </div>
       <div style="padding:50px;">
         <div class="cont-forma-de-contato">
           <div class="forma-de-contato">
             <div class="subtitulo text-center">
               Fale diretamente conosco
             </div>
             <div class="numero-contato">
               0800 575 9858
             </div>
           </div>

             <div class="forma-de-contato">
               <div class="subtitulo text-center">
                 Ouvidoria da Viação Asteroide
               </div>
               <div class="numero-contato">
                 0800 963 2336
               </div>
             </div>

           <div class="forma-de-contato">
             <div class="subtitulo text-center">
               Redes sociais
             </div>
             <div class="cont-redes-sociais">
               Atendemos também pelo Facebook, Twitter, Consumidor gov
             </div>
           </div>
           <div class="forma-de-contato">
             <div class="subtitulo text-center">
               Suporte Tecnologico
             </div>
             <div class="numero-contato">
               0800 744 9668
             </div>
           </div>
         </div>
       </div>

    <?php require_once('footer.php'); ?>

  </body>
</html>
