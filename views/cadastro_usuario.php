<?php

  include('../links.php');

  $links = alterarLinks(false);
  $paths = alterarCaminhos(false);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
    <meta name="author" content="Magno">
    <!--
      Data de modificação: 19/03/2018
      Obs: Página principal contém menu e rodapé para inserir as outras páginas
    -->
    <title>Cadastro - Bem vindo</title>
    <link rel="stylesheet" href="<?php echo($links); ?>css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>css/footer.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/cadastro_usuario.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style_login.css">
    <link rel="stylesheet" href="<?php echo($links); ?>css/style_detalhes.css">
    <script src="<?php echo($links); ?>js/jquery.min.js"></script>
    <script>
      // Modal Login
      $(document).ready(function() {
            $(".login").click(function() {
              $(".modalContainerLogin").fadeIn(500);
            });
      });
      //função para abrir a modal
      function Login(){
          $.ajax({
              type: "POST",
              url: "views/login.php",
              success: function(dados){
                  $('.modal-login').html(dados);
               }
              });
          }
      // -------------------------------------------------------------------------------------

      // Modal de detalhes
      $(document).ready(function() {
            $(".detalhes").click(function() {
              $(".modalContainerDetalhes").slideToggle(1000);
            });
      });

      function Detalhes(){
          $.ajax({
              type: "POST",
              url: "views/detalhes.php",
              success: function(dados){
                  $('.modal-detalhes').html(dados);
               }
              });
          }
      // --------------------------------------------------------------------------------------
    </script>
    <script>
      // Configura o Texto que irá aparecer na pagina inicial
      $(document).ready(function(){
        var textos = ["Deixe o stress de lado e curta nossa viagem", 'Viajar de "Bus" pode ser tão divertido como estar em família' , "Veja nossos pacotes de passagens"];
        var atual = 0;
        $('#frases').text(textos[atual++]);
        setInterval(function() {
            $('#frases').fadeOut(function() {
                if (atual >= textos.length) atual = 0;
                $('#frases').text(textos[atual++]).fadeIn();
            });
        }, 5000);
      });
    </script>
  </head>
  <body>
    <div class="modalContainerLogin">
      <div class="modal-login">
      </div>
    </div>
       <?php require_once('nav.php'); ?>

<!-- Conteúdo da página -->
<div class="conteudo-cadastro">
  <!--Container responsael por segurar o titulo da pagima -->
  <div class="titulo-conteudo-padrao">
    <h2>Cadastro de Usuario</h2>
  </div>
  <!--Container que segura todas as informações da pagina -->
  <div class="cadastro-container">
        <!--Form dos itens do cadastro-->
        <form action="../router.php?controller=usuario&modo=novo" enctype="multipart/form-data" method="post">
            <!--texto da imagem de inserir foto de perfil-->
            <div class="subtitulo text-center">
              <h3>Foto de Perfil</h3>
            </div>
            <label for="foto">
              <div  class="adicionar_imagem" id="imagem">
                <img id="id_sua_img" src="../img/client.png" alt="user"/>
              </div>
            </label>
            <!--Botão para selecionar a foto-->
            <div class="input-foto">
              <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
            </div>
          <!-- Inicia a entrada de dados principais do usuario -->
          <div class="dados-principais-cad">
            <div class="caixa-dados large">
              <label for="nome">Nome completo</label>
              <input id="nome" class="" type="text" name="txtnome">
            </div>
            <div class="caixa-dados large">
              <label for="email" class="">E-mail</label>
              <input id="email" class="" type="text" name="txtemail">
            </div>
            <div class="caixa-dados large">
              <label for="senha" class="">Usuario</label>
              <input id="usuario" class="" type="txt" name="txtusuario">
            </div>
            <div class="caixa-dados large">
              <label for="senha" class="">Senha</label>
              <input id="senha" class="" type="password" name="txtsenha">
            </div>
          </div>
          <!--Titulo dos dados pessoais-->
          <div class="subtitulo text-center">
            <h3>Dados Pessoais</h3>
          </div>
          <!-- O usuário insere os dados complementares no seu cadastro-->
          <div class="dados-complementares-cad">

            <div class="dados-pessoais">
              <div class="dados-esquerda">
                <div class="caixa-dados large">
                  <label for="dataNascimento">Data de Nascimento</label>
                  <input id="dataNascimento" type="date" name="txtdatanasc" maxlength="10">
                </div>
                <div class="caixa-dados">
                  <label for="sexo">Sexo</label>
                  <div id="sexo" class="radio-group">
                    <input type="radio" name="rdosexo" value="M">Masculino
                    <input type="radio" name="rdosexo" value="F" checked>Feminino
                  </div>
                </div>
                <div class="caixa-dados large">
                  <label for="telefone">Telefone</label>
                  <input id="telefone" type="text" name="txttelefone" maxlength="14">
                </div>
                <div class="caixa-dados large">
                  <label for="celular">Celular</label>
                  <input id="celular" type="text" name="txtcelular" maxlength="15" >
                </div>
                <div class="caixa-dados large">
                  <label for="rg">RG</label>
                  <input id="rg" name="txtrg" type="text" maxlength="12">
                </div>
                <div class="caixa-dados large">
                  <label for="cpf">CPF</label>
                  <input id="cpf" name="txtcpf" type="text" maxlength="14">
                </div>
                <!-- <div class="caixa-dados small">
                  <label for="cep">CEP</label>
                  <input id="cep" type="text" name="txtcep" maxlength="9">
                </div>
                <div class="caixa-dados">
                  <label for="estado">Estado</label>
                  <select id="estado" class="box_text2" name="txtestado">
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
                  </select> -->
                </div>
              </div>
              <div class="dados-direita">

                <!-- <div class="caixa-dados">
                  <label for="logradouro">Logradouro</label>
                  <input id="logradouro" type="text" name="txtlogradouro">
                </div>
                <div class="caixa-dados">
                  <label for="cidade">Cidade</label>
                  <select id="cidade" name="txtcidade">
                     <option value="">Osasco</option>
                     <option value="">São Paulo</option>
                     <option value="">Barueri</option>
                     <option value="">Itapevi</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="dados-endereco">
              <div class="caixa-dados small">
                <label for="numero">Numero</label>
                <input id="numero" class="" type="number" name="txtnumero">
              </div>
              <div class="caixa-dados small">
                <label>Bairro</label>
                <input class="" type="text" name="txtbairro">
              </div>
              <div class="caixa-dados small">
                <label for="complemento">Complemento</label>
                <input id="complemento" class="" type="text" name="txtcomplemento">
              </div> -->
            </div>

            <div class="campo-salvar">
              <input class="btn" type="submit" name="btncadastrar" value="Salvar">
            </div>

          </div>
        </form>
  </div>
</div>
</body>
</html>
<?php require_once('footer.php'); ?>
<script src="../../js/jquery.min.js"></script>
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
<script>
$('#cep').focusout(function(){
    var cep = $('#cep');
    $.ajax({
    type:'post',
    datatype:'jsonp',
    url:'http://www.viacep.com.br/ws/'+cep.val()+'/json/',
    success: function(dados){
      console.log(url);
      // console.log(dados);
    }
  });
});
</script>
<script>
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
