<?php
   require_once("../../controllers/parada_controller.php");
   require_once("../../models/parada_class.php");
?>

  <!-- Lista de Estados -->
  <div class="container_estados">
<div class="list_estado">
    <div class="itens_estado">
      Parada
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
    			data: {id:idIten, pagina:'parada'},
    			success: function(dados){
    				$('.modal').html(dados);
    			}
    		});
    	}
    </script>
    <?php

    require_once("../../controllers/parada_controller.php");
    require_once("../../models/parada_class.php");

      $parada = new controllerParada();

      $list = $parada::Listar();

      $cont = 0;

      while($cont < count($list)){
        ?>
        <div class="container_lista_estado">
          <div class="itens_mostrar_estado">
            <?php echo $list[$cont]->nome ?>
          </div>

          <div class="itens_mostrar_estado">
            <a href="router.php?controller=paradao&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
  <form class="frmEstadosPostos" action="router.php?controller=parada&modo=novo" method="post">
  <!-- Cadastro de Estados -->
  <div class="cadastro_estado">
    <div class="text_postos">Nome da Parada</div>
    <input class="box_postos" type="text" name="txtnome">
    <input class="salvar_postos" type="submit" name="btnsalvar" value="Salvar">
  </div>
</form>
