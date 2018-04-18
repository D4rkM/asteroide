
<?php

  // require_once('../../controllers/sobre_empresa_controller.php');
  // require_once('../../models/sobre_empresa_class.php');

?>

<form action="router.php?controller=sobreEmpresa&modo=novo" method="post" enctype="multipart/form-data">
    <div class="cadastro_empresa">
      <div class="cont_text">
        <div class="text_empresa">Titulo da Pagina</div>
        <input class="box_empresa" type="text" name="txttitulo1" value="">
        <div class="text_empresa">Texo 1</div>
        <textarea class="box_area" name="txttexto1"></textarea>
        <div class="text_empresa">Titulo do Texto 2</div>
        <input class="box_empresa" type="text" name="txttitulo2" value="">
        <div class="text_empresa">Texto 2</div>
        <textarea class="box_area" name="txttexto2"></textarea>

        <div class="text_empresa">Imagem da Empresa</div>
        <label for="Foto">
            <img class="img_empresa" src="img/bus.jpg" alt="imagem">
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="imagem">
        </div>

      </div>
      <div class="cont_icons">
        <div class="text_empresa">icone 1</div>
        <label for="Foto">
            <div class="icon_empresa">Escolha uma imagem</div>
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="icon1">
        </div>
        <div class="text_empresa">Detalhes dos icone 1</div>
        <input class="box_empresa" type="text" name="txtdetalhes1">

        <div class="text_empresa">icone 2</div>
        <label for="Foto">
            <div class="icon_empresa">Escolha uma imagem</div>
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="icon2">
        </div>
        <div class="text_empresa">Detalhes dos icone 2</div>
        <input class="box_empresa" type="text" name="txtdetalhes2">

        <div class="text_empresa">icone 3</div>
        <label for="Foto">
            <div class="icon_empresa">Escolha uma imagem</div>
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="icon3">
        </div>
        <div class="text_empresa">Detalhes dos icone 3</div>
        <input class="box_empresa" type="text" name="txtdetalhes3">

        <div class="text_empresa">icone 4</div>
        <label for="Foto">
            <div class="icon_empresa">Escolha uma imagem</div>
        </label>
        <div class="inpt_foto">
          <input id="Foto" type="file" name="icon4">
        </div>
        <div class="text_empresa">Detalhes dos icone 4</div>
        <input class="box_empresa" type="text" name="txtdetalhes4">

        <input class="salva_empresa" type="submit" name="btnsalvar" value="Salvar">
      </div>

    </div>
</form>
