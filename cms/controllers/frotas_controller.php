<?php
session_start();
/*
Autor:bruna
Data de Modificação:14/04/2018
Controller:Frotas
Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
 */
class controllerFrotas{


  public function Novo(){
    $frotas = new Frotas();
    require_once('trata_imagem.php');

    $salvarimagem = SalvarImagem($_FILES['imagem']);
    //var_dump($_FILES['imagem']);
    if($salvarimagem == "false"){
      echo('Erro no uploade ');
    }else{
      $frotas->imagem=$salvarimagem;
      $frotas->nome=$_POST['txtnome'];
      $frotas::Insert($frotas);
    }
  //   if($_SERVER['REQUEST_METHOD']=='POST'){
  //
  //   $upload_dir = "arquivo/";
  //
  //     //Tratamnto de arquivo
  //   $arq = basename($_FILES['imagem']['name']);
  //
  //   $caminho = $upload_dir.$arq;
  //
  //   if(strstr($arq,'.jpg') || strstr($arq,'.png') || strstr($arq,'.PNG') || strstr($arq,'.gif')){
  //     if (move_uploaded_file($file['tmp_name'], $diretorio_completo)) {
  //        return $diretorio_completo;
  //   $motorista->imagem = $caminho;
  //   $frotas->nome = $_POST['txtnome'];
  //
  //   $frotas::Insert($frotas);
  // }else{
  //               echo("<script>alert('Esse repositorio não é um arquivo de imagem!!')</script>");
  //               require_once('index.php');
  //           }
  //
  //     }

  }

  public function Editar($idAlterar){
    $frotas = new Frotas();

    $frotas->id = $idAlterar;
    $frotas->imagem = $_POST['imagem'];
    $frotas->nome = $_POST['txtnome'];

    $frotas::Update($frotas);

  }

  public function Excluir(){
    $idFrotas = $_GET['id'];
    $frotas = new Frotas();

    $frotas->id = $idFrotas;

    $frotas::Delete($frotas);
  }

  public function Buscar($id){
    $frotas = new Frotas();
    $frotas ->id = $id;

    return $dadosFrotas= $frotas::SelectById($frotas);
  }

  public function Listar(){

    $frotas = new Frotas();

    return $frotas::Select();
  }
}


 ?>
