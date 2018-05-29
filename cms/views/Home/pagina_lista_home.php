<div class="lista_home">
  <div class="item_home">Destino</div>
  <div class="item_home">Imagem</div>
  <div class="item_home">Tipo</div>
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
			data: {id:idIten, pagina:'home'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/home_controller.php");
  require_once("../../models/home_class.php");

  $controller_home = new controllerHome();
  $list = $controller_home::Listar();

  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista_home">
  <div class="itens_mostrar_home" <?php echo $list[$cont]->id_viagem ?>><?php echo $list[$cont]->origem." - ".$list[$cont]->destino?></div>
  <div class="itens_mostrar_home"><img class="imagem_lista" src="<?php echo $list[$cont]->imagem ?>" alt="imagem"></div>
  <div class="itens_mostrar_home"><?php echo $list[$cont]->tipo ?></div>
  <div class="itens_mostrar_home">
    <a href="router.php?controller=home&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
