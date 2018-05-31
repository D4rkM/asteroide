<?php
class Acompanhamento{

  public $id;
  public $latitude_onibus;
  public $longitude_onibus;
  public $data_registro;
  public $status_viagem_id;
  public $viagem_id;

  public function __construct(){
    require_once('db_class.php');
    // $conex = new Mysql();
  }

  public function Select(){
    $sql = "select * from historico_viagem order by id desc";

    $conex = new Mysql_db();
    $PDO_conex = $conex->Conectar();
    //executa select no bd e guarda o retorno na variavel $select
    $select = $PDO_conex->query($sql);

    $cont = 0;
    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $listAcompanha[] = new Acompanhamento();

      $listAcompanha[$cont]->id = $rs['id'];
      $listAcompanha[$cont]->latitude = $rs['latitude_onibus'];
      $listAcompanha[$cont]->longetude = $rs['logitude_onibus'];
      $listAcompanha[$cont]->data = $rs['data_registro'];
      $listAcompanha[$cont]->status = $rs['status_viagem_id'];
      $listAcompanha[$cont]->viagem = $rs['viagem_id'];

      $cont+=1;
    }
    $conex->Desconectar();
    if(isset($listAcompanha))
        return $listAcompanha;
  }
}
 ?>
