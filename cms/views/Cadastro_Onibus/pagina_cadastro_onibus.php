
<?php
    // $id=$_GET('id');

   // require_once('../../controllers/onibus_controller.php');
   // require_once('../../models/onibus_class.php');

?>
<form action="router.php?controller=onibus&modo=novo" method="post" enctype="multipart/form-data">
    <div class="cadastro_onibus">
        <div class="text_onibus">Poltronas</div>
        <input class="box_onibus" type="text" name="poltronas" value="">
        <div class="text_onibus">KM rodado</div>
        <input class="box_onibus" type="text" name="km" value="">
        <div class="text_onibus">Classe</div>
        <select class="select_onibus" name="classe">
          <?php
              require_once("../../controllers/classe_onibus_controller.php");
              require_once("../../models/classe_onibus_class.php");
              $controllerClasseOnibus = new controllerClasseOnibus();
              $list=$controllerClasseOnibus::Listar();
              $cont = 0;
              while($cont < count($list)){
              ?>
              <option value="<?php echo($list[$cont]->id)?>">
                  <?php echo($list[$cont]->classe)?></option>
          <?php
              $cont+=1;
              }
          ?>
        </select>
        <div class="text_onibus">Placa</div>
        <input class="box_onibus" type="text" name="placa" value="">
        <div class="text_onibus">Status de manutenção</div>
        <select class="select_onibus" name="status">
          <?php
              require_once("../../controllers/status_onibus_controller.php");
              require_once("../../models/status_onibus_class.php");
              $controllerStatusOnibus = new controllerStatusOnibus();
              $list=$controllerStatusOnibus::Listar();
              $cont = 0;
              while($cont < count($list)){
              ?>
              <option value="<?php echo($list[$cont]->id)?>">
                  <?php echo($list[$cont]->status)?></option>
          <?php
              $cont+=1;
              }
          ?>
        </select>
        <div class="text_onibus">codigo</div>
        <input class="box_onibus" type="text" name="codigo" value="">
        <input class="salva_onibus" type="submit" name="btnsalvar" value="Salvar">
    </div>
</form>
