


CADU.actions = CADU.actions || {};

CADU.actions.perfil = new function(){
	this.click = function(){
		console.log('perfil');
		 window.location.replace("perfil.php");	
	};
	
	this.data = {
		'id': 'button-perfil',
		'click': 'CADU.actions.perfil.click()',
		'name': 'Perfil'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.perfil);


