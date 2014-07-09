$(function($) {
	// Quando o formulário for enviado, essa função é chamada
	$("#formCadastraCurso").submit(function() {
		// Colocamos os valores de cada campo em uma váriavel para facilitar a manipulação
		var codCurso = $("#codCurso").val();
		var nomeCurso = $("#nomeCurso").val();
		var idNivelCurso = $("#idNvlCurso").val();
		// Fazemos a requisão ajax com o arquivo envia.php e enviamos os valores de cada campo através do método POST
		$.post('send.php', {codCurso: codCurso, nomeCurso: nomeCurso, idNivelCurso: idNivelCurso }, function(resposta) {
				// Quando terminada a requisição
				// Exibe a div status
				$("#status").slideDown();
				// Se a resposta é um erro
				if (resposta != false) {
					// Exibe o erro na div
					$("#status").html(resposta);
				} 
				// Se resposta for false, ou seja, não ocorreu nenhum erro
				else {
					// Exibe mensagem de sucesso
					document.getElementById('status').style.display = 'block'"
					$("#status").html("Curso cadastrado com <strong>sucesso</strong>");
					// Limpando todos os campos
					$("#codCurso").val("");
					$("#nomeCurso").val("");
					$("#idNvlCurso").val("");
				}
		});
	});
});
