<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Magno">
    <!--
      Data de modificação: 19/03/2018
      Obs: Página principal contém menu e rodapé para inserir as outras páginas
    -->
    <title>Home - Bem vindo</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.3.1.js">

    </script>
    <script>
    // $(function(){
    // //Função para utilizar a posição do scroll na animação
    //  $(window).scroll(function() {
    //    var top = $(window).scrollTop();//top pega a posição do scroll
    //    if(top > 600){ //verifica se a posição do srcoll é maior do que 150 para diminuir a opacidade
    //      // alert(top);
    //      $("#men").css("background-color","#000");
    //      $("#men").css("border-bottom","solid 1px white");
    //
    //    }else{ //se não mantem a opacidade
    //      $("#men").css("background-color","#fff");
    //    }
    //  });
    //
    //  $(".conteudo").load("pagina-principal.php");
    //
    // });
    </script>
  </head>
  <body>
    <!-- Menu Superior -->
    <nav>
      <div class="menu-container" id="men">
        <div class="login-menu">

        </div>

        <!-- Área com Itens e Logo do menu superior -->
        <div class="conteudo-menu">
          <div class="itens-menu">
            <h2>Empresa</h2>
            <ul class="submenu">
              <li>Sobre a Empresa</li>
              <li>item</li>
            </ul>
          </div>
          <div class="itens-menu">
            <h2>Blog</h2>
            <ul class="submenu">
              <li>Interação</li>
              <li>item</li>
            </ul>
          </div>
          <div class="logo-menu">
            <a href="index.php"><h1><img src="img/logo.png" alt="Logo"></h1></a>
          </div>
          <div class="itens-menu">
            <h2>Passagens</h2>
            <ul class="submenu">
              <li>item</li>
              <li>item</li>
            </ul>
          </div>
          <div class="itens-menu">
            <h2>locais</h2>
            <ul class="submenu">
              <li>item</li>
              <li>item</li>
            </ul>
          </div>
        </div>
        <!--  -->
        <div class="login-menu">
          <a href="#"> <h4> <b>Acesso</b> </h4> </a>
        </div>
      </div>
    </nav>
    <!-- Aplica um espaçamento para o conteudo não invadir o menu superior -->
    <div class="espaco-do-menu">

    </div>


    <!-- Conteúdo da página -->
    <div class="conteudo">
      <?php require_once("pagina-principal.php"); ?>
    </div>


    <!-- rodapé -->
    <footer>
      <div class="footer-container">
        <!-- Define a borda do rodapé -->
        <div class="borda-footer"></div>
        <!-- Caixa com todo o conteudo do rodapé -->
        <div class="conteudo-footer">
          <!-- Titulos rodapé -->
          <div class="links-footer">
            <table>
              <tr>
                <td>
                  <h3>Empresa</h3>
                </td>
                <td>
                 <h3>Legislação</h3>
                </td>
                <td>
                 <h3> Agência</h3>
                </td>
                <td>
                 <h3> Recursos Humanos</h3>
                </td>
                <td>
                 <h3> Contatos</h3>
                </td>
              </tr>
              <!-- Links de Acesso -->
              <tr>
                <td>
                  <ul>
                    <li> <a href="#">História</a> </li>
                  </ul>
                </td>
                <td>
                  <ul>
                    <li> <a href="#">Informações</a> </li>
                  </ul>
                </td>
                <td>
                  <ul>
                    <li> <a href="#">Encontre uma rodovia</a> </li>
                  </ul>
                </td>
                <td>
                  <ul>
                    <li> <a href="#">Trabalhe Conosco</a> </li>
                  </ul>
                </td>
                <td>
                  <ul>
                    <li> <a href="#">Fale Conosco</a> </li>
                  </ul>
                </td>
              </tr>
            </table>
            <div class="campo-redes-sociais">
              <div class="redes-sociais">
                <img src="img/icon/facebook.png" alt="">
              </div>
              <div class="redes-sociais">
                <img src="img/icon/instagram.png" alt="">
              </div>
              <div class="redes-sociais">
                <img src="img/icon/youtube.png" alt="">
              </div>
            </div>
          </div>
          <div class="info-empresa">
            <div class="pagamento-info">
              <h3>Formas de Pagamento</h3>
              <div class="icones-pagamento">
                <img src="img/icon/Visa-icon.png" alt="Visa">
                <img src="img/icon/mastercard-icon.png" alt="Mastercard">
                <img src="img/icon/americanexpress-icon.png" alt="American-Express">
                <img src="img/icon/elo-icon.png" alt="Elo">
                <!-- <img src="img/icon/" alt=""> -->
                <!-- <img src="img/icon/" alt=""> -->
              </div>
              <h3> <b>EM ATÉ 6X SEM JUROS</b> </h3>
            </div>
            <div class="contato-footer">
              <h3>Para entrar em contato diretamente com a empresa</h3>
              <h2><b>4002-8922</b></h2>
              <h3>Segunda a Sexta das <b>9h</b> ás <b>21h</b></h3>
            </div>
          </div>
          <div class="final-rodape">
            <div class="referencias-rodape">
              <img src="img/icon/security-icon.png" alt="Seguro">
              <h4> <b>SEGURO</b> </h4>
            </div>
            <div class="referencias-rodape">
              <h4>Copyright © 2018 Viação Asteróide</h4>
            </div>
            <div class="referencias-rodape">
              <h4>Desenvolvido por <a href="#"> <b>Pulsar</b> </a> </h4>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script type="text/javascript">
      // $('html, body').animate({scrollTop:0}, 'slow');
    </script>
    <!-- Chama os scripts  -->

  </body>
</html>
