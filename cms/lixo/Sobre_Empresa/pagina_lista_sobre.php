<div class="lista_empresa">
  <div class="item_empresa">Titulo</div>
  <div class="item_empresa">Imagem</div>
  <div class="item_empresa">Opções</div>
</div>

<script type="text/javascript"></script>
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
			url: "views/modal.php",
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

$controller_empresa = new controllerSobreEmpresa();
$list = $controller_empresa::Listar();
$cont = 0;

while($cont < count($list)){

 ?>
<div class="container_lista_empresa">
  <div class="itens_mostrar_empresa"><?php echo $list[$cont]->titulo1 ?></div>
  <div class="itens_mostrar_empresa"><?php echo $list[$cont]->imagem ?></div>
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
