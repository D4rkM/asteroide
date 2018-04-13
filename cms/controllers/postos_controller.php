<?php

/**
 *
 */
class controllerPostos{

  public function dateEmMysql($dateSql){
      $ano= substr($dateSql, 6);
      $mes= substr($dateSql, 3,-5);
      $dia= substr($dateSql, 0,-8);
      return $ano."-".$mes."-".$dia;
    }

  public function Novo(){
    require_once('trata_imagem.php');
    $postos = new Postos();

    $data = implode("-",array_reverse(explode("/",$_POST['txtdatainsercao'])));
    $postos->datainseri=$data;
    $postos->nome=$_POST['txtnome'];
    $postos->imagem = SalvarImagem($_FILES["imagem"]);
    $postos->localizacao=$_POST['txtlocalizacao'];
    $postos->texto=$_POST['txttexto'];
    $postos->estados=$_POST['estados'];

    $postos::Insert($postos);
  }

  public function Editar($idPosto){
    $postos = new Postos();

    $postos->id =$idPosto;
    $postos->datainseri=$_POST['txtdatainsercao'];
    $postos->nome=$_POST['txtnome'];
    $postos->imagem = SalvarImagem($_FILES["imagem"]);
    $postos->localizacao=$_POST['txtlocalizacao'];
    $postos->texto=$_POST['txttexto'];
    $postos->estados=$_POST['estados'];

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
