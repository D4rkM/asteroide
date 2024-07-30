<?php
// verifica se a variavel de sessão contém o conteudo da pagina home
function alterarLinks($bool){

  if($bool == true){
    $links = '';
  }else{
    $links = '../';
  }
  return $links;
}
// Altera os caminhos que serão chamadas as páginas
function alterarCaminhos($bool){

  if($bool == true){
    $paths = './views/';
  }else{
    $paths = '';
  }
  return $paths;
}

?>
