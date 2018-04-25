<div class="lista_duvida">
  <div class="item_home">Latitule</div>
  <div class="item_home">Longitude</div>
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
			data: {id:idIten, pagina:'caminho'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once('../../controllers/caminho_controller.php');
  require_once('../../models/caminho_class.php');

  $controller_caminho = new controllerCaminho();
  $list = $controller_caminho::Listar();

  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista">
  <div class="itens_mostrar_home"><?php echo $list[$cont]->latitude ?></div>
  <div class="itens_mostrar_home"><?php echo $list[$cont]->longitude ?></div>
  <div class="itens_mostrar_home">
    <a href="router.php?controller=caminho&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
