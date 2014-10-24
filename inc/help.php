<?php

function custom_help_text($contextual_help, $screen_id, $screen) {
	switch($screen->id){
		case 'dashboard' :
			$contextual_help =
			'<p>General information about how to use the admin for '.get_bloginfo('name').'</p>'.
			'<p>the minnow PROJECT<br/>(402) 475-3322</p>';
			break;
		default :
			$contextual_help = $screen->id;
			break;
	}
	return $contextual_help;
}
add_action('contextual_help','custom_help_text',10,3);
?>