<html>
    <head>
      <title>Modal Detalhes</title>
        <link rel="stylesheet" type="text/css" href="css/style_detalhes.css"/>
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
    </head>
    <script>
        $(document).ready(function() {
          $(".fechar").click(function() {
            $(".modalContainerDetalhes").slideToggle(1000);
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
