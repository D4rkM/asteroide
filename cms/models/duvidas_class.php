<?php

/*
  Autor:William
  Data de Modificação:22/03/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class Duvidas{
  public $id;
  public $pergunta;
  public $resposta;
  public $aparecer;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($duvida_dados){

    $sql = "insert into pgduvidas_frequentes set pergunta='$duvida_dados->pergunta',
                                                 resposta='$duvida_dados->resposta',
                                                 aparecer=$duvida_dados->aparecer;";


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

  public function Update($duvida_dados){

    $sql = "update pgduvidas_frequentes set pergunta='$duvida_dados->pergunta',
                                   resposta='$duvida_dados->resposta',
                                   aparecer=$duvida_dados->aparecer where id=$duvida_dados->id;";

    //Instancia a classe do banco
    $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql))
        //echo "<script>alert('Atualizado com Sucesso!')</script>";
        header('location:index.php');
    else
        echo("Erro ao atualizar no BD");

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();
  }

  public function Delete($duvida_dados){
    $sql = "delete from pgduvidas_frequentes where id = $duvida_dados->id";

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

    $sql = "select * from pgduvidas_frequentes order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listDuvidas[] = new Duvidas();

      $listDuvidas[$cont]->id = $rs['id'];
      $listDuvidas[$cont]->pergunta = $rs['pergunta'];
      $listDuvidas[$cont]->resposta = $rs['resposta'];
      $listDuvidas[$cont]->aparecer = $rs['aparecer'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listDuvidas))
        return $listDuvidas;

  }

  public function SelectById($duvida_dados){

    $sql = "select * from pgduvidas_frequentes where id = $duvida_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $duvida = new Duvidas();

      $duvida->id = $rs['id'];
      $duvida->pergunta = $rs['pergunta'];
      $duvida->resposta = $rs['resposta'];
      $duvida->aparecer = $rs['aparecer'];

      $conex->Desconectar();


    }
    if(isset($duvida))
      return $duvida;
  }



  public function Login($funcionario_dados){

    $mensagem = null;

    $sqlCall = "CALL sp_login_funcionario('$funcionario_dados->login', '$funcionario_dados->senha', @mensagem, @ativo, @id, @nome);";
    $sqlResultado = "Select @mensagem, @ativo, @id, @nome";



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
