<form class="" action="router.php?controller=home&modo=novo" method="post">
  <div class="cadastro_home">
    <div class="text_home">Nome do destino</div>
    <input class="box_home" type="text" name="txtdestino" value="">
    <div class="text_home">Imagem</div>
    <label for="foto">
      <div  class="adicionar_frota" id="imagem">
        <img id="id_sua_img" src="img/bus.jpg" alt="foto"/>
      </div>
    </label>
    <!--Botão para selecionar a foto-->
    <div class="input-foto">
      <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
    </div>
    <div class="text_home">Tipo</div>
    <select class="select_home" name="tipo">
      <?php
          require_once("../../controllers/tipo_destino_controller.php");
          require_once("../../models/tipo_destino_class.php");

          $controllerTipoDestino = new controllerTipoDestino;
          $list=$controllerTipoDestino::Listar();

          $cont = 0;

          while($cont < count($list)){

          ?>
          <option value="<?php echo($list[$cont]->id)?>">
              <?php echo($list[$cont]->tipo)?></option>

          <?php
            $cont+=1;
              }
              ?>
    </select>
    <input class="salvar_home" type="submit" name="" value="Salvar">
  </div>
</form>
