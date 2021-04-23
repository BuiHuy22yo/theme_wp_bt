<?php
if (!defined('ABSPATH')) {
	return;
}

require_once get_template_directory() . '/inc/plugins/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'arrow_register_required_plugins');

/**
 * Register the required plugins for this theme.
 */
function arrow_register_required_plugins() {
	$plugins = array();



	$config = array(
		'id'			=> 'tgmpa',
		'menu'			=> 'tgmpa-install-plugins',
		'has_notices'	=> true,
		'dismissable'	=> true,
		'is_automatic'	=> false,

	);

	tgmpa($plugins, $config);
}
