
<?php
  // require_once("../../controllers/postos_rodoviarios_controller.php");
  // require_once("../../models/postos_rodoviarios_class.php");
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
  <div class="cadastro_funcionario">
    <div class="cont_pessoais">
    <div class="text_duvida">Nome do Destino</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <div class="text_duvida">Data</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <div class="text_duvida">Horario</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <div class="text_duvida">Descriçaõ</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <div class="text_duvida">Imagem</div>
    <label for="foto">
      <div  class="adicionar_frota" id="imagem">
        <img id="id_sua_img" src="img/bus.jpg" alt="foto"/>
      </div>
    </label>
    <!--Botão para selecionar a foto-->
    <div class="input-foto">
      <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
    </div>
  </div>
  <div class="cont_endereco">
    <div class="text_duvida">Partida</div>
    <select class="select_postos_rodoviarios" name="">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Chegada</div>
    <select class="select_postos_rodoviarios" name="">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Onibus</div>
    <select class="select_postos_rodoviarios" name="">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Parada</div>
    <select class="select_postos_rodoviarios" name="">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Motorista</div>
    <select class="select_postos_rodoviarios" name="">
      <option value="">Itapevi</option>
      <option value="">Cotia</option>
      <option value="">Osasco</option>
    </select>
    <div class="text_duvida">Valor</div>
    <input class="box_duvida" type="text" name="txtDuvidaFreq">
    <input class="salvar_postos_rodoviarios" type="submit" name="btnCadastrar" value="Cadastrar">
  </div>
  </div>
</form>
