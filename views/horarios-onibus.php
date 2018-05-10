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
       <div class="conteudo_horarios">
       <div class="container_horarios">
         <div class="container_horarios2">
           <div class="nome_passagem">Passagem de Onibus de São Paulo - SP para Rio de Janeiro - RJ</div>

           <div class="tempo_compra">
             <div class="momentos_horario">Horarios</div>
             <div class="momentos">Identificação</div>
             <div class="momentos">Pagamento</div>
           </div>

           <div class="lista_horarios">
             <form class="" action="Usuario/usuario_identificacao.php" method="post">


             <table class="tabela_horarios">
               <tr class="linha_horarios">
                 <td class="coluna_horarios">Compania</td>
                 <td class="coluna_horarios">Saida/Chegada</td>
                 <td class="coluna_horarios">Embarque/Desembarque</td>
                 <td class="coluna_horarios">Duração</td>
                 <td class="coluna_horarios">Classe</td>
                 <td class="coluna_horarios">Preço</td>
                 <td class="coluna_horarios"></td>
               </tr>
               <tr class="linha_horarios">
                 <td class="coluna_horarios">Asteroide</td>
                 <td class="coluna_horarios">8:00/15:40</td>
                 <td class="coluna_horarios">Sao Paulo, SP - Tiete/Angra dos Reis, RJ</td>
                 <td class="coluna_horarios">7:40</td>
                 <td class="coluna_horarios">Executivo</td>
                 <td class="coluna_horarios">R$ 110,00</td>
                 <td class="coluna_horarios"><button class="" type="submit" name="btn_confirma">Selecionar</button></td>
               </tr>
               <tr class="linha_horarios">
                 <td class="coluna_horarios">Asteroide</td>
                 <td class="coluna_horarios">9:00/16:40</td>
                 <td class="coluna_horarios">Sao Paulo, SP - Tiete/Angra dos Reis, RJ</td>
                 <td class="coluna_horarios">7:40</td>
                 <td class="coluna_horarios">Executivo</td>
                 <td class="coluna_horarios">R$ 110,00</td>
                 <td class="coluna_horarios"><button class="" type="submit" name="btn_confirma">Selecionar</button></td>
               </tr>
             </table>
             <div class=""><img src="../img/poltronas.png" alt="poltronas"></div>
             </form>
           </div>
         </div>
       </div>
       </div>
    <?php require_once('footer.php'); ?>
  </body>
</html>
