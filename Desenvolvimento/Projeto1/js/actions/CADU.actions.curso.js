
CADU.actions = CADU.actions || {};

CADU.actions.curso = new function(){
	this.click = function(){
		CADU.ui.activeAction = CADU.actions.curso; // botão ativo
		console.log('curso');
		$('.button_options').show();
		$('#button-curso').css('background-color', 'white');
	};
	
	this.data = {
		'id': 'button-curso',
		'click': 'CADU.actions.curso.click()',
		'searchFilters':['nome','codigo','nivel'],
		'name': 'Curso'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.curso);