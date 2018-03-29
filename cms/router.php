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

        case 'editar':

          //instanciando a classe da controller
          $controllerFuncionario = new controllerFuncionario();

          $controllerFuncionario::Editar($_GET['id']);

        break;

        case 'novo':

          $controllerFuncionario = new controllerFuncionario();

          $controllerFuncionario::Novo();
          break;

        case 'buscar':

          $controllerFuncionario = new controllerFuncionario();

          $controllerFuncionario::Buscar();

          break;

        case 'buscarEstados':

          $controllerFuncionario = new controllerFuncionario();

          $controllerFuncionario::Listar();

          break;

        default:
          # code...
          break;
      }

      break;

    case 'duvida':
      require_once('controllers/duvidas_controller.php');
      require_once('models/duvidas_class.php');
      switch ($modo) {

        case 'excluir':

          //instanciando a classe da controller
          $controllerDuvida = new controllerDuvidas();

          $controllerDuvida::Excluir();


          break;

          case 'editar':

            //instanciando a classe da controller
            $controllerDuvida = new controllerDuvidas();

            $controllerDuvida::Editar($_GET['id']);

          break;

          case 'novo':

            $controllerDuvida = new controllerDuvidas();

            $controllerDuvida::Novo();

            break;

          case 'buscar':

            $controllerFuncionario = new controllerFuncionario();

            $controllerFuncionario::Buscar();

            break;

          case 'buscarEstados':

            $controllerFuncionario = new controllerFuncionario();

            $controllerFuncionario::Listar();

            break;

          default:
            # code...
            break;
      }
  }




 ?>
