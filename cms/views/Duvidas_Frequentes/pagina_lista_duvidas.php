<div class="lista_duvida">
  <div class="item_home">Pergunta</div>
  <div class="item_home">Resposta</div>
  <div class="item_home">Ativo</div>
  <div class="item_home">Opções</div>
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
<div class="container_lista">
  <div class="itens_mostrar_home"><?php echo $list[$cont]->pergunta ?></div>
  <div class="itens_mostrar_home"><?php echo $list[$cont]->resposta ?></div>
  <div class="itens_mostrar_home"><?php echo $list[$cont]->aparecer ?></div>
  <div class="itens_mostrar_home">
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
