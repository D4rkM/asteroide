<?php

class controllerLogin{
  //Efetua o login
  public function Logar(){

    $login = new Login();

    $login->email = $_POST['txtemail'];
    $login->senha = $_POST['txtsenha'];
    $login::Logar($login);

    if($dadoslogin!=false)
    {
      $_SESSION['email'] = $dadoslogin->email;
      $_SESSION['id'] = $dadoslogin->id;
      $_SESSION['status'] = $dadoslogin->ativo;

    }else{
      $_SESSION['erro'] = "Usuario ou senha incorretos, caso o erro percista entre em contato com o ADM";
    }

    //require_once("index.php");
    header('location:index.php');

  }
}
 ?>
