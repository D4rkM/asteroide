<!--
  Autor: BRUNA
  Data de modificação: 25/03/2018
  Detalhes: Está pagina tem como objetivo fazer o cadastro de usuarios
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
  -->

<!-- Conteúdo da página -->
<div class="conteuno_cadastro">
  <!--Container que segura todas as informações da pagina -->
  <div class="cadastro_container">
    <!--Container responsael por segurar o titulo da pagima -->
     <div class="title_cadastro">
      <h1>Cadastro de Usuario</h1>
     </div>
     <!--Segura todos os itens do cadastro-->
      <div class="cadastro">
          <!--Form dos itens do cadastro-->
          <form action="router.php?controller=usuario&modo=novo" enctype="multipart/form-data" method="post">
              <!--texto da imagem de inserir foto de perfil-->
              <div class="text">Foto de Perfil</div>
              <!--Container para colocar a imagem de perfil-->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">                       </script>
              <div id="imagem">
                  <img id="id_sua_img" src="img/user_cad.png" alt="teste"/>
              </div>
              <!--Botão para selecionar a foto-->
              <input id="teste" class="botao_foto_perfil" type="file" name="flefoto"/>
              <br>
              <br>
              <!--titulo das caixas de textos (class="text_left")-->
              <div class="text_left">Nome completo</div>
              <!--Caixas de textos (class="box_text")-->
              <input class="box_text" type="text" name="txtnome">
                <!--titulo da caixa de texto (class="text_left")-->
              <div class="text_left">E-mail</div>
              <!--Caixas de textos (class="box_text")-->
              <input class="box_text" type="text" name="txtemail">
                <!--titulo da caixa de texto (class="text_left")-->
              <div class="text_left">Senha</div>
              <!--Caixas de textos (class="box_text")-->
              <input class="box_text" type="password" name="txtsenha">
              <br>
              <br>
              <!--Titulo dos dados pessoais-->
              <div class="text">Dados Pessoais</div>
              <br>
              <br>
              <!--Tabela que segura todos os itens dos dados pessoais do usuario-->
              <table class="tabela_cadastro">
                  <!--Primeira linha - Titulo das caixas de texto Data de Nascimento e Sexo-->
                  <tr>
                      <!--Colunas titulos das caixas de texto (class="colunas_cadastro_nome")-->
                      <td class="colunas_cadastro_nome">
                          <!--titulo das caixas de textos (class="text_box")-->
                          <div class="text_box">Data de Nascimento</div>
                      </td>
                      <!--Colunas titulos das caixas de texto (class="colunas_cadastro_nome")-->
                      <td class="colunas_cadastro_nome">
                          <!--titulo das caixas de textos (class="text_box")-->
                          <div class="text_box">Sexo</div>
                      </td>
                  </tr>
                  <!--Primeira linha - Titulo das caixas de texto Data de Nascimento e Sexo-->
                  <tr>
                      <!--Colunas caixas de textos (class="colunas_cadastro_caixa")-->
                      <td class="colunas_cadastro_caixa">
                          <!--Caixas de textos (class="box_text2")-->
                          <input id="dataNascimento" type="text" name="txtdatanasc" maxlength="10">
                      </td>
                      <!--Colunas caixas de textos (class="colunas_cadastro_caixa")-->
                      <td class="colunas_cadastro_caixa">
                          <input type="radio" name="rdosexo" value="M" >Masculino
                        <input type="radio" name="rdosexo" value="F" checked>Feminino
                      </td>
                  </tr>
                 <tr>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Telefone</div>
                     </td>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Celular</div>
                     </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                          <input id="telefone" type="text" name="txttelefone" maxlength="14">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input id="celular" type="text" name="txtcelular" maxlength="15" >
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">CPF</div>
                      </td>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">RG</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                          <input id="cpf" name="txtcpf" type="text" maxlength="14">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input id="rg" name="txtrg" type="text" maxlength="12">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome" colspan="2">
                           <div class="text_box">CEP </div>

                           <div  class="logradouro_texto">Logradouro </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa" colspan="2">
                      <input id="cep" type="text" name="txtcep" maxlength="9">


                      <input class="logradouro" type="text" name="txtlogradouro">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome" colspan="2">
                          <div class="text_box">Numero</div>
                          <div class="bairro_texto">Bairro</div>
                          <div class="text_box">Complemento</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa" colspan="2">
                          <input class="numero" type="number" name="txtnumero">
                          <input class="bairro" type="text" name="txtbairro">
                          <input class="complemento" type="text" name="txtcomplemento">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Estado</div>
                      </td>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Cidade</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                        <select class="box_text2" name="txtestado">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                      </td>
                      <td class="colunas_cadastro_caixa">
                        <select class="box_text2" name="txtcidade">
                          <option value="">Osasco</option>
                          <option value="">São Paulo</option>
                          <option value="">Barueri</option>
                          <option value="">Itapevi</option>
                        </select>
                      </td>
                  </tr>
              </table>
              <br>
              <br>
              <input class="btnsalvar" type="submit" name="btncadastrar" value="Salvar">
          </form>
      </div>
  </div>
</div>
<script>
$("#teste").change(function(){
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
