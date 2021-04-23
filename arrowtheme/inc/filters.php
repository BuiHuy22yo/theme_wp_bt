<?php
if (!defined('ABSPATH')) {
	return;
}

/**
 * Add custom classes to the aray of body classes
 */
if (!function_exists('arrow_filter_body_classes')) {
	function arrow_filter_body_classes($classes) {
		$general_options = arrow_header_general_params();

		//header transparent
		$classes[] = $general_options['is_transparent'] ? 'arrow-has-transparent' : '';

		//header sticky
		$classes[] = $general_options['is_sticky'] ? 'arrow-has-sticky' : '';

		return $classes;
	}

	add_filter('body_class', 'arrow_filter_body_classes');
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
if (!function_exists('arrow_header_add_to_cart_fragment')) {
	function arrow_header_add_to_cart_fragment($fragments) {
		ob_start();
		$count = WC()->cart->cart_contents_count;

		?>
		<a class="arrow-btn-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>">
            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 16H0V5H15V16ZM0.789474 15.1665H14.1228V5.84209H0.789474V15.1665Z" fill="#2D2D2D"></path><path d="M11.1586 7.25279H10.4849V3.78071C10.4849 2.08325 9.13752 0.694416 7.49074 0.694416C5.84395 0.694416 4.49658 2.08325 4.49658 3.78071V7.17563H3.74805V3.78071C3.74805 1.69746 5.39483 0 7.49074 0C9.58664 0 11.2334 1.69746 11.2334 3.78071V7.25279H11.1586Z" fill="#2D2D2D"></path><path d="M5.09591 6.48145H3V7.25302H5.09591V6.48145Z" fill="#2D2D2D"></path><path d="M11.8322 6.48145H9.73633V7.25302H11.8322V6.48145Z" fill="#2D2D2D"></path></svg>
			<span class="nm">
				<span class="cart-count"><?php echo esc_html($count); ?></span>
			</span>
		</a>

		<?php
		$fragments['a.arrow-btn-cart'] = ob_get_clean();

		return $fragments;
	}

	add_filter('woocommerce_add_to_cart_fragments', 'arrow_header_add_to_cart_fragment');
}

/**
 * Mini Cart
 */
if (!function_exists('arrow_header_mini_cart_fragment')) {
	function arrow_header_mini_cart_fragment($fragments) {
		ob_start();

		woocommerce_mini_cart();
		$mini_cart = ob_get_clean();

		?>
		<div class="arrow-cart-content"><?php echo json_decode(json_encode($mini_cart)); ?></div>

		<?php
		$fragments['.arrow-cart-content'] = ob_get_clean();

		return $fragments;
	}

	add_filter('woocommerce_add_to_cart_fragments', 'arrow_header_mini_cart_fragment');
}
