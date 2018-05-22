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

        case 'editar':
          $controllerUsuario = new controllerUsuario();
          $controllerUsuario::Editar($_GET['id']);
          break;

        case 'buscar':
          $controllerUsuario = new controllerUsuario();
          $controllerUsuario::Buscar();
          break;


      case 'login':
          $controllerUsuario = new controllerUsuario();
          $controllerUsuario::Logar();
          //echo ("okkkkkkkkkkk");
          require_once('index.php');
          break;
      }
      break;

    case 'interacao':
      require_once('controllers/interacao_controller.php');
      require_once('models/interacao_class.php');
      switch ($modo) {
        case 'novo':
          $controllerInteracao = new controllerInteracao();
          $controllerInteracao::Novo();
          break;

        case 'lista':
            $controllerInteracao = new controllerInteracao();
            $controllerInteracao::Lista();
            break;
      }
      break;
      case 'faleconosco':
        require_once('controllers/faleconosco_controller.php');
        require_once('models/faleconosco_class.php');
        switch ($modo) {
          case 'novo':
            $controllerFaleconosco = new controllerFaleconosco();
            $controllerFaleconosco::Novo();
            break;
        }
        break;
  }

 ?>
