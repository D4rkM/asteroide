<?php
    
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    if(isset($_POST['btnSair'])){
      $_SESSION['nome_usuario'] = '0';
      $_SESSION['id_usuario'] = '0';
      $_SESSION['imagem_usuario'] = '0';
      session_destroy();
    }
 ?>
<!-- Menu Superior -->
<nav>
  <div class="menu-container" id="men">
    <div class="login-menu">

    </div>

    <!-- Área com Itens e Logo do menu superior -->
    <div class="conteudo-menu">
      <div class="segura-itens-menu">
        <div class="itens-menu">
          <h2>Empresa <img src="<?php echo($links); ?>img/icon/down.svg" alt="" style="width:20px; height:20px;"> </h2>
          <ul class="submenu">
            <li><a href="<?php echo($paths); ?>sobre_empresa.php">Sobre a Empresa</a></li>
            <li><a href="<?php echo($paths); ?>fale_conosco.php">Fale Conosco</a></li>
            <li><a href="<?php echo($paths); ?>frotas.php">Nossas Frotas</a></li>
            <li><a href="<?php echo($paths); ?>trabalhe_conosco.php">Trabalhe Conosco</a></li>
          </ul>
        </div>
        <div class="itens-menu">
          <h2>Blog</h2>
          <ul class="submenu">
            <li><a href="<?php echo($paths); ?>interacao.php">Interação</a></li>
            <li><a href="<?php echo($paths); ?>duvidas_frequentes.php">Duvidas Frequentes</a></li>
            <li><a href="<?php echo($paths); ?>legislacao.php">Legislação</a></li>
          </ul>
        </div>

      <div class="itens-menu">
        <div class="logo-menu">
          <a href="<?php echo($links); ?>index.php"><h1 style="margin:0px;"><img src="<?php echo($links); ?>img/logo.png" alt="Logo"></h1></a>
        </div>
      </div>

        <div class="itens-menu">
          <h2>Passagens</h2>
          <ul class="submenu">
            <li>item</li>
            <li>item</li>
          </ul>
        </div>
        <div class="itens-menu">
          <h2>Locais</h2>
          <ul class="submenu">
            <li><a href="<?php echo($paths); ?>postos_rodoviarios.php">Postos Rodoviários</a></li>
            <li><a href="<?php echo($paths); ?>ranking.php">Ranking</a></li>
          </ul>
        </div>
      </div>

    </div>
    <!--  -->
    <?php
      //if($usuario_login == 1){
    ?>
      <!-- <div class="usuario_logado">

      </div> -->
    <?php
      //}else {
    ?>
        <div class="login-menu">
          <?php
          require_once($paths.'../models/usuario_class.php');

          if(isset($_SESSION['nome_usuario'])){
            if($_SESSION['nome_usuario'] != '0'){
          ?>
          <form class="" action="<?php echo($links); ?>index.php"method="post">
          <div class="user_log">
            <?php
              if($_SESSION['imagem_usuario'] == null){
                ?>
                <a href="<?php echo($paths); ?>Usuario/pagina_usuario.php"><img class="img_user" src="img/user2.png" alt="user"></a>
                <?php
              }else{
                ?>
                <a href="<?php echo($paths); ?>Usuario/pagina_usuario.php"><img class="img_user" src="<?php echo($_SESSION['imagem_usuario']); ?>" alt="user"></a>
                <?php
              }
             ?>

            <a href="<?php echo($paths); ?>Usuario/pagina_usuario.php"><div class="nome_usuario"><?php echo($_SESSION['nome_usuario']); ?></div></a>
              <ul class="submenu">
                <li> <a href="<?php echo($paths); ?>Usuario/pagina_usuario.php">Conta</a> </li>
                <li> <button type="submit" name="btnSair">Sair</button> </li>
              </ul>
            </form>
          </div>
          <?php
        }else{
           ?>
           <a class="login" href="#" onclick="Login();"> <h5 class="btn"> <b>Acesso</b> </h5> </a>
           <?php
          }
          ?>
        </div>
    <?php
      }else{
        ?>
          <a class="login" href="#" onclick="Login();"> <h5 class="btn"> <b>Acesso</b> </h5> </a>
        <?php
      }
    ?>

  </div>
</nav>
<!-- Aplica um espaçamento para o conteudo não invadir o menu superior -->
<div class="espaco-do-menu"></div>
