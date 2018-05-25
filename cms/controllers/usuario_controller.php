<?php
/*
Autor:Bruna
Data de Modificação: 27/03/2018
Controller: controllerUsuario
Obs:Controller para realizar o CRUD de Usuario que vai vim do faleconosco
*/
class controllerUsuario {

  public function Listar(){
    $usuario = new Usuario();
    return $usuario::Select();
  }

  public function Excluir(){
    $idUsuario = $_GET['id'];

    $usuario = new Usuario();

    $usuario->id = $idUsuario;

    $usuario::Delete($usuario);
  }

}

 ?>
