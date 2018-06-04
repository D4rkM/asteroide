
<script type="text/javascript ">
  $(document).ready(function() {
    $('#conteudo').load('views/Cadastro_Funcionario/pagina_lista_funcionario.php');
    $("#list").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Cadastro_Funcionario/pagina_lista_funcionario.php",
        data:{},
        success: function(dados){
          $("#conteudo").html(dados);

        }
      });
    });
    $("#add").click(function(){
      $.ajax({
        type:"POST",
        url:"views/Cadastro_Funcionario/pagina_cadastro_funcionario.php",
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
  <div class="title_page">Funcionario</div>
</div>
<div id="conteudo">

</div>
