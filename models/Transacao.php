<?php

	class Transacao{

		/* Dados relacionados ao produto */
		public $id;
		public $amount; //Valor total da compra
		public $payment_method; // Forma de Pagamento do Produto
		public $title; //Nome do Item - No caso Número da Poltrona [Poderá ser um Array...]
		public $quantity;
		public $tangible;
		/*-------------------------------*/

		/* Dados Relacionados a compra utilizando o Cartão (Caso a compra seja por cartão)*/
		public $card_number;
		public $card_cvv;
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
		public $type;
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

		public function viaBoleto(){

		}

		public function viaCartaoDeCredito(){
			
		}





	}


?>