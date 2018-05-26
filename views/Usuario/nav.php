<?php
  session_start();

 ?>
<!-- Menu Superior -->
<nav>
  <div class="menu-container" id="men" style="background-color:#162E44;">
    <div class="login-menu">

    </div>

    <!-- Área com Itens e Logo do menu superior -->
    <div class="conteudo-menu">
      <div class="segura-itens-menu">
        <div class="itens-menu">
          <h2>Empresa <img src="<?php echo($links); ?>../img/icon/down.svg" alt="" style="width:20px; height:20px;"> </h2>
          <ul class="submenu">
            <li><a href="<?php //echo($paths); ?>../sobre_empresa.php">Sobre a Empresa</a></li>
            <li><a href="<?php //echo($paths); ?>../fale_conosco.php">Fale Conosco</a></li>
            <li><a href="<?php //echo($paths); ?>../frotas.php">Nossas Frotas</a></li>
          </ul>
        </div>
        <div class="itens-menu">
          <h2>Blog</h2>
          <ul class="submenu">
            <li><a href="../interacao.php">Interação</a></li>
            <li>item</li>
          </ul>
        </div>


      <div class="itens-menu">
        <div class="logo-menu">
          <a href="../../index.php"><h1 style="margin:0px;"><img src="<?php echo($links); ?>../img/logo.png" alt="Logo"></h1></a>
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
            <li><a href="<?php //echo($paths); ?>../postos_rodoviarios.php">Postos Rodoviários</a></li>
            <li><a href="<?php //echo($paths); ?>../ranking.php">Ranking</a></li>
          </ul>
        </div>
      </div>

    </div>
    <?php
    require_once('../../models/usuario_class.php');

    if(isset($_SESSION['nome_usuario'])){
    ?>

     <a href="<?php echo($paths); ?>../../index.php"><img class="img_user" src="<?php echo($_SESSION['nome_imagem']); ?>" alt="user"></a>
    <a href="<?php echo($paths); ?>../../index.php"><div class=""><?php echo($_SESSION['nome_usuario']); ?></div></a>

    <?php
  }
     ?>
  </div>
</nav>
<!-- Aplica um espaçamento para o conteudo não invadir o menu superior -->
<div class="espaco-do-menu"></div>