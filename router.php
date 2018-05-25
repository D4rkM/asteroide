<?php

  $controller = $_GET['controller'];
  $modo = $_GET['modo'];

  switch($controller){

    case 'viagens':
      require_once('controllers/dados_viagem_controller.php');
      require_once('models/dados_viagem_class.php');

      switch($modo){
        case 'buscar':
          session_start();
          $controllerDadosViagem = new ControllerDadosViagem();

          $_SESSION['origem'] = $_POST['txtorigem'];
          $_SESSION['destino'] = $_POST['txtdestino'];
          $_SESSION['data_saida'] = $controllerDadosViagem::dateEmMysql($_POST['txtida']);

          $controllerDadosViagem::buscar();

          header('location:views/horarios-onibus.php');
          break;

        case 'buscar_denovo':
          session_start();
          $_SESSION['origem'] = $_POST['txtorigem'];
          $_SESSION['destino'] = $_POST['txtdestino'];
          $_SESSION['data_saida'] = $_POST['txtida'];

          $controllerDadosViagem = new ControllerDadosViagem();
          $controllerDadosViagem::buscar();

          header('location:horarios-onibus.php');
          break;
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

  }

 ?>
