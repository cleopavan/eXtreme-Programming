


CADU.actions = CADU.actions || {};

CADU.actions.status = new function(){
	this.click = function(){
		console.log('status');
		 window.location.replace("status.php");	
	};
	
	this.data = {
		'id': 'button-status',
		'click': 'CADU.actions.status.click()',
		'name': 'Status'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.status);


