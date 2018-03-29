<?php

  if(isset($_POST['btnDeslogin'])){
    session_destroy();

    header('location:index.php');
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="William">
    <!--
    Data de modificação: 22/03/2018
    Obs: Página principal com menu e área de conteúdo do CMS
    -->
    <title>Area administrativa</title>
    <link rel="stylesheet"  type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <script src="js/jquery-3.3.1.js"></script>


  </head>
  <?php
    $pagina = null;
   ?>
  <body>
    <div class="modalContainer">
      <div class="modal">

      </div>
    </div>

      <div class="area-total">
          <!-- Área do Menu superior do CMS -->
          <nav>
            <div class="area-menu">
              <div class="divs-principais">
                <div class="icone-empresa">
                  <img src="img/logo-cms.png" height="80%" width="80%" alt="">
                </div>
                <div class="itens-menu">
                  <div class="nome-usuario">
                    Bem-vindo, <?php echo $_SESSION['nomeUser'] ?>
                  </div>
                  <form class="cms.php" action="#" method="post">
                    <div class="deslogar" id="deslogar">
                        <input type="submit" name="btnDeslogin" value="Logout">
                    </div>
                  </form>

                  <div class="foto-usuario">
                    <img src="img/user-icon-cms.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </nav>

          <!-- Segura caixas -->
          <div class="area-abaixo-menu">

            <!-- Área do Menu Lateral -->
            <a href="#" <?php $pagina = "funcionario" ?>>
            <div class="menu-lateral">

                <div class="itens-menu-lateral">

                  <div class="img-menu-lateral">

                    <img src="img/icon-funcionario.png" width="100%" height="100%" alt="">

                  </div>

                  <div class="txt-menu-lateral" id = "deslogartxt">
                    Funcionario <?php

                    if(isset($_POST['deslogarJS'])){
                      $deslogar = $_POST['deslogarJS'];

                      echo $deslogar;

                    }

                     ?>
                  </div>

                </div>
              <!-- </a> -->

              <div class="itens-menu-lateral">

                <div class="img-menu-lateral">

                  <img src="img/icon-cliente.png" width="100%" height="100%" alt="">

                </div>

                <div class="txt-menu-lateral">
                  Cliente
                </div>

              </div>

            </div>

            <!-- Área do contruedo -->
            <div class="conteudo">
                <?php
                  require_once('cms/funcionario_layout_cms_view.php');
                  /*if($pagina=='funcionario'){
                    require_once('cms/funcionario_list_cms_view.php');
                  }*/
                  // require_once('cms/funcionario_cadastro_cms_view.php');
                 ?>


            </div>
          </div>

      </div>

  </body>
</html>
