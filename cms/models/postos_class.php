<?php
/*
  Autor:Bruna
  Data de Modificação:10/04/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class Postos{
  public $id;
  public $datainseri;
  public $nome;
  public $imagem;
  public $localizacao;
  public $texto;
  public $estados;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($postos_dados){
    $sql = "insert into pgposto_rodoviarios set datainseri='$postos_dados->datainseri',
                                                 nome='$postos_dados->nome',
                                                 imagem='$postos_dados->imagem'
                                                 localizacao='$postos_dados->localizacao',
                                                 texto='$postos_dados->texto',
                                                 idEstado='$postos_dados->estados';";

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

  public function Update($postos_dados){
    $sql = "update pgposto_rodoviarios set datainseri='$postos_dados->datainseri',
                                                 nome='$postos_dados->nome',
                                                 imagem='$postos_dados->imagem'
                                                 localizacao='$postos_dados->localizacao',
                                                 texto='$postos_dados->texto',
                                                 idEstado='$postos_dados->estados' where id=$postos_dados->id;";

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

  public function Delete($postos_dados){
    $sql = "delete from pgposto_rodoviarios where id = $postos_dados->id";

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

  public function Select($postos_dados){
    $sql = "select * from pgposto_rodoviarios order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listPostos[] = new Postos();

      $listPostos[$cont]->id = $rs['id'];
      $listPostos[$cont]->datainseri = $rs['datainseri'];
      $listPostos[$cont]->nome = $rs['nome'];
      $listPostos[$cont]->imagem = $rs['imagem'];
      $listPostos[$cont]->localizacao = $rs['localizacao'];
      $listPostos[$cont]->texto = $rs['texto'];
      $listPostos[$cont]->estados = $rs['idEstado'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listPostos))
        return $listPostos;
  }

  public function SelectById($postos_dados){
    $sql = "select * from pgposto_rodoviarios where id = $postos_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $postos = new Postos();

      $postos->id = $rs['id'];
      $postos->datainseri = $rs['datainseri'];
      $postos->nome = $rs['noma'];
      $postos->imagem = $rs['imagem'];
      $postos->localizacao = $rs['localizacao'];
      $postos->texto = $rs['texto'];
      $postos->estados = $rs['idEstado'];

      $conex->Desconectar();

    }
    if(isset($postos))
      return $postos;
  }
}
 ?>
