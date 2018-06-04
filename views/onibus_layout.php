<?php
  //session_start();
  $idViagem = $_POST['id_viagem'];
  $TotalPoltronas = $_POST['poltronas'];

  require_once('../models/registro_passagem_class.php');
  require_once('../controllers/registro_passagem_controller.php');

  $ocupadas = new RegistroPassagemController();
  $ocupadas = $ocupadas::buscarPoltronas($idViagem);

  // echo count($lista_ocupadas);
  // Desabilita as poltronas já compradas
  function verificaOcupacao($polt_num, $lista_ocupadas){
    if($lista_ocupadas){

      echo count($lista_ocupadas);
      $cont = 0;
      while($cont < sizeof($lista_ocupadas)){
        if($polt_num == $lista_ocupadas[$cont]->num_poltrona){
          echo 'disabled';
          return;
        }
        $cont ++;
      }
  }
  }
  // Estiliza a label da checkbox para aparecer como ocupada
  function verificaOcupacaoLabel($polt_num, $lista_ocupadas){
    if($lista_ocupadas){

      $cont = 0;
      while($cont < sizeof($lista_ocupadas)){
        if($polt_num == $lista_ocupadas[$cont]->num_poltrona){
          echo 'style="background-color:grey; pointer-events:none;"';
          return;
        }
        $cont ++;
      }
    }
  }
  // Indica ao data-attribute (usado na logica em javascript)
  // qual poltrona está ocupada / selecionada / livre
  function setaCor($polt_num, $lista_ocupadas){
    if($lista_ocupadas){

      $cont = 0;
      while($cont < sizeof($lista_ocupadas)){
        if($polt_num == $lista_ocupadas[$cont]->num_poltrona){
          echo('2');
          return;
        }else{
          if(($cont+1)==sizeof($lista_ocupadas)){
            echo('0');
          }
        }
        $cont ++;
      }
    }
  }

 ?>
<form id="_comprar" action="router.php?controller=registro_passagem&modo=selecao_polt" enctype="multipart/form-data" method="post">
  <div class="legenda">
    <div class="leg_hold">
      <div class="leg_box" style="background-color:green;"></div><div class="leg_text">Disponivel</div>
    </div>
    <div class="leg_hold">
      <div class="leg_box" style="background-color:yellow;"></div><div class="leg_text">Selecionado</div>
    </div>
    <div class="leg_hold">
      <div class="leg_box" style="background-color:grey;"></div><div class="leg_text">Ocupado</div>
    </div>
  </div>

   <div class="onibus">
       <input type="hidden" name="idviagem" value="<?php echo($idViagem); ?>" >
     <div class="fileira">

       <?php
        $a = 0;
        while($a < $TotalPoltronas){

          $a++;
          ?>
          <div class="fileira_corredor">

            <label for="polt" data-num_polt="<?php echo($a); ?>"data-polt="<?php setaCor($a,$ocupadas); ?>" class="poltronas" <?php verificaOcupacaoLabel($a, $ocupadas); ?>><?php echo $a; ?></label>
            <input id="<?php echo('a_'.$a); ?>"class="polt" type="checkbox" name="poltrona[]" value="<?php echo $a; ?>" style="display:none; opacity:0;" <?php verificaOcupacao($a, $ocupadas); ?>>
          <?php
          $a ++;

          ?>
            <label for="polt" data-num_polt="<?php echo($a); ?>"data-polt="<?php setaCor($a, $ocupadas); ?>" class="poltronas" <?php verificaOcupacaoLabel($a, $ocupadas); ?>><?php echo $a; ?></label>
            <input id="<?php echo('a_'.$a); ?>"class="polt" type="checkbox" name="poltrona[]" value="<?php echo $a; ?>" style="display:none; opacity:0;" <?php verificaOcupacao($a, $ocupadas); ?>>
          </div>
          <?php
        }
        ?>

    </div>
  </div>
  <button type="submit" name="btnComprar" class="btn btn_enviar">Continuar Compra</button>
</form>
