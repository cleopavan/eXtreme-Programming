/**
 * ...
 * @author ...
 */

CADU.ui = new function() {
	
	this.activeAction = {};
	
	this.options = {
		'buscar': false,
		'cadastrar':false
	};
	this.init = function(){
		console.log('init CADU.ui');
		$('#id-search').on('click', CADU.ui.search);
		$('#id-insert').on('click', CADU.ui.insert);
	};
	
	this.registerAction = function(button){ // insere as funcionalidades de uma ação já definida.
		//console.log('registerAction ' + button.data.id);
		//console.log(button.data.click);
		var buttonName = button.data.id.replace('button-', ' ');
		
		$('#id-action-panel').html($('#id-action-panel').html() +
			'<div class="buttons" id=' +button.data.id +' onclick=' + button.data.click +'>'
			+ '<h1>'+ buttonName +'</h1>'
			+ '</div>'
		);
	}
	
	this.search = function(){
		CADU.ui.options['buscar'] = true;
		$('#id-search').css('background-color', 'white');
		$('#id-search-form').show();
		
		var searchFilters = '<p>'; // variavel com os filtros de pesquisa de acordo com cada ação
		
		for(var i in CADU.ui.activeAction.data.searchFilters){
			console.log(CADU.ui.activeAction.data.searchFilters[i]);
			searchFilters +=  '<input type="checkbox" value=' + CADU.ui.activeAction.data.searchFilters[i] + ' id="id-' + CADU.ui.activeAction.data.searchFilters[i] + '">'
				+ '<label for="id-' + CADU.ui.activeAction.data.searchFilters[i] + '">' + CADU.ui.activeAction.data.searchFilters[i] +'</label>';
			//	+ '</div>';
		}
		searchFilters +='</p>';
		console.log(searchFilters);
		
		$('#id-check-button').html(searchFilters);
	};
	
};