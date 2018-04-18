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
       <div class="conteudo_pagamento">
         <div class="pagamento_container">
           <div class="filtro_origem">
             <div class="title_pagamento">
               Filtro de Origem
             </div>
             <div class="origem">
               <table class="tabela_filtro">
                 <tr class="coluna_filtro">
                   <td class="linha_texto">
                     Origem:
                   </td>
                   <td class="linha_texto">
                     Destino:
                   </td>
                   <tr class="coluna_filtro">
                   <td class="linha_campo">
                       <input class="txt_origem" type="text" name="txt_origem" value="">
                   </td>
                   <td class="linha_campo">
                     <input class="txt_destino" type="text" name="txt_origem" value="">
                   </td>
                 </tr>
               </tr>
                 <tr class="coluna_filtro">
                   <td class="linha_texto">
                     Data de Ida:
                   </td>
                   <td class="linha_texto">
                     Data de volta:
                   </td>
                   <tr class="coluna_filtro">
                     <td class="linha_campo">
                       <input class="txt_texto" type="date" name="txt_origem" value="">
                     </td>
                     <td class="linha_campo">
                       <input class="txt_texto" type="date" name="txt_origem" value="">
                     </td>
                   </tr>
                 </tr>
               </table>
               </table>
               <div class="botao_confirma">
                 <button class="btn_confirma" type="submit" name="btn_confirma">Buscar</button>
               </div>
             </div>
           </div>
           <div class="estagio_pagamento">
             <div class="fundo-estagio">
               <div class="placa-estagio">
                 <img src="<?php echo($links); ?>img/icon/ponto.png" alt="estado">
               </div>
               <div class="placa-estagio">
                 <img src="<?php echo($links); ?>img/icon/ponto.png" alt="estado">
               </div>
               <div class="placa-estagio">
                 <img src="<?php echo($links); ?>img/icon/ponto.png" alt="estado">
               </div>
               <div class="onibus-estagio">
                 <img src="<?php echo($links); ?>img/icon/bus.png" alt="">
               </div>
             </div>
           </div>
           <div class="pagamento">
             <div class="propriedades">
               <div class="atributos">
                 <div class="bandeiras">
                   <div class="segura_div">
                     <div class="tit_banderia">
                       Bandeira
                     </div>
                     <div class="segura">
                       <div class="quadradinho">

                       </div>
                       <div class="quadrados">

                       </div>
                     </div>
                     <div class="segura">
                       <div class="quadradinho">

                       </div>
                       <div class="quadrados">

                       </div>
                     </div>
                     <div class="segura">
                       <div class="quadradinho">

                       </div>
                       <div class="quadrados">

                       </div>
                     </div>
                     <div class="segura">
                       <div class="quadradinho">

                       </div>
                       <div class="quadrados">

                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="dados">
                   <div class="tit_dados">
                     Dados do titular
                   </div>
                   <div class="nada">

                   </div>
                   <div class="seg_preenchimento">
                     <div class="controla_input">
                       <input type="text" name="Nome" value="">
                     </div>
                     <div class="controla_input">
                       <input type="text" name="Nome" value="">
                     </div>
                     <div class="controla_input">
                       <input type="text" name="Nome" value="">
                     </div>
                     <div class="controla_input">
                       <input type="text" name="Nome" value="">
                     </div>

                     <!-- div que contenha uma seleção data visivel para o usuario -->

                     <div class="controla_input">
                       <input type="text" name="Nome" value="">
                     </div>
                   </div>
                 </div>
                 <div class="parcelamento">

                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>

    <?php require_once('footer.php'); ?>

  </body>
</html>
