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

      if(isset($_POST['txtorigem'])){
        // echo($_POST['txtorigem']);
        $origem = $_POST['txtorigem'];
        $destino = $_POST['txtdestino'];
        $data_saida = $_POST['txtida'];

        $novadata = new ControllerDadosViagem();
        // $data_saida = $novadata::dateEmMysql($data_converter);

        // $data_saida = dateEmMysql($data_converter);

        // echo('foi');
        $dadosViagens = new DadosViagem();
        $dadosViagens->origem = $origem;
        $dadosViagens->destino = $destino;
        $dadosViagens->data_saida = $data_saida;
        $listaViagens = $dadosViagens::buscarViagens($dadosViagens);
        return $listaViagens;

      }else{
        // header('location:../index.php');
        echo('<script>alert("dados inválidos")</script>');
      }

    }

    public function BuscarPorId($id){

        $dadosViagens = new DadosViagem();
        $listaViagens = $dadosViagens::buscarPorId($id);
        return $listaViagens;

    }

  }

 ?>
