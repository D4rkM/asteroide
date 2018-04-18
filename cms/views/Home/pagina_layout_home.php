
<script type="text/javascript ">
  $(document).ready(function() {
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Home/pagina_lista_home.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Home/pagina_cadastro_home.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);
        }
      });
    });
    $("#tipo").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Home/pagina_tipo_destino.php",
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
  <div class="labels" id="tipo">Tipo de Destino</div>
  <div class="title_page">Home</div>
</div>
<div id="conteudo">

</div>
