
<?php
  require_once("../../controllers/postos_rodoviarios_controller.php");
  require_once("../../models/postos_rodoviarios_class.php");
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
<form class="frmCadDuvida" method="post" action="router.php?controller=postos_rodoviarios&modo=novo">
  <div class="cadastro_rodoviarios">
    <div class="text_duvida">Nome do posto</div>
    <input class="box_duvida" type="text" name="nome">
    <div class="text_duvida">Imagme do Posto</div>
    <label for="foto">
      <div  class="adicionar_frota" id="imagem">
        <img id="id_sua_img" src="img/bus.jpg" alt="foto"/>
      </div>
    </label>
    <!--Botão para selecionar a foto-->
    <div class="input-foto">
      <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
    </div>
    <div class="text_duvida">Cep</div>
    <input class="box_duvida" type="text" name="cep">
    <div class="text_duvida">Logradouro</div>
    <input class="box_duvida" type="text" name="logradouro">
    <div class="text_duvida">Numero</div>
    <input class="box_duvida" type="text" name="numero">
    <div class="text_duvida">Bairro</div>
    <input class="box_duvida" type="text" name="bairro">
    <div class="text_duvida">Cidade</div>
    <select class="select_postos_rodoviarios" name="cidade">
      <?php
    require_once("../../controller/cidade_controller.php");
    require_once("../../controller/cidade_class.php");

    $controllerCidade = new controllerCidade();
    $list=$controllerCidade::Listar();

    $cont = 0;

    while($cont < cont($list)){
     ?>

     <option value="<?php echo $list[$cont]->id?>"><?php echo($list[$cont]->nome) ?></option>
     <?php
     $cont+=1;
   }
      ?>
    </select>
    <input class="salvar_postos_rodoviarios" type="submit" name="btnCadastrar" value="Cadastrar">
  </div>
</form>
