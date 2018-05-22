
<?php
   require_once("../../controllers/pacote_viagem_controller.php");
   require_once("../../models/pacote_viagem_class.php");
?>

<form enctype="multipart/form-data" method="post" action="router.php?controller=pacote_viagem&modo=novo">
  <div class="cadastro_pacote_viagem">
    <div class="cont_pacote_viagem">
    <div class="text_duvida">Titulo</div>
    <input class="box_postos" type="text" name="titulo">
    <div class="text_duvida">Descricao</div>
    <input class="box_postos" type="text" name="descricao">
    <input class="salvar_postos_rodoviarios" type="submit" name="btnCadastrar" value="Cadastrar">
  </div>
  </div>
</form>
