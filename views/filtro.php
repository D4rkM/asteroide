<!-- Filtro de busca de destino -->
<div class="cardbox filtro_busca">
  <div class="cardbox-title title_filtro">
    <p>Qual o seu destino?</p>
  </div>

  <div class="content-filtro">
    <form action="router.php?controller=viagens&modo=buscar" enctype="multipart/form-data" method="post">
      <div class="control-filtro">
        <label for="txtorigem" class="txt_filtro2 subtitulo">Origem:</label>
        <input id="txtorigem" class="input-box" type="text" name="txtorigem" required autocomplete="off">
      </div>
      <div class="control-filtro">
        <div class="txt_filtro2 subtitulo">Destino:</div>
        <input id="txtdestino" class="input-box box_filtro" type="text" name="txtdestino" required autocomplete="off">
      </div>
      <div class="control-filtro">
        <div class="txt_filtro2 subtitulo">Dara de Ida:</div>
        <input class="box_filtro input-box" type="date" name="txtida" >
      </div>
      <!-- <div class="txt_filtro2">Data de Volta:</div>
      <input class="box_filtro" type="text" name="txtvolta" value=""> -->
      <div class="btn-left">
        <button class="btn btn_buscar" type="submit" name="btn_confirma">Buscar</button>
      </div>
    </form>
  </div>
</div>
