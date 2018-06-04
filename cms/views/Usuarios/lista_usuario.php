

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
			data: {id:idIten, pagina:'usuario'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<div class="list-content top-margin" style="overflow:auto;">

  <table class="table">
    <thead class="thead">
      <tr class="thead">
        <th >Nome</th>
        <th >Email</th>
        <th >Celular</th>
        <!-- <div class="item_duvida">Ativar</div> -->
        <th >Opções</th>
      </tr>
    </thead>
    <?php
    require_once("../../controllers/usuario_controller.php");
    require_once("../../models/usuario_class.php");

    $controller_usuraio = new controllerUsuario();
    $list = $controller_usuraio::Listar();
    $cont = 0;

    while($cont < count($list)){
      ?>
      <tbody>
        <tr>
          <td class="itens_mostrar"><?php echo $list[$cont]->nome ?></td>
          <td class="itens_mostrar"><?php echo $list[$cont]->email ?></td>
          <td class="itens_mostrar"><?php echo $list[$cont]->celular ?></td>
          <!-- <div class="itens_mostrar"><?php// echo $list[$cont]->Ativar ?></div> -->
          <td class="itens_mostrar">
            <a href="router.php?controller=usuario&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
              <img src="img/icon-delete.png" alt="">
            </a>

            <a href="#" class="ver" onclick="Modal(<?php echo($list[$cont]->id);?>)">
              <img src="img/icon-edit.png" alt="">
            </a>
          </td>
        </tr>
        <?php
        $cont+=1;
      }
      ?>
      </tbody>
  </table >
</div>
