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

      $frotas->imagem=$diretorio_completo;
      $frotas->nome=$_POST['txtnome'];
      $frotas::Insert($frotas);



}

  public function Editar(){
    $frotas = new Frotas();
    // $nada ="false";

    require_once('trata_imagem.php');

    $idFrotas=$_GET['id'];

    // echo $idOnibus;

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
    $frotas->id = $idFrotas;
    $frotas->imagem=$diretorio_completo;
    $frotas->nome=$_POST['txtnome'];
    $frotas->imagem = $foto;

    
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
