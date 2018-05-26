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

      $sql = "SELECT * FROM view_lista_todas_as_viagens
              WHERE origem LIKE '%$pesquisa->origem%'
              AND destino LIKE '%$pesquisa->destino%'
              AND data_saida LIKE '%$pesquisa->data_saida%';";

      $conex = new Mysql_db();
      
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
      return $listaViagem;

    }



  }





 ?>
