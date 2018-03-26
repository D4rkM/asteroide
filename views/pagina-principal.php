
<div class="container">
  <div class="video-principal">
    <video autoplay loop>
      <source src="img/tet.mp4" type="video/mp4">
    </video>
  </div>
  <div class="conteudo_locais">
    <div class="titulo_locais">
      <p style="color:#458665;">
          Se sentindo aventureiro?
        </p>
    </div>
    <div class="titulo_locais">
      <h2>Que tal conhecer novos lugares?</h2>
    </div>
    <div class="locais-viagem">

      <?php
      $a = 0;
      while ($a <= 2) {
       ?>
      <div class="polaroid">
        <img src="img/rio-de-janeiro.jpg" alt="Rio" style="width:100%">
        <div class="texto-polaroid">
          <p>Rio de Janeiro</p>
        </div>
      </div>


      <?php
        $a ++;
        }
      ?>
    </div>
  </div>

  <div class="conteudo_locais">
    <div class="titulo_locais">
      <h2>Veja nossas sugestões de viagens </h2>
    </div>
    <div class="locais-viagem">

      <?php
      $a = 0;
      while ($a <= 2) {
       ?>
      <div class="polaroid">
        <img src="img/rio-de-janeiro.jpg" alt="Rio" style="width:100%">
        <div class="texto-polaroid">
          <p>Rio de Janeiro</p>
        </div>
      </div>


      <?php
        $a ++;
        }
      ?>
    </div>
  </div>

  <div class="conteudo_locais">
    <div class="titulo_locais">
            <h2> Veja quem está viajando com a gente</h2>
    </div>
    <div id="content">
            <div id="carrossel">
                <ul>
                    <li>
                      <div class="comentarios-pag-inicial">
                        <img src="img/rio-de-janeiro.jpg" alt="Nome da Imagem" title="Nome da Imagem" width="200" height="150"/>
                      </div>

                    </li>
                    <li>
                        <img src="img/logo.jpg" alt="Nome da Imagem" title="Nome da Imagem" width="200" height="150"/>
                    </li>
                    <li>
                        <img src="img/rio-de-janeiro.jpg" alt="Nome da Imagem" title="Nome da Imagem" width="200" height="150"/>
                    </li>
                    <li>
                        <img src="img/rio-de-janeiro.jpg" alt="Nome da Imagem" title="Nome da Imagem" width="200" height="150"/>
                    </li>
                    <li>
                        <img src="img/rio-de-janeiro.jpg" alt="Nome da Imagem" title="Nome da Imagem" width="200" height="150"/>
                    </li>
                </ul>
            </div>
            <nav id="menu-carrossel">
                <a href="#" class="prev" title="Anterior">Anterior</a>
                <a href="#" class="next" title="Próximo">Próximo</a>
            </nav>
        </div>
  </div>

</div>
<script src="js/jquery.min.js"></script>
<script src="js/jcarousellite.js"></script>
<script src="js/carrossel.js"></script>
