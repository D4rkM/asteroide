<?php
/*
    Autor:Bruna
    Data de Modificação:25/04/2018
    Controller:Vendas
    Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
*/
class controllerVendas{

  public function dateEmMysql($dateSql){
    $ano= substr($dateSql, 6);
    $mes= substr($dateSql, 3,-5);
    $dia= substr($dateSql, 0,-8);
    return $ano."-".$mes."-".$dia;
  }

  public function Novo(){
    $vendas = new Vendas();
    require_once('trata_imagem.php');

    // iniciado variaveis
     $diretorio_completo=Null;
     $MovUpload=false;
     $imagem_file=Null;

    //pegando a foto
       if (!empty($_FILES['imagem']['name'])) {
          $imagem_file = true;
          $diretorio_completo=salvarFoto($_FILES['imagem'],'arquivo');
          if ($diretorio_completo == "Erro") {
                $MovUpload=false;
          }else {
            $MovUpload=true;
          }
        }else {
          $imagem_file = false;
        }
    $vendas->imagem = $diretorio_completo;
    $vendas->destino = $_POST['txtdestino'];
    $data = implode("-",array_reverse(explode("/",$_POST['txtdata'])));
    $vendas->data = $data;
    $vendas->hora = $_POST['txthoras'];
    $vendas->descricao = $_POST['txtdescricao'];
    $vendas->partida = $_POST['partida'];
    $vendas->chegada = $_POST['chegada'];
    $vendas->onibus = $_POST['onibus'];
    $vendas->parada = $_POST['parada'];
    $vendas->motorista = $_POST['motorista'];
    $vendas->valor = $_POST['txtvalor'];

    $vendas::Insert($vendas);

  }


  public function Editar($idVendas){

    $vendas = new Vendas();
    require_once('trata_imagem.php');

    // iniciado variaveis
     $diretorio_completo=Null;
     $MovUpload=false;
     $imagem_file=Null;
     $foto="nada";

    //pegando a foto
       if (!empty($_FILES['imagem']['name'])) {
          $imagem_file = true;
          $diretorio_completo=salvarFoto($_FILES['imagem'],'arquivo');
          if ($diretorio_completo == "Erro") {
                $MovUpload=false;
          }else {
            $MovUpload=true;
          }
        }else {
          $imagem_file = false;
        }

        if ($imagem_file == true && $MovUpload==true) {
         $foto =$diretorio_completo;
       }else {
         $foto="nada";
       }

    // $onibus->imagem = $salvarimagem;
    $vendas->id = $idVendas;
    $vendas->imagem = $foto;
    $vendas->imagem = $diretorio_completo;
    $vendas->destino = $_POST['txtdestino'];
    $vendas->data = $_POST['txtdata'];
    $vendas->hora = $_POST['txthoras'];
    $vendas->descricao = $_POST['txtdescricao'];
    $vendas->partida = $_POST['partida'];
    $vendas->chegada = $_POST['chegada'];
    $vendas->onibus = $_POST['onibus'];
    $vendas->parada = $_POST['parada'];
    $vendas->motorista = $_POST['motorista'];
    $vendas->valor = $_POST['txtvalor'];


    $vendas::Update($vendas);
  }


    public function Excluir(){
      $idVendas = $_GET['id'];

      $vendas = new Vendas();

      $vendas->id = $idVendas;

      $vendas::Delete($vendas);
    }

    public function Buscar($id){

      $vendas = new Vendas();

      $vendas->id = $id;

      return $dadosVendas= $vendas::SelectById($vendas);

    }

    public function Listar(){

      $vendas = new Vendas();

      return $vendas::Select();

    }

}


 ?>
