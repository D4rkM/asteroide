<div class="lista_pacote_viagem">
  <div class="item_pacote_viagem">Titulo</div>
  <div class="item_pacote_viagem">Descricão</div>
  <div class="item_pacote_viagem">Opções</div>
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
			data: {id:idIten, pagina:'viagem'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/viagem_controller.php");
  require_once("../../models/viagem_class.php");

  $controllerViagem = new controllerViagem();
  $list = $controllerViagem::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista_pacote_viagem">
  <div class="itens_mostrar_pacote_viagem"><?php echo $list[$cont]->titulo ?></div>
  <div class="itens_mostrar_pacote_viagem"><?php echo $list[$cont]->descricao ?></div>
  <div class="itens_mostrar_pacote_viagem">
    <a href="router.php?controller=pacote_viagem&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
