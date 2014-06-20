


CADU.actions = CADU.actions || {};

CADU.actions.sair = new function(){
	this.click = function(){
		CADU.ui.activeAction = CADU.actions.sair; // botão ativo
		console.log('sair');
		$('.button_options').show();
		$('#button-sair').css('background-color', 'white');
	};
	
	this.data = {
		'id': 'button-sair',
		'click': 'CADU.actions.sair.click()',
		'name': 'Sair'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.sair);


