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
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/footer.css">
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

       <!--
         Autor: BRUNA
         Data de modificação: 25/03/2018
         Detalhes: Está pagina tem como objetivo mostar as duvidas mais frequentes perguntadas pelos
       usuarios e ajudar aqueles que estão com duvidas
         Obs: Página principal contém menu e rodapé para inserir as outras páginas
         -->

       <!-- Conteúdo da página -->
       <div class="conteudo-duvidas">
         <!--Container que segura todas as informações dos postos rodoviarios -->
         <div class="titulo-conteudo-padrao text-center">
           <h2>DÚVIDAS FREQUENTES</h2>
         </div>

         <div class="duvidas-container">
           <!--Container responsael por segurar o titulo da pagima -->


             <div class="perguntas">
                 <ul>
                   <?php
                     require_once("../cms/controllers/duvidas_controller.php");
                     require_once("../cms/models/duvidas_class.php");

                     $controller_duvidas = new controllerDuvidas();
                     $list = $controller_duvidas::Listar();

                     $cont = 0;

                     while($cont < count($list)){
                   ?>
                     <a id='1' href="#" style='color:#4d9b61; font-weight:bold;'><li> <h3><?php echo $list[$cont]->pergunta ?></h3> </li></a>
                     <?php
                         $cont+=1;
                       }
                     ?>
                 </ul>
             </div>
             <div class="respostas">
                 <div id="legenda">
                  <p>Sua resposta aparece aqui...</p>
                 </div>
                 <?php
                   require_once("../cms/controllers/duvidas_controller.php");
                   require_once("../cms/models/duvidas_class.php");

                   $controller_duvidas = new controllerDuvidas();
                   $list = $controller_duvidas::Listar();

                   $cont = 0;

                   while($cont < count($list)){
                 ?>
                  <div id="div_email" >
                    <p style='color:#162E44;'><?php echo $list[$cont]->resposta ?></p>
                  </div>
                  <?php
                      $cont+=1;
                    }
                  ?>

             </div>
             <script>
               //pergunta 1

               var btn = document.getElementById('1');
               var div = document.getElementById('div_email');
               btn.addEventListener('click', function() {
               if(div.style.display != 'block') {
               div.style.display = 'block';
               $('#legenda').css('display','none');
               return;
               }
                div.style.display = 'none';
                $('#legenda').css('display','block');
               });

               //pergunta 2

               var btn2 = document.getElementById('b');
               var div2 = document.getElementById('div_email2');
               btn2.addEventListener('click', function() {
               if(div2.style.display != 'block') {
               div2.style.display = 'block';
               return;
               }
                div2.style.display = 'none';
               });

               //pergunta 3

               var btn3 = document.getElementById('c');
               var div3 = document.getElementById('div_email3');
               btn3.addEventListener('click', function() {
               if(div3.style.display != 'block') {
               div3.style.display = 'block';
               return;
               }
                div3.style.display = 'none';
               });
             </script>
         </div>
       </div>


    <?php require_once('footer.php'); ?>

  </body>
</html>
