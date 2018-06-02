<?php 

	class TransacaoController{


		public function cartaoDeCredito(){

			if(isset($_SESSION['_selected'])){
			// echo('eee2');

			$req = new Transacao();

			$preparedCpf = str_replace('-', '',$_POST['cpf']);
			$cpf = str_replace('.', '', $preparedCpf);
			// echo($cpf);

			$cep = str_replace('-', '',$_POST['cep']);
			// echo $cep;

			$preparedCel = str_replace('(', '', $_POST['telefone']);
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

			echo($req::viaCartaoDeCredito($req));

			}
			




		}




	}




 ?>