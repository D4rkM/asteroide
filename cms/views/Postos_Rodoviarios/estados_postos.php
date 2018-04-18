<?php
   require_once("../../controllers/estados_postos_controller.php");
   require_once("../../models/estados_postos_class.php");
?>

  <!-- Lista de Estados -->
  <div class="container_estados">
<div class="list_estado">
    <div class="itens_estado">
      Estado
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
    			url: "views/cms/modal.php",
    			data: {id:idIten, pagina:'estado_postos'},
    			success: function(dados){
    				$('.modal').html(dados);
    			}
    		});
    	}
    </script>
    <?php

      require_once("../../controllers/estados_postos_controller.php");
      require_once("../../models/estados_postos_class.php");

      $estados_postos = new controllerEstadosPostos();

      $list = $estados_postos::Listar();

      $cont = 0;

      while($cont < count($list)){
        ?>
        <div class="container_lista_estado">
          <div class="itens_mostrar_estado">
            <?php echo $list[$cont]->estado ?>
          </div>

          <div class="itens_mostrar_estado">
            <a href="router.php?controller=estado_postos&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
  <form class="frmEstadosPostos" action="router.php?controller=estado_postos&modo=novo" method="post">
  <!-- Cadastro de Estados -->
  <div class="cadastro_estado">
    <div class="text_postos">Nome do estado</div>
    <input class="box_postos" type="text" name="txtestado">
    <input class="salvar_postos" type="submit" name="btnsalvar" value="Salvar">
  </div>
</form>
