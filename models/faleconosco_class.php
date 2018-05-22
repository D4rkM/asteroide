<?php
class Faleconosco{

  public $id;
  public $reclamacao;
  public $sugestao;
  public $elogio;
  public $email;

  public function __construct(){
    require_once('db_class.php');
  }

  public static function Insert ($faleconosco_dados){

    $sql ="insert into fale_conosco set reclamacoes='$faleconosco_dados->reclamacao',
                                           sugestao='$faleconosco_dados->sugestao',
                                           elogios='$faleconosco_dados->elogio',
                                           email='$faleconosco_dados->email';";
                                           echo ($sql);die;
      //echo($sql_usuario);die;
    //Instancia a classe do banco
   $conex = new Mysql_db();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql))

    echo("<script> alert('Mensagem enviada com sucesso.'); </script>");
    else
       echo("Erro ao inserir no BD");

    //Fecha a conexão com o Banco de Dados
      $conex->Desconectar();
  }

}
 ?>
