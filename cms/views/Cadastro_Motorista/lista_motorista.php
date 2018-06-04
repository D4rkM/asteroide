

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
<div class="list-content top-margin">

<table class="table">
  <thead class="thead">
    <tr class="thead">
      <th>Nome</th>
      <th>Email</th>
      <th>Data de Nasc.</th>
      <th>Foto</th>
      <th>Ativo</th>
      <th>Opções</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require_once("../../controllers/motorista_controller.php");
    require_once("../../models/motorista_class.php");

    $controller_motorista = new controllerMotorista();
    $list = $controller_motorista::Listar();

    $cont = 0;
    while($cont < count($list)){
      ?>
    <tr>
      <td><?php echo $list[$cont]->nome ?></td>
      <td class="td"><?php echo $list[$cont]->email ?></td>
      <td class="td"><?php echo $list[$cont]->data_nasc ?></td>
      <td class="td"><?php echo $list[$cont]->imagem ?></td>
      <td><?php echo $list[$cont]->ativo ?></td>
      <td><a href="router.php?controller=motorista&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
          <img src="img/icon-delete.png" alt="">
        </a>
      <a href="#" class="ver" onclick="Modal(<?php echo($list[$cont]->id);?>)">
          <img src="img/icon-edit.png" alt="">
      </a></td>
    </tr>
    <?php
    $cont+=1;
  }
  ?>
  </tbody>
</table>
</div>
