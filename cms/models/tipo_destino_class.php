<?php

/*
  Autor:Bruna
  Data de Modificação:11/04/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class TipoDestino{
  public $id;
  public $tipo;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($tipo_destino_dados){

    $sql = "insert into tipo_destino set tipo='$tipo_destino_dados->tipo';";
    echo ($sql);
    //Instancia a classe do banco
    $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql))
        header('location:index.php');
    else
        echo("Erro ao inserir no BD");

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();


  }

  public function Update($tipo_destino_dados){
    $sql = "update tipo_destino set tipo='$tipo_destino_dados->tipo' where id=$tipo_destino_dados->id;";


    //Instancia a classe do banco
    $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql))
        header('location:index.php');
    else
        echo("Erro ao inserir no BD");

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();
  }

  public function Delete($tipo_destino_dados){
    $sql = "delete from tipo_destino where id = $tipo_destino_dados->id";

    //Instancia a classe do banco
    $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql))
        header('location:index.php');
    else
        echo("Erro ao deletar no BD");

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();
  }
  public function Select(){
    $sql = "select * from tipo_destino order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listDestino[] = new TipoDestino();

      $listDestino[$cont]->id = $rs['id'];
      $listDestino[$cont]->tipo = $rs['tipo'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listDestino))
        return $listDestino;
  }

  public function SelectById($tipo_destino_dados){
    $sql = "select * from tipo_destino where id=$tipo_destino_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listDestino = new TipoDestino();

      $listDestino->id = $rs['id'];
      $listDestino->tipo = $rs['tipo'];

      $conex->Desconectar();
    }

    if(isset($listDestino))
        return $listDestino;
  }

}
