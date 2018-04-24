<div class="lista_onibus">
  <div class="item_onibus">Placa</div>
  <div class="item_onibus">Numeros_poltronas</div>
  <div class="item_onibus">Km rodado</div>
  <div class="item_onibus">KM para manutenção</div>
  <div class="item_onibus">Detalhes</div>
  <div class="item_onibus">Imagem do onibus</div>
  <div class="item_onibus">Classe</div>
  <div class="item_onibus">Status de manutenção</div>
</div>
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
			data: {id:idIten, pagina:'onibus'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/onibus_controller.php");
  require_once("../../models/onibus_class.php");

  $controller_onibus = new controllerOnibus();
  $list = $controller_onibus::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista">
  <div class="itens_mostrar"><?php echo $list[$cont]->placa ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->numeros_poltronas ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->km_rodado ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->status_manutencao ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->km_manutencao ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->descricao ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->status_manutencao ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->imagem ?></div>
  <div class="itens_mostrar"></div>
  <div class="itens_mostrar">
    <a href="router.php?controller=onibus&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
