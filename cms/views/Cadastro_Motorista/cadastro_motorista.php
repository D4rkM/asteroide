<?php
  // require_once("../../controllers/motorista_controller.php");
  // require_once("../../models/motorista_class.php");
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
<form class="frmCadFunc" method="post" action="router.php?controller=motorista&modo=novo" enctype="multipart/form-data">
  <div class="cadastrar_motorista">
    <div class="cont_pessoais">
      <label for="foto">
        <div  class="adicionar_frota" id="imagem">
          <img id="id_sua_img" src="img/bus.jpg" alt="foto"/>
        </div>
      </label>
      <!--Botão para selecionar a foto-->
      <div class="input-foto">
        <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
      </div>
      <div class="text_funcionario">Nome</div>
      <input class="box_funcionario" type="text" name="txtNome" placeholder="Ex.: Jubileu Afonseca" maxlength="35">
      <div class="text_funcionario">Email</div>
      <input class="box_funcionario" type="text" name="txtEmail" placeholder="Ex.: jubileu@hotmail.com" maxlength="40">
      <div class="text_funcionario">Usuario</div>
      <input class="box_funcionario" type="text" name="txtUsuario" placeholder="Ex.: jubileu" maxlength="10">
      <div class="text_funcionario">Senha</div>
      <input class="box_funcionario" type="password" name="txtSenha" placeholder="******" maxlength="10">
      <div class="text_funcionario">Data de Nascimento</div>
      <input class="box_funcionario" id="dataNascimento" type="text"  name="txtDataNasc" placeholder="DD/MM/AAAA" maxlength="10">
      <div class="text_funcionario">Sexo</div>
      <div class="radio">
        <input type="radio" name="rdoSexo" value="F">Feminino
        <input type="radio" name="rdoSexo" value="M">Masculino
      </div>
    </div>
    <div class="cont_endereco">
      <div class="text_funcionario">Telefone</div>
      <input class="box_funcionario" type="text" id='telefone' name="txtTelefone" value="" placeholder="DDD XXXX-XXXX" maxlength="13">
      <div class="text_funcionario">Celular</div>
      <input class="box_funcionario" type="text" id='celular' name="txtCelular" value="" placeholder="DDD XXXXX-XXXX" maxlength="15">
      <div class="text_funcionario">CPF</div>
      <input class="box_funcionario" type="text" name="txtCPF" value="" maxlength="14">
      <div class="text_funcionario">RG</div>
      <input class="box_funcionario" type="text" name="txtRG" value="" maxlength="12">
      <div class="text_funcionario">CNH</div>
      <input class="box_funcionario" type="text"  name="txtcnh">
      <div class="text_funcionario">Ativar<input type="checkbox" name="ativo" value="1" checked>Ativo</div>
      <input class="salvar_funcionario" type="submit" name="btnCadastrarFunc" value="Cadastrar">
    </div>
  </div>
</form>
