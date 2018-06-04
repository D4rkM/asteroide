<?php

	require 'api_pagarme/pagarme/pagarme-php/Pagarme.php';

  PagarMe::setApiKey('ak_test_8WyR0RFHABj4zuSDjFJfy6QpYk6Z0M'); //Seta a Key da api

	class Transacao{

		/* Dados relacionados ao produto */
		public $id;
		public $amount; //Valor total da compra
		public $payment_method; // Forma de Pagamento do Produto
		public $title; //Nome do Item - No caso Número da Poltrona [Poderá ser um Array...]
		public $quantity;
		public $tangible;
		public $type;
		/*-------------------------------*/

		/* Dados Relacionados a compra utilizando o Cartão (Caso a compra seja por cartão)*/
		public $card_number;
		public $card_cvv;
		public $card_brand;
		public $card_expiration_month;
		public $card_expiration_year;
		public $card_holder_name;
		public $installments;
		/*-----------------------------*/

		/* Dados Relacionados a compra utilizando Boleto*/
		public $postback_url;
		/*-----------------------------*/

		/* Dados Relacionados ao Cliente (Usado no array Customer)*/
		public $external_id;
		public $name;
		// public $type;
		public $country;
		public $cpf;
		public $phone_numbers;
		public $email;
		/*-----------------------------*/
		/* Dados Relacionados ao Endereco do Cliente (Usado no Billing)*/
		public $street;
		public $street_number;
		public $state;
		public $city;
		public $neighborhood;
		public $zipcode;
		/*-----------------------------*/


		public function efetuarTransacao($req){
		    try{
		    	// var_dump($req);
	    		$transaction = new PagarMe_Transaction($req);
					$res = $transaction->charge();
  				// echo('Compra efetuada com sucesso');
  				return $res;

		    }catch(Exception $err){
		    	echo("Não foi possível realizar a transacao: \n Erro: ".$err);
		    	return false;
		    }
		}

		public function viaBoleto($compraEmBoleto){
			// var_dump($compraEmBoleto);
			try{

				$req = array(
		      "amount" => $compraEmBoleto->amount, //10000
		      "payment_method" => "boleto", //"credit_card"
			    'postback_url' => "http://requestb.in/pkt7pgpk",
		      "customer" => array(
		          "name" => $compraEmBoleto->name, //"John Doe"
		          "type" => "individual", //"Individual"
		          "country" => "br", // "br"
		          "documents" => array(
		            array(
		              "type" => "cpf", //"cpf"
		              "number" => $compraEmBoleto->cpf //"00000000000"
		            )
		          ),
		          "phone_numbers" => array( $compraEmBoleto->phone_numbers ), // "+5511999999999"
		          "email" => $compraEmBoleto->email // "aardvark.silva@pagar.me"
		      )
		    );

				// var_dump($req);
			$enviar = new Transacao();

			$enviar::efetuarTransacao($req);

				return true;
			}catch(Exception $e){
				echo($e);
				return false;
			}

		}

		public function viaCartaoDeCredito($compraEmCartao){
			try{

				$req = array(
		      "amount" => $compraEmCartao->amount, //10000
		      "card_number" => "4111111111111111", //"4111111111111111"
		      "card_cvv" => $compraEmCartao->card_cvv, //123
		      "card_brand" => $compraEmCartao->card_brand,
		      "card_expiration_month" => "09",
		      "card_expiration_year" => "22",
		      "card_holder_name" => $compraEmCartao->card_holder_name, //"John Doe"
		      "payment_method" => "credit_card", //"credit_card"
		      "installments" => $compraEmCartao->installments, // 1
		      "customer" => array(
		          "external_id" => $compraEmCartao->external_id, // "1"
		          "name" => $compraEmCartao->name, //"John Doe"
		          "type" => "individual", //"Individual"
		          "country" => "br", // "br"
		          "documents" => array(
		            array(
		              "type" => "cpf", //"cpf"
		              "number" => $compraEmCartao->cpf //"00000000000"
		            )
		          ),
		          "phone_numbers" => array( $compraEmCartao->phone_numbers ), // "+5511999999999"
		          "email" => $compraEmCartao->email // "aardvark.silva@pagar.me"
		      ),
		      "billing" => array(
		        "name" => $compraEmCartao->name, // "John Doe"
		        "address" => array(
		            "country" => "br", //"br"
		            "street" => $compraEmCartao->street, // "Av. Brigadeiro Faria lima"
		            "street_number" => $compraEmCartao->street_number, //"1811"
		            "state" => $compraEmCartao->state, // "sp"
		            "city" => $compraEmCartao->city, //"São Paulo"
		            "neighborhood" => $compraEmCartao->neighborhood, // "Jardim Paulistano"
		            "zipcode" => $compraEmCartao->zipcode //"01451001"
		        )
		      ),
		      "items" => array(
		        array(
		          "id" => $compraEmCartao->id, //"ID do ITEM"
		          "title" => $compraEmCartao->title, // "NOme do ITem"
		          "unit_price" => $compraEmCartao->unit_price, //"PRecoUnitario"
		          "quantity" => $compraEmCartao->quantity, //"Quantidade"
		          "tangible" => false //"false" -- Não é um bem fisico como um sapato ou camiseta,
		          //mas sim uma poltrona que será utilizada até o fim de sua viagem
		        )
		      )
		    );

				// var_dump($req);
			$enviar = new Transacao();

			$enviar::efetuarTransacao($req);

				return true;
			}catch(Exception $e){
				echo($e);
				return false;
			}


		}

		public function buscarTodas(){
			try{

			// echo($transaction['status']);
			 $transaction = PagarMe_Transaction::all();
				// $transaction = PagarMe_Transaction::findById("3633816");

				// $res = $transaction->refund();
				// var_dump($res['status']);

			} catch (Exception $ex) {

					echo $ex->getMessage();

			}
		}

		public function buscarTransacaoPorId($id_transacao){
				try{

				$transaction = PagarMe_Transaction::findById($id_transacao);

				$res = $transaction->refund();
				var_dump($res);

			} catch (Exception $ex) {

					echo $ex->getMessage();

			}
		}

		public function cancelarCompra($id_transacao){
			try{

			// echo($transaction['status']);
			 // $transaction = PagarMe_Transaction::all();
				$transaction = PagarMe_Transaction::findById($id_transacao);

				$res = $transaction->refund();
				// var_dump($res['status']);
				return true;

			} catch (Exception $ex) {

					echo $ex->getMessage();
					return false;

			}
		}
}




?>
