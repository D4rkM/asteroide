<div class="lista_duvida">
  <div class="item_duvida">Usuario</div>
  <div class="item_duvida">Localização</div>
  <div class="item_duvida">Permição</div>
  <div class="item_duvida">Opções</div>
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

<div class="container_lista">
  <div class="itens_mostrar"></div>
  <div class="itens_mostrar"></div>
  <div class="itens_mostrar"></div>
  <div class="itens_mostrar">
    <a href="router.php?controller=interacao&modo=excluir&id=<?php //echo($list[$cont]->id) ?>">
      <img src="img/icon-delete.png" alt="">
    </a>

    <a href="#" class="ver" onclick="Modal()">
      <img src="img/icon-edit.png" alt="">
    </a>
  </div>
</div>
