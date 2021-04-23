<?php
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 ******************************************************************************************************************************
 *  SITE STYLE
 ******************************************************************************************************************************
 */
// Third party scripts.
wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/vendor/bootstrap-grid.min.css', array() );
wp_enqueue_style( 'bootstrap');
wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/vendor/slick.css', array() );
wp_register_style( 'fancybox', get_template_directory_uri() . '/css/vendor/fancybox.min.css', array() );
wp_enqueue_style('awesome', get_template_directory_uri() . '/css/vendor/awesome/font-awesome.min.css', array(), '5.11.2');
// Enqueue
wp_enqueue_style( 'font-awesome' );

wp_enqueue_style( 'arrow-style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' );
wp_enqueue_style( 'arrow-style1', get_template_directory_uri() . '/scss/style.css', array(), '1.0.0' );

if ( is_rtl() ) {
	wp_enqueue_style( 'arrow-style-rtl', get_template_directory_uri() . '/css/rtl.css', array() );
}

$custom_css = arrow_get_option( 'custom_css' );

if ( $custom_css ) {
	wp_add_inline_style( 'arrow-style', wp_specialchars_decode( $custom_css ) );
}

/**
 ******************************************************************************************************************************
 *  SITE SCRIPT
 ******************************************************************************************************************************
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

// Third party scripts.
wp_register_script( 'isotope', get_template_directory_uri() . '/js/vendor/isotope.pkgd.min.js', array( 'jquery' ), '3.0.6', true );
wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/vendor/slick.min.js', array( 'jquery' ), '1.9.0', true );
wp_register_script( 'fancybox', get_template_directory_uri() . '/js/vendor/jquery.fancybox.min.js', array(), '3.5.7', true );
wp_register_script( 'tab', get_template_directory_uri() . '/js/vendor/tab.js', array( 'jquery' ), '3.3.6', true );
wp_register_script( 'headroom', get_template_directory_uri() . '/js/vendor/headroom.min.js', array( 'jquery' ), '0.10.3', true );

// Enqueues
$general_options = arrow_header_general_params();

wp_enqueue_script( 'headroom' );
wp_enqueue_script( 'arrow-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );
wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), '1.0.0', true );

$custom_js = arrow_get_option( 'custom_js' );

if ( $custom_js ) {
	wp_add_inline_script( 'arrow-script', $custom_js );
}

wp_localize_script( 'arrow-script', 'arrow_script', array(
	'ajax_url'      => admin_url( 'admin-ajax.php' ),
	'site_url'      => esc_url( home_url( '/' ) ),
	'is_rtl'        => is_rtl(),
	'is_sticky'     => $general_options['is_sticky'],
	'view_port'     => arrow_get_option( 'menu_max_width', 992 ),
	'product_added' => esc_html__( 'Product Added', 'arrow' ),
) );
