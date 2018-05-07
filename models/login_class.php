<?php
class Login{
  public function Login($login_dados){

    $mensagem = null;

    $sql = "usuario('$funcionario_dados->login', '$funcionario_dados->senha', @mensagem, @ativo, @id, @nome);";

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
