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
  </head>
  <body>
    <div class="modalContainerLogin">
      <div class="modal-login">
      </div>
    </div>
       <?php require_once('nav.php'); ?>
       <!--
         Autor: BRUNA
         Data de modificação: 22/03/2018
         Detalhes: Está pagina tem como objetivo listar as frotas de onibus da Empresa
         Asteroide
         Obs: Página principal contém menu e rodapé para inserir as outras páginas
         -->
       <div class="imagem-de-fundo" style="background-image:url('<?php echo($links); ?>img/inf_legislacao.jpg');">
         <div class="titulo-sobre-imagem">
           FROTAS
         </div>
       </div>
       <div class="conteudo-frotas">
         <!-- <div class="galeria"> -->

           <div class="titulo-conteudo-padrao text-center">
             <!-- Subtitulo e descrição da página de frotas -->
             <h2 style="text-transform:uppercase;">Nossas Frotas</h2>
           </div>
           <div class="titulo_locais">
             <h3 class="text-center" style="text-transform:uppercase;">
               A qualidade e o conforto que nossos passageiros merecem para suas viagens
             </h3>
           </div>

           <?php
           $y = 0;
            while ($y <= 3) {
             # code...
            ?>
           <div class="locais-viagem galeria">
             <!-- Conteúdo da página -->
             <?php
               $a =0;
               while ($a <= 2 ) {
                 # code...

               ?>
             <div class="polaroid img-galery">
                 <!-- <div class="container_onibus_imagem"> -->
                   <img class="" src="<?php echo($links); ?>img/busasteroide.jpg" alt="bus" title="frotas">
                 <!-- </div> -->
                 <div class="texto-polaroid">
                   <p>Viajar de ônibus não é mais</p>
                 </div>
             </div>
             <?php
                 $a++;
               }
             ?>
           </div>
           <?php
             $y++;
           }?>
         <!-- </div> -->
       </div>

    <?php require_once('footer.php'); ?>

  </body>
</html>
