<?php
  require_once("../../controllers/funcionario_controller.php");
  require_once("../../models/funcionario_class.php");
  require_once("../../controllers/estado_controller.php");
  require_once("../../models/estado_class.php");
?>
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
<form class="frmCadFunc" method="post" action="router.php?controller=funcionario&modo=novo">
  <div class="cadastro_funcionario">
    <div class="cont_pessoais">
      <label for="foto">
        <div  class="adicionar_imagem" id="imagem">
          <img id="id_sua_img" src="img/bus.jpg" alt="foto"/>
        </div>
      </label>
      <!--Botão para selecionar a foto-->
      <div class="input-foto">
        <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
      </div>
      <div class="text_funcionario">Nome</div>
      <input class="box_funcionario" type="text" name="txtNomeFunc" placeholder="Ex.: Jubileu Afonseca" maxlength="35">
      <div class="text_funcionario">Email</div>
      <input class="box_funcionario" type="text" name="txtEmailFunc" placeholder="Ex.: jubileu@hotmail.com" maxlength="40">
      <div class="text_funcionario">Usuario</div>
      <input class="box_funcionario" type="text" name="txtUsuarioFunc" placeholder="Ex.: jubileu" maxlength="10">
      <div class="text_funcionario">Senha</div>
      <input class="box_funcionario" type="password" name="txtSenhaFunc" placeholder="******" maxlength="10">
      <div class="text_funcionario">Data de Nascimento</div>
      <input class="box_funcionario" id="dataNascimento" type="text"  name="txtDataNascFunc" placeholder="DD/MM/AAAA" maxlength="10">
      <div class="text_funcionario">Sexo</div>
      <div class="radio">
        <input type="radio" name="rdoSexoFunc" value="F">Feminino
        <input type="radio" name="rdoSexoFunc" value="M">Masculino
      </div>
    </div>
    <div class="cont_endereco">
      <div class="text_funcionario">CPF</div>
      <input class="box_funcionario" type="text" name="txtCPFFunc" value="" maxlength="14">
      <div class="text_funcionario">RG</div>
      <input class="box_funcionario" type="text" name="txtRGFunc" value="" maxlength="12">
      <div class="text_funcionario">Telefone</div>
      <input class="box_funcionario" type="text" id='telefone' name="txtTelefoneFunc" value="" placeholder="DDD XXXX-XXXX" maxlength="13">
      <div class="text_funcionario">Celular</div>
      <input class="box_funcionario" type="text" id='celular' name="txtCelularFunc" value="" placeholder="DDD XXXXX-XXXX" maxlength="15">
      <div class="text_funcionario">CEP</div>
      <input class="box_funcionario" type="text" name="txtCEPFunc" value="" >
      <div class="text_funcionario">Logradouro</div>
      <input class="box_funcionario" type="text" name="txtLogradouroFunc" value="" maxlength="40">
      <div class="text_funcionario">Numero</div>
      <input class="box_funcionario" type="text" name="txtNumeroCasaFunc" value="" placeholder="Ex.: 123" maxlength="5">
      <div class="text_funcionario">bairro</div>
      <input class="box_funcionario" type="text" name="txtBairroFunc" value="" maxlength="15">
      <div class="text_funcionario">Complemento</div>
      <input class="box_funcionario" type="text" name="txtComplementoFunc" value="" maxlength="40">
      <div class="text_funcionario">Ativar<input type="checkbox" name="chkAtivo" value="1" checked>Ativo</div>
      <input class="salvar_funcionario" type="submit" name="btnCadastrarFunc" value="Cadastrar">
    </div>
  </div>
</form>
