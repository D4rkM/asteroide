<?php
  class Interacao{
    public $id;
    public $parada;
    public $ordem;
    public $pacote_viagem;

    public function __construct(){
      require_once('db_class.php');
    }

    public static function Insert($itinerario){
      $sql = "INSERT into itinerario SET id_parada='$itinerario->parada',
                                          ordem='$itinerario->ordem',
                                          id_pacote_viagem = '$itinerario->pacote_viagem'";
          // echo ($sql);die;
      $conex = new Mysql_db();
      $PDO_conex = $conex->Conectar();
      if($PDO_conex->query($sql))
        header('location:views/Usuario/interacao_usuario.php');
        else {
        echo("Erro ao inserir no banco de dados");
      $conex->Desconectar();
      }
    }

  }
 ?>
