<?php

/*
  Autor:William
  Data de Modificação:22/03/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/

class Funcionario{
  public $id;
  public $nome;
  public $email;
  public $senha;
  public $data_nasc;
  public $sexo;
  public $telefone;
  public $celular;
  public $cpf;
  public $rg;
  public $id_endereco;
  public $ativo;
  public $online;
  public $login;
  public $cep;
  public $logradouro;
  public $bairro;
  public $complemento;
  public $id_cidade;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($funcionario_dados){

    $sql = "insert into funcionario set nome='$funcionario_dados->nome',
                                        login='$funcionario_dados->login',
                                        data_nasc='$funcionario_dados->data_nasc',
                                        telefone='$funcionario_dados->telefone',
                                        cpf='$funcionario_dados->cpf',
                                        ativo='$funcionario_dados->ativo',
                                        email='$funcionario_dados->email',
                                        senha='$funcionario_dados->senha',
                                        sexo='$funcionario_dados->sexo',
                                        celular='$funcionario_dados->celular',
                                        rg='$funcionario_dados->rg';";

    $sql_endereco = "insert into endereco set cep='$funcionario_dados->cep',
                                              logradouro='$funcionario_dados->logradouro',
                                              bairro='$funcionario_dados->bairro',
                                              numero='$funcionario_dados->numero',
                                              complemento='$funcionario_dados->complemento';";
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

  public function Update($funcionario_dados){

    $sql = "update funcionario set nome='$funcionario_dados->nome',
                                        login='$funcionario_dados->login',
                                        data_nasc='$funcionario_dados->data_nasc',
                                        telefone='$funcionario_dados->telefone',
                                        cpf='$funcionario_dados->cpf',
                                        ativo='$funcionario_dados->ativo',
                                        email='$funcionario_dados->email',
                                        senha='$funcionario_dados->senha',
                                        sexo='$funcionario_dados->sexo',
                                        celular='$funcionario_dados->celular',
                                        rg='$funcionario_dados->rg',
                                        cep='$funcionario_dados->cep',
                                        logradouro='$funcionario_dados->logradouro',
                                        bairro='$funcionario_dados->bairro',
                                        complemento='$funcionario_dados->complemento',
                                        numero='$funcionario_dados->numero'
                                        where id = $funcionario_dados->id;";

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

  public function Delete($funcionario_dados){
    $sql = "delete from funcionario where id = $funcionario_dados->id";

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

    $sql = "select * from funcionario order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listFuncionario[] = new Funcionario();

      $listFuncionario[$cont]->id = $rs['id'];
      $listFuncionario[$cont]->nome = $rs['nome'];
      $listFuncionario[$cont]->email = $rs['email'];
      $listFuncionario[$cont]->datanasc = $rs['datanasc'];
      $listFuncionario[$cont]->telefone = $rs['telefone'];
      $listFuncionario[$cont]->celular = $rs['celular'];
      $listFuncionario[$cont]->cpf = $rs['cpf'];
      $listFuncionario[$cont]->data_nasc = $rs['data_nasc'];
      $listFuncionario[$cont]->ativo = $rs['ativo'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listFuncionario))
        return $listFuncionario;

  }

  public function SelectById($funcionario_dados){

    $sql = "select * from funcionario where id = $funcionario_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $funcionario = new Funcionario();

      $funcionario->nome = $rs['nome'];
      $funcionario->login = $rs['login'];
      $funcionario->data_nasc = $rs['data_nasc'];
      $funcionario->telefone = $rs['telefone'];
      $funcionario->cpf = $rs['cpf'];
      $funcionario->celular = $rs['celular'];
      $funcionario->rg = $rs['rg'];
      $funcionario->ativo = $rs['ativo'];
      $funcionario->email = $rs['email'];
      $funcionario->senha = $rs['senha'];
      $funcionario->sexo = $rs['sexo'];
      // $funcionario->cep = $rs['cep'];
      // $funcionario->numero = $rs['numero'];
      // $funcionario->bairro = $rs['bairro'];
      // $funcionario->logradouro = $rs['logradouro'];
      // $funcionario->complemento = $rs['complemento'];

      $conex->Desconectar();


    }
    if(isset($funcionario))
      return $funcionario;
  }



  public function Login($funcionario_dados){

    $mensagem = null;

    $sqlCall = "CALL sp_login_funcionario('$funcionario_dados->login', '$funcionario_dados->senha', @mensagem, @ativo, @id, @nome);";
    $sqlResultado = "Select @mensagem, @ativo, @id, @nome";

      echo('teste');

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $PDO_conex->query($sqlCall);

    $select = $PDO_conex->query($sqlResultado);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){
      $funcionario = new Funcionario();

      $mensagem = $rs['@mensagem'];
      $funcionario->ativo = $rs['@ativo'];
      $funcionario->id = $rs['@id'];
      $funcionario->nome = $rs['@nome'];

      $conex->Desconectar();
    }

    if($mensagem == 1){
      if($funcionario->ativo == 1){
        return $funcionario;
      }else{
        ?>
          <script type="text/javascript">
            alert('Seu usuário está desativado.');
          </script>
        <?php
      }

    }else{


      echo("<script> alert('Usuário ou senha incorreto, tente novamente.'); </script>");
      return false;
    }

  }



}

 ?>
