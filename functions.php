<?php if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => __('Sidebar Widgets','html5reset' ),
		'id'   => 'sidebar-widgets',
		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name' => 'FAQ',
		'id' => 'FAQ',
		'description' => 'Widgets in this area will be shown on the FAQ page.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h1>',
		'after_title' => '</h1>'
	));
}

add_theme_support( 'post-formats', array('quote'));
add_theme_support('post-thumbnails');

//ADD CUSTOM POST TYPES
	add_action('init', 'post_types'); 
	function post_types() { 
	$args = array(
		'label' => __( 'Testimonials' ),
		'singular_name' => __( 'Testimonial' ),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'supports' => array('title','editor','post-formats'),
		'menu_position' => 20
		);
	register_post_type( 'testimonials', $args );
//FAQS
	$args = array(  
		'labels' => array(
			'name' => 'FAQs',
			'singular_label' => 'FAQ'
			),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'supports' => array('title','editor','thumbnail'),
		'taxonomies' => array('category', 'post_tag'), // this is IMPORTANT
		'menu_position' => 21
	   );
	register_post_type( 'faq', $args );
	
add_action('init', 'demo_add_default_boxes');

function demo_add_default_boxes() {
    register_taxonomy_for_object_type('category', 'faqs');
    register_taxonomy_for_object_type('post_tag', 'faqs');
}}

?>