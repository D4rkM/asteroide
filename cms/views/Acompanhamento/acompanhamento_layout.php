
<script type="text/javascript ">
  $(document).ready(function() {
    $('#conteudo').load('views/Acompanhamento/acompanhamento_lista.php');
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Acompanhamento/acompanhamento_lista.php",
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
  <div class="title_page">Acompanhamento</div>
</div>
<div id="conteudo">

</div>
