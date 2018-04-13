
<?php

  require_once("../../controllers/frotas_controller.php");
  require_once("../../models/frotas_class.php");

?>

<form method="post" action="router.php?controller=frotas&modo=novo">
  <div class="area-cad-duvida">
    <h2>Gerenciamento da Página Frotas de Onibus</h2>
        <div class="tabela_gerenciamento_frotas">
          <div >
              <h3>Data de inserção</h3>
              <input id="datainsercao" class="box_text2" type="text" name="txtdatainsercao" maxlength="10">
          </div>
            <div >
              <h3>Nome do Onibus</h3>
              <input class="box_text2" type="text" name="txtnome" value="">
            </div>
            <div>
              <h3>Imagem do Onibus</h3>
              <input type="file" name="imagem" value="">
            </div>
            <input class="btn_salvar" type="submit" name="btnsalvar" value="Salvar">
        </div>
  </div>
</form>
