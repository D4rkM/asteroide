<?php

  include('../links.php');

  $links = alterarLinks(true);
  $paths = alterarCaminhos(true);

 ?>
<html>
    <head>
      <title>Modal Detalhes</title>
      <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/style_detalhes.css"/>
    </head>
      <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
        $(".fechar").click(function() {
          $(".modalContainerDetalhes").fadeOut(500);
        });
      });
    </script>
    <body>
        <a href="#" class="fechar">
            <img src="img/excluir.png" alt="excluir">
        </a><br><br>
         Essa rodoviaria fica localizada na Avenida Presidente Vargas, 355 - Itapevi - SP.
    </body>
</html>
