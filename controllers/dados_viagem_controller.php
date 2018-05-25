<?php
  // require_once('../models/dados_viagem_class.php');

  Class ControllerDadosViagem{

    public function dateEmMysql($dateSql){
        $ano= substr($dateSql, 6);
        $mes= substr($dateSql, 3,-5);
        $dia= substr($dateSql, 0,-8);
        return $ano."-".$mes."-".$dia;
    }

    public function buscar(){
      // @session_start();
      $origem = $_POST['txtorigem'];
      $destino = $_POST['txtdestino'];
      $data_saida = $_POST['txtida'];

      $novadata = new ControllerDadosViagem();
      // $data_saida = $novadata::dateEmMysql($data_converter);

      // $data_saida = dateEmMysql($data_converter);

      // echo('foi');
      if($origem){

        $dadosViagens = new DadosViagem();
        $dadosViagens->origem = $origem;
        $dadosViagens->destino = $destino;
        $dadosViagens->data_saida = $data_saida;
        $listaViagens = $dadosViagens::buscarViagens($dadosViagens);
        return $listaViagens;
        // header('location:views/horarios-onibus.php');
      }else{
        echo('<script>alert("insira os dados");</script>');
        // header('location:views/horarios-onibus.php');
      }

      // header('location:../views/pagina-pagamento.php');
    }


  }



 ?>
