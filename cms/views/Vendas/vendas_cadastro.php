
<?php
  // require_once("../../controllers/postos_rodoviarios_controller.php");
  // require_once("../../models/postos_rodoviarios_class.php");
?>

<form class="frmCadDuvida" method="post" action="router.php?controller=postos_rodoviarios&modo=novo">
  <div class="cadastro_postos_rodoviarios">
    <div class="text_duvida">Nome do Destino</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <div class="text_duvida">Data</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <div class="text_duvida">Horario</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <div class="text_duvida">Descriçaõ</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <div class="text_duvida">Imagem</div>
    <label for="Foto">
      <img class="img_postos_rodoviarios" src="img/bus.jpg" alt="imagem">
    </label>
    <div class="inpt_foto">
      <input id="Foto" type="file" name="imagem">
    </div>
    <div class="text_duvida">Partida</div>
    <select class="select_postos_rodoviarios" name="">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Chegada</div>
    <select class="select_postos_rodoviarios" name="">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Caminho</div>
    <select class="select_postos_rodoviarios" name="">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Motorista</div>
    <select class="select_postos_rodoviarios" name="">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Valor</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <input class="salvar_postos_rodoviarios" type="submit" name="btnCadastrar" value="Cadastrar">
  </div>
</form>
