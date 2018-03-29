


<div class="area-total-login">
  <div class="logo-login">
    <img src="img/logo-cms.png" width="100px" height="100px" alt="">
  </div>
  <div class="titulo-login-cms">
    ÁREA ADMINISTRATIVA
  </div>
  <form class="" action="router.php?controller=funcionario&modo=login" method="post">
    <div class="itens-login-container">

      <div class="usuario-senha-txt">
        Usuário:
      </div>
      <div class="area-txt">
        <input type="text" name="txtUsuario" value="" placeholder="Seu usuário" required maxlength="12">
      </div>
      <div class="usuario-senha-txt">
        Senha:
      </div>
      <div class="area-txt">
        <input type="password" name="txtSenha" value="" placeholder="Ex: *****" required maxlength="8">
      </div>

      <div class="btnLogin">
        <input type="submit" name="btnLogin" value="Entrar">
      </div>
    </div>
  </form>
  <div class="areaMensagem">

    <?php

    if(isset($_SESSION['erro'])){
      echo $_SESSION['erro'];
    }

     ?>
  </div>
</div>
