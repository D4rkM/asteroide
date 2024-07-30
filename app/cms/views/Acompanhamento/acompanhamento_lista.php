
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<!-- <script type="text/javascript"></script> -->
<!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> -->

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
			data: {id:idIten, pagina:'acompanhamento'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<div class="list-content top-margin">

  <table class="table" style="overflow-x:auto;">
    <thead class="thead">
      <tr class="thead">
        <th >Viagem</th>
        <th >Latitude do Onibus</th>
        <th >Longetude do Onibus</th>
        <th >Data de registro</th>
        <th >Status da Viagem</th>
        <th >Foto</th>
        <th >Opções</th>
      </tr>
    </thead>


  <tbody class="tbody">
    <?php
  require_once("../../controllers/acompanhamento_controller.php");
  require_once("../../models/acompanhamento_class.php");

  $controllerAcompanhamento = new controllerAcompanhamento();
  $list = $controllerAcompanhamento::Listar();
  $cont = 0;

  while($cont < count($list)){
    $line= 'tr-white';
    if(($cont %2) == 1){
      $line = 'tr-dark';
    }
?>

    <tr class="<?php echo($line); ?>">
      <td class="td"><?php echo $list[$cont]->origem. " - " .$list[$cont]->destino?></td>
      <td class="td"><?php echo $list[$cont]->latitude ?></td>
      <td class="td"><?php echo $list[$cont]->longetude ?></td>
      <td class="td"><?php echo $list[$cont]->data ?></td>
      <td class="td"><?php echo $list[$cont]->status ?></td>
      <td class="td"><img src="img/baseline-remove_red_eye-24px.svg" alt=""></td>
    </tr>
    <?php
    $cont+=1;
  }
?>
  </tbody>

</table>


</div>
