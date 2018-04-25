<?php
/*
  Autor:Bruna
  Data de Modificação:23/04/2018
  Class:Classe Onibus
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class ClasseOnibus{
  public $id;
  public $classe;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($classe_onibus_dados){

    $sql = "insert into classe set classe='$classe_onibus_dados->classe';";
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

echo ($sql);
  }

  public function Update($classe_onibus_dados){
    $sql = "update classe set classe='$classe_onibus_dados->classe' where id=$classe_onibus_dados->id;";
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

  public function Delete($classe_onibus_dados){
    $sql = "delete from classe where id = $classe_onibus_dados->id";

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
    $sql = "select * from classe order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listClasse[] = new ClasseOnibus();

      $listClasse[$cont]->id = $rs['id'];
      $listClasse[$cont]->classe = $rs['classe'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listClasse))
        return $listClasse;
  }

  public function SelectById($classe_onibus_dados){
    $sql = "select * from classe where id=$classe_onibus_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listClasse = new ClasseOnibus();

      $listClasse->id = $rs['id'];
      $listClasse->classe = $rs['classe'];

      $conex->Desconectar();
    }

    if(isset($listClasse))
        return $listClasse;
  }

}
