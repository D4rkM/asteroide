<?php
  class Interacao{
    public $id;
    public $id_parada;
    public $ordem;
    public $id_pacote_viagem;

    public function __construct(){
      require_once('db_class.php');
    }

    public static function Insert($itinerario){
      $sql = "INSERT into itinerario
      SET id='$itinerario->id',
          id_parada='$itinerario->id_parada',
          ordem='$itinerario->ordem',
          id_pacote_viagem = '$itinerario->id_pacote_viagem'";
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

    public function SelectById($pacote_id){
      // $sql = "select * from interacao
      //as i, cliente as c where i.id_usuario=c.id;";
      $sql = "SELECT * FROM itinerario WHERE id_pacote_viagem = '$pacote_id' order by id;";

      $conex = new Mysql_db();

      $PDO_conex = $conex->Conectar();

      //executa select no bd e guarda o retorno na variavel $select
      $select = $PDO_conex->query($sql);

      $cont = 0;

      while($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listInteracao[] = new Interacao();

        $listInteracao[$cont]->id = $rs['id'];
        $listInteracao[$cont]->comentario = $rs['comentario'];
        $listInteracao[$cont]->imagem = $rs['imagem'];
        $listInteracao[$cont]->local = $rs['nome_local'];
        $listInteracao[$cont]->id_usuario = $rs['id_usuario'];
        $listInteracao[$cont]->ativo = $rs['ativar'];

        $cont+=1;
      }
      // header('location:views/Interacao/pagina_lista_interacao.php');
      $conex->Desconectar();

      if(isset($listInteracao))
          return $listInteracao;
    }
    /*Ativar o registro no BD*/
  public function AtivarPorId($interacao_dados){
    //$sql1 = "UPDATE tbl_unidade set status=0";
    $sql = "UPDATE interacao set ativar=1 WHERE id=".$interacao_dados->id;
    //Instancio o banco e crio uma variavel
    $conex = new Mysql_db();
    /*Chama o método para conectar no banco de dados e guarda o retorno da conexao
    na variavel que $PDO_conex*/
    $PDO_conex = $conex->Conectar();
    //Executa o script no banco de dados
    if($PDO_conex->query($sql)){
    //Se der true redireciona a tela
      header('location:views/Interacao/pagina_lista_interacao.php');
    }else {
    //Mensagem de erro
    echo "Error atualizar no Banco de Dados";
    }
    //Fecha a conexão com o banco de dados
    echo($sql);
    $conex->Desconectar();
  }
  /*Desativar o registro no BD*/
  public function DesativarPorId($interacao_dados){
    //$sql1 = "UPDATE tbl_unidade set status=0";
    $sql = "UPDATE interacao set ativar=0 WHERE id=".$interacao_dados->id;
    //Instancio o banco e crio uma variavel
    $conex = new Mysql_db();
    /*Chama o método para conectar no banco de dados e guarda o retorno da conexao
    na variavel que $PDO_conex*/
    $PDO_conex = $conex->Conectar();
    //Executa o script no banco de dados
    if($PDO_conex->query($sql)){
    //Se der true redireciona a tela
    echo($sql);
    header('location:views/Interacao/pagina_lista_interacao.php');

    }else {
    //Mensagem de erro
    echo "Error atualizar no Banco de Dados";
    //echo($sql);
    }
    //Fecha a conexão com o banco de dados
    $conex->Desconectar();
  }
  }
 ?>
