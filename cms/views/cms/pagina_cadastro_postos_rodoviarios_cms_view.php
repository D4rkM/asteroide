
<?php

  require_once("../../controllers/postos_controller.php");
  require_once("../../models/postos_class.php");

?>

<form class="frmCadDuvida" method="post" action="router.php?controller=postos&modo=novo">
  <div class="area-cad-duvida">
    <h2>Gerenciamento da Página Postos Rodoviarios</h2>
        <div class="tabela_gerenciamento">
          <div >
              <h3>Data de inserção</h3>
              <input id="datainsercao" class="box_text2" type="text" name="txtdatainsercaofrotas" maxlength="10">
          </div>
            <div >
              <h3>Nome do Posto Rodoviario</h3>
              <input class="box_text2" type="text" name="txtnome" value="">
            </div>
            <div>
              <h3>Imagem do Posto Rodoviario</h3>
              <input type="file" name="imagem" value="">
            </div>
            <div>
              <h3>Localização</h3>
              <input type="text" name="txtlocalizacao" value="">
            </div>
            <div>
              <h3>Texto</h3>
              <input type="text" name="txttexto" value="">
            </div>
            <div>
              <h3>Imagem do Posto Rodoviario</h3>
              <select class="" name="estados">
                <option value="">São Paulo</option>
                <option value="">Rio de Janeiro</option>
                <option value="">Parana</option>
              </select>
            </div>
            <input class="btn_salvar" type="submit" name="btnsalvar" value="Salvar">
        </div>
  </div>
</form>
