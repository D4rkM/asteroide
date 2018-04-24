
<script type="text/javascript ">
  $(document).ready(function() {
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Parada/list_cadastro_parada.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);
        }
      });
    });
  });

</script>

<div class="abas">
  <div class="labels" id="add">Lista e Cadastro</div>
  <div class="title_page">Parada</div>
</div>
<div id="conteudo">

</div>
