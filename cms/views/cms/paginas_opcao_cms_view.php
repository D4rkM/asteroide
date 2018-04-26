<script src="js/jquery-3.3.1.js"></script>

<script type="text/javascript ">
  $(document).ready(function() {



    $("#opcPagSobre").click(function(){
      $.ajax({
        type:"POST",
        url:"views/cms/paginas_opcao_cms_view.php",
        data:{},
        success: function(dados){
          $("#conteudoCMS").html(dados);

        }
      });

    });


  });

</script>

<div class="area-opcs">
  <div class="itens-opcs" id='opcPagSobre'>
    <div class="img-itens-opcs">
      <img src="img/icon-sobre-nos.png" alt="">
    </div>
    <div class="txt-itens-opcs">
      Página Sobre Nós
    </div>
  </div>
</div>
