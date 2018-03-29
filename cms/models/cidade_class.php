<?php


/*
  Autor:William
  Data de Modificação:22/03/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/

class Cidade{
  public $id;
  public $id_estado;
  public $nom_cidade;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($funcionario_dados){



  }

  public function Update($funcionario_dados){


  }

  public function Delete($funcionario_dados){

  }

  public function Select(){

    $sql = "select * from estado";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listEstado[] = new Estado();

      $listEstado[$cont]->id = $rs['id'];
      $listEstado[$cont]->nom_estado = $rs['nom_estado'];


      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listEstado))
        return $listEstado;

  }

  public function SelectById($funcionario_dados){


  }




}


 ?>
