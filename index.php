<?php
  // Importa a classe links para verificação dos links das paginas
  include('links.php');
  //Aplica a verificação dos links que a pagina vai receber
  $links = alterarLinks(true);
  $paths = alterarCaminhos(true);
  // Chama a página principal do site
  require_once('views/home.php');
?>
