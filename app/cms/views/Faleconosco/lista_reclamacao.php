<div class="lista_faleconosco">
  <div class="item_faleconosco">Comentario</div>
  <div class="item_faleconosco">Email</div>
  <div class="item_faleconosco">Opções</div>
</div>

<?php
  require_once("../../controllers/faleconosco_controller.php");
  require_once("../../models/faleconosco_class.php");

  $controllerReclamacao = new controllerReclamacao();
  $list = $controllerReclamacao::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista_faleconosco">
  <div class="itens_mostrar_faleconosco"><?php echo $list[$cont]->reclamacao ?></div>
  <div class="itens_mostrar_faleconosco"><?php echo $list[$cont]->email ?></div>
  <div class="itens_mostrar_faleconosco">
    <a href="router.php?controller=faleconosco&modo=reclamacao&id=<?php echo($list[$cont]->id) ?>">
      <img src="img/icon-delete.png" alt="">
    </a>
  </div>
</div>
<?php
    $cont+=1;
  }
?>
