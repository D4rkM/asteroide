
<?php
   // require_once("../../controllers/pacote_viagem_controller.php");
   // require_once("../../models/pacote_viagem_class.php");

   // require_once("../../controllers/parada_controller.php");
   // require_once("../../models/parada_class.php");
?>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/list.js"></script>

<form enctype="multipart/form-data" method="post" action="router.php?controller=itinerario&modo=novo">
<div class="hold">
    <div class="list">
      <div class="titulo_itinerario">1 Lista de Paradas</div>
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
<<<<<<< HEAD
            <li <?php echo('id='.$list[$cont]->id); ?>><?php echo($list[$cont]->tipo_parada); ?></li>
=======
            <li> <?php echo('id='.$list[$cont]->id); ?><?php echo($list[$cont]->tipo_parada); ?></li>
>>>>>>> aeaf8fa1d0d8f1e5bed469dda8b7d793fde53f91
            <?php
              $cont+=1;
              }
            ?>
      </ul>
    </div>

    <div class="list">
      <div class="titulo_itinerario">2 Ordene as Paradas</div>
      <ul id="parada_selecionada">
      </ul>
    </div>

    <div class="list">
      <div class="titulo_itinerario">3 Encolha o Pacote</div>
      <form method="post">
        <select class="select_iti" id=viagem name="pacote_viagem">
          <?php
            require_once("../../controllers/pacote_viagem_controller.php");
            require_once("../../models/pacote_viagem_class.php");

            $controllerPacoteViagem = new controllerPacoteViagem();
            $list = $controllerPacoteViagem::Listar();
            $cont = 0;
            // var_dump($list);die;
            while($cont < count($list)){
            ?>
            <option value="<?php echo($list[$cont]->id); ?>"><?php echo $list[$cont]->origem. "X" .$list[$cont]->destino?></option>
            <?php
                $cont+=1;
              }
            ?>
        </select>
        <button class="salvar_iti" id="save" type="submit" name="button">Salvar</button>
      </form>
    </div>
  </div>
</form>
