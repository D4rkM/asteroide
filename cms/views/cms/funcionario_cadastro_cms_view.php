
<?php

  require_once("../../controllers/funcionario_controller.php");
  require_once("../../models/funcionario_class.php");

?>

<form class="frmCadFunc" method="post" action="router.php?controller=funcionario&modo=novo">
  <div class="area-cad-func">
    <div class="div-cad-func">
      <div class="tlt-dado-func">
        Nome:
      </div>

      <div class="area-dado-func">
        <input type="text" name="txtNomeFunc" value="" placeholder="Ex.: Jubileu Afonseca">
      </div>

      <div class="tlt-dado-func">
        Usuario:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtUsuarioFunc" value="" placeholder="Ex.: jubileu">
      </div>

      <div class="tlt-dado-func">
        Data de nascimento:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtDataNascFunc" value="" placeholder="DD/MM/AAAA">
      </div>

      <div class="tlt-dado-func">
        Telefone:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtTelefoneFunc" value="" placeholder="DDD XXXX-XXXX">
      </div>

      <div class="tlt-dado-func">
        CPF:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtCPFFunc" value="" >
      </div>

      <div class="tlt-dado-func">
        CEP:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtCEPFunc" value="" >
      </div>
      <div class="box-dois-itens-cad-func">
        <div class="itens-dois">
          <div class="tlt-dados-pequenos-cad-func">
            Número:
          </div>
          <div class="dados-pequenos-cad-func">
            <input type="text" name="txtNumeroCasaFunc" value="" Ex.: 123>
          </div>
        </div>
        <div class="itens-dois">
          <div class="tlt-dados-pequenos-cad-func">
            Bairro:
          </div>
          <div class="dados-pequenos-cad-func">
            <input type="text" name="txtBairroFunc" value="">
          </div>
        </div>

      </div>
      <div class="area-radio-dado-func">
        <input type="checkbox" name="chkAtivo" value="1" checked>Ativo
      </div>
    </div>
    <div class="div-cad-func">
      <div class="tlt-dado-func">
        E-mail:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtEmailFunc" value="" placeholder="Ex.: jubileu@hotmail.com">
      </div>
      <div class="tlt-dado-func">
        Senha:
      </div>
      <div class="area-dado-func">
        <input type="password" name="txtSenhaFunc" value="" placeholder="******" >
      </div>

      <div class="tlt-dado-func">
        Sexo:
      </div>
      <div class="area-radio-dado-func">
        <input type="radio" name="rdoSexoFunc" value="F">Feminino
        <input type="radio" name="rdoSexoFunc" value="M">Masculino
      </div>

      <div class="tlt-dado-func">
        Celular:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtCelularFunc" value="" placeholder="DDD XXXXX-XXXX" >
      </div>

      <div class="tlt-dado-func">
        RG:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtRGFunc" value="" >
      </div>

      <div class="tlt-dado-func">
        Logradouro:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtLogradouroFunc" value="" >
      </div>

      <div class="tlt-dado-func">
        Complemento:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtComplementoFunc" value="" >
      </div>
      <div class="area-dado-func">
        <input type="submit" name="btnCadastrarFunc" value="Cadastrar" >
      </div>
    </div>

  </div>

</form>
