function mostrarBusca() {
  $.ajax({
    type: "POST",
    url: "./send.php",
    data: {
      frase: $('#frase').val(),
      filter: $('#filter').val(),
      acao: $('#acao').val()
    },
    success: function(data) {
      $('#tabela').html(data);
    }
  });
}