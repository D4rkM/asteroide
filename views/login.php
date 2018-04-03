<html>
    <head>
        <title>Modal Login</title>
        <link rel="stylesheet" type="text/css" href="css/style_login.css"/>
    </head>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
     <script>
        $(document).ready(function() {
          $(".fechar").click(function() {
            $(".modalContainerLogin").slideToggle(1000);
          });
        });
	</script>
       
    <body>
            <a href="#" class="fechar">
				    <img src="img/excluir.png">
			    </a>
             <form action="home.php" method="post" enctype="multipart/form-data">
               <h1>Login</h1><br>
               <div class="txt_login">Email:</div>
               <input class="box_login" type="text" name="txtlogin" value=""><br>
               <div class="txt_login">Senha:</div>
               <input class="box_login" type="password" name="txtsenha" value=""><br><br>
               <input class="btn_login" type="submit" name="btnlogar" value="Logar"><br><br>
               <div class="img_login"> <img src="img/Facebook.png" alt="redes-sociais"> </div>
               <div class="img_login"> <img src="img/Google.png" alt="redes-sociais"> </div>
               <div class="img_login"> <img src="img/Twitter.png" alt="redes-sociais"> </div><br><br>
               <div class="texto_login">Não tem conta ainda? <strong>Cadastre-se</strong> </div>
             </form>
       
    </body>
</html>
