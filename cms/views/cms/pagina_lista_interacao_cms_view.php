
<div class="menu-list-pagina">

 <div class="itens-list-pagina">
    teste3
  </div>
  <div class="itens-list-pagina">
    teste4
  </div>
  <div class="itens-list-pagina">
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
			data: {id:idIten, pagina:'duvida'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php

  require_once("../../controllers/duvidas_controller.php");
  require_once("../../models/duvidas_class.php");

  $controller_duvidas = new controllerDuvidas();

  $list = $controller_duvidas::Listar();

  $cont = 0;

  while($cont < count($list)){
    ?>
    <div class="container-itens-list-pagina">

      <div class="itens-list-pagina-mostrar">
        <?php echo $list[$cont]->pergunta ?>
      </div>
      <div class="itens-list-pagina-mostrar">
        <?php echo $list[$cont]->resposta ?>
      </div>
      <div class="itens-list-pagina-mostrar">
        <a href="router.php?controller=duvida&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
