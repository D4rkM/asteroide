<script type="text/javascript ">

  $(document).ready(function() {
    //Chama o ajax de lista de funcionarios
    $("#lista").click(function(){
      $.ajax({
        type:"POST",
        url:"views/cms/funcionario_lista_cms_view.php",
        data:{},
        success: function(dados){
          $("#conteudoFuncArea").html(dados);
        }
      });
    });
    //Chama o ajax de cadastro de funcionario
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/cms/funcionario_cadastro_cms_view.php",
        data:{},
        success: function(dados){
          $("#conteudoFuncArea").html(dados);
        }
      });
    });
  });

</script>
<!--Arae onde tera lista de cadastro de funcionario-->
<div class="labels">
  <!-- Icon de lista -->
    <div class="txt-label" id="lista" >
      <img src="img/icon-list.png" alt="">
    </div>
    <!-- Icon de cadastro -->
    <div class="txt-label" id="add">
      <img src="img/icon-add.png" alt="">
    </div>

</div>

<div class="conteudoFunc" id="conteudoFuncArea"></div>
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
