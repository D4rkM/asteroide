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

    public static function Update($itinerario){
      $sql = "INSERT into itinerario SET id_parada='$itinerario->parada',
                                          ordem='$itinerario->ordem',
                                          id_pacote_viagem = '$itinerario->pacote_viagem'
                                          where id=$itinerario->id";
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
    public function Delete($itinerario){
      $sql = "delete from itinerario where id = $itinerario->id";
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
      $sql = "select * from itinerario order by id desc";
      $conex = new Mysql_db();
      $PDO_conex = $conex->Conectar();
      //executa select no bd e guarda o retorno na variavel $select
      $select = $PDO_conex->query($sql);
      $cont = 0;
      while($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listItinerario[] = new Frotas();
        $listItinerario[$cont]->id = $rs['id'];
        $listItinerario[$cont]->parada = $rs['id_parada'];
        $listItinerario[$cont]->ordem = $rs['ordem'];
        $listItinerario[$cont]->pacote_viagem = $rs['id_pacote_viagem'];

        $cont+=1;
      }
      $conex->Desconectar();
      if(isset($listItinerario))
          return $listItinerario;
    }
    public function SelectById($itinerario){
      $sql = "select * from itinerario where id = $itinerario->id";

      $conex = new Mysql_db();

      $PDO_conex = $conex->Conectar();

      $select = $PDO_conex->query($sql);

      if($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $itinerario = new Itinerario();

        $itinerario->id = $rs['id'];
        $itinerario->parada = $rs['id_parada'];
        $itinerario->ordem = $rs['ordem'];
        $itinerario->pacote_viagem = $rs['id_pacote_viagem'];

        $conex->Desconectar();

      }
      if(isset($itinerario))
        return $itinerario;
    }
  }
 ?>
