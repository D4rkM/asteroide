<?php

/*
  Autor:Bruna
  Data de Modificação:15/04/2018
  Class:Home
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class Home{
  public $id;
  public $id_viagem;
  public $imagem;
  public $tipo;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($home_dados){

    $sql = "insert into pghome set id_viagem='$home_dados->id_viagem',
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

    $sql = "update pghome set id_viagem='$home_dados->id_viagem',
                              idTipo=$home_dados->tipo where id=$home_dados->id;";
    }else{
      $sql = "update pghome set id_viagem='$home_dados->id_viagem',
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

    $sql = "select ph.*,p.origem, p.destino from pghome as ph, viagem as v, pacote_viagem as p where ph.id_viagem = v.id and v.idpacote_viagem = p.id;";
    // $sql = "select * from pghome order by id";
    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;
    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listHome[] = new Home();

      $listHome[$cont]->id = $rs['id'];
      $listHome[$cont]->id_viagem = $rs['id_viagem'];
      $listHome[$cont]->imagem = $rs['imagem'];
      $listHome[$cont]->tipo = $rs['idTipo'];
      $listHome[$cont]->origem = $rs['origem'];
      $listHome[$cont]->destino = $rs['destino'];

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
      $home->id_viagem = $rs['id_viagem'];
      $home->imagem = $rs['imagem'];
      $home->tipo = $rs['idTipo'];

      $conex->Desconectar();


    }
    if(isset($home))
      return $home;
  }
}

 ?>
