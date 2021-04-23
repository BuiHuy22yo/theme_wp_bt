<?php
if (!defined('ABSPATH')) {
	return;
}

/**
 * Primary widget
 */
register_sidebar(array(
	'id'			=> 'primary-bar',
	'name'			=> esc_html__('Primary Bar', 'arrow'),
	'description'	=> esc_html__('Drag widgets for all of pages sidebar', 'arrow'),
	'before_widget'	=> '<div class="arrow-widget %2$s">',
	'after_widget'	=> '<div class="clear"></div></div>',
	'before_title'	=> '<div class="arrow-widget-title"><h4>',
	'after_title'	=> '</h4></div>',
));

/**
 * Footer Widget
 */
$footer_widgets	= arrow_get_option('footer_widgets');

if ($footer_widgets ) {
	$length	= 0;

	switch ($footer_widgets) {
		case 5:
			$length	= 6;
			break;
		case 6:
		case 7:
		case 8:
			$length	= 3;
			break;
		case 9:
		case 10:
			$length	= 4;
			break;
		default:
			$length	= $footer_widgets;
			break;
	}

	for ($i = 0; $i < $length; $i++) {
		$num	= $i + 1;

		register_sidebar(array(
			'id'			=> 'footer-' . $num,
			'name'			=> sprintf(esc_html__('Footer Widgets %d', 'arrow'), $num),
			'description'	=> esc_html__('Drag widgets for all of pages sidebar', 'arrow'),
			'before_widget'	=> '<div class="arrow-widget %2$s">',
			'after_widget'	=> '<div class="clear"></div></div>',
			'before_title'	=> '<div class="arrow-widget-title"><h4>',
			'after_title'	=> '</h4></div>',
		));
	}
}

if (class_exists('WooCommerce')) {
	/**
	 * Shop widget
	 */
	register_sidebar(array(
		'id' => 'shop-bar',
		'name' => esc_html__('Shop Bar', 'arrow'),
		'description' => esc_html__('Drag widgets for all of pages sidebar', 'arrow'),
		'before_widget' => '<div class="arrow-widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<div class="arrow-widget-title"><h4>',
		'after_title' => '</h4></div>',
	));

	/**
	 * Product widget
	 */
	register_sidebar(array(
		'id' => 'product-bar',
		'name' => esc_html__('Product Bar', 'arrow'),
		'description' => esc_html__('Drag widgets for all of pages sidebar', 'arrow'),
		'before_widget' => '<div class="arrow-widget %2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<div class="arrow-widget-title"><h4>',
		'after_title' => '</h4></div>',
	));

    register_sidebar(array(
        'id' => 'sidebar',
        'name' => esc_html__('Sidebar', 'arrow'),
        'description' => esc_html__('Drag widgets for all of pages sidebar', 'arrow'),
        'before_widget' => '<div class="arrow-widget %2$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<div class="arrow-widget-title"><h4>',
        'after_title' => '</h4></div>',
    ));
}