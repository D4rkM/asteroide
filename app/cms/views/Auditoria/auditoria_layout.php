
<script type="text/javascript ">
  $(document).ready(function() {
    $("#conteudo").load("views/Auditoria/auditoria_lista.php");
    $("#list").click(function(){
      $.ajax({
        $('#conteudo').load('views/Auditoria/auditoria_lista.php');
        type:"POST",
        url:"views/Auditoria/auditoria_lista.php",
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
  <div class="title_page">Auditoria</div>
</div>
<div id="conteudo">

</div>
