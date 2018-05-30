<!-- Filtro de busca de destino -->
<div class="filtro_busca">
  <div class="txt_filtro">Filtro</div>
  <form action="views/horarios-onibus.php" method="post">
    <div class="txt_filtro2">Origem:</div>
    <!-- <select class="" name="">
      <option value="Jundiai"></option>
    </select> -->
    <input class="box_filtro" type="text" name="txtorigem" value="" required>
    <div class="txt_filtro2">Destino:</div>
    <input class="box_filtro" type="text" name="txtdestino" value="" required>
    <div class="txt_filtro2">Dara de Ida:</div>
    <input class="box_filtro" type="date" name="txtida" >
    <!-- <div class="txt_filtro2">Data de Volta:</div>
    <input class="box_filtro" type="text" name="txtvolta" value=""> -->
    <button class="btn_buscar" type="submit" name="btn_confirma">Buscar</button>
  </form>
</div>
