<?php

  include('links.php');

  $links = alterarLinks(true);
  $paths = alterarCaminhos(true);


  // var_dump($_SESSION['_idViagem']);
  function verificaUsuarioLogado(){
    if(isset($_SESSION['id_usuario'])){
      // echo("id = OK");
      if(isset($_SESSION["_selected"])){

          $cont = 0;
          foreach($_SESSION['_selected'] as $poltronas){
            $poltrona_selecionada[$cont] = $poltronas;
            // echo($poltrona_selecionada[$cont].", ");
            $cont ++;
          }

          require_once('cms/models/viagem_class.php');
          require_once('cms/controllers/viagem_controller.php');

      }else{
        echo("poltronas = Error");
        // header('location:index.php');
      }
    }else{
      echo("id = Error");
        // header('location:../index.php');
    }

  }

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
    <link rel="stylesheet" href="<?php echo($links); ?>css/footer.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/viagens.css"/>
    <link rel="stylesheet" href="<?php echo($links); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/pagina_pagamento.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style_login.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style_detalhes.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/pagina_pagamento.css">
    <style>
      .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
      }

      /* Safari */
      @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
    </style>
    <!-- <script src="<?php echo($links); ?>js/jquery.min.js"></script> -->
    <script src="<?php echo($links); ?>js/jquery-3.3.1.js"></script>
    <script src="<?php echo($links); ?>js/jquery.mask.js"></script>
    <script>
        function Finalizar(){
          alert('Compra finalizada com Sucesso!');
        }
    </script>
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

        $(document).on('click', '#boleto', function(){
          $('.pague').load('views/boleto.php')
        });

        $(document).on('click', '#cartao', function(){
          $('.pague').load('views/cartao.php');
        });
      // --------------------------------------------------------------------------------------
      $(document).ready(function(){
        $("#cpf").mask("000.000.000-00");
      });
    </script>
  </head>
  <body>
    <div class="modalContainerLogin">
      <div class="modal-login">
      </div>
    </div>
       <?php
       require_once('nav.php');
       verificaUsuarioLogado();

       ?>
       <div class="imagem-de-fundo" style='background-image: url("img/inf_legislacao.jpg");'>
         <div class="titulo-sobre-imagem">
           INFORMAÇÕES SOBRE SERVIÇO
         </div>
       </div>
       <div class="inf">

       <div class="conteudo_pagamento">
         <div class="container_pagamento">
           <div class="container_pagamento2">
             <div class="nome_passagem subtitulo">Passagem de Onibus de São Paulo - SP para Rio de Janeiro - RJ</div>

             <div class="tempo_compra">
               <div class="momentos">Horarios</div>
               <div class="momentos">Identificação</div>
               <div class="momentos_pagamento">Pagamento</div>
             </div>

             <div class="pague">
                <div class="forma_pagamento">
                  <span id="cartao">
                    <img src="<?php echo($links); ?>img/icon/credit_card.svg" alt="Cartão de Credito">
                  Cartão
                  </div>
                </span>
                <div class="forma_pagamento">
                  <span id='boleto'>
                    <img src="<?php echo($links); ?>img/icon/boleto.svg" alt="Boleto Bancário">
                    Boleto
                  </span>
                </div>

             </div>
           </div>
         </div>
       </div>
     </div>

    <?php require_once('footer.php'); ?>

  </body>
</html>
