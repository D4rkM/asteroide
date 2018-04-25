<?php
session_start();


    /*
        Autor:Bruna
        Data de Modificação:12/04/2018
        Controller:Estados dos postos rodoviario
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */
class controllerEstadosPostos{


  public function Novo(){
    $estados_postos = new EstadosPostos();

    $estados_postos->estado=$_POST['txtestado'];

    $estados_postos::Insert($estados_postos);
  }

  public function Editar($idAltera){
    $estados_postos = new EstadosPostos();

    $estados_postos->id = $idAltera;
    $estados_postos->estado=$_POST['txtestado'];

    $estados_postos::Update($estados_postos);
  }

  public function Excluir(){
    $idEstado = $_GET['id'];

    $estados_postos = new EstadosPostos();

    $estados_postos->id = $idEstado;

    $estados_postos::Delete($estados_postos);
  }

  public function Buscar($id){
    $estados_postos = new EstadosPostos();

    $estados_postos->id = $id;

    return $dadosEstado= $estados_postos::SelectById($estados_postos);
  }

  public function Listar(){
    $estados_postos = new EstadosPostos();
    return $estados_postos::Select();
  }
}
 ?>
