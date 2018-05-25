<?php
  // require_once('../models/dados_viagem_class.php');

  Class ControllerDadosViagem{

    public function buscar(){

      $origem = $_POST['txtorigem'];
      $destino = $_POST['txtdestino'];
      // echo('foi');
      // if($origem){

        $dadosViagens = new DadosViagem();

        $dadosViagens->origem = $origem;
        $dadosViagens->destino = $destino;

        $listaViagens = $dadosViagens::buscarViagens($dadosViagens);
        return $listaViagens;
        // header('location:views/horarios-onibus.php');
      // }else{
        // echo('<script>alert("insira os dados");</script>');
        // header('location:views/horarios-onibus.php');

      // }

      // header('location:../views/pagina-pagamento.php');
    }


  }



 ?>
