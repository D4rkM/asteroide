<?php

  $controller = $_GET['controller'];
  $modo = $_GET['modo'];

  switch($controller){

    case 'viagens':
      require_once('controllers/dados_viagem_controller.php');
      require_once('models/dados_viagem_class.php');

      switch($modo){
        case 'buscar':
          $controllerDadosViagem = new ControllerDadosViagem();
          $controllerDadosViagem::buscar();

      }

      break;
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

<<<<<<< HEAD

      case 'login':
          $controllerUsuario = new controllerUsuario();
          $controllerUsuario::Logar();
          //echo ("okkkkkkkkkkk");
          require_once('index.php');
          break;
      }
      break;

=======
        case 'listar':
            $controllerUsuario = new controllerUsuario();
            $controllerUsuario::Listar();
            break;

      case 'login':
          $controllerUsuario = new controllerUsuario();
          $controllerUsuario::Logar();
          //echo ("okkkkkkkkkkk");
          require_once('index.php');
          break;
      }
      break;

>>>>>>> b488cd1ef07daae0cf1c5e5deefb77a57537d394
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
<<<<<<< HEAD
=======
      case 'faleconosco':

        require_once('controllers/faleconosco_controller.php');
        require_once('models/faleconosco_class.php');

        switch ($modo) {
          case 'reclamacao':
            $controllerReclamacao = new controllerReclamacao();
            $controllerReclamacao::Novo();
            break;

          case 'sugestao':
            $controllerSugestao = new controllerSugestao();
            $controllerSugestao::Novo();
            break;

          case 'elogio':
            $controllerElogio = new controllerElogio();
            $controllerElogio::Novo();
            break;
        }
        break;
>>>>>>> b488cd1ef07daae0cf1c5e5deefb77a57537d394
  }

 ?>
