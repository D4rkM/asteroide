<!-- Filtro de busca de destino -->
<div class="cardbox filtro_busca">
  <div class="cardbox-title title_filtro">
    <p>Qual o seu destino?</p>
  </div>

  <div class="content-filtro">
    <form action="router.php?controller=viagens&modo=buscar&tipo=0" enctype="multipart/form-data" method="post">
      <div class="control-filtro">
        <label for="txtorigem" class="txt_filtro2">Origem:</label>
        <input id="txtorigem" class="input-box box_filtro" type="text" name="txtorigem" required autocomplete="off">
      </div>
      <div class="control-filtro">
        <label for="txtdestino" class="txt_filtro2 ">Destino:</label>
        <input id="txtdestino" class="input-box box_filtro" type="text" name="txtdestino" required autocomplete="off">
      </div>
      <div class="control-filtro">
        <label for="txtdata" class="txt_filtro2 ">Dara de Ida:</label>
        <input id="txtdata" class="box_filtro input-box" type="date" name="txtida" >
      </div>
      <!-- <div class="txt_filtro2">Data de Volta:</div>
      <input class="box_filtro" type="text" name="txtvolta" value=""> -->
      <div class="btn-left">
        <button class="btn btn_buscar" type="submit" name="btn_confirma">Buscar</button>
      </div>
    </form>
  </div>
</div>
