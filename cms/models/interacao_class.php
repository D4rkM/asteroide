<?php

/*
  Autor:William
  Data de Modificação:22/03/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class Interacao{
  public $id;
  public $local;
  public $imagem;
  public $comentario;
  public $ativar;
  public $idUsuario;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Delete($interacao_dados){
    $sql = "delete from interacao where id = $interacao_dados->id";
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
        echo("Erro ao deletar no BD");

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();
  }

  public function Select(){

    $sql = "select * from interacao order by id desc";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listInteracao[] = new Interacao();

      $listInteracao[$cont]->id = $rs['id'];
      $listInteracao[$cont]->local = $rs['local'];
      $listInteracao[$cont]->imagem = $rs['imagem'];
      $listInteracao[$cont]->comentario = $rs['comentario'];
      $listInteracao[$cont]->ativar = $rs['aparecer'];
      $listInteracao[$cont]->idUsuario = $rs['id_usuario'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listInteracao))
        return $listInteracao;

  }


}

 ?>
