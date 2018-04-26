<div class="lista_vendas">
  <div class="item_vendas">Destino</div>
  <div class="item_vendas">Data</div>
  <div class="item_vendas">Hora</div>
  <div class="item_vendas">Valor</div>
  <div class="item_vendas">Opções</div>
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
			data: {id:idIten, pagina:'vendas'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/vendas_controller.php");
  require_once("../../models/vendas_class.php");

  $controller_vendas = new controllerVendas();
  $list = $controller_vendas::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista_vendas">
  <div class="itens_mostrar_vendas"><?php echo $list[$cont]->destino ?></div>
  <div class="itens_mostrar_vendas"><?php echo $list[$cont]->data ?></div>
  <div class="itens_mostrar_vendas"><?php echo $list[$cont]->hora ?></div>
  <div class="itens_mostrar_vendas"><?php echo $list[$cont]->valor ?></div>
  <div class="itens_mostrar_vendas">
    <a href="router.php?controller=vendas&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
