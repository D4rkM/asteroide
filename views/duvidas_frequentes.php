
<!--
  Autor: BRUNA
  Data de modificação: 25/03/2018
  Detalhes: Está pagina tem como objetivo mostar as duvidas mais frequentes perguntadas pelos
usuarios e ajudar aqueles que estão com duvidas
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
  -->

<!-- Conteúdo da página -->
<div class="conteuno_duvidas">
  <!--Container que segura todas as informações dos postos rodoviarios -->

   <h2 class="title_duvidas" style="color:#3f635f;">DÚVIDAS FREQUENTES</h2>

  <div class="duvidas_container">
    <!--Container responsael por segurar o titulo da pagima -->


      <div class="perguntas">
          <ul>
              <a id='1' href="#" style='color:#4d9b61; font-weight:bold;'><li> <h3>Como comprar passagem</h3> </li></a>
              <a id="b" href="#" style='color:#4d9b61; font-weight:bold;'><li> <h3>Como chegar em uma rodoviária?</h3> </li></a>
              <a id="c" href="#" style='color:#4d9b61; font-weight:bold;'><li> <h3>Onde acompanho a minha viagem?</h3> </li></a>

          </ul>
      </div>
      <div class="respostas">
          <div id="legenda">
            Sua resposta aparece aqui...
          </div>
           <div id="div_email" >
             <p style='color:#162E44;'>Para comprar passagem você deve se direcionar a pagina <a href="#"> <strong>Compra de passagem</strong> </a> ou
             pode comprar em lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. um dos nossos guiches nos terminais rodoviarios de todo o brasil, <a href="#">confira!</a></p>

           </div>

           <div id="div_email2">
                Para comprar pasagem você deve ....
           </div>

           <div id="div_email3">
                Para comprar pasagem você deve ....
           </div>
      </div>
      <script>
        //pergunta 1

        var btn = document.getElementById('1');
        var div = document.getElementById('div_email');
        btn.addEventListener('click', function() {
        if(div.style.display != 'block') {
        div.style.display = 'block';
        $('#legenda').css('display','none');
        return;
        }
         div.style.display = 'none';
         $('#legenda').css('display','block');
        });

        //pergunta 2

        var btn2 = document.getElementById('b');
        var div2 = document.getElementById('div_email2');
        btn2.addEventListener('click', function() {
        if(div2.style.display != 'block') {
        div2.style.display = 'block';
        return;
        }
         div2.style.display = 'none';
        });

        //pergunta 3

        var btn3 = document.getElementById('c');
        var div3 = document.getElementById('div_email3');
        btn3.addEventListener('click', function() {
        if(div3.style.display != 'block') {
        div3.style.display = 'block';
        return;
        }
         div3.style.display = 'none';
        });
      </script>
  </div>
</div>
