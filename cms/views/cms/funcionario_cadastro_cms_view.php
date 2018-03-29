
<?php

  require_once("../../controllers/funcionario_controller.php");
  require_once("../../models/funcionario_class.php");
  require_once("../../controllers/estado_controller.php");
  require_once("../../models/estado_class.php");

?>

<script type="text/javascript">
function mascara(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function mtel(v){
            v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }
        function mcel(v){
            v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }
        function mdat(v){
            v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"$1/$2"); //Coloca barra depois dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{4})$/,"$1/$2");    //Coloca barra entre o quarto e o quinto dígitos
            return v;
        }
        function mcpf(v){
            v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
            v=v.replace(/^(\d{3})(\d)/g,"$1.$2"); //Coloca barra depois dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{5})$/,"$1.$2");  //Coloca barra entre o quarto e o quinto dígitos
            v=v.replace(/(\d)(\d{2})$/,"$1-$2");
            return v;
        }
        function mrg(v){
            v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"$1.$2"); //Coloca barra depois dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{4})$/,"$1.$2");  //Coloca barra entre o quarto e o quinto dígitos
            v=v.replace(/(\d)(\d{1})$/,"$1-$2");
            return v;
        }
        function mcep(v){
            v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
            v=v.replace(/^(\d{5})(\d)/g,"$1-$2"); //Coloca barra depois dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{3})$/,"$1 $2");
            return v;
        }
        function id( el ){
            return document.getElementById( el );
        }
        window.onload = function(){
            id('telefone').onkeypress = function(){
                mascara( this, mtel );
            }

            id('celular').onkeypress = function(){
                mascara( this, mcel );
            }

            id('dataNascimento').onkeypress = function(){
                mascara( this, mdat );
            }

            id('cpf').onkeypress = function(){
                mascara( this, mcpf );
            }

            id('rg').onkeypress = function(){
                mascara( this, mrg );
            }
            id('cep').onkeypress = function(){
                mascara( this, mcep );
            }
        }

        //mascara para caracter
        function validar(caracter,blockType,campo){
        if(window.event){
                var letra=caracter.charCode;
            }else{
                var letra=caracter.which;
            }

            if (blockType=='number'){
                if(letra>=48 && letra<=57){
                        return false;
                    }
                }else if (blockType=='caracter'){

                   if(letra<48 || letra >57){
                           if(letra!=45 && letra!=32 && letra!=8){

                                document.getElementById(campo).style="background-color:red;border:10;border-color:blue;";

                               return false;
                            }
                       }else{
                              document.getElementById(campo).style="background-color:#ffffff;";

                           }
                }

    }
</script>

<form class="frmCadFunc" method="post" action="router.php?controller=funcionario&modo=novo">
  <div class="area-cad-func">
    <div class="div-cad-func">
      <div class="tlt-dado-func">
        Nome:
      </div>

      <div class="area-dado-func">
        <input type="text" name="txtNomeFunc" value="" placeholder="Ex.: Jubileu Afonseca" maxlength="35">
      </div>

      <div class="tlt-dado-func">
        Usuario:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtUsuarioFunc" value="" placeholder="Ex.: jubileu" maxlength="10">
      </div>

      <div class="tlt-dado-func">
        Data de nascimento:
      </div>
      <div class="area-dado-func">
        <input id="dataNascimento" type="text"  name="txtDataNascFunc" value="" placeholder="DD/MM/AAAA" maxlength="10">
      </div>

      <div class="tlt-dado-func">
        Telefone:
      </div>
      <div class="area-dado-func">
        <input type="text" id='telefone' name="txtTelefoneFunc" value="" placeholder="DDD XXXX-XXXX" maxlength="13">
      </div>

      <div class="tlt-dado-func">
        CPF:
      </div>
      <div class="area-dado-func">
        <input type="text" name="txtCPFFunc" value="" maxlength="14">
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
            <input type="text" name="txtNumeroCasaFunc" value="" placeholder="Ex.: 123" maxlength="5">
          </div>
        </div>
        <div class="itens-dois">
          <div class="tlt-dados-pequenos-cad-func">
            Bairro:
          </div>
          <div class="dados-pequenos-cad-func">
            <input type="text" name="txtBairroFunc" value="" maxlength="15">
          </div>
        </div>
      </div>

        <!-- <div class="box-dois-itens-cad-func">
          <div class="itens-dois">
            <div class="tlt-dados-pequenos-cad-func">
              Estado:
            </div>
            <div class="dados-pequenos-cad-func">
              <select class="slcEstado" name="estadoSlc">
              <?php

                  //$controller_estado = new controllerEstado();

                //  $listEstado = $controller_estado::Listar();

                  //$cont = 0;

                  //while ($cont < count($listEstado)) {

               ?>

                    <option value="<?php //echo $listEstado[$cont]->id ?>"><?php //echo $listEstado[$cont]->nom_estado ?></option>

                <?php
                    //$cont+=1;
                  //}
                ?>
              </select>

            </div>
          </div>
          <div class="itens-dois">
            <div class="tlt-dados-pequenos-cad-func">
              Cidade:
            </div>
            <div class="dados-pequenos-cad-func">
              <select class="slcEstado" name="">
                <option value="">teste</option>
              </select>
            </div>
          </div>
        </div> -->
        <div class="area-radio-dado-func">
          <input type="checkbox" name="chkAtivo" value="1" checked>Ativo
        </div>
      </div>



      <div class="div-cad-func">
        <div class="tlt-dado-func">
          E-mail:
        </div>
        <div class="area-dado-func">
          <input type="text" name="txtEmailFunc" value="" placeholder="Ex.: jubileu@hotmail.com" maxlength="40">
        </div>
        <div class="tlt-dado-func">
          Senha:
        </div>
        <div class="area-dado-func">
          <input type="password" name="txtSenhaFunc" value="" placeholder="******" maxlength="10">
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
          <input type="text" id='celular' name="txtCelularFunc" value="" placeholder="DDD XXXXX-XXXX" maxlength="15">
        </div>

        <div class="tlt-dado-func">
          RG:
        </div>
        <div class="area-dado-func">
          <input type="text" name="txtRGFunc" value="" maxlength="12">
        </div>

        <div class="tlt-dado-func">
          Logradouro:
        </div>
        <div class="area-dado-func">
          <input type="text" name="txtLogradouroFunc" value="" maxlength="40">
        </div>

        <div class="tlt-dado-func">
          Complemento:
        </div>
        <div class="area-dado-func">
          <input type="text" name="txtComplementoFunc" value="" maxlength="40">
        </div>
        <div class="area-dado-func">
          <input type="submit" name="btnCadastrarFunc" value="Cadastrar" >
        </div>
      </div>
    </div>


  </div>
</form>
