<?php
session_start();
/*
Autor:bruna
Data de Modificação:14/04/2018
Controller:sobre a empresa
Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
 */
class controllerSobreEmpresa{

  public function Novo(){
    $sobre_empresa = new SobreEmpresa();

    $sobre_empresa->titulo1 = $_POST['txttitulo1'];
    $sobre_empresa->texto1 = $_POST['txttexto1'];
    $sobre_empresa->titulo2 = $_POST['txttitulo2'];
    $sobre_empresa->texto2 = $_POST['txttexto2'];
    $sobre_empresa->imagem = $_POST['imagem'];
    $sobre_empresa->icon1 = $_POST['icon1'];
    $sobre_empresa->detalhes1 = $_POST['txtdetalhes1'];
    $sobre_empresa->icon2 = $_POST['icon2'];
    $sobre_empresa->detalhes2 = $_POST['txtdetalhes2'];
    $sobre_empresa->icon3 = $_POST['icon3'];
    $sobre_empresa->detalhes3 = $_POST['txtdetalhes3'];
    $sobre_empresa->icon4 = $_POST['icon4'];
    $sobre_empresa->detalhes4 = $_POST['txtdetalhes4'];

    $sobre_empresa::Insert($sobre_empresa);
  }

  public function Editar($idAlterar){

    $sobre_empresa = new SobreEmpresa();

    $sobre_empresa->id = $idAlterar;
    $sobre_empresa->datainseri = $_POST['txtdatainsercao'];
    $sobre_empresa->imagem1 = $_POST["imagem1"];
    $sobre_empresa->titulo1 = $_POST['txttitulo1'];
    $sobre_empresa->subtitulo = $_POST['txtsubtitulo'];
    $sobre_empresa->texto1 = $_POST['txttexto1'];
    $sobre_empresa->imagem2 = $_POST["imagem2"];
    $sobre_empresa->titulo2 = $_POST["txttitulo2"];
    $sobre_empresa->texto2 = $_POST['txttexto2'];
    $sobre_empresa->icon1 = $_POST["icon1"];
    $sobre_empresa->detalhes1 = $_POST['txtdetalhes1'];
    $sobre_empresa->icon2 = $_POST["icon2"];
    $sobre_empresa->detalhes2 = $_POST['txtdetalhes2'];
    $sobre_empresa->icon3 = $_POST["icon3"];
    $sobre_empresa->detalhes3 = $_POST['txtdetalhes3'];
    $sobre_empresa->icon4 = $_POST["icon3"];
    $sobre_empresa->detalhes4 = $_POST['txtdetalhes3'];

    $sobre_empresa::Update($sobre_empresa);
  }

  public function Excluir(){

    $sobre_empresa = new SobreEmpresa();

    $idEmpresa = $_GET['id'];
    $sobre_empresa->id = $idEmpresa;

    $sobre_empresa::Delete($sobre_empresa);
  }

  public function Buscar($id){

    $sobre_empresa = new SobreEmpresa();

    $sobre_empresa->id = $id;

    return $sobre_empresa_dados= $sobre_empresa::SelectById($sobre_empresa);
  }

  public function Listar(){

    $sobre_empresa = new SobreEmpresa();

    return $sobre_empresa::Select();
  }
}

 ?>
