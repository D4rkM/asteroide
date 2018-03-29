$(function(){
//Função para utilizar a posição do scroll na animação
 $(window).scroll(function() {
   var top = $(window).scrollTop();//top pega a posição do scroll
   if(top > 600){ //verifica se a posição do srcoll é maior do que 150 para diminuir a opacidade
     // alert(top);
     $("#men").css("background-color","#000");
     $("#men").css("border-bottom","solid 1px white");

   }else{ //se não mantem a opacidade
     $("#men").css("background-color","#fff");
   }
 });

 $(".conteudo").load("pagina-principal.php");

});
