
<div class="menu-list-pagina">

 <div class="itens-list-pagina">
    Data de alteração
  </div>
  <div class="itens-list-pagina">
    Titulo
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
			data: {id:idIten, pagina:'sobre_empresa'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php

  require_once("../../controllers/sobre_empresa_controller.php");
  require_once("../../models/sobre_empresa_class.php");

  $controllerSobreEmpresa = new controllerSobreEmpresa();

  $list = $controllerSobreEmpresa::Listar();

  $cont = 0;

  while($cont < count($list)){
    ?>
    <div class="container-itens-list-pagina">

      <div class="itens-list-pagina-mostrar">
        <?php echo $list[$cont]->datainseri ?>
      </div>
      <div class="itens-list-pagina-mostrar">
        <?php echo $list[$cont]->titulo ?>
      </div>
      <div class="itens-list-pagina-mostrar">
        <a href="router.php?controller=sobre_empresa&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
