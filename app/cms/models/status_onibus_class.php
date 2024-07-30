<?php
/*
  Autor:Bruna
  Data de Modificação:23/04/2018
  Class:Classe Onibus
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class StatusOnibus{
  public $id;
  public $status;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Select(){
    $sql = "select * from status_onibus order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listClasse[] = new ClasseOnibus();

      $listClasse[$cont]->id = $rs['id'];
      $listClasse[$cont]->status = $rs['status'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listClasse))
        return $listClasse;
  }
}
