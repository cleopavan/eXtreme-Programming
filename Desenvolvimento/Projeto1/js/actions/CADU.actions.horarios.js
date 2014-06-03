


CADU.actions = CADU.actions || {};

CADU.actions.horarios = new function(){
	this.click = function(){
		console.log('horarios');
		 window.location.replace("horarios.php");	
	};
	
	this.data = {
		'id': 'button-horarios',
		'click': 'CADU.actions.horarios.click()',
		'name': 'Horarios'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.horarios);


