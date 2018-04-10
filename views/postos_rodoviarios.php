
<!--
  Autor: BRUNA
  Data de modificação: 22/03/2018
  Detalhes: Está pagina tem como objetivo mostar todos os postos Rodoviarios
  para compram de passagens da viação Asterpide
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
  -->
<link rel="stylesheet" href="css/carrossel_frotas.css">
<!-- Conteúdo da página -->
<div class="imagem-de-fundo" style="background-image:url('img/inf_legislacao.jpg');">
  <div class="titulo-sobre-imagem">
    POSTOS RODOVIÁRIOS
  </div>
</div>

<div class="inf inf-postos-rodoviarios">
  <!--Container que segura todas as informações dos postos rodoviarios -->
  <div class="titulo-conteudo-padrao">
    <h2>ENCONTRE O POSTO MAIS PRÓXIMO DE VOCÊ</h2>
  </div>
  <?php
    $a = 0;
    $cidades = array('Sao paulo','Rio de Janeiro','Parana','Rio grande do sul');
    while($a < 4){
   ?>
  <div class="caixas-inf">
    <div class="inf-subtitulos">
      <div class="escrita-principal">
        <?php echo($cidades[$a]); ?>
      </div>
      <div class="icon">
        <img src="img\icon\down.svg" alt="Mostrar Mais" title="Mostrar mais">
      </div>
    </div>
    <div class="inf-conteudo">
      <div class="conteudo-legislacao">

      </div>
    </div>
  </div>
  <?php
  $a++;
 } ?>


</div>
