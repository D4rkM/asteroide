
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
