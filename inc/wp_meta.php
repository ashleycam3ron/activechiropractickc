<?php
	$meta_boxes[] = array(
		'id' => 'product-details',
		'title' => 'Product Details',
		'pages' => array('product'),
		'context' => 'normal',
		'priority' => 'high',
	
		'fields' => array(
			array(
				'name' => 'Custom 1',
				'desc' => 'format, description, help',
				'id' => 'custom_1',
				'type' => 'text',
				'std' => 'default text'
			),
			array(
				'name' => 'Custom 2',
				'desc' => 'format, description, help',
				'id' => 'custom_2',
				'type' => 'text',
				'std' => 'default text'
			),
			array(
				'name' => 'Custom 3',
				'desc' => 'format, description, help',
				'id' => 'custom_3',
				'type' => 'text',
				'std' => 'default text'
			)
		)
	);
	
	foreach ($meta_boxes as $meta_box) {
	   new RW_Meta_Box($meta_box);
	}
	
	/*
	$meta_sections[] = array(
		'id' => 'survey',
		'title' => 'Survey',
		'taxonomies' => array('category', 'post_tag'),
	
		'fields' => array(
			array(
				'name' => 'Your favorite color',
				'id' => 'color',
				'type' => 'color'						// color
			),
			array(
				'name' => 'Your hobby',
				'id' => 'hobby',
				'type' => 'checkbox_list',				// checkbox list
				'options' => array(						// options of checkbox, in type key => value (key cannot contain space)
					'reading' => 'Books, Magazines',
					'sport' => 'Gym, Boxing'
				),
				'desc' => 'What do you do in free time?'
			),
			array(
				'name' => 'When do you get up?',
				'id' => 'getup',
				'type' => 'time',						// time
				'format' => 'hh:mm:ss'					// time format, default hh:mm. Optional. See more formats here: http://goo.gl/hXHWz
			)
		)
	);
	
	foreach ($meta_sections as $meta_section) {
		$my_section = new RW_Taxonomy_Meta($meta_section);
	}
	
	*/
?>