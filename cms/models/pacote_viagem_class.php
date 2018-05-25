<?php

/*
  Autor:Bruna
  Data de Modificação:25/04/2018
  Class:Vendas
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class PacoteViagem{
  public $id;
<<<<<<< HEAD:cms/models/pacote_viagem_class.php
  public $origem;
  public $destino;
=======
  public $titulo;
>>>>>>> b488cd1ef07daae0cf1c5e5deefb77a57537d394:cms/models/pacote_viagem_class.php
  public $descricao;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($pacote_viagem_dados){

    $sql = "insert into pacote_viagem set titulo='$pacote_viagem_dados->titulo',
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
    $sql = "update pacote_viagem set titulo='$pacote_viagem_dados->destino',
                                     descricao='$pacote_viagem_dados->data' where id=$pacote_viagem_dados->id;";

    // echo ($sql);
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

<<<<<<< HEAD:cms/models/pacote_viagem_class.php
    $sql = "SELECT * FROM pacote_viagem ORDER BY id DESC";
=======
    $sql = "select * from pacote_viagem order by id desc";
>>>>>>> b488cd1ef07daae0cf1c5e5deefb77a57537d394:cms/models/pacote_viagem_class.php

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listPacoteViagem[] = new PacoteViagem();

      $listPacoteViagem[$cont]->id = $rs['id'];
<<<<<<< HEAD:cms/models/pacote_viagem_class.php
      $listPacoteViagem[$cont]->origem = $rs['origem'];
      $listPacoteViagem[$cont]->destino = $rs['destino'];
=======
      $listPacoteViagem[$cont]->titulo = $rs['titulo'];
>>>>>>> b488cd1ef07daae0cf1c5e5deefb77a57537d394:cms/models/pacote_viagem_class.php
      $listPacoteViagem[$cont]->descricao = $rs['descricao'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listPacoteViagem))
        return $listPacoteViagem;
  }

  public function SelectById($pacote_viagem_dados){

<<<<<<< HEAD:cms/models/pacote_viagem_class.php
    $sql = "SELECT * FROM pacote_viagem WHERE id = $pacote_viagem_dados->id";
=======
    $sql = "select * from pacote_viagem where id = $pacote_viagem_dados->id";
>>>>>>> b488cd1ef07daae0cf1c5e5deefb77a57537d394:cms/models/pacote_viagem_class.php

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $pacote_viagem = new PacoteViagem();

      $pacote_viagem->id = $rs['id'];
<<<<<<< HEAD:cms/models/pacote_viagem_class.php
      $pacote_viagem->origem = $rs['origem'];
      $pacote_viagem->destino = $rs['destino'];
=======
      $pacote_viagem->titulo = $rs['titulo'];
>>>>>>> b488cd1ef07daae0cf1c5e5deefb77a57537d394:cms/models/pacote_viagem_class.php
      $pacote_viagem->descricao = $rs['descricao'];

      $conex->Desconectar();

    }
    if(isset($pacote_viagem))
      return $pacote_viagem;
  }

}

 ?>
