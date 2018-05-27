
<?php
   // require_once("../../controllers/pacote_viagem_controller.php");
   // require_once("../../models/pacote_viagem_class.php");

   // require_once("../../controllers/parada_controller.php");
   // require_once("../../models/parada_class.php");
?>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/list.js"></script>

<form enctype="multipart/form-data" method="post" action="router.php?controller=parada&modo=novo">
<div class="hold">
    <div class="list">
      <ul id="parada_para_selecionar">
        <?php
          require_once("../../controllers/parada_controller.php");
          require_once("../../models/parada_class.php");
          $parada = new controllerParada();
          $list = $parada::Listar();
          $cont = 0;
          // echo($list[1]->id);
          while($cont < count($list)){
            ?>
            <li> <?php echo('id='.$list[$cont]->id); ?><?php echo($list[$cont]->tipo_parada); ?></li>
            <?php
              $cont+=1;
              }
            ?>
      </ul>
    </div>

    <div class="list">
      <ul id="parada_selecionada">
      </ul>
    </div>

    <div class="list">
      <form method="post">
        <select id=viagem name="cbx_viagem">
          <?php
          // $Vselect = "SELECT * FROM viagem;";
          //
          // $Vquery = mysqli_query($conn, $Vselect);
          //
          // while($vRs = mysqli_fetch_array($Vquery)){
            ?>
            <option value="<?php //echo($vRs['idviagem']); ?>"><?php //echo($vRs['nome']); ?></option>
            <?php
          //}
          ?>
        </select>
        <button id="save" type="submit" name="button">Salvar</button>
      </form>
    </div>
  </div>
</form>
