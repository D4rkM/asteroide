<?php

  class Compra{

    public $id;
    public $qrcode;
    public $validacao_qrcode;
    public $id_usuario;
    public $posto_rodoviario_id;
    public $preco_passagem;
    public $local_compra_id;
    public $transacao_id;
    public $status;

    public function __construct(){
      require_once('db_class.php');
    }

    public static function registrarCompra($compra){

      $sql = "INSERT INTO compra
              SET validacao_qrcode = 0,
              id_usuario = '$compra->id_usuario',
              qrcode = '$compra->qrcode',
              preco_passagem = '$compra->preco_passagem',
              local_compra_id = '$compra->local_compra_id',
              status_compra = '$compra->status_compra',
              id_compra = '$compra->transacao_id'";

              //Instancia a classe do banco
             $conex = new Mysql_banco();

              //Chama o metodo para conectar no BD,
              //e guarda o retorno da conexao na variavel $PDO_conex

              $PDO_conex = $conex->Conectar();
              //Executa o script $sql no Banco de Dados
            if($PDO_conex->query($sql)){
              // echo('foi');

              $newSql = "SELECT id FROM compra ORDER BY id DESC LIMIT 1";

              $select = $PDO_conex->query($newSql);


              if($rs = $select->fetch(PDO::FETCH_ASSOC)){
                // echo('inseriu a compra');
                return $rs['id'];
              }

              // echo("<script> alert('Mensagem enviada com sucesso.'); </script>");
            }else{
              echo("Erro ao inserir compra $sql \n");
            }

              //Fecha a conexão com o Banco de Dados
                $conex->Desconectar();
            }

    }



 ?>
