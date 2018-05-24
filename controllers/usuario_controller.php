<?php
/*
Autor:Bruna
Data de Modificação: 27/03/2018
Controller: controllerUsuario
Obs:Controller para realizar o CRUD de Usuario que vai vim do faleconosco
*/
class controllerUsuario {

    public function dateEmMysql($dateSql){
        $ano= substr($dateSql, 6);
        $mes= substr($dateSql, 3,-5);
        $dia= substr($dateSql, 0,-8);
        return $ano."-".$mes."-".$dia;
      }

  public function Novo(){
    $usuario = new Usuario();
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
              $usuario->imagem=$diretorio_completo;
              $usuario->nome = $_POST['txtnome'];
              $usuario->email = $_POST['txtemail'];
              $usuario->usuario = $_POST['txtusuario'];
              $usuario->senha = $_POST['txtsenha'];
              $data = implode("-",array_reverse(explode("/",$_POST['txtdatanasc'])));
              $usuario->datanasc = $data;
              $usuario->sexo = $_POST['rdosexo'];
              $usuario->telefone = $_POST['txttelefone'];
              $usuario->celular = $_POST['txtcelular'];
              $usuario->cpf = $_POST['txtcpf'];
              $usuario->rg = $_POST['txtrg'];

              $usuario::Insert($usuario);
  }

  public function Editar($id_usuario){
    $usuario = new Usuario();

    require_once('trata_imagem.php');

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
       $usuario->id = $id_usuario;
       $usuario->imagem=$diretorio_completo;
       $usuario->imagem = $foto;
       $usuario->nome = $_POST['txtnome'];
       $usuario->email = $_POST['txtemail'];
       $usuario->senha = $_POST['txtsenha'];
       $data = implode("-",array_reverse(explode("/",$_POST['txtdatanasc'])));
       $usuario->datanasc = $data;
       $usuario->sexo = $_POST['rdosexo'];
       $usuario->senha = $_POST['txtsenha'];
       $usuario->telefone = $_POST['txttelefone'];
       $usuario->celular = $_POST['txtcelular'];
       $usuario->cpf = $_POST['txtcpf'];
       $usuario->rg = $_POST['txtrg'];

       $usuario::update($usuario);
  }

  public function Buscar($id){
    $usuario = new Usuario();
    $usuario->id = $id;
    // var_dump($id);die;
    return $dados_usuario = $usuario::SelectById($usuario);
  }

  public function Logar(){

  $usuario = new Usuario();

  $usuario->login = $_POST['txtemail'];
  $usuario->senha = $_POST['txtsenha'];
  $dadosUsuario = $usuario::Login($usuario);

  if($dadosUsuario!=false)
  {
    $_SESSION['nome_usuario'] = $dadosUsuario->nome;
    $_SESSION['id_usuario'] = $dadosUsuario->id;
  

  }else{
    $_SESSION['erro'] = "Usuario ou senha incorretos, caso o erro percista entre em contato com o ADM";
  }
}

}
 ?>
