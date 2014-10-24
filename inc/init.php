<?php
remove_action('wp_head','wp_generator');

if(!function_exists('initialize')){
	function initialize() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		$cap = $GLOBALS['wp_post_types'];
		foreach($cap as $k=>$v){
			if($v->_builtin != 1){
				foreach($v->cap as $c=>$p){
					$role = get_role('administrator');
					$role->add_cap($p);
				}
			}
		}
	}
	add_action('init','initialize');
}
if(!function_exists('custom_setup')){
	function custom_setup(){
		remove_action('admin_menu','twentyeleven_theme_options_add_page');
		add_theme_support( 'post-formats', array('image', 'video'));
		unregister_default_headers(array('wheel','shore','trolley','pine-cone','chessboard','lanterns','willow','hanoi'));
	}
	add_action('after_setup_theme','custom_setup',11);
}
if(!function_exists('remove_widgets')){
	function remove_widgets(){
		unregister_sidebar( 'sidebar-1' );
		unregister_sidebar( 'sidebar-2' );
		unregister_sidebar( 'sidebar-3' );
		unregister_sidebar( 'sidebar-4' );
		unregister_sidebar( 'sidebar-5' );
	}
	add_action('widgets_init','remove_widgets',11);
}
if(!function_exists('custom_login_logo')){
	function custom_login_logo(){
		echo '<style type="text/css">h1 a { background-image:url('.get_bloginfo('stylesheet_directory').'/image/logo.png) !important; }</style>';
	}
	add_action('login_head','custom_login_logo');
}
if(!function_exists('custom_login_logo')){
	function custom_login_url(){
		return site_url();
	}
	add_filter('login_headerurl','custom_login_url',10, 4);
}
if(!function_exists('remove_dashboard_widgets')){
	function remove_dashboard_widgets(){
		remove_meta_box('dashboard_right_now','dashboard','normal');
		remove_meta_box('dashboard_incoming_links','dashboard','normal');
		remove_meta_box('dashboard_recent_comments','dashboard','normal');
		remove_meta_box('dashboard_plugins','dashboard','normal');
		remove_meta_box('dashboard_primary','dashboard','side');
		remove_meta_box('dashboard_secondary','dashboard','side');
		remove_meta_box('dashboard_quick_press','dashboard','side');
		remove_meta_box('w3tc_latest','dashboard','normal');
		remove_meta_box('w3tc_pagespeed','dashboard','normal');
	}
	add_action('wp_dashboard_setup','remove_dashboard_widgets');
}
if(!function_exists('remove_admin_pages')){
	function remove_admin_pages(){
		global $current_user;
		get_currentuserinfo();
		
	}
	add_action('admin_init','remove_admin_pages');
}
if(!function_exists('remove_admin_bar_links')){
	function remove_admin_bar_links(){
		/*global $wp_admin_bar;
		global $current_user;
		get_currentuserinfo();
		if($current_user->wp_user_level<10){
			$wp_admin_bar->remove_menu('comments');
			$wp_admin_bar->remove_menu('new-link');
			$wp_admin_bar->remove_menu('new-feedback');
		}*/
	}
	add_action('wp_before_admin_bar_render','remove_admin_bar_links');
}
function custom_right_now($a){
	$pages = get_post_types(array('public'=>true,'_builtin'=>true),'object','and');
	$custom = get_post_types(array('public'=>true,'_builtin'=>false),'object','and');
	$types = array_merge($pages,$custom);
	echo '<div class="table table_content"><table><tbody>';
	foreach($types as $k=>$v){
		if(current_user_can('edit_'.$k.'s')){
			
			$num_posts = wp_count_posts($k);
			$num = number_format_i18n( $num_posts->publish );
			$text = _n( $v->labels->singular_name, $v->labels->name, intval($num_posts->publish) );
			
				$num = "<a href='edit.php?post_type=$k'>$num</a>";
				$text = "<a href='edit.php?post_type=$k'>$text</a>";
			
			echo '<td class="first b b-$k">' . $num . '</td>';
			echo '<td class="t $k">' . $text . '</td>';
			echo '</tr>';
			if ($num_posts->pending > 0) {
				$num = number_format_i18n( $num_posts->pending );
				$text = _n( $v->labels->singular_name.' Pending', $v->labels->name.' Pending', intval($num_posts->pending) );
				if ( current_user_can( 'edit_posts' ) ) {
					$num = "<a href='edit.php?post_status=pending&post_type=$k'>$num</a>";
					$text = "<a href='edit.php?post_status=pending&post_type=$k'>$text</a>";
				}
				echo '<td class="first b b-$k">' . $num . '</td>';
				echo '<td class="t $k">' . $text . '</td>';
				echo '</tr>';
			}
		}
	}
	echo '</tbody></table></div>';
}
if(!function_exists('add_custom_dashboard_widget')){
	function add_custom_dashboard_widget() {
		wp_add_dashboard_widget('custom_right_now', 'Right Now', 'custom_right_now');
	}
	add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');
}
if(!function_exists('base_admin_css')){
	function base_admin_css(){
		wp_enqueue_style('base-admin-css', get_stylesheet_directory_uri() .'/css/admin.css', false, '1.0', 'all');
	}
	add_action('admin_print_styles', 'base_admin_css');
}
if(!function_exists('css_to_editor')){
	function css_to_editor($wp){
		$wp .= ',' . get_bloginfo('stylesheet_directory').'/css/site.css';
		return $wp;
	}
	add_filter('mce_css','css_to_editor');
}
if(!function_exists('tinymce_styles')){
	function tinymce_styles($init){
		$init['theme_advanced_buttons2_add'] = 'styleselect';
		$init['theme_advanced_styles'] = 'Display-Name=class-name';
		return $init;
	}
	add_filter('tiny_mce_before_init','tinymce_styles');
}
if(!function_exists('browser_body_class')){
	function browser_body_class($classes) {
		
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE) $classes[] = 'ie';
		else $classes[] = 'unknown';
		if($is_iphone) $classes[] = 'iphone';
		
		$hua = strtolower($_SERVER['HTTP_USER_AGENT']);
		$browsers = array('firefox','msie','opera','chrome','safari','mozilla','seamonkey','konqueror','netscape','gecko','navigator','mosaic','lynx','amaya','omniweb','avant','camino','flock','aol');
		foreach($browsers as $b){
			if(preg_match("#($b)[/ ]?([0-9.]*)#", $hua, $match)){
				$classes[] = $match[1].'-verion-'.preg_replace('/\./','-',$match[2]);
				break;
			}
		}
		$platforms = array('android','ipad','ipod','blackberry','iphone','win','mac','ppc','linux','os/2','beos');
		foreach($platforms as $p){
			if(preg_match("($p)", $hua, $match)){
				$classes[] = $p;
				break;
			}
		}
		return $classes;
	}
	add_filter('body_class','browser_body_class');
}
?>