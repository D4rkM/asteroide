<?php
  class Filtro{
    public $id;
    public $origem;
    public $destino;
    public $ida;
    public $volta;
    public $duracao;
    public $classe;
    public $preco;

    public function SelectById($filtro_dados){
      //$sql = "select idpacote_viagem='$filtro_dados->origem', idpacote_viagem='$filtro_dados->destino', previsto_saida='$filtro_dados->ida', from viagem where id = $filtro_dados->id";

      $conex = new Mysql_banco();

      $PDO_conex = $conex->Conectar();

      $select = $PDO_conex->query($sql);

      if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $filtro = new Filtro();

        $filtro->id = $rs['id'];
        $filtro->origem = $rs['idpacote_viagem'];
        $filtro->destino = $rs['idpacote_viagem'];
        $filtro->ida = $rs['previsto_saida'];

        $conex->Desconectar();
      }
    }
    public function Select($filtro_dados){
      //$sql="select * from viagem where idpacote_viagem like '%$filtro_dados->origem%', idpacote_viagem like '%$filtro_dados->destino%', previsto_saida like '%$filtro_dados->ida%'";
      // $sql = "select * from viagem order by id desc";

      $conex = new Mysql_banco();

      $PDO_conex = $conex->Conectar();

      //executa select no bd e guarda o retorno na variavel $select
      $select = $PDO_conex->query($sql);

      $cont = 0;

      while($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listFiltro[] = new Filtro();

        $listFiltro[$cont]->id = $rs['id'];
        $listFiltro[$cont]->origem = $rs[''];
        $listFiltro[$cont]->destino = $rs[''];
        $listFiltro[$cont]->ida = $rs[''];
        $listFiltro[$cont]->volta = $rs[''];
        $listFiltro[$cont]->duracao = $rs[''];
        $listFiltro[$cont]->classe = $rs[''];
        $listFiltro[$cont]->preco = $rs[''];

        $cont+=1;
      }

      $conex->Desconectar();

      if(isset($listFiltro))
          return $listFiltro;
    }
  }
 ?>
