<div class="lista_duvida">
  <div class="item_motorista">Nome</div>
  <div class="item_motorista">Email</div>
  <div class="item_motorista">Data de Nascimento</div>
  <div class="item_motorista">Ativo</div>
  <div class="item_motorista">Opções</div>
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
			data: {id:idIten, pagina:'motorista'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/motorista_controller.php");
  require_once("../../models/motorista_class.php");

  $controller_motorista = new controllerMotorista();
  $list = $controller_motorista::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista">
  <div class="itens_mostrar_motorista"><?php echo $list[$cont]->nome ?></div>
  <div class="itens_mostrar_motorista"><?php echo $list[$cont]->email ?></div>
  <div class="itens_mostrar_motorista"><?php echo $list[$cont]->data_nasc ?></div>
  <div class="itens_mostrar_motorista"><?php echo $list[$cont]->ativo ?></div>
  <div class="itens_mostrar_motorista">
    <a href="router.php?controller=motorista&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
