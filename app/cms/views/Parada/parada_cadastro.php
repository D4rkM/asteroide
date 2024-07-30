<?php
   // require_once("../../controllers/parada_controller.php");
   // require_once("../../models/parada_class.php");
?>
<link rel="stylesheet" href="css/parada.css">
<form class="" action="router.php?controller=parada&modo=novo" method="post" >
  <div class="cadastro_parada">
    <div class="text_parada">Tipo de Parada</div>
    <select class="select_parada" name="tipo_parada_id">
      <?php
          require_once("../../controllers/tipo_parada_controller.php");
          require_once("../../models/tipo_parada_class.php");

          $controllerTipoParada = new controllerTipoParada;
          $list=$controllerTipoParada::Listar();

          $cont = 0;

          while($cont < count($list)){

          ?>
          <option value="<?php echo($list[$cont]->id)?>">
              <?php echo($list[$cont]->tipo_parada)?></option>

          <?php
            $cont+=1;
              }
              ?>
    </select>
    <div class="text_home">Endereço</div>
    <select class="select_home" name="endereco_id">
      <?php
          require_once("../../controllers/endereco_controller.php");
          require_once("../../models/endereco_class.php");

          $controllerEndereco = new controllerEndereco();
          $list=$controllerEndereco::Listar();

          $cont = 0;

          while($cont < count($list)){

          ?>
          <option value="<?php echo($list[$cont]->id)?>">
              <?php echo($list[$cont]->rua)?></option>

          <?php
            $cont+=1;
              }
              ?>
    </select>
    <input class="salvar_parada" type="submit" name="" value="Salvar">
  </div>
</form>
