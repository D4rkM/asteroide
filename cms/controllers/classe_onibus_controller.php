<?php
/*
    Autor:Bruna
    Data de Modificação:04/20/2018
    Controller:Classe
    Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
*/
class controllerClasseOnibus{
  public function Novo(){
    $classe_onibus = new ClasseOnibus();

    $classe_onibus->classe=$_POST['txtclasse'];

    $classe_onibus::Insert($classe_onibus);
  }

  public function Editar($idAltera){
    $classe_onibus = new ClasseOnibus();

    $classe_onibus->id = $idAltera;
    $classe_onibus->classe=$_POST['txtclasse'];

    $classe_onibus::Update($classe_onibus);
  }

  public function Excluir(){
    $idClasse = $_GET['id'];

    $classe_onibus = new ClasseOnibus();

    $classe_onibus->id = $idClasse;

    $classe_onibus::Delete($classe_onibus);
  }

  public function Buscar($id){
    $classe_onibus = new ClasseOnibus();

    $classe_onibus->id = $id;

    return $dadosClasse= $classe_onibus::SelectById($classe_onibus);
  }

  public function Listar(){
    $classe_onibus = new ClasseOnibus();
    return $classe_onibus::Select();
  }
}
 ?>
