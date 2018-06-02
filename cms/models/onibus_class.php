<?php
    class Onibus{
      public $id;
      public $poltronas;
      public $km;
      public $classe;
      public $placa;
      public $status;
      public $codigo;

      public function __construct(){
        require_once('db_class.php');
      }

      public function Insert ($onibus_dados){

        $sql = "insert into onibus set poltronas='$onibus_dados->poltronas',
                                       km_rodado='$onibus_dados->km',
                                       id_classe='$onibus_dados->classe',
                                       placa='$onibus_dados->placa',
                                       status_onibus_id='$onibus_dados->status',
                                       cod_antt='$onibus_dados->codigo';";
     // echo($sql);die;
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
      $sql = "update onibus set poltronas='$onibus_dados->poltronas',
                                     km_rodado='$onibus_dados->km',
                                     id_classe='$onibus_dados->classe',
                                     placa='$onibus_dados->placa',
                                     status_onibus_id='$onibus_dados->status',
                                     cod_antt='$onibus_dados->codigo' where id=$onibus_dados->id;";

                                     // echo $sql;die;

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

        $sql = "select o.*, so.status, c.tipo_classe
        from onibus as o, status_onibus as so, classe as c
        where o.status_onibus_id = so.id and o.id_classe = c.id";
        $conex = new Mysql_db();

        $PDO_conex = $conex->Conectar();

        //executa select no bd e guarda o retorno na variavel $select
        $select = $PDO_conex->query($sql);

        $cont = 0;

        while($rs=$select->fetch(PDO::FETCH_ASSOC)){

          $listOnibus[] = new Onibus();

          $listOnibus[$cont]->id = $rs['id'];
          $listOnibus[$cont]->poltronas = $rs['poltronas'];
          $listOnibus[$cont]->km = $rs['km_rodado'];
          $listOnibus[$cont]->classe = $rs['tipo_classe'];
          $listOnibus[$cont]->placa = $rs['placa'];
          $listOnibus[$cont]->status = $rs['status'];
          $listOnibus[$cont]->codigo = $rs['cod_antt'];

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
          $onibus->poltronas = $rs['poltronas'];
          $onibus->km = $rs['km_rodado'];
          $onibus->classe = $rs['id_classe'];
          $onibus->placa = $rs['placa'];
          $onibus->status = $rs['status_onibus_id'];
          $onibus->codigo = $rs['cod_antt'];

          $conex->Desconectar();

        }
        if(isset($onibus))
          return $onibus;
      }


    }

 ?>
