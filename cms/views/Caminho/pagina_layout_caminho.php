
<script type="text/javascript ">
  $(document).ready(function() {
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Caminho/pagina_lista_caminho.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Caminho/pagina_cadastro_caminho.php",
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
  <div class="title_page">Caminho</div>
</div>
<div id="conteudo">

</div>
