<div class="lista_duvida">
  <div class="item_duvida">Nome</div>
  <div class="item_duvida">Email</div>
  <div class="item_duvida">Data de Nascimento</div>
  <div class="item_duvida">Opções</div>
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
			url: "views/cms/modal.php",
			data: {id:idIten, pagina:'duvida'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/funcionario_controller.php");
  require_once("../../models/funcionario_class.php");

  $controller_funcionario = new controllerFuncionario();
  $list = $controller_funcionario::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista">
  <div class="itens_mostrar"><?php echo $list[$cont]->nome ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->email ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->data_nasc ?></div>
  <div class="itens_mostrar">
    <a href="router.php?controller=funcionario&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
