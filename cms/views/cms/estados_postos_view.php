

<?php

  require_once("../../controllers/estados_postos_controller.php");
  require_once("../../models/estados_postos_class.php");

?>
<form class="frmEstadosPostos" action="router.php?controller=estados_postos&modo=novo" method="post">
  <!-- Lista de Estados -->
  <div class="area_estado_postos">
    <h2>Lista de estados dos postos rodoviarios</h2>
    <div class="menu-list-pagina">
     <div class="itens-list-pagina">
        Data de Inserção
      </div>
      <div class="itens-list-pagina">
        Estado
      </div>
      <div class="itens-list-pagina">
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

      require_once("../../controllers/duvidas_controller.php");
      require_once("../../models/duvidas_class.php");

      $controller_duvidas = new controllerDuvidas();

      $list = $controller_duvidas::Listar();

      $cont = 0;

      while($cont < count($list)){
        ?>
        <div class="container-itens-list-pagina">

          <div class="itens-list-pagina-mostrar">
            <?php echo $list[$cont]->datainseri ?>
          </div>
          <div class="itens-list-pagina-mostrar">
            <?php echo $list[$cont]->estado ?>
          </div>
          <div class="itens-list-pagina-mostrar">
            <a href="router.php?controller=estados_postos&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
  <!-- Cadastro de Estados -->
  <div class="area_estado_postos">
    <h2>Cadastro de estados para postos rodoviarios</h2>
    <h3>Data de inserção</h3>
    <input id="datainsercao" class="box_text2" type="text" name="txtdatainsercao" maxlength="10">
    <h3>Nome do estado</h3>
    <input class="box_text" type="text" name="txtestado">
    <input type="submit" name="btnsalvar" value="Salvar">
  </div>
</form>
