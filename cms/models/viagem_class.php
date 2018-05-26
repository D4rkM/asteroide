<?php
/*
  Autor:Bruna
  Data de Modificação:25/04/2018
  Class:Vendas
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD
*/
class Viagem{
  public $id;
  public $data_saida;
  public $data_chegada;
  public $hora_saida;
  public $hora_chegada;
  public $descricao;
  public $km;
  public $pacote_viagem;
  public $preco;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($viagem_dados){

    $sql = "insert into viagem set data_saida='$viagem_dados->saida',
                                   data_chegada='$viagem_dados->chegada',
                                   descricao='$viagem_dados->descricao',
                                   km='$viagem_dados->km',
                                   idpacote_viagem='$viagem_dados->pacote_viagem',
                                   preco='$viagem_dados->preco';";

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
        echo($sql);

        echo("Erro ao inserir no BD");

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();


  }

  public function Update($viagem_dados){
    $sql = "update viagem set data_saida='$viagem_dados->saida',
                              previsto_chegado='$viagem_dados->chegada'
                              descricao='$viagem_dados->descricao',
                              km='$viagem_dados->km',
                              idpacote_viagem='$viagem_dados->pacote_viagem',
                              preco='$viagem_dados->preco' where id=$viagem_dados->id;";


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

  public function Delete($viagem_dados){
    $sql = "delete from viagem where id = $viagem_dados->id";
    echo($sql);die;

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

    $sql = "select * from viagem as v, pacote_viagem as p where v.idpacote_viagem=p.id;";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listViagem[] = new Viagem();

      $listViagem[$cont]->id = $rs['id'];
      $listViagem[$cont]->saida = $rs['data_saida'];
      $listViagem[$cont]->chegada = $rs['data_chegada'];

      $listViagem[$cont]->descricao = $rs['descricao'];
      $listViagem[$cont]->km = $rs['km'];
      $listViagem[$cont]->pacote_viagem = $rs['idpacote_viagem'];
      $listViagem[$cont]->origem = $rs['origem'];
      $listViagem[$cont]->destino = $rs['destino'];
      $listViagem[$cont]->preco=$rs['preco'];


      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listViagem))
        return $listViagem;
  }

  public function SelectById($viagem_dados){

    $sql = "select * from viagem where id = $viagem_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $viagem = new Viagem();

      $viagem->id = $rs['id'];
      $viagem->saida = $rs['data_saida'];
      $viagem->chegada = $rs['data_chegada'];
      $viagem->descricao = $rs['descricao'];
      $viagem->km = $rs['km'];
      $viagem->pacote_viagem = $rs['idpacote_viagem'];
      $viagem->preco = $rs['preco'];


      $conex->Desconectar();

    }
    if(isset($viagem))
      return $viagem;
  }

}

 ?>