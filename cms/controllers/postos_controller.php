<?php

/**
 *
 */
class controllerPostos{

  public function Novo(){
    $postos = new Postos();
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

      $postos->imagem=$diretorio_completo;
      $postos->nome=$_POST['txtnome'];
      $postos->localizacao=$_POST['txtlocalizacao'];
      $postos->texto=$_POST['txttexto'];
      $postos->logradouro=$_POST['txtlogradouro'];
      $postos->estado=$_POST['estado'];
      $postos::Insert($postos);
    }


  public function Editar(){
    $postos = new Postos();

    require_once('trata_imagem.php');

     $idPosto=$_GET['id'];
    //  $idEstado=$_GET['id'];

    // echo $idPosto;

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

    $postos->id =$idPosto;
    $postos->nome=$_POST['txtnome'];
    $postos->imagem=$foto;
    $postos->localizacao=$_POST['txtlocalizacao'];
    $postos->texto=$_POST['txttexto'];
    $postos->estado=$_POST['estado'];

    $postos::Update($postos);
  }

  public function Excluir(){
    $idPosto = $_GET['id'];
    $postos = new Postos();
    $postos->id = $idPosto;
    $postos::Delete($postos);

  }

  public function Buscar($id){
    $postos = new Postos();
    $postos->id = $id;
    return $dadosPostos= $postos::SelectById($postos);
  }

  public function Listar(){

    $postos = new Postos();

    return $postos::Select();

  }
}

 ?>
