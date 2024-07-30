<?php 

		$poltronas = $_POST['_selected']);
		// echo('eee2');

			$req = new Transacao();

			$cpf = str_replace('-', '',$_POST['cpf']);
			// $cpf = str_replace('.', '', $preparedCpf);
			// echo($cpf);

			$cep = ($_POST['cep']);
			// echo $cep;

			$preparedCel = $_POST['celular'];
			$preparedCel = str_replace(')', '', $preparedCel);
			$cell = str_replace('-', '', $preparedCel);
			// echo($_POST['year']);
			// echo("\n e");
			$req->amount = $_POST['total'] * 100;
			$req->card_number= $_POST['cartao'];
			$req->card_brand= $_POST['rdband'];
			$req->card_cvv= $_POST['codigo'];
			$req->card_expiration_month= $_POST['month'];
			$req->card_expiration_year= $_POST['year'];
			$req->card_holder_name= $_POST['nome'];
			$req->installments= $_POST['installments'];
			$req->external_id= $_SESSION['id_usuario'];
			$req->name= $_POST['nome'];
			$req->cpf= "31200206053";
			$req->phone_numbers= '+55'.$cell;
			$req->email= $_POST['email'];
			$req->street= $_POST['logradouro'];
			$req->street_number= $_POST['numero'];
			$req->state= $_POST['uf'];
			$req->city= $_POST['cidade'];
			$req->neighborhood= $_POST['bairro'];
			$req->zipcode= $cep;
			$req->unit_price= $_POST['preco']*100;
			$req->title='Poltrona';
			$req->quantity = sizeof($_SESSION['_selected']);
			$req->id=$_SESSION['_idViagem'];
			// echo($req->id);

			$res = $req::viaCartaoDeCredito($req);
			if($res == 1 || $res == true){
				// registrarCompra($compra,$_SESSION['_selected'], $_SESSION['id_usuario'])

				require_once('models/compra_class.php');
				// require_once('controllers/compra_controller.php');
				require_once('models/registro_passagem_class.php');
				// require_once('controllers/registro_passagem_controller.php');

				$compra = new Compra();
				$registro_passagem = new RegistroPassagem();


				$compra->id_usuario = $_SESSION['id_usuario'];
				$compra->preco_passagem = $_POST['preco'];
				$compra->local_compra_id = 7;

				$polt = $_SESSION['_selected'];
				$viagem = $_SESSION['_idViagem'];

				$a=0;
				while($a < sizeof($polt)){
					// echo($a);
					$compra->qrcode = $activation = sha1(uniqid(rand(), true));
					$registro_passagem::registrarPoltrona($compra::registrarCompra($compra), $polt[$a], $viagem);
					$a++;
				}

			}
		
?>


 <script>
 	
 	$(document).ready(function()){
 		$.ajax({
	      url:'router.php?controller=registro_passagem&modo=compra',
	      type: 'POST',
	   	  data: {total: <?php echo($_POST['total']); ?>,
	   	  		cartao: <?php echo($_POST['cartao']); ?>,
	   	  		rdband: <?php echo($_POST['rdband']); ?>,
	   	  		codigo: <?php echo($_POST['codigo']); ?>,
	   	  		month: <?php echo($_POST['month']); ?>,
	   	  		year: <?php echo($_POST['year']); ?>,
	   	  		nome: <?php echo($_POST['nome']); ?>,
	   	  		id_usuario: <?php echo($_POST['id_usuario']); ?>,
	   	  		// total: <?php echo($_POST['nome']); ?>,
	   	  		installments: <?php echo($_POST['installments']); ?>,
	   	  		total: <?php echo($_POST['installments']); ?>,

	   	  }, 
	      processData: false,
	      contentType: false,
	      async: false,
	      // dataType:'json',
	      success: function(res){
	        // $(".pague").html('<h2>Foi</h2>');

	        // console.log(res);
	        var resp = JSON.parse(res.substring(res.indexOf('{"object":"transa')-1));
	        // console.log(res.substring(res.indexOf('KEY-----\n"}'+1333)));
	        // console.log(res.substring(res.indexOf(') "')+13));
	        console.log(resp.id);
	        // console.log(res);
	      },
	      error: function(a,err,b){
	        console.log(err);
	      }
    	});


 	}





 </script>