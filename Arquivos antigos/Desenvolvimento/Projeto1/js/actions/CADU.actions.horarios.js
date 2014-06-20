
CADU.actions = CADU.actions || {};

CADU.actions.horarios = new function(){
	this.click = function(){
		/*console.log('horarios');
		window.location.replace("horarios.php");	
		*/
		 
		CADU.ui.activeAction = CADU.actions.horarios; // botão ativo
		console.log('horarios');
		$('.button_options').show();
		$('#button-horarios').css('background-color', 'white');
	};
	
	this.data = {
		'id': 'button-horarios',
		'click': 'CADU.actions.horarios.click()',
		'name': 'Horarios'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.horarios);


