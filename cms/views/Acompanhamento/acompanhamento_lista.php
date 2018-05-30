<div class="lista_interacao">
  <div class="item_interacao">Viagem</div>
  <div class="item_interacao">Latitude do Onibus</div>
  <div class="item_interacao">Longetude do Onibus</div>
  <div class="item_interacao">Data de registro</div>
  <div class="item_interacao">Status da Viagem</div>
  <div class="item_interacao">Opções</div>
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
  // require_once("../../controllers/acompanhamento_controller.php");
  // require_once("../../models/acompanhamento_class.php");
  //
  // $controllerAcompanhamento = new controllerAcompanhamento();
  // $list = $controllerAcompanhamento::Lista();
  // $cont = 0;
  //
  // while($cont < count($list)){
?>
<div class="container_lista_interacao">
  <div class="itens_mostrar_interacao"><?php //echo $list[$cont]->id_usuario ?></div>
  <div class="itens_mostrar_interacao"><?php //echo $list[$cont]->local ?></div>
  <div class="itens_mostrar_interacao"><img class="imagem_lista" src="<?php //echo $list[$cont]->imagem ?>" alt=""> </div>
  <div class="itens_mostrar_interacao"><?php //echo $list[$cont]->comentario ?></div>
  <div class="itens_mostrar_interacao">

    <a href="router.php?controller=acompanhamento&modo=excluir&id=<?php //echo($list[$cont]->id) ?>">
      <img src="img/icon-delete.png" alt="">
    </a>
  </div>
</div>
<?php
  //   $cont+=1;
  // }
?>
