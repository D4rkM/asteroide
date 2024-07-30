
<script type="text/javascript ">
  $(document).ready(function() {
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Duvidas_Frequentes/pagina_lista_duvidas.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Duvidas_Frequentes/pagina_cadastro_duvidas.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);
        }
      });
    });
  });

</script>

<div class="abas">
  <div class="labels" id="list">Lista</div>
  <div class="labels" id="add">Cadastrar</div>
  <div class="title_page">Duvidas Frequentes</div>
</div>
<div id="conteudo">

</div>
