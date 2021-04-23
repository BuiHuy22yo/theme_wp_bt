<?php
/*
Plugin Name: 		Arrow Helper
Plugin URI:
Description:		Plugin support arrow theme
Version: 			1.0.0
Author: 			vagrant
Author URI:
*/

if (!defined('ABSPATH')) {
	return;
}

if (!class_exists('ARROW_Helper')) {
	class ARROW_Helper {
		public function __construct() {
			$this->define();
			$this->load_library();
			$this->load_helper();

			add_action('init', array(__CLASS__, 'load_config'), 2);

		}

		// define
		public function define() {
			define('ARROW_HELPER_DIR_PATH', plugin_dir_path(__FILE__));
			define('ARROW_HELPER_DIR_URL', plugin_dir_url(__FILE__));

			define('ARROW_OPTIONS', '_arrow_options');
            define('META_OPTIONS', '_meta_options');
		}

		// load library.
		public function load_library() {
			// Load core framework
			if (!class_exists('CSF')) {
				require_once ARROW_HELPER_DIR_PATH . '/lib/codestar-framework/codestar-framework.php';
			}
		}

		// load config.
		public static function load_config() {
			require_once ARROW_HELPER_DIR_PATH . '/inc/config/framework.php';
			require_once ARROW_HELPER_DIR_PATH . '/inc/config/metabox.php';
		}

		// load helper.
		public function load_helper() {
			require_once ARROW_HELPER_DIR_PATH . '/inc/func/base.php';
			require_once ARROW_HELPER_DIR_PATH . '/inc/func/post-type.php';
			require_once ARROW_HELPER_DIR_PATH . '/inc/func/helpers.php';
			require_once ARROW_HELPER_DIR_PATH . '/inc/func/hooks.php';
			require_once ARROW_HELPER_DIR_PATH . '/inc/func/filter.php';

			// load elementor
			require_once ARROW_HELPER_DIR_PATH . '/inc/func/elementor.php';
		}
	}

	new ARROW_Helper();
}