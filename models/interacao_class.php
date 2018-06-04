<?php
  class Interacao{
    public $id;
    public $comentario;
    public $imagem;
    public $local;

    public function __construct(){
      require_once('db_class.php');
    }

    public static function Insert($interacao_dados){
      $sql = "insert into interacao set comentario='$interacao_dados->comentario',
                                        img='$interacao_dados->imagem',
                                        nome_local='$interacao_dados->local',
                                        id_usuario = '$interacao_dados->id_usuario',
                                        aparecer=1;";
                                        echo ($sql);die;

      $conex = new Mysql_banco();
      $PDO_conex = $conex->Conectar();
      if($PDO_conex->query($sql))
        header('location:views/Usuario/interacao_usuario.php');
        else {
        echo("Erro ao inserir no banco de dados");
      $conex->Desconectar();
      }
    }

    public function Select(){
      $sql = "select * from interacao as i, cliente as c where i.id_usuario=c.id;";

      $conex = new Mysql_banco();

      $PDO_conex = $conex->Conectar();

      //executa select no bd e guarda o retorno na variavel $select
      $select = $PDO_conex->query($sql);

      $cont = 0;

      while($rs=$select->fetch(PDO::FETCH_ASSOC)){

        $listInteracao[] = new Interacao();

        $listInteracao[$cont]->id = $rs['id'];
        $listInteracao[$cont]->comentario = $rs['comentario'];
        $listInteracao[$cont]->imagem = $rs['img'];
        $listInteracao[$cont]->local = $rs['nome_local'];
        $listInteracao[$cont]->nome_usuario = $rs['nome'];
        $listInteracao[$cont]->imagem_usuario = $rs['imagem_usuario'];
        $listInteracao[$cont]->ativo = $rs['aparecer'];

        $cont+=1;
      }

      $conex->Desconectar();

      if(isset($listInteracao))
          return $listInteracao;
    }
  }
 ?>
