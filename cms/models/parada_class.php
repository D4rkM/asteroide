<?php

/*
  Autor:Bruna
  Data de Modificação:11/04/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class Parada{
  public $id;
  public $nome;
  public $id_endereco;
  public $tipo_parada_id;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($parada_dados){

    $sql = "insert into parada set nome='$parada_dados->nome';";
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

  public function Update($parada_dados){
    $sql = "update parada set nome='$parada_dados->nome' where id=$parada_dados->id;";

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

  public function Delete($parada_dados){
    $sql = "delete from parada where id = $parada_dados->id";
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
    $sql = "SELECT * FROM parada ORDER BY id DESC";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listParada[] = new Parada();

      $listParada[$cont]->id = $rs['id'];
      $listParada[$cont]->nome = $rs['nome'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listParada))
        return $listParada;
  }

  public function SelectById($parada_dados){
    $sql = "select * from parada where id=$parada_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listParada = new Parada();

      $listParada->id = $rs['id'];
      $listParada->nome = $rs['nome'];

      $conex->Desconectar();
    }

    if(isset($listParada))
        return $listParada;
  }

}
