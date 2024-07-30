<?php
    /*
        Autor:Bruna
        Data de Modificação:19/04/2018
        Controller:Estados dos postos rodoviario
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */
class controllerParada{
  public function Novo(){
    $parada = new Parada();

    $parada->tipo_parada_id=$_POST['tipo_parada_id'];
    $parada->endereco_id=$_POST['endereco_id'];

    $parada::Insert($parada);
  }

  public function Editar($idAltera){
    $parada = new Parada();

    $parada->id = $idAltera;
    $parada->tipo_parada_id=$_POST['tipo_parada_id'];
    $parada->endereco_id=$_POST['endereco_id'];

    $parada::Update($parada);
  }

  public function Excluir(){
    $idParada = $_GET['id'];

    $parada = new Parada();

    $parada->id = $idParada;

    $parada::Delete($parada);
  }

  public function Buscar($id){
    $parada = new Parada();

    $parada->id = $id;

    return $dadosParada= $parada::SelectById($parada);
  }

  public function Listar(){
    $parada = new Parada();
    return $parada::Select();
  }
}
 ?>
