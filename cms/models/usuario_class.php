<?php
/*
Autor:Bruna
Data de Modificação: 27/03/2018
Class: Contatos
Obs:Essa classe é uma replica dos campos do BD com os metodos de ações do CRUD

*/

class Usuario{

  public $id;
  public $foto;
  public $nome;
  public $email;
  public $usuario;
  public $senha;
  public $datanasc;
  public $sexo;
  public $telefone;
  public $celular;
  public $cpf;
  public $rg;
  public $cep;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Select(){
    $sql = "select * from cliente order by;";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listUsuario[] = new Usuario();

      $listUsuario[$cont]->id = $rs['id'];
      $listUsuario[$cont]->nome = $rs['nome'];
      $listUsuario[$cont]->email = $rs['email'];
      $listUsuario[$cont]->celular = $rs['celular'];

      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listUsuario))
        return $listUsuario;
  }
  public function Delete($usuario_dados){
    $sql = "delete from cliente where id = $usuario_dados->id";

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
}
 ?>
