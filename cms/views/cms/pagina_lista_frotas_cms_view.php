
<div class="menu-list-pagina-frotas">

 <div class="itens-list-pagina-frotas">
    Data de Inserção
  </div>
  <div class="itens-list-pagina-frotas">
    Nome do Onibus
  </div>
  <div class="itens-list-pagina-frotas">
    Imagem
  </div>

  <div class="itens-list-pagina-frotas">
    OPÇÕES
  </div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>

<script>
$(document).ready(function() {

  $(".ver").click(function() {
    $(".modalContainer").fadeIn(500);
	//slideToggle
	//toggle
	//FadeIn
  });
});



	function Modal(idIten){
		$.ajax({
			type: "POST",
			url: "views/cms/modal.php",
			data: {id:idIten, pagina:'frotas'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php

  require_once("../../controllers/frotas_controller.php");
  require_once("../../models/frotas_class.php");

  $controller_frotas = new controllerFrotas();

  $list = $controller_frotas::Listar();

  $cont = 0;

  while($cont < count($list)){
    ?>
    <div class="container-itens-list-pagina-frotas">

      <div class="itens-list-pagina-mostrar-frotas">
        <?php echo $list[$cont]->datainseri ?>
      </div>
      <div class="itens-list-pagina-mostrar-frotas">
        <?php echo $list[$cont]->nome ?>
      </div>
      <div class="itens-list-pagina-mostrar-frotas">
        <?php echo $list[$cont]->imagem ?>
      </div>
      <div class="itens-list-pagina-mostrar-frotas">
        <a href="router.php?controller=frotas&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
          <img src="img/icon-delete.png" alt="">
        </a>

        <a href="#" class="ver" onclick="Modal(<?php echo($list[$cont]->id);?>)">
          <img src="img/icon-edit.png" alt="">
        </a>

      </div>

    </div>
    <?php
    $cont+=1;
  }

?>
