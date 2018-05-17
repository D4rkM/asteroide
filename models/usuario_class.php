<?php
/*
Autor:Bruna
Data de Modificação: 27/03/2018
Class: Contatos
Obs:Essa classe é uma replica dos campos do BD com os metodos de ações do CRUD

*/

class Usuario{

  public $id;
  public $foto;
  public $nome;
  public $email;
  public $senha;
  public $datanasc;
  public $sexo;
  public $telefone;
  public $celular;
  public $cpf;
  public $rg;
  public $cep;
  public $logradouro;
  public $numero;
  public $complemento;
  public $cidade;
  public $estado;
  public $login;

  public function __construct(){
    require_once('db_class.php');
  }

  public static function Insert ($usuario_dados){

    $sql_usuario ="insert into usuario set foto='$usuario_dados->foto',
                                           nome='$usuario_dados->nome',
                                           email='$usuario_dados->email',
                                           senha='$usuario_dados->senha',
                                           datanasc='$usuario_dados->datanasc',
                                           sexo='$usuario_dados->sexo',
                                           telefone='$usuario_dados->telefone',
                                           celular='$usuario_dados->celular',
                                           cpf='$usuario_dados->cpf',
                                           rg='$usuario_dados->rg',
                                           cep='$usuario_dados->cep',
                                           logradouro='$usuario_dados->logradouro',
                                           numero='$usuario_dados->numero',
                                           complemento='$usuario_dados->complemento';";
      echo($sql_usuario);die;
    //Instancia a classe do banco
   $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql_usuario))

    header('location:index.php');
    else
       echo("Erro ao inserir no BD");

    //Fecha a conexão com o Banco de Dados
      $conex->Desconectar();
  }

  public function Login($usuario_dados){

    $mensagem = null;

    $sqlCall = "CALL sp_login_cliente('$usuario_dados->login', '$usuario_dados->senha', @mensagem, @id, @nome);";
    $sqlResultado = "Select @mensagem, @id, @nome";

    //var_dump($usuario_dados);

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $PDO_conex->query($sqlCall);

    $select = $PDO_conex->query($sqlResultado);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){


      $usuario = new Usuario();

      $mensagem = $rs['@mensagem'];
    
      $usuario->id = $rs['@id'];
      $usuario->nome = $rs['@nome'];

      $conex->Desconectar();
    }

    if($mensagem == 1){
        return $usuario;

    }else{


      echo("<script> alert('Usuário ou senha incorreto, tente novamente.'); </script>");
      return false;
    }

  }

}
 ?>
