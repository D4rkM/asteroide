<link rel="stylesheet" href="css/acompanhamento.css">
<div class="lista_acompanha">
  <div class="item_acompanha">Viagem</div>
  <div class="item_acompanha">Latitude do Onibus</div>
  <div class="item_acompanha">Longetude do Onibus</div>
  <div class="item_acompanha">Data de registro</div>
  <div class="item_acompanha">Status da Viagem</div>
  <div class="item_acompanha">Opções</div>
</div>

<script type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

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
			data: {id:idIten, pagina:'acompanhamento'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/acompanhamento_controller.php");
  require_once("../../models/acompanhamento_class.php");

  $controllerAcompanhamento = new controllerAcompanhamento();
  $list = $controllerAcompanhamento::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista_acompanha">
  <div class="itens_mostrar_acompanha"><?php echo $list[$cont]->latitude ?></div>
  <div class="itens_mostrar_acompanha"><?php echo $list[$cont]->longetude ?></div>
  <div class="itens_mostrar_acompanha"><?php echo $list[$cont]->data ?></div>
  <div class="itens_mostrar_acompanha"><?php echo $list[$cont]->status ?></div>
  <div class="itens_mostrar_acompanha"><?php echo $list[$cont]->viagem ?></div>
  <div class="itens_mostrar_acompanha"></div>
</div>
<?php
    $cont+=1;
  }
?>
