<?php

/*
  Autor:Bruna
  Data de Modificação:11/04/2018
  Class:Funcionario
  Obs:Essa Classe é uma replica dos campos de dados com ações do CRUD

*/
class EstadosPostos{
  public $id;
  public $datainseri;
  public $estado;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($estados_postos_dados){

    $sql = "insert into pgduvidas_frequentes set datainseri='$estados_postos_dados->datainseri',
                                                 estado='$estados_postos_dados->estado';";


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

}
