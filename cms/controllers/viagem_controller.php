<?php
/*
    Autor:Bruna
    Data de Modificação:25/04/2018
    Controller:Pacotes de Viagem
    Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
*/
class controllerViagem{

  public function Novo(){
    $viagem = new Viagem();

    $viagem->data_saida = $_POST['data_saida'];
    $viagem->data_chegada = $_POST['data_chegada'];
    $viagem->hora_saida = $_POST['hora_saida'];
    $viagem->hora_chegada = $_POST['hora_chegada'];
    $viagem->descricao = $_POST['descricao'];
    $viagem->km = $_POST['km'];
    $viagem->pacote_viagem = $_POST['pacote_viagem'];
    $viagem->preco = $_POST['preco'];

    $viagem::Insert($viagem);
  }

  public function Editar($idViagem){

    $viagem = new Viagem();

    $viagem->id = $idViagem;
    $viagem->data_saida = $_POST['data_saida'];
    $viagem->data_chegada = $_POST['data_chegada'];
    $viagem->hora_saida = $_POST['hora_saida'];
    $viagem->hora_chegada = $_POST['hora_chegada'];
    $viagem->descricao = $_POST['descricao'];
    $viagem->km = $_POST['km'];
    $viagem->pacote_viagem = $_POST['pacote_viagem'];
    $viagem->preco = $_POST['preco'];


    $viagem::Update($viagem);
  }

    public function Excluir(){
      $idViagem = $_GET['id'];

      $viagem = new Viagem();

      $viagem->id = $idViagem;

      $viagem::Delete($viagem);
    }

    public function Buscar($id){

      $viagem = new Viagem();

      $viagem->id = $id;

      return $dadosViagem= $viagem::SelectById($viagem);
    }

    public function Listar(){

      $viagem = new Viagem();

      return $viagem::Select();
    }
}
 ?>
