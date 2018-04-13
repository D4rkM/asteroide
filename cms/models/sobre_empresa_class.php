<?php

/*
  Autor:Bruna
  Data de Modificação:09/04/2018
  Class:Sobre a Empresa
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class SobreEmpresa{
  public $id;
  public $datainseri;
  public $imagem1;
  public $titulo1;
  public $subtitulo;
  public $texto1;
  public $imagem2;
  public $titulo2;
  public $icon1;
  public $detalhes1;
  public $icon2;
  public $detalhes2;
  public $icon3;
  public $detalhes3;
  public $icon4;
  public $detalhes4;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($sobre_empresa_dados){

    $sql = "insert into pgsobre_nos set datainseri='$sobre_empresa_dados->datainseri',
                                        imagem1='$sobre_empresa_dados->imagem1',
                                        titulo1='$sobre_empresa_dados->titulo1',
                                        subtitulo='$sobre_empresa_dados->subtitulo',
                                        texto1='$sobre_empresa_dados->texto1',
                                        imagem2='$sobre_empresa_dados->imagem2',
                                        titulo2='$sobre_empresa_dados->titulo2',
                                        texto2='$sobre_empresa_dados->texto2',
                                        icon1='$sobre_empresa_dados->icon1',
                                        detalhes1='$sobre_empresa_dados->detalhes1',
                                        icon2='$sobre_empresa_dados->icon2',
                                        detalhes2='$sobre_empresa_dados->detalhes2',
                                        icon3='$sobre_empresa_dados->icon3',
                                        detalhes3='$sobre_empresa_dados->detalhes3',
                                        icon4='$sobre_empresa_dados->icon4',
                                        detalhes4='$sobre_empresa_dados->detalhes4';";


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

  public function Update($sobre_empresa_dados){

    $sql = "update pgsobre_nos set datainseri='$sobre_empresa_dados->datainseri',
                                        imagem1='$sobre_empresa_dados->imagem1',
                                        titulo1='$sobre_empresa_dados->titulo1',
                                        subtitulo='$sobre_empresa_dados->subtitulo',
                                        texto1='$sobre_empresa_dados->texto1',
                                        imagem2='$sobre_empresa_dados->imagem2',
                                        titulo2='$sobre_empresa_dados->titulo2',
                                        texto2='$sobre_empresa_dados->texto2',
                                        icon1='$sobre_empresa_dados->icon1',
                                        detalhes1='$sobre_empresa_dados->detalhes1',
                                        icon2='$sobre_empresa_dados->icon2',
                                        detalhes2='$sobre_empresa_dados->detalhes2',
                                        icon3='$sobre_empresa_dados->icon3',
                                        detalhes3='$sobre_empresa_dados->detalhes3',
                                        icon4='$sobre_empresa_dados->icon4',
                                        detalhes4=$sobre_empresa_dados->detalhes4 where id=$sobre_empresa_dados->id;";

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

  public function Delete($sobre_empresa_dados){
    $sql = "delete from pgsobre_nos where id = $sobre_empresa_dados->id";

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
    $sql = "select * from pgsobre_nos order by id desc";

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

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listEmpresa[] = new SobreEmpresa();

      $listEmpresa[$cont]->id = $rs['id'];
      $listEmpresa[$cont]->datainseri = $rs['datainseri'];
      $listEmpresa[$cont]->imagem1 = $rs['imagem1'];
      $listEmpresa[$cont]->titulo1 = $rs['titulo1'];
      $listEmpresa[$cont]->subtitulo = $rs['subtitulo'];
      $listEmpresa[$cont]->texto1 = $rs['texto1'];
      $listEmpresa[$cont]->imagem2 = $rs['imagem2'];
      $listEmpresa[$cont]->titulo2 = $rs['titulo2'];
      $listEmpresa[$cont]->texto2 = $rs['texto2'];
      $listEmpresa[$cont]->icon1 = $rs['icon1'];
      $listEmpresa[$cont]->detalhes1 = $rs['detalhes1'];
      $listEmpresa[$cont]->icon2 = $rs['icon2'];
      $listEmpresa[$cont]->detalhes2 = $rs['detalhes2'];
      $listEmpresa[$cont]->icon3 = $rs['icon3'];
      $listEmpresa[$cont]->detalhes3 = $rs['detalhes3'];
      $listEmpresa[$cont]->icon4 = $rs['icon4'];
      $listEmpresa[$cont]->detalhes4 = $rs['detalhes4'];

      $cont+=1;
    }
    $conex->Desconectar();

    if(isset($listEmpresa))
        return $listEmpresa;
  }

  public function SelectById($sobre_empresa_dados){
    $sql = "select * from pgsobre_nos where id=$sobre_empresa_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $sobre_empresa = new SobreEmpresa();

      $sobre_empresa->id =$rs['id'];
      $sobre_empresa->imagem1 =$rs['imagem1'];
      $sobre_empresa->nomeimagem1 =$rs['nomeimagem1'];
      $sobre_empresa->imagem2 =$rs['imagem2'];
      $sobre_empresa->nomeimagem2 =$rs['nomeimagem2'];
      $sobre_empresa->titulo =$rs['titulo'];
      $sobre_empresa->datainseri =$rs['datainseri'];
      $sobre_empresa->texto1 =$rs['texto1'];
      $sobre_empresa->texto2 =$rs['texto2'];

      $conex->Desconectar();
  }
  if(isset($sobre_empresa))
    return $sobre_empresa;
}

}

 ?>
