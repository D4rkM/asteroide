<?php

/**
 *
 */
class controllerPostosRodoviarios{

  public function Novo(){
    $postos_rodoviarios = new PostosRodoviarios();

    $postos_rodoviarios->nome=$_POST['nome'];
    $postos_rodoviarios->imagem=$_POST['imagem'];
    $postos_rodoviarios->cep=$_POST['cep'];
    $postos_rodoviarios->logradouro=$_POST['logradouro'];
    $postos_rodoviarios->numero=$_POST['numero'];
    $postos_rodoviarios->bairro=$_POST['bairro'];
    $postos_rodoviarios->cidade=$_POST['cidade'];

    $postos_rodoviarios::Insert($postos_rodoviarios);
  }

  public function Editar($idPostoRodoviario){
    $postos = new PostosRodoviarios();

    $postos->id =$idPostoRodoviario;
    $postos_rodoviarios->nome=$_POST['nome'];
    $postos_rodoviarios->imagem=$_POST['imagem'];
    $postos_rodoviarios->cep=$_POST['cep'];
    $postos_rodoviarios->logradouro=$_POST['logradouro'];
    $postos_rodoviarios->numero=$_POST['numero'];
    $postos_rodoviarios->bairro=$_POST['bairro'];
    $postos_rodoviarios->cidade=$_POST['cidade'];

    $postos_rodoviarios::Updadte($postos_rodoviarios);
  }

  public function Excluir(){
    $idPostoRodoviario = $_GET['id'];
    $postos_rodoviarios = new Postos();
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
