<?php
//session_start();

class controllerOnibus{
  public function Novo(){
    $onibus = new Onibus();

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

    $onibus->classe = $_POST['classe'];
    $onibus->placa = $_POST['txtplaca'];
    $onibus->numeros_poltronas = $_POST['txtpoltrona'];
    $onibus->km_rodado = $_POST['txtkmrodado'];
    $onibus->km_manutencao = $_POST['txtkmmanutencao'];
    $onibus->descricao = $_POST['txtdesc'];
    $onibus->status_manutencao = $_POST['txtstatus'];
    $onibus->imagem = $diretorio_completo;
    $onibus::Insert($onibus);

  }


  public function Editar(){
    $onibus = new Onibus();
    // $nada ="false";

    require_once('trata_imagem.php');

    $idOnibus=$_GET['id'];

    echo $idOnibus;

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
    $onibus->id = $idOnibus;
    $onibus->classe = $_POST['classe'];
    $onibus->placa = $_POST['txtplaca'];
    $onibus->numeros_poltronas = $_POST['txtpoltrona'];
    $onibus->km_rodado = $_POST['txtkmrodado'];
    $onibus->km_manutencao = $_POST['txtkmmanutencao'];
    $onibus->descricao = $_POST['txtdesc'];
    $onibus->status_manutencao = $_POST['txtstatus'];
    $onibus->imagem = $foto;


    $onibus::Update($onibus);
  }


    public function Excluir(){
      $idOnibus = $_GET['id'];

      $onibus = new Onibus();

      $onibus->id = $idOnibus;

      $onibus::Delete($onibus);
    }

    public function Buscar($id){

      $onibus = new Onibus();

      $onibus->id = $id;

      return $dadosOnibus= $onibus::SelectById($onibus);

    }

    public function Listar(){

      $onibus = new Onibus();

      return $onibus::Select();

    }

}


 ?>
