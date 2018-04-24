
<?php
    // $id=$_GET('id');

   require_once('../../controllers/onibus_controller.php');
   require_once('../../models/onibus_class.php');

?>
<script src="js/jquery.min.js"></script>
<script>
$("#foto").change(function(){
   if($(this).val()){ // só se o input não estiver vazio
      var img = this.files[0]; // seleciona o arquivo do input
      var f = new FileReader(); // cria o objeto FileReader
      f.onload = function(e){ // ao carregar a imagem
         $("#id_sua_img").attr("src",e.target.result); // altera o src da imagem
      }
      f.readAsDataURL(img); // lê o arquivo
   }
});
</script>
<form action="router.php?controller=onibus&modo=novo" method="post" enctype="multipart/form-data">
    <div class="cadastro_onibus">
      <div class="cont_onibus1">
        <div class="text_onibus">Placa</div>
        <input class="box_onibus" type="text" name="txtplaca" value="">
        <div class="text_onibus">Numero de poltranas</div>
        <input class="box_onibus" type="text" name="txtpoltrona" value="">
        <div class="text_onibus">KM rodado</div>
        <input class="box_onibus" type="text" name="txtkmrodado" value="">
        <div class="text_onibus">KM para manutemção</div>
        <input class="box_onibus" type="text" name="txtkmmanutencao" value="">

        <div class="text_onibus">Imagem do onibus</div>
        <label for="foto">
              <div  class="adicionar-foto" id="imagem">
                <img id="id_sua_img" src="img/bus.jpg" alt="foto"/>
              </div>
            </label>
            <!--Botão para selecionar a foto-->
            <div class="input-foto">
              <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
            </div>



      </div>
      <div class="cont_onibus2">

        <div class="text_onibus">Detalhes</div>
        <input class="box_onibus" type="text" name="txtdesc">

        <div class="text_onibus">Classe</div>
        <select class="select_onibus" name="classe">
          <option value="">Executivo</option>
          <option value="">Teste</option>
        </select>

        <div class="text_onibus">Status de manutenção</div>
        <input class="box_onibus" type="text" name="txtstatus">

        <input class="salva_onibus" type="submit" name="btnsalvar" value="Salvar">
      </div>

    </div>
</form>
