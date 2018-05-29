<link rel="stylesheet" href="css/parada.css">
<div class="lista_parada">
  <div class="item_parada">Tipo de Parada</div>
  <div class="item_parada">Endereço</div>
  <div class="item_parada">Opções</div>
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
        <div class="container_lista_parada">
          <div class="itens_mostrar_parada"><?php echo $list[$cont]->tipo_parada ?></div>
          <div class="itens_mostrar_parada"><?php echo $list[$cont]->rua ?></div>
          <div class="itens_mostrar_parada">
            <a href="router.php?controller=parada&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
