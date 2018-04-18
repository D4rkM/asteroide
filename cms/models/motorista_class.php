<?php

/*
  Autor:Bruna
  Data de Modificação:17/04/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/

class Motorista{
  public $id;
  public $nome;
  public $email;
  public $usuraio;
  public $senha;
  public $data_nasc;
  public $sexo;
  public $telefone;
  public $celular;
  public $cpf;
  public $rg;
  public $cnh;
  public $imagem;
  public $ativo;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($motorista_dados){

    $sql = "insert into motorista set nome='$motorista_dados->nome',
                                        email='$motorista_dados->email',
                                        usuario='$motorista_dados->usuario',
                                        senha='$motorista_dados->senha',
                                        datanasc='$motorista_dados->data_nasc',
                                        sexo='$motorista_dados->sexo',
                                        telefone='$motorista_dados->telefone',
                                        celular='$motorista_dados->celular',
                                        cpf='$motorista_dados->cpf',
                                        rg='$motorista_dados->rg',
                                        cnh='$motorista_dados->cnh',
                                        imagem='$motorista_dados->imagem',
                                        ativo='$funcionario_dados->ativo';";
echo($sql);

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

  public function Update($motorista_dados){

    $sql = "update motorista set  nome='$motorista_dados->nome',
                                        email='$motorista_dados->email',
                                        usuario='$motorista_dados->usuario',
                                        senha='$motorista_dados->senha',
                                        datanasc='$motorista_dados->data_nasc',
                                        sexo='$motorista_dados->sexo',
                                        telefone='$motorista_dados->telefone',
                                        celular='$motorista_dados->celular',
                                        cpf='$motorista_dados->cpf',
                                        rg='$motorista_dados->rg',
                                        cnh='$motorista_dados->cnh',
                                        imagem='$motorista_dados->imagem',
                                        ativo='$motorista_dados->ativo';";


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

  public function Delete($motorista_dados){
    $sql = "delete from motorista where id = $motorista_dados->id";

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

    $sql = "select * from motorista order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listMotorista[] = new Motorista();

      $listMotorista[$cont]->id = $rs['id'];
      $listMotorista[$cont]->nome = $rs['nome'];
      $listMotorista[$cont]->email = $rs['email'];
      $listMotorista[$cont]->telefone = $rs['telefone'];
      $listMotorista[$cont]->celular = $rs['celular'];
      $listMotorista[$cont]->cpf = $rs['cpf'];
      $listMotorista[$cont]->ativo = $rs['ativo'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listMotorista))
        return $listMotorista;

  }

  public function SelectById($motorista_dados){

    $sql = "select * from motorista where id = $motorista_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $motorista = new Motorista();

      $motorista->nome = $rs['nome'];
      $motorista->email = $rs['email'];
      $motorista->usuario = $rs['usuario'];
      $motrista->senha = $rs['senha'];
      $motorista->data_nasc = $rs['datanasc'];
      $motorista->sexo = $rs['sexo'];
      $motorista->telefone = $rs['telefone'];
      $motorista->celular = $rs['celular'];
      $motorista->cpf = $rs['cpf'];
      $motorista->rg = $rs['rg'];
      $motorista->cnh =$rs['cnh'];
      $motorista->imagem = $rs['imagem'];
      $motorista->ativar = $rs['ativar'];

      $conex->Desconectar();


    }
    if(isset($motorista))
      return $motorista;
  }

}

 ?>
