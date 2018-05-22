
<?php
   // require_once("../../controllers/viagem_controller.php");
   // require_once("../../models/viagem_class.php");
?>
<form enctype="multipart/form-data" method="post" action="router.php?controller=viagem&modo=novo">
  <div class="cadastro_viagem">
  <div class="txt_viagem">Data e Horario Saida</div>
  <input class="box_viagem" type="text" name="saida" value="">
  <div class="txt_viagem">Data e Horario Chehada</div>
  <input class="box_viagem" type="text" name="chegada" value="">
  <div class="txt_viagem">Descricao</div>
  <input class="box_viagem" type="text" name="descricao" value="">
  <div class="txt_viagem">KM</div>
  <input class="box_viagem" type="text" name="km" value="">
  <div class="txt_viagem">Pacote de Viagem</div>
  <select class="select_viagem" name="pacote_viagem">
    <?php
        require_once("../../controllers/pacote_viagem_controller.php");
        require_once("../../models/pacote_viagem_class.php");

        $controllerPacoteViagem = new controllerPacoteViagem;
        $list=$controllerPacoteViagem::Listar();

        $cont = 0;

        while($cont < count($list)){

        ?>
        <option value="<?php echo($list[$cont]->id)?>">
            <?php echo($list[$cont]->titulo)?></option>

        <?php
          $cont+=1;
            }
            ?>
  </select>
  <input class="salvar_viagem" type="submit" name="btnsalvar" value="Salvar">
  </div>
</form>
