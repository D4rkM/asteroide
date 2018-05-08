<?php
class Login{

  public $id;
  public $nome;
  public $email;
  public $ativo;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Logar($login_dados){

    $mensagem = null;

    $sql = "CALL login_usuario('$usuario_dados->email', '$usuario_dados->senha', @mensagem, @ativo, @id, @nome);";
    $sqlResultado = "Select @mensagem, @ativo, @id, @nome";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $PDO_conex->query($sqlCall);

    $select = $PDO_conex->query($sqlResultado);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){
      $usuario = new Login();

      $mensagem = $rs['@mensagem'];
      $usuario->ativo = $rs['@ativo'];
      $usuario->id = $rs['@id'];
      $usuario->nome = $rs['@nome'];

      $conex->Desconectar();
    }

    if($mensagem == 1){
      if($usuario->ativo == 1){
        return $usuario;
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
