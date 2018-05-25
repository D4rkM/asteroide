<div class="lista_viagem">
  <div class="item_viagem">Data Saida</div>
  <div class="item_viagem">Data Chegada</div>
  <div class="item_viagem">Descricão</div>
  <div class="item_viagem">Pacote Viagem</div>
  <div class="item_viagem">Opções</div>
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


  require_once("../../controllers/pacote_viagem_controller.php");
  require_once("../../models/pacote_viagem_class.php");


  $controllerViagem = new controllerViagem();
  $list = $controllerViagem::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista_viagem">
  <div class="itens_mostrar_viagem"><?php echo $list[$cont]->saida ?></div>
  <div class="itens_mostrar_viagem"><?php echo $list[$cont]->chegada ?></div>
  <div class="itens_mostrar_viagem"><?php echo $list[$cont]->descricao ?></div>

  <div class="itens_mostrar_viagem"><?php
    $controllerPacoteViagem = new controllerPacoteViagem();
    $pacote_viagem = $controllerPacoteViagem::buscar($list[$cont]->pacote_viagem);
    echo($pacote_viagem->origem. " X " . $pacote_viagem->destino);
   ?></div>

  <div class="itens_mostrar_viagem">
    <a href="router.php?controller=viagem&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
