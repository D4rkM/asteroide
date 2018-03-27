<?php

  $controller = $_GET['controller'];
  $modo = $_GET['modo'];

  switch($controller){

    case 'funcionario':
      require_once('controllers/funcionario_controller.php');
      require_once('models/funcionario_class.php');
      switch ($modo) {
        case 'login':

          $controllerFuncionario = new controllerFuncionario();

          $controllerFuncionario::Logar();

          break;

        case 'excluir':

        //instanciando a classe da controller
        $controllerFuncionario = new controllerFuncionario();

        $controllerFuncionario::Excluir();

        break;

        case 'novo':

        $controllerFuncionario = new controllerFuncionario();

        $controllerFuncionario::Novo();

        default:
          # code...
          break;
      }

  }



 ?>
