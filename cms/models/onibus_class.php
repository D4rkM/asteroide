<?php
    class Onibus{
      public $id;
      public $placa;
      public $numeros_poltronas;
      public $km_rodado;
      public $status_manutencao;
      public $descricao;
      public $imagem;
      public $classe;
      public $km_manutencao;

      public function __construct(){
        require_once('db_class.php');
      }

      public function Insert ($onibus_dados){

        $sql = "insert into onibus set placa='$onibus_dados->placa',
                                      numeros_poltronas='$onibus_dados->numeros_poltronas',
                                      km_rodado='$onibus_dados->km_rodado',
                                      km_manutencao='$onibus_dados->km_manutencao',
                                      status_manutencao='$onibus_dados->status_manutencao',
                                      imagem='$onibus_dados->imagem',
                                      id_classe='$onibus_dados->classe',
                                      descricao='$onibus_dados->descricao';";

     // echo($sql);
      $conex = new Mysql_db();

      $PDO_conex = $conex->Conectar();

      //Executa o script $sql no Banco de Dados
      if($PDO_conex->query($sql))
          header('location:index.php');
      else
          echo("Erro ao inserir no BD");

      //Fecha a conexão com o Banco de Dados
      $conex->Desconectar();

      }

      public function Update($onibus_dados){


        // echo $onibus_dados->salvarimagem;
    if( $onibus_dados->imagem == "nada"){
      $sql = "update onibus set placa='$onibus_dados->placa',
                                    numeros_poltronas='$onibus_dados->numeros_poltronas',
                                    km_rodado='$onibus_dados->km_rodado',
                                    km_manutencao='$onibus_dados->km_manutencao',
                                    status_manutencao='$onibus_dados->status_manutencao',
                                    id_classe='$onibus_dados->classe',
                                    km_manutencao='$onibus_dados->km_manutencao',
                                    descricao='$onibus_dados->descricao' where id=$onibus_dados->id;";



    }else{

      $sql = "update onibus set placa='$onibus_dados->placa',
                                    numeros_poltronas='$onibus_dados->numeros_poltronas',
                                    km_rodado='$onibus_dados->km_rodado',
                                    km_manutencao='$onibus_dados->km_manutencao',
                                    status_manutencao='$onibus_dados->status_manutencao',
                                    km_manutencao='$onibus_dados->km_manutencao',
                                    id_classe='$onibus_dados->classe',
                                    imagem='$onibus_dados->imagem',
                                    descricao='$onibus_dados->descricao' where id=$onibus_dados->id;";

    }
    echo $sql;

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

        // Fecha a conexão com o Banco de Dados
        $conex->Desconectar();
      }

      public function Delete($onibus_dados){
        $sql = "delete from onibus where id = $onibus_dados->id";

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

        $sql = "select * from onibus order by id desc";
        $conex = new Mysql_db();

        $PDO_conex = $conex->Conectar();

        //executa select no bd e guarda o retorno na variavel $select
        $select = $PDO_conex->query($sql);

        $cont = 0;

        while($rs=$select->fetch(PDO::FETCH_ASSOC)){

          $listOnibus[] = new Onibus();

          $listOnibus[$cont]->id = $rs['id'];
          $listOnibus[$cont]->placa = $rs['placa'];
          $listOnibus[$cont]->numeros_poltronas = $rs['numeros_poltronas'];
          $listOnibus[$cont]->status_manutencao = $rs['status_manutencao'];
          $listOnibus[$cont]->km_manutencao = $rs['km_manutencao'];
          $listOnibus[$cont]->km_rodado = $rs['km_rodado'];
          $listOnibus[$cont]->classe = $rs['id_classe'];
          $listOnibus[$cont]->imagem = $rs['imagem'];
          $listOnibus[$cont]->descricao = $rs['descricao'];

          $cont+=1;
        }

        $conex->Desconectar();

        if(isset($listOnibus))
            return $listOnibus;

      }

      public function SelectById($onibus_dados){

        $sql = "select * from onibus where id = $onibus_dados->id";

        $conex = new Mysql_db();

        $PDO_conex = $conex->Conectar();

        $select = $PDO_conex->query($sql);

        if($rs=$select->fetch(PDO::FETCH_ASSOC)){

          $onibus = new Onibus();

          $onibus->id = $rs['id'];
          $onibus->placa = $rs['placa'];
          $onibus->numeros_poltronas = $rs['numeros_poltronas'];
          $onibus->status_manutencao = $rs['status_manutencao'];
          $onibus->km_manutencao = $rs['km_manutencao'];
          $onibus->km_rodado = $rs['km_rodado'];
          $onibus->descricao = $rs['descricao'];
          $onibus->classe = $rs['id_classe'];
          $onibus->imagem = $rs['imagem'];

          $conex->Desconectar();


        }
        if(isset($onibus))
          return $onibus;
      }


    }

 ?>
