
<script type="text/javascript ">
  $(document).ready(function() {
    //Lista de postos rodoviarios
    $("#lista").click(function(){
      $.ajax({
        type:"POST",
        url:"views/cms/pagina_lista_postos_rodoviarios_cms_view.php",
        data:{},
        success: function(dados){
          $("#conteudoFuncArea").html(dados);

        }
      });
    });
    //cadatsro de postos rodoviario
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/cms/pagina_cadastro_postos_rodoviarios_cms_view.php",
        data:{},
        success: function(dados){
          $("#conteudoFuncArea").html(dados);

        }
      });
    });
    //cadastro de estados que tera postos rodoviarios
    $("#state").click(function(){
      $.ajax({
        type:"POST",
        url:"views/cms/estados_postos_view.php",
        data:{},
        success: function(dados){
          $("#conteudoFuncArea").html(dados);

        }
      });
    });
  });

</script>


<div class="labels">

    <div class="txt-label" id="lista" >
      <img src="img/icon-list.png" alt="">
    </div>

    <div class="txt-label" id="add">
      <img src="img/icon-add.png" alt="">
    </div>

    <div class="txt-label" id="state">
      <img src="img/brazil.png" alt="">
    </div>
</div>

<div class="conteudoFunc" id="conteudoFuncArea">

</div>
<?php

  //
  // if ($opc == 'list') {
  //   require_once('funcionario_lista_cms_view.php');
  // }else{
  //   require_once('funcionario_cadastro_cms_view.php');
  // }

  //
  // echo $opc;
 ?>
