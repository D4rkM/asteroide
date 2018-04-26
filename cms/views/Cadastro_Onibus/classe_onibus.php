<?php
   require_once("../../controllers/classe_onibus_controller.php");
   require_once("../../models/classe_onibus_class.php");
?>

  <!-- Lista de Estados -->
  <div class="container_estados">
<div class="list_estado">
    <div class="itens_estado">
      Classe do Onibus
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
    			data: {id:idIten, pagina:'classe'},
    			success: function(dados){
    				$('.modal').html(dados);
    			}
    		});
    	}
    </script>
    <?php
      require_once("../../controllers/classe_onibus_controller.php");
      require_once("../../models/classe_onibus_class.php");

      $classe_onibus = new controllerClasseOnibus();

      $list = $classe_onibus::Listar();

      $cont = 0;

      while($cont < count($list)){
        ?>
        <div class="container_lista_estado">
          <div class="itens_mostrar_estado">
            <?php echo $list[$cont]->classe ?>
          </div>

          <div class="itens_mostrar_estado">
            <a href="router.php?controller=classe_onibus&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
  <form class="frmEstadosPostos" action="router.php?controller=classe_onibus&modo=novo" method="post">
  <!-- Cadastro de Estados -->
  <div class="cadastro_classe">
    <div class="text_postos">Nome da Classe</div>
    <input class="box_postos" type="text" name="txtclasse">
    <input class="salvar_postos" type="submit" name="btnsalvar" value="Salvar">
  </div>
</form>
