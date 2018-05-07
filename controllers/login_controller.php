<?php

class controllerLogin{
  //Efetua o login
  public function Logar(){

    $login = new Login();

    $login->login = $_POST['txtUsuario'];
    $login->senha = $_POST['txtSenha'];
    $login = $login::Login_Usuario($login);

    if($dadoslogin!=false)
    {
      $_SESSION['emailUser'] = $dadoslogin->email;
      $_SESSION['idUser'] = $dadoslogin->id;
      $_SESSION['statusUser'] = $dadoslogin->ativo;

    }else{
      $_SESSION['erro'] = "Usuario ou senha incorretos, caso o erro percista entre em contato com o ADM";
    }

    //require_once("index.php");
    header('location:index.php');

  }
}
 ?>
