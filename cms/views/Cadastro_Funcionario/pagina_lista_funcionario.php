<div class="lista_funcionario">
  <div class="item_funcionario">Nome</div>
  <div class="item_funcionario">Email</div>
  <div class="item_funcionario">Data de Nasc.</div>
  <div class="item_funcionario">Ativo</div>
  <div class="item_funcionario">Opções</div>
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
			data: {id:idIten, pagina:'funcionario'},
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
<div class="container_lista_funcionario">
  <div class="itens_mostrar_funcionario"><?php echo $list[$cont]->nome ?></div>
  <div class="itens_mostrar_funcionario"><?php echo $list[$cont]->email ?></div>
  <div class="itens_mostrar_funcionario"><?php echo $list[$cont]->data_nasc ?></div>
  <div class="itens_mostrar_funcionario"><?php //echo $list[$cont]->data_nasc ?></div>
  <div class="itens_mostrar_funcionario">
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
