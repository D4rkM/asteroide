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
    <title>Home - Bem vindo</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/style_detalhes.css">
    <script src="js/jquery.min.js"></script>
    <script>
      // Modal Login
      $(document).ready(function() {
            $(".login").click(function() {
              $(".modalContainerLogin").fadeIn(500);
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
    </script>
  </head>
  <body>
    <div class="modalContainerLogin">
      <div class="modal-login">
      </div>
    </div>
       <?php require_once('nav.php'); ?>

       <div class="conteudo_trabalhe_conosco">
         <div class="segura_item">
           <div class="item_um">
             <div class="descricao_item">
               <div class="segura_texto">
                 Um cidadão fez voto de desapego e pobreza. Dispôs de todos os seus bens e propriedades, reservou para si apenas duas tangas, e saiu pelo mundo afora em busca de todos os sábios, medindo na verdade o desapego de cada um. Levava apenas uma tanga no corpo.
       Estava convencido de não encontrar quem ganhasse de si em despojamento, quando soube de um velho guru. Tomando as direções, parte ao encontro do velho sábio.
       Quando lá chegou, tristeza e decepção! Encontrou terras bem cuidadas, um palácio faustoso, muita riqueza, muita pompa. Indignado, procura pelo guru. Um velho servo lhe diz que ele está em uma ala dos magníficos jardins com seus discípulos, estudando desapego. Como era costume da casa Ter gentileza para com os hóspedes, o servo convida o andarilho para o banho, repouso e refeição, antes de se dirigir à presença do sábio.
       Achando tudo muito estranho.
               </div>
             </div>
             <div class="descricao_item">
               <div class="inf_vc">
                 INFORME SOBRE VOCÊ
               </div>
               <div class="vazia">

               </div>
               <div class="vazia">

               </div>
               <div class="segura_dados">
                 <div class="dados_um">
                   NOME:
                 </div>
                 <div class="campos">
                   <input type="txt_nome" name="Nome" value="" size="30">
                 </div>
                 <div class="vazia">

                 </div>
                 <div class="vazia">

                 </div>
                 <div class="dados_dois">
                   TELEFONE:
                 </div>
                 <div class="campos">
                   <input type="txt_telfone" name="Telefone" value="" size="30">
                 </div>
                 <div class="envie_curriculo">
                   ENVIE SEU CURRICULO
                 </div>
                 <div class="buscar_pdf">
                   <button type="button" name="button_buscar">BUSCAR PDF</button>
                 </div>
                 <div class="enviar">
                   <button type="button" name="button_enviar">ENVIAR</button>
                 </div>
               </div>
             </div>
           </div>
           <div class="item_dois">
             <div class="comunicacao">
               <div class="segura_titulo">
                 Fale diretamente conosco
               </div>
               <div class="inf_contato">
                 0800 575 9858
               </div>
             </div>
             <div class="comunicacao">
               <div class="segura_titulo">
                 Ouvidoria da Viação Asteroide
               </div>
               <div class="inf_contato">
                 0800 963 2336
               </div>
             </div>
             <div class="comunicacao">
               <div class="segura_titulo">
                 Redes sociais
               </div>
               <div class="inf_redes">
                 Atendemos também pelo Facebook, Twitter, Consumidor gov
               </div>
             </div>
             <div class="comunicacao">
               <div class="segura_titulo">
                 Suporte Tecnologico
               </div>
               <div class="inf_contato">
                 0800 744 9668
               </div>
             </div>
           </div>
         </div>
       </div>
    <?php require_once('footer.php'); ?>

  </body>
</html>
