<?php
	require_once dirname (__FILE__)."/library/library.php";
	
	in("Home");
	
	echo '<body onload="CADU.init()">';
	echo '<div  id="id-title" class="title_action">';
	echo '</div>';
	echo '<div id="id-action-panel" class="action_panel">';
	echo '</div>';
	
	echo '<div  id="id-content" class="content">';
	echo '	<div  id="id-options" class="options">';
	/*echo '		<div  id="id-search" class="button_options" style="display:none">';
	echo '			<h2>Buscar</h2>';
	echo '		</div>';
	echo '		<div  id="id-insert" class="button_options" style="display:none">';
	echo '			<h2>Cadastrar</h2>';
	echo '		</div>';*/
	echo '	</div>';
	/*echo '	<form id="id-check-button" class="check_button">';
	echo '	</form>';
	echo '	<form action="search.php" id="id-search-form" style="display:none" class="form_search">';
	echo '		<input type="text" name="string" value="" style="width: 50%; height: 10%; line-height: 2;">';
	echo '		<input type="submit" value="buscar">';
	echo '	</form>';*/
	echo '</div>';
	
	
	echo '<div  id="id-footer" class="footer">';
	echo '</div>';
	
	
	echo '<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>';
	echo '<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>';
	echo '<script src="js/CADU.js"></script>';
	echo '<script src="js/CADU.ui.js"></script>';
	echo '<script src="js/actions/CADU.actions.horarios.js"></script>';
	echo '<script src="js/actions/CADU.actions.status.js"></script>';
	echo '<script src="js/actions/CADU.actions.perfil.js"></script>';
	echo '<script src="js/actions/CADU.actions.sair.js"></script>';
?>