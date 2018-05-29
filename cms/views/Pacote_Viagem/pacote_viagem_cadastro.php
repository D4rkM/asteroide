
<?php
   require_once("../../controllers/pacote_viagem_controller.php");
   require_once("../../models/pacote_viagem_class.php");
?>

<form enctype="multipart/form-data" method="post" action="router.php?controller=pacote_viagem&modo=novo">
  <div class="cadastro_pacote_viagem">
      <div class="text_duvida">Origem</div>
      <input class="box_postos" type="text" name="origem">
      <div class="text_duvida">Destino</div>
      <input class="box_postos" type="text" name="destino">
      <div class="text_duvida">Descricao</div>
      <input class="box_postos" type="text" name="descricao">
      <input class="salvar_postos_rodoviarios" type="submit" name="btnCadastrar" value="Cadastrar">
  </div>
</form>
