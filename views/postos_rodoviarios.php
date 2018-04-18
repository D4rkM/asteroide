<?php

  include('../links.php');

  $links = alterarLinks(false);
  $paths = alterarCaminhos(false);

 ?>
<!DOCTYPE html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Magno">
    <!--
      Data de modificação: 19/03/2018
      Obs: Página principal contém menu e rodapé para inserir as outras páginas
    -->
    <title>Home - Bem vindo</title>
    <link rel="stylesheet" href="<?php echo($links);?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo($links);?>css/style.css">
    <link rel="stylesheet" href="<?php echo($links);?>css/style_login.css">
    <link rel="stylesheet" href="<?php echo($links);?>css/style_detalhes.css">
    <script src="<?php echo($links);?>js/jquery.min.js"></script>
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
       <!--
         Autor: BRUNA
         Data de modificação: 22/03/2018
         Detalhes: Está pagina tem como objetivo mostar todos os postos Rodoviarios
         para compram de passagens da viação Asterpide
         Obs: Página principal contém menu e rodapé para inserir as outras páginas
         -->
       <!-- Conteúdo da página -->
       <div class="imagem-de-fundo" style="background-image:url('<?php echo($links); ?>img/inf_legislacao.jpg');">
         <div class="titulo-sobre-imagem">
           POSTOS RODOVIÁRIOS
         </div>
       </div>

       <div class="inf inf-postos-rodoviarios">
         <!--Container que segura todas as informações dos postos rodoviarios -->
         <div class="titulo-conteudo-padrao">
           <h2>ENCONTRE O POSTO MAIS PRÓXIMO DE VOCÊ</h2>
         </div>
         <div class="pesquisar-posto">
           <input type="text" name="txt_pesquisa" value="" placeholder="Pesquise um posto...">
           <img src="<?php echo($links); ?>img/icon/search.svg" alt="Pesquise">
         </div>
         <?php
           $a = 0;
           $cidades = array('São paulo','Rio de Janeiro','Paraná','Rio grande do sul','asdf','asdf','asdf','asdf');
           while($a < 8){
          ?>
         <div class="caixas-inf">
           <div class="inf-subtitulos">
             <div class="escrita-principal">
              <h2 class="subtitulo" style="padding:0px; margin:0px; color:#1f405e;"><?php echo($cidades[$a]); ?></h2>
             </div>
             <div class="icon">
               <img src="<?php echo($links); ?>img/icon/down.svg" alt="Mostrar Mais" title="Mostrar mais">
             </div>
           </div>
           <div class="inf-conteudo border-none">
             <div class="conteudo-legislacao">
               <div class="lista-posto">
                 <table class="table-postos" >
                   <thead>
                     <tr>
                       <th>Município</th>
                       <th>Endereço</th>
                       <th></th>
                       <th style="text-align:right;">Localização</th>
                     </tr>
                   </thead>
                   <tbody style="overflow:auto;">
                     <?php
                      $i = 0;
                      while ($i <= 10) {
                        # code...
                      ?>
                    <tr>
                      <td>Osasco</td>
                      <td>Av-Tietê lalala</td>
                      <td></td>
                      <td style="text-align:right;">Veja no Maps</td>
                    </tr>
                    <?php
                    $i++;
                  }
                     ?>
                   </tbody>
                 </table>

               </div>
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
