
<script type="text/javascript ">
  $(document).ready(function() {
    $("#rec").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Faleconosco/lista_reclamacao.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });

    $("#sug").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Faleconosco/lista_sugestao.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });

    $("#elo").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Faleconosco/lista_elogio.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });
});

</script>

<div class="abas">
  <div class="labels" id="rec">Reclamacão</div>
  <div class="labels" id="sug">Sugestões</div>
  <div class="labels" id="elo">Elogios</div>
  <div class="title_page">Fale conosco</div>
</div>
<div id="conteudo">

</div>
