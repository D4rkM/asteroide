<?php
/*
    Autor:Bruna
    Data de Modificação:25/04/2018
    Controller:Caminho
    Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
*/
class Caminho{
  public $id;
  public $latitude;
  public $longitude;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($caminho_dados){

    $sql = "insert into caminho set latitude='$caminho_dados->latitude',
                                    longitude='$caminho_dados->longitude';";


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

  public function Update($caminho_dados){

    $sql = "update caminho set latitude='$caminho_dados->latitude',
                               longitude='$caminho_dados->longitude' where id=$caminho_dados->id;";
echo($sql);
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

  public function Delete($caminho_dados){
    $sql = "delete from caminho where id = $caminho_dados->id";

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

    $sql = "select * from caminho order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listCaminho[] = new Caminho();

      $listCaminho[$cont]->id = $rs['id'];
      $listCaminho[$cont]->latitude = $rs['latitude'];
      $listCaminho[$cont]->longitude = $rs['longitude'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listCaminho))
        return $listCaminho;

  }

  public function SelectById($caminho_dados){

    $sql = "select * from caminho where id = $caminho_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $caminho = new Caminho();

      $caminho->id = $rs['id'];
      $caminho->latitude = $rs['latitude'];
      $caminho->longitude = $rs['longitude'];

      $conex->Desconectar();


    }
    if(isset($caminho))
      return $caminho;
  }

}

 ?>
