<?php
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Register menu.
 */
register_nav_menus( array(
	'primary'       => esc_html__( 'Top primary menu', 'arrow' ),
	'mobile-menu'   => esc_html__( 'Mobile menu', 'arrow' ),
) );
