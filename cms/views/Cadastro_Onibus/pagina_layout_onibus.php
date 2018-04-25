
<script type="text/javascript ">
  $(document).ready(function() {
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Cadastro_Onibus/pagina_lista_onibus.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Cadastro_Onibus/pagina_cadastro_onibus.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);
        }
      });
    });
    $("#class").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Cadastro_Onibus/classe_onibus.php",
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
  <div class="labels" id="class">Classe</div>
  <div class="title_page">onibus</div>
</div>
<div id="conteudo">

</div>
