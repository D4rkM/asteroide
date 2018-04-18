
<?php
  // require_once("../../controllers/duvidas_controller.php");
  // require_once("../../models/duvidas_class.php");
?>

<form class="frmCadDuvida" method="post" action="router.php?controller=duvida&modo=novo">
  <div class="cadastro_duvida">
    <div class="text_duvida">Pergunta</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <div class="text_duvida">Resposta</div>
    <textarea class="box_area" name="txtAreaRespotaDuvidaFreq"></textarea>
    <div class="text_duvida">Ativar <input type="checkbox" name="chkDuvidaFrequente" value="1" checked></div>

    <input class="salvar_duvida" type="submit" name="btnCadastrar" value="Cadastrar">
  </div>
</form>
