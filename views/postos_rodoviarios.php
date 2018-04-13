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
       <!--
         Autor: BRUNA
         Data de modificação: 22/03/2018
         Detalhes: Está pagina tem como objetivo mostar todos os postos Rodoviarios
         para compram de passagens da viação Asterpide
         Obs: Página principal contém menu e rodapé para inserir as outras páginas
         -->
       <link rel="stylesheet" href="css/carrossel_frotas.css">
       <!-- Conteúdo da página -->
       <div class="imagem-de-fundo" style="background-image:url('img/inf_legislacao.jpg');">
         <div class="titulo-sobre-imagem">
           POSTOS RODOVIÁRIOS
         </div>
       </div>

       <div class="inf inf-postos-rodoviarios">
         <!--Container que segura todas as informações dos postos rodoviarios -->
         <div class="titulo-conteudo-padrao">
           <h2>ENCONTRE O POSTO MAIS PRÓXIMO DE VOCÊ</h2>
         </div>
         <?php
           $a = 0;
           $cidades = array('Sao paulo','Rio de Janeiro','Parana','Rio grande do sul');
           while($a < 4){
          ?>
         <div class="caixas-inf">
           <div class="inf-subtitulos">
             <div class="escrita-principal">
               <?php echo($cidades[$a]); ?>
             </div>
             <div class="icon">
               <img src="img\icon\down.svg" alt="Mostrar Mais" title="Mostrar mais">
             </div>
           </div>
           <div class="inf-conteudo">
             <div class="conteudo-legislacao">

             </div>
           </div>
         </div>
         <?php
         $a++;
        } ?>
       </div>



    <?php require_once('footer.php'); ?>

  </body>
</html>
