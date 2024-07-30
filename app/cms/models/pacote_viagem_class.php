<?php

/*
  Autor:Bruna
  Data de Modificação:25/04/2018
  Class:Vendas
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class PacoteViagem{
  public $id;
  public $origem;
  public $destino;
  public $descricao;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($pacote_viagem_dados){

    $sql = "insert into pacote_viagem set origem='$pacote_viagem_dados->origem',
                                          destino='$pacote_viagem_dados->destino',
                                          descricao='$pacote_viagem_dados->descricao';";
                                   // echo($sql);
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

  public function Update($pacote_viagem_dados){
    $sql = "update pacote_viagem set origem='$pacote_viagem_dados->origem',
                                          destino='$pacote_viagem_dados->destino',
                                          descricao='$pacote_viagem_dados->descricao' where id=$pacote_viagem_dados->id;";

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
        echo("Erro ao atualizar no BD");

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();
  }

  public function Delete($pacote_viagem_dados){
    $sql = "delete from pacote_viagem where id = $pacote_viagem_dados->id";

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

    $sql = "SELECT * FROM pacote_viagem ORDER BY id DESC";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listPacoteViagem[] = new PacoteViagem();

      $listPacoteViagem[$cont]->id = $rs['id'];
      $listPacoteViagem[$cont]->origem = $rs['origem'];
      $listPacoteViagem[$cont]->destino = $rs['destino'];
      $listPacoteViagem[$cont]->descricao = $rs['descricao'];
      // echo($listPacoteViagem);die;
      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listPacoteViagem))
        return $listPacoteViagem;
  }

  public function SelectById($pacote_viagem_dados){

    $sql = "SELECT * FROM pacote_viagem WHERE id = $pacote_viagem_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $pacote_viagem = new PacoteViagem();

      $pacote_viagem->id = $rs['id'];
      $pacote_viagem->origem = $rs['origem'];
      $pacote_viagem->destino = $rs['destino'];
      $pacote_viagem->descricao = $rs['descricao'];

      $conex->Desconectar();

    }
    if(isset($pacote_viagem))
      return $pacote_viagem;
  }

}

 ?>
