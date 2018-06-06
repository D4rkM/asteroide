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

          if(isset($_POST['txtorigem'])){
            // echo($_POST['txtorigem']);
            $_SESSION['origem'] = $_POST['txtorigem'];
            $_SESSION['destino'] = $_POST['txtdestino'];
            $_SESSION['data_saida'] = $controllerDadosViagem::dateEmMysql($_POST['txtida']);

            $controllerDadosViagem::buscar();

            require_once('views/horarios-onibus.php');
          }else{
            header('../index.php');
          }
          break;

        case 'buscar_denovo':
          session_start();
          $_SESSION['origem'] = $_POST['txtorigem'];
          $_SESSION['destino'] = $_POST['txtdestino'];
          $_SESSION['data_saida'] = $_POST['txtida'];

          $controllerDadosViagem = new ControllerDadosViagem();
          $controllerDadosViagem::buscar();
          echo('aqui inseriru');
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
            // echo('nsei');
            if(isset($_GET['c'])){

              $continuacao = $_GET['c'];
              if($continuacao == true){
                require_once('views/pagina-pagamento.php');
              }
            }else{
              require_once('index.php');

            }
            //echo ("okkkkkkkkkkk");
            // require_once('nav.php');
            break;
      }
      break;

    case 'interacao':
      require_once('controllers/interacao_controller.php');
      require_once('models/interacao_class.php');
      switch ($modo) {
        case 'novo':
          $controllerInteracao = new controllerInteracao();
          $controllerInteracao::Novo($_GET['id']);
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

        case 'registro_passagem':
          require_once('controllers/registro_passagem_controller.php');
          require_once('models/registro_passagem_class.php');

          switch($modo){
              case "selecao_polt":
              session_start();

              if(isset($_POST['idviagem'])){
              $_SESSION['_idViagem'] = $_POST['idviagem'];
              $_SESSION['_selected'] = $_POST['poltrona'];

              if(isset($_SESSION['id_usuario'])){

                  require_once('views/pagina-pagamento.php');

                }else{

                  require_once('views/usuario_identificacao.php');

                }
              }else{
                header("location:index.php");
              }

              break;
            case 'buscar':
              $id = $_POST['id_viagem'];
              $registro_poltronas = new RegistroPassagemController();
              $registro_poltronas = $registro_poltronas::buscarPoltronas($id);
              $cont = 0;
              // echo(sizeof($registro_poltronas));
              while($cont < sizeof($registro_poltronas)){
                echo($registro_poltronas[$cont]->num_poltrona);
                $cont += 1;
              }
              // $var = json_encode($registro_poltronas[1]->num_poltrona);
              // echo($registro_poltronas);
              // echo $var;
              break;
            case "compra":
              session_start();


              if(isset($_POST['tipo'])){
                $tipo = $_POST['tipo'];
                // echo('tipo');
              }
              switch($tipo){

                case 'boleto':
                  if(isset($_SESSION['id_usuario'])){
                    // require_once('models/compra_class.php');
                    // require_once('controllers/compra_controller.php');
                    require_once('models/transacao_class.php');
                    require_once('controllers/transacao_controller.php');

                    // echo('aaaaee');
                    $transacao = new TransacaoController();
                    $transacao::boletoBancario();
                  }

                  break;
                case 'cartao':
                  if(isset($_SESSION['id_usuario'])){
                    // echo('foi');
                      // require_once('models/compra_class.php');
                      // require_once('controllers/compra_controller.php');
                      require_once('models/transacao_class.php');
                      require_once('controllers/transacao_controller.php');

                    // echo('aaaaee');
                      $transacao = new TransacaoController();
                      $transacao::cartaoDeCredito();



                      // $compra = new CompraController();
                      // $idCompra = $compra::novaCompra();

                    }else{

                    }
                    break;
              }


              break;

          }

        break;

        case "registro_compra":
          switch($modo){
            case "salvar":
            session_start();
            require_once('models/compra_class.php');
            // require_once('controllers/compra_controller.php');
            require_once('models/registro_passagem_class.php');
            // require_once('controllers/registro_passagem_controller.php');

            $compra = new Compra();
            $registro_passagem = new RegistroPassagem();

            $compra->id_usuario = $_SESSION['id_usuario'];
            $compra->preco_passagem = $_POST['preco'];
            $compra->status_compra = $_POST['status'];
            $compra->transacao_id= $_POST['transacao_id'];
            $compra->local_compra_id = 7;

            $polt = $_SESSION['_selected'];
            $viagem = $_SESSION['_idViagem'];

            $a=0;
            while($a < sizeof($polt)){
              // echo($a);
              $compra->qrcode = $activation = sha1(uniqid(rand(), true));
              $registro_passagem::registrarPoltrona($compra::registrarCompra($compra), $polt[$a], $viagem);
              $a++;
            }

            break;

          }

        break;


        case "cidade":
          require_once("models/cidade_estado_class.php");
          require_once("controllers/cidade_estado_controller.php");

          switch($modo){
            case "pesquisa":

            $pesquisa = new CidadeEstadoController();
            // $var = array();
            $retorno = $pesquisa::pesquisar();
            $var = array();
            $a = 0;
            while($a<sizeof($retorno)){
              $var[$a] = $retorno[$a]->cidade_estado;
              $a++;
            }
            echo(json_encode($var));

            break;
          }
        break;


  }

 ?>
