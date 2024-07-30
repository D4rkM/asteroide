<?php

  Class DadosViagem{

    public $id;
    public $origem;
    public $classe;
    public $destino;
    public $data_saida;
    public $data_chegada;
    public $hora_saida;
    public $hora_chegada;
    public $km;
    public $endereco_saida;
    public $endereco_chegada;
    public $img;
    public $preco;
    public $poltronas;

    public function __construct(){
      require_once('db_class.php');
    }

    public static function buscarViagens($pesquisa){

      $pesquisa->origem = substr($pesquisa->origem, 0,strpos($pesquisa->origem, ' -'));
      $pesquisa->destino = substr($pesquisa->destino, 0,strpos($pesquisa->destino, ' -'));
      // echo($pesquisa->origem.'/'.$pesquisa->destino);

      $sql = "SELECT * FROM view_lista_todas_as_viagens
              WHERE origem LIKE '$pesquisa->origem%'
              AND destino LIKE '$pesquisa->destino%';";

      $conex = new Mysql_banco();

      $PDO_conex = $conex->Conectar();

      //executa select no bd e guarda o retorno na variavel $select
      $select = $PDO_conex->query($sql);

      $cont = 0;

      $listaViagem[] = new DadosViagem();
      while($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listaViagem[$cont]->id = $rs['id'];
        $listaViagem[$cont]->origem = $rs['origem'];
        $listaViagem[$cont]->destino = $rs['destino'];
        $listaViagem[$cont]->data_saida = $rs['data_saida'];
        $listaViagem[$cont]->data_chegada = $rs['data_chegada'];
        $listaViagem[$cont]->hora_saida = $rs['hora_saida'];
        $listaViagem[$cont]->hora_chegada = $rs['hora_chegada'];
        $listaViagem[$cont]->endereco_saida = $rs['endereco_saida'];
        $listaViagem[$cont]->endereco_chegada = $rs['endereco_chegada'];
        $listaViagem[$cont]->km = $rs['km'];
        $listaViagem[$cont]->img = $rs['img'];
        $listaViagem[$cont]->classe = $rs['classe'];
        $listaViagem[$cont]->preco = $rs['preco'];
        $listaViagem[$cont]->poltronas = $rs['poltronas'];

        $cont+=1;
      }
      //Fecha a conexão com o Banco de Dados
      $conex->Desconectar();
      return $listaViagem;

    }

    public static function buscarPorId($idViagem){


      $sql = "SELECT * FROM view_lista_todas_as_viagens
              WHERE id =".$idViagem;

      $conex = new Mysql_banco();

      $PDO_conex = $conex->Conectar();

      //executa select no bd e guarda o retorno na variavel $select
      $select = $PDO_conex->query($sql);

      $cont = 0;

      if($rs=$select->fetch(PDO::FETCH_ASSOC)){
      $listaViagem = new DadosViagem();

        $listaViagem->id = $rs['id'];
        $listaViagem->origem = $rs['origem'];
        $listaViagem->destino = $rs['destino'];
        $listaViagem->data_saida = $rs['data_saida'];
        $listaViagem->data_chegada = $rs['data_chegada'];
        $listaViagem->hora_saida = $rs['hora_saida'];
        $listaViagem->hora_chegada = $rs['hora_chegada'];
        $listaViagem->endereco_saida = $rs['endereco_saida'];
        $listaViagem->endereco_chegada = $rs['endereco_chegada'];
        $listaViagem->km = $rs['km'];
        $listaViagem->img = $rs['img'];
        $listaViagem->classe = $rs['classe'];
        $listaViagem->preco = $rs['preco'];
        $listaViagem->poltronas = $rs['poltronas'];

      }
      //Fecha a conexão com o Banco de Dados
      $conex->Desconectar();
      if(isset($listaViagem)){
        return $listaViagem;

      }

    }



  }





 ?>
