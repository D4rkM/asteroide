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

    public function Insert ($endereco){

      $sql = "INSERT into endereco set cep='$dadosEndereco->cep',
                                        logradouro='$dadosEndereco->logradouro',
                                        numero='$dadosEndereco->numero',
                                        bairro='$dadosEndereco->bairro',
                                        complemento='$dadosEndereco->complemento',
                                        id_cidade='$dadosEndereco->id_cidade';";

      // $sqlEnd = "INSERT INTO tbl_endereco SET bairro = '".$endereco->bairro."',
      //  logradouro = '".$endereco->logradouro."',
      //   idTipoEndereco = ".$endereco->idTipoEndereco.",
      //    cep = '".$endereco->cep."',
      //     codCidade = ".$endereco->codCidade;

      // Executa o Script no BD.
              if($PDO_conex->query($sql)){

                  echo("Endereço Salvo. <br> <br>");

                  $sqlPegaId = "SELECT id FROM endereco ORDER BY endereco DESC LIMIT 1";

                  $select = $POD_conex->query($sql);

                  if($rs = $select->fetch(PDO::FETCH_ASSOC)){

                      $id = $rs['idEndereco'];

                      echo("Pegamos o id do endereço! ".$id."<br><br>");

                  }else{
                      echo("O id do endereço não voltou. <br> ".$sql." <br>");
                  }

              }else{
                  echo("Endereço não salvo. <br> ".$sql." <br>");
              }

              $conex->Desconectar();

              if(isset($id)){
                  return $id;
              }



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

 ?>
