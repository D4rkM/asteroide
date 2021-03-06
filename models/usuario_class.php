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
  public $usuario;
  public $senha;
  public $datanasc;
  public $sexo;
  public $telefone;
  public $celular;
  public $cpf;
  public $rg;
  // Relacionado ao Endereco do cliente
  public $cep;
  public $logradouro;
  public $numero;
  public $bairro;
  public $complemento;
  public $cidade;
  public $estado;
  public $uf;

  public function __construct(){
    require_once('db_class.php');
  }

  public static function Insert ($usuario_dados){

    $sql_usuario ="INSERT INTO cliente set imagem_usuario='$usuario_dados->imagem',
                                           nome='$usuario_dados->nome',
                                           email='$usuario_dados->email',
                                           login='$usuario_dados->usuario',
                                           senha=MD5('$usuario_dados->senha'),
                                           datanasc='$usuario_dados->datanasc',
                                           sexo='$usuario_dados->sexo',
                                           telefone='$usuario_dados->telefone',
                                           celular='$usuario_dados->celular',
                                           cpf='$usuario_dados->cpf',
                                           rg='$usuario_dados->rg';";
                                           // echo ($sql_usuario);die;
      //echo($sql_usuario);die;
    //Instancia a classe do banco
   $conex = new Mysql_banco();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql_usuario)){

      $autolog = "SELECT * FROM cliente ORDER BY id DESC LIMIT 1";

          $select = $PDO_conex->query($autolog);

          if($rs=$select->fetch(PDO::FETCH_ASSOC)){
            session_start();
            $_SESSION['nome_usuario']= $rs['nome'];
            $_SESSION['id_usuario'] = $rs['id'];
            $_SESSION['imagem_usuario'] = $rs['imagem_usuario'];

          }
          header('location:views/Usuario/pagina_usuario.php');

    }else{
      echo("Erro ao inserir no BD");
    }
    //Fecha a conexão com o Banco de Dados
      $conex->Desconectar();
  }
  public function Update($usuario_dados){

    if ($usuario_dados->foto == "nada"){
    $sql_usuario = "UPDATE cliente SET nome='$usuario_dados->nome',
                              email='$usuario_dados->email',
                              login='$usuario_dados->usuario',
                              senha='$usuario_dados->senha',
                              datanasc='$usuario_dados->datanasc',
                              sexo='$usuario_dados->sexo',
                              telefone='$usuario_dados->telefone',
                              celular='$usuario_dados->celular',
                              cpf='$usuario_dados->cpf',
                              rg='$usuario_dados->rg'
                              WHERE id=$usuario_dados->id;";

    }else{
      $sql_usuario = "UPDATE cliente SET imagem_usuario='$usuario_dados->foto',
                                             nome='$usuario_dados->nome',
                                             email='$usuario_dados->email',
                                             login='$usuario_dados->usuario',
                                             senha='$usuario_dados->senha',
                                             datanasc='$usuario_dados->datanasc',
                                             sexo='$usuario_dados->sexo',
                                             telefone='$usuario_dados->telefone',
                                             celular='$usuario_dados->celular',
                                             cpf='$usuario_dados->cpf',
                                             rg='$usuario_dados->rg'
                                             WHERE id=$usuario_dados->id;";
    }
    //Instancia a classe do banco
    $conex = new Mysql_banco();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    if($PDO_conex->query($sql_usuario)){
      $autolog = "SELECT id, nome, imagem_usuario FROM cliente WHERE id =$usuario_dados->id";
      // echo($autolog);die;

        $select = $PDO_conex->query($autolog);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){
          session_start();
          $_SESSION['nome_usuario']= $rs['nome'];
          $_SESSION['id_usuario'] = $rs['id'];
          $_SESSION['imagem_usuario'] = $rs['imagem_usuario'];

        }
        header('location:views/Usuario/pagina_usuario.php');
    }else{
      echo("Erro ao inserir no BD");
    }
    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();
  }
  public function SelectById($usuario_dados){
    // var_dump($_SESSION['id_usuario']);die;
    $sql = "select * from cliente where id = $usuario_dados->id";
    // echo($sql);die;

    $conex = new Mysql_banco();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $usuario = new Usuario();

      $usuario->id = $rs['id'];
      $usuario->foto = $rs['imagem_usuario'];
      $usuario->nome = $rs['nome'];
      $usuario->email = $rs['email'];
      // $usuario->id = $rs[$_SESSION['id_usuario']];
      $usuario->nome = $rs['nome'];
      $usuario->email = $rs['email'];
      $usuario->usuario = $rs['login'];
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

  public function SelectByIdUserEnd($usuario_dados){
    // var_dump($_SESSION['id_usuario']);die;
    $sql = "SELECT * FROM view_cliente_endereco where id = $usuario_dados->id";
    // echo($sql);die;

    $conex = new Mysql_banco();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $usuario = new Usuario();

      $usuario->id = $rs['id'];
      $usuario->foto = $rs['imagem_usuario'];
      $usuario->nome = $rs['nome'];
      $usuario->email = $rs['email'];
      // $usuario->id = $rs[$_SESSION['id_usuario']];
      $usuario->nome = $rs['nome'];
      $usuario->email = $rs['email'];
      $usuario->usuario = $rs['login'];
      $usuario->senha = $rs['senha'];
      $usuario->datanasc = $rs['datanasc'];
      $usuario->sexo = $rs['sexo'];
      $usuario->telefone = $rs['telefone'];
      $usuario->celular = $rs['celular'];
      $usuario->cpf = $rs['cpf'];
      $usuario->rg = $rs['rg'];
      $usuario->cep = $rs['cep'];
      $usuario->bairro = $rs['bairro'];
      $usuario->numero = $rs['numero'];
      $usuario->logradouro = $rs['logradouro'];
      $usuario->cidade = $rs['estado'];
      $usuario->uf = $rs['Uf'];


      $conex->Desconectar();

    }
    if(isset($usuario))
      return $usuario;
  }

  public function Login($usuario_dados){

      $mensagem = null;

      $sqlCall = "CALL sp_login_cliente('$usuario_dados->login', '$usuario_dados->senha', @mensagem, @id, @nome, @imagem_usuario);";
      $sqlResultado = "Select @mensagem, @id, @nome, @imagem_usuario";

      $conex = new Mysql_banco();
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
