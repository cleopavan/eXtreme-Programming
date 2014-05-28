


CADU.actions = CADU.actions || {};

CADU.actions.logout = new function(){
	this.click = function(){
		console.log('logout');
		 window.location.replace("logout.php");	
	};
	
	this.data = {
		'id': 'button-logout',
		'click': 'CADU.actions.logout.click()'
	};
	
	
};
CADU.ui.registerAction(CADU.actions.logout);


