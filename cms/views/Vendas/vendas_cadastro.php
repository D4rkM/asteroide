
<?php
  // require_once("../../controllers/vendas_controller.php");
  // require_once("../../models/vendas_class.php");
?>
<script src="js/jquery.min.js"></script>
<script>
$("#foto").change(function(){
   if($(this).val()){ // só se o input não estiver vazio
      var img = this.files[0]; // seleciona o arquivo do input
      var f = new FileReader(); // cria o objeto FileReader
      f.onload = function(e){ // ao carregar a imagem
         $("#id_sua_img").attr("src",e.target.result); // altera o src da imagem
      }
      f.readAsDataURL(img); // lê o arquivo
   }
});
</script>
<form enctype="multipart/form-data" method="post" action="router.php?controller=vendas&modo=novo">
  <div class="cadastro_vendas">
    <div class="cont_vendas1">
    <div class="text_duvida">Nome do Destino</div>
    <input class="box_duvida" type="text" name="txtdestino">
    <div class="text_duvida">Data</div>
    <input class="box_duvida" type="text" name="txtdata">
    <div class="text_duvida">Horario</div>
    <input class="box_duvida" type="text" name="txthoras">
    <div class="text_duvida">Descriçaõ</div>
    <input class="box_duvida" type="text" name="txtdescricao">
    <div class="text_duvida">Imagem</div>
    <label for="foto">
      <div  class="adicionar_imagem" id="imagem">
        <img id="id_sua_img" src="img/bus.jpg" alt="foto"/>
      </div>
    </label>
    <!--Botão para selecionar a foto-->
    <div class="input-foto">
      <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
    </div>
  </div>
  <div class="cont_vendas2">
    <div class="text_duvida">Partida</div>
    <select class="select_postos_rodoviarios" name="partida">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Chegada</div>
    <select class="select_postos_rodoviarios" name="chegada">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Onibus</div>
    <select class="select_postos_rodoviarios" name="onibus">
      <?php
          require_once("../../controllers/onibus_controller.php");
          require_once("../../models/onibus_class.php");

          $controllerOnibus = new controllerOnibus;
          $list=$controllerOnibus::Listar();

          $cont = 0;
          while($cont < count($list)){
          ?>
          <option value="<?php echo($list[$cont]->id)?>">
              <?php echo($list[$cont]->placa)?></option>

          <?php
            $cont+=1;
              }
          ?>
    </select>
    <div class="text_duvida">Parada</div>
    <select class="select_postos_rodoviarios" name="parada">
      <?php
          require_once("../../controllers/parada_controller.php");
          require_once("../../models/parada_class.php");

          $controllerParada = new controllerParada;
          $list=$controllerParada::Listar();

          $cont = 0;
          while($cont < count($list)){
          ?>
          <option value="<?php echo($list[$cont]->id)?>">
              <?php echo($list[$cont]->nome)?></option>

          <?php
            $cont+=1;
              }
          ?>
    </select>
    <div class="text_duvida">Motorista</div>
    <select class="select_postos_rodoviarios" name="motorista">
      <?php
          require_once("../../controllers/motorista_controller.php");
          require_once("../../models/motorista_class.php");

          $controllerMotorista = new controllerMotorista;
          $list=$controllerMotorista::Listar();

          $cont = 0;
          while($cont < count($list)){
          ?>
          <option value="<?php echo($list[$cont]->id)?>">
              <?php echo($list[$cont]->nome)?></option>

          <?php
            $cont+=1;
              }
          ?>
    </select>
    <div class="text_duvida">Valor</div>
    <input class="box_duvida" type="text" name="txtvalor">
    <input class="salvar_postos_rodoviarios" type="submit" name="btnCadastrar" value="Cadastrar">
  </div>
  </div>
</form>
