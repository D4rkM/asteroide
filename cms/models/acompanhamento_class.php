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
    $sql = "select hv.*,sv.status from historico_viagem as hv, status_viagem as sv where hv.status_viagem_id= sv.id order by id;";

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
      $listAcompanha[$cont]->status = $rs['status'];
      $listAcompanha[$cont]->viagem = $rs['viagem_id'];

      $cont+=1;
    }
    $conex->Desconectar();
    if(isset($listAcompanha))
        return $listAcompanha;
  }
}
 ?>
