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
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/style_detalhes.css">
    <script src="js/jquery.min.js"></script>
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

       <div class="container">
         <!-- <div class="conteudo-video"> -->
           <div class="video-principal">
             <video muted autoplay loop>
               <source src="img/video.mp4" type="video/mp4">
             </video>
             <!-- <img src="img/Paleta-de-Cores.jpg" alt="" width="500"> -->
             <div class="frase-inicial">
                <h2 id="frases"></h2>
             </div>
           </div>
         <!-- </div> -->

         <div class="conteudo_locais">
           <div class="titulo_locais">
             <p style="color:#3f635f;" class="subtitulo">
               <b>  SE SENTINDO AVENTUREIRO? </b>
               </p>
           </div>
           <div class="titulo_locais" style="color:#1f405e;">
             <h2><strong>QUE TAL CONHECER NOVOS LUGARES?</strong></h2>
           </div>
           <div class="locais-viagem">

             <?php
             $a = 0;
             while ($a <= 2) {
              ?>
             <div class="polaroid" >
               <img src="img/rio-de-janeiro.jpg" alt="Rio" style="width:100%">
               <div class="texto-polaroid">
                 <p>Rio de Janeiro</p>
               </div>
             </div>


             <?php
               $a ++;
               }
             ?>
           </div>
         </div>

         <div class="conteudo_locais">
           <div class="titulo_locais" style="color:#1f405e;">
             <h2><strong>VEJA NOSSAS SUGESTÕES DE VIAGENS!</strong> </h2>
           </div>
           <div class="locais-viagem">

             <?php
             $a = 0;
             while ($a <= 2) {
              ?>
             <div class="polaroid">
               <img src="img/rio-de-janeiro.jpg" alt="Rio" style="width:100%">
               <div class="texto-polaroid">
                 <p>Rio de Janeiro</p>
               </div>
             </div>


             <?php
               $a ++;
               }
             ?>
           </div>
         </div>

         <div class="conteudo_locais">
           <div class="titulo_locais" style="color:#1f405e;">
                   <h2> Veja quem está viajando com a gente</h2>
           </div>
           <div id="content">
             <nav id="menu-carrossel">
               <a href="#" class="prev" title="Anterior"> <img src="img/icon/left.svg" alt="Esquerda"> </a>
             </nav>
                   <div id="carrossel">
                       <ul>
                         <?php
                         $a = 0;
                         while ($a <= 5) {
                          ?>
                           <li>
                             <a href="#">
                               <div class="comentarios-pag-inicial">
                                 <div class="comentario-usuario">
                                   <img src="img/client.png" alt="Nome da Imagem" title="Nome da Imagem" />
                                   <b>Username</b>
                                 </div>
                                 <div class="comentario-conteudo" style="color:grey;">
                                   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                 </div>
                               </div>
                             </a>
                           </li>
                           <?php
                             $a ++;
                             }
                           ?>
                       </ul>
                   </div>
                   <nav id="menu-carrossel">
                       <a href="#" class="next" title="Próximo"> <img src="img/icon/right.svg" alt="Direita"> </a>
                   </nav>
               </div>
         </div>

       </div>
       <script src="js/jquery.min.js"></script>
       <script src="js/jcarousellite.js"></script>
       <script src="js/carrossel.js"></script>
       <script>

       </script>


    <?php require_once('footer.php'); ?>

  </body>
</html>
