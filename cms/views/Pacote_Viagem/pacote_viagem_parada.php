
<?php
   require_once("../../controllers/pacote_viagem_controller.php");
   require_once("../../models/pacote_viagem_class.php");

   require_once("../../controllers/parada_controller.php");
   require_once("../../models/parada_class.php");
?>
<form enctype="multipart/form-data" method="post" action="router.php?controller=pacote_viagem&modo=novo">
<div class="hold">
    <div class="list">
      <ul id="parada_para_selecionar">
        <?php
        // $parada = new Parada();
        // if(){
        //   while($rs = mysqli_fetch_array($query)){
            ?>
            <li <?php //echo('id='.$rs['idparada']); ?>><?php //echo($rs['nome']); ?></li>
            <?php
        //   }
        // }else{
        //   echo("Não foi possível se conectar com o banco.\n". $query ."\n". $select);
        // }

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
