
<!--
  Autor: BRUNA
  Data de modificação: 22/03/2018
  Detalhes: Está pagina tem como objetivo mostar todos os postos Rodoviarios
  para compram de passagens da viação Asterpide
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
  -->

<!-- Conteúdo da página -->
<div class="conteuno_postos_rodoviarios">
  <!--Container que segura todas as informações dos postos rodoviarios -->
  <div class="postos_rodoviarios_container">
    <!--Container responsael por segurar o titulo da pagima -->
     <div class="title_postos_rodoviarios">
      <h1>Postos Rodoviarios</h1>
     </div>
      <!--Nome dos pstos rodoviarios-->
      <h2 class="w3-center">São Paulo</h2>
        <!--Container resposavel por segura oda a estrutura do slide-->
        <div class="w3-content w3-display-container">
            <!--"mySlides" Classe responsavel por segurar todas as informações do posto rodoviario-->
          <div class="mySlides">
              <!--Imagens do posto rodoviario-->
              <div class="informacoes_postos">
                  <img class="imagens_rodoviaria" src="img/jabaquara.jpg" alt="rodoviaria">
              </div>
              <!--Informações do posto rodoviario-->
              <div class="informacoes_postos">
                  <h3>Rodoviaria do Jabaquara</h3>
                  <p>Inaugurada em maio de 1977, a Rodoviária do Jabaquara, conhecida como Terminal Intermunicipal do Jabaquara atende cidades do estado de São Paulo.

        Atualmente, a administração da rodoviária é feita pela Socicam, que tornou o local mais seguro devido ao sistema de segurança implantado, que digitalizou todo o circuito interno de vigilância e melhorou a limpeza, manutenção e operação feita pelos mais de 70 funcionários que trabalham revezando turnos e para manter o espaço de 12.100 metros quadrados limpo.</p>
              </div>
              <!--Localização do posto rodoviario-->
              <div class="informacoes_postos">
                  <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.819219990582!2d-46.64323568544064!3d-23.646644384640627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5add5cb1ea19%3A0xaf1809e44c2de978!2sTerminal+Intermunicipal+do+Jabaquara!5e0!3m2!1spt-BR!2sbr!4v1521959406551" allowfullscreen></iframe>
              </div>
          </div>
          <div class="mySlides">
              <!--Imagens do posto rodoviario-->
              <div class="informacoes_postos">
                  <img class="imagens_rodoviaria" src="img/tiete.jpg" alt="rodoviaria">
              </div>
              <!--Informações do posto rodoviario-->
              <div class="informacoes_postos">
                  <h3>Rodoviaria do Tiete</h3>
                  <p>Oficialmente chamado de Terminal Rodoviário Governador Carvalho Pinto, a maior rodoviária do Brasil, inaugurada em maio de 1982, é uma das mais importantes da América Latina e do mundo, perdendo apenas para o terminal de Nova York em fluxo de pessoas.

Desde 1989, a administração do local é feita pela Socicam em consórcio com a Termini, e, em 2002, houve uma revitalização em suas nas instalações com o objetivo de melhorar sua funcionalidade e a acessibilidade. As reformas deixaram modernizaram a rodoviária, transformando o sistema de check-in similar ao dos principais aeroportos do país.</p>
              </div>
              <!--Localização do posto rodoviario-->
              <div class="informacoes_postos">
                  <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.4520606295987!2d-46.626330785608516!3d-23.51623786581125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce588f85b00cc9%3A0x2916c2b304e4d535!2sTerminal+Rodovi%C3%A1rio+Tiet%C3%AA!5e0!3m2!1spt-BR!2sbr!4v1521960081015" allowfullscreen></iframe>
              </div>
          </div>
          <div class="mySlides">
              <div class="informacoes_postos">
                   <img class="imagens_rodoviaria" src="img/barrafunda.jpg" alt="rodoviaria">
              </div>
              <div class="informacoes_postos">
                   <h3>Rodoviaria da Barra Funda</h3>
                    <p>Fundada em 1989, a Rodoviária Barra Funda é considerando o segundo maior terminal rodoviário da cidade de São Paulo, perdendo apenas para a Rodoviária Tietê.
Localizada no bairro da Barra Funda, a rodoviária recebe cerca de 40 mil passageiros por dia, e, ao todo, são 40 plataformas disponíveis para a atuação das empresas de ônibus: 12 destinadas ao desembarque e 28 para o embarque de passageiros.
Além das viagens interestaduais e da internacional, são operadas linhas metropolitanas e intermunicipais no mesmo prédio, que também conta com uma das principais estações de trem e metrô de São Paulo.
</p>
              </div>
              <div class="informacoes_postos">
                   <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3658.1425702583047!2d-46.66630123560822!3d-23.527374066221874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1srodoviaria+barra+funda!5e0!3m2!1spt-BR!2sbr!4v1521960304305" allowfullscreen></iframe>
              </div>
          </div>
            <!--Botoes para passar para outros postos rodoviarios-->
          <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
          <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
        </div>

<!--Scrip responsavel pelo movimento do slide-->
<script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
          showDivs(slideIndex += n);
        }

        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
             x[i].style.display = "none";
          }
          x[slideIndex-1].style.display = "block";
        }
</script>


  </div>
</div>
