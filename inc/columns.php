<?php
add_filter('manage_pages_columns', 'page_columns');
function page_columns($columns) {
	unset($columns['date']);
	unset($columns['author']);
	unset($columns['comments']);
	$columns['order'] = 'Order';
	return $columns;
}
add_filter('manage_edit-account_columns', 'product_columns');
function product_columns($columns) {
	$columns['thumb'] = 'Thumb';
	unset($columns['date']);
	return $columns;
}

add_action('manage_posts_custom_column',  'custom_columns');
add_action('manage_pages_custom_column',  'custom_columns');

function custom_columns($name) {
	global $post;
	switch ($name) {
		case 'order':
			echo $post->menu_order;
			break;
		case 'thumb':
			echo get_the_post_thumbnail($post->ID, array(30,30) );
			break;
		case 'type':
			echo the_terms($post->ID,'type','',', ','');
			break;
	}
}
/**/
?>