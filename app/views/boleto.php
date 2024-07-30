<?php
session_start();
$poltrona_selecionada = array();

// var_dump($_SESSION['_idViagem']);

	if(isset($_SESSION['id_usuario'])){
		// echo("id = OK");
		if(isset($_SESSION["_selected"])){

				$cont = 0;
				foreach($_SESSION['_selected'] as $poltronas){
					$poltrona_selecionada[$cont] = $poltronas;
					// echo($poltrona_selecionada[$cont]."\n");
					$cont ++;
				}


				// echo($DadosViagem->origem." / ".$DadosViagem->destino);

		}else{
			echo("poltronas = Error");
			// header('location:index.php');
		}
	}else{
		echo("id = Error");
			// header('location:../index.php');
	}





require_once('../models/dados_viagem_class.php');
require_once('../controllers/dados_viagem_controller.php');

$DadosViagem = new DadosViagem();
$viagemController = new ControllerDadosViagem();
$DadosViagem = $viagemController::BuscarPorId($_SESSION['_idViagem']);

// echo sizeof($poltrona_selecionada);

require_once('../models/usuario_class.php');
require_once('../controllers/usuario_controller.php');

$Usuario = new Usuario();
$usuarioController = new controllerUsuario();
$Usuario = $usuarioController::
		Buscar($_SESSION['id_usuario']);
		// echo($Usuario->uf);


function mostraPoltronasSelecionadas($selecionadas){
	for($cont = 0;$cont < sizeof($selecionadas); $cont++){
		if($cont+1 == sizeof($selecionadas)){
			echo($selecionadas[$cont].'.');
		}else{
			echo($selecionadas[$cont].',');
		}
	}
}


?>
<script>
	$(document).on('click', '#_geraBoleto', function(e){
		e.preventDefault();

		// function finalizarCompra(){
		 $.ajax({
				url:'router.php?controller=registro_passagem&modo=compra',
				type: 'POST',
				data: new FormData($('#_finalizarBoleto')[0]),
				processData: false,
				contentType: false,
				async:false,
				success: function($res){
					console.log($res);
					$("#baixarBoleto").css('display', 'flex');
				}
			});
		// }

		//
		// function gerarBoleto(){
		//
		// }
		// $.ajax({
		// 	url:'boletophp-master/boleto_bradesco.php',
		// 	type: 'POST',
		// 	data: new FormData($('#_finalizar')[0]),
		// 	processData: false,
		// 	contentType: false,
		// 	success:function(){
		// 	},
		// 	error:function(){
		//
		// 	}
		// });
	});
</script>
<div class="">
	<form id="_finalizarBoleto" method="post">
		<div class="info">
			<h2 class="subtitulo center">Finalizar Compra</h2>
			<h4>Verifique se seus dados de compra estão corretos</h4>
	    <div class="line_vertical"></div>
	    <div class="registro_pague">
	      <div class="text_pague">
	         Dados do Titular
	       </div>
	      <div class="box_pague">
	         <input type="text" name="nome" value="<?php echo $_SESSION['nome_usuario'];  ?>" >
	       </div>
	      <div id="cpf" class="box_pague">
	         <input type="text" name="cpf" value="<?php echo $Usuario->cpf; ?>" >
	      </div>
	           <div id="celular" class="box_pague">
	         <input type="text" name="celular" value="<?php echo $Usuario->celular; ?>" >
	      </div>
	       <input type="hidden" name="email" value="<?php echo $Usuario->email; ?>" >
	      <h2 class="subtitulo center">Endereco</h2>
	      <div id="cep" class="box_pague">
	         <input type="text" name="cep" value="<?php echo $Usuario->cep; ?>" >
	      </div>
	      <div id="logradouro" class="box_pague">
	         <input type="text" name="logradouro" value="<?php echo $Usuario->logradouro; ?>" >
	       </div>
	       <div id="bairro" class="box_pague">
	         <input type="text" name="bairro" value="<?php echo $Usuario->bairro; ?>" >
	       </div>
	       <div id="cidade" class="box_pague">
	         <input type="text" name="cidade" value="<?php echo $Usuario->cidade; ?>" >
	         <input type="hidden" name="uf" value="<?php echo $Usuario->uf; ?>">
	         <input type="hidden" name="numero" value="<?php echo $Usuario->numero; ?>">
	       </div>
	    </div>
	    <div class="line_vertical"></div>
			<div class="preco">
				 Total: R$
				<label><?php echo($DadosViagem->preco * sizeof($poltrona_selecionada)); ?></label>
				<input type="hidden" value="<?php echo($DadosViagem->preco * sizeof($poltrona_selecionada)); ?>" name="total">
				<input type="hidden" name="preco" value="<?php echo($DadosViagem->preco); ?>">
				<input type="text" name="tipo" value="boleto">
			</div>
	    <div class="cont_pague">
	      <div class="finalizar">

	   </div>
	    </div>
	    <div class="cont_pague">
				<div class="registro_pague">
					<button id="_geraBoleto" type="submit" name="finalizar">Finalizar Compra</button>
					<a id="baixarBoleto" href="boletophp-master/boleto_bradesco.php" class="btn" target="_blank" style="display:none;">Baixe seu boleto</a>
				</div>
	      <div class="text_pague">
	         <?php //echo($total); ?>

	      </div>
	    </div>

		</div>
	</form>
</div>
