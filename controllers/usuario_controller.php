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

    if($_SERVER['REQUEST_METHOD']=='POST'){

      $upload_dir = "arquivo/";

        //Tratamnto de arquivo
      $arq = basename($_FILES['flefoto']['name']);

      $caminho = $upload_dir.$arq;

      if(strstr($arq,'.jpg') || strstr($arq,'.PNG') || strstr($arq,'.gif')){
              $usuario->foto = $caminho;
              $usuario->nome = $_POST['txtnome'];
              $usuario->email = $_POST['txtemail'];
              $usuario->senha = $_POST['txtsenha'];
              $data = implode("-",array_reverse(explode("/",$_POST['txtdatanasc'])));
              $usuario->datanasc = $data;
              $usuario->sexo = $_POST['rdosexo'];
              $usuario->telefone = $_POST['txttelefone'];
              $usuario->celular = $_POST['txtcelular'];
              $usuario->cpf = $_POST['txtcpf'];
              $usuario->rg = $_POST['txtrg'];
              $usuario->cep = $_POST['txtcep'];
              $usuario->logradouro = $_POST['txtlogradouro'];
              $usuario->numero = $_POST['txtnumero'];
              $usuario->bairro = $_POST['txtbairro'];
              $usuario->complemento = $_POST['txtcomplemento'];
              $usuario->cidade = $_POST['txtcidade'];
              $usuario->estado = $_POST['txtestado'];

              $usuario::Insert($usuario);
          }else{
              echo("<script>alert('Esse repositorio não é um arquivo de imagem!!')</script>");
              require_once('index.php');
          }

    }


  }

}

 ?>
