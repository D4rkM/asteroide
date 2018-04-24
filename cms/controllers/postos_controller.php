<?php

/**
 *
 */
class controllerPostos{

  public function Novo(){
    $postos = new Postos();
    require_once('trata_imagem.php');

    $salvarimagem = SalvarImagem($_FILES['imagem']);
    //var_dump($_FILES['imagem']);
    if($salvarimagem == "false"){
      echo('Erro no uploade ');
    }else{
      $postos->imagem=$salvarimagem;
      $postos->nome=$_POST['txtnome'];
      $postos->localizacao=$_POST['txtlocalizacao'];
      $postos->texto=$_POST['txttexto'];
      $postos->logradouro=$_POST['txtlogradouro'];
      $postos->estado=$_POST['estado'];
      $postos->cidade=$_POST['id_cidade'];
      $frotas::Insert($frotas);
    }
  }

  public function Editar($idPosto){
    $postos = new Postos();

    $postos->id =$idPosto;
    $postos->nome=$_POST['txtnome'];
    $postos->imagem=$_POST['imagem'];
    $postos->localizacao=$_POST['txtlocalizacao'];
    $postos->texto=$_POST['txttexto'];
    $postos->estado=$_POST['estado'];

    $postos::Updadte($postos);
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
