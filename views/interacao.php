
<div class="imagem-de-fundo" style="background-image:url('img/travel.jpg');">
  <div class="titulo-sobre-imagem">
    VEJA QUEM ESTÁ VIAJANDO CONOSCO
  </div>
</div>
<div class="titulo-conteudo-padrao">
  <h2>CONFIRA A VIAGEM DE NOSSOS CLIENTES</h2>
</div>
<div class="conteudo_interacao">
  <div class="interacao_container">
    <?php
    $a = 0;
    while($a < 5){ ?>
    <div class="cardbox">
      <div class="cardbox-title">
        <div class="foto-user">
          <img src="img/client.png" alt="user">
          <h3>
            Medusa
          </h3>
        </div>
        <div class="cardbox-local">
          <img src="img/icon/location.svg" alt="local">
          Angra dos Reis
        </div>
      </div>
      <div class="cardbox-content">
        <div class="cardbox-text">
          <h3 class="subtitulo">"AMEI A VIAGEM!!!!"</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. lorem Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="cardbox-img">
          <img class="" src="img/praia-rio.jpg" alt="angra">
        </div>
      </div>
    </div>
  <?php
  $a++;
} ?>
  </div>
</div>
