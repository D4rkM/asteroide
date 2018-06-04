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
      // echo("jooj");
      // echo($registro_poltronas);
      return $registro_poltronas;
    }

  }

  public static function registrarPoltrona($compra_id, $num_poltrona, $viagem_id){

    $sql = "INSERT INTO registro_passagem
            SET num_poltrona = '$num_poltrona',
                compra_id = '$compra_id',
                viagem_id ='$viagem_id'";


    //Instancia a classe do banco
    $conex = new Mysql_banco();

    //Chama o metodo para conectar no BD,
    //e guarda o retorno da conexao na variavel $PDO_conex
    $PDO_conex = $conex->Conectar();

    //Executa o script $sql no Banco de Dados
    if($PDO_conex->query($sql)){
    // echo('foi');

      // echo('inseriu poltrona');
      // return $sql;


    // echo("<script> alert('Mensagem enviada com sucesso.'); </script>");
    }else{
    echo("Erro ao inserir registro de passagem:  $sql  \n");
    }

    //Fecha a conexão com o Banco de Dados
    $conex->Desconectar();

  }

}



?>
