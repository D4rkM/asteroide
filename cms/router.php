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
            break;
      }
          break;

    case 'sobreEmpresa':

      require_once('controllers/sobre_empresa_controller.php');
      require_once('models/sobre_empresa_class.php');

      switch ($modo) {
        case 'novo':
        $controllerSobreEmpresa = new controllerSobreEmpresa();
        $controllerSobreEmpresa::Novo();
        break;

        case 'editar':
        $controllerSobreEmpresa = new controllerSobreEmpresa();
        $controllerSobreEmpresa::Editar($_GET['id']);
        break;

        case 'excluir':
        $controllerSobreEmpresa = new controllerSobreEmpresa();
        $controllerSobreEmpresa::Excluir();
        break;

        case 'buscar':
        $controllerSobreEmpresa = new controllerSobreEmpresa();
        $controllerSobreEmpresa::Buscar();
        break;

        case 'listar':
        $controllerSobreEmpresa = new controllerSobreEmpresa();
        $controllerSobreEmpresa::Listar();
        break;

        default:
        break;
      }
      break;

    case 'frotas':

    require_once('controllers/frotas_controller.php');
    require_once('models/frotas_class.php');

    switch ($modo) {
      case 'novo':
      $controllerFrotas = new controllerFrotas();
      $controllerFrotas::Novo();
      break;

      case 'editar':
      $controllerFrotas = new controllerFrotas();
      $controllerFrotas::Editar($_GET['id']);
      break;

      case 'excluir':
      $controllerFrotas = new controllerFrotas();
      $controllerFrotas::Excluir();
      break;

      case 'buscar':
      $controllerFrotas = new controllerFrotas();
      $controllerFrotas::Buscar();
      break;

      case 'listar':
      $controllerFrotas = new controllerFrotas();
      $controllerFrotas::Listar();
      break;

      default:
      break;
    }
      break;

    case 'estado_postos':

    require_once('controllers/estados_postos_controller.php');
    require_once('models/estados_postos_class.php');

      switch ($modo) {
        case 'novo':
        $controllerEstadosPostos = new controllerEstadosPostos();
        $controllerEstadosPostos::Novo();
        break;

        case 'editar':
        $controllerEstadosPostos = new controllerEstadosPostos();
        $controllerEstadosPostos::Editar();
        break;

        case 'excluir':
        $controllerEstadosPostos = new controllerEstadosPostos();
        $controllerEstadosPostos::Excluir();
        break;

        case 'buscar':
        $controllerEstadosPostos = new controllerEstadosPostos();
        $controllerEstadosPostos::Buscar();
        break;

        case 'listar':
        $controllerEstadosPostos = new controllerEstadosPostos();
        $controllerEstadosPostos::Listar();
        break;

        default:
        break;
      }
      break;

    case 'postos':

    require_once('controllers/postos_controller.php');
    require_once('models/postos_class.php');

      switch ($modo) {
        case 'novo':
        $controllerPostos = new controllerPostos();
        $controllerPostos::Novo();
        break;

        case 'editar':
        $controllerPostos = new controllerPostos();
        $controllerPostos::Editar($_GET['id']);
        break;

        case 'excluir':
        $controllerPostos = new controllerPostos();
        $controllerPostos::Excluir();
        break;

        case 'buscar':
        $controllerPostos = new controllerPostos();
        $controllerPostos::Buscar();
        break;

        case 'listar':
        $controllerPostos = new controllerPostos();
        $controllerPostos::Listar();
        break;

        default:
        break;
      }
      break;

      case 'postos_rodoviarios':

      require_once('controllers/postos_rodoviarios_controller.php');
      require_once('models/postos_rodoviarios_class.php');

        switch ($modo) {
          case 'novo':
          $controllerPostosRodoviarios = new controllerPostosRodoviarios();
          $controllerPostosRodoviarios::Novo();
          break;

          case 'editar':
          $controllerPostosRodoviarios = new controllerPostosRodoviarios();
          $controllerPostosRodoviarios::Editar($_GET['id']);
          break;

          case 'excluir':
          $controllerPostosRodoviarios = new controllerPostosRodoviarios();
          $controllerPostosRodoviarios::Excluir();
          break;

          case 'buscar':
          $controllerPostosRodoviarios = new controllerPostosRodoviarios();
          $controllerPostosRodoviarios::Buscar();
          break;

          case 'listar':
          $controllerPostosRodoviarios = new controllerPostosRodoviarios();
          $controllerPostosRodoviarios::Listar();
          break;

          default:
          break;
        }
        break;

      case 'home':

      require_once('controllers/home_controller.php');
      require_once('models/home_class.php');

        switch ($modo) {
          case 'novo':
          $controllerHome = new controllerHome();
          $controllerHome::Novo();
          break;

          case 'editar':
          $controllerHome = new controllerHome();
          $controllerHome::Editar($_GET['id']);
          break;

          case 'excluir':
          $controllerHome = new controllerHome();
          $controllerHome::Excluir();
          break;

          case 'buscar':
          $controllerHome = new controllerHome();
          $controllerHome::Buscar();
          break;

          case 'listar':
          $controllerHome = new controllerHome();
          $controllerHome::Listar();
          break;

          default:
          break;
        }
        break;

        case 'tipo_destino':

        require_once('controllers/tipo_destino_controller.php');
        require_once('models/tipo_destino_class.php');

          switch ($modo) {
            case 'novo':
            $controllerTipoDestino = new controllerTipoDestino();
            $controllerTipoDestino::Novo();
            break;

            case 'editar':
            $controllerTipoDestino = new controllerTipoDestino();
            $controllerTipoDestino::Editar($_GET['id']);
            break;

            case 'excluir':
            $controllerTipoDestino = new controllerTipoDestino();
            $controllerTipoDestino::Excluir();
            break;

            case 'buscar':
            $controllerTipoDestino = new controllerTipoDestino();
            $controllerTipoDestino::Buscar();
            break;

            case 'listar':
            $controllerTipoDestino = new controllerTipoDestino();
            $controllerTipoDestino::Listar();
            break;

            default:
            break;
          }
          break;

        case 'motorista':

          require_once('controllers/motorista_controller.php');
          require_once('models/motorista_class.php');

          switch ($modo) {
            case 'novo':
              $controllerMotorista = new controllerMotorista();
              $controllerMotorista::Novo();
              break;

            case 'editar':
                //instanciando a classe da controller
                $controllerMotorista = new controllerMotorista();
                $controllerMotorista::Editar($_GET['id']);
              break;

            case 'excluir':
              //instanciando a classe da controller
              $controllerMotorista = new controllerMotorista();
              $controllerMotorista::Excluir();
              break;

              case 'buscar':
                $controllerMotorista = new controllerMotorista();
                $controllerMotorista::Buscar();
                break;

              case 'listar':
                $controllerMotorista = new controllerMotorista();
                $controllerMotorista::Listar();
                break;

                default:
                break;
          }
              break;
    }

 ?>
