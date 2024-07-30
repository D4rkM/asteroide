<?php
   require_once("../../controllers/frotas_controller.php");
   require_once("../../models/frotas_class.php");
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
<form method="post" action="router.php?controller=frotas&modo=novo" enctype="multipart/form-data">
  <div class="cadastro_frotas">
      <div class="text_frotas">Nome do Onibus</div>
      <input class="box_frotas" type="text" name="txtnome" value="">
      <div class="text_frotas">Imagem do Onibus</div>
      <label for="foto">
        <div  class="adicionar_imagem" id="imagem">
          <img id="id_sua_img" src="img/bus.jpg" alt="foto"/>
        </div>
      </label>
      <!--Botão para selecionar a foto-->
      <div class="input-foto">
        <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
      </div>
      <input class="salvar_frota" type="submit" name="btnsalvar" value="Salvar">
  </div>
</form>
