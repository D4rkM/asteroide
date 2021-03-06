<div class="lista_frotas">
  <div class="item_frotas">Nome</div>
  <div class="item_frotas">Imagem</div>
  <div class="item_frotas">Opções</div>
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
<div class="container_lista_frotas">
  <div class="itens_mostrar_frotas"><?php echo $list[$cont]->nome ?></div>
  <div class="itens_mostrar_frotas"> <img class="imagem_lista" src="<?php echo $list[$cont]->imagem ?>" alt="imagem"> </div>
  <div class="itens_mostrar_frotas">
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
