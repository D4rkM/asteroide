
<?php

  require_once('../../controllers/sobre_empresa_controller.php');
  require_once('../../models/sobre_empresa_class.php');

?>

<form action="router.php?controller=sobreEmpresa&modo=novo" method="post" enctype="multipart/form-data">

    <h2>Gerenciamento da Página Sobre a Empresa</h2>
        <div class="tabela_gerenciamento">
          <div class="containers_tables">
            <div >
                <div class="font_text">Data de inserção</div>
                <input id="datainsercao" class="box_text_small" type="text" name="txtdatainsercao" maxlength="10">
            </div>
            <div>
                <div class="font_text">Imagem superior de fundo</div>
                <input type="file" name="imagem1">
            </div>
              <div >
                <div class="font_text">Titulo da Pagina</div>
                <input class="box_text_big" type="text" name="txttitulo1" value="">
              </div>
              <div >
                <div class="font_text">Subtitulo da Pagina</div>
                <input class="box_text_big" type="text" name="txtsubtitulo" value="">
              </div>
              <div >
                <div class="font_text">Primeiro Texto</div>
                <textarea name="txttexto1" rows="4" cols="60"></textarea>
              </div>
              <div>
                  <div class="font_text">Imagem da empresa</div>
                  <input type="file" name="imagem2">
              </div>
              <div >
                <div class="font_text">Titulo do texto 2</div>
                <input class="box_text_big" type="text" name="txttitulo2" value="">
              </div>
              <div >
                <div class="font_text">Segundo Texto</div>
                <textarea name="txttexto2" rows="4" cols="60"></textarea>
              </div>
          </div>
          <div class="containers_tables">
            <div>
                <div class="font_text">Primeiro Icone</div>
                <input type="file" name="icon1">
            </div>
            <div >
              <div class="font_text">Detalhes Icone 1</div>
              <input class="box_text_big" type="text" name="txtdetalhes1" value="">
            </div>
            <div>
                <div class="font_text">Segundo Icone</div>
                <input type="file" name="icon2">
            </div>
            <div >
              <div class="font_text">Detalhes Icone 2</div>
              <input class="box_text_big" type="text" name="txtdetalhes2" value="">
            </div>
            <div>
                <div class="font_text">Terceiro Icone</div>
                <input type="file" name="icon3">
            </div>
            <div >
              <div class="font_text">Detalhes Icone 3</div>
              <input class="box_text_big" type="text" name="txtdetalhes3" value="">
            </div>
            <div>
                <div class="font_text">Quarto Icone</div>
                <input type="file" name="icon4">
            </div>
            <div >
              <div class="font_text">Detalhes Icone 4</div>
              <input class="box_text_big" type="text" name="txtdetalhes4" value="">
            </div>
            <input class="salva_empresa" type="submit" name="btnsalvar" value="Salvar">
          </div>
        </div>
</form>

<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery-3.2.1.js"></script>
<script type="text/javascript">
function mascara(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }

        function mdat(v){
            v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"$1/$2"); //Coloca barra depois dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{4})$/,"$1/$2");    //Coloca barra entre o quarto e o quinto dígitos
            return v;
        }

        function id( el ){
            return document.getElementById( el );
        }
            window.onload = function(){
            id('datainsercao').onkeypress = function(){
                mascara( this, mdat );
            }
}

</script>
