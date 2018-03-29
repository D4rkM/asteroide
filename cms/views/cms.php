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

    <script type="text/javascript ">
      $(document).ready(function() {

        $("#funcionario").click(function(){
          $.ajax({
            type:"POST",
            url:"views/cms/funcionario_layout_cms_view.php",
            data:{},
            success: function(dados){
              $("#conteudoCMS").html(dados);

            }
          });

        });

        $("#pagina").click(function(){
          $.ajax({
            type:"POST",
            url:"views/cms/pagina_layout_cms_view.php",
            data:{},
            success: function(dados){
              $("#conteudoCMS").html(dados);

            }
          });

        });


      });

    </script>

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

                <div class="itens-menu-lateral"  id = "funcionario">

                  <div class="img-menu-lateral">

                    <img src="img/icon-funcionario.png" width="100%" height="100%" alt="">

                  </div>

                  <div class="txt-menu-lateral">
                    Funcionario
                  </div>

                </div>
              <!-- </a> -->

              <div class="itens-menu-lateral" id='pagina'>

                <div class="img-menu-lateral">

                  <img src="img/icon-cliente.png" width="100%" height="100%" alt="">

                </div>

                <div class="txt-menu-lateral">
                  Paginas
                </div>

              </div>

            </div>

            <!-- Área do contruedo -->
            <div class="conteudo" id='conteudoCMS'>


            </div>
          </div>

      </div>

  </body>
</html>
