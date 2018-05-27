<?php

  include('../../links.php');

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
    <title>Interação - Bem vindo</title>
    <link rel="stylesheet" href="<?php echo($links); ?>../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo($links); ?>../css/footer.css">
    <link rel="stylesheet" href="<?php echo($links); ?>../css/style.css">
    <link rel="stylesheet" href="<?php echo($links); ?>../css/interacao_usuario.css">
    <script src="<?php echo($links); ?>../js/jquery.min.js"></script>

  </head>
  <body>
       <?php require_once('nav.php'); ?>
<!-- Conteúdo da página -->
<div class="conteudo_interacao1">
  <!--Container que segura todas as informações da pagina -->
  <div class="interacao_container1">
    <!--Container responsael por segurar o titulo da pagima -->
    <div class="titulo-conteudo-padrao">
      <h2>Interações</h2>
    </div>
     <div class="menu_lateral2">
     <ul>
      <a href="editar_perfil.php"><li>Editar Perfil</li></a>
      <a href="interacao_usuario.php"><li>Interação</li></a>
      <a href="historico_viagem.php"><li>Historico de Compra</li></a>
      <a href="acompanhamento_viagem.php"><li>Acompanhamento da viagem</li></a>
     </ul>
   </div>
     <!--Segura todos os itens do cadastro-->
      <div class="interacao">
        <h2>Gostou da viagem? Compatilhe com seus amigos como foi a experiencia de viajar com a Viação Asteroide</h2>
        <div class="postar_viagem">
          <form action="../../router.php?controller=interacao&modo=novo" method="post" enctype="multipart/form-data">
            <textarea class="box_interacao" name="txtinteracao" placeholder="EX:Minha viagem para Minas Gerais foi muito legal..."></textarea>
            <!-- <img class="img_interacao2" src="../../img/praia-rio.jpg" alt="camera"> -->
            <label for="foto">
              <div  class="adicionar_imagem" id="imagem">
                <img id="id_sua_img" src="../img/client.png" alt="user"/>
              </div>
            </label>
            <!--Botão para selecionar a foto-->
            <div class="input-foto">
              <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
            </div>
            <img src="../../img/local2.png" alt="local">
            <input type="text" name="txtlocal" value="" placeholder="Local">
            <button class="btn2"type="submit" name="button">Postar</button>
          </form>
        </div>
        <h2>Minhas Postagens</h2>
          <?php
          // $a = 0;
          // while($a < 2){
          require_once("../../controllers/interacao_controller.php");
          require_once("../../models/interacao_class.php");

          $controller_interacao = new controllerInteracao();
          $list = $controller_interacao::Lista();
          $cont = 0;

          while($cont < count($list)){
           ?>
          <div class="cardbox">
            <div class="cardbox-title">
              <div class="foto-user">
                <img src="<?php echo($links); ?>../<?php echo $list[$cont]->imagem_usuario ?>" alt="user">
                <h3>
                  <?php echo $list[$cont]->nome_usuario ?>
                </h3>
              </div>
              <div class="cardbox-local">
                <img src="<?php echo($links); ?>../img/icon/location.svg" alt="local">
                <?php echo $list[$cont]->local ?>
              </div>
            </div>
            <div class="cardbox-content">
              <div class="cardbox-text">
                <p><?php echo $list[$cont]->comentario ?></p>
                </div>
              <div class="cardbox-img">
                <img class="" src="<?php echo($links); ?>../<?php echo $list[$cont]->imagem ?>" alt="angra">
              </div>
            </div>
          </div>
        <?php
        // $a++;
        $cont+=1;
      }

       ?>

      </div>
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
