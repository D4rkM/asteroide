<div class="lista_sobre_empresa">
  <div class="item_sobre_empresa">Titulo1</div>
  <div class="item_sobre_empresa">Texto1</div>
  <div class="item_sobre_empresa">Titulo2</div>
  <div class="item_sobre_empresa">Texto2</div>
  <div class="item_sobre_empresa">Imagem</div>
  <div class="item_sobre_empresa">Icone1</div>
  <div class="item_sobre_empresa">Detalhes1</div>
  <div class="item_sobre_empresa">Opções</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(document).ready(function() {
  $(".ver").click(function() {
    $(".modalContainer").fadeIn(500);
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

  $controller_sobreempresa = new controllerSobreEmpresa();
  $list = $controller_sobreempresa::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista_sobre_empresa">
  <div class="itens_mostrar_sobre_empresa"><?php echo $list[$cont]->titulo1 ?></div>
  <div class="itens_mostrar_sobre_empresa"><?php echo $list[$cont]->texto1 ?></div>
  <div class="itens_mostrar_sobre_empresa"><?php echo $list[$cont]->titulo2 ?></div>
  <div class="itens_mostrar_sobre_empresa"><?php echo $list[$cont]->texto2 ?></div>
  <div class="itens_mostrar_sobre_empresa"><img class="imagem_lista" src="<?php echo $list[$cont]->imagem ?>"></div>
  <div class="itens_mostrar_sobre_empresa"><?php echo $list[$cont]->icon1 ?></div>
  <div class="itens_mostrar_sobre_empresa"><?php echo $list[$cont]->detalhes1 ?></div>
  <div class="itens_mostrar_sobre_empresa">
    <a href="router.php?controller=sobreEmpresa&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
