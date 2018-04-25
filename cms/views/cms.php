<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>CMS Central</title>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    //pagina de duvidas frequentes
      $("#duvidas").click(function(){
        $.ajax({
          type:"POST",
          url:"views/Duvidas_Frequentes/pagina_layout_duvidas.php",
          data:{},
          success: function(dados){
            $("#main").html(dados);
          }
        });
      });
      //pagina de frotas
      $("#frotas").click(function(){
          $.ajax({
            type:"POST",
            url:"views/Frotas/pagina_layout_frotas.php",
            data:{},
            success: function(dados){
              $("#main").html(dados);
            }
          });
        });
        //pagina de home
      $("#home").click(function(){
            $.ajax({
              type:"POST",
              url:"views/Home/pagina_layout_home.php",
              data:{},
              success: function(dados){
                $("#main").html(dados);
              }
            });
          });
          //pagina de Interacao
      $("#interacao").click(function(){
              $.ajax({
                type:"POST",
                url:"views/Interacao/pagina_layout_interacao.php",
                data:{},
                success: function(dados){
                  $("#main").html(dados);
                }
              });
            });
            //pagina de postos rodoviarios
      $("#postos").click(function(){
                $.ajax({
                  type:"POST",
                  url:"views/Postos_Rodoviarios/pagina_layout_postos.php",
                  data:{},
                  success: function(dados){
                    $("#main").html(dados);
                  }
                });
              });
              //pagina de sobre a empresa
       $("#sobre").click(function(){
                  $.ajax({
                    type:"POST",
                    url:"views/Sobre_Empresa/pagina_layout_sobre.php",
                    data:{},
                    success: function(dados){
                      $("#main").html(dados);
                    }
                  });
                });

      //pagina de funcionario
      $("#funcionario").click(function(){
                    $.ajax({
                      type:"POST",
                      url:"views/Cadastro_Funcionario/pagina_layout_funcionario.php",
                      data:{},
                      success: function(dados){
                        $("#main").html(dados);
                      }
                    });
                  });
                  //cadastro de onibus
      $("#onibus").click(function(){
                      $.ajax({
                        type:"POST",
                        url:"views/Cadastro_Onibus/pagina_layout_onibus.php",
                        data:{},
                        success: function(dados){
                          $("#main").html(dados);
                        }
                      });
                    });
                    //cadastro de postos rodoviarios
      $("#postos_rodoviarios").click(function(){
                        $.ajax({
                          type:"POST",
                          url:"views/Cadastro_Postos_Rodoviarios/postos_rodoviarios_layout.php",
                          data:{},
                          success: function(dados){
                            $("#main").html(dados);
                          }
                        });
                      });
                      //cadastro de vendas de passagen
      $("#vendas").click(function(){
                          $.ajax({
                            type:"POST",
                            url:"views/Vendas/vendas_layout.php",
                            data:{},
                            success: function(dados){
                              $("#main").html(dados);
                            }
                          });
                        });
                        //cadastro de motorista
      $("#motorista").click(function(){
                            $.ajax({
                              type:"POST",
                              url:"views/Cadastro_Motorista/layout_motorista.php",
                              data:{},
                              success: function(dados){
                                $("#main").html(dados);
                              }
                            });
                          });
                          //cadastro de motorista
      $("#usuarios").click(function(){
            $.ajax({
              type:"POST",
              url:"views/Usuarios/layout_usuario.php",
              data:{},
              success: function(dados){
                $("#main").html(dados);
              }
            });
          });

          $("#parada").click(function(){
                $.ajax({
                  type:"POST",
                  url:"views/Parada/parada_layout.php",
                  data:{},
                  success: function(dados){
                    $("#main").html(dados);
                  }
                });
              });
          $("#caminho").click(function(){
                    $.ajax({
                      type:"POST",
                      url:"views/Caminho/pagina_layout_caminho.php",
                      data:{},
                      success: function(dados){
                        $("#main").html(dados);
                      }
                    });
                  });
      });
    </script>
  </head>
  <body>
    <div class="modalContainer">
     <div class="modal">

     </div>
   </div>
    <div class="container_cms">
      <!-- Cabeçalho -->
      <header>
        <!-- Logo -->
        <div class="cont_logo">
          <img class="img_logo" src="img/logo-cms.png" alt="logo">
          <div class="tex_logo">Viação Asteroide</div>
        </div>
        <!-- usuario -->
        <div class="cont_usuario">
          <input class="logout" type="submit" name="btnlogout" value="Logout">
          <div class="text_user">Bem vindo Teste</div>
          <img class="img_user" src="img/user-icon-cms.png" alt="user">
        </div>
      </header>
      <!-- menu lateral -->
      <nav>
        <ul class="mainmenu">
          <li class="itens"><a href="#">Admistração</a>
              <ul class="submenu">
                <li><a href="#">Relatorios</a></li>
                <li><a href="#">Graficos</a></li>
                <li id="onibus"><a href="#">Cadastro de Onibus</a></li>
                <li id="postos_rodoviarios"><a href="#">Cadastro de Postos Rodoviarios</a></li>
                <li id="funcionario"><a href="#">Cadastro de funcionarios</a></li>
                <li id="motorista"><a href="#">Cadastro de Motorista</a></li>
                <li id="usuarios"><a href="#">Usuarios</a></li>
                <li id="parada"><a href="#">Parada</a></li>
                <li id="caminho"><a href="#">Caminho</a></li>
              </ul>
          <li>
          <li class="itens"><a href="#">Marketing</a>
              <ul class="submenu">
                <li id="sobre"><a href="#" >Sobre a Empresa</a></li>
                <li id="duvidas"><a href="#">Duvidas Frequentes</a></li>
                <li id="interacao"><a href="#">Interação</a></li>
                <li id="postos"><a href="#">Postos Rodoviarios</a></li>
                <li id="frotas"><a href="#">Frotas</a></li>
                <li id="home"><a href="#">Home</a></li>
              </ul>
          <li>
            <li class="itens"><a href="#">Vendas</a>
                <ul class="submenu">
                  <li id="vendas"><a href="#">Pacotes de Viagem</a></li>
                </ul>
            <li>
              <li class="itens"><a href="#">Mecanico</a>
                  <ul class="submenu">
                    <li><a href="#">Onibus em Manutenção</a></li>
                  </ul>
              <li>
        </ul>
      </nav>
      <!-- Conteudo -->
      <div id="main">

      </div>
    </div>
  </body>
</html>
