<?php

  $controller = $_GET['controller'];
  $modo = $_GET['modo'];

  switch($controller){

    case 'usuario':
      require_once('controllers/usuario_controller.php');
      require_once('models/usuario_class.php');
      switch ($modo) {
     

        case 'novo':

          $controllerUsuario = new controllerUsuario();

          $controllerUsuario::Novo();
          break;

       
      }

  }



 ?>
