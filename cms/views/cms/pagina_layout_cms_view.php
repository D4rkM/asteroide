
<?php


 ?>

<script type="text/javascript ">
  $(document).ready(function() {
    $("#lista").click(function(){
      $.ajax({
        type:"POST",
        url:"views/cms/pagina_lista_duvidas_frequentes_cms_view.php",
        data:{},
        success: function(dados){
          $("#conteudoFuncArea").html(dados);

        }
      });

    });

    $("#add").click(function(){

      $.ajax({
        type:"POST",
        url:"views/cms/pagina_cadastro_duvidas_frequentes_cadastro_cms_view.php",
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

  <div class="txt-label">

  </div>
  <div class="txt-label">

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
