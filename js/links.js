// Cria um objeto que ira receber as devidas funções para ab

var asteroide = {
  // fetch: function() {
  //   $('#news').load('news.php?id=' + this.id).show();
  // },
  inicio: function() {
    $('#conteudo').load('views/pagina_principal.php').show();
  },
  leg: function(){
    // $('#conteudo').css('display','none');
    $('#conteudo').load('views/legislacao.php').show();
  },
  faq: function(){
    $('#conteudo').load('views/duvidas_frequentes.php').show();
  },
  frotas: function(){
    $('#conteudo').load('views/frotas.php').show();
  },
  fale_conosco: function(){
    $('#conteudo').load('views/fale_conosco.php').show();
  },
  interacao: function(){
    $('#conteudo').load('views/interacao.php').show();
  },
  postos: function(){
    $('#conteudo').load('views/postos_rodoviarios.php').show();
  },
  ranking: function(){
    $('#conteudo').load('views/ranking.php').show();
  },
  sobre: function(){
    $('#conteudo').load('views/sobre_empresa.php').show();
  }
};

 $(document).ready(function(e){
   $.routes.add('/conteudo/', asteroide.fale_conosco());
});

  $('#leg').click(function(){
    // $('#conteudo').css('display','none');
    console.log('ok');
    $.routes.add('/conteudo/', asteroide.fetch());
  });

// $.routes.add('/news/{id:int}/', asteroide.home);
