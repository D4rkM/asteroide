
<script type="text/javascript ">
  $(document).ready(function() {
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Sobre_Empresa/pagina_lista_sobre.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Sobre_Empresa/pagina_cadastro_sobre.php",
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
  <div class="title_page">Sobre a Empresa</div>
</div>
<div id="conteudo">

</div>
