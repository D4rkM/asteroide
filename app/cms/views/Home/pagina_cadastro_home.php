<?php
   require_once("../../controllers/home_controller.php");
   require_once("../../models/home_class.php");
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
<form class="" action="router.php?controller=home&modo=novo" method="post" enctype="multipart/form-data">
  <div class="cadastro_home">
    <div class="text_home">Nome da Viagem</div>
    <select class="select_home" name="id_viagem">
      <?php
          require_once("../../controllers/viagem_controller.php");
          require_once("../../models/viagem_class.php");

          $controllerViagem = new controllerViagem;
          $list=$controllerViagem::Listar();

          $cont = 0;

          while($cont < count($list)){

          ?>
          <option value="<?php echo($list[$cont]->id)?>">
              <?php echo($list[$cont]->origem. " - " .$list[$cont]->destino)?></option>

          <?php
            $cont+=1;
              }
              ?>
    </select>
    <div class="text_home">Imagem</div>
    <label for="foto">
      <div  class="adicionar_imagem" id="imagem">
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
