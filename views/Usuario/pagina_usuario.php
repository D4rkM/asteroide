<?php
  include('../../links.php');

  $links = alterarLinks(false);
  $paths = alterarCaminhos(false);

 ?>
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo($links); ?>../css/footer.css">
<!--
  Autor: BRUNA
  Data de modificação: 25/03/2018
  Detalhes: Está pagina tem como objetivo fazer o cadastro de usuarios
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
  -->

<!-- Conteúdo da página -->
<div class="conteuno_pagina_usuario">
  <?php require_once('nav.php'); ?>
  <!--Container que segura todas as informações da pagina -->
   <div class="pagina_usuario_container">

       <div class="menu_lateral">
       <ul>
        <a href="<?php echo($paths); ?>editar_perfil.php"><li>Editar Perfil</li></a>
        <a href="<?php echo($paths); ?>interacao_usuario.php"><li>Interação</li></a>
        <a href="<?php echo($paths); ?>historico_viagem.php"><li>Historico de Compra</li></a>
        <!-- <a href="<?php echo($paths); ?>acompanhamento_viagem.php"><li>Acompanhamento da viagem</li></a> -->
       </ul>
     </div>

     <div class="conteudo_usuario">

       <div class="container_informacoes">
         <div class="foto-user">
           <?php
            if($_SESSION['imagem_usuario'] == null){
              ?>
              <img src="<?php echo($links); ?>../img/user2.png" alt="user">
              <?php
            }else{
              ?>
              <img src="<?php $_SESSION['imagem_usuario'] ?>" alt="user">
              <?php
            }
            ?>

           <h3>
             <?php echo($_SESSION['nome_usuario']); ?>
           </h3>
         </div>
         <div class="informacoes_dados">
           <strong>Nome:</strong>Bruna Sousa de Almeida
         </div>
         <div class="informacoes_dados">
           <strong>Email:</strong>brunasousadealmeida@gmail.com
         </div>
         <div class="informacoes_dados">
           <strong>Usuario:</strong>BrunaLinda
         </div>
         <div class="informacoes_dados">
           <strong>CEP:</strong>569-965-569-96
         </div>
         <div class="informacoes_dados">
           <strong>Telefone:</strong>(11)7447-6589
         </div>
         <div class="informacoes_dados">
           <strong>Celular:</strong>(11)97447-6589
         </div>
         <div class="outras_informacoes">
           <strong>Outras Informações</strong>
           Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.
           Nunc viverra imperdiet enim. Fusce est. Vivamus a tellretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.
         </div>
       </div>

       <div class="container_informacoes">
         <div class="foto-user">
           <?php
            if($_SESSION['imagem_usuario'] == null){
              ?>
              <img src="<?php echo($links); ?>../img/user2.png" alt="user">
              <?php
            }else{
              ?>
              <img src="<?php $_SESSION['imagem_usuario'] ?>" alt="user">
              <?php
            }
            ?>

           <h3>
             <?php echo($_SESSION['nome_usuario']); ?>
           </h3>
         </div>
         <div class="informacoes_dados">
           <strong>Informações da ultima viagem</strong>
         </div>
         <div class="informacoes_dados">
           <strong>Email:</strong>brunasousadealmeida@gmail.com
         </div>
         <div class="informacoes_dados">
           <strong>Usuario:</strong>BrunaLinda
         </div>
         <div class="informacoes_dados">
           <strong>CEP:</strong>569-965-569-96
         </div>
         <div class="informacoes_dados">
           <strong>Telefone:</strong>(11)7447-6589
         </div>
         <div class="informacoes_dados">
           <strong>Celular:</strong>(11)97447-6589
         </div>
         <div class="outras_informacoes">
           <strong>Outras Informações</strong>
           Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.
           Nunc viverra imperdiet enim. Fusce est. Vivamus a tellretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.
         </div>
       </div>

     </div>
   </div>
   <?php// require_once('footer.php'); ?>
 </div>
