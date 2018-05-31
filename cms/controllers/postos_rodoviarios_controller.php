<?php

class controllerPostosRodoviarios{

  public function Novo($id_endereco){
    $postos_rodoviarios = new PostosRodoviarios();

    $postos_rodoviarios->nome=$_POST['nome'];
    $postos_rodoviarios->id_endereco=$id_endereco;

    $postos_rodoviarios::Insert($postos_rodoviarios);
  }

  public function Editar($idPostoRodoviario){
    $postos = new PostosRodoviarios();

    $postos_rodoviarios->nome=$_POST['nome'];
    $postos_rodoviarios->id_endereco=$id_endereco;

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
