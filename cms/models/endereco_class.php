<?php

  class Endereco{
    public $id;
    public $logradouro;
    public $numero;
    public $bairro;
    public $complemento;
    public $id_cidade;

    public function __construct(){
      require_once('db_class.php');
    }

    public function Insert ($dados_endereco){

      $sql = "INSERT into endereco set cep='$dados_endereco->cep',
                                        logradouro='$dados_endereco->logradouro',
                                        numero='$dados_endereco->numero',
                                        bairro='$dados_endereco->bairro',
                                        complemento='$dados_endereco->complemento',
                                        id_cidade='$dados_endereco->id_cidade';";
                                        // echo($sql);die;
        $conex = new Mysql_db();

        //Chama o metodo para conectar no BD,
        //e guarda o retorno da conexao na variavel $PDO_conex
        $PDO_conex = $conex->Conectar();

        //Executa o script $sql no Banco de Dados
        if($PDO_conex->query($sql)){
          $endereco = new Endereco();

          $endereco = $endereco::SelectLast();

          return $endereco;
        }else{
          echo("Erro ao inserir no BD");
        }
        //Fecha a conexão com o Banco de Dados
          $conex->Desconectar();
    }
    public function SelectLast(){
      $sql ="SELECT id FROM endereco ORDER BY id DESC LIMIT 1";

      $conex = new Mysql_db();
			/*Chama o método para conectar no banco de dados e guarda o retorno da conexao
			na variavel que $PDO_conex*/
			$PDO_conex = $conex->Conectar();
			$select = $PDO_conex->query($sql);
			//Executa o script no banco de dados
			if($rs = $select->fetch(PDO::FETCH_ASSOC)){
				//Se der true redireciona a tela
				$endereco = new Endereco();
				$endereco = $rs['id'];
                return $endereco;
			}else {
				//Mensagem de erro
				echo "Error ao selecionar no Banco de Dados";
			}
			//Fecha a conexão com o banco de dados
			$conex->Desconectar();
  }
  public function Select(){
    $sql = "select * from endereco order by id desc";

    $conex = new Mysql_db();
    $PDO_conex = $conex->Conectar();
    $select = $PDO_conex->query($sql);
    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){
      $listEndereco[] = new Endereco();

      $listEndereco[$cont]->id = $rs['id'];
      $listEndereco[$cont]->rua = $rs['logradouro'];

      $cont+=1;
    }
    $conex->Desconectar();
    if(isset($listEndereco)){
      return $listEndereco;
    }
  }

  }

 ?>
