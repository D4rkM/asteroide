<?php

/*
  Autor:Bruna
  Data de Modificação:25/04/2018
  Class:Vendas
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class Vendas{
  public $id;
  public $destino;
  public $data;
  public $hora;
  public $descricao;
  public $imagem;
  public $partida;
  public $chegada;
  public $onibus;
  public $parada;
  public $motorista;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($vendas_dados){

    $sql = "insert into viagem set destino='$vendas_dados->destino',
                                   data='$vendas_dados->data',
                                   hora='$vendas_dados->hora',
                                   descricao='$vendas_dados->descricao',
                                   imagem='$vendas_dados->imagem',
                                   id_partida='$vendas_dados->partida',
                                   id_chegada='$vendas_dados->chegada',
                                   id_onibus='$vendas_dados->onibus',
                                   id_parada='$vendas_dados->parada',
                                   id_motorista='$vendas_dados->motorista',
                                   valor='$vendas_dados->valor';";
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

  public function Update($vendas_dados){
    if ($vendas_dados->imagem == "nada"){

      $sql = "insert into viagem set destino='$vendas_dados->destino',
                                     data='$vendas_dados->data',
                                     hora='$vendas_dados->hora',
                                     descricao='$vendas_dados->descricao',
                                     id_partida='$vendas_dados->partida',
                                     id_chegada='$vendas_dados->chegada',
                                     id_onibus='$vendas_dados->onibus',
                                     id_parada='$vendas_dados->parada',
                                     id_motorista='$vendas_dados->motorista',
                                     valor='$vendas_dados->valor' where id=$vendas_dados->id;";
    }else{
      $sql = "insert into viagem set destino='$vendas_dados->destino',
                                     data='$vendas_dados->data',
                                     hora='$vendas_dados->hora',
                                     descricao='$vendas_dados->descricao',
                                     imagem='$vendas_dados->imagem',
                                     id_partida='$vendas_dados->partida',
                                     id_chegada='$vendas_dados->chegada',
                                     id_onibus='$vendas_dados->onibus',
                                     id_parada='$vendas_dados->parada',
                                     id_motorista='$vendas_dados->motorista',
                                     valor='$vendas_dados->valor' where id=$vendas_dados->id;";
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

  public function Delete($vendas_dados){
    $sql = "delete from viagem where id = $vendas_dados->id";

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

    $sql = "select * from viagem order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listViagem[] = new Viagem();

      $listViagem[$cont]->id = $rs['id'];
      $listViagem[$cont]->destino = $rs['destino'];
      $listViagem[$cont]->data = $rs['data'];
      $listViagem[$cont]->hora = $rs['hora'];
      $listViagem[$cont]->descricao = $rs['descricao'];
      $listViagem[$cont]->imagem = $rs['imagem'];
      $listViagem[$cont]->partida = $rs['id_partida'];
      $listViagem[$cont]->chegada = $rs['id_chegada'];
      $listViagem[$cont]->onibus = $rs['id_onibus'];
      $listViagem[$cont]->parada = $rs['id_parada'];
      $listViagem[$cont]->motorista = $rs['id_motorista'];
      $listViagem[$cont]->valor = $rs['valor'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listViagem))
        return $listViagem;

  }

  public function SelectById($vendas_dados){

    $sql = "select * from viagem where id = $vendas_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $viagem = new Viagem();

      $viagem->id = $rs['id'];
      $viagem->destino = $rs['destino'];
      $viagem->data = $rs['data'];
      $viagem->hora = $rs['hora'];
      $viagem->descricao = $rs['descricao'];
      $viagem->imagem = $rs['imagem'];
      $viagem->partida = $rs['id_partida'];
      $viagem->chegada = $rs['id_chegada'];
      $viagem->onibus = $rs['id_onibus'];
      $viagem->parada = $rs['id_parada'];
      $viagem->motorista = $rs['id_motorista'];
      $viagem->valor = $rs['valor'];

      $conex->Desconectar();

    }
    if(isset($viagem))
      return $viagem;
  }

}

 ?>
