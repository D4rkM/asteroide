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

      case 'filtro':
        require_once('controllers/filtro_controller.php');
        require_once('models/filtro_class.php');
        switch ($modo) {

          case 'buscar':
            $controllerFiltro = new controllerFiltro();
            $controllerFiltro::Buscar();
            break;
        }
  }

 ?>
