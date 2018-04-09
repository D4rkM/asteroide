<html>
    <head>
        <title>Modal Login</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style_login.css"/>
    </head>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
     <script>
        $(document).ready(function() {
          $(".fechar").click(function() {
            $(".modalContainerLogin").fadeOut(500);
          });
        });
	</script>

    <body>
      <div class="container-login center">
        <a href="#" class="fechar" style="align-self:flex-end;">
  	    <img src="img/icon/cancel-exit.svg" alt="sair" title="sair">
         </a>
         <form action="home.php" method="post" enctype="multipart/form-data">
           <div class="titulo-conteudo-padrao">
             <h2>LOGIN</h2>
           </div>
           <div class="caixa-dados medium ">
             <label for="login" class="">Email:</label>
             <input class="login" type="text" name="txtlogin" value="">
           </div>
           <div class="caixa-dados medium">
             <label for="senhaLogin">Senha:</label>
             <input id="senhaLogin" class="box_login" type="password" name="txtsenha" value="">
           </div>
           <div class="itens-center">
             <button class="btn" type="submit" name="btnlogar">Logar</button>
           </div>
           <div class="itens-center">
             <img src="img/Facebook.png" alt="redes-sociais">
           </div>
           <div class="itens-center">
             <img src="img/Google.png" alt="redes-sociais">
           </div>
           <div class="itens-center">
             <img src="img/Twitter.png" alt="redes-sociais">
           </div>
           <div class="text-center">
             Não tem conta ainda?
             <a href="#">
               <strong style="color:#162E44;">Cadastre-se</strong>
             </a>
           </div>

         </form>
      </div>
    </body>
</html>
