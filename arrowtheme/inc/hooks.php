<?php
if (!defined('ABSPATH')) {
	return;
}

/**
 * Theme Setup
 */
if (! function_exists('arrow_action_add_theme_support')) {
	function arrow_action_add_theme_support() {
		load_theme_textdomain('arrow', get_template_directory() . '/languages');

		global $content_width;

		if (!isset($content_width)) {
			$content_width	= 1170;
		}

		add_theme_support('custom-header');
		add_theme_support('custom-background');

		add_theme_support('automatic-feed-links');
		add_theme_support("title-tag");
		add_theme_support('post-thumbnails');
		add_theme_support('editor_style');

		add_editor_style();

		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');

		remove_theme_support('custom-header');

		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		));

		add_theme_support('microformats2');
		add_theme_support('microformats');
		add_theme_support('microdata');
	}

	add_action('after_setup_theme', 'arrow_action_add_theme_support');
}