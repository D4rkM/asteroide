<?php
/*
    Autor:Bruna
    Data de Modificação:25/04/2018
    Controller:Pacotes de Viagem
    Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
*/
class controllerPacoteViagem{

  public function Novo(){
    $pacote_viagem = new PacoteViagem();

    $pacote_viagem->origem = $_POST['origem'];
    $pacote_viagem->destino = $_POST['destino'];
    $pacote_viagem->descricao = $_POST['descricao'];

    $pacote_viagem::Insert($pacote_viagem);
  }

  public function Editar($idPacoteViagem){

    $pacote_viagem = new PacoteViagem();

    $pacote_viagem->id =$idPacoteViagem;
    $pacote_viagem->origem = $_POST['origem'];
    $pacote_viagem->destino = $_POST['destino'];
    $pacote_viagem->descricao = $_POST['descricao'];

    $pacote_viagem::Update($pacote_viagem);
  }


    public function Excluir(){
      $idPacoteViagem = $_GET['id'];

      $pacote_viagem = new PacoteViagem();

      $pacote_viagem->id = $idPacoteViagem;

      $pacote_viagem::Delete($pacote_viagem);
    }

    public function Buscar($id){

      $pacote_viagem = new PacoteViagem();

      $pacote_viagem->id = $id;

      return $dadosPacoteViagem= $pacote_viagem::SelectById($pacote_viagem);

    }

    public function Listar(){

      $pacote_viagem = new PacoteViagem();

      return $pacote_viagem::Select();
      // var_dump($pacote_viagem);die;
    }

}


 ?>
