<?php
class controllerEstadosPostos{

  public function dateEmMysql($dateSql){
      $ano= substr($dateSql, 6);
      $mes= substr($dateSql, 3,-5);
      $dia= substr($dateSql, 0,-8);
      return $ano."-".$mes."-".$dia;
    }

  public function Novo(){
    $estados_postos = new EstadosPostos();

    $data = implode("-",array_reverse(explode("/",$_POST['txtdatainsercao'])));
    $estados_postos->datainseri=$data;
    $estados_postos->estado=$_POST['txtestado'];

    $estados_postos::Insert($estados_postos);
  }

  public function Editar(){

  }

  public function Excluir(){

  }

  public function Buscar(){

  }

  public function Listar(){

  }
}
 ?>
