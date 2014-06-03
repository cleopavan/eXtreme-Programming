


CADU.actions = CADU.actions || {};

CADU.actions.sair = new function(){
	this.click = function(){
		console.log('sair');
		 window.location.replace("sair.php");	
	};
	
	this.data = {
		'id': 'button-sair',
		'click': 'CADU.actions.sair.click()',
		'name': 'Sair'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.sair);


