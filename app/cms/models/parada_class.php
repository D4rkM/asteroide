<?php

/*
  Autor:Bruna
  Data de Modificação:11/04/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class Parada{
  public $id;
  public $tipo_parada_id;
  public $endereco_id;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($parada_dados){

    $sql = "insert into parada set endereco_id='$parada_dados->endereco_id',
                                   tipo_parada_id='$parada_dados->tipo_parada_id';";
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

  public function Update($parada_dados){
    $sql = "update parada set endereco_id='$parada_dados->endereco_id',
                              tipo_parada_id='$parada_dados->tipo_parada_id'
                              where id=$parada_dados->id;";

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
    // echo ($sql);die;
    //Instancia a classe do banco
    $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql)){
      header('location:index.php');
    }else{
      header('location:index.php?mensagem=apague');
    }
    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();
  }
  public function Select(){
    $sql = "select p.*,tp.tipo_parada, e.logradouro from parada as p, tipo_parada as tp, endereco as e
where p.tipo_parada_id=tp.id and p.endereco_id=e.id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listParada[] = new Parada();

      $listParada[$cont]->id = $rs['id'];
      $listParada[$cont]->endereco_id = $rs['endereco_id'];
      $listParada[$cont]->tipo_parada_id = $rs['tipo_parada_id'];
      $listParada[$cont]->tipo_parada = $rs['tipo_parada'];
      $listParada[$cont]->rua = $rs['logradouro'];

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
      $listParada->endereco_id = $rs['endereco_id'];
      $listParada->tipo_parada_id = $rs['tipo_parada_id'];

      $conex->Desconectar();
    }

    if(isset($listParada))
        return $listParada;
  }

}
