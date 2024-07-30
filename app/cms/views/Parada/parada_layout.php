
<script type="text/javascript ">
  $(document).ready(function() {
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Parada/list_parada.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);
        }
      });
    });
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Parada/parada_cadastro.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);
        }
      });
    });
    $("#tipo").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Parada/tipo_parada.php",
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
  <div class="labels" id="tipo">Tipo Parada</div>
  <div class="title_page">Parada</div>
</div>
<div id="conteudo">

</div>
