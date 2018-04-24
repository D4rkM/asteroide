<?php


    /*
        Autor:Bruna
        Data de Modificação:12/04/2018
        Controller:Estados dos postos rodoviario
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */
class controllerTipoDestino{


  public function Novo(){
    $tipo_destino = new TipoDestino();

    $tipo_destino->tipo=$_POST['txttipo'];

    $tipo_destino::Insert($tipo_destino);
  }

  public function Editar($idAltera){
    $tipo_destino = new TipoDestino();

    $tipo_destino->id = $idAltera;
    $tipo_destino->tipo=$_POST['txttipo'];

    $tipo_destino::Update($tipo_destino);
  }

  public function Excluir(){
    $idDestino = $_GET['id'];

    $tipo_destino = new TipoDestino();

    $tipo_destino->id = $idDestino;

    $tipo_destino::Delete($tipo_destino);
  }

  public function Buscar($id){
    $tipo_destino = new TipoDestino();

    $tipo_destino->id = $id;

    return $dadosDestino= $tipo_destino::SelectById($tipo_destino);
  }

  public function Listar(){
    $tipo_destino = new TipoDestino();
    return $tipo_destino::Select();
  }
}
 ?>
