
<script type="text/javascript ">
  $(document).ready(function() {
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Itinerarios/list_itinerario.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);
        }
      });
    });
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Itinerarios/cadastro_itinerario.php",
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
  <div class="title_page">Itinerario</div>
</div>
<div id="conteudo">

</div>
