<?php
    /*
        Autor:Bruna
        Data de Modificação:19/04/2018
        Controller:Estados dos postos rodoviario
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */
class controllerTipoParada{
  public function Novo(){
    $tipo_parada = new TipoParada();

    $tipo_parada->tipo_parada=$_POST['tipo_parada'];

    $tipo_parada::Insert($tipo_parada);
  }

  public function Editar($idAltera){
    $tipo_parada = new TipoParada();

    $tipo_parada->id = $idAltera;
    $tipo_parada->tipo_parada=$_POST['tipo_parada'];

    $tipo_parada::Update($tipo_parada);
  }

  public function Excluir(){
    $idParada = $_GET['id'];

    $tipo_parada = new TipoParada();

    $tipo_parada->id = $idParada;

    $tipo_parada::Delete($tipo_parada);
  }

  public function Buscar($id){
    $tipo_parada = new TipoParada();

    $tipo_parada->id = $id;

    return $dadosParada= $tipo_parada::SelectById($tipo_parada);
  }

  public function Listar(){
    $tipo_parada = new TipoParada();
    return $tipo_parada::Select();
  }
}
 ?>
