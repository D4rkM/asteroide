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
       <?php require_once('nav.php');
       require_once("../cms/controllers/sobre_empresa_controller.php");
       require_once("../cms/models/sobre_empresa_class.php");

       // $select = Null;
       $controller_sobre_empresa = new controllerSobreEmpresa();
       $listSobrenos = $controller_sobre_empresa::Listar();
       // $cont = 0;


       ?>


       <!--
         Autor: BRUNA
         Data de modificação: 25/03/2018
         Detalhes: Está pagina tem como objetivo falar sobre a empresa Asteroide
         Obs: Página principal contém menu e rodapé para inserir as outras páginas
         -->

       <!-- Conteúdo da página -->

       <div class="imagem-de-fundo" style="background-image: url('<?php echo($links); ?>img/inf_legislacao.jpg');">
         <div class="titulo-sobre-imagem"  style="margin-top:180px;">
           SOBRE A EMPRESA
         </div>
       </div>
       <!--Container responsael por segurar o titulo da pagima -->
       <div class="titulo-conteudo-padrao">
         <h2><?php echo($listSobrenos[0]->titulo1); ?></h2>
       </div>

       <div class="conteudo-sobre-empresa">
         <!--Primeiro texto da pagina-->
           <div class="intro-sobre">
             <p><?php echo($listSobrenos[0]->texto1); ?></div>
             <!--Conteiner que segura a imagem e o texto do primeiro conteudo-->

           <div class="cardview-img-text">
               <div class="cardview-img">
                 <img src="../cms/arquivo/<?php echo($listSobrenos[0]->imagem); ?>" alt="empresa">
               </div>
               <div class="cardview-text">
                 <h2 class="subtitulo cardview-title"><?php echo($listSobrenos[0]->titulo2); ?></h2>
                 <p><?php echo($listSobrenos[0]->texto2); ?></p>
               </div>
           </div>
             <!-- </div> -->
             <!--Conteiner que segura as quatros imagens-->
           <div class="servicos-oferecidos">
               <!--Classe das quatros imagens-->
               <div class="card-itens">
                 <div class="card-img">
                   <img src="<?php echo($listSobrenos[0]->icon1); ?>img/icon/bus-img.png" alt="Frota">
                 </div>
                 <div class="card-itens-center subtitulo text-center">
                   <p><?php echo($listSobrenos[0]->detalhes1); ?></p>
                 </div>
               </div>
               <!--Classe das quatros imagens-->
               <div class="card-itens">
                 <div class="card-img">
                   <img src="<?php echo($listSobrenos[0]->icon2);?>img/icon/payment.png" alt="bus">
                 </div>
                 <div class="card-itens-center subtitulo text-center">
                   <p><?php echo($listSobrenos[0]->detalhes2); ?></p>
                 </div>
               </div>
               <!--Classe das quatros imagens-->
               <div class="card-itens">
                 <div class="card-img">
                   <img src="<?php echo($listSobrenos[0]->icon3); ?>img/icon/confort.png" alt="bus">
                 </div>
                 <div class="card-itens-center subtitulo text-center">
                   <p><?php echo($listSobrenos[0]->detalhes3); ?></p>
                 </div>
               </div>
               <!--Classe das quatros imagens-->
               <div class="card-itens">
                 <div class="card-img">
                   <img src="<?php echo($listSobrenos[0]->icon4); ?> img/icon/happy.png" alt="bus">
                 </div>
                 <div class="card-itens-center subtitulo text-center">
                   <p><?php echo($listSobrenos[0]->detalhes4); ?></p>
                 </div>
               </div>
           </div>
       </div>


    <?php require_once('footer.php'); ?>

  </body>
</html>
