<div class="lista_interacao">
  <div class="item_interacao">Usuario</div>
  <div class="item_interacao">Localização</div>
  <div class="item_interacao">Imagem</div>
  <div class="item_interacao">Comentario</div>
  <div class="item_interacao">Opções</div>
</div>

<script type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script>
          function Ativar(IdIten){
              //anula a ação do submit tradicional "botao" ou F5
              event.preventDefault();
              $.ajax({
                  type:"GET",
                  data: {id:IdIten},

                  url: "router.php?controller=interacao&modo=ativar&id="+IdIten,
                  success: function(dados){
                      $('').html(dados);
                      // alert(IdIten,idAtivo);
                      // Console.log(IdIten);
                      <?php
                      // die;
                       ?>
                  }
              });
          }
        //Desativar
            function Desativar(IdIten){
                //anula a ação do submit tradicional "botao" ou F5
                event.preventDefault();
                $.ajax({
                    type:"GET",
                    data: {id:IdIten},
                    url: "router.php?controller=interacao&modo=desativar&id="+IdIten,
                    success: function(dados){
                        $('').html(dados);
                        // alert(IdIten);
                        <?php
                        // die;
                         ?>
                    }
                });
            }
</script>
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
			data: {id:idIten, pagina:'interacao'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/interacao_controller.php");
  require_once("../../models/interacao_class.php");

  $controller_interacao = new controllerInteracao();
  $list = $controller_interacao::Lista();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista_interacao">
  <div class="itens_mostrar_interacao"><?php echo $list[$cont]->id_usuario ?></div>
  <div class="itens_mostrar_interacao"><?php echo $list[$cont]->local ?></div>
  <div class="itens_mostrar_interacao"><img class="imagem_lista" src="<?php echo $list[$cont]->imagem ?>" alt=""> </div>
  <div class="itens_mostrar_interacao"><?php echo $list[$cont]->comentario ?></div>
  <div class="itens_mostrar_interacao">
    <?php
        $ativar=null;
        $imagem=null;
        if($list[$cont]->ativo==1){
            $ativar="Desativar";
            $imagem='ligar.png';
        }else if($list[$cont]->ativo==0){
            $ativar="Ativar";
            $imagem='desligar.png';
        }
    ?>
    <a href="#" class="desativar" onclick="<?php echo($ativar)?>(<?php echo($list[$cont]->id);?>)">
        <img  src="img/<?php echo($imagem)?>">
    </a>
    <a href="router.php?controller=interacao&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
      <img src="img/icon-delete.png" alt="">
    </a>
  </div>
</div>
<?php
    $cont+=1;
  }
?>
