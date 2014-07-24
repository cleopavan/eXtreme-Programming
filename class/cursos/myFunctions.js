function mostrarBusca() {
	var ufilter;
	if($('#filter1').is(':checked') == true){
		ufilter = $('#filter1').val();
	}
	if($('#filter2').is(':checked') == true){
		ufilter = $('#filter2').val();
	}
	if($('#filter3').is(':checked') == true){
		ufilter = $('#filter3').val();
	}
	
	$.ajax({
		type: "POST",
		url: "./send.php",
		data: {
			frase: $('#frase').val(),
			filter: ufilter,
			acao: $('#acao').val()
		},
		success: function(data) {
			$('#tabela').html(data);
		}
	});
}