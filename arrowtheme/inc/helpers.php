<?php
if (!defined('ABSPATH')) {
	return;
}

/**
 * Social List
 */
if (! function_exists('arrow_generate_html_social_list')) {
	function arrow_generate_html_social_list() {
		$social_list = arrow_get_option('_social_list');

		$html = '<div class="arrow-social-list"><ul>';

		if (!empty($social_list)) {
			foreach ($social_list as $social) {
				$html .= '<li><a href="' . esc_url(arrow_get_value_in_array($social, 'link')) . '" class="' . esc_attr(arrow_get_value_in_array($social, 'icon')) . '"></a></li>';
			}
		}

		$html .= '</ul></div>';

		return $html;
	}
}


/**
 * Show Menu by ID
 */
if (! function_exists('arrow_generate_html_menu_by_id')) {
	function arrow_generate_html_menu_by_id($slug) {
		$menu = wp_get_nav_menu_items($slug);

		$html  = '<div class="arrow-menu">';
		$html .= '<ul class="menu">';

		if (!empty($menu)) {
			foreach ($menu as $item) {
				$html .= '<li class="menu-item">';
				$html .= '<a href="' . esc_url($item->url) . '">' . esc_attr($item->title) . '</a>';
				$html .= '</li>';
			}
		}

		$html .= '</ul></div>';

		return $html;
	}
}

/**
 * Pagination
 */
/**
 * Render pagination.
 */
if (!function_exists('arrow_pagination')) {
	function arrow_pagination() {
		echo '<div class="arrow-pagination">';

		the_posts_pagination(array(
            'mid_size' => 5,
			'prev_text'		=> esc_html__('Previous', 'arrow'),
			'next_text'		=> esc_html__('Next', 'arrow'),
		));

		echo '</div>';
	}
}