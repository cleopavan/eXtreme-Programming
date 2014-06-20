


CADU.actions = CADU.actions || {};

CADU.actions.status = new function(){
	this.click = function(){
		CADU.ui.activeAction = CADU.actions.status; // botão ativo
		console.log('status');
		$('.button_options').show();
		$('#button-status').css('background-color', 'white');
	};
	
	this.data = {
		'id': 'button-status',
		'click': 'CADU.actions.status.click()',
		'name': 'Status'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.status);


