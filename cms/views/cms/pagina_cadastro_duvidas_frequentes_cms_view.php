
<?php

  require_once("../../controllers/duvidas_controller.php");
  require_once("../../models/duvidas_class.php");

?>

<form class="frmCadDuvida" method="post" action="router.php?controller=duvida&modo=novo">
  <div class="area-cad-duvida">
    <div class="area-form-duvida">
      <div class="pergunta">
        <div class="txt-pergunta">
          Duvida:
        </div>
        <div class="input-pergunta">
          <input type="text" name="txtDuvidaFreq" value="" maxlength="">
        </div>
        <div class="area-chk-btn-duvida">
          <input type="checkbox" name="chkDuvidaFrequente" value="1" checked>Aparecer
        </div>
        <div class="area-chk-btn-duvida">
          <input type="submit" name="btnCadastrar" value="Cadastrar">
        </div>
      </div>
      <div class="pergunta">
        <div class="txt-pergunta">
          Resposta:
        </div>
        <div class="input-pergunta">
          <textarea name="txtAreaRespotaDuvidaFreq" rows="8" cols="40"></textarea>
        </div>
      </div>
    </div>
  </div>
</form>
