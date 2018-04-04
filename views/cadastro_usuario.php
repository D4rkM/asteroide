
<!--
  Autor: BRUNA
  Data de modificação: 25/03/2018
  Detalhes: Está pagina tem como objetivo fazer o cadastro de usuarios
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
  -->

<!-- Conteúdo da página -->
<div class="conteudo_cadastro">
  <div class="title_padrao">
    <h2>EDITAR - CADASTRO - PERFIL</h2>
  </div>
  <!--Container que segura todas as informações da pagina -->
  <div class="cadastro_container">
    <!--Container responsael por segurar o titulo da pagima -->

      <div class="cadastro">
          <form action="cadastro_usuario.php" method="post">
            <div class="dados_iniciais">
              <div class="text">Foto de Perfil</div>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
              <div id="imagem" class="">
                <img id="id_sua_img" src="" alt="teste"/>
              </div>
              <label for="foto">Envie sua Foto</label>
              <div class="input-foto">
                <input id="foto" class="botao_foto_perfil" type="file" name="flefoto"/>
              </div>
              <br>
              <br>
              <label id="nome" >Nome completo</label>
              <input id="nome" class="box_text" type="text" name="txtnome">

              <label for="email"></label>
              <input id="email" class="box_text" type="text" name="txtemail">

              <div class="text_left">Usuario</div>
              <input class="box_text" type="text" name="txtusuario">

              <div class="text_left">Senha</div>
              <input class="box_text" type="password" name="txtsenha">
            </div>
              <div class="text">Dados Pessoais</div>
              <br>
              <br>
              <table class="tabela_cadastro">
                  <tr>
                      <td class="colunas_cadastro_nome">
                          <div class="text_box">Data de Nascimento</div>
                      </td>
                      <td class="colunas_cadastro_nome">
                          <div class="text_box">Sexo</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="date" name="txtdatenasc">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input type="radio" name="rdoSexo" value="M" >Masculino
                        <input type="radio" name="rdoSexo" value="F" checked>Feminino
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
                          <input class="box_text2" type="telefone" name="txttelefone">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="telefone" name="txtcelular">
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
                          <input class="box_text2" type="number" name="txtcpf">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="number" name="txtrg">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">CEP </div>
                      </td>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Logradouro </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                      <input class="box_text2" type="number" name="txtcep">
                      </td>
                      <td class="colunas_cadastro_caixa">
                      <input class="box_text2" type="number" name="txtlogradouro">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome">
                          <div class="text_box">Numero</div>

                      </td>
                      <td class="colunas_cadastro_nome">
                          <div class="text_box">Complemento</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                      <input class="box_text2" type="number" name="txtnumero">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="text" name="txtcomplemento">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Cidade</div>
                      </td>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Estado</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                      <input class="box_text2" type="text" name="txtcidade">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="text" name="txtestado">
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
