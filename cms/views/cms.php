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
    <script src="js/jquery-3.2.1.js"></script>

    <script type="text/javascript ">
      $(document).ready(function() {

      //parte funcionario

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
        //pagina de duvidas frequentes
        $("#duvidasFrequentes").click(function(){
          $.ajax({
            type:"POST",
            url:"views/cms/pagina_layout_duvidas_frequentes_cms_view.php",
            data:{},
            success: function(dados){
              $("#conteudoCMS").html(dados);

              var div_ocultar = document.getElementById("menu_cruds");
              div_ocultar.style.display = "none";
            }
          });
        });
        //pagina de Sobre a Empresa
        $("#sobreEmpresa").click(function(){
          $.ajax({
            type:"POST",
            url:"views/cms/pagina_layout_sobre_empresa_cms_view.php",
            data:{},
            success: function(dados){
              $("#conteudoCMS").html(dados);

              var div_ocultar = document.getElementById("menu_cruds");
              div_ocultar.style.display = "none";
            }
          });
        });
         //pagina de Frotas
        $("#frotasOnibus").click(function(){
          $.ajax({
            type:"POST",
            url:"views/cms/pagina_layout_frotas_cms_view.php",
            data:{},
            success: function(dados){
              $("#conteudoCMS").html(dados);

              var div_ocultar = document.getElementById("menu_cruds");
              div_ocultar.style.display = "none";
            }
          });
        });
         //Interração
        $("#interacao").click(function(){
          $.ajax({
            type:"POST",
            url:"views/cms/pagina_layout_interacao_cms_view.php",
            data:{},
            success: function(dados){
              $("#conteudoCMS").html(dados);

              var div_ocultar = document.getElementById("menu_cruds");
              div_ocultar.style.display = "none";
            }
          });
        });
         //Postos Rodoviarios
        $("#postosRodoviarios").click(function(){
          $.ajax({
            type:"POST",
            url:"views/cms/pagina_layout_postos_rodoviarios_cms_view.php",
            data:{},
            success: function(dados){
              $("#conteudoCMS").html(dados);

              var div_ocultar = document.getElementById("menu_cruds");
              div_ocultar.style.display = "none";
            }
          });
        });
      });
    </script>
    <script>
          function MenuLateral(){
          var div = document.getElementById("menu_cruds");
          div.style.display = "block";
      }
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
                    Bem-vindo, 
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
                <!-- Itens do menu Lateral - Funcionario-->
                <div class="itens-menu-lateral"  id = "funcionario">
                  <!-- Imagem do Funcionario -->
                  <div class="img-menu-lateral">
                    <img src="img/icon-funcionario.png" width="100%" height="100%" alt="">
                  </div>
                  <!-- Nome funcionario -->
                  <div class="txt-menu-lateral">
                    Funcionario
                  </div>
                </div>
                <!-- Itens do menu Lateral - Paginas-->
                <div class="itens-menu-lateral" >
                  <!-- Imagem da Pagina -->
                  <div class="img-menu-lateral">
                      <a href="#" onclick="MenuLateral()"><img src="img/icon-cliente.png" width="100%" height="100%" alt=""></a>
                  </div>
                  <!-- Nome da Pagina -->
                  <div class="txt-menu-lateral">
                    Paginas
                  </div>
                </div>
                <!-- MENU PAGINAS-->
                <div id="menu_cruds">
                    <ul>
                        <a href="#" id='sobreEmpresa'><li>Sobre a Empresa</li></a>
                        <a href="#" id='frotasOnibus'><li>Frotas de Onibus</li></a>
                        <a href="#" id='interacao'><li>Interação</li></a>
                        <a href="#" id='postosRodoviarios'><li>Postos Rodoviarios</li></a>
                        <a href="#" id='duvidasFrequentes'><li>Duvidas Frequentes</li></a>
                    </ul>
                </div>
            </div>
            <!-- Área do contruedo -->
            <div class="conteudo" id='conteudoCMS'></div>
          </div>
      </div>
  </body>
</html>
