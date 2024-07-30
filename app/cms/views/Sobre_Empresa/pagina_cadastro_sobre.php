
<?php
  // require_once("../../controllers/sobre_empresa_controller.php");
  // require_once("../../models//sobre_empresa_class.php");
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

<form class="frmCadDuvida" method="post" action="router.php?controller=sobreEmpresa&modo=novo">
  <div class="cadastro_empresa">
    <div class="cont_text">
      <div class="text_empresa">Titulo1</div>
      <input class="box_empresa" type="text" name="txttitulo1" value="">
      <div class="text_empresa">Texto1</div>
      <textarea class="box_area" name="txttexto1"></textarea>
      <div class="text_empresa">Titulo2</div>
      <input class="box_empresa" type="text" name="txttitulo2" value="">
      <div class="text_empresa">Texto2</div>
      <textarea class="box_area" name="txttexto2"></textarea>
      <div class="text_empresa">Imagem</div>
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
    <div class="cont_icons">
      <div class="text_empresa">icone 1</div>
        <label for="Foto">
            <div class="icon_empresa">Escolha um icone</div>
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="icon1">
        </div>
        <div class="text_empresa">Detalhes dos icone 1</div>
        <input class="box_empresa" type="text" name="txtdetalhes1">

        <div class="text_empresa">icone 2</div>
        <label for="Foto">
            <div class="icon_empresa">Escolha um icone</div>
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="icon2">
        </div>

        <div class="text_empresa">Detalhes dos icone 2</div>
        <input class="box_empresa" type="text" name="txtdetalhes2">

        <div class="text_empresa">icone 3
        </div>
        <label for="Foto">
            <div class="icon_empresa">Escolha um icone</div>
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="icon3">
        </div>

        <div class="text_empresa">Detalhes dos icone 3</div>
        <input class="box_empresa" type="text" name="txtdetalhes3">

        <div class="text_empresa">icone 4</div>
        <label for="Foto">
            <div class="icon_empresa">Escolha um icone</div>
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="icon4">
        </div>

        <div class="text_empresa">Detalhes dos icone 4</div>
        <input class="box_empresa" type="text" name="txtdetalhes4">

      <input class="salva_empresa" type="submit" name="btnCadastrar" value="Cadastrar">
    </div>
  </div>
</form>
