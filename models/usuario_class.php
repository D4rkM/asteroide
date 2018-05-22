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

  public function __construct(){
    require_once('db_class.php');
  }

  public static function Insert ($usuario_dados){

    $sql_usuario ="insert into cliente set imagem_usuario='$usuario_dados->imagem',
                                           nome='$usuario_dados->nome',
                                           email='$usuario_dados->email',
                                           senha='$usuario_dados->senha',
                                           datanasc='$usuario_dados->datanasc',
                                           sexo='$usuario_dados->sexo',
                                           telefone='$usuario_dados->telefone',
                                           celular='$usuario_dados->celular',
                                           cpf='$usuario_dados->cpf',
                                           rg='$usuario_dados->rg';";
                                           // echo ($sql_usuario);die;
      //echo($sql_usuario);die;
    //Instancia a classe do banco
   $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql_usuario))

    header('location:views/Usuario/pagina_usuario.php');
    else
       echo("Erro ao inserir no BD");

    //Fecha a conexão com o Banco de Dados
      $conex->Desconectar();
  }
  public function Update($usuario_dados){

    if ($usuario_dados->imagem == "nada"){
    $sql_usuario = "update cliente set nome='$usuario_dados->nome',
                              email='$usuario_dados->email',
                              senha='$usuario_dados->senha',
                              datanasc='$usuario_dados->datanasc',
                              sexo='$usuario_dados->sexo',
                              telefone='$usuario_dados->telefone',
                              celular='$usuario_dados->celular',
                              cpf='$usuario_dados->cpf',
                              rg='$usuario_dados->rg'
                              where id=$usuario_dados->id;";

    }else{
      $sql_usuario = "update cliente set imagem_usuario='$usuario_dados->imagem',
                                             nome='$usuario_dados->nome',
                                             email='$usuario_dados->email',
                                             senha='$usuario_dados->senha',
                                             datanasc='$usuario_dados->datanasc',
                                             sexo='$usuario_dados->sexo',
                                             telefone='$usuario_dados->telefone',
                                             celular='$usuario_dados->celular',
                                             cpf='$usuario_dados->cpf',
                                             rg='$usuario_dados->rg'
                                             where id=$usuario_dados->id;";
    }
    //Instancia a classe do banco
    $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql_usuario))
        header('location:views/Usuario/pagina_usuario.php');
    else
        echo("Erro ao inserir no BD");

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();
  }
  public function SelectById($usuario_dados){
    $sql = "select * from cliente where id = 54";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $usuario = new Usuario();

      $usuario->id = $rs['id'];
      $usuario->imagem = $rs['imagem_usuario'];
      $usuario->nome = $rs['nome'];
      $usuario->email = $rs['email'];
      $usuario->senha = $rs['senha'];
      $usuario->datanasc = $rs['datanasc'];
      $usuario->sexo = $rs['sexo'];
      $usuario->telefone = $rs['telefone'];
      $usuario->celular = $rs['celular'];
      $usuario->cpf = $rs['cpf'];
      $usuario->rg = $rs['rg'];

      $conex->Desconectar();

    }
    if(isset($usuario))
      return $usuario;
  }

  public function Login($usuario_dados){

      $mensagem = null;

      $sqlCall = "CALL sp_login_cliente('$usuario_dados->login', '$usuario_dados->senha', @mensagem, @id, @nome, @imagem_usuario);";
      $sqlResultado = "Select @mensagem, @id, @nome, @imagem_usuario";

      //var_dump($usuario_dados);

      $conex = new Mysql_db();

      $PDO_conex = $conex->Conectar();

      $PDO_conex->query($sqlCall);

      $select = $PDO_conex->query($sqlResultado);

      if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $mensagem = $rs['@mensagem'];

      if($mensagem == true){

        session_start();

        $_SESSION['nome_usuario']= $rs['@nome'];
        $_SESSION['id_usuario'] = $rs['@id'];
        $_SESSION['imagem_usuario'] = $rs['@imagem_usuario'];

      }else{
        echo("<script> alert('Usuário ou senha incorreto, tente novamente.'); </script>");
      }

        $conex->Desconectar();
      }



    }
}
 ?>
