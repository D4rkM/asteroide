<?php

/*
  Autor:Bruna
  Data de Modificação:11/04/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class EstadosPostos{
  public $id;
  public $estado;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($estados_postos_dados){

    $sql = "insert into pgestados_postos set estado='$estados_postos_dados->estado';";


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

  public function Update($estados_postos_dados){
    $sql = "update pgestados_postos set estado='$estados_postos_dados->estado' where id=$estados_postos_dados->id;";


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

  public function Delete($estados_postos_dados){
    $sql = "delete from pgestados_postos where id = $estados_postos_dados->id";
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
    $sql = "select * from pgestados_postos order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listEstados[] = new EstadosPostos();

      $listEstados[$cont]->id = $rs['id'];
      $listEstados[$cont]->estado = $rs['estado'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listEstados))
        return $listEstados;
  }

  public function SelectById($estados_postos_dados){
    $sql = "select * from pgestados_postos where id=$estados_postos_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listEstados = new EstadosPostos();

      $listEstados->id = $rs['id'];
      $listEstados->estado = $rs['estado'];

      $conex->Desconectar();
    }

    if(isset($listEstados))
        return $listEstados;
  }

}
