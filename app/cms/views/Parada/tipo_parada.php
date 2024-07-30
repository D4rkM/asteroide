<?php
   require_once("../../controllers/tipo_parada_controller.php");
   require_once("../../models/tipo_parada_class.php");
?>
  <!-- Lista de Estados -->
<div class="container_estados">
  <div class="list_estado">
    <div class="itens_estado">
      Tipo de Parada
    </div>
    <div class="itens_estado">
      OPÇÕES
    </div>
  </div>

<script type="text/javascript" src="js/jquery.js"></script>
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
    			data: {id:idIten, pagina:'tipo_parada'},
    			success: function(dados){
    				$('.modal').html(dados);
    			}
    		});
    	}
</script>
<?php
  require_once("../../controllers/tipo_parada_controller.php");
  require_once("../../models/tipo_parada_class.php");

  $controllerTipoParada = new controllerTipoParada();
  $list = $controllerTipoParada::Listar();

  $cont = 0;
  while($cont < count($list)){
?>
    <div class="container_lista_estado">
      <div class="itens_mostrar_estado">
        <?php echo $list[$cont]->tipo_parada ?>
      </div>

      <div class="itens_mostrar_estado">
        <a href="router.php?controller=tipo_parada&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
  </div>

  <form class="frmEstadosPostos" action="router.php?controller=tipo_parada&modo=novo" method="post">
  <div class="cadastro_destino">
    <div class="text_postos">Tipo de Parada</div>
    <input class="box_postos" type="text" name="tipo_parada">
    <input class="salvar_postos" type="submit" name="btnsalvar" value="Salvar">
  </div>
</form>
