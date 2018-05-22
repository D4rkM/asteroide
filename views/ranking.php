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
                  $('.modal_detalhes').html(dados);
               }
              });
          }
      // --------------------------------------------------------------------------------------
    </script>
  </head>
  <body>
    <div class="modalContainerLogin">
      <div class="modal-login">
      </div>
    </div>

           <div class="modalContainerDetalhes">
               <div class="modal_detalhes">
               </div>
           </div>
       <?php require_once('nav.php'); ?>

       <!--
         Autor: BRUNA
         Data de modificação: 22/03/2018
         Detalhes: Está pagina tem como objetivo listar os postos rodoviarios que
         mais vende passagens no brasil
         Obs: Página principal contém menu e rodapé para inserir as outras páginas
         -->

       <div class="imagem-de-fundo" style="background-image:url('<?php echo($links); ?>img/inf_legislacao.jpg');">
       </div>
           <!-- Conteúdo da página -->
           <div class="conteudo-ranking">
             <div class="titulo-conteudo-padrao">
               <h2 style="text-transform:uppercase;">Confira agora o ranking dos dos postos rodoviarios que mais vendem passagens!</h2>
             </div>

                 <!--Conteiner reponsavel por segurar o conteudo-->
                 <div class="raking-container">
                     <!--Titulo da pagina-->
                   <!--Div responsavel por informar a posição do ranking-->
                   <?php
                   $a=1;
                    while ($a <= 5) {
                     # code...
                    ?>
                    <div class="classificacao" style="background-image:url('<?php echo($links); ?>img/rodoviaria.jpg');">
                      <!--Deixa a imagem mais escura -->
                      <div class="bg-dark"></div>
                        <div class="info-ranking" style="">

                          <div class="subtitulo rank-subtitulo" style="color:white;">
                            <h2><?php echo($a); ?>°Lugar - Terminal Rodoviario Tiete</h2>
                          </div>
                          <!--Div responsavel por segurar a imagem do posto rodoviario-->

                          <div class="btn-ranking">
                            <a class="btn" href="#" onclick="Detalhes()">Detalhes</a>
                          </div>

                        </div>


                    </div>
                 <?php
                 $a++;
               } ?>
                 </div>
           </div>

    <?php require_once('footer.php'); ?>

  </body>
</html>
