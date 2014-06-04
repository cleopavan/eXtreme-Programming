


CADU.actions = CADU.actions || {};

CADU.actions.perfil = new function(){
	this.click = function(){
		CADU.ui.activeAction = CADU.actions.perfil; // botão ativo
		console.log('perfil');
		$('.button_options').show();
		$('#button-perfil').css('background-color', 'white');
	};
	
	this.data = {
		'id': 'button-perfil',
		'click': 'CADU.actions.perfil.click()',
		'name': 'Perfil'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.perfil);


