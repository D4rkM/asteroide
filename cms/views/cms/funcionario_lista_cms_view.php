
<div class="menu-list-funcionario">

  <div class="itens-list-funcionario">
    NOME
  </div>
  <div class="itens-list-funcionario">
    CELULAR
  </div>
  <div class="itens-list-funcionario">
    TELEFONE
  </div>
  <div class="itens-list-funcionario">
    EMAIL
  </div>
  <div class="itens-list-funcionario">
    CPF
  </div>
  <div class="itens-list-funcionario">
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
			data: {id:idIten},
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
    <div class="container-itens-list-funcionario">
      <div class="itens-list-funcionario-mostrar">
        <?php echo $list[$cont]->nome ?>
      </div>
      <div class="itens-list-funcionario-mostrar">
        <?php echo $list[$cont]->celular ?>
      </div>
      <div class="itens-list-funcionario-mostrar">
        <?php echo $list[$cont]->telefone ?>
      </div>
      <div class="itens-list-funcionario-mostrar">
        <?php echo $list[$cont]->email ?>
      </div>
      <div class="itens-list-funcionario-mostrar">
        <?php echo $list[$cont]->cpf ?>
      </div>
      <div class="itens-list-funcionario-mostrar">
        <?php
          if($list[$cont]->ativo == 1){
            echo "Ativado";
          }else{
            echo "Desativado";
          }
         ?>

        <a href="#" class="ver" onclick="Modal(<?php echo($list[$cont]->id);?>)">
          <img src="img/icon-edit.png" alt="">
        </a>

      </div>

    </div>
    <?php
    $cont+=1;
  }

?>
