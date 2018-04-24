<?php


/*
  Autor:William e bruna
  Data de Modificação:20/04/2018
  Class:Cidade
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/

class Cidade{
  public $id;
  public $id_estado;
  public $nome;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Delete($cidade_dados){

  }

  public function Select(){

    $sql = "select * from cidade;";
echo($sql);
    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listCidade[] = new Cidade();

      $listCidade[$cont]->id = $rs['id'];
      $listCidade[$cont]->id_estado = $rs['id_estado'];
      $listCidade[$cont]->nome = $rs['nom_cidade'];


      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listCidade))
        return $listCidade;
  }
}
 ?>
