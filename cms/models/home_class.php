<?php

/*
  Autor:Bruna
  Data de Modificação:15/04/2018
  Class:Home
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class Home{
  public $id;
  public $destino;
  public $imagem;
  public $tipo;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($home_dados){

    $sql = "insert into pghome set destino='$home_dados->destino',
                                   imagem='$home_dados->imagem',
                                   idTipo='$home_dados->tipo';";
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

  public function Update($home_dados){
    if ($home_dados->imagem == "nada"){

    $sql = "update pghome set destino='$home_dados->destino',
                              idTipo=$home_dados->tipo where id=$home_dados->id;";
    }else{
      $sql = "update pghome set destino='$home_dados->destino',
                                imagem='$home_dados->imagem',
                                idTipo=$home_dados->tipo where id=$home_dados->id;";
    }

    //Instancia a classe do banco
    $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql))
        header('location:index.php');
    else
        echo("Erro ao atualizar no BD");

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();
  }

  public function Delete($home_dados){
    $sql = "delete from pghome where id = $home_dados->id";

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

    $sql = "select * from pghome order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listHome[] = new Home();

      $listHome[$cont]->id = $rs['id'];
      $listHome[$cont]->destino = $rs['destino'];
      $listHome[$cont]->imagem = $rs['imagem'];
      $listHome[$cont]->tipo = $rs['idTipo'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listHome))
        return $listHome;

  }

  public function SelectById($home_dados){

    $sql = "select * from pghome where id = $home_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $home = new Home();

      $home->id = $rs['id'];
      $home->destino = $rs['destino'];
      $home->imagem = $rs['imagem'];
      $home->tipo = $rs['idTipo'];

      $conex->Desconectar();


    }
    if(isset($home))
      return $home;
  }
}

 ?>
