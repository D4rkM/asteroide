
<!--
  Autor: BRUNA
  Data de modificação: 22/03/2018
  Detalhes: Está pagina tem como objetivo listar as frotas de onibus da Empresa
  Asteroide
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
  -->
<div class="imagem-de-fundo" style="background-image:url('img/inf_legislacao.jpg');">
  <div class="titulo-sobre-imagem">
    FROTAS
  </div>
</div>
<div class="conteudo-frotas">
  <!-- <div class="galeria"> -->

    <div class="titulo-conteudo-padrao text-center">
      <!-- Subtitulo e descrição da página de frotas -->
      <h2 style="text-transform:uppercase;">Nossas Frotas</h2>
    </div>
    <div class="titulo_locais">
      <h3 class="text-center" style="text-transform:uppercase;">
        A qualidade e o conforto que nossos passageiros merecem para suas viagens
      </h3>
    </div>

    <?php
    $y = 0;
     while ($y <= 3) {
      # code...
     ?>
    <div class="locais-viagem galeria">
      <!-- Conteúdo da página -->
      <?php
        $a =0;
        while ($a <= 2 ) {
          # code...

        ?>
      <div class="polaroid img-galery">
          <!-- <div class="container_onibus_imagem"> -->
            <img class="" src="img/busasteroide.jpg" alt="bus" title="frotas">
          <!-- </div> -->
          <div class="texto-polaroid">
            <p>Viajar de ônibus não é mais</p>
          </div>
      </div>
      <?php
          $a++;
        }
      ?>
    </div>
    <?php
      $y++;
    }?>
  <!-- </div> -->
</div>
