<!-- Filtro de busca de destino -->
<div class="filtro_busca">
  <div class="txt_filtro">Filtro</div>
  <form class="" action="router.php?controller=viagens&modo=buscar" method="post">
    <div class="txt_filtro2">Origem:</div>
    <input class="box_filtro" type="text" name="txtorigem" value="">
    <div class="txt_filtro2">Destino:</div>
    <input class="box_filtro" type="text" name="txtdestino" value="">
    <div class="txt_filtro2">Dara de Ida:</div>
    <input class="box_filtro" type="text" name="txtida" value="">
    <div class="txt_filtro2">Data de Volta:</div>
    <input class="box_filtro" type="text" name="txtvolta" value="">
    <button class="btn_buscar" type="submit" name="btn_confirma">Buscar</button>
  </form>
</div>
