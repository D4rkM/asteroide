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
    <script src="../js/jquery-3.3.1.js"></script>
    <script>
      var color = 0;
    $(document).on('click', '.poltronas', function(){

      var selecionado = $(this);
      // var bg = $(this).css('background-color');
      // console.log(bg);

      if(color == 0) {
        selecionado.css('background', 'yellow');
        color = 1;
        // Senão, troca pra amarelo
      } else if(color == 1) {
        selecionado.css('background', 'green');
        color = 0;
      }
    });

    // function Selecionar(){
    //   var selecionado = document.getElementsByClassName('poltronas');
    //
    //   // Se estiver amarelo, troca pra verde
    //   if(selecionado.css('background', 'green')) {
    //       selecionado.css('background', 'yellow');
    //
    //   // Senão, troca pra amarelo
    //   } else {
    //       selecionado.css('background', 'green');
    //   }
    // }

    function Onibus(){
      var abrir_poltronas = document.getElementById("container_onibus");
      if(abrir_poltronas.style.display = "none") {
      //       selecionado.css('background', 'yellow');
      //
      //   // Senão, troca pra amarelo
      //   } else {
      //       selecionado.css('background', 'green');
      //   }
      abrir_poltronas.style.display = "block";
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
                 <td class="coluna_horarios"><a href="#" onclick="Onibus()">Selecionar</td></a>
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
             <div id="container_onibus">
               <div class="legenda">
                 <div class="leg_box" style="background-color:green;"></div><div class="leg_text">Disponivel</div>
                 <div class="leg_box" style="background-color:yellow;"></div><div class="leg_text">Selecionado</div>
                 <div class="leg_box" style=""></div><div class="leg_text">Ocupado</div>
               </div>
               <div class="onibus">
                 <div class="fileira">
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>1</div></a>
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>2</div></a>
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>3</div></a>
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>4</div></a>
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>5</div></a>
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>6</div></a>
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>7</div></a>
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>8</div></a>
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>9</div></a>
                   <a href="#" ><div class ="poltronas" style="background: green;" val=1>10</div></a>
                 </div>
                 <div class="fileira">
                   <div class ="poltronas">11</div>
                   <div class ="poltronas">12</div>
                   <div class ="poltronas">13</div>
                   <div class ="poltronas">14</div>
                   <div class ="poltronas">15</div>
                   <div class ="poltronas">16</div>
                   <div class ="poltronas">17</div>
                   <div class ="poltronas">18</div>
                   <div class ="poltronas">19</div>
                   <div class ="poltronas">20</div>
                 </div>
                 <br>
                 <br>
                 <div class="fileira">
                   <div class ="poltronas">21</div>
                   <div class ="poltronas">22</div>
                   <div class ="poltronas">23</div>
                   <div class ="poltronas">24</div>
                   <div class ="poltronas">25</div>
                   <div class ="poltronas">26</div>
                   <div class ="poltronas">27</div>
                   <div class ="poltronas">28</div>
                   <div class ="poltronas">29</div>
                   <div class ="poltronas">30</div>
                 </div>
                 <div class="fileira">
                   <div class ="poltronas">31</div>
                   <div class ="poltronas">32</div>
                   <div class ="poltronas">33</div>
                   <div class ="poltronas">34</div>
                   <div class ="poltronas">35</div>
                   <div class ="poltronas">36</div>
                   <div class ="poltronas">37</div>
                   <div class ="poltronas">38</div>
                   <div class ="poltronas">39</div>
                   <div class ="poltronas">40</div>
                 </div>
               </div>
             </div>
            <div class="Continua">
              <a href="Usuario/usuario_identificacao.php">
               Continuar
              </a>
            </div>
             </form>
           </div>
         </div>
       </div>
       </div>
    <?php require_once('footer.php'); ?>
  </body>
</html>
