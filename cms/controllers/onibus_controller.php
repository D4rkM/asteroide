<?php
//session_start();

class controllerOnibus{
  public function Novo(){
    $onibus = new Onibus();

    $onibus->poltronas = $_POST['poltronas'];
    $onibus->km = $_POST['km'];
    $onibus->classe = $_POST['classe'];
    $onibus->placa = $_POST['placa'];
    $onibus->status = $_POST['status'];
    $onibus->codigo = $_POST['codigo'];

    $onibus::Insert($onibus);
  }


  public function Editar($id_onibus){
    $onibus = new Onibus();

    $onibus->id = $id_onibus;
    $onibus->poltronas = $_POST['poltronas'];
    $onibus->km = $_POST['km'];
    $onibus->classe = $_POST['classe'];
    $onibus->placa = $_POST['placa'];
    $onibus->status = $_POST['status'];
    $onibus->codigo = $_POST['codigo'];

    $onibus::Update($onibus);
  }


    public function Excluir(){
      $idOnibus = $_GET['id'];
      $onibus = new Onibus();

      $onibus->id = $idOnibus;

      $onibus::Delete($onibus);
    }

    public function Buscar($id){

      $onibus = new Onibus();

      $onibus->id = $id;

      return $dadosOnibus= $onibus::SelectById($onibus);

    }

    public function Listar(){

      $onibus = new Onibus();

      return $onibus::Select();

    }

}


 ?>
