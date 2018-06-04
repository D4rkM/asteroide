<?php
  session_start();
  $poltrona_selecionada = array();
  $meses = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
  $ano = date("Y");
  $anos = array($ano, $ano+1, $ano+2, $ano+3,$ano+4);

  // var_dump($_SESSION['_idViagem']);

    if(isset($_SESSION['id_usuario'])){
      // echo("id = OK");
      if(isset($_SESSION["_selected"])){

          $cont = 0;
          foreach($_SESSION['_selected'] as $poltronas){
            $poltrona_selecionada[$cont] = $poltronas;
            // echo($poltrona_selecionada[$cont]."\n");
            $cont ++;
          }


          // echo($DadosViagem->origem." / ".$DadosViagem->destino);

      }else{
        echo("poltronas = Error");
        // header('location:index.php');
      }
    }else{
      echo("id = Error");
        // header('location:../index.php');
    }





  require_once('../models/dados_viagem_class.php');
  require_once('../controllers/dados_viagem_controller.php');

  $DadosViagem = new DadosViagem();
  $viagemController = new ControllerDadosViagem();
  $DadosViagem = $viagemController::BuscarPorId($_SESSION['_idViagem']);

  // echo sizeof($poltrona_selecionada);

  require_once('../models/usuario_class.php');
  require_once('../controllers/usuario_controller.php');

  $Usuario = new Usuario();
  $usuarioController = new controllerUsuario();
  $Usuario = $usuarioController::
      Buscar($_SESSION['id_usuario']);
      // echo($Usuario->uf);


  function mostraPoltronasSelecionadas($selecionadas){
    for($cont = 0;$cont < sizeof($selecionadas); $cont++){
      if($cont+1 == sizeof($selecionadas)){
        echo($selecionadas[$cont].'.');
      }else{
        echo($selecionadas[$cont].',');
      }
    }
  }

?>
<!-- action="router.php?controller=registro_passagem&modo=compra" -->
<script>
  $(document).on("submit", "#_finalizar",function(e){
    e.preventDefault();
    // var ret = [];

    $.ajax({
      url:'router.php?controller=registro_passagem&modo=compra',
      type: 'POST',
      data: new FormData($('#_finalizar')[0]),
      processData: false,
      contentType: false,
      async: false,
      // dataType:'json',
      success: function(res){
        // $(".pague").html('<h2>Foi</h2>');

        // console.log(res);
        var resp = JSON.parse(res.substring(res.indexOf('{"object":"transa')-1));
        // console.log(res.substring(res.indexOf('KEY-----\n"}'+1333)));
        // console.log(res.substring(res.indexOf(') "')+13));
        console.log(resp.id);
        // console.log(res);
      },
      error: function(a,err,b){
        console.log(err);
      }
    });

  });

</script>
<form id='_finalizar' class="" enctype="multipart/form-data" method="post">

   <div class="cont_pague">
       <div class="text_pague">Bandeiras</div>
      <div class="bandeiras">
        <input type="radio" name="rdband" value="elo" required>
        <img class="img_pague" src="img/icon/elo-icon.png" alt="elo">
      </div>
      <div class="bandeiras">
        <input type="radio" name="rdband" value="visa">
        <img class="img_pague" src="img/icon/Visa-icon.png" alt="">
      </div>
      <div class="bandeiras">
        <input type="radio" name="rdband" value="mastercard">
        <img class="img_pague" src="img/icon/mastercard-icon.png" alt="">
      </div>
      <div class="bandeiras">
        <input type="radio" name="rdband" value="americanexpress">
        <img class="img_pague" src="img/icon/americanexpress-icon.png" alt="">
      </div>
   </div>
   <div class="line_vertical"></div>
   <div class="registro_pague">
     <div class="text_pague">
        Dados do Titular
      </div>
     <div class="box_pague">
        <input type="text" name="nome" value="<?php echo $_SESSION['nome_usuario'];  ?>" >
      </div>
     <div id="cpf" class="box_pague">
        <input type="text" name="cpf" value="<?php echo $Usuario->cpf; ?>" >
     </div>
          <div id="celular" class="box_pague">
        <input type="text" name="celular" value="<?php echo $Usuario->celular; ?>" >
     </div>
      <input type="hidden" name="email" value="<?php echo $Usuario->email; ?>" >
     <h2 class="subtitulo center">Endereco</h2>
     <div id="cep" class="box_pague">
        <input type="text" name="cep" value="<?php echo $Usuario->cep; ?>" >
     </div>
     <div id="logradouro" class="box_pague">
        <input type="text" name="logradouro" value="<?php echo $Usuario->logradouro; ?>" >
      </div>
      <div id="bairro" class="box_pague">
        <input type="text" name="bairro" value="<?php echo $Usuario->bairro; ?>" >
      </div>
      <div id="cidade" class="box_pague">
        <input type="text" name="cidade" value="<?php echo $Usuario->cidade; ?>" >
        <input type="hidden" name="uf" value="<?php echo $Usuario->uf; ?>">
        <input type="hidden" name="numero" value="<?php echo $Usuario->numero; ?>">
      </div>
   </div>
   <div class="line_vertical"></div>
   <div class="cont_pague">
    <h2 class="subtitulo">Dados do Cartão</h2>
     <div class="box_pague">
        <input type="text" name="cartao"  placeholder="Numero do cartao" maxlength="16" required>
      </div>
     <select class="combo_pague" name="month">
      <?php
        for($a = 0; $a < sizeof($meses); $a++){
          ?><option value="<?php
          if($a < 10){echo('0'.$a);}else{echo($a+1);}

           ?>"><?php echo($meses[$a]); ?></option><?php
        }
       ?>
     </select>
     <select class="combo_pague" name="year">
        <?php
        for($a = 0; $a < sizeof($anos); $a++){
          ?><option value="<?php echo(substr($anos[$a],2)); ?>">
          <?php echo($anos[$a]); ?>
          </option><?php
        }
         ?>
     </select>
     <div class="box_pague"><input type="text" name="codigo" value="" maxlength="3" required="required" placeholder="Codigo de segurança"></div>
    <div class="text_pague">Parcelamento</div>
     <select class="combo_pague" name="installments">
       <?php
       $a = 1;
        while($a < 5){
          ?>
          <option value="<?php echo $a; ?>"><?php echo $a; ?>x</option>
          <?php
          $a++;
        }

        ?>
     </select>
     <div>
       Poltrona(s) selecionada(s): <?php mostraPoltronasSelecionadas($poltrona_selecionada); ?>
     </div>
     <div class="preco">
        Total: R$
       <label><?php echo($DadosViagem->preco * sizeof($poltrona_selecionada)); ?></label>
       <input type="hidden" value="<?php echo($DadosViagem->preco * sizeof($poltrona_selecionada)); ?>" name="total">
       <input type="hidden" name="preco" value="<?php echo($DadosViagem->preco); ?>">
       <input type="hidden" name="tipo" value="cartao">
     </div>
   </div>
   <div class="cont_pague">
     <div class="finalizar">

  </div>
   </div>
   <div class="cont_pague">
     <div class="text_pague">
        <?php //echo($total); ?>

     </div>
   </div>
   <button type="submit" class="btn">Finalizar Compra</button>
  </form>
