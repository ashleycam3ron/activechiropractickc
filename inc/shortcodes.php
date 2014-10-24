<?php
function bloginfo_shortcode($atts){
	extract(shortcode_atts(array('key' => '',), $atts));
	return get_bloginfo($key);
}
add_shortcode('bloginfo', 'bloginfo_shortcode');
function flatten($array,$return=array()){
	foreach($array as $k=>$v){
		if(is_array($v)){
			$return = flatten($v,$return);
		}else{
			if($v){
				$return[] = $v;
			}
		}
	}
	return $return;
}
function pre($a){
	echo '<pre>' . htmlentities( utf8_encode( print_r( $a, true ) ), ENT_QUOTES, 'utf-8' ) . '</pre>';
}
function page_title($a=''){
	if(empty($a)){
		global $page, $paged;
		wp_title('-',true,'right');
		bloginfo( 'name' );
		$site_description = get_bloginfo('description','display');
		if($site_description && (is_home() || is_front_page())) echo " - ".$site_description;
		if($paged > 1 || $page > 1) echo ' - ' . sprintf( __( 'Page %s', 'twentyeleven' ), max($paged, $page));
	}
}
?>