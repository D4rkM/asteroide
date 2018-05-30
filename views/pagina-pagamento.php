<?php

  include('../links.php');

  $links = alterarLinks(false);
  $paths = alterarCaminhos(false);

  // function verificaUsuarioLogado(){
  //   if(isset($_SESSION['id_usuario'])){
  //     echo("eeeeeeee");
  //     if(isset($_POST['poltronas'])){
  //       echo("eeeee2");
  //     }else{
  //       echo("triste");
  //     }
  //   }else{
  //     echo("aaaaahhh..");
  //   }
  // }

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
    <script src="<?php echo($links); ?>js/jquery.min.js"></script>
    <script src="../js/jquery-3.3.1.js"></script>
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
      // --------------------------------------------------------------------------------------
    </script>
  </head>
  <body>
    <div class="modalContainerLogin">
      <div class="modal-login">
      </div>
    </div>
       <?php
       require_once('nav.php');
       // verificaUsuarioLogado();

       ?>
       <div class="conteudo_pagamento">
         <div class="container_pagamento">
           <div class="container_pagamento2">
             <div class="nome_passagem">Passagem de Onibus de São Paulo - SP para Rio de Janeiro - RJ</div>

             <div class="tempo_compra">
               <div class="momentos">Horarios</div>
               <div class="momentos">Identificação</div>
               <div class="momentos_pagamento">Pagamento</div>
             </div>

             <div class="pague">

               <div class="cont_pague">
                   <div class="text_pague">Bandeiras</div>
                  <div class="bandeiras">
                    <input type="radio" name="rdband" value="1">
                    <img class="img_pague" src="../img/icon/elo-icon.png" alt="elo">
                  </div>
                  <div class="bandeiras">
                    <input type="radio" name="rdband" value="2">
                    <img class="img_pague" src="../img/icon/Visa-icon.png" alt="">
                  </div>
                  <div class="bandeiras">
                    <input type="radio" name="rdband" value="3">
                    <img class="img_pague" src="../img/icon/mastercard-icon.png" alt="">
                  </div>
                  <div class="bandeiras">
                    <input type="radio" name="rdband" value="4">
                    <img class="img_pague" src="../img/icon/americanexpress-icon.png" alt="">
                  </div>
               </div>
               <div class="line_vertical"></div>
               <div class="registro_pague">
                 <div class="text_pague">Dados do Titular</div>
                 <div class="box_pague"><input type="text" name="txtnome" value="<?php echo $_SESSION['nome_usuario'];  ?>" disabled></div>
                 <div class="box_pague"><input type="text" name="txtcpf" value="" placeholder="cpf"></div>
                 <div class="box_pague"><input type="text" name="txtcartao" value="" placeholder="Numero do cartao"></div>
                 <select class="combo_pague" name="mes_val">
                   <option value="">Janeiro</option>
                   <option value="">Fevereiro</option>
                   <option value="">Março</option>
                 </select>
                 <select class="combo_pague" name="ano_val">
                   <option value="">2018</option>
                   <option value="">2019</option>
                   <option value="">2020</option>
                 </select>
                 <div class="box_pague"><input type="text" name="txtcodigo" value="" placeholder="Codigo de segurança"></div>
               </div>
               <div class="line_vertical"></div>
               <div class="cont_pague">
                 <div class="text_pague">Parcelamento</div>
                 <select class="combo_pague" name="ano_val">
                   <option value="">1x</option>
                   <option value="">2x</option>
                   <option value="">3x</option>
                 </select>
               </div>
              <div class="finalizar">
                <a href="Usuario/historico_viagem.php" onclick="Finalizar()">
                  Finalizar</a></div>
             </div>
           </div>
         </div>
       </div>

    <?php require_once('footer.php'); ?>

  </body>
</html>
