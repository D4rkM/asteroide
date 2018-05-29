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
         <h2>A VIAÇÃO ASTERÓIDE</h2>
       </div>

       <div class="conteudo-sobre-empresa">
         <!--Primeiro texto da pagina-->
           <div class="intro-sobre">
             <p>A viação Asteróide atende o ramo de transportes de passageiros e tem mais de 20 anos de tradição.           O principal serviço oferecido são viagens intermunicipais e interestaduais por toda a região sudeste e algumas áreas             ao redor, em transporte executivo atendendo como público alvo as classes C, D e E. A empresa tem sua sede na cidade             de Campinas-SP e conta com escritórios no Rio de Janeiro e em São Paulo. A empresa também conta com uma vasta frota             de ônibus e atende boa parte da região sudeste e algumas áreas próximas a região.</p>
           </div>
             <!--Conteiner que segura a imagem e o texto do primeiro conteudo-->

           <div class="cardview-img-text">
               <div class="cardview-img">
                 <img src="<?php echo($links); ?>img/empresa.jpg" alt="empresa">
               </div>
               <div class="cardview-text">
                 <h2 class="subtitulo cardview-title">Nossa empresa</h2>
                 <p>A viação Asteróide atende o ramo de transportes de passageiros e tem mais de 20 anos de                    tradição. O principal serviço oferecido são viagens intermunicipais e interestaduais por toda a região sudeste                  e algumas áreas ao redor, em transporte executivo atendendo como público alvo as classes C, D e E. A empresa                    tem sua sede na cidade de Campinas-SP e conta com escritórios no Rio de Janeiro e em São Paulo. A empresa                        também conta com uma vasta frota de ônibus e atende boa parte da região sudeste e algumas áreas próximas a                      região.A viação Asteróide atende o ramo de transportes de passageiros e tem mais de 20 anos de tradição. O                      principal serviço oferecido são viagens intermunicipais e interestaduais por toda a região sudeste e algumas                    áreas ao redor, em transporte executivo atendendo como público alvo as classes C, D e E. A empresa tem sua sede                  na cidade de Campinas-SP e conta com escritórios no Rio de Janeiro e em São Paulo.
                 </p>
               </div>
           </div>
             <!-- </div> -->
             <!--Conteiner que segura as quatros imagens-->
           <div class="servicos-oferecidos">
               <!--Classe das quatros imagens-->
               <div class="card-itens">
                 <div class="card-img">
                   <img src="<?php echo($links); ?>img/icon/bus-img.png" alt="Frota">
                 </div>
                 <div class="card-itens-center subtitulo text-center">
                   <p>Contamos com as melhores frotas de ônibus do Brasil.</p>
                 </div>
               </div>
               <!--Classe das quatros imagens-->
               <div class="card-itens">
                 <div class="card-img">
                   <img src="<?php echo($links); ?>img/icon/payment.png" alt="bus">
                 </div>
                 <div class="card-itens-center subtitulo text-center">
                   <p>Formas de pagamento rápidas e fáceis, sejam online ou nos guichês.</p>
                 </div>
               </div>
               <!--Classe das quatros imagens-->
               <div class="card-itens">
                 <div class="card-img">
                   <img src="<?php echo($links); ?>img/icon/confort.png" alt="bus">
                 </div>
                 <div class="card-itens-center subtitulo text-center">
                   <p>Total conforto e qualidade para a sua viagem.</p>
                 </div>
               </div>
               <!--Classe das quatros imagens-->
               <div class="card-itens">
                 <div class="card-img">
                   <img src="<?php echo($links); ?>img/icon/happy.png" alt="bus">
                 </div>
                 <div class="card-itens-center subtitulo text-center">
                   <p>Equipe dedicada para manter o melhor serviço de viagem.</p>
                 </div>
               </div>
           </div>
       </div>


    <?php require_once('footer.php'); ?>

  </body>
</html>
