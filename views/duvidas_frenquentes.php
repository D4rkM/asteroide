
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
  <div class="duvidas_container">
    <!--Container responsael por segurar o titulo da pagima -->
     <div class="title_duvidas">
      <h1>Duvidas frequentes</h1>
     </div>
      
      <div class="perguntas_frequentes">
          <ul>
              <a id='a' href="#"><li>Como comprar passagem</li></a>
              <a id="b" href="#"><li>Como chegar em uma rodoviaria?</li></a>
              <a id="c" href="#"><li>Onde acompanho a minha viagem?</li></a>
          </ul>
      </div>
      <div class="perguntas_frequentes">
           <div id="div_email">
                Para comprar passagem você deve se direcionar a pagina <a href="#">Compra de passagem</a> ou
                pode comprar em um dos nossos guiches nos terminais rodoviarios de todo o brasil, <a href="#">confira!</a>
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
          
        var btn = document.getElementById('a');
        var div = document.getElementById('div_email');
        btn.addEventListener('click', function() {
        if(div.style.display != 'block') {
        div.style.display = 'block';
        return;
        }
         div.style.display = 'none';    
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
