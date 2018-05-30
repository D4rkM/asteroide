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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Magno">
    <!--
      Data de modificação: 19/03/2018
      Obs: Página principal contém menu e rodapé para inserir as outras páginas
    -->
    <title>Home - Bem vindo</title>
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/footer.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/viagens.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/style_login.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/style_detalhes.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/pagina_pagamento.css">
    <script src="<?php echo($links); ?>js/jquery-3.3.1.js"></script>
    <script>
    // Trabalha a parte de seleção de poltronas
    $(document).on('click', '.poltronas', function(){

      var selecionado = $(this);
      var test = $('.polt');
      // var bg = $(this).css('background-color');
      var checkId = '#a_'+$(this).data('num_polt');
      var checkbox = $(checkId);
      // console.log(checkId);
      if(selecionado.data('polt') == 0) {

        selecionado.css('background', 'yellow');
        // selecionado.attr('checked', true );
        checkbox.attr('checked', true);

        selecionado.data("polt", "1");
        // Senão, troca pra amarelo
      } else if(selecionado.data('polt') == 1) {
        selecionado.css('background', 'green');
        // selecionado.attr('checked', false);
        checkbox.attr('checked', false);
        selecionado.data("polt", "0");
      }
    });
    // $(document).on('click', 'label', function(){
    //   var selecionado = $('this').attr('for');
    //   console.log(selecionado);
    // });

    //
    function Onibus(poltronas,viagem_id){
      var bus = document.getElementById("container_onibus");
      // Descarrega a página de seleção de poltronas
      $.ajax({
        url:'onibus_layout.php',
        type:'POST',
        data:{id_viagem: viagem_id, 'poltronas': poltronas},
        success: function(dados){
          $('#container_onibus').html(dados);
          if($('.poltronas').disabled){
            $('.poltronas').css('background', 'black');
          }
        }
      });
    // Abre a aba de poltronas pela viagem selecionada
      if(bus.style.display == "none" ) {
        // console.log(poltronas);
          bus.style.display = "flex";
        // Senão fecha a aba de poltronas
        } else {
          bus.style.display = "none";
      }
    }
    // Função que dispara a compra de passagem
    // $(document).on('submit', '#_comprar', (e) =>{
    //   e.preventDefault();
    //   alert('voce quase comprou hehe');
    // });

    // navigator.geolocation.getCurrentPosition(function(pos){
    //   console.log(pos);
    // });
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
              url: "<?php echo($paths); ?>login.php",
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
       ?>
       <div class="conteudo_horarios">
       <div class="container_horarios">
         <div class="container_horarios2">
           <div class="nome_passagem">Passagem de Onibus de <?php echo $_POST['txtorigem']; ?> -  para <?php echo $_POST['txtdestino']; ?></div>

           <div class="tempo_compra">
             <div class="momentos_horario">Horarios</div>
             <div class="momentos">Identificação</div>
             <div class="momentos">Pagamento</div>
             <div class="normalizar">

             </div>
           </div>

           <div class="lista_horarios">

             <table class="tabela_horarios">
               <tr class="linha_horarios">
                 <td class="coluna_horarios">Saida/Chegada</td>
                 <td class="coluna_horarios">Embarque/Desembarque</td>
                 <td class="coluna_horarios">Hora de saída</td>
                 <td class="coluna_horarios">Classe</td>
                 <td class="coluna_horarios">Preço</td>
                 <td class="coluna_horarios"></td>
               </tr>
               <?php

                 require_once('../models/dados_viagem_class.php');
                 require_once('../controllers/dados_viagem_controller.php');

                 $controller_viagens = new ControllerDadosViagem();

                 $list = $controller_viagens::buscar();
                 // echo(sizeof($list));
                 $cont = 0;
                 if($list[0]->origem != ''){

                   while($cont < count($list)){
               ?>
               <tr class="linha_horarios">
                 <td class="coluna_horarios"><?php echo $list[$cont]->origem;?>/<?php echo $list[$cont]->destino;?></td>
                 <td class="coluna_horarios"><?php echo $list[$cont]->data_saida;?>/<?php echo $list[$cont]->data_chegada;?></td>
                 <td class="coluna_horarios"><?php echo $list[$cont]->hora_saida;?></td>
                 <td class="coluna_horarios"><?php echo $list[$cont]->classe;?></td>
                 <td class="coluna_horarios">R$ <?php echo $list[$cont]->preco;?></td>
                 <td class="coluna_horarios"><a href="#" class="select"  onClick="Onibus(<?php echo $list[$cont]->poltronas.','.$list[$cont]->id ?>);">Selecionar</td></a>
               </tr>
               <?php
                      $cont+=1;
                    }
                 }else{
                   // header('location:../index.php');
                   // echo('<script>alert("ERRO!!")</script>');
                 }
               ?>
             </table>
             <div id="container_onibus" style="display: none;"></div>
           </div>
         </div>
       </div>
       </div>
    <?php require_once('footer.php'); ?>
  </body>
</html>
