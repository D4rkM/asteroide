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
   $conex = new Mysql_db();

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

  public function Select(){
    $sql = "select * from reclamacao order by id desc";

    $conex = new Mysql_db();
    $PDO_conex = $conex->Conectar();
    $select = $PDO_conex->query($sql);
    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){
      $listReclamacao[] = new Reclamaca();

      $listReclamacao[$cont]->id = $rs['id'];
      $listReclamacao[$cont]->reclamacao = $rs['reclamacao'];
      $listReclamacao[$cont]->email = $rs['email'];

      $cont+=1;
    }
    $conex->Desconectar();
    if(isset($listReclamacao)){
      return $listReclamacao;
    }
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
   $conex = new Mysql_db();

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

  public function Select(){
    $sql = "select * from sugestao order by id desc";

    $conex = new Mysql_db();
    $PDO_conex = $conex->Conectar();
    $select = $PDO_conex->query($sql);
    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){
      $listSugestao[] = new Sugestao();

      $listSugestao[$cont]->id = $rs['id'];
      $listSugestao[$cont]->sugestao = $rs['sugestao'];
      $listSugestao[$cont]->email = $rs['email'];

      $cont+=1;
    }
    $conex->Desconectar();
    if(isset($listSugestao)){
      return $listSugestao;
    }
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
   $conex = new Mysql_db();

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

  public function Select(){
    $sql = "select * from elogio order by id desc";

    $conex = new Mysql_db();
    $PDO_conex = $conex->Conectar();
    $select = $PDO_conex->query($sql);
    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){
      $listElogio[] = new Elogio();

      $listElogio[$cont]->id = $rs['id'];
      $listElogio[$cont]->elogio = $rs['elogio'];
      $listElogio[$cont]->email = $rs['email'];

      $cont+=1;
    }
    $conex->Desconectar();
    if(isset($listElogio)){
      return $listElogio;
    }
  }
}
 ?>
