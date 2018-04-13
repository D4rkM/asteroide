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
         Detalhes: Está pagina tem como objetivo listar os postos rodoviarios que
         mais vende passagens no brasil
         Obs: Página principal contém menu e rodapé para inserir as outras páginas
         -->

       <div class="modalContainerDetalhes">
           <div class="modal_detalhes">
           </div>
       </div>
       <div class="imagem-de-fundo" style="background-image:url('img/inf_legislacao.jpg');">

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
                    <div class="classificacao" style="background-image:url('img/rodoviaria.jpg');">
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
