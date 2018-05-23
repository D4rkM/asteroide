<?php

/*
    Autor:Lucas
    Data de Modificação:23/05/2018
    Controller:Sobre Empresa
    Obs:Controller para realizar o CRUD de titulos, textos e imagens na página de Sobre Empresa.
*/

class sobreEmpresa{
  public $id;
  public $titulo1;
  public $texto1;
  public $titulo2;
  public $texto2;
  public $imagem;
  public $icon1;
  public $detalhes1;

  public function __construct(){
    require_once('db_class.php');
  }

  public function Insert($sobre_empresa_dados){

    $sql = "insert into pgsobre_nos set titulo1='$sobre_empresa_dados->titulo1',
                                        texto1='$sobre_empresa_dados->texto1',
                                        titulo2='$sobre_empresa_dados->titulo2',
                                        texto2='$sobre_empresa_dados->texto2',
                                        imagem='$sobre_empresa_dados->imagem',
                                        icon1='$sobre_empresa_dados->icon1',
                                        detalhes1='$sobre_empresa_dados->detalhes1';";

//echo ($sql);
//require_once('index.php');

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

    $sql = "update pgsobre_nos set titulo1='$sobre_empresa_dados->titulo1',
                                   texto1='$sobre_empresa_dados->texto1',
                                   titulo2='$sobre_empresa_dados->titulo2',
                                   texto2='$sobre_empresa_dados->texto2',
                                   imagem='$sobre_empresa_dados->imagem',
                                   icon1='$sobre_empresa_dados->icon1',
                                   detalhes1='$sobre_empresa_dados->detalhes1';";

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

  public function Delete($duvida_dados){
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

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listSobrenos[] = new sobreEmpresa();

      $listSobrenos[$cont]->id = $rs['id'];
      $listSobrenos[$cont]->titulo1 = $rs['titulo1'];
      $listSobrenos[$cont]->texto1 = $rs['texto1'];
      $listSobrenos[$cont]->titulo2 = $rs['titulo2'];
      $listSobrenos[$cont]->texto2 = $rs['texto2'];
      $listSobrenos[$cont]->imagem = $rs['imagem'];
      $listSobrenos[$cont]->icon1 = $rs['icon1'];
      $listSobrenos[$cont]->detalhes1 = $rs['detalhes1'];
      $cont+=1;
    }

    $conex->Desconectar();

    if(isset($listSobrenos))
        return $listSobrenos;

  }

  public function SelectById($sobre_empresa){

    $sql = "select * from pgsobre_nos where id = $sobre_empresa_dados->id";

    $conex = new Mysql_db();

    $PDO_conex = $conex->Conectar();

    $select = $PDO_conex->query($sql);

    if($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $sobre_empresa = new sobreEmpresa();

      $listSobrenos[$cont]->id = $rs['id'];
      $listSobrenos[$cont]->titulo1 = $rs['titulo1'];
      $listSobrenos[$cont]->texto1 = $rs['texto1'];
      $listSobrenos[$cont]->titulo2 = $rs['titulo2'];
      $listSobrenos[$cont]->texto2 = $rs['texto2'];
      $listSobrenos[$cont]->titulo2 = $rs['imagem'];
      $listSobrenos[$cont]->titulo2 = $rs['icon1'];
      $listSobrenos[$cont]->titulo2 = $rs['detalhes1'];

      $conex->Desconectar();


    }
    if(isset($sobre_empresa))
      return $sobre_empresa;
  }



  public function Login($funcionario_dados){

    $mensagem = null;

    $sqlCall = "CALL sp_login_funcionario('$funcionario_dados->login', '$funcionario_dados->senha', @mensagem, @ativo, @id, @nome);";
    $sqlResultado = "Select @mensagem, @ativo, @id, @nome";



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
