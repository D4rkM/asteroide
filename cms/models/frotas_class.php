<?php

/*
  Autor:Bruna
  Data de Modificação:10/04/2018
  Class:Frota de Onibus
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class Frotas{
  public $id;
  public $datainseri;
  public $imagem;
  public $nome;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($frotas_dados){

    $sql = "insert into pgfrota_onibus set datainseri='$frotas_dados->datainseri',
                                        imagem='$frotas_dados->imagem',
                                        nome='$frotas_dados->nome';";
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

  public function Update($frotas_dados){
    $sql = "update pgfrota_onibus set datainseri='$frotas_dados->datainseri',
                                        imagem='$frotas_dados->imagem',
                                        nome='$frotas_dados->nome'
                                        where id=$frotas_dados->id;";

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

  public function Delete($frotas_dados){
    $sql = "delete from pgfrota_onibus where id = $frotas_dados->id";

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
    $sql = "select * from pgfrota_onibus order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listFrotas[] = new Frotas();

      $listFrotas[$cont]->id = $rs['id'];
      $listFrotas[$cont]->datainseri = $rs['datainseri'];
      $listFrotas[$cont]->imagem = $rs['imagem'];
      $listFrotas[$cont]->nome = $rs['nome'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listFrotas))
        return $listFrotas;
  }

  public function SelectById($frotas_dados){
    $sql = "select * from pgfrota_onibus where id = $frotas_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $frotas = new Frotas();

      $frotas->id = $rs['id'];
      $frotas->datainseri = $rs['datainseri'];
      $frotas->imagem = $rs['imagem'];
      $frotas->nome = $rs['nome'];

      $conex->Desconectar();

    }
    if(isset($frotas))
      return $frotas;
  }
}
?>
