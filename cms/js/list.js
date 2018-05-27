$(document).ready(function(){
  $('#parada_para_selecionar').sortable({
    connectWith: '#parada_selecionada',
  });

  $('#parada_selecionada').sortable({
    connectWith: '#parada_para_selecionar',
  });

});

$(document).on('click', '#save', (e) => {
  e.preventDefault();
  var lista = $('#parada_selecionada').sortable('toArray');
  var viagem = $('#viagem').val();
  console.log(lista + "\n Viagem: " + viagem);
  // alert(lista);
  $.post('./insere.php', {paradas : lista, vid: viagem})
    .done((data) => {
      alert('foi'+data);
    })
    .fail(() => {
      alert('falhou');
    });

});
