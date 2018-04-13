<?php
	$id = $_POST['id'];
	$pagina = $_POST['pagina'];

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



		<?php
			if($pagina=='funcionario'){


		  require_once("../../controllers/funcionario_controller.php");
		  require_once("../../models/funcionario_class.php");


			$funcionario_controller = new controllerFuncionario();

			$dadosFuncionario = $funcionario_controller::Buscar($id);
		?>

		<div class="tltModal">
			Edição de Funcionario
		</div>
<div>
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
		        <input type="submit" name="btnCadastrarFunc" value="Atualizar">
		      </div>
		    </div>

		  </div>

		</form>

</div>
<?php
}elseif($pagina=='duvida'){
						?>

						<?php

							require_once("../../controllers/duvidas_controller.php");
							require_once("../../models/duvidas_class.php");

							$duvida_controller = new controllerDuvidas();

							$dadosDuvida = $duvida_controller::Buscar($id);
						?>

								<script type="text/javascript">
								function mascara(o,f){
														v_obj=o
														v_fun=f
														setTimeout("execmascara()",1)
												}
												function execmascara(){
														v_obj.value=v_fun(v_obj.value)
												}
												function mtel(v){
														v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
														v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
														v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
														return v;
												}
												function mcel(v){
														v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
														v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
														v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
														return v;
												}
												function mdat(v){
														v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
														v=v.replace(/^(\d{2})(\d)/g,"$1/$2"); //Coloca barra depois dos dois primeiros dígitos
														v=v.replace(/(\d)(\d{4})$/,"$1/$2");    //Coloca barra entre o quarto e o quinto dígitos
														return v;
												}
												function mcpf(v){
														v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
														v=v.replace(/^(\d{3})(\d)/g,"$1.$2"); //Coloca barra depois dos dois primeiros dígitos
														v=v.replace(/(\d)(\d{5})$/,"$1.$2");  //Coloca barra entre o quarto e o quinto dígitos
														v=v.replace(/(\d)(\d{2})$/,"$1-$2");
														return v;
												}
												function mrg(v){
														v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
														v=v.replace(/^(\d{2})(\d)/g,"$1.$2"); //Coloca barra depois dos dois primeiros dígitos
														v=v.replace(/(\d)(\d{4})$/,"$1.$2");  //Coloca barra entre o quarto e o quinto dígitos
														v=v.replace(/(\d)(\d{1})$/,"$1-$2");
														return v;
												}
												function mcep(v){
														v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
														v=v.replace(/^(\d{5})(\d)/g,"$1-$2"); //Coloca barra depois dos dois primeiros dígitos
														v=v.replace(/(\d)(\d{3})$/,"$1 $2");
														return v;
												}
												function id( el ){
														return document.getElementById( el );
												}
												window.onload = function(){
														id('telefone').onkeypress = function(){
																mascara( this, mtel );
														}

														id('celular').onkeypress = function(){
																mascara( this, mcel );
														}

														id('dataNascimento').onkeypress = function(){
																mascara( this, mdat );
														}

														id('cpf').onkeypress = function(){
																mascara( this, mcpf );
														}

														id('rg').onkeypress = function(){
																mascara( this, mrg );
														}
														id('cep').onkeypress = function(){
																mascara( this, mcep );
														}
												}

												//mascara para caracter
												function validar(caracter,blockType,campo){
												if(window.event){
																var letra=caracter.charCode;
														}else{
																var letra=caracter.which;
														}

														if (blockType=='number'){
																if(letra>=48 && letra<=57){
																				return false;
																		}
																}else if (blockType=='caracter'){

																	 if(letra<48 || letra >57){
																					 if(letra!=45 && letra!=32 && letra!=8){

																								document.getElementById(campo).style="background-color:red;border:10;border-color:blue;";

																							 return false;
																						}
																			 }else{
																							document.getElementById(campo).style="background-color:#ffffff;";

																					 }
																}

										}
								</script>
								<div class="tltModal">
									Edição de Duvidas Frequentes
								</div>

								<form class="frmCadDuvida" method="post" action="router.php?controller=sobreEmpresa&modo=editar&id=<?php echo $id; ?>">
									<div class="area-cad-duvida">
										<div class="area-form-duvida">
											<div class="pergunta">
												<div class="txt-pergunta">
													Duvida:
												</div>
												<div class="input-pergunta">
													<input type="text" name="txtDuvidaFreq" value="<?php echo $dadosDuvida->pergunta ?>">
												</div>
												<div class="area-chk-btn-duvida">
													<input type="checkbox" name="chkDuvidaFrequente" value="1"
													 <?php
													 if($dadosDuvida->aparecer=='1'){
														echo 'checked';
													}
													?>>Aparecer
												</div>
												<div class="area-chk-btn-duvida">
													<input type="submit" name="btnCadastrar" value="Atualizar">
												</div>
											</div>
											<div class="pergunta">
												<div class="txt-pergunta">
													Resposta:
												</div>
												<div class="input-pergunta">
													<textarea name="txtAreaRespotaDuvidaFreq" rows="8" cols="40"><?php echo $dadosDuvida->resposta ?></textarea>
												</div>
											</div>
										</div>
									</div>
								</form>

 <?php
 }elseif($pagina=='sobre_empresa'){

 							require_once("../../controllers/sobre_empresa_controller.php");
 							require_once("../../models/sobre_empresa_class.php");

 							$sobre_empresa_controller = new controllerSobreEmpresa();

 							$sobre_empresa_dados = $sobre_empresa_controller::Buscar($id);
 						?>

 								<div class="tltModal">
 									Edição de Sobre a Empresa
 								</div>

 								<form class="frmCadDuvida" method="post" action="router.php?controller=duvida&modo=editar&id=<?php echo $id; ?>">
									<div class="tabela_gerenciamento">
					          <div class="line_empresa">
					              <h3>Data de inserção</h3>
					              <input id="datainsercao" class="box_text2" type="text" name="txtdatainsercao" maxlength="10" value="<?php echo $sobre_empresa_dados->datainseri ?>">
					          </div>
					            <div class="line_empresa">
					                <h3>Titulo da pagina Sobre a Empresa</h3>
					                <input class="box_text" type="text" name="txttitulo" value="<?php echo $sobre_empresa_dados->titulo ?>">
					            </div>
					            <div class="line_empresa">
					                <h3>Imagens da pagina Sobre a Empresa</h3>
					                <label for="Foto">
					                  <img class="img_empresa" src="../img/camera.png" alt="imagem">
					                </label>
					                <div class="inpt_foto">
					                  <input id="Foto" type="file" name="imagem1" value="<?php echo $sobre_empresa_dados->imagem1 ?>">
					                </div>
					                <input class="box_text2 box_position" type="text" name="txtnomeimagem1" value="<?php echo $sobre_empresa_dados->nomeimagem1 ?>">

					                <label for="Foto">
					                  <img class="img_empresa" src="../img/camera.png" alt="imagem">
					                </label>
					                <div class="inpt_foto">
					                  <input id="Foto" type="file" name="imagem2" value="<?php echo $sobre_empresa_dados->imagem2 ?>">
					                </div>
					                  <input class="box_text2 " type="text" name="txtnomeimagem2" value="<?php echo $sobre_empresa_dados->nomeimagem2 ?>">
					            </div>
					            <div class="line_empresa_text">
					                 <h3>Textos da pagina sobre a empresa</h3>
					                <textarea name="txttexto1" rows="7" cols="35" value="<?php echo $sobre_empresa_dados->texto1 ?>"></textarea>
					                <textarea name="txttexto2" rows="7" cols="35" valeu="<?php echo $sobre_empresa_dados->texto2 ?>"></textarea>
					            </div>
					            <input class="btn_salvar" type="submit" name="btnCadastrar" value="Atualizar">
					        </div>
 								</form>

	<?php
}elseif($pagina=='frotas'){

  							require_once("../../controllers/frotas_controller.php");
  							require_once("../../models/frotas_class.php");

  							$frotas_controller = new controllerFrotas();

  							$frotas_dados = $frotas_controller::Buscar($id);
  						?>

  								<div class="tltModal">
  									Edição de Frotas de Onibus
  								</div>

  								<form class="frmCadDuvida" method="post" action="router.php?controller=frotas&modo=editar&id=<?php echo $id; ?>">
										<div class="area-cad-duvida">
									        <div class="tabela_gerenciamento">
									          <div >
									              <h3>Data de inserção</h3>
									              <input id="datainsercao" class="box_text2" type="text" name="txtdatainsercao" maxlength="10" value="<?php echo $frotas_dados->datainseri;?>">
									          </div>
									            <div >
									              <h3>Nome do Onibus</h3>
									              <input class="box_text2" type="text" name="txtnome" value="<?php echo $frotas_dados->nome;?>">
									            </div>
									            <div>
									              <h3>Imagem do Onibus</h3>
									              <input type="file" name="imagem" value="<?php echo $frotas_dados->imagem;?>">
									            </div>
									            <input class="btn_salvar" type="submit" name="btnatualizar" value="Atualizar">
									        </div>
									  </div>
  								</form>
  						<?php
  				}
   ?>
</body>
</html>
