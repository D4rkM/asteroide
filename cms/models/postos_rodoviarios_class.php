<?php
/*
  Autor:Bruna
  Data de Modificação:10/04/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class PostosRodoviarios{
  public $id;
  public $nome;
  public $imagem;
  public $cep;
  public $logradouro;
  public $numero;
  public $bairro;
  public $cidade;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($postos_rodoviarios_dados){
    $sql = "insert into postos_rodoviarios set nome='$postos_rodoviarios_dados->nome',
                                                 imagem='$postos_rodoviarios_dados->imagem',
                                                 cep='$postos_rodoviarios_dados->cep',
                                                 logradouro='$postos_rodoviarios_dados->logradouro',
                                                 numero='$postos_rodoviarios_dados->numero'
                                                 bairro='$postos_rodoviarios_dados->bairro'
                                                 idCidade='$postos_rodoviarios_dados->cidade';";
                                                 echo($sql);



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

  public function Update($postos_rodoviarios_dados){
    $sql = "update postos_rodoviarios set nome='$postos_rodoviarios_dados->nome',
                                                 imagem='$postos_rodoviarios_dados->imagem',
                                                 cep='$postos_rodoviarios_dados->cep',
                                                 logradouro='$postos_rodoviarios_dados->logradouro',
                                                 numero='$postos_rodoviarios_dados->numero'
                                                 bairro='$postos_rodoviarios_dados->bairro'
                                                 idCidade='$postos_rodoviarios_dados->cidade' where id=$postos_dados->id;";

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

  public function Delete($postos_rodoviarios_dados){
    $sql = "delete from postos_rodoviarios where id = $postos_rodoviarios_dados->id";

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
    $sql = "select * from postos_rodoviarios order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listPostosRodoviarios[] = new PostosRodoviarios();

      $listPostosRodoviarios[$cont]->id = $rs['id'];
      $listPostosRodoviarios[$cont]->nome = $rs['nome'];
      $listPostosRodoviarios[$cont]->imagem = $rs['imagem'];
      $listPostosRodoviarios[$cont]->cep = $rs['cep'];
      $listPostosRodoviarios[$cont]->logradouro = $rs['logradouro'];
      $listPostosRodoviarios[$cont]->numero = $rs['numero'];
      $listPostosRodoviarios[$cont]->bairro = $rs['bairro'];
      $listPostosRodoviarios[$cont]->cidade = $rs['cidade'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listPostosRodoviarios))
        return $listPostosRodoviarios;
  }

  public function SelectById($postos_rodoviarios_dados){
    $sql = "select * from postos_rodoviarios where id = $postos_rodoviarios_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $postos_rodoviarios = new PostosRodoviarios();

      $postos_rodoviarios->id = $rs['id'];
      $postos_rodoviarios->nome = $rs['noma'];
      $postos_rodoviarios->imagem = $rs['imagem'];
      $postos_rodoviarios->cep = $rs['cep'];
      $postos_rodoviarios->logradouro = $rs['logradouro'];
      $postos_rodoviarios->numero = $rs['numero'];
      $postos_rodoviarios->bairro = $rs['bairro'];
      $postos_rodoviarios->cidade = $rs['idCidade'];

      $conex->Desconectar();

    }
    if(isset($postos_rodoviarios))
      return $postos_rodoviarios;
  }
}
 ?>
