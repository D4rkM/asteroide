<?php

class RegistroPassagem{

  public $id;
  public $origem;
  public $destino;
  public $num_poltrona;
  public $viagem_id;
  public $compra_id;

  public function __construct(){
    require_once('db_class.php');
  }

  public static function buscarPoltronas($viagem_id){
    // echo($viagem_id);
    $sql = "SELECT num_poltrona FROM registro_passagem WHERE viagem_id ='$viagem_id'";

    $conex = new Mysql_banco();
    $PDO_conex = $conex->Conectar();
    $select = $PDO_conex->query($sql);

    $cont = 0;

    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

      $registro_poltronas[] = new RegistroPassagem();
      $registro_poltronas[$cont]->num_poltrona = $rs['num_poltrona'];
      // $a = $cont - 1;
      // echo($cont." to ".$a);
      // echo($registro_poltronas[$cont]->num_poltrona."\n");
      $cont += 1;
    }

    $conex->Desconectar();

    // echo($registro_poltronas[$cont]->num_poltrona);
    if(isset($registro_poltronas)){
      // echo(sizeof($registro_poltronas));
      return $registro_poltronas;
    }

  }

}



?>
