<?php
	$id = $_POST['id'];


?>
<html>
	<head>
		<title> Teste Modal </title>
	</head>

	<script>
$(document).ready(function() {

  $(".fechar").click(function() {
    //$(".modalContainer").fadeOut();
	$(".modalContainer").fadeOut(750);
  });
});

	</script>

<body>

	<div class="fecharModal">
		<a href="#" class="fechar">X</a>
	</div>
	<div>

		<?php

		  require_once("../../controllers/funcionario_controller.php");
		  require_once("../../models/funcionario_class.php");


			$funcionario_controller = new controllerFuncionario();

			$dadosFuncionario = $funcionario_controller::Buscar($id);
		?>

		<div class="tltModal">
			Edição de Funcionario
		</div>

		<form class="frmCadFunc" method="post" action="router.php?controller=funcionario&modo=editar&id=<?php echo $id; ?>">
		  <div class="area-cad-func">
		    <div class="div-cad-func">
		      <div class="tlt-dado-func">
		        Nome:
		      </div>

		      <div class="area-dado-func">
		        <input type="text" name="txtNomeFunc" value="<?php echo $dadosFuncionario->nome ?>" placeholder="Ex.: Jubileu Afonseca" maxlength="35">
		      </div>

		      <div class="tlt-dado-func">
		        Usuario:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtUsuarioFunc" value="<?php echo $dadosFuncionario->login ?>" placeholder="Ex.: jubileu" maxlength="10">
		      </div>

		      <div class="tlt-dado-func">
		        Data de nascimento:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtDataNascFunc" value="<?php
						 $data = implode("/",array_reverse(explode("-",$dadosFuncionario->data_nasc )));
						 echo $data;

						 ?>" placeholder="DD/MM/AAAA" maxlength="10">
		      </div>

		      <div class="tlt-dado-func">
		        Telefone:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtTelefoneFunc" value="<?php echo $dadosFuncionario->telefone ?>" placeholder="DDD XXXX-XXXX" maxlength="13">
		      </div>

		      <div class="tlt-dado-func">
		        CPF:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtCPFFunc" value="<?php echo $dadosFuncionario->cpf ?>" maxlength="14" >
		      </div>

		      <div class="tlt-dado-func">
		        CEP:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtCEPFunc" value="<?php echo $dadosFuncionario->cep ?>" >
		      </div>
		      <div class="box-dois-itens-cad-func">
		        <div class="itens-dois">
		          <div class="tlt-dados-pequenos-cad-func">
		            Número:
		          </div>
		          <div class="dados-pequenos-cad-func">
		            <input type="text" name="txtNumeroCasaFunc" value="<?php echo $dadosFuncionario->numero ?>" Ex.: 123>
		          </div>
		        </div>
		        <div class="itens-dois">
		          <div class="tlt-dados-pequenos-cad-func">
		            Bairro:
		          </div>
		          <div class="dados-pequenos-cad-func">
		            <input type="text" name="txtBairroFunc" value="<?php echo $dadosFuncionario->bairro ?>">
		          </div>
		        </div>

		      </div>
		      <div class="area-radio-dado-func">

		        <input type="checkbox" name="chkAtivo" value="" <?php if($dadosFuncionario->ativo == 1) echo 'checked' ?>>Ativo
		      </div>
		    </div>
		    <div class="div-cad-func">
		      <div class="tlt-dado-func">
		        E-mail:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtEmailFunc" value="<?php echo $dadosFuncionario->email ?>" placeholder="Ex.: jubileu@hotmail.com">
		      </div>
		      <div class="tlt-dado-func">
		        Senha:
		      </div>
		      <div class="area-dado-func">
		        <input type="password" name="txtSenhaFunc" value="<?php echo $dadosFuncionario->senha ?>" placeholder="******" >
		      </div>

		      <div class="tlt-dado-func">
		        Sexo:
		      </div>
		      <div class="area-radio-dado-func">
		        <input type="radio" name="rdoSexoFunc" value="F" <?php if($dadosFuncionario->sexo == 'F') echo "checked"?>>Feminino
		        <input type="radio" name="rdoSexoFunc" value="M" <?php if($dadosFuncionario->sexo == 'M') echo "checked"?>>Masculino
		      </div>

		      <div class="tlt-dado-func">
		        Celular:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtCelularFunc" value="<?php echo $dadosFuncionario->celular ?>" placeholder="DDD XXXXX-XXXX" >
		      </div>

		      <div class="tlt-dado-func">
		        RG:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtRGFunc" value="<?php echo $dadosFuncionario->rg ?>" >
		      </div>

		      <div class="tlt-dado-func">
		        Logradouro:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtLogradouroFunc" value="<?php echo $dadosFuncionario->logradouro ?>" >
		      </div>

		      <div class="tlt-dado-func">
		        Complemento:
		      </div>
		      <div class="area-dado-func">
		        <input type="text" name="txtComplementoFunc" value="<?php echo $dadosFuncionario->complemento ?>" >
		      </div>
		      <div class="area-dado-func">
		        <input type="submit" name="btnCadastrarFunc" value="Atualizar" >
		      </div>
		    </div>

		  </div>

		</form>

	</div>

</body>
</html>
