<?php

  include('../../links.php');

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
    <link rel="stylesheet" href="<?php echo($links); ?>../css/normalize.css">
    <link rel="stylesheet" href="<?php echo($links); ?>../css/style.css">
    <link rel="stylesheet" href="<?php echo($links); ?>../css/style_login.css">
    <link rel="stylesheet" href="<?php echo($links); ?>../css/style_detalhes.css">
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
       <?php require_once('../nav.php'); ?>
       <div class="conteudo_identificacao">
       <div class="container_identificacao">
         <div class="container_identificacao2">
           <div class="nome_passagem">Passagem de Onibus de São Paulo - SP para Rio de Janeiro - RJ</div>

           <div class="tempo_compra">
             <div class="momentos">Horarios</div>
             <div class="momentos_identificacao">Identificação</div>
             <div class="momentos">Pagamento</div>
           </div>

           <div class="identifi_user">
             <form class="" action="" method="post">
               <div class="consulta_user">
                 <div class="text_ident">Identifique - se para continuar sua compra!</div>
                 <div class="text_ident2">Usuario:</div>
                 <input class="box_ident" type="text" name="txtusuario" value=""> <br> <br>
                 <div class="text_ident2">Senha:</div>
                 <input class="box_ident" type="password" name="txtsenha" value=""><br> <br>
                 <button class="btn_confirma" type="submit" name="button">Entrar</button>
                 <div class="itens-center">
                   <img src="<?php //echo($links); ?>../../img/Facebook.png" alt="redes-sociais">
                 </div>
                 <div class="itens-center">
                   <img src="<?php //echo($links); ?>../../img/Google.png" alt="redes-sociais">
                 </div>
                 <div class="itens-center">
                   <img src="<?php //echo($links); ?>../../img/Twitter.png" alt="redes-sociais">
                 </div>
                 <div class="text-center">
                   Não tem conta ainda?
                   <a href="views/Usuario/cadastro_usuario.php"><strong style="color:#162E44;">Cadastre-se</strong></a>
                 </div>
               </div>
             <div class="Continua">
               <a href="../pagina-pagamento.php">
                Continuar
               </a>
             </div>
             </form>
           </div>
         </div>
       </div>
       </div>
    <?php require_once('../footer.php'); ?>
  </body>
</html>
