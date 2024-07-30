<?php
class Reclamacao{

  public $id;
  public $reclamacao;
  public $email;

  public function __construct(){
    require_once('db_class.php');
  }

  public static function Insert ($reclamacao_dados){

    $sql ="insert into reclamacao set reclamacao='$reclamacao_dados->reclamacao',
                                      email='$reclamacao_dados->email';";
                                          //  echo ($sql);die;
    //Instancia a classe do banco
   $conex = new Mysql_banco();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
  if($PDO_conex->query($sql)){
    header('location:views/fale_conosco.php?mensagem=enviada');
    // echo("<script> alert('Mensagem enviada com sucesso.'); </script>");
  }else{
      echo("Erro ao inserir no BD");
    }

    //Fecha a conexão com o Banco de Dados
      $conex->Desconectar();
  }
}

class Sugestao{

  public $id;
  public $sugestao;
  public $email;

  public function __construct(){
    require_once('db_class.php');
  }

  public static function Insert ($sugestao_dados){

    $sql ="insert into sugestao set sugestao='$sugestao_dados->sugestao',
                                      email='$sugestao_dados->email';";
                                          //  echo ($sql);die;
    //Instancia a classe do banco
   $conex = new Mysql_banco();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql)){
      header('location:views/fale_conosco.php?mensagem=enviada');
      // echo("<script> alert('Mensagem enviada com sucesso.'); </script>");
    }else{
        echo("Erro ao inserir no BD");
      }
      $conex->Desconectar();
  }
}
class Elogio{

  public $id;
  public $elogio;
  public $email;

  public function __construct(){
    require_once('db_class.php');
  }

  public static function Insert ($elogio_dados){

    $sql ="insert into elogio set elogio='$elogio_dados->elogio',
                                  email='$elogio_dados->email';";
                                            // echo ($sql);die;
    //Instancia a classe do banco
   $conex = new Mysql_banco();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql)){
      header('location:views/fale_conosco.php?mensagem=enviada');
      // echo("<script> alert('Mensagem enviada com sucesso.'); </script>");
    }else{
        echo("Erro ao inserir no BD");
      }

    //Fecha a conexão com o Banco de Dados
      $conex->Desconectar();
  }
}
 ?>
