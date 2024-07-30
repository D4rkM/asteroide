
<script type="text/javascript ">
  $(document).ready(function() {
    $("#conteudo").load("views/Usuarios/lista_usuario.php");
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Usuarios/lista_usuario.php",
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
  <div class="title_page">Usuario</div>
</div>
<div id="conteudo">

</div>
