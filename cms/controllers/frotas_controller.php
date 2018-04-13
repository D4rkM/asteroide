<?php
/**
 *
 */
class controllerFrotas{

  public function dateEmMysql($dateSql){
      $ano= substr($dateSql, 6);
      $mes= substr($dateSql, 3,-5);
      $dia= substr($dateSql, 0,-8);
      return $ano."-".$mes."-".$dia;
    }

  public function Novo(){
    $frotas = new Frotas();

    $data = implode("-",array_reverse(explode("/",$_POST['txtdatainsercao'])));
    $frotas->datainseri = $data;
    $frotas->imagem = $_POST['imagem'];
    $frotas->nome = $_POST['txtnome'];

    $frotas::Insert($frotas);
  }

  public function Editar($idAlterar){
    $frotas = new Frotas();

    $frotas->id = $idAlterar;
    $frotas->datainseri = $_POST['txtdatainsercao'];
    $frotas->imagem = $_POST['imagem'];
    $frotas->nome = $_POST['txtnome'];

    $frotas::Update($frotas);
  }

  public function Excluir(){
    $idFrotas = $_GET['id'];
    $frotas = new Frotas();

    $frotas->id = $idFrotas;

    $frotas::Delete($frotas);
  }

  public function Buscar($id){
    $frotas = new Frotas();
    $frotas ->id = $id;

    return $dadosFrotas= $frotas::SelectById($frotas);
  }

  public function Listar(){

    $frotas = new Frotas();

    return $frotas::Select();
  }
}


 ?>
