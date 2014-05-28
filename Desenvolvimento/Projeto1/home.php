<?php
	in("Home");
	<body onload="CADU.init()">
	<div  id="id-title" class="title_action">
	</div>	
	<div id="id-action-panel" class="action_panel">	
	</div>
	
	<div  id="id-content" class="content">
		<div  id="id-options" class="options">
			<div  id="id-search" class="button_options" style="display:none">
				<h2>Buscar</h2>
			</div>
			<div  id="id-insert" class="button_options" style="display:none">
				<h2>Cadastrar</h2>
			</div>
		</div>
		<form id="id-check-button" class="check_button">
		</form>	
		<form action="search.php" id="id-search-form" style="display:none" class="form_search">
			<input type="text" name="string" value="" style="width: 50%; height: 10%; line-height: 2;">
			<input type="submit" value="buscar">
		</form>
		
	</div>	
	
	
	<div  id="id-footer" class="footer">
	</div>	
	
	
</body>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/CADU.js"></script>
	<script src="js/CADU.ui.js"></script>
	<script src="js/actions/CADU.actions.curso.js"></script>
	<script src="js/actions/CADU.actions.logout.js"></script>
	

</html>

?>