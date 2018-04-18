
<?php

  // require_once('../../controllers/onibus_controller.php');
  // require_once('../../models/onibus_class.php');

?>

<form action="router.php?controller=sobreEmpresa&modo=novo" method="post" enctype="multipart/form-data">
    <div class="cadastro_onibus">
      <div class="cont_onibus1">
        <div class="text_onibus">Placa</div>
        <input class="box_onibus" type="text" name="txtplaca" value="">
        <div class="text_onibus">Numero de poltranas</div>
        <input class="box_onibus" type="text" name="txtpoltrona" value="">
        <div class="text_onibus">KM rodado</div>
        <input class="box_onibus" type="text" name="txtkmrodado" value="">
        <div class="text_onibus">KM para manutemção</div>
        <input class="box_onibus" type="text" name="txtkmmanutencao" value="">

        <div class="text_onibus">Imagem do onibus</div>
        <label for="Foto">
            <img class="img_onibus" src="img/bus.jpg" alt="imagem">
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="imagem">
        </div>

      </div>
      <div class="cont_onibus2">

        <div class="text_onibus">Detalhes</div>
        <input class="box_onibus" type="text" name="txtdetalhes">

        <div class="text_onibus">Classe</div>
        <select class="select_onibus" name="classe">
          <option value="">Executivo</option>
          <option value="">Teste</option>
        </select>

        <div class="text_onibus">Status de manutenção</div>
        <input class="box_onibus" type="text" name="txtstatus">

        <input class="salva_onibus" type="submit" name="btnsalvar" value="Salvar">
      </div>

    </div>
</form>
