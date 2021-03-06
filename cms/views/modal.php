<?php
	$id = $_POST['id'];
	$pagina = $_POST['pagina'];
?>
<html>
	<head>
		<title> Teste Modal </title>
		<script type="text/javascript"></script>
		<script>
			$(document).ready(function() {
			  $(".fechar").click(function() {
			    //$(".modalContainer").fadeOut();
				$(".modalContainer").fadeOut(750);
			  });
			});
		</script>
	</head>
	<body>
		<div class="fecharModal">
			<a href="#" class="fechar">X</a>
		</div>
<!-- Editar da pagina de DUVIDAS FREQUENTES -->
<?php
	if($pagina=='duvida'){
		require_once("../controllers/duvidas_controller.php");
		require_once("../models/duvidas_class.php");

		$duvida_controller = new controllerDuvidas();
		$dadosDuvida = $duvida_controller::Buscar($id);
?>
		<div class="tltModal">
				Edição de Duvidas Frequentes
		</div>

		<form class="frmCadDuvida" method="post" action="router.php?controller=duvida&modo=editar&id=<?php echo $id; ?>" enctype="multipart/form-data">
			<div class="text_duvida">Pergunta</div>
		  <input class="box_duvida" type="text" name="txtDuvidaFreq" value="<?php echo $dadosDuvida->pergunta ?>">
		  <div class="text_duvida">Resposta</div>
		  <textarea class="box_area" name="txtAreaRespotaDuvidaFreq"><?php echo $dadosDuvida->resposta ?></textarea>
			<div class="text_duvida">Ativar <input type="checkbox" name="chkDuvidaFrequente" value="1">
			<?php
				if($dadosDuvida->aparecer=='1'){
				 echo 'checked';
			  }
			 ?>
			</div>
			<input class="salvar_duvida" type="submit" name="btnCadastrar" value="Atualizar">
		</form>

<!-- Editar da pagina da HOME -->
 <?php
}elseif ($pagina=='home') {
	require_once("../controllers/home_controller.php");
	require_once("../models/home_class.php");

	$home_controller = new controllerHome();
	$dadosHome = $home_controller::Buscar($id);
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
<div class="tltModal">
	Edição da Home
</div>
		<form class="frmCadDuvida" method="post" action="router.php?controller=home&modo=editar&id=<?php echo $id; ?>" enctype="multipart/form-data">
			<div class="text_home">Nome da Viagem</div>
	    <select class="select_home" name="id_viagem">
	      <?php
	          require_once("../controllers/viagem_controller.php");
	          require_once("../models/viagem_class.php");

	          $controllerViagem = new controllerViagem;
	          $list=$controllerViagem::Listar();

	          $cont = 0;
						$select = " ";
	          while($cont < count($list)){
							if ($list[$cont]->id == $dadosHome->tipo)	{
								// echo("<script>alert(".$list[$cont]->id.");</script>");
								$selected = 'selected';
							}
	          ?>
	          <option <?php echo $select ?> value="<?php echo($list[$cont]->pacote_viagem)?>">
	              <?php echo($list[$cont]->origem. " - " .$list[$cont]->destino)?></option>

	          <?php
	            $cont+=1;
							$select = " ";
	              }
	              ?>
	    </select>
			<div class="text_home">Imagem</div>
			<label for="foto">
        <div  class="adicionar_frota" id="imagem">
          <img id="id_sua_img" src="<?php echo $dadosHome->imagem ?>" alt="foto"/>
        </div>
      </label>
      <!--Botão para selecionar a foto-->
      <div class="input-foto">
        <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
      </div>
	    <div class="text_home">Tipo</div>
	    <select class="select_home" name="tipo" value="">
				<?php
	          require_once("../controllers/tipo_destino_controller.php");
	          require_once("../models/tipo_destino_class.php");

	          $controllerTipoDestino = new controllerTipoDestino;
	          $list = $controllerTipoDestino::Listar();
						// print_r($list);
	          $cont = 0;
						$selected = '';
	          while($cont < count($list)){

						if ($list[$cont]->id == $dadosHome->tipo)	{
							// echo("<script>alert(".$list[$cont]->id.");</script>");

							$selected = 'selected';
						}
	          ?>
	          <option <?php echo $selected ?> value="<?php echo($list[$cont]->id)?>">
	              <?php echo($list[$cont]->tipo)?></option>
	          <?php
	            $cont+=1;
							$selected = '';
	              }
	              ?>
	    </select>
	    <input class="salvar_home" type="submit" name="" value="Salvar">
		</form>
<!-- Editar da pagina de FROTAS -->
		<?php
	}if($pagina=='frotas'){
	require_once("../controllers/frotas_controller.php");
	require_once("../models/frotas_class.php");

	$frotas_controller = new controllerFrotas();
	$dadosFrotas = $frotas_controller::Buscar($id);
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
		<div class="tltModal">
			Edição de Frotas
		</div>

		<form method="post" action="router.php?controller=frotas&modo=editar&id=<?php echo $id ?>" enctype="multipart/form-data">
			<div class="text_frotas">Nome do Onibus</div>
			<input class="box_frotas" type="text" name="txtnome" value="<?php echo $dadosFrotas->nome ?>">
			<div class="text_frotas">Imagem do Onibus</div>
			<label for="foto">
        <div  class="adicionar_frota" id="imagem">
          <img id="id_sua_img" src="<?php echo $dadosFrotas->imagem ?>" alt="foto"/>
        </div>
      </label>
      <!--Botão para selecionar a foto-->
      <div class="input-foto">
        <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
      </div>
			<input class="salvar_frota" type="submit" name="btnsalvar" value="Alterar">
		</form>
<!-- Editar da pagina de FUNCIONARIOS -->
<?php
 }if($pagina=='funcionario'){
 	require_once("../controllers/funcionario_controller.php");
	require_once("../models/funcionario_class.php");

	$funcionarios_controller = new controllerFuncionario();
	$dadosFuncionarios = $funcionarios_controller::Buscar($id);
?>
	<div class="tltModal">
		Edição de funcionarios
	</div>

	<form class="frmFuncionario" method="post" action="router.php?controller=funcionarios&modo=editar&id=<?php echo $id; ?>">
	<div class="cont_pessoais">
		<div class="text_funcionario">Nome</div>
		<input class="box_funcionario" type="text" name="txtNomeFunc" placeholder="Ex.: Jubileu Afonseca" maxlength="35" value="<?php echo $dadosFuncionarios->nome ?>">
		<div class="text_funcionario">Email</div>
		<input class="box_funcionario" type="text" name="txtEmailFunc" placeholder="Ex.: jubileu@hotmail.com" maxlength="40" value="<?php echo $dadosFuncionarios->email ?>">
		<div class="text_funcionario">Usuario</div>
		<input class="box_funcionario" type="text" name="txtUsuarioFunc" placeholder="Ex.: jubileu" maxlength="10" value="<?php echo $dadosFuncionarios->usuario ?>">
		<div class="text_funcionario">Senha</div>
		<input class="box_funcionario" type="password" name="txtSenhaFunc" placeholder="******" maxlength="10" value="<?php echo $dadosFuncionarios->senha ?>">
		<div class="text_funcionario">Data de Nascimento</div>
		<input class="box_funcionario" id="dataNascimento" type="text"  name="txtDataNascFunc" placeholder="DD/MM/AAAA" maxlength="10" value="<?php echo $dadosFuncionarios->data_nasc ?>">
		<div class="text_funcionario">Sexo</div>
		<div class="radio">
		<input type="radio" name="rdoSexoFunc" value="F" <?php if($dadosFuncionarios->sexo == 'F') echo "checked"?>>Feminino
		<input type="radio" name="rdoSexoFunc" value="M" <?php if($dadosFuncionarios->sexo == 'M') echo "checked"?>>Masculino
		</div>
		<div class="text_funcionario">CPF</div>
		<input class="box_funcionario" type="text" name="txtCPFFunc" <?php echo $dadosFuncionarios->cpf ?> maxlength="14" >
		<div class="text_funcionario">RG</div>
		<input class="box_funcionario" type="text" name="txtRGFunc" <?php echo $dadosFuncionarios->rg ?> maxlength="12">
	</div>
	<div class="cont_endereco">
		<div class="text_funcionario">Telefone</div>
		<input class="box_funcionario" type="text" id='telefone' name="txtTelefoneFunc" <?php echo $dadosFuncionarios->telefone ?> placeholder="DDD XXXX-XXXX" maxlength="13">
		<div class="text_funcionario">Celular</div>
		<input class="box_funcionario" type="text" id='celular' name="txtCelularFunc" <?php echo $dadosFuncionarios->celular ?> placeholder="DDD XXXXX-XXXX" maxlength="15">
		<div class="text_funcionario">CEP</div>
		<input class="box_funcionario" type="text" name="txtCEPFunc" <?php //echo $dadosFuncionarios->cep ?> >
		<div class="text_funcionario">Logradouro</div>
		<input class="box_funcionario" type="text" name="txtLogradouroFunc" <?php //echo $dadosFuncionarios->logradouro ?> maxlength="40">
		<div class="text_funcionario">Numero</div>
		<input class="box_funcionario" type="text" name="txtNumeroCasaFunc" <?php //echo $dadosFuncionarios->numero ?> placeholder="Ex.: 123" maxlength="5">
		<div class="text_funcionario">bairro</div>
		<input class="box_funcionario" type="text" name="txtBairroFunc" <?php //echo $dadosFuncionarios->bairro ?> maxlength="15">
		<div class="text_funcionario">Complemento</div>
		<input class="box_funcionario" type="text" name="txtComplementoFunc" <?php //echo $dadosFuncionarios->complemento ?> maxlength="40">
		<div class="text_funcionario">Ativar<input type="checkbox" name="chkAtivo" value="1" checked>Ativo>
		<?php
			if($dadosFuncionarios->ativar=='1'){
			 echo 'checked';
		 }
		 ?>
    </div>
		<input class="salvar_funcionario" type="submit" name="btnCadastrarFunc" value="Alterar">,
        </div>
  </form>
<!-- Editar da pagina de MOTORISTA -->
<?php
  }if($pagina=='motorista'){

	require_once("../controllers/motorista_controller.php");
	require_once("../models/motorista_class.php");

	$motorista_controller = new controllerMotorista();
	$dadosMotorista = $motorista_controller::Buscar($id);
?>
  <div class="tltModal">
	 Edição de Motorista
  </div>

  <form class="frmFuncionario" method="post" action="router.php?controller=motorista&modo=editar&id=<?php echo $id; ?>">
  <div class="cont_pessoais">
		<!--Container para colocar a imagem de perfil-->
		<label for="foto">
			<div  class="adicionar_frota" id="imagem">
				<img id="id_sua_img" src="<?php echo $dadosMotorista->imagem?>" alt="foto"/>
			</div>
		</label>
		<!--Botão para selecionar a foto-->
		<div class="input-foto">
			<input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
		</div>
		<div class="text_funcionario">Nome</div>
		<input class="box_funcionario" type="text" name="txtNome" placeholder="Ex.: Jubileu Afonseca" maxlength="35" value="<?php echo $dadosMotorista->nome?>">
		<div class="text_funcionario">Email</div>
		<input class="box_funcionario" type="text" name="txtEmail" placeholder="Ex.: jubileu@hotmail.com" maxlength="40" value="<?php echo $dadosMotorista->email?>">
		<div class="text_funcionario">Usuario</div>
		<input class="box_funcionario" type="text" name="txtUsuario" placeholder="Ex.: jubileu" maxlength="10" value="<?php echo $dadosMotorista->usuario?>">
		<div class="text_funcionario">Senha</div>
		<input class="box_funcionario" type="password" name="txtSenha" placeholder="******" maxlength="10" value="<?php echo $dadosMotorista->senha?>">
		<div class="text_funcionario">Data de Nascimento</div>
		<input class="box_funcionario" id="dataNascimento" type="text"  name="txtDataNasc" placeholder="DD/MM/AAAA" maxlength="10" value="<?php echo $dadosMotorista->data_nasc?>">
		<div class="text_funcionario">Sexo</div>
		<div class="radio">
		<input type="radio" name="rdoSexo" value="F" <?php if($dadosMotorista->sexo == 'F') echo "checked"?>>Feminino
		<input type="radio" name="rdoSexo" value="M" <?php if($dadosMotorista->sexo == 'M') echo "checked"?>>Masculino
		</div>
	</div>
  <div class="cont_endereco">
		<div class="text_funcionario">CPF</div>
		<input class="box_funcionario" type="text" name="txtCPF" value="<?php echo $dadosMotorista->cpf?>" maxlength="14">
		<div class="text_funcionario">RG</div>
		<input class="box_funcionario" type="text" name="txtRG" value="<?php echo $dadosMotorista->rg?>" maxlength="12">
		<div class="text_funcionario">Telefone</div>
		<input class="box_funcionario" type="text" id='telefone' name="txtTelefone" value="<?php echo $dadosMotorista->telefone?>" placeholder="DDD XXXX-XXXX" maxlength="13">
		<div class="text_funcionario">CNH</div>
		<input class="box_funcionario" type="text" id='telefone' name="txtcnh" value="<?php echo $dadosMotorista->cnh?>"maxlength="13">
		<div class="text_funcionario">Celular</div>
		<input class="box_funcionario" type="text" id='celular' name="txtCelular" value="<?php echo $dadosMotorista->celular?>" placeholder="DDD XXXXX-XXXX" maxlength="15">
		<div class="text_funcionario">Ativar<input type="checkbox" name="chkAtivo" value="1" checked>Ativo
		<?php
		if($dadosMotorista->ativo=='1'){
		 echo 'checked';
		}
		?>
	  </div>
		<input class="salvar_funcionario" type="submit" name="btnCadastrarFunc" value="Alterar">
  </div>
	</form>
	<!-- Editar da pagina de TIPO DE DESTINO -->
	<?php
}if($pagina=='tipo_destino'){
		require_once("../controllers/tipo_destino_controller.php");
		require_once("../models/tipo_destino_class.php");

		$destino_controller = new controllerTipoDestino();
		$dadosDestino = $destino_controller::Buscar($id);
?>
			<div class="tltModal">
				Edição de Tipo de Destino
			</div>

			<form class="frmCadDuvida" method="post" action="router.php?controller=tipo_destino&modo=editar&id=<?php echo $id; ?>" enctype="multipart/form-data">
				<div class="text_postos">Tipo de Destino</div>
		    <input class="box_postos" type="text" name="txttipo" value="<?php echo $dadosDestino->tipo?>">
		    <input class="salvar_postos" type="submit" name="btnsalvar" value="Alterar">
			</form>
<!-- Editar da PARADAS -->
<?php
}if($pagina=='parada'){
			require_once("../controllers/parada_controller.php");
			require_once("../models/parada_class.php");

			$parada_controller = new controllerParada();
			$dadosParada = $parada_controller::Buscar($id);
		?>
		<link rel="stylesheet" href="css/parada.css">
				<div class="tltModal">
					Edição de Parada
				</div>

				<form class="" action="router.php?controller=parada&modo=editar&id=<?php echo $id?>" method="post" >
				    <div class="text_parada">Tipo de Parada</div>
				    <select class="select_parada" name="tipo_parada_id">
				      <?php
				          require_once("../controllers/tipo_parada_controller.php");
				          require_once("../models/tipo_parada_class.php");

				          $controllerTipoParada = new controllerTipoParada;
				          $list=$controllerTipoParada::Listar();

				          $cont = 0;
									$selected = '';
				          while($cont < count($list)){
										if ($list[$cont]->id == $dadosParada->tipo_parada_id)	{
										// echo("<script>alert(".$list[$cont]->id.");</script>");
										$selected = 'selected';
									}
				          ?>
				          <option <?php echo $selected ?> value="<?php echo($list[$cont]->id)?>">
				              <?php echo($list[$cont]->tipo_parada)?></option>

				          <?php
				            $cont+=1;
										$selected = '';
				              }
				              ?>
				    </select>
				    <div class="text_home">Endereço</div>
				    <select class="select_home" name="endereco_id">
				      <?php
				          require_once("../controllers/endereco_controller.php");
				          require_once("../models/endereco_class.php");

				          $controllerEndereco = new controllerEndereco();
				          $list=$controllerEndereco::Listar();

				          $cont = 0;
									$selected = '';
				          while($cont < count($list)){
										if ($list[$cont]->id == $dadosParada->endereco_id)	{
										// echo("<script>alert(".$list[$cont]->id.");</script>");
										$selected = 'selected';
									}
				          ?>
				          <option <?php echo $selected ?> value="<?php echo($list[$cont]->id)?>">
				              <?php echo($list[$cont]->rua)?></option>

				          <?php
				            $cont+=1;
										$selected = '';
				              }
				              ?>
				    </select>
				    <input class="salvar_parada" type="submit" name="" value="Alterar">
				</form>

 <?php
 }if($pagina=='onibus'){
					require_once("../controllers/onibus_controller.php");
					require_once("../models/onibus_class.php");

					$onibus_controller = new controllerOnibus();
					$dadosOnibus = $onibus_controller::Buscar($id);
			?>
								<div class="tltModal">
									Edição do Onibus
								</div>

								<form action="router.php?controller=onibus&modo=editar&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
									<div class="text_onibus">Poltronas</div>
									<input class="box_onibus" type="text" name="poltronas" value="<?php echo $dadosOnibus->poltronas ?>">
									<div class="text_onibus">KM rodado</div>
									<input class="box_onibus" type="text" name="km" value="<?php echo $dadosOnibus->km ?>">
									<div class="text_onibus">Classe</div>
									<select class="select_onibus" name="classe">
										<?php
												require_once("../controllers/classe_onibus_controller.php");
												require_once("../models/classe_onibus_class.php");
												$controllerClasseOnibus = new controllerClasseOnibus();
												$list=$controllerClasseOnibus::Listar();
												$cont = 0;
												$selected = "";
												while($cont < count($list)){
													if($list[$cont]->id == $dadosOnibus->classe){
														$selected = "selected";
													}
												?>
												<option <?php echo $selected ?> value="<?php echo($list[$cont]->id)?>">
														<?php echo($list[$cont]->classe)?></option>
										<?php
										$selected = "";
												$cont+=1;
												}
										?>
									</select>
									<div class="text_onibus">Placa</div>
									<input class="box_onibus" type="text" name="placa" value="<?php echo $dadosOnibus->placa ?>">
									<div class="text_onibus">Status de manutenção</div>
									<select class="select_onibus" name="status">
										<?php
												require_once("../controllers/status_onibus_controller.php");
												require_once("../models/status_onibus_class.php");
												$controllerStatusOnibus = new controllerStatusOnibus();
												$list=$controllerStatusOnibus::Listar();
												$cont = 0;
												$selected = "";
												while($cont < count($list)){
													if($list[$cont]->id == $dadosOnibus->status){
														$selected = "selected";
													}
												?>
												<option <?php $selected ?> value="<?php echo($list[$cont]->id)?>">
														<?php echo($list[$cont]->status)?></option>
										<?php
												$selected = "";
												$cont+=1;
												}
										?>
									</select>
									<div class="text_onibus">codigo</div>
									<input class="box_onibus" type="text" name="codigo" value="<?php echo $dadosOnibus->codigo ?>">
									<input class="salva_onibus" type="submit" name="btnsalvar" value="Alterar">

								</form>
 <?php
}if($pagina=='classe'){

	require_once('../controllers/classe_onibus_controller.php');
	require_once('../models/classe_onibus_class.php');

	$classe_controller = new controllerClasseOnibus;
	$dadosClasse = $classe_controller::Buscar($id);

?>
<div class="tltModal">
	Edição da Classe dos Onibus
</div>
<form class="frmEstadosPostos" action="router.php?controller=classe_onibus&modo=editar&id=<?php echo $id; ?>" method="post">
<!-- Cadastro de Classes de onibus -->
	<div class="text_postos">Nome da Classe</div>
	<input class="box_postos" type="text" name="txtclasse" value="<?php echo $dadosClasse->classe ?>">
	<input class="salvar_postos" type="submit" name="btnsalvar" value="Salvar">
 </form>
 <?php
}if($pagina=='caminho'){

	require_once('../controllers/caminho_controller.php');
	require_once('../models/caminho_class.php');

	$caminho_controller = new controllerCaminho();
	$dadosCaminho = $caminho_controller::Buscar($id);

?>
<div class="tltModal">
	Edição de Caminho
</div>
<form class="frmEstadosPostos" action="router.php?controller=caminho&modo=editar&id=<?php echo $id; ?>" method="post">
<!-- Cadastro de Classes de onibus -->
<div class="text_home">Latitude</div>
<input class="box_home" type="text" name="txtlatitude" value="<?php echo $dadosCaminho->latitude ?>">
<div class="text_home">Longitude</div>
<input class="box_home" type="text" name="txtlongitude" value="<?php echo $dadosCaminho->longitude ?>">
<input class="salvar_home" type="submit" name="" value="Salvar">
	</form>
		<!-- Cadastro de Postos Rodoviarios -->
		<?php
	}if($pagina=='postos_rodoviarios'){

	 	require_once('../controllers/postos_rodoviarios_controller.php');
	 	require_once('../models/postos_rodoviarios_class.php');

	 	$postos_rodoviarios_controller = new controllerCaminho();
	 	$dadosCaminho = $postos_rodoviarios_controller::Buscar($id);

	 ?>
	 <div class="tltModal">
	 	Edição de Postos Rodoviarios
	 </div>
	 <form class="frmCadDuvida" method="post" action="router.php?controller=postos_rodoviarios&modo=editar" enctype="multipart/form-data">
	   <div class="cadastro_rodoviarios">
	     <div class="text_duvida">Nome do posto</div>
	     <input class="box_duvida" type="text" name="nome">
	     <div class="text_duvida">Imagme do Posto</div>
	     <label for="foto">
	       <div  class="adicionar_imagem" id="imagem">
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
	     <div class="text_duvida">Complemento</div>
	     <input class="box_duvida" type="text" name="complemento">
	     <div class="text_duvida">Bairro</div>
	     <input class="box_duvida" type="text" name="bairro">
	     <div class="text_duvida">Cidade</div>
	       <select class="select_postos_rodoviarios" name="cidade">
	         <?php
	             require_once("../../controllers/cidade_controller.php");
	             require_once("../../models/cidade_class.php");

	             $controllerCidade = new controllerCidade();
	             $list=$controllerCidade::Listar();
	             $cont = 0;

	             while($cont < count($list)){
	              ?>

	              <option value="<?php echo $list[$cont]->id?>">
	                <?php echo($list[$cont]->nome_cidade) ?></option>
	              <?php
	              $cont+=1;
	            }
	               ?>
	       </select>

        <input class="salvar_home" type="submit" name="" value="Alterar">
	   </div>
</form>
<?php
	}if($pagina=='pacote_viagem'){

	require_once('../controllers/pacote_viagem_controller.php');
	require_once('../models/pacote_viagem_class.php');

	$controllerPacoteViagem = new controllerPacoteViagem();
	$dadosPacoteViagem = $controllerPacoteViagem::Buscar($id);

?>
<form enctype="multipart/form-data" method="post" action="router.php?controller=pacote_viagem&modo=editar&id=<?php echo $id ?>">
      <div class="text_duvida">Origem</div>
      <input class="box_postos" type="text" name="origem" value="<?php echo $dadosPacoteViagem->origem; ?>">
      <div class="text_duvida">Destino</div>
      <input class="box_postos" type="text" name="destino" value="<?php echo $dadosPacoteViagem->destino; ?>">
      <div class="text_duvida">Descricao</div>
      <input class="box_postos" type="text" name="descricao" value="<?php echo $dadosPacoteViagem->descricao; ?>">
      <input class="salvar_postos_rodoviarios" type="submit" name="btnCadastrar" value="Alterar">
</form>
<?php
	}if($pagina=='viagem'){

	require_once('../controllers/viagem_controller.php');
	require_once('../models/viagem_class.php');

	$controllerViagem = new controllerViagem();
	$dadosViagem = $controllerViagem::Buscar($id);
?>
<form enctype="multipart/form-data" method="post" action="router.php?controller=viagem&modo=editar&id=<?php echo $id?>">
  <div class="txt_viagem">Data Saida</div>
  <input class="box_viagem" type="text" name="data_saida" value="<?php echo $dadosViagem->data_saida ?>">
  <div class="txt_viagem">Horario Saida</div>
  <input class="box_viagem" type="text" name="hora_saida" value="<?php echo $dadosViagem->hora_saida ?>">
  <div class="txt_viagem">Data Chegada</div>
  <input class="box_viagem" type="text" name="data_chegada" value="<?php echo $dadosViagem->data_chegada ?>">
  <div class="txt_viagem">Horario Chegada</div>
  <input class="box_viagem" type="text" name="hora_chegada" value="<?php echo $dadosViagem->hora_chegada ?>">
  <div class="txt_viagem">Descricao</div>
  <input class="box_viagem" type="text" name="descricao" value="<?php echo $dadosViagem->descricao ?>">
  <div class="txt_viagem">KM</div>
  <input class="box_viagem" type="text" name="km" value="<?php echo $dadosViagem->km ?>">
  <div class="txt_viagem">Pacote de Viagem</div>
  <select class="select_viagem" name="pacote_viagem">
    <?php
        require_once("../controllers/pacote_viagem_controller.php");
        require_once("../models/pacote_viagem_class.php");

        $controllerPacoteViagem = new controllerPacoteViagem;
        $list=$controllerPacoteViagem::Listar();
				// echo("<script>alert(".$list[$cont]->pacote_viagem.");</script>");
        $cont = 0;
				$selected = '';
        while($cont < count($list)){
					if($list[$cont]->id == $dadosViagem->pacote_viagem){
						$selected = 'selected';

					}

        ?>
        <option <?php echo $selected ?> value="<?php echo($list[$cont]->id)?>">

            <?php echo($list[$cont]->origem. ' X ' .$list[$cont]->destino)?></option>

        <?php
          $cont+=1;
					$selected = '';
            }
            ?>
  </select>
  <div class="txt_viagem">Preço</div>
  <input class="box_viagem" type="text" name="preco" value="<?php echo $dadosViagem->preco ?>">
  <input class="salvar_viagem" type="submit" name="btnsalvar" value="Salvar">
	</form>
	<?php
		}if($pagina=='tipo_parada'){

		require_once('../controllers/tipo_parada_controller.php');
		require_once('../models/tipo_parada_class.php');

		$controllerTipoParada = new controllerTipoParada();
		$dadosTipoParada = $controllerTipoParada::Buscar($id);
	?>
	<form class="frmEstadosPostos" action="router.php?controller=tipo_parada&modo=editar&id=<?php echo $id?>" method="post">

    <div class="text_postos">Tipo de Parada</div>
    <input class="box_postos" type="text" name="tipo_parada" value="<?php echo $dadosTipoParada->tipo_parada?>">
    <input class="salvar_postos" type="submit" name="btnsalvar" value="Alterar">

</form>
		<?php
	  }
		 ?>
</body>
</html>
