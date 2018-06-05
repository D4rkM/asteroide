<?php
//Aplica a verificação dos links que a pagina vai receber
  if(!isset($links)){
    $links = alterarLinks(true);
  }
 ?>
<!DOCTYPE html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Magno">

    <!--
      Data de modificação: 19/03/2018
      Obs: Página principal contém menu e rodapé para inserir as outras páginas
    -->
    <title>Home - Bem vindo</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/style_detalhes.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/chatbot.css">
    <!-- <script src="js/jquery.min.js"></script> -->
  </head>
  <body >
    <div class="modalContainerLogin">
      <div class="modal-login">
      </div>
    </div>
       <?php
          require_once('views/nav.php');
          require_once('filtro.php');
        ?>

         <!-- <div class="conteudo-video"> -->
           <div class="video-principal">
             <div>
               <img src="<?php echo($links); ?>img/road.jpg" alt="home"style="width:100vw; height:90vh; overflow:hidden;">
             </div>
             <!-- <img src="img/Paleta-de-Cores.jpg" alt="" width="500"> -->
             <div class="frase-inicial">
                <h2 id="frases">Deixe o stress de lado e curta nossa viagem</h2>
             </div>
           </div>
         <!-- </div> -->

         <div class="conteudo_locais">
           <div class="titulo_locais">
             <p style="color:#3f635f;" class="subtitulo">
               <b>  SE SENTINDO AVENTUREIRO? </b>
               </p>
           </div>
           <div class="titulo_locais" style="color:#1f405e;">
             <h2><strong>QUE TAL CONHECER NOVOS LUGARES?</strong></h2>
           </div>
           <a href="#">
             <div class="locais-viagem">
               <?php
                 require_once("cms/controllers/home_controller.php");
                 require_once("cms/models/home_class.php");

                 $controller_home = new controllerHome();
                 $list = $controller_home::Listar();

                 foreach ($list as $value) {
                 if($value->tipo == 2){

               ?>
               <div class="polaroid" >
                 <img src="cms/<?php //echo($links); ?><?php echo $value->imagem ?>" alt="Rio" style="width:100%">
                 <div class="texto-polaroid">
                   <p<?php echo $value->id_viagem ?>><?php echo $value->origem. " - " .$value->destino ?></p>
                 </div>
               </div>
               <?php
                     }
                   }
                   ?>
             </div>
           </a>

         </div>

         <div class="conteudo_locais">
           <div class="titulo_locais" style="color:#1f405e;">
             <h2><strong>APROVEITE NOSSAS SUGESTÕES DE VIAGENS!</strong> </h2>
           </div>
           <div class="locais-viagem">
             <?php
               require_once("cms/controllers/home_controller.php");
               require_once("cms/models/home_class.php");

               $controller_home = new controllerHome();
               $list = $controller_home::Listar();

               foreach ($list as $value) {
                   if($value->tipo == 1){

             ?>
             <div class="polaroid" >
               <img src="cms/<?php //echo($links); ?><?php echo $value->imagem ?>" alt="Rio" style="width:100%">
               <div class="texto-polaroid">
                 <p<?php echo $value->id_viagem ?>><?php echo $value->origem. " - " .$value->destino ?></p>
               </div>
             </div>
             <?php
                    }
                  }
                  ?>
           </div>
         </div>

         <div class="conteudo_locais">
           <div class="titulo_locais" style="color:#1f405e;">
                   <h2>VEJA QUEM ESTÁ VIAJANDO COM A GENTE!</h2>
           </div>
           <div id="content">

                   <div id="carrossel">

                       <ul>
                         <?php
                         // require_once('controllers/interacao_controller.php');
                         require_once('models/interacao_class.php');

                         $interacao = new Interacao();
                         $listInteracao = $interacao::Select();

                         $a = 0;
                         while ($a <= 2) {
                          ?>
                           <li>
                             <a href="views/interacao.php">
                               <div class="comentarios-pag-inicial">
                                 <div class="comentario-usuario">
                                   <img src="<?php echo($listInteracao[$a]->imagem); ?>" alt="Nome da Imagem" title="Nome da Imagem" />
                                   <b><?php $listInteracao[$a]->nome_usuario ?></b>
                                 </div>
                                 <div class="comentario-conteudo" style="color:grey; text-overflow:ellipsis;">
                                   <?php echo($listInteracao[$a]->comentario); ?>
                                 </div>
                               </div>
                             </a>
                           </li>
                           <?php
                            $a ++;
                             }
                           ?>
                       </ul>
                   </div>

               </div>
         </div>

       </div>
      <?php require_once('footer.php');
            // require_once('chatbot.php');
      ?>
        <!-- <script src="<?php //echo($links); ?>js/jquery.min.js"></script>  -->
       <script src="js/jquery-3.3.1.js"></script>
       <script src="<?php echo($links); ?>js/slick.js" type="text/javascript" charset="utf-8"></script>
       <script src="<?php echo($links); ?>js/jcarousellite.js"></script>
       <script src="<?php echo($links); ?>js/carrossel.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script>
      // Modal Login
      $(document).ready(function() {
        $(".login").click(function() {
          $(".modalContainerLogin").fadeIn(500);
        });
        $(".regular").slick({
          dots: true,
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 3
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

      function sugestaoPesquisa(pesquisa){

      return $.ajax({
          url: 'router.php?controller=cidade&modo=pesquisa',
          type: 'POST',
          data:{'pesquisa':pesquisa},
        });


      }

      $(function(){
        var listorigem;

        $(document).on('keyup', '#txtorigem', function(){
          var origem = $(this).val();
          // console.log(origem);
          if(origem.length > 0){
            // Retorna o log com valores da pesquisa
            // console.log(
            sugestaoPesquisa(origem).done(autocompletarOrigem);
            // );
          }


        });

        $(document).on('keyup', '#txtdestino', function(){
          var destino = $(this).val();
          // console.log(origem);
          if(destino.length > 0){

            sugestaoPesquisa(destino).done(autocompletarDestino);

          }


        });

        function autocompletarOrigem(listorigem){
          var lista = JSON.parse(listorigem);
          // console.log('lista');
          $( "#txtorigem" ).autocomplete({
            source: lista
          }
          );
        }

        function autocompletarDestino(listdestino){
          var lista = JSON.parse(listdestino);
          // console.log('lista');
          $( "#txtdestino" ).autocomplete({
            source: lista
          }
          );
        }
      });




    </script>



  </body>
</html>
