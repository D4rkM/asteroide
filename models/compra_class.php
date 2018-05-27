<?php

  class Compra{

    public $id;
    public $qrcode;
    public $validacao_qrcode;
    public $id_usuario;
    public $posto_rodoviario_id;
    public $preco_passagem;
    public $local_compra_id;

    public function __construct(){
      require_once('db_class.php');
    }

    public static function registrarCompra(){

    }


  }



 ?>
