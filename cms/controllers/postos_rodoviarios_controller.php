<?php

class controllerPostosRodoviarios{

  public function Novo($id_endereco){
    $postos_rodoviarios = new PostosRodoviarios();

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

    $postos_rodoviarios->imagem=$diretorio_completo;
    $postos_rodoviarios->nome=$_POST['nome'];
    $postos_rodoviarios->id_endereco=$id_endereco;

    $postos_rodoviarios::Insert($postos_rodoviarios);
  }

  public function Editar($idPostoRodoviario){
    $postos = new PostosRodoviarios();

  

    $postos_rodoviarios::Updadte($postos_rodoviarios);
  }

  public function Excluir(){
    $idPostoRodoviario = $_GET['id'];
    $postos_rodoviarios = new PostosRodoviarios();
    $postos_rodoviarios->id = $idPostoRodoviario;
    $postos_rodoviarios::Delete($postos_rodoviarios);

  }

  public function Buscar($id){
    $postos_rodoviarios = new PostosRodoviarios();
    $postos_rodoviarios->id = $id;
    return $dadosPostosRodoviarios= $postos_rodoviarios::SelectById($postos_rodoviarios);
  }

  public function Listar(){

    $postos_rodoviarios = new PostosRodoviarios();

    return $postos_rodoviarios::Select();

  }
}

 ?>
