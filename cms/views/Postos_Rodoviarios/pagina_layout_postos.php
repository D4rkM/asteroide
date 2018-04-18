
<script type="text/javascript ">
  $(document).ready(function() {
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Postos_Rodoviarios/pagina_lista_postos.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Postos_Rodoviarios/pagina_cadastro_postos.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);
        }
      });
    });
    $("#estado").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Postos_Rodoviarios/estados_postos.php",
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
  <div class="labels" id="estado">Estados</div>
  <div class="title_page_posto">Postos Rodoviarios</div>
</div>
<div id="conteudo">

</div>
