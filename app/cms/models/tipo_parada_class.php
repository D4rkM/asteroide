<?php
/*
  Autor:Bruna
  Data de Modificação:11/04/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD
*/
class TipoParada{
  public $id;
  public $tipo_parada;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($tipo_parada_dados){

    $sql = "insert into tipo_parada set tipo_parada='$tipo_parada_dados->tipo_parada';";
    // echo ($sql);die;
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

  public function Update($tipo_parada_dados){
    $sql = "update tipo_parada set tipo_parada='$tipo_parada_dados->tipo_parada' where id=$tipo_parada_dados->id;";
    // echo ($sql);die;
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

  public function Delete($tipo_parada_dados){
    $sql = "delete from tipo_parada where id = $tipo_parada_dados->id";
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
    $sql = "SELECT * FROM tipo_parada ORDER BY id DESC";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listParada[] = new TipoParada();

      $listParada[$cont]->id = $rs['id'];
      $listParada[$cont]->tipo_parada = $rs['tipo_parada'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listParada))
        return $listParada;
  }

  public function SelectById($tipo_parada_dados){
    $sql = "select * from tipo_parada where id=$tipo_parada_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listParada = new TipoParada();

      $listParada->id = $rs['id'];
      $listParada->tipo_parada = $rs['tipo_parada'];

      $conex->Desconectar();
    }

    if(isset($listParada))
        return $listParada;
  }

}
